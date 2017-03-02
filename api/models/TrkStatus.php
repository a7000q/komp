<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trk_status".
 *
 * @property integer $id
 * @property string $name
 *
 * @property TrkAddress[] $trkAddresses
 */
class TrkStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trk_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrkAddresses()
    {
        return $this->hasMany(TrkAddress::className(), ['status' => 'id']);
    }
}
