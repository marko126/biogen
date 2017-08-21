<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <img src="<?= Yii::getAlias('@web') . '/images/login-logo.png' ?>" class="site-login-ms-dialog" />

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-12\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-12'],
        ],
    ]); ?>

        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Indtast aktiveringskoden']) ?>

        <div class="form-group">
            <div class="col-lg-12">
                <?= Html::submitButton('Lås op', ['class' => 'btn btn-primary login-button', 'name' => 'login-button']) ?>
                <img src="<?= Yii::getAlias('@web') . '/images/login-key.png' ?>" class="login-key" />
            </div>
        </div>

    <?php ActiveForm::end(); ?>

</div>
