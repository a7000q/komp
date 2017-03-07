<?php
/* @var $this yii\web\View */
use kartik\grid\GridView;
use yii\bootstrap\Html;

$this->title = "Продукты";
?>

<div class="terminal-settings">

    <h1><?=Html::encode($this->title)?></h1>

    <h3>
        <?= Html::a('Загрузить с сервера', ['upload-server'], ['class' => 'btn btn-success']) ?>
    </h3>

    <?=GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'name',
            'price'
        ]
    ])?>
</div>
