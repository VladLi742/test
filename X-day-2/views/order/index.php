<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Orders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>-->
<!--        --><?//= Html::a(Yii::t('app', 'Create Order'), ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'doctor',
                'value' => 'doctor.name',
                'label' => 'Доктор',

            ],
            [
                'attribute' => 'user',
                'value' => 'user.name',
                'label' => 'Пациент',

            ],
            [
                'attribute' => 'date',
                'value' => 'date',
                'label' => 'Дата приёма',

            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
