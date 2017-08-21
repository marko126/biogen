<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'DANSK MULTIPEL SCLEROSE Center';
?>
<div class="categories">
    <div class="row">
        <div class="category-subtitle col-lg-8">
            <?= Html::encode(strtoupper($this->title)) ?>
        </div>
        <div class="category-title col-lg-4">
            <div>
                <?= strtoupper($user->getFirstName()) ?>
            </div>
            <div>
                <?= strtoupper($user->getLastName()) ?>
            </div>
            
            <span>
                <?= strtoupper($user->getHospitalName()) ?>
            </span>
        </div>
    </div>
</div>
<div class="categories-container">
    <div class="category-menu-item col-lg-3">
        <a href="<?= Url::to(['site/category', 'id' => 1]) ?>">
            <div class="category-menu-item-container">
                <img src="<?= Yii::getAlias('@web') . '/images/categories/Hvad-er-multipel-sclerose.png' ?>" />
                <div class="category-menu-text">
                    <?= strtoupper('Hvad er Multipel Sclerose') ?>
                </div>
            </div>
        </a>
    </div>
    <div class="category-menu-item col-lg-3">
        <a href="<?= Url::to(['site/category', 'id' => 2]) ?>">
            <div class="category-menu-item-container">
                <img src="<?= Yii::getAlias('@web') . '/images/categories/Arsager-til-multipel-sclerose.png' ?>" />
                <div class="category-menu-text">
                    <?= strtoupper('Årsager til Multipel Sclerose') ?>
                </div>
            </div>
        </a>
    </div>
    <div class="category-menu-item col-lg-3">
        <a href="<?= Url::to(['site/category', 'id' => 3]) ?>">
            <div class="category-menu-item-container">
                <img src="<?= Yii::getAlias('@web') . '/images/categories/Hvordan-rammer-ms.png' ?>" />
                <div class="category-menu-text padding-30">
                    <?= strtoupper('hvordan Rammer MS') ?>
                </div>
            </div>
        </a>
    </div>
    <div class="category-menu-item col-lg-3">
        <a href="<?= Url::to(['site/category', 'id' => 4]) ?>">
            <div class="category-menu-item-container">
                <img src="<?= Yii::getAlias('@web') . '/images/categories/Hvordan-stilles-diagnosen.png' ?>" />
                <div class="category-menu-text">
                    <?= strtoupper('hvordan stilles Diagnosen') ?>
                </div>
            </div>
        </a>
    </div>
    <div class="category-menu-item col-lg-3">
        <a href="<?= Url::to(['site/category', 'id' => 5]) ?>">
            <div class="category-menu-item-container">
                <img src="<?= Yii::getAlias('@web') . '/images/categories/Multipel-sclerose-forlob.png' ?>" />
                <div class="category-menu-text">
                    <?= strtoupper('Multipel Sclerose forløb') ?>
                </div>
            </div>
        </a>
    </div>
    <div class="category-menu-item col-lg-3">
        <a href="<?= Url::to(['site/category', 'id' => 6]) ?>">
            <div class="category-menu-item-container">
                <img src="<?= Yii::getAlias('@web') . '/images/categories/Behandling-af-multipel-sclerose.png' ?>" />
                <div class="category-menu-text">
                    <?= strtoupper('Behandling af Multipel Sclerose') ?>
                </div>
            </div>
        </a>
    </div>
    <div class="category-menu-item col-lg-3">
        <a href="<?= Url::to(['site/category', 'id' => 7]) ?>">
            <div class="category-menu-item-container">
                <img src="<?= Yii::getAlias('@web') . '/images/categories/Multipel-sclerose-symptomer.png' ?>" />
                <div class="category-menu-text">
                    <?= strtoupper('Multipel Sclerose symptomer') ?>
                </div>
            </div>
        </a>
    </div>
    <div class="category-menu-item col-lg-3">
        <a href="<?= Url::to(['site/category', 'id' => 8]) ?>">
            <div class="category-menu-item-container">
                <img src="<?= Yii::getAlias('@web') . '/images/categories/Hvad-kan-jeg-selv-gore.png' ?>" />
                <div class="category-menu-text padding-30">
                    <?= strtoupper('hvad kan jeg selv gøre') ?>
                </div>
            </div>
        </a>
    </div>
</div>
