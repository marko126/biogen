<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MsdActivationCode */

$this->title = $model->actcodeid;
$this->params['breadcrumbs'][] = ['label' => 'Msd Activation Codes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="msd-activation-code-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->actcodeid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->actcodeid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Da li sigurno želite da obrišete ovu stavku?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'actcodeid',
            'section_name',
            'doctor_name',
            'hospital_name',
            'activation_code',
            'status',
            'createdate',
            'tokenid',
            'tokendate',
            'deviceid',
            'devicetype',
            'first_login',
        ],
    ]) ?>

</div>
