<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Стороны ТРК '.$trk->name;
$this->params['breadcrumbs'][] = ['label' => 'ТРК', 'url' => ['/trk']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trk-sides-index">

    <h1><?=Html::img('/images/gas-station-big.png')?> <?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create', 'id' => $trk->id], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
