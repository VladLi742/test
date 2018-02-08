<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ServiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Services';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php if (Yii::$app->user->identity->login === 'admin') :?>
        <p>
            <?= Html::a('Create Service', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif; ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'name',
                'label' => 'Услуга',
            ],
            [
                'attribute' => 'date',
                'label' => 'Дата окончания',
            ],
            [
                'attribute' => 'places',
                'label' => 'Кол-во свободных мест',
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
