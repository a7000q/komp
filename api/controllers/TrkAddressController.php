<?php

namespace app\controllers;

use app\models\TrkAddress;
use yii\web\NotFoundHttpException;


class TrkAddressController extends CController
{
    public $modelClass = 'app\models\TrkAddress';

    public function actionUpdateStatus($id, $nozle)
    {
        $address = $this->findModel($id);

        $address->updateStatus($nozle);

        return $address;
    }

    private function findModel($id)
    {
        $model = TrkAddress::findOne($id);

        if ($model)
            return $model;

        throw new NotFoundHttpException("Not address");
    }
}