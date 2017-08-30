<div id="popup-home" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <div id="popup-home-close"></div>
        </div>
        <div class="modal-body">
            <p>Er du sikker på, at du vil helt tilbage til forsiden?</p>
            <div class="popup-home-yes-no">
                <img class="popup-home-no" onclick="$('#popup-home-close').trigger('click')" src="<?= Yii::getAlias('@web') . '/images/categories/popup-home-no.png' ?>" />
                <a href="<?= \yii\helpers\Url::to(['site/index']) ?>">
                    <img class="popup-home-yes" src="<?= Yii::getAlias('@web') . '/images/categories/popup-home-yes.png' ?>" />
                </a>
            </div>
        </div>
    </div>
</div>

