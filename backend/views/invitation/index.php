<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\InvitationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Запрошення';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invitation-index">

    <h1><?= Html::encode($this->title) ?></h1>
<!--        --><?//= parse_ini_file("/home/smtp.ini")["pass"] ?>

    <p>
        <?= Html::a('Створити запрошення', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'email:email',

            [
                'attribute' => 'created_at',
                'label' => 'Дата',
                'value' => 'created_at',
                'format' => ['date', 'php:Y-m-d H:i:s']
            ],
            [
                'attribute' => 'is_active',
                'label' => 'Статус активності',
                'value' => function($dataProvider) {
                    if($dataProvider['is_active']) {
                        return  'Активна';
                    }
                    return 'Неактивна';
                }
            ],
            [
                'attribute' => 'used_at',
                'label' => 'Дата використання',
                'value' => 'used_at',
                'format' => ['date', 'php:Y-m-d H:i:s']
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
