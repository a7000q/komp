<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TrkAddress */

$this->title = 'Изменение Рукава: ' . $model->address;
$this->params['breadcrumbs'][] = ['label' => 'ТРК', 'url' => ['/trk']];
$this->params['breadcrumbs'][] = ['label' => 'Рукава ТРК', 'url' => ['index', 'id' => $model->id_trk]];
$this->params['breadcrumbs'][] = ['label' => $model->address, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменение';
?>
<div class="trk-address-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
