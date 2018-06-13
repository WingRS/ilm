<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SearchQuary */

$this->title = 'Create Search Quary';
$this->params['breadcrumbs'][] = ['label' => 'Search Quaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="search-quary-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
