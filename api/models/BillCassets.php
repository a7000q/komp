<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bill_cassets".
 *
 * @property integer $id
 * @property integer $date_start
 * @property integer $date_end
 * @property integer $sum
 * @property integer $count
 * @property integer $status
 */
class BillCassets extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bill_cassets';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_start', 'date_end', 'sum', 'count', 'status'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_start' => 'Date Start',
            'date_end' => 'Date End',
            'sum' => 'Sum',
            'count' => 'Count',
            'status' => 'Status',
        ];
    }

    //Прибавляет в текущую запись счетчики по сумме и количеству банкнот
    static function AddCurrentCassets($event)
    {
        $current_record = self::find()->where(['status' => 1])->one();

        if (!$current_record){
            $current_record = new BillCassets();
            $current_record->save();
        }
        $value = $event->data;

        $current_record->count++;
        $current_record->sum += $value;

        $current_record->save();
    }
}
