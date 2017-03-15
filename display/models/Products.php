<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property string $name
 * @property string $price
 * @property integer $ids
 *
 * @property TrkAddress[] $trkAddresses
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price'], 'number'],
            [['ids'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'price' => 'Price',
            'ids' => 'Ids',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrkAddresses()
    {
        return $this->hasMany(TrkAddress::className(), ['id_product' => 'id']);
    }
}
