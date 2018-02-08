<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */

$this->title = 'Панель администратора';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <section class="center-block">
        <p>
            <?= Html::a('Добавить услугу', ['add-service'], ['class' => 'btn btn-success btn-lg']) ?>
        </p>
        <p>
            <?= Html::a('Показать услугу', ['show-service'], ['class' => 'btn btn-success btn-lg']) ?>
        </p>
        <p>
            <?= Html::a('Удалить услугу', ['delete-service'], ['class' => 'btn btn-success btn-lg']) ?>
        </p>
    </section>

    <?php Pjax::end(); ?>
</div>
