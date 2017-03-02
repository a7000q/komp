<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TrkSides */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'ТРК', 'url' => ['/trk']];
$this->params['breadcrumbs'][] = ['label' => 'Стороны ТРК', 'url' => ['/trk-sides', 'id' => $model->id_trk]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trk-sides-view">

    <h1><?=Html::img('/images/gas-station-big.png')?>  <?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label' => "ТРК",
                'value' => $model->trk->name
            ],
            'name',
        ],
    ]) ?>

</div>
