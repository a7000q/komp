<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trk_address".
 *
 * @property integer $id
 * @property integer $id_trk
 * @property integer $address
 * @property integer $id_product
 * @property integer $status
 * @property integer $id_trk_side
 *
 * @property Transactions[] $transactions
 * @property TrkSides $idTrkSide
 * @property Products $idProduct
 * @property Trks $idTrk
 * @property TrkStatus $status0
 */
class TrkAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trk_address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_trk', 'address', 'id_product', 'status', 'id_trk_side'], 'integer'],
            [['id_trk_side'], 'exist', 'skipOnError' => true, 'targetClass' => TrkSides::className(), 'targetAttribute' => ['id_trk_side' => 'id']],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['id_product' => 'id']],
            [['id_trk'], 'exist', 'skipOnError' => true, 'targetClass' => Trks::className(), 'targetAttribute' => ['id_trk' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => TrkStatus::className(), 'targetAttribute' => ['status' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_trk' => 'Id Trk',
            'address' => 'Address',
            'id_product' => 'Id Product',
            'status' => 'Status',
            'id_trk_side' => 'Id Trk Side',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions()
    {
        return $this->hasMany(Transactions::className(), ['id_trk_address' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTrkSide()
    {
        return $this->hasOne(TrkSides::className(), ['id' => 'id_trk_side']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'id_product']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTrk()
    {
        return $this->hasOne(Trks::className(), ['id' => 'id_trk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(TrkStatus::className(), ['id' => 'status']);
    }
}
