<?php

namespace app\models;

use Symfony\Component\CssSelector\Parser\Reader;
use Yii;

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
            'name' => 'Название',
            'port' => 'COM порт',
            'status' => 'Status',
            'id_electro' => 'Id Electro',
        ];
    }

    static public function getReader()
    {
        $reader = CardReader::find()->one();
        return $reader;
    }

    static public function add()
    {
        if (!CardReader::getReader())
        {
            $reader = new CardReader(['status' => 1]);
            $reader->save();
        }
    }
}
