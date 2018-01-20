<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\SignInForm;
use app\models\UploadForm;
use yii\web\UploadedFile;

class SignInController extends \yii\web\Controller
{
    public function beforeAction($action)
    {
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        $model = new User();
        $signInForm = new SignInForm();
        $uploadForm = new UploadForm();

        if ($signInForm->load(Yii::$app->request->post())) {
//            $model->password;
            $uploadForm->avatar = UploadedFile::getInstance($uploadForm, 'avatar');

            if (!$uploadForm->upload()) {
                Yii::$app->session->setFlash('error', 'Не удалось загрузить аватар');
            } else {
                if ($signInForm->save() && $uploadForm->save()) {
                    Yii::$app->session->setFlash('success', 'Вы зарегистрировались');
                    return $this->refresh();
                } else {
                    Yii::$app->session->setFlash('error', 'Ошибка');
                }
            }
        }

        return $this->render('index', [
            'model' => $model,
            'uploadForm' => $uploadForm,
            'signInForm' => $signInForm,
        ]);
    }
}
