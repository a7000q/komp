<?php
/* @var $this yii\web\View */
use kartik\grid\GridView;
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
</div>
