<?php

namespace app\models;

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

    public function setElectro($electro)
    {
        if ($this->status == 1)
            return false;

        $this->id_electro = $electro;
        $this->status = 1;

        $this->save();
    }
}
