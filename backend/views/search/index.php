<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SearchQuarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пошукові запити';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="search-quary-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= strtotime("2018-06-10") ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute' => 'created_at',
                'label' => 'Дата',
                'value' => 'created_at',
                'format' => ['date', 'php:Y-m-d']
            ],
//            'created_at',
            'quary',
            'user_id',
            'region',

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
