<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Doctor */
/* @var $order app\models\Order */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Доктора', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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

<div class="doctor-view">

    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p>-->
<!--        --><?//= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--        --><?//= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
//                'method' => 'post',
//            ],
//        ]) ?>
<!--    </p>-->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'speciality.name',
                'label' => 'Специальность',

            ],
            [
                'attribute' => 'name',
                'label' => 'ФИО',
            ],
            [
                'attribute' => 'fired',
                'label' => 'Всё ещё работает',
                'value' => $model->fired ? 'Доступен для записи' : 'Запись не возможна',
            ],
//            [
//                'label' => 'Записаться на приём',
//                'format' => 'raw',
//                'value' => function($model) {
////                    return Html::submitButton('Записаться',['class' => 'btn btn-success']);
//                    return DatePicker::widget([
//                        'name' => 'appointment',
//                        'options' => [
//                            'placeholder' => 'Введите дату',
//                        ],
//                        'clientOptions' => [
//                            'minDate' => 1,
//                            'maxDate' => 30,
//                            'onSelect' => new \yii\web\JsExpression('function(dateText, inst) {
//                                $.ajax({
//                                  url: "models/Order.php",
//                                  success: function(dateText){
//                                    alert(dateText);
//                                  }
//                                });
////                              $(this).val("dateText");
//                                console.log(dateText, inst)
//                            }'),
//                        ],
//                        'dateFormat' => 'dd/MM/yyyy',
//                    ]);
//                },
//            ],
        ],
    ]) ?>
    <?php $form = ActiveForm::begin()?>

    <?= $form->field($order, 'date')->widget(DatePicker::className(),
        [
            'name' => 'appointment',
            'options' => [
                'placeholder' => 'Введите дату',
            ],
            'clientOptions' => [
                'minDate' => 1,
                'maxDate' => 30,
//                'onSelect' => new \yii\web\JsExpression('function(dateText, inst) {
//                    $.ajax({
//                      url: "models/Order.php",
//                      success: function(dateText){
//                        alert(dateText);
//                      }
//                    });
//                    $(this).val("dateText");
//                    console.log(dateText, inst)
//                }'),
            ],
            'dateFormat' => 'yyyy-MM-dd',
        ])->label('Дата')
    ?>

    <div class="form-group">
        <?= Html::submitButton('Проверить желаемую дату', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

    <?php ActiveForm::begin()?>
        <div class="form-group">
            <?= Html::submitButton('Записаться на приём', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
