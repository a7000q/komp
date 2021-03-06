<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trks".
 *
 * @property integer $id
 * @property string $name
 * @property integer $port
 * @property integer $max_volume
 * @property string $type
 *
 * @property TrkAddress[] $trkAddresses
 */
class Trks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['port', 'max_volume'], 'integer'],
            [['type'], 'string'],
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
            'name' => 'Название',
            'port' => 'COM порт',
            'max_volume' => 'Максимальный объем',
            'type' => 'Тип ТРК',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrkAddresses()
    {
        return $this->hasMany(TrkAddress::className(), ['id_trk' => 'id']);
    }
}
