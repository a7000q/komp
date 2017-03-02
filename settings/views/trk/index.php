<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ТРК';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trks-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
            'port',
            'max_volume',
            'type:ntext',
            [
                'label' => "Стороны",
                'format' => 'html',
                'value' => function ($model, $key, $index, $column)
                {
                    return Html::a(Html::img('/images/gas-station.png'), Url::toRoute(['/trk-sides', 'id' => $model->id]));
                }
            ],
            [
                'label' => "Рукава",
                'format' => 'html',
                'value' => function ($model, $key, $index, $column)
                {
                    return Html::a(Html::img('/images/gas-pump.png'), Url::toRoute(['/trk-address', 'id' => $model->id]));
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
