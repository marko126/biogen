<div class="category-item slide-6-12">
    <div class="slide-container">
        <div class="col-lg-6 slide-part-left">
            <div class="slide-6-12-title">
                <?= strtoupper('OVERAKTIV <br>BLÆREMUSKEL') ?>
            </div>
            <img src="<?= Yii::getAlias('@web') . '/images/categories/6-12-1.png' ?>" />
            <div class="slide-6-12-body">
                <ul>
                    <li>Stærk vandladningtrang</li>
                    <li>Hyppig vandladning</li>
                    <li>Ufrivillig vandladning</li>
                    <li>Natlig vandladningstrang</li>
                </ul>
            </div>
        </div>
        <div class="col-lg-6 slide-part-right">
            <div class="slide-6-12-title">
                <?= strtoupper('Ubalance mellem blære-<br>muskel & lukkemuskel') ?>
            </div>
            <img src="<?= Yii::getAlias('@web') . '/images/categories/6-12-2.png' ?>" />
            <div class="slide-6-12-body">
                <ul>
                    <li>Nedsat blæretømning</li>
                    <li>Hyppig vandladning</li>
                    <li>Natlig vandladningstrang</li>
                    <li>OBS - urinvejsinfektion</li>
                </ul>
            </div>
        </div>

        <img src="<?= Yii::getAlias('@web') . '/images/categories/help.gif' ?>" id="popup-6-12-help" class="popup-help-icon" />
        <img src="<?= Yii::getAlias('@web') . '/images/categories/back-icon.gif' ?>" id="slide-6-12-back" class="back-icon" />
        <?= $this->render('_6_12_popup') ?>
    </div>
</div>
    