<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\helpers\Url;

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
    
        <p class="pull-left">
            <?php if (Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'categories'): ?>
            <a href="<?= Url::toRoute('site/settings') ?>">
                <img src="<?= Yii::getAlias('@web') . '/images/categories/settings-icon.png' ?>" style="height: 30px" />
            </a>
            <?php endif; ?>
        </p>
        <p class="pull-right">I samarbejde med<img src="<?= Yii::getAlias('@web') . '/images/Biogen-logo.png' ?>" style="height: 40px" /></p>
    
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
