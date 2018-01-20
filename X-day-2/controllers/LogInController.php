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
            $isGuest = \Yii::$app->user->isGuest;
            if ($isGuest && $email) {
                \Yii::$app->user->login($email);
                return $this->refresh();
            }
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

}
