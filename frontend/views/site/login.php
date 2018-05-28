<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin(['id' => 'login-form', 'options'=>['class'=>'form-signin' ] ]); ?>

    <h2 class="form-signin-heading">Вхід</h2>
<?= $form->field($model, 'email')->textInput(['autofocus' => true, 'class'=>'form-control', 'placeholder'=>'Електронна пошта'])->label(false) ?>
<?= $form->field($model, 'password')->passwordInput(['autofocus' => true, 'class'=>'form-control', 'placeholder'=>'Пароль'])->label(false) ?>
    <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Запам'ятати мене
    </label>
<?= Html::submitButton('Увійти', ['class' => 'btn btn-lg btn-primary btn-block', 'name' => 'login-button']) ?>

<?php ActiveForm::end(); ?>
