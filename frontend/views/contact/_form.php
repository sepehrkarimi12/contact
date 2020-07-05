<?php

use yii\helpers\Html;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;
use frontend\models\NumberType;

/* @var $this yii\web\View */
/* @var $model frontend\Models\Contact */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="contact-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'number_type_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number_type_id')->widget(Select2::classname(), [
            'data' => NumberType::getListForDropDown() + ['0' => 'add new +'],
            'language' => 'de',
            'options' => ['placeholder' => 'Select a state ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <div id="new_number_type_area" hidden>
        <?= $form->field($model, 'new_number_type')->textInput(['maxlength' => true]) ?>
    </div>

    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$this->registerJs(
    '
        $(\'#contact-number_type_id\').change(function() {
            if ($(this).val() == 0) {
                $("#new_number_type_area").show();
            } else {
                $("#new_number_type_area").hide();
                $("#contact-new_number_type").val("");
            }
        });

    '
);
?>