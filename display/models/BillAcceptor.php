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

    public static function getAcceptor()
    {
        return BillAcceptor::find()->one();
    }

    public function enabled()
    {
        $this->status = 2;
        $this->save();
    }

    public function disabled()
    {
        $this->status = 1;
        $this->save();
    }
}
