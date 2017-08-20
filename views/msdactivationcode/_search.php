<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MsdActivationCodeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="msd-activation-code-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'actcodeid') ?>

    <?= $form->field($model, 'section_name') ?>

    <?= $form->field($model, 'doctor_name') ?>

    <?= $form->field($model, 'hospital_name') ?>

    <?= $form->field($model, 'activation_code') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'createdate') ?>

    <?php // echo $form->field($model, 'tokenid') ?>

    <?php // echo $form->field($model, 'tokendate') ?>

    <?php // echo $form->field($model, 'deviceid') ?>

    <?php // echo $form->field($model, 'devicetype') ?>

    <?php // echo $form->field($model, 'first_login') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
