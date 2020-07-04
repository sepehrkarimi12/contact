<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\Models\NumberType */

$this->title = 'Create Number Type';
$this->params['breadcrumbs'][] = ['label' => 'Number Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="number-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
