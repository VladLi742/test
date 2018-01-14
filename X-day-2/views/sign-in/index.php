<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//\app\assets\AppAsset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form ActiveForm */
?>
<div class="sign-in-index">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->label('ФИО') ?>
        <?= $form->field($model, 'email')->label('E-mail')->input('email') ?>
        <?= $form->field($model, 'password')->label('Пароль')->input('password') ?>
        <?= $form->field($model, 'imageFile')->label('Загрузить аватар')->fileInput() ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Зарегистироваться'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div>

<?= $this->registerJsFile('@web/js/sign-in/index.js', ['depends' => 'yii\web\YiiAsset']);?>