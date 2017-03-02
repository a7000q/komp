<?php

namespace app\controllers;

use app\models\BillAcceptor;


class BillAcceptorController extends CController
{
    public $modelClass = 'app\models\BillAcceptor';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['delete'], $actions['create'], $actions['update'], $actions['view']);
        return $actions;
    }

    public function actionView()
    {
        $acceptor = BillAcceptor::find()->one();

        return $acceptor;
    }
}