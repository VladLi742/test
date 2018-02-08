<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $choiceServiceForm app\models\ChoiceServiceForm */
/* @var $model app\models\Service */

$this->title = 'Удаление услуги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-choice text-center">

    <h3><?= Html::encode('Удаление услуги') ?></h3>

    <?php $form = ActiveForm::begin([
        'options' => [
            'class' => 'col-lg-3 center-block',
            'style' => 'float: none',
        ]
    ])?>

    <?= $form->field($model, 'name') ?>

    <div class="form-group">
        <?= Html::submitButton('Удалить', ['class' => 'btn btn-primary', 'name' => 'find-button']) ?>
    </div>

    <?php ActiveForm::end();?>

</div>
