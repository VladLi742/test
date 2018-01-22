<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\SignInForm;
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

        if ($signInForm->load(Yii::$app->request->post())) {
            $hashedPassword = Yii::$app->getSecurity()->generatePasswordHash($signInForm->password);
            $signInForm->password = $hashedPassword;
            $signInForm->password_repeat = $hashedPassword;

            $signInForm->imageFile = UploadedFile::getInstance($signInForm, 'imageFile');
            $signInForm->avatar = "uploads/{$signInForm->imageFile->name}";

                if ($signInForm->save()) {
                    Yii::$app->session->setFlash('success', 'Вы зарегистрировались');
                    return $this->refresh();
                } else {
                    Yii::$app->session->setFlash('error', 'Ошибка');
                }
            }


        return $this->render('index', [
            'model' => $model,
            'signInForm' => $signInForm,
        ]);
    }
}
