<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\httpclient\Client;

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
            [['name'], 'string', 'max' => 255],
            ['ids', 'integer'],
            ['ids', 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'price' => 'Цена',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrkAddresses()
    {
        return $this->hasMany(TrkAddress::className(), ['id_product' => 'id']);
    }

    static public function getArrayAll()
    {
        return ArrayHelper::map(self::find()->all(), "id", "name");
    }

    static public function UploadServer()
    {
        $client = new Client();
        $setting = Settings::findOne(['name' => "token"]);
        $token = $setting->value;

        $response = $client->get("http://api.tagera.ru/products",[
            'token' => $token,
            'expand' => "product"
        ])->send();

        $products = Products::find()->all();
        foreach ($products as $product)
        {
            if ($product->ids === null)
                $product->del();
        }

        $array_product = ArrayHelper::map($products, 'ids', 'id');

        if ($response->isOk && $response->data["status"] == 200)
        {
            $data = $response->data["data"];

            foreach ($data as $product)
            {
                if (ArrayHelper::keyExists($product["id_product"], $array_product))
                {
                    $id_product = $array_product[$product["id_product"]];
                    $bd_product = Products::findOne($id_product);
                    $bd_product->price = $product["price"];
                    $bd_product->name = $product["product"]["name"];
                }
                else
                {
                    $bd_product = new Products([
                        'ids' => $product["id"],
                        'name' => $product["product"]["name"],
                        'price' => $product['price']
                    ]);
                }

                $bd_product->save();
            }
        }
    }

    public function del()
    {
        $null_product = self::findOne(['ids' => 0]);

        foreach ($this->trkAddresses as $address)
        {
            $address->id_product = $null_product->id;
            $address->save();
        }

        $this->delete();
    }
}
