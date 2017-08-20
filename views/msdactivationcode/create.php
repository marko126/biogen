<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MsdActivationCode */

$this->title = 'Create Msd Activation Code';
$this->params['breadcrumbs'][] = ['label' => 'Msd Activation Codes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="msd-activation-code-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
