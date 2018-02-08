<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Service */

$this->title = 'Добавление услуги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-choice text-center">

    <h3><?= Html::encode('Добавление услуги') ?></h3>

    <?php $form = ActiveForm::begin([
        'options' => [
            'class' => 'col-lg-3 center-block',
            'style' => 'float: none',
        ]
    ])?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'start_date')->input('date') ?>

    <?= $form->field($model, 'final_date')->input('date') ?>

    <?= $form->field($model, 'places') ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'name' => 'find-button']) ?>
    </div>

    <?php ActiveForm::end();?>

</div>
