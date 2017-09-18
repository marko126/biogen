<div class="category-item slide-4-7" id="slide-4-7">
    <div class="slide-container">
        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 slide-part-left">
            <div>
                <img src="<?= Yii::getAlias('@web') . '/images/categories/4-7-1.png' ?>" />
            </div>
            <ul>
                <li>Ved en <span><?= strtoupper('Neurofysiologisk undersØgelse') ?></span> måles nerveimpluserne</li>
                <li>Hastigheden i <span><?= strtoupper('nervebanerne') ?></span> udregnes</li>
                <li>Forsinkelser ved <span><?= strtoupper('MS plak') ?></span> i central-nervesystemet</li>
            </ul>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 slide-part-right">
            <img src="<?= Yii::getAlias('@web') . '/images/categories/4-7-2.gif' ?>" id="gif-4-7" />
            <img src="<?= Yii::getAlias('@web') . '/images/categories/info.gif' ?>" class="popup-info-icon" id="popup-4-7-info" />
        </div>
        <?= $this->render('_4_7_popup') ?>
    </div>
</div>