<?php

namespace app\controllers;

use app\models\BillAcceptor;
use yii\web\NotFoundHttpException;


class BillAcceptorController extends CController
{
    public $modelClass = 'app\models\BillAcceptor';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['delete'], $actions['create'], $actions['update'], $actions['view'], $actions['index']);
        return $actions;
    }

    public function actionIndex()
    {
        return BillAcceptor::getAcceptor();
    }
}