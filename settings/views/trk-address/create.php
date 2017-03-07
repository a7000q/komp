<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TrkAddress */

$this->title = 'Создание нового рукава';
$this->params['breadcrumbs'][] = ['label' => 'ТРК', 'url' => ['/trk']];
$this->params['breadcrumbs'][] = ['label' => 'Рукава ТРК', 'url' => ['index', 'id' => $model->id_trk]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trk-address-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
