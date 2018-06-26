<?php
/**
 * Created by PhpStorm.
 * User: StasMaster
 * Date: 26.06.18
 * Time: 15:37
 */

namespace frontend\controllers;


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
                    ]
                ],
            ],

        ];
    }

    public function actionProfile() {

    }
}