<?php

namespace app\controllers;

use app\models\Doctor;
use app\models\Speciality;
use yii\web\Controller;

class AdminController extends Controller
{
    public function actionIndex() {
        $model = new Doctor();
        $model2 = new Speciality();

        if ($model->load(\Yii::$app->request->post()) && $model->load(\Yii::$app->request->post())) {
            $model2 = $model->id_speciality;
            if ($model->save() && $model2->save()) {
                \Yii::$app->session->setFlash('success', 'Был добавлен новый врач');
                return $this->refresh();
            } else {
                \Yii::$app->session->setFlash('error', 'Не удалось добавить врача. Попробуйте заново либо позднее.');
            }
        }

        return $this->render('index', [
            'model' => $model,
            'model2' => $model2,
        ]);
    }
}