<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sales".
 *
 * @property integer $id
 * @property integer $date
 * @property integer $id_trk
 * @property string $name_trk
 * @property integer $id_trk_address
 * @property string $name_trk_address
 * @property integer $id_product
 * @property string $name_product
 * @property double $price
 * @property double $volume
 * @property double $sum
 * @property integer $id_pay
 * @property integer $status
 * @property integer $upload
 */
class Sales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sales';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'id_trk', 'id_trk_address', 'id_product', 'id_pay', 'status', 'upload'], 'integer'],
            [['price', 'volume', 'sum'], 'number'],
            [['name_trk', 'name_trk_address', 'name_product'], 'string', 'max' => 255],
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
            'id_trk' => 'Id Trk',
            'name_trk' => 'Name Trk',
            'id_trk_address' => 'Id Trk Address',
            'name_trk_address' => 'Name Trk Address',
            'id_product' => 'Id Product',
            'name_product' => 'Name Product',
            'price' => 'Price',
            'volume' => 'Volume',
            'sum' => 'Sum',
            'id_pay' => 'Id Pay',
            'status' => 'Status',
            'upload' => 'Upload',
        ];
    }
}
