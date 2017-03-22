<?php

namespace app\controllers;

use app\models\BillAcceptor;
use app\models\CardReader;


class CardReaderController extends CController
{
    public $modelClass = 'app\models\CardReader';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['delete'], $actions['create'], $actions['update'], $actions['view'], $actions['index']);
        return $actions;
    }

    public function actionView()
    {
        $reader = CardReader::getReader();

        return $reader;
    }

    public function actionSetElectro($electro)
    {
        $reader = CardReader::getReader();
        $reader->setElectro($electro);

        return $reader;
    }
}