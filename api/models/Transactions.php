<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "transactions".
 *
 * @property integer $id
 * @property integer $date
 * @property integer $id_type
 * @property integer $id_trk_address
 * @property integer $status
 * @property double $volume
 * @property double $volume_start
 * @property double $price
 *
 * @property TrkAddress $idTrkAddress
 * @property TransactionType $idType
 * @property TransactionStatus $status0
 */
class Transactions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transactions';
    }

    public function extraFields()
    {
        return ['volumeStart'];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'id_type', 'id_trk_address', 'status'], 'integer'],
            [['volume', 'volume_start', 'price'], 'number'],
            [['id_trk_address'], 'exist', 'skipOnError' => true, 'targetClass' => TrkAddress::className(), 'targetAttribute' => ['id_trk_address' => 'id']],
            [['id_type'], 'exist', 'skipOnError' => true, 'targetClass' => TransactionType::className(), 'targetAttribute' => ['id_type' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => TransactionStatus::className(), 'targetAttribute' => ['status' => 'id']],
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
            'id_type' => 'Id Type',
            'id_trk_address' => 'Id Trk Address',
            'status' => 'Status',
            'volume' => 'Volume',
            'volume_start' => 'Volume Start',
            'price' => 'Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrkAddress()
    {
        return $this->hasOne(TrkAddress::className(), ['id' => 'id_trk_address']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdType()
    {
        return $this->hasOne(TransactionType::className(), ['id' => 'id_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(TransactionStatus::className(), ['id' => 'status']);
    }

    public function setFuelVolume($volume)
    {
        $volume = str_replace(",", ".", $volume);
        $this->volume = $volume;
        $this->status = 2;

        $this->save();
    }

    public function end($volume)
    {
        $volume = str_replace(",", ".", $volume);
        $this->volume = $volume;
        $this->status = 3;

        $this->save();

        Logs::write("Transaction id: ".$this->id." end");
    }

    public function getVolumeStart()
    {
        $max_volume = ArrayHelper::getValue($this, "trkAddress.trk.max_volume", 900);

        if ($this->volume_start > $max_volume)
            return $max_volume;

        return $this->volume_start;
    }
}
