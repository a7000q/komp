<?php

namespace app\controllers;

use app\models\Activity;
use app\models\Products;
use app\models\Sales;
use yii\rest\Controller;

class CronController extends CController
{
    public $modelClass = 'app\models\Settings';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['delete'], $actions['create'], $actions['update'], $actions['view']);
        return $actions;
    }

    public function actionIndex()
    {

    }

    public function actionUploadSales()
    {
        $activity = Activity::find()->one();
        if ($activity->isActive())
            return false;

        Sales::uploadSales();

        return true;
    }
}