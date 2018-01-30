<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\LoginForm;
use yii\base\Security;

class LogInController extends \yii\web\Controller
{
    public function actionIndex()
    {
//        $model = new User();
//        if ($model->load(\Yii::$app->request->post())) {
//            $identity = User::findOne(['email' => $model->email]);
//            $password = User::findIdentityByAccessToken($model->password);
//            $hash = \Yii::$app->getSecurity()->generatePasswordHash($password);
//            var_dump($identity->getAttribute('password'));
//            var_dump($hash);

//            if ($identity) {
//                \Yii::$app->user->login($identity);
//                return $this->redirect(['account/']);
//            } else {
//
//            }
//        }
//
//        return $this->render('index', [
//            'model' => $model,
//        ]);

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
//        WwSsRr
        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post())) {
            $identity = User::findOne(['email' => $model->email]);

            $hash = $identity->getAttribute('password');
            $user = $model->getUser();
            var_dump($user->validatePassword($model->password));
            if (Yii::$app->getSecurity()->validatePassword($model->password, $hash)) {
//                var_dump($model);
                if ($model->login()) {

                    return $this->goBack();
                }
            }

        }
        return $this->render('index', [
            'model' => $model,
        ]);
    }

}
