<?php

namespace app\controllers;

use app\models\ContactForm;
use app\models\Dings;
use app\models\Image;
use app\models\LoginForm;
use app\models\NiniCarousel;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use app\models\Tblimage;
use app\models\Tblproduct;
use app\models\TblGallery;
use app\models\GalleryImages;

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
                    'logout' => ['post'],
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
     * @return string
     */
    public function actionIndex()
    {
        $models=NiniCarousel::find()->where([])->limit(4)->all();
        return $this->render('index',["models"=>$models]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        $models=Image::find()->where(["id"=>2])->all();
        return $this->render('about',["models"=>$models]);
    }
    
    public function actionArt()
    {
        $models=Tblproduct::find()->all();
        return $this->render('art',["models"=>$models]);
    }
    
    public function actionPhotogallery()
    {
        $models=TblGallery::find()->all();
        return $this->render('photogallery',["models"=>$models]);
        
    }
    
    public function actionPhotodetail($id)
    {
        
        $model=TblGallery::find()->where(["id"=>$id])->one();
      
        return $this->render('photodetail',["model"=>$model]);
    }
}
