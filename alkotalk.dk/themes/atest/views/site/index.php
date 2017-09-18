 <?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$baseUrl = Yii::app()->theme->baseUrl; 
$this->css = 'splash.css';
?>
<style>
    .ath-container p {
        color: #000;
    }
</style>
<style>
    @import url("<?php echo $baseUrl.'/css/popup.css';?>");
</style>
<script  src="<?php echo $baseUrl.'/js/splash.js'; ?>"></script> 

	<img id="logo-splash" src="<?php echo $baseUrl.'/images/splash-screen/logo.png'; ?>" style="top: 100%"/>
        <button style="visibility: hidden;border: 0;position: absolute;"></button>
        <div id="splash-screen">
                <div class="splash-div-1">
                    <p>
                            TEST OG SAMMENLIGN DIT ALKOHOLFORBRUG MED ANDRE UNGE
                    </p>
                    <div class="tac">
                            <img src="<?php echo $baseUrl.'/images/splash-screen/people.png'; ?>"/>
                    </div>
                </div>
                <div class="tac">
			<p class="splash-div-2 w100">
				Find også ud af, hvordan alkohol påvirker din
			</p>
                        <div class="splash-div-2 w100">
				<img src="<?php echo $baseUrl.'/images/splash-screen/money-weight-training.png'; ?>"/>
                        </div>
                        <div class="splash-div-3 w100">
                                <div class="start-button">
                                        <div class="start-button-text"><a href="<?php echo Yii::app()->createUrl('test/new'); ?>">START TESTEN</a></div>
                                </div>
                        </div>
                        <div class="splash-div-4 w100" id="footer-logo-img">
                                <img src="<?php echo $baseUrl.'/images/splash-screen/small-bottom-logo.png'; ?>" />
                                <div class="splash-div-5">AlkoTalk er en alkoholtest til unge fra 16 år.<br> Klik og læs mere.</div>
                        </div>
                        <div class="footer-line"></div>
		</div>
                <!-- The Popup Info-->
                <?php require_once dirname(__FILE__) . '/../layouts/popup-info.php'; ?>
        </div>
        <script>
            $('#footer-logo-img').on('click', function(){
                setPopupEvent('popup-info', 'footer-logo-img', 'popup-info-close');
            });
        </script>
	

		