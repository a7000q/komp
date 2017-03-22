<?php
/* @var $this yii\web\View */
use kartik\grid\GridView;
use kartik\detail\DetailView;
use kartik\helpers\Html;

$this->title = "Настройки терминала";
?>

<div class="terminal-settings">
    <h1><?=\yii\bootstrap\Html::encode($this->title)?></h1>

    <?=GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'rus_name',
            [
                'class'=>'kartik\grid\EditableColumn',
                'attribute'=>'value',
                'editableOptions'=> [
                    'formOptions' => ['action' => ['/settings/editrecord']],
                ]
            ],
        ]
    ])?>

    <?if ($acceptor):?>
        <?=DetailView::widget([
            'model'=>$acceptor,
            'condensed'=>true,
            'hover'=>true,
            'mode'=>DetailView::MODE_VIEW,
            'formOptions' => [
                'action' => ['/settings/acceptor-update']
            ],
            'deleteOptions' => [
                'url' => ['/settings/acceptor-update'],
                'params' => [
                    'kvdelete' => 1
                ]
            ],
            'panel'=>[
                'heading'=>'Купюроприемник',
                'type'=>DetailView::TYPE_INFO,
            ],
            'attributes'=>[
                'name',
                'com'
            ]
        ])?>
    <?else:?>
        <?=Html::a("Добавить купюроприемник", ['/settings/add-acceptor'], ['class' => 'btn btn-success'])?>
    <?endif;?>

    <?if ($reader):?>
        <?=DetailView::widget([
            'model'=>$reader,
            'condensed'=>true,
            'hover'=>true,
            'mode'=>DetailView::MODE_VIEW,
            'alertMessageSettings' => [
                'reader-kv-detail-error' => 'alert alert-danger',
                'reader-kv-detail-success' => 'alert alert-success',
                'reader-kv-detail-info' => 'alert alert-info',
                'reader-kv-detail-warning' => 'alert alert-warning'
            ],
            'formOptions' => [
                'action' => ['/settings/reader-update']
            ],
            'deleteOptions' => [
                'url' => ['/settings/reader-update'],
                'params' => [
                    'kvdelete' => 1
                ]
            ],
            'panel'=>[
                'heading'=>'Считыватель',
                'type'=>DetailView::TYPE_INFO,
            ],
            'attributes'=>[
                'name',
                'port'
            ]
        ])?>
    <?else:?>
        <?=Html::a("Добавить считыватель карт", ['/settings/add-reader'], ['class' => 'btn btn-success'])?>
    <?endif;?>
</div>
