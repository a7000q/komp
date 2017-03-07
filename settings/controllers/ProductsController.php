<?php

namespace app\controllers;

use app\models\Products;
use yii\data\ActiveDataProvider;

class ProductsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Products::find()
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionUploadServer()
    {
        Products::UploadServer();
        $this->redirect(['/products/index']);
    }

}
