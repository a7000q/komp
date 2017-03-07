<?php

namespace app\controllers;

use app\models\Products;
use yii\rest\Controller;

class CronController extends Controller
{
    public function actions()
    {
        $actions = parent::actions();
        unset($actions['delete'], $actions['create'], $actions['update'], $actions['view']);
        return $actions;
    }

    public function actionIndex()
    {

    }
}