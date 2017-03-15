<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "activity".
 *
 * @property integer $id
 * @property integer $date
 * @property integer $id_side
 * @property integer $id_address
 * @property integer $id_pay
 * @property integer $step
 */
class Activity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'id_side', 'id_address', 'id_pay', 'step'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'id_side' => 'Id Side',
            'id_address' => 'Id Address',
            'id_pay' => 'Id Pay',
            'step' => 'Step',
        ];
    }

    public function getTStep()
    {
        return $this->hasOne(ActivitySteps::className(), ['id' => 'step']);
    }


    public static function newActivity()
    {
        $adresses_count = TrkAddress::find()->joinWith('product')->where(['<>', "ids", 0])->count();
        $activity = new Activity(['date' => time()]);

        if ($adresses_count == 0)
        {
            $activity->step = 8;
            $activity->save();

            return $activity;
        }

        if ($adresses_count == 1)
        {
            $address = TrkAddress::find()->joinWith('product')->where(['<>', "ids", 0])->one();
            $activity->id_address = $address->id;
            $activity->id_side = $address->id_trk_side;
            $activity->step = 3;

            $pays_count = Pays::find()->count();
            if ($pays_count == 1)
            {
                $pay = Pays::find()->one();
                switch ($pay->id)
                {
                    case 1:
                        $activity->step = 4;
                        break;
                    case 2:
                        $activity->step = 5;
                        break;
                }

                $activity->save();

                return $activity;
            }

            return $activity;
        }
        else
        {
            $sides_count = TrkAddress::find()->joinWith('product')->where(['<>', "ids", 0])->groupBy('id_trk_side')->count('id_trk_side');
            if ($sides_count == 1)
            {
                $address = TrkAddress::find()->joinWith('product')->where(['<>', "ids", 0])->one();
                $activity->id_side = $address->id_trk_side;
                $activity->step = 2;
                $activity->save();

                return $activity;
            }

            $activity->step = 1;
            $activity->save();

            return $activity;
        }
    }

    public function getSides()
    {
        $sides = TrkSides::find()->joinWith("trkAddresses")->joinWith("trkAddresses.product")->where(['<>', 'ids', 0])->all();
        return $sides;
    }

    public function getAddresses()
    {
        $addresses = TrkAddress::find()->joinWith("product")
            ->where(['<>', 'ids', 0])
            ->andWhere(['id_trk_side' => $this->id_side])
            ->all();

        return $addresses;
    }

    public function getPays()
    {
        $pays = Pays::find()->all();
        return $pays;
    }

    public function nextStep()
    {
        switch ($this->step)
        {
            case 1:
                $this->nextStep1();
                break;
            case 2:
                $this->nextStep2();
                break;
            case 3:
                $this->nextStep3();
                break;
        }

        $this->date = time();
        $this->save();
    }

    private function nextStep1()
    {
        $this->step = 2;

        if (count($this->addresses) == 1)
        {
            $this->id_address = $this->addresses[0]->id;
            $this->save();

            $this->nextStep();
        }

        $this->save();
    }

    private function nextStep2()
    {
        $this->step = 3;

        if (count($this->pays) == 1)
        {
            $pay = $this->pays[0]->id;
            $this->id_pay = $pay->id;

            $this->save();
            $this->nextStep();
        }

        $this->save();
    }

    private function nextStep3()
    {
        switch ($this->id_pay)
        {
            case 1:
                $this->step = 4;
                $this->enabledBill();
                break;
            case 2:
                $this->step = 5;
                break;
        }

        $this->save();
    }

    private function enabledBill()
    {
        $acceptor = BillAcceptor::getAcceptor();
        $acceptor->enabled();
    }

    public function getAddress()
    {
        return $this->hasOne(TrkAddress::className(), ['id' => "id_address"]);
    }

    public function prevStep()
    {
        switch ($this->step)
        {
            case 2:
                $this->prevStep2();
                break;
            case 3:
                $this->prevStep3();
                break;
        }

        $this->date = time();
        $this->save();
    }

    private function prevStep2()
    {
        $this->step = 1;
        $this->id_side = "";

        $this->save();
    }

    private function prevStep3()
    {
        if (count($this->addresses) > 1)
        {
            $this->step = 2;
            $this->id_address = "";
        }
        else if (count($this->sides) > 1)
        {
            $this->step = 1;
            $this->id_address ="";
            $this->id_side = "";
        }
        $this->save();
    }

    public function isVisiblePrevBtn()
    {
        if ($this->step == 1)
            return false;

        if ($this->step == 2 && count($this->sides) < 2)
            return false;

        if ($this->step == 3 && count($this->addresses) < 2 && count($this->sides) < 2)
            return false;

        if ($this->step == 4 || $this->step == 5 || $this->step == 6 || $this->step == 7 || $this->step == 8)
            return false;

        return true;
    }

    public function isVisibleCloseBtn()
    {
        if ($this->step == 4 || $this->step == 7)
            return true;

        return false;
    }

    public function reset()
    {
        $this->delete();
    }

    public function loadReset()
    {
        $result = false;

        if ($this->step == 2 || $this->step == 3 || $this->step == 7)
        {
            $dt = time() - $this->date;

            if ($dt > 60)
            {
                $result = true;
                $this->delete();
            }
        }

        if ($this->step == 4)
        {
            $acceptor = BillAcceptor::getAcceptor();

            if ($acceptor->sum == 0)
            {
                $dt = time() - $this->date;

                if ($dt > 120)
                {
                    $result = true;
                    $this->delete();
                }
            }
        }

        return json_encode(['status' => $result]);
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            $acceptor = BillAcceptor::getAcceptor();
            $acceptor->disabled();
            return true;
        } else {
            return false;
        }
    }

    private function getNewSale()
    {
        $sale = new Sales([
            'date' => time(),
            'id_trk' => ArrayHelper::getValue($this, "address.trk.id"),
            'name_trk' => ArrayHelper::getValue($this, "address.trk.name"),
            'id_trk_address' => ArrayHelper::getValue($this, "address.id"),
            'name_trk_address' => (string)ArrayHelper::getValue($this, "address.address"),
            'id_product' => ArrayHelper::getValue($this, "address.product.id"),
            'name_product' => ArrayHelper::getValue($this, "address.product.name"),
            'id_pay' => ArrayHelper::getValue($this, "id_pay")
        ]);

        return $sale;
    }

    private function startFuelCash()
    {
        $acceptor = BillAcceptor::getAcceptor();

        $sale = $this->getNewSale();
        $sale->price = $this->address->product->price;
        $sale->sum = $acceptor->sum;
        $sale->volume = round($sale->sum/$sale->price, 2) + 0.04;

        $sale->status = 1;

        if ($sale->validate())
            $sale->save();
    }

    public function start()
    {
        $this->date = time();
        $this->step = 7;
        $this->save();

        $acceptor = BillAcceptor::getAcceptor();
        $acceptor->disabled();

        switch ($this->id_pay)
        {
            case 1:
                $this->startFuelCash();
                break;
        }
    }

    public function getSuccessText()
    {
        $result = "Заправка началась!";

        $address = $this->address;

        if ($address->status == 1)
        {
            $result = "Пожалуйста, вставьте пистолет в топливный бак!";
        }

        return $result;
    }

    public function getSide()
    {
        return $this->hasOne(TrkSides::className(), ['id' => 'id_side']);
    }
}
