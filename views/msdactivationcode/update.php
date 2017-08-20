<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MsdActivationCode */

$this->title = 'Update Msd Activation Code: ' . $model->actcodeid;
$this->params['breadcrumbs'][] = ['label' => 'Msd Activation Codes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->actcodeid, 'url' => ['view', 'id' => $model->actcodeid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="msd-activation-code-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
