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


$this->registerJsFile(Yii::getAlias("@web").'/js/search.js');
$this->registerJsFile(Yii::getAlias("@web").'/js/include.js');
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script>>

<div class="centerbox">

    <h1>Пошук контаків випускників ІЛМ</h1>

    <!-- <p class="description">Use jQuery to select between search fields with a button combo box
      <br>By: <a href="https://twitter.com/freshmasterj" target="_blank">John McGarrah</a></p> -->

    <div class="main-form-container">

        <?php $form = ActiveForm::begin(['id' => 'search-form',
            'action' => ['search'],
            'method' => 'get',]); ?>
        <?= $form->field($model, 'globalSearch',['template' => '{input}'
            ])->textInput(['autofocus' => true, 'class'=>'main-input main-name', 'placeholder'=>'Пошук', 'onfocus'=>"clearText(this)",  'onblur'=>'replaceText(this)'])->label(false) ?>
<!--            <input type="text" class="main-input main-name" name="NAME"  value="Пошук по імені" onfocus="clearText(this)" onblur="replaceText(this)" />-->

<!--            <input type="text" class="main-input main-location" name="LOCATION"  value="Пошук по місту" onfocus="clearText(this)" onblur="replaceText(this)" />-->

        <?= $form->field($model, 'region',['template' => '{input}'
        ])->textInput(['autofocus' => true, 'class'=>'main-input main-location'])->label(false) ?>




        <button type="button" class="main-btn"><p class="search-small">Місто</p><p class="search-large">Місто</p></button>
        <ul class="search-description">
            <li>
                Калуш
            </li>
            <li>
                Львів
            </li>
            <li>
                Городок
            </li>
        </ul>

            <?= Html::submitButton('Пошук', ['id'=>'main-submit']) ?>
<!--            <input id="main-submit" class="" type="submit" value="Пошук" onclick="window.location.href='https://tbatsenko.github.io/ilm_database/search_results.html'"/>-->
        <?php ActiveForm::end(); ?>
    </div>
</div>

<!-- mobile submit -->
<button type="button" id="main-submit-mobile"><a href="https://tbatsenko.github.io/ilm_database/search_results.html">Пошук</a></button>
<?if($dataProvider->count>0) : ?>
    <?php $models = $dataProvider->models;
            foreach ($models as $user) {
                if($user->city=="Львів") {
                    continue;
                }
                echo "<br>".$user->name."</br>";

            }

    ?>

<?else: ?>
    <?php var_dump($dataProvider) ?>
<?endif; ?>
