<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    
    <link rel="stylesheet" type="text/css" href="<?= Yii::getAlias('@web') . '/slick/slick.css' ?>"/>
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="<?= Yii::getAlias('@web') . '/slick/slick-theme.css' ?>"/>
    <link rel="stylesheet" type="text/css" href="<?= Yii::getAlias('@web') . '/css/popup.css' ?>"/>
    
    <script src="//code.jquery.com/jquery-2.2.4.min.js" type="text/javascript"></script>
    
    <script type="text/javascript" src="<?= Yii::getAlias('@web') . '/js/main.js' ?>" ></script>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <div class="container">
       
        <?= $content ?>
        
    </div>
</div>

<footer class="footer">
    
        <p class="pull-left left-arrow"><img src="<?= Yii::getAlias('@web') . '/images/left-arrow.png' ?>" style="height: 30px" /></p>
        <p class="pull-right right-arrow"><img src="<?= Yii::getAlias('@web') . '/images/right-arrow.png' ?>" style="height: 30px" /></p>
    
</footer>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<?php
if (class_exists('yii\debug\Module')) {
    $this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
}
?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>