<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\MsdActivationCode;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
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
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        } else {
            return $this->redirect(['site/categories']);
        }

    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['msdactivationcode/update']);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $id = Yii::$app->user->identity->getId();
            $model = MsdActivationCode::findOne(['actcodeid' => $id]);
            if ($model->first_login == 1) {
                $model->first_login = 0;
                $model->save();
                return $this->redirect(['msdactivationcode/update']);
            } else {
                return $this->redirect(['site/categories']);
            }
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(['site/login']);
    }

    /**
     * Displays categories page.
     *
     * @return string
     */
    public function actionCategories()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }
        
        $categories = Yii::$app->settings->categories;
        $slides = Yii::$app->settings->slides;
        
        $this->layout = 'categories';
        
        return $this->render('categories', [
            'user' => Yii::$app->user->identity,
            'categories' => $categories,
            'slides' => $slides
        ]);
    }
    
    /**
     * 
     * @param type $id
     * @return type
     */
    public function actionCategory($id, $slide = 'first')
    {
        if ($id < 1 && $id > 6) {
            return $this->redirect('site/categories');
        }
        
        $this->layout = 'categories';
        
        $category = Yii::$app->settings->categories[$id];
        //$categories = Yii::$app->settings->categories;
        
        return $this->render('category', [
            'id' => $id,
            'slide' => $slide,
            'category' => $category,
            //'categories' => $categories
        ]);
    }
}
