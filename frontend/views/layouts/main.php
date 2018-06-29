<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<header class="header">
    <h1 class="logo"><a href="/"><img src="http://management.lviv.ua/images/logo.jpg" alt="Logo"></a></h1>
    <ul class="main-nav">

        <?php if(Yii::$app->user->isGuest): ?>

            <?php else: ?>
            <li><a href="/site/search">Пошук</a></li>
            <li><a href="/profile/">Профіль</a></li>
            <li><a href="/profile/edit">Редагувати інформацію</a></li>
            <li><a href="/site/logout">Вихід</a></li>
        <?php endif; ?>
    </ul>

</header>

<div class="wrapper">
        <?= $content ?>
</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
