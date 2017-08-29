<?php
use yii\helpers\Url;

?>
    <div id="menu" class="menu"> 
        <div class="menu-item menu-item-1">
            <a href="<?= Url::to(['site/category', 'id' => 1]) ?>">
                <div class="menu-item-img">
                    <img src="<?= Yii::getAlias('@web') . '/images/categories/menu-1.png' ?>" />
                </div>
                HVAD ER MS
            </a>
        </div>
        <div class="menu-item menu-item-2">
            <a href="<?= Url::to(['site/category', 'id' => 2]) ?>">
                <div class="menu-item-img">
                    <img src="<?= Yii::getAlias('@web') . '/images/categories/menu-2.png' ?>" />
                </div>
                SYMPTOMER
            </a>
        </div>
        <div class="menu-item menu-item-3">
            <a href="<?= Url::to(['site/category', 'id' => 3]) ?>">
                <div class="menu-item-img">
                    <img src="<?= Yii::getAlias('@web') . '/images/categories/menu-3.png' ?>" />
                </div>
                ÅRSAGER
            </a>
        </div>
        <div class="menu-item menu-item-4">
            <a href="<?= Url::to(['site/category', 'id' => 4]) ?>">
                <div class="menu-item-img">
                    <img src="<?= Yii::getAlias('@web') . '/images/categories/menu-4.png' ?>" />
                </div>
                HVEM FÅR MS
            </a>
        </div>
        <div class="menu-item menu-item-5">
            <a href="<?= Url::to(['site/category', 'id' => 5]) ?>">
                <div class="menu-item-img">
                    <img src="<?= Yii::getAlias('@web') . '/images/categories/menu-5.png' ?>" />
                </div>
                DIAGNOSEN
            </a>
        </div>
        <div class="menu-item menu-item-6">
            <a href="<?= Url::to(['site/category', 'id' => 6]) ?>">
                <div class="menu-item-img">
                    <img src="<?= Yii::getAlias('@web') . '/images/categories/menu-6.png' ?>" />
                </div>
                MS FORLØB
            </a>
        </div>
        <div class="menu-item menu-item-7">
            <a href="<?= Url::to(['site/category', 'id' => 7]) ?>">
                <div class="menu-item-img">
                    <img src="<?= Yii::getAlias('@web') . '/images/categories/menu-7.png' ?>" />
                </div>
                BEHANDLING
            </a>
        </div>
        <div class="menu-item menu-item-8">
            <a href="<?= Url::to(['site/category', 'id' => 8]) ?>">
                <div class="menu-item-img">
                    <img src="<?= Yii::getAlias('@web') . '/images/categories/menu-8.png' ?>" />
                </div>
                SELV GØRE
            </a>
        </div>
    </div>
    <div class="menu-text">
        <img src="<?= Yii::getAlias('@web') . '/images/categories/menu.png' ?>" />
    </div>

