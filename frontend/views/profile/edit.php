<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */
/* @var $list array*/

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use borales\extensions\phoneInput\PhoneInput;
use yii\widgets\MaskedInput;


$this->title = 'Реєстрація';
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile(Yii::getAlias("@web").'/css/normalize.css');
$this->registerCssFile(Yii::getAlias("@web").'/css/form.css');
?>

<?php

$form = ActiveForm::begin([
        'id' => 'form-signup',
    'options'=> ['class'=> 'form-registration'],
    'fieldConfig' => [
        'options' => [
        'tag' => false,
            ],
        ],
    ]); ?>

    <ul class="flex-outer">

        <h2>Реєстрaція:</h2>

        <li>
            <label for="first-name">Ім'я</label>
            <?=   $form->field($model, 'name',['template' => '{input}']
                )->textInput(['placeholder'=>"Ведіть ваше Ім'я"])->label(false) ?>

        </li>
        <li>
            <label for="last-name">Прізвище</label>
            <?=   $form->field($model, 'surname',['template' => '{input}']
            )->textInput(['placeholder'=>"Введіть Ваше прізвище"])->label(false) ?>

        </li>
        <li>
            <label for="photo"><b>Фото</b></label>
            <?=  $form->field($model,"avatar",['template' => '{input}'])->fileInput()->label(false) ?>
<!--            <input type='file' onchange="readURL(this);" />-->
        </li>
        <img class="register-photo" id="blah" src="http://placehold.it/180" alt="your image" />
        <li>
            <label for="city">Область</label>
            <?=   $form->field($model, 'city',['template' => '{input}']
            )->dropDownList(\frontend\models\SignupForm::getCitites(),['prompt'=>"Виберіть область"])->label(false) ?>



        </li>

        <li>
            <label for="occupation">Посада</label>
            <?=   $form->field($model, 'chair',['template' => '{input}']
            )->textInput(['placeholder'=>"Введіть Вашу посаду"])->label(false) ?>


        </li>

        <li>
            <label for="company">Компанія / організація</label>
            <?=   $form->field($model, 'company',['template' => '{input}']
            )->textInput(['placeholder'=>"Введіть назву компанії / організації"])->label(false) ?>

        </li>

        <li>
            <label for="email">Email</label>
            <?=   $form->field($model, 'email',['template' => '{input}']
            )->textInput(['placeholder'=>"Введіть Ваш email"])->label(false) ?>


        </li>



        <li>
            <label for="facebook">Facebook</label>
            <?=   $form->field($model, 'facebook',['template' => '{input}']
            )->textInput(['placeholder'=>"Посилання на Вашу Facebook сторінку"])->label(false) ?>


        </li>

        <li>
            <label for="linkedin">LinkedIn</label>
            <?=   $form->field($model, 'linkedin',['template' => '{input}']
            )->textInput(['placeholder'=>"Посилання на Вашу LinkedIn сторінку"])->label(false) ?>

        </li>

        <li>
            <label for="phone">Телефон</label>
            <?=   $form->field($model, 'phone', ['template' => '{input}'])->widget(MaskedInput::className(),[
                'name' => 'input-1',
                'mask' => '(999) 999-9999'
            ]);?>


        </li>

        <li>
            <label for="message">Коротко про Вас</label>
            <?=   $form->field($model, 'bio',['template' => '{input}']
            )->textarea(['placeholder'=>"Коротко опишіть хто ви і чим займаєтесь"])->label(false) ?>


        </li>


        <li>
            <label for="program">Назва програми в ІЛУ</label>
            <?=   $form->field($model, 'ilm_program',['template' => '{input}']
            )->dropDownList(\common\models\Programs::getPrograms(),['prompt'=>"Введіть назву програми в ІЛУ де ви навчалися"])->label(false) ?>


        </li>

        <li>
            <label for="grad_year">Рік випуску з ІЛУ</label>
            <?=   $form->field($model, 'ilm_year',['template' => '{input}']
            )->input('number',['placeholder'=>"Введіть рік випуску з ІЛУ", "min"=>2004])->label(false) ?>

        </li>

        <li>
            <?= Html::submitButton('Зберегти зміни', ['name' => 'signup-button']) ?>

        </li>
    </ul>
<?php ActiveForm::end(); ?>

