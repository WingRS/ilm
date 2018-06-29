<?php
/**
 * Created by PhpStorm.
 * User: StasMaster
 * Date: 26.06.18
 * Time: 15:37
 */

namespace frontend\controllers;


use common\models\User;
use frontend\models\Profile;
use yii\filters\AccessControl;
use yii\web\Controller;

class ProfileController extends Controller
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
                    ],
                    [
                        'actions' => ['view'],
                        'allow' => true,
                        'roles' => ['@']
                    ],
                    [
                        'actions' => ['edit'],
                        'allow' => true,
                        'roles' => ['@']
                    ],
                ],
            ],

        ];
    }

    public function actionIndex() {
        $model = User::findById(\Yii::$app->user->id);
        return $this->render("profile",
            [
                "model"=> $model
            ]
        );
    }



    public function actionView($id) {
        $model = User::findById($id);
        if($model == null) {
            $this->redirect("/");
        }

        return $this->render("profile",
            [
                "model"=> $model
            ]
        );
    }

    public function actionEdit() {
        $model = Profile::findById(\Yii::$app->user->id);

        if( $model->load(\Yii::$app->request->post()) ) {
            if( $model->signup()) {
               return $this->render("edit",
                   [
                       "model"=> $model
                   ]);
            }else {
                return var_dump(\Yii::$app->request->post());
            }
        }

        return $this->render("edit",
            [
                "model"=> $model
            ]
        );
    }


}