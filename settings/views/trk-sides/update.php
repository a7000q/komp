<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TrkSides */

$this->title = 'Изменение стороны ТРК: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'ТРК', 'url' => ['/trk']];
$this->params['breadcrumbs'][] = ['label' => 'Стороны ТРК', 'url' => ['/trk-sides', 'id' => $model->id_trk]];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменение';
?>
<div class="trk-sides-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
