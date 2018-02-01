<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DoctorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model app\models\Doctor */

$this->title = 'Форма записи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-confirm">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if( Yii::$app->session->hasFlash('success')):?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?= Yii::$app->session->getFlash('success');?>
        </div>
    <?php endif; ?>
    <?php if (Yii::$app->session->hasFlash('error')) :?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?= Yii::$app->session->getFlash('error');?>
        </div>
    <?php endif; ?>

    <?= \yii\widgets\DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'name',
                'label' => 'ФИО',
            ],
            [
                'attribute' => 'speciality.name',
                'label' => 'Специальность',
            ],
            [
                'value' => function($data) use ($date) {
                    /** @var \app\models\Doctor $data */
                    return $date;
                },
                'label' => 'Дата приёма',
            ],
//            [
//                'label' => 'Запись по интернету',
//                'format' => 'raw',
//                'value' => '<button class="btn btn-success" type="submit">Записаться к врачу</button>',
//            ],
        ]
    ])?>

    <?php ActiveForm::begin()?>
    <div class="form-group">
        <?= Html::submitButton('Записаться на приём', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
