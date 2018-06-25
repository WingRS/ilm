<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Programs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="programs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'program_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_active')->radioList([true => 'Показувати', false =>  'Не показувати' ])->label("Статус активності") ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
