<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TrkSides */

$this->title = 'Создание стороны ТРК';
$this->params['breadcrumbs'][] = ['label' => 'ТРК', 'url' => ['/trks']];
$this->params['breadcrumbs'][] = ['label' => 'Стороны ТРК', 'url' => ['index', 'id' => $model->id_trk]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trk-sides-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
