<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $choiceServiceForm app\models\ChoiceServiceForm */

$this->title = 'Выбор услуги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-choice text-center">

    <h3><?= Html::encode('Выберите специальность нужного вам врача и дату') ?></h3>

    <?php $form = ActiveForm::begin([
        'options' => [
            'class' => 'col-lg-3 center-block',
            'style' => 'float: none',
        ]
    ])?>

        <?= $form->field($choiceServiceForm, 'id')->dropDownList(ArrayHelper::map(
            \app\models\Speciality::find()->all(), 'id', 'name'
        ), ['prompt' => 'Выберите специальность врача']) ?>

        <?= $form->field($choiceServiceForm, 'date')->input('date') ?>

    <div class="form-group">
        <?= Html::submitButton('Найти', ['class' => 'btn btn-primary', 'name' => 'find-button']) ?>
    </div>

    <?php ActiveForm::end();?>

</div>
