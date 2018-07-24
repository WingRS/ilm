<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\User */

$this->title = $model->name." ".$model->surname;

$this->registerCssFile(Yii::getAlias("@web").'/css/user_profile.css');
$this->registerCssFile(Yii::getAlias("@web").'/css/search_res.css');
?>



<div class="row">
    <div class="col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
        <div class="well profile">
            <div class="col-sm-12">
                <div class="col-xs-12 col-sm-8">
                    <h2> <?= $model->name." ".$model->surname ?></h2>
                    <p><strong>Посада: </strong> <?= $model->chair  ?> </p>
                    <p><strong>Компанія: </strong> <?= $model->company  ?> </p>
                    <p><strong>Про мене: </strong> <?= $model->bio  ?> </p>
                    <p><strong>Область: </strong> <?= $model->city ?> </p>
                    <p><strong>Телефон: </strong> <?= $model->phone ?> </p>
                    <p><strong>Програма ІЛУ: </strong> <?= $model->ilm_program ?></p>
                    <p><strong>Рік випуску з ІЛУ: </strong> <?= $model->ilm_year ?> </p>



                </div>
                <div class="col-xs-12 col-sm-4 text-center">
                    <figure>
                        <img src="http://placehold.it/200x200" alt="user" class="img-circle img-responsive">
                    </figure>
                </div>
            </div>
            <div class="col-xs-12 divider text-center">
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h2><strong> Facebook </strong></h2>
                    <p><small>---</small></p>
                    <a class="btn btn-success btn-block" href="<?= $model->facebook ?>"><span class="fa fa-plus-circle"></span> Профіль </a>
                </div>
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h2><strong>LinkedIn</strong></h2>
                    <p><small>---</small></p>
                    <a class="btn btn-info btn-block" href="<?= $model->linkedin  ?>"><span class="fa fa-user"></span> Профіль</a>
                </div>
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h2><strong>Email</strong></h2>
                    <p><small><?= $model->email ?></small></p>
                    <div class="btn-group dropup btn-block">
                        <a class="btn btn-info btn-block" href="mailto:<?= $model->email ?>"><span class="fa fa-user"></span> Написати </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>