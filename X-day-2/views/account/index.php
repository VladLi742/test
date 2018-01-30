<?php
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

$dataProvider = new ActiveDataProvider([
    'query' => \app\models\Order::find()->where(['id_user' => Yii::$app->user->identity->id])
]);

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

<div class="account-index">
    <div class="personal-info clearfix">
        <div class="img-rounded pull-left">
            <img src="<?= \Yii::$app->user->identity->avatar ?>" alt="Ваш аватар" title="Ваш аватар" width="140" height="140">
        </div>
        <div class="center-block pull-right">
            <h2><?= \Yii::$app->user->identity->name ?></h2>
            <p>Ваш email: <span><?= \Yii::$app->user->identity->email ?></span></p>
        </div>
    </div>

    <div class="center-block">
        <h3 class="text-center">История приёмов</h3>
        <?php Pjax::begin(); ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
    //            'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'attribute' => 'doctor.name',
                        'label' => 'Доктор',
                    ],
                    [
                        'attribute' => 'date',
                        'label' => 'Дата приёма',
                    ],

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        <?php Pjax::end(); ?>
    </div>

</div>