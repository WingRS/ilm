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
    <h1 class="logo"><a href="https://tbatsenko.github.io/ilm_database/search.html"><img src="http://management.lviv.ua/images/logo.jpg" alt="Logo"></a></h1>
    <ul class="main-nav">
        <li><a href="https://tbatsenko.github.io/ilm_database/search.html">Пошук</a></li>
        <li><a href="https://tbatsenko.github.io/ilm_database/search_results.html">Результати пошуку</a></li>
        <li><a href="https://tbatsenko.github.io/ilm_database/">Вхід</a></li>
        <li><a href="https://tbatsenko.github.io/ilm_database/registration.html">Реєстрація</a></li>
    </ul>

</header>

<div class="wrap">


    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
