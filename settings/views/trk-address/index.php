<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Рукава ТРК';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trk-address-index">

    <h1><?=Html::img('/images/gas-station-big.png')?> <?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Trk Address', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_trk',
            'address',
            'id_product',
            'status',
            // 'id_trk_side',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
