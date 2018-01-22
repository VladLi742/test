<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DoctorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Доктора';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-index">

    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p>-->
<!--        --><?//= Html::a(Yii::t('app', 'Create Doctor'), ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->
<?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'name',
                'label' => 'ФИО',
                'content' => function($data){
                    /** @var \app\models\Doctor $data */

                    return Html::a($data->name,['doctor/view', 'id'=>$data->id]);
                }

            ],
            [
                'attribute' => 'speciality.name',
                'label' => 'Профессия',

            ],
            [
                'header' => 'Запись по интернету',
                'class' => 'yii\grid\ActionColumn',
                'template' => '{appointment}',
                'buttons' => [
                    'appointment' => function($url, $model, $key) {
                        return Html::a('Записаться к врачу', ["doctor/{$model->id}"], ['class' => 'btn btn-success btn-block']);
                    }
                ]
            ]
        ],
    ]); ?>

<?php Pjax::end(); ?></div>
