<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MsdActivationCode */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="msd-activation-code-form">

    <?php $form = ActiveForm::begin([
        'id' => 'update-form',
        
    ]); ?>
    
    <div>
        <?= Html::activeLabel($model, 'hospital_name', ['class' => 'col-lg-3']); ?>
        <div class="col-lg-9">
            <?= $form->field($model, 'hospital_name')->textInput(['maxlength' => true])->label(false) ?>
            <?= Html::error($model, 'hospital_name') ?>
        </div>
    </div>
    
    <div>
        <?= Html::activeLabel($model, 'section_name', ['class' => 'col-lg-3']); ?>
        <div class="col-lg-9">
            <?= $form->field($model, 'section_name')->textInput(['maxlength' => true])->label(false) ?>
            <?= Html::error($model, 'section_name') ?>
        </div>
    </div>
    
    <div>
        <?= Html::activeLabel($model, 'doctor_name', ['class' => 'col-lg-3']); ?>
        <div class="col-lg-4">
            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true])->label(false) ?>
            <?= Html::error($model, 'first_name') ?>
        </div>
        <div class="col-lg-5">
            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true])->label(false) ?>
            <?= Html::error($model, 'last_name') ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-12">
            <?= Html::submitButton('Forsæt', ['class' => 'btn btn-primary update-button']) ?>
        </div>
    </div>
    
    <div class="col-lg-9 update-footer" style="float: right">
        Hvis du senere får behov for at lave ændringer, så klik på tandhjulet på den efterfølgende side
    </div>

    <?php ActiveForm::end(); ?>

</div>
