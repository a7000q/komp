<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bill_acceptor".
 *
 * @property integer $id
 * @property string $name
 * @property integer $com
 * @property integer $sum
 * @property integer $status
 */
class BillAcceptor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bill_acceptor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['com', 'sum', 'status'], 'integer'],
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
            'com' => 'Com',
            'sum' => 'Sum',
            'status' => 'Status',
        ];
    }

    static public function addCurrentSum($event)
    {
        $value = $event->data;

        $current_record = self::find()->one();

        $current_record->sum += $value;
        $current_record->save();
    }
}
