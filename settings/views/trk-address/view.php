<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TrkAddress */

$this->title = $model->address;
$this->params['breadcrumbs'][] = ['label' => 'ТРК', 'url' => ['/trk']];
$this->params['breadcrumbs'][] = ['label' => 'Рукава ТРК', 'url' => ['index', 'id' => $model->id_trk]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trk-address-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            'trk.name',
            'address',
            'product.name',
            'product.price',
            'statusAddress.name',
            'trkSide.name',
        ],
    ]) ?>

</div>
