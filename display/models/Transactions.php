<?php

namespace app\models;

use Yii;

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
 * @property double $sum
 * @property integer $id_sale
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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'id_trk_address', 'status', 'id_sale'], 'integer'],
            [['volume', 'volume_start', 'price', 'sum'], 'number'],
            [['id_trk_address'], 'exist', 'skipOnError' => true, 'targetClass' => TrkAddress::className(), 'targetAttribute' => ['id_trk_address' => 'id']],
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
            'sum' => 'Sum',
            'id_sale' => 'Id Sale',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTrkAddress()
    {
        return $this->hasOne(TrkAddress::className(), ['id' => 'id_trk_address']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(TransactionStatus::className(), ['id' => 'status']);
    }
}
