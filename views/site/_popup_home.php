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
                <img class="popup-home-yes" src="<?= Yii::getAlias('@web') . '/images/categories/popup-home-yes.png' ?>" onclick="$('.slider').slick('slickGoTo', 0, true);$('#popup-home-close').trigger('click');"/>
            </div>
        </div>
    </div>
</div>

