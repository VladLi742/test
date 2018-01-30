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
                'attribute' => $date ? 'id_speciality' : null,
                'label' => 'Кол-во свободных номерков',
                'value' => function($data) use ($date){
                    /** @var \app\models\Doctor $data */
                    $tomorrow = new DateTime('tomorrow');

                    return $date ? $data->freeDate($date, $data->id) : 'Номерков на завтра ' . $data->freeDate($tomorrow->format('Y-m-d'), $data->id);
                }

            ],
            [
                'label' => 'Запись по интернету',
                'content' => function($data) use ($date) {
                    /** @var \app\models\Doctor $model */
                    $condition = false;
                    $tomorrow = new DateTime('tomorrow');
                    $date = $date ? $date : $tomorrow->format('Y-m-d');
                    $qwe = $data->freeDate($date, $data->id);
                    if (gettype($qwe) == 'string') {
                        $condition = true;
                    }

                    return Html::submitButton('Записаться к врачу', ['class' => 'btn btn-success btn-block', 'disabled' => $condition]);
                },
            ]
        ],
    ]); ?>

<?php Pjax::end(); ?></div>
