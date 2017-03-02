<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TrkAddress */

$this->title = 'Create Trk Address';
$this->params['breadcrumbs'][] = ['label' => 'Trk Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trk-address-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
