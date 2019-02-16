<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\entities\UsersProfiles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-profiles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'middle_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'birdthday')->widget(\yii\jui\DatePicker::className(), [
        //'language' => 'ru',
        //'dateFormat' => 'yyyy-MM-dd',
    ])->textInput() ?>

    <?= $form->field($model, 'date_up')->textInput() ?>

    <?= $form->field($model, 'group')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active')->checkbox()->label('active') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
