<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Doctors');
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
                'attribute' => 'speciality',
                'value' => 'speciality.name',
                'label' => 'Профессия',

            ],
            [
                'attribute' => 'fired',
                'label' => 'Уже не работает',
            ],
        ],
    ]); ?>

<?php Pjax::end(); ?></div>
