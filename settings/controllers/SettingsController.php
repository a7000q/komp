<?php

namespace app\controllers;

use app\models\Settings;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use kartik\grid\EditableColumnAction;

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
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

}
