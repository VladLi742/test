<?php

namespace app\controllers;

use app\models\User;
use yii\web\Controller;

class AccountController extends Controller
{
    public function actionIndex()
    {
        $model = new User();

        return $this->render('index',[
           'model' => $model,
        ]);
    }
}