<?php
$this->css = 'test.css';
$baseUrl = Yii::app()->theme->baseUrl; 
$class_animated = (isset($_COOKIE["info"]) && $_COOKIE["info"] == 1)?"":"animated pulse";
?>		
                <style type="text/css">
                        @import url("<?php echo $baseUrl.'/css/test-slick.css';?>");
                        @import url("<?php echo $baseUrl.'/css/popup.css';?>");
                        @import url("<?php echo $baseUrl.'/css/test-rangeslider.css';?>");
                        @import url("<?php echo $baseUrl.'/css/flash-animation.css';?>");
                        * {
                            box-sizing: border-box;
                        }
                        .result-advanced-social img {
                            display: inline;
                        }
		</style>
		<div id="header">
                        <img id="header-home-img" src="<?php echo $baseUrl.'/images/general/home-icon.png';?>"/>
			<img id="header-img" src="<?php echo $baseUrl.'/images/general/header.png';?>"/>
                        <img id="header-logo-img" class="<?php echo $class_animated; ?>" src="<?php echo $baseUrl.'/images/general/header-logo.png';?>"/>
		</div>
		<div id="content-1">
			<div id="test-container">
                                <?php $form=$this->beginWidget('CActiveForm', array(
                                        'id'=>'test-form',
                                        // Please note: When you enable ajax validation, make sure the corresponding
                                        // controller action is handling ajax validation correctly.
                                        // There is a call to performAjaxValidation() commented in generated controller code.
                                        // See class documentation of CActiveForm for details on this.
                                        'enableAjaxValidation'=>false,
                                )); ?>
                                        <?php //echo CHtml::hiddenField('TestQuestion[0][question_id]', 10); ?>
                                        <?php //echo CHtml::hiddenField('TestQuestion[0][answer_id]', Yii::app()->user->getState('testAnswer1')); ?>
                                        <?php echo CHtml::hiddenField('answer_10_'.Yii::app()->user->getState('testAnswer1'), Yii::app()->user->getState('testAnswer1')); ?>
                                        <div id="test-questions-additional">
                                                <section class="regular slider">
                                                    <?php $i=1; ?>
                                                    <?php $test_questions = array(); ?>
                                                    <?php foreach ($questions as $question) { ?>
                                                        <div class="radio">
                                                                <?php $this->renderPartial($additional_view, array('question' => $question, 'i' => $i, 'baseUrl' => $baseUrl)); ?>
                                                        </div>
                                                    <?php $i++; ?>
                                                    <?php }  ?>
                                                </section>
                                                <div class="footer">
                                                    <div class="fl">
                                                        <div id="tilbage" style="display:none" onclick=''>TILBAGE</div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div id="footer-test">
                                                <img src="<?php echo $baseUrl.'/images/general-questions/footer-test.png';?>"/>
                                        </div>
					
                                        <div style="display:none">
                                            <input type="submit" name="yt0" id="submit-test" value="Create">	
                                        </div>
                                <?php $this->endWidget(); ?>
			</div>
                    
                        <!-- The Popup Info -->
                        <?php require_once dirname(__FILE__) . '/../../../themes/atest/views/layouts/popup-info.php'; ?>
                        
                        <!-- The Popup Home -->
                        <?php require_once dirname(__FILE__) . '/../../../themes/atest/views/layouts/popup-home.php'; ?>
		</div>
                <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
		<script src="<?php echo $baseUrl.'/slick/slick.js';?>" type="text/javascript" charset="utf-8"></script> 
                <script src="<?php echo ($answer1 == 58) ? $baseUrl.'/js/additional_yes.js' : $baseUrl.'/js/additional_no.js';?>" type="text/javascript"></script>
                <script src="<?php echo $baseUrl.'/js/rangeslider.js';?>" type="text/javascript"></script>
                <script type="text/javascript">
                        function toggle(id, id2, img, img_selected){
                                $('#'+id).attr('src',img_selected);
                                $('#'+id2).attr('src',img);
                        }
                        $(window).trigger('resize');
                </script>   
                <script type="text/javascript">
                // event when submit test button is clicked
                //console.log('vrednost: '+$("#TestQuestion_1_1_answer_id").val());
                $('#submit-test').on('click', function(){
                    $.post(
                        '<?php echo Yii::app()->createUrl("test/createadditional") ?>',
                        {
                            email_phone_1: $("#Test_email_phone_1").val(),
                            email_phone_3: $("#Test_email_phone_3").val(),
                            email_phone_4: $("#Test_email_phone_4").val(),
                            answer_text_11_68: $("#answer_text_68").val(),
                            answer_text_15_85: $("#answer_text_85").val(),
                            answer_10_58: $("#answer_10_58").val(),
                            answer_10_59: $("#answer_10_59").val(),
                            <?php 
                            foreach ($questions as $question) {
                                $answers = Answer::model()->findAll(array("condition" => "question_id = ".$question->id));
                                foreach ($answers as $answer) {
                                    if ($answer->id == 85) {
                                        echo 'answer_'.$question->id.'_'.$answer->id.': $("#answer_'.$question->id.'_'.$answer->id.'").val()';
                                    } else {
                                        echo 'answer_'.$question->id.'_'.$answer->id.': $("#answer_'.$question->id.'_'.$answer->id.'").val(), ';
                                    }
                                }
                            }
                            ?>
                        },
                        function(data){
                            if (data == "success") {
                                $("#submit-test-div").attr('style','display: none');
                                $(".result-advanced-social").removeAttr("style");
                                $(".gode-rad-button").removeAttr("style");
                                window.scrollTo(0,document.body.scrollHeight);
                            }
                        }
                    );
                   
                });
                $('.next-button-link').on('click', function(){
                    window.location = '<?php echo Yii::app()->createAbsoluteUrl("test/viewAdditionalResult") ?>';
                });
                </script>                   
                    