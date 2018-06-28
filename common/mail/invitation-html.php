<?php
/* @var $this yii\web\View */
///* @var $user common\models\User */
use yii\helpers\Html;

/* @var $model common\models\Invitation */
$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['invite/signup'.$model->invite_string]);
$resetLink = str_replace("/admin","",$resetLink);
?>

<div class="password-reset">

    <h3>
        Запрошення для   <?= $model->email  ?>

    </h3>

    <p>
        Ваше посилання для реєстрації
    </p>
    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
</div>

