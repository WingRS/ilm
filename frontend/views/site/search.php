<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\UserSearch*/
/* @var $dataProvider \yii\data\ActiveDataProvider */
/* @var $result bool */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use borales\extensions\phoneInput\PhoneInput;
use yii\widgets\MaskedInput;
if($model->globalSearch !="") {
    $this->title = $model->globalSearch;
}else {
    $this->title = "Пошук серед випускників ІЛУ";
}

$this->registerJsFile(Yii::getAlias("@web").'/js/search.js');
$this->registerJsFile(Yii::getAlias("@web").'/js/include.js');
$this->registerCssFile(Yii::getAlias("@web").'/css/search_res.css');
$this->registerCssFile(Yii::getAlias("@web").'/css/results.css');
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script>





<div class="search__container">

    <h1>Пошук контаків випускників ІЛУ</h1>

    <!-- <p class="description">Use jQuery to select between search fields with a button combo box
      <br>By: <a href="https://twitter.com/freshmasterj" target="_blank">John McGarrah</a></p> -->
    <div class="container my-container">
    <div class="main-form-container">

        <?php $form = ActiveForm::begin(['id' => 'search-form',
            'action' => ['search'],
            'method' => 'get',]); ?>
        <?= $form->field($model, 'globalSearch',['template' => '{input}'
            ])->textInput(['autofocus' => true, 'class'=>'main-input main-name', 'placeholder'=>'Пошук'])->label(false) ?>
<!--            <input type="text" class="main-input main-name" name="NAME"  value="Пошук по імені" onfocus="clearText(this)" onblur="replaceText(this)" />-->

<!--            <input type="text" class="main-input main-location" name="LOCATION"  value="Пошук по місту" onfocus="clearText(this)" onblur="replaceText(this)" />-->

        <?= $form->field($model, 'region',['template' => '{input}'
        ])->textInput(['autofocus' => true, 'class'=>'main-input main-location'])->label(false) ?>




        <button type="button" class="main-btn"><p class="search-small">Регіон</p><p class="search-large"><?= $region ?></p></button>
        <ul class="search-description">
            <li>Україна</li>
            <?php

                foreach(\frontend\models\SignupForm::getCitites() as $city) {
                    echo "<li> ". str_replace("область", "", $city)."</li>";
                }

            ?>
        </ul>

            <?= Html::submitButton('Пошук', ['id'=>'main-submit']) ?>
<!--            <input id="main-submit" class="" type="submit" value="Пошук" onclick="window.location.href='https://tbatsenko.github.io/ilm_database/search_results.html'"/>-->
        <?php ActiveForm::end(); ?>
    </div>
<button type="button" id="main-submit-mobile"><a href="https://tbatsenko.github.io/ilm_database/search_results.html">Пошук</a></button>
    </div>

    <!-- mobile submit -->
    <?php if($render){   if($dataProvider->count>0) {
   echo '<ul class="card">';

       $models = $dataProvider->models;
      foreach ($models as $user){
//          if($region != "Україна" && str_replace("область", "" ,$user->city)  != $region) {
//
//            continue;
//          }
          echo   "<li class='search-item'>
                <div class='search-item__image' style='background-image: url(http://placehold.it/100x100);'></div>
                <div class='search-item__content'>
                    <p class='text--medium'>
                        ".  $user->surname." ". $user->name."

                    </p>
                    <p class='text--small text--muted'>
                      ".$user->company .", ".$user->chair ." Область: ".  $user->city."
                    </p>
                    <p class='text--small '><a href='". $user->facebook ."'>Facebook </a> </p>
                </div>
                <div class='search-item__options'>
                    <a class='btn btn-success btn-block' href='/profile/view/".$user->id."'>Профіль<a/>
                </div>
            </li>"; }

   echo '</ul>'; }
    else{
       echo ' <div class="text--center">
            <p class="text--small text--muted">No more results.</p>
        </div> ';
     } }?>



</div>





