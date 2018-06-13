<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SearchQuary */

$this->title = 'Update Search Quary: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Search Quaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="search-quary-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
