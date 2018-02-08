<?php

namespace app\controllers;

use app\models\SignInForm;
use app\models\User;
use yii\web\UploadedFile;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

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
                'only' => ['logout', 'profile', 'signIn', 'logIn'],
                'rules' => [
                    [
                        'actions' => ['logout', 'profile'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['signIn', 'logIn'],
                        'allow' => true,
                        'roles' => ['?'],
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
        return $this->render('index');
    }

    /**
     * Sign-in action.
     *
     */
    public function actionSignIn()
    {
        $model = new SignInForm();
        $user = new User();

        $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
        $model->avatar = "uploads/images/{$user->login}";

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                Yii::$app->session->setFlash('success', 'Вы успешно зарегистрировались.');
                return $this->redirect(['site/log-in']);
            }
        }

        return $this->render('sign-in', [
            'model' => $model,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogIn()
    {
        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if ($model->login === 'admin') {
                return $this->redirect(['admin/']);
            } else {
                return $this->redirect(['site/profile']);
            }
        }

        return $this->render('log-in', [
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

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
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
     * Displays user's profile.
     *
     * @return string
     */
    public function actionProfile()
    {
        return $this->render('profile');
    }
}
