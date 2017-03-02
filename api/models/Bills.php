<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "bills".
 *
 * @property integer $id
 * @property integer $date
 * @property integer $value
 */
class Bills extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    const EVENT_INSERT = 'insert';

    public static function tableName()
    {
        return 'bills';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'value'], 'integer'],
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
            'value' => 'Value',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            $this->trigger(self::EVENT_INSERT);
            return true;
        }
        return false;
    }
}
