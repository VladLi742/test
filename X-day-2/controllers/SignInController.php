<?php

namespace app\controllers;

use Yii;
use app\models\Users;
use yii\web\UploadedFile;
use Faker\Factory;

class SignInController extends \yii\web\Controller
{


    public function beforeAction($action)
    {
        return parent::beforeAction($action);
    }


    public function actionIndex()
    {
        $model = new \app\models\Users();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                return;
            }
        }

        return $this->render('index', [
            'model' => $model,
            'name' => $name,
        ]);
    }

    public function actionUpload()
    {
        $model = new Users();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }

        return $this->render('upload', ['model' => $model]);
    }

}
