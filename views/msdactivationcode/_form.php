<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MsdActivationCode */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="msd-activation-code-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'section_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doctor_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hospital_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'activation_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'createdate')->textInput() ?>

    <?= $form->field($model, 'tokenid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tokendate')->textInput() ?>

    <?= $form->field($model, 'deviceid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'devicetype')->textInput() ?>

    <?= $form->field($model, 'first_login')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
