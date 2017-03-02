<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TrkAddress */

$this->title = 'Update Trk Address: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Trk Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="trk-address-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
