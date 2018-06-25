<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Invitation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="invitation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>


    <?php if(!$model->isNewRecord) {
    echo $form->field($model, 'is_active')->radioList([true => 'Показувати', false =>  'Не показувати' ])->label("Статус активності");
    }?>


    <div class="form-group">
        <?= Html::submitButton('Запросити', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
