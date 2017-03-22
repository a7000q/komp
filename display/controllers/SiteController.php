<?php

namespace app\controllers;

use yii\helpers\ArrayHelper;
use yii\web\Controller;
use app\models\Activity;
use Yii;


class SiteController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $activity = $this->findActivity();
        $render = "p".$activity->step;
        //print_r($render);

        return $this->render($render, ['activity' => $activity]);
    }

    private function findActivity()
    {
        $model = Activity::find()->orderBy('date DESC')->one();

        if (!$model)
            return Activity::newActivity();

        return $model;
    }


    //Выбор колонки
    public function actionSetSide()
    {
        $post = Yii::$app->request->post();
        $id_side = ArrayHelper::getValue($post, "side");

        $activity = $this->findActivity();
        $activity->id_side = $id_side;
        $activity->save();

        $activity->nextStep();
        $this->redirect(['/site/index']);
    }

    //Выбор топлива
    public function actionSetAddress()
    {
        $post = Yii::$app->request->post();
        $id_address = ArrayHelper::getValue($post, "address");

        $activity = $this->findActivity();
        $activity->id_address = $id_address;
        $activity->save();

        $activity->nextStep();
        $this->redirect(['/site/index']);
    }

    public function actionSetPay()
    {
        $post = Yii::$app->request->post();
        $id_pay = ArrayHelper::getValue($post, "pay");

        $activity = $this->findActivity();
        $activity->id_pay = $id_pay;
        $activity->save();

        $activity->nextStep();
        $this->redirect(['/site/index']);
    }

    public function actionFooterAction()
    {
        $post = Yii::$app->request->post();

        $activity = $this->findActivity();

        if (isset($post["prev"]))
            $activity->prevStep();

        if (isset($post["close"]))
            $activity->reset();

        if (isset($post["start"]))
            $activity->start();

        if (isset($post["fuel_volume"]))
            $activity->start(ArrayHelper::getValue($post, "fuel_volume"));

        $this->redirect(['/site/index']);
    }

    public function actionGetStatus()
    {
        $activity = $this->findActivity();

        return $activity->loadReset();
    }
}
