<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Doctor */
/* @var $model2 app\models\Speciality */
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

<div class="admin-index">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->label('ФИО')->input('text') ?>
        <?= $form->field($model2, 'name1')->label('Специальность')->input('text') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Добавить врача', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div>
