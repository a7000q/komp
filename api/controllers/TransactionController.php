<?php

namespace app\controllers;


use app\models\Transactions;
use app\models\Logs;

class TransactionController extends CController
{
    public $modelClass = 'app\models\Transactions';

    public function actionGetStatus($id_trk_address)
    {
        $transaction = Transactions::find()->where([
            'id_trk_address' => $id_trk_address,
            'status' => 1
        ])->orderBy('date')->one();

        Logs::write("Запрос статуса: transaction/get-status?id_trk_address=".$id_trk_address);

        if ($transaction && $transaction->volume_start && $transaction->price)
            return $transaction;

        return ['status' => 404];
    }

    public function actionSetFuelVolume($id, $volume, $id_trk_address)
    {
        if ($id)
            $transaction = Transactions::findOne($id);
        else
            $transaction = Transactions::find()->where(['id_trk_address' => $id_trk_address])
                ->andWhere(['in', 'status', [1, 2]])->orderBy('date DESC')->one();

        if ($transaction)
            $transaction->setFuelVolume($volume);

        return ['status' => 200];
    }

    public function  actionEndTransaction($id, $volume, $id_trk_address)
    {
        if ($id)
            $transaction = Transactions::findOne($id);
        else
            $transaction = Transactions::find()->where(['id_trk_address' => $id_trk_address])
                ->andWhere(['status' => 2])->orderBy('date DESC')->one();

        if ($transaction)
        {
            $transaction->end($volume);
            return $transaction;
        }

        return ['status' => 404];
    }
}