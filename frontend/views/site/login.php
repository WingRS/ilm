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
<!---<div class="site-login">


    <p>Please fill out the following fields to login:</p>

    <div class="row">
        <div class="col-lg-5">


<!--                --><?//= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
<!---->
<!--                --><?//= $form->field($model, 'password')->passwordInput() ?>
<!---->
<!--                --><?//= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                </div>

                <div class="form-group">

                </div>


        </div>
    </div>
</div>
-->
