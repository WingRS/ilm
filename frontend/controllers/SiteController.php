<?php
namespace frontend\controllers;

use common\models\Programs;
use common\models\SearchQuary;
use common\models\User;
use common\models\UserSearch;
use Yii;
use yii\base\InvalidParamException;
use yii\data\ActiveDataProvider;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\UploadedFile;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup', 'index'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ],
            ],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->redirect("/site/search");
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {

        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        $list = $this->getPrograms();
        if ($model->load(Yii::$app->request->post())) {
//            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
//            if(!$model->upload()) {
//                return   Yii::getAlias("@webroot")."kek";
//            }
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }else {

                return var_dump(Yii::$app->request->post());
            }
        }

        return $this->render('signup', [
            'model' => $model,
            'list' => $list
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }


    public function actionSearch() {
        if(Yii::$app->user->isGuest) {
            $this->goHome();
        }
        $region = "Україна";
        $model = new UserSearch();
        $dataProvider = new ActiveDataProvider();


//        $model->globalSearch = Yii::$app->request->getQueryParam("globalSearch");
        $render = false;
        if($this->addHistory()) {
            $model->globalSearch = $this->getValue();
            $dataProvider = $model->search(Yii::$app->request->queryParams, $this->getRegion());
            $render = true;
        }
        return $this->render("search", [
            "model" => $model,
            'dataProvider' => $dataProvider,
            'render' => $render,
            "region" => $this->getRegion()
        ]);
    }


    /**
     * help functions
     * @param UserSearch $model
     * @param UserSearch $searchText
     * @return ActiveDataProvider
     **/

    public function actionQuery() {
        $model = new SearchQuary();
        $model->created_at = time();
        $model->quary = Yii::$app->request->queryParams;
        $model->user_id = Yii::$app->user->getId();
        if($model->save()) {

        }
        else {

        }
    }
    private function addHistory() {
        $history = new SearchQuary();
        $history->created_at = time();
        $history->user_id = Yii::$app->user->id;

        $query = Yii::$app->request->queryString;
        parse_str($query, $get_array);
        if(empty($get_array["UserSearch"])) {
            return true;
        }
        $query = $get_array["UserSearch"]["globalSearch"];
        $query2 = $get_array["UserSearch"]["region"];

        if(empty($query) && empty($query2)) {
            return true;
        }
        $history->quary =$query;
        $history->region = $query2;
        if($history ->save()) {

            return true;
        }
        return false;
    }



    private function getValue() {


        $query = Yii::$app->request->queryString;
        parse_str($query, $get_array);
        if(empty($get_array["UserSearch"])) {
            return "";
       }
        $query = $get_array["UserSearch"]["globalSearch"];
        $query2 = $get_array["UserSearch"]["region"];

        if(empty($query) && empty($query2)) {
            return "";
        }
        return $query;
    }
    private function getRegion() {


        $query = Yii::$app->request->queryString;
        parse_str($query, $get_array);
        if(empty($get_array["UserSearch"])) {
            return "";
       }
        $query = $get_array["UserSearch"]["globalSearch"];
        $query2 = $get_array["UserSearch"]["region"];

        if(empty($query) && empty($query2)) {
            return "";
        }
        return $query2;
    }

    private function check() {
        $query = Yii::$app->request->queryString;
        parse_str($query, $get_array);
        if(empty($get_array["UserSearch"])) {
            return false;
        }
        if($get_array["UserSearch"]["globalSearch"] == "") {
            return false;
        }
        return true;
    }


    private function getPrograms() {
        $models = Programs::findAll([ "is_active"=>true]);
        $list = array();
        foreach ($models as $model) {
            $list[$model->program_name] = $model->program_name;
        }
        return $list;
    }
}
