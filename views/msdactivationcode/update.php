<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MsdActivationCode */

$this->title = 'Update Msd Activation Code: ' . $model->actcodeid;
?>
<div class="msd-activation-code-update">

    <div class="title-update-data">INDSTILLINGER</div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
