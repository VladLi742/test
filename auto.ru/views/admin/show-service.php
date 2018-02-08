<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ServiceSearch */
/* @var $dataProvider app\models\Service */

$this->title = 'Добавление услуги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-choice text-center">

    <h3><?= Html::encode('Добавление услуги') ?></h3>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
    //        'filterModel' => $searchModel,
            'columns' => [
//                [
//                    'attribute' => 'service.name',
//                    'label' => 'Услуга',
//                ],
//                [
//                    'attribute' => 'user.name',
//                    'label' => 'Пользователь',
//                ],
//                [
//                    'attribute' => 'date',
//                    'label' => 'Дата активации',
//                ],
//                [
//                    'attribute' => 'service.places',
//                    'label' => 'Оставшихся мест',
//                    'content' => function($data) {
//
//                    }
//                ],
            ],
        ]); ?>

</div>
