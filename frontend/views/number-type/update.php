<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\Models\NumberType */

$this->title = 'Update Number Type: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Number Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="number-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
