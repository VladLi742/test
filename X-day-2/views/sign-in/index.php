<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $signInForm app\models\SignInForm */
/* @var $uploadForm app\models\UploadForm */
/* @var $form ActiveForm */
?>

<?php if( Yii::$app->session->hasFlash('success')):?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?= Yii::$app->session->getFlash('success');?>
    </div>
<?php endif; ?>
<?php if (Yii::$app->session->hasFlash('error')) :?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?= Yii::$app->session->getFlash('error');?>
    </div>
<?php endif; ?>

<div class="sign-in-index">

    <?php $form = ActiveForm::begin()?>

        <?= $form->field($signInForm, 'name')->label('ФИО') ?>
        <?= $form->field($signInForm, 'email')->label('E-mail')->input('email') ?>
        <?= $form->field($signInForm, 'password')->label('Пароль')->input('password') ?>
        <?= $form->field($signInForm, 'password_repeat')->label('Подтверждение пароля')->input('password') ?>
        <?= $form->field($uploadForm, 'avatar')->label('Загрузить аватар')->fileInput() ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Зарегистироваться'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div>

<?= $this->registerJsFile('@web/js/sign-in/index.js', ['depends' => 'yii\web\YiiAsset']);?>