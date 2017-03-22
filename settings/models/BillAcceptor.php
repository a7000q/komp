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
            'name' => 'Название',
            'com' => 'СОМ порт',
            'sum' => 'Sum',
            'status' => 'Status',
        ];
    }

    static public function getAcceptor()
    {
        $acceptor = BillAcceptor::find()->one();
        return $acceptor;
    }

    static public function add()
    {
        if (!BillAcceptor::getAcceptor())
        {
            $acceptor = new BillAcceptor(['status' => 1]);
            $acceptor->save();
        }
    }
}
