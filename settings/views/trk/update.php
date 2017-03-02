<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Trks */

$this->title = 'Изменение ТРК: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'ТРК', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменение';
?>
<div class="trks-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
