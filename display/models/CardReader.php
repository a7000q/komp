<?php

namespace app\models;

use Yii;
use yii\base\Exception;
use yii\httpclient\Client;

/**
 * This is the model class for table "card_reader".
 *
 * @property integer $id
 * @property string $name
 * @property integer $port
 * @property integer $status
 * @property string $id_electro
 */
class CardReader extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'card_reader';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['port', 'status'], 'integer'],
            [['name', 'id_electro'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'port' => 'Port',
            'status' => 'Status',
            'id_electro' => 'Id Electro',
        ];
    }

    static public function getReader()
    {
        $reader = CardReader::find()->one();
        return $reader;
    }

    public function enabled()
    {
        $this->status = 2;
        $this->save();
    }

    public function disabled()
    {
        $this->status = 1;
        $this->save();
    }

    public function readCard()
    {
        if ($this->status == 2)
            return false;

        $activity = Activity::getActivity();

        if (!$activity)
            return false;

        $activity->nextStep();
    }

    public function findCard()
    {
        $activity = Activity::getActivity();
        $id_product = $activity->address->product->ids;

        $client = new Client();
        $setting = Settings::findOne(['name' => "token"]);
        $token = $setting->value;

        try{

            $response = $client->get("http://api.tagera.ru/partner-cards/get-possibilaty-fuel-by-card",[
                'token' => $token,
                'expand' => "maxVolume,price,partner",
                'id_electro' => $this->id_electro,
                'id_product' => $id_product
            ])->send();

            if ($response->data["status"] == 404)
            {
                $activity->setErrorNotCard();
                return $response->data;
            }

            $server_msg = new ServerMsg([
                'name' => 'findCard',
                'msg' => json_encode($response->data["data"])
            ]);

            $server_msg->save();

            $activity->nextStep();

            return true;

        }
        catch (Exception $ex)
        {
            $activity->setErrorConnect();
            return true;
        }
    }
}
