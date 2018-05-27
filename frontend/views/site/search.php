<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use borales\extensions\phoneInput\PhoneInput;
use yii\widgets\MaskedInput;


$this->registerJsFile(Yii::getAlias("@web").'/js/search.js');
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script>>

<div class="centerbox">

    <h1>Пошук контаків випускників ІЛМ</h1>

    <!-- <p class="description">Use jQuery to select between search fields with a button combo box
      <br>By: <a href="https://twitter.com/freshmasterj" target="_blank">John McGarrah</a></p> -->

    <div class="main-form-container">

        <form id="" class="" method="post">

            <input type="text" class="main-input main-name" name="NAME"  value="Пошук по імені" onfocus="clearText(this)" onblur="replaceText(this)" />

            <input type="text" class="main-input main-location" name="LOCATION"  value="Пошук по місту" onfocus="clearText(this)" onblur="replaceText(this)" />

            <button type="button" class="main-btn"><p class="search-small">ШУКАТИ ПО</p><p class="search-large">Імені</p></button>

            <ul class="search-description">
                <li>
                    По місту
                </li>
                <li>
                    По імені
                </li>
            </ul>

            <input id="main-submit" class="" type="submit" value="Пошук" onclick="window.location.href='https://tbatsenko.github.io/ilm_database/search_results.html'"/>
        </form>
    </div>
</div>
<!-- mobile submit -->
<button type="button" id="main-submit-mobile"><a href="https://tbatsenko.github.io/ilm_database/search_results.html">Пошук</a></button>

