<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "server_msg".
 *
 * @property integer $id
 * @property string $name
 * @property string $msg
 */
class ServerMsg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'server_msg';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
            ['msg', 'string']
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
            'msg' => 'Msg',
        ];
    }

    static public function getCard()
    {
        $msg = ServerMsg::find()->where(['name' => 'findCard'])->one();

        if (!$msg)
            return false;

        return json_decode($msg->msg, true);
    }
}
