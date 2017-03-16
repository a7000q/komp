<?php

namespace app\models;

use Yii;
use yii\httpclient\Client;

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

    static public function uploadSales()
    {
        $sales = Sales::find()->where(['<>', 'status', 1])->andWhere(['upload' => 1])->all();

        foreach ($sales as $sale)
        {
            $sale->uploadServer();
        }
    }

    public function uploadServer()
    {
        $client = new Client();
        $token = Settings::getToken();
        $id_product = $this->product->ids;

        $response = $client->get('http://api.tagera.ru/sale/add-cash',[
            'token' => $token,
            'date' => $this->date,
            'id_product' => $id_product,
            'volume' => $this->volume,
            'price' => $this->price,
            'bill_sum' => $this->sum
        ])->send();

        print_r($response);

        if ($response->isOk && $response->data["status"] == 200)
        {
            $data = $response->data["data"];

            if (isset($data["id"]))
            {
                $this->upload = 2;
                $this->save();
            }
        }
    }

    public function getProduct()
    {
        return $this->hasOne(Products::className(),['id' => 'id_product']);
    }
}
