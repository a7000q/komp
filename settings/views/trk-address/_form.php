<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Products;

/* @var $this yii\web\View */
/* @var $model app\models\TrkAddress */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trk-address-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_trk_side')->dropDownList($model->arrayTrkSides) ?>

    <?= $form->field($model, 'address')->textInput() ?>

    <?= $form->field($model, 'id_product')->dropDownList(Products::getArrayAll()) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
