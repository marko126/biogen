<div class="category-item slide-4-7">
    <div class="slide-container">
        <div class="col-lg-6 slide-part-left">
            <div>
                <img src="<?= Yii::getAlias('@web') . '/images/categories/4-7-1.png' ?>" />
            </div>
            <ul>
                <li>Ved en <span><?= strtoupper('Neurofysiologisk undersøgelse') ?></span>måles nerveimpluserne</li>
                <li>Hastigheden i <span><?= strtoupper('nervebanerne') ?></span>udregnes</li>
                <li>Forsinkelser ved <span><?= strtoupper('MS plak') ?></span> i central-nervesystemet</li>
            </ul>
        </div>
        <div class="col-lg-6 slide-part-right">
            <img src="<?= Yii::getAlias('@web') . '/images/categories/4-7-2.gif' ?>" id="gif-4-7" />
            <img src="<?= Yii::getAlias('@web') . '/images/categories/info.gif' ?>" class="popup-info-icon" id="popup-4-7-info" />
        </div>
        <?= $this->render('_4_7_popup') ?>
    </div>
</div>