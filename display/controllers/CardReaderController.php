<?php

namespace app\controllers;

use app\models\CardReader;
use yii\web\NotFoundHttpException;


class CardReaderController extends CController
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
        $reader = CardReader::getReader();
        $reader->readCard();

        return $reader;
    }

    public function actionFindCard()
    {
        $reader = CardReader::getReader();
        return $reader->findCard();
    }
}