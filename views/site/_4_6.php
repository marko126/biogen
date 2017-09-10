<div class="category-item slide-4-6" id="slide-4-6">
    <div class="slide-container">
        <div class="col-lg-6 slide-part-left">
            <div>
                <img src="<?= Yii::getAlias('@web') . '/images/categories/4-6-1.png' ?>" />
            </div>
            <ul>
                <li>Undersøgelse af rygmarvsvæsken kaldes også for <span><?= strtoupper('lumbalpunktur') ?></span></li>
                <li>Undersøgelse af den <span><?= strtoupper('vÆske') ?></span>, der omgiver hjernen og rygmarve</li>
                <li>Typiske <span><?= strtoupper('antistoffer') ?></span> i rygmarvsvæsken</li>
            </ul>
        </div>
        <div class="col-lg-6 slide-part-right">
            <img src="<?= Yii::getAlias('@web') . '/images/categories/4-6-2.png' ?>" />
            <img src="<?= Yii::getAlias('@web') . '/images/categories/info.gif' ?>" class="popup-info-icon" id="popup-4-6-info" />
        </div>
        <?= $this->render('_4_6_popup') ?> 
    </div>
</div>