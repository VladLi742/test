<?php

namespace app\controllers;

use app\models\DoctorSearch;
use app\models\Order;
use app\models\Speciality;
use app\models\SpecialityForm;
use Yii;
use app\models\Doctor;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use DateTime;

/**
 * DoctorController implements the CRUD actions for Doctor model.
 */
class DoctorController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Doctor models.
     * @return mixed
     */
    public function actionIndex($id_speciality = null, $date = null)
    {
        $searchModel = new DoctorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new Doctor();

        if (isset($id_speciality)) {
            $dataProvider->query->where(['id_speciality' => $id_speciality]);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'date' => $date,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Doctor model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = new Doctor();
        $order = new Order();

        if ($order->load(Yii::$app->request->post())) {
            $order->id_user = Yii::$app->user->id;
            $order->id_doctor = $id;
            if ($order->save()) {
                Yii::$app->session->setFlash('success', 'Запись сделана');
                $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Запись не удалась');
            }
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
            'order' => $order,
        ]);
    }

    /**
     * Creates a new Doctor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Doctor();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionChoice()
    {
        $specialityForm = new SpecialityForm();

        if ($specialityForm->load(Yii::$app->request->post())) {
            $specialityForm->validateDate();
                return $this->redirect(['index',
                    'id_speciality' => $specialityForm->id,
                    'date' => $specialityForm->date,
                ]);
        }

        return $this->render('choice', [
            'specialityForm' => $specialityForm,
        ]);
    }

    public function actionConfirm($id = null, $date = null)
    {
        $model = $this->findModel($id);
        $order = new Order();

        if (Yii::$app->request->post()) {
            $order->id_user = Yii::$app->user->id;
            $order->id_doctor = $model->id;
            $order->date = $date;

            if ($order->save()) {
                Yii::$app->session->setFlash('success', 'Запись сделана');
                $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Запись не удалась');
            }
        }

        return $this->render('confirm', [
            'date' => $date,
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Doctor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Doctor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Doctor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Doctor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Doctor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
