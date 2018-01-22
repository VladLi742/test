<?php

namespace app\controllers;

use app\models\User;

class LogInController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new User();
        if ($model->load(\Yii::$app->request->post())) {
            $email = User::findByEmail($model->email);
            $hash = User::findPassword($model->password)->getAttribute('password');

            if (($hash == $model->password) && $email) {
                \Yii::$app->user->login(User::findByEmail($model->email));

                return $this->redirect(['account/']);
            } else {

            }
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

}
