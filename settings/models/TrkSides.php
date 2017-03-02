<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trk_sides".
 *
 * @property integer $id
 * @property integer $id_trk
 * @property string $name
 *
 * @property Trks $idTrk
 */
class TrkSides extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trk_sides';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_trk'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['id_trk'], 'exist', 'skipOnError' => true, 'targetClass' => Trks::className(), 'targetAttribute' => ['id_trk' => 'id']],
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
            'name' => 'Название',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrk()
    {
        return $this->hasOne(Trks::className(), ['id' => 'id_trk']);
    }
}
