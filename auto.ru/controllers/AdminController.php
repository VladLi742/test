<?php

namespace app\controllers;

use app\models\AddServiceForm;
use app\models\ChoiceServiceForm;
use app\models\DeleteService;
use app\models\Order;
use app\models\OrderSearch;
use app\models\ShowService;
use Yii;
use app\models\Service;
use app\models\ServiceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * AdminController implements the CRUD actions for Service model.
 */
class AdminController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        if (Yii::$app->user->identity->login !== 'admin') {
            $this->goBack();
        }
        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }

    /**
     * Lists all Service models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionChoice()
    {
        $choiceServiceForm = new ChoiceServiceForm();

//        if ($choiceServiceForm->load(Yii::$app->request->post())) {
//            $choiceServiceForm->validateDate();
//            return $this->redirect(['index',
//                'id_speciality' => $choiceServiceForm->id,
//                'date' => $choiceServiceForm->date,
//            ]);
//        }

        return $this->render('choice', [
            'choiceServiceForm' => $choiceServiceForm,
        ]);
    }

    public function actionAddService()
    {
        $model = new AddServiceForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->addInDb()) {
                \Yii::$app->session->setFlash('success', 'Вы добавили услугу.');
                return $this->redirect(['admin/index']);
            } else {
                \Yii::$app->session->setFlash('error', 'Не удалось добавить услугу.');
            }
        }

        return $this->render('add-service', [
           'model' => $model,
        ]);
    }

    public function actionShowService()
    {
        $searchModel = new ServiceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDeleteService()
    {
        $model = new DeleteService();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validateName()) {
                \Yii::$app->session->setFlash('success', 'Услуга была удалена.');
                return $this->redirect(['admin/index']);
            } else {
                \Yii::$app->session->setFlash('error', 'Не удалось удалить услугу.');
            }
        }

        return $this->render('delete-service', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Service model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Service model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Service();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Service model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Service model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Service model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Service the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Service::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
