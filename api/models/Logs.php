<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "logs".
 *
 * @property integer $id
 * @property integer $date
 * @property string $msg
 */
class Logs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'logs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date'], 'integer'],
            [['msg'], 'string'],
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
            'msg' => 'Msg',
        ];
    }

    static function write($msg)
    {
        $log = new Logs([
            'msg' => $msg
        ]);

        $log->save();
    }
}
