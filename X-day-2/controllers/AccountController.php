<?php

namespace app\controllers;

use app\models\OrderSearch;
use app\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class AccountController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);
        $model = new User();
        foreach (\Yii::$app->user->identity as $temp) {
            $user[] = $temp;
        };

        return $this->render('index', [
            'model' => $model,
            'user' => $user,
        ]);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}