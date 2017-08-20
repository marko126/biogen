<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MsdActivationCodeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Msd Activation Codes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="msd-activation-code-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Msd Activation Code', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'actcodeid',
            'section_name',
            'doctor_name',
            'hospital_name',
            'activation_code',
            // 'status',
            // 'createdate',
            // 'tokenid',
            // 'tokendate',
            // 'deviceid',
            // 'devicetype',
            // 'first_login',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
