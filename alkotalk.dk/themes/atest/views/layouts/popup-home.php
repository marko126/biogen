<div id="popup-home" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <h3 id="popup-home-close">X</h3>
        </div>
        <div class="modal-body">
            <p>Vil du starte testen forfra?</p>
            <div class="tac ja-nej-buttons">
                <a href="<?php echo Yii::app()->createUrl('/test/new'); ?>"><img class="ja-nej-button ja" src="<?php echo $baseUrl.'/images/questions/ja.png';?>" /></a>
                <img class="ja-nej-button nej" onclick="$('#popup-home-close').trigger('click')" src="<?php echo $baseUrl.'/images/questions/nej.png';?>" />
            </div>
        </div>
    </div>
</div>

