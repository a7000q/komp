<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activity".
 *
 * @property integer $id
 * @property integer $date
 * @property integer $id_side
 * @property integer $id_address
 * @property integer $id_pay
 * @property integer $step
 */
class Activity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'id_side', 'id_address', 'id_pay', 'step'], 'integer'],
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
            'id_side' => 'Id Side',
            'id_address' => 'Id Address',
            'id_pay' => 'Id Pay',
            'step' => 'Step',
        ];
    }

    public function isActive()
    {
        if ($this->step == 1 || $this->step == 7 || $this->step == 8)
            return false;

        return true;
    }
}
