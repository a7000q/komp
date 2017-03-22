<?php

namespace app\controllers;

use app\models\BillAcceptor;
use app\models\CardReader;
use app\models\Settings;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use kartik\grid\EditableColumnAction;
use Yii;
use yii\helpers\Json;

class SettingsController extends \yii\web\Controller
{
    public function actions()
    {
        return ArrayHelper::merge(parent::actions(), [
            'editrecord' => [                                       // identifier for your editable column action
                'class' => EditableColumnAction::className(),     // action class name
                'modelClass' => Settings::className(),                // the model for the record being edited
                'outputValue' => function ($model, $attribute, $key, $index) {
                    return $model->$attribute;      // return any custom output value if desired
                },
                'outputMessage' => function($model, $attribute, $key, $index) {
                    return '';                                  // any custom error to return after model save
                },
                'showModelErrors' => true,                        // show model validation errors after save
                'errorOptions' => ['header' => '']                // error summary HTML options
                // 'postOnly' => true,
                // 'ajaxOnly' => true,
                // 'findModel' => function($id, $action) {},
                // 'checkAccess' => function($action, $model) {}
            ]
        ]);
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Settings::find()
        ]);

        $acceptor = BillAcceptor::getAcceptor();
        $reader = CardReader::getReader();

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'acceptor' => $acceptor,
            'reader' => $reader
        ]);
    }

    public function actionAddAcceptor()
    {
        BillAcceptor::add();
        $this->redirect(['/settings/index']);
    }

    public function actionAcceptorUpdate()
    {
        $post = Yii::$app->request->post();
        $acceptor = BillAcceptor::getAcceptor();

        if (Yii::$app->request->isAjax && isset($post['kvdelete'])) {
            echo Json::encode([
                'success' => true,
                'messages' => [
                    'kv-detail-info' => 'Запись удалена. '
                ]
            ]);
            $acceptor->delete();
            return;
        }

        if ($acceptor->load($post) && $acceptor->save())
            Yii::$app->session->setFlash('kv-detail-success', 'Запись сохранена!');

        $this->redirect(['index']);
    }

    public function actionAddReader()
    {
        CardReader::add();
        $this->redirect(['/settings/index']);
    }

    public function actionReaderUpdate()
    {
        $post = Yii::$app->request->post();
        $reader = CardReader::getReader();

        if (Yii::$app->request->isAjax && isset($post['kvdelete'])) {
            echo Json::encode([
                'success' => true,
                'messages' => [
                    'reader-kv-detail-info' => 'Запись удалена. '
                ]
            ]);
            $reader->delete();
            return;
        }

        if ($reader->load($post) && $reader->save())
            Yii::$app->session->setFlash('reader-kv-detail-success', 'Запись сохранена!');

        $this->redirect(['index']);
    }

}
