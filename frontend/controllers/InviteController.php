<?php
/**
 * Created by PhpStorm.
 * User: StasMaster
 * Date: 28.06.18
 * Time: 19:20
 */

namespace frontend\controllers;


use common\models\Invitation;
use common\models\Programs;
use common\models\Test;
use frontend\models\SignupForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\UploadedFile;

class InviteController extends Controller
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


    public function actionSignup($invite)
    {
        $inviteModel = Invitation::getByInvite($invite);
        if ($inviteModel == null) {
            $this->redirect("/");
        }
        $model = new SignupForm();
        $list = Programs::getPrograms();
        $model->email = $inviteModel->email;

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
//            if(!$model->upload()) {
//                return   Yii::getAlias("@webroot")."kek";
//            }
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    $inviteModel->used_at = time();
                    $inviteModel->is_active = false;
                    if ($inviteModel->save()) {
                        return $this->redirect("/");
                    }
                }
            } else {

                return var_dump(Yii::$app->request->post());
            }
        }

        return $this->render('signup', [
            'model' => $model,
            'list' => $list
        ]);

    }


    public function actionIndex()
    {
        if (Yii::$app->request->post()) {
            $model = new Test();
            $model->text = Yii::$app->request->post();
            if ($model->save()) {
                return "true" . $model->text;
            }
        }else {
            $model = new Test();
            $model->text = "idi nahui";
            if($model->save()) {
                return "false";
            }
        }


    }
}