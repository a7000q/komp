<?php

namespace app\controllers;

use app\models\BillAcceptor;
use app\models\Bills;
use app\models\BillCassets;


class BillsController extends CController
{
    public $modelClass = 'app\models\Bills';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['delete'], $actions['create'], $actions['update'], $actions['view']);
        return $actions;
    }

    public function actionInsert($value)
    {
        $bill = new Bills(['value' => $value]);
        $bill->on(Bills::EVENT_INSERT, [BillCassets::className(), 'AddCurrentCassets'], $value);
        $bill->on(Bills::EVENT_INSERT, [BillAcceptor::className(), 'addCurrentSum'], $value);
        $bill->save();

        return $bill;
    }

}