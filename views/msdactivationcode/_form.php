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
        <?= Html::activeLabel($model, 'hospital_name', ['class' => 'col-lg-3 col-md-3 col-sm-3 col-xs-3']); ?>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
            <?= $form->field($model, 'hospital_name')->textInput(['maxlength' => true, 'placeholder' => $model->hospital_name, 'onclick' => 'this.placeholder=""', 'value' => ''])->label(false) ?>
        </div>
    </div>
    
    <div>
        <?= Html::activeLabel($model, 'section_name', ['class' => 'col-lg-3 col-md-3 col-sm-3 col-xs-3']); ?>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
            <?= $form->field($model, 'section_name')->textInput(['maxlength' => true, 'placeholder' => $model->section_name, 'onclick' => 'this.placeholder=""', 'value' => ''])->label(false) ?>
        </div>
    </div>
    
    <div>
        <?= Html::activeLabel($model, 'doctor_name', ['class' => 'col-lg-3 col-md-3 col-sm-3 col-xs-3']); ?>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true, 'placeholder' => $model->first_name, 'onclick' => 'this.placeholder=""', 'value' => ''])->label(false) ?>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true, 'placeholder' => $model->last_name, 'onclick' => 'this.placeholder=""', 'value' => ''])->label(false) ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <?= Html::submitButton('Forsæt', ['class' => 'btn btn-primary update-button']) ?>
        </div>
    </div>
    
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 update-footer" style="float: right">
        Hvis du senere får behov for at lave ændringer, så klik på tandhjulet på den efterfølgende side
    </div>

    <?php ActiveForm::end(); ?>

</div>
