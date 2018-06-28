<?php
/* @var $this yii\web\View */
///* @var $user common\models\User */
/* @var $model common\models\Invitation */

?>

<div class="password-reset">

    <h3>
        Запрошення для   <?= $model->email  ?>

    </h3>

    <p>
        <a href="<?= \yii\helpers\Url::home() ?> /invite/signup/<?=  $model->invite_string ?>">Ваше посилання для реєстрації</a>
    </p>
</div>

