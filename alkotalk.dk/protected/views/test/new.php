<?php
$this->css = 'test.css';
$baseUrl = Yii::app()->theme->baseUrl; 
$schools = [
    'Gymnasial uddannelse' => 'Gymnasial uddannelse',
    'Videregående uddannelse' => 'Videregående uddannelse',
    'Produktionsskole' => 'Produktionsskole',
    '9. klasse / 10. klasse' => '9. klasse / 10. klasse',
    'TAMU' => 'TAMU',
    'Erhvervsuddannelse' => 'Erhvervsuddannelse',
    'Ikke under uddannelse' => 'Ikke under uddannelse',
    'Andet' => 'Andet'
];

$class_animated = (isset($_COOKIE["info"]) && $_COOKIE["info"] == 1)?"":"animated pulse";
?>		
                <style type="text/css">
                        @import url("<?php echo $baseUrl.'/css/test-slick.css';?>");
                        @import url("<?php echo $baseUrl.'/css/popup.css';?>");
                        @import url("<?php echo $baseUrl.'/css/test-rangeslider.css';?>");
                        @import url("<?php echo $baseUrl.'/css/flash-animation.css';?>");
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
                                        <div id="general-questions">
                                                <div class="form-general-row" id="gender-row">
                                                    <label>DIT KØN:</label>
                                                    <div class="w100 fl">
                                                        <div class="form-general-row-radio tac" id="female-form-row">
                                                            <input type="radio" class="input-hidden" id="Test_gender_f" name="Test[gender]" value="f"/>
                                                            <div class="w100">
                                                                <label for="Test_gender_f">
                                                                    <img id="female-test-img" src="<?php echo $baseUrl.'/images/general-questions/female.png';?>"/>
                                                                </label>
                                                            </div>
                                                            <div class="w100">
                                                                PIGE
                                                            </div>
                                                        </div>
                                                        <div class="form-general-row-radio tac" id="man-form-row">
                                                            <input type="radio" class="input-hidden" id="Test_gender_m" name="Test[gender]" value="m"/>
                                                            <div class="w100">
                                                                <label for="Test_gender_m">
                                                                    <img id="man-test-img" src="<?php echo $baseUrl.'/images/general-questions/man.png';?>"/>
                                                                </label>
                                                            </div>
                                                            <div class="w100">
                                                                DRENG
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <img id="vertical-border" src="<?php echo $baseUrl.'/images/general-questions/border-vertical.png';?>"/>
                                                <div class="form-general-row" id="age-row">
                                                    <label>DIN ALDER:</label>
                                                    <input id="Test_age" name="Test[age]" type="text" value="21"><span>ÅR</span>
                                                    <button style="display:none">Change value</button>
                                                    <div id="test_rangeslider" class="w100">
                                                        <input type="range" min="16" max="25" data-rangeslider>   
                                                    </div>
                                                    <div id="test_rangeslider_number">
                                                        <div class="fl">16</div>
                                                        <div class="fr">25</div>
                                                    </div>
                                                </div>
                                                <img id="horizontal-border" src="<?php echo $baseUrl.'/images/general-questions/border-horizontal.png';?>"/>
                                                <div class="form-general-row" id="school-row">
                                                    <label>DIN SKOLE:</label>
                                                    <div class="w100">
                                                        <div class="fl">
                                                            <?php 
                                                                echo $form->dropDownList($model, 'school', $schools, ['prompt' => 'VÆLG SKOLE', ]);
                                                            ?>
                                                        </div>
                                                        <div class="fl">
                                                            <img id="test-school-img" src="<?php echo $baseUrl.'/images/general-questions/building.png';?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-general-row" style="margin-bottom: 6vw;">
                                                    <div id="next_button" class="next-button-disabled">
                                                            <div class="next-button-text"><span id="next_button_link" class="next-button-disabled-link">FORTSÆT</span></div>
                                                    </div>
                                                </div>
                                                <div class="fl w100 tac" style="margin-bottom: 6vw">
                                                    <div class="facebook-button">
                                                        <a href="http://www.facebook.com/alkotalk/" target="_blank"><img src="<?php echo $baseUrl.'/images/general/facebook.png';?>" /></a>
                                                    </div>
                                                    <div class="email-button">
                                                        <a href="mailto:sidu@laenke-ambulatorierne.dk" target="_blank"><img src="<?php echo $baseUrl.'/images/general/email.png';?>" /></a>
                                                    </div>
                                                    <div class="phone-button">
                                                        <a href="tel:+45 40 91 47 23" target="_blank"><img src="<?php echo $baseUrl.'/images/general/phone.png';?>" /></a>
                                                    </div>
                                                </div>
                                                <div class="footer">
                                                    <div class="fr disclaimer-div">
                                                            <div id="disclaimer" class="disclaimer">DISCLAIMER</div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div id="test-questions">
                                                <section class="regular slider">
                                                    <?php $i=1; ?>
                                                    <?php $test_questions = array(); ?>
                                                    <?php foreach ($questions as $question) { ?>
                                                        <div class="radio">
                                                                <div class="question-title" id="question<?php echo $i; ?>">
                                                                    <div class="question-title-row">
                                                                        <div class="number"><?php echo $i.'.'; ?></div>
                                                                        <div class="number-img">
                                                                            <img src="<?php echo $baseUrl.'/images/questions/'.$i.'-question-number.png';?>"/>
                                                                        </div>
                                                                        <div class="question-title-text"><?php echo $question->text; ?></div> 
                                                                    </div>
                                                                </div>
                                                                <div class="form-column">
                                                                    <?php $test_questions[$i] = new TestQuestion(); ?>
                                                                    <?php $j=1; ?>
                                                                    <?php 
                                                                        if (in_array($i, array(3, 6, 7))) {
                                                                            $answers = Answer::model()->findAll(array("condition" => "question_id = ".$question->id, "order" => "id DESC"));
                                                                        } else {
                                                                            $answers = Answer::model()->findAll(array("condition" => "question_id = ".$question->id)); 
                                                                            if ($i === 2) {
                                                                                $last = end($answers);
                                                                                array_unshift($answers, $last);
                                                                                array_pop($answers);
                                                                            }
                                                                        }
                                                                    ?>
                                                                    <?php echo CHtml::activeHiddenField($test_questions[$i],"[$i]question_id", ['value' => $question->id]); ?>
                                                                    <div class="form-column-half">    
                                                                        <?php foreach ($answers as $answer) { ?>
                                                                        <div class="form-row">
                                                                            <?php 
                                                                                echo in_array($i, array(5, 8))
                                                                                    ? CHtml::activeCheckBox($test_questions[$i], "[$i]answer_id[$j]", ['value' => $answer->id, 'id' => 'TestQuestion_'.$i.'_'.$j.'_answer_id', 'uncheckValue'=>null])
                                                                                    : CHtml::activeRadioButton($test_questions[$i], "[$i]answer_id", ['value' => $answer->id, 'id' => 'TestQuestion_'.$i.'_'.$j.'_answer_id', 'uncheckValue'=>null]); 
                                                                            ?>
                                                                            <?php echo CHtml::label($answer->text, 'TestQuestion_'.$i.'_'.$j.'_answer_id'); ?>
                                                                            <?php echo ($i == 5 && $j == 15) ? CHtml::textArea('answer_text['.$answer->id.']', '', ['disabled' => 'disabled']) : ''; ?>
                                                                        </div>
                                                                        <?php if (count($answers) > 3 && round(count($answers)/2) == $j) echo '</div><div class="form-column-half">'; ?>
                                                                        <?php $j++; ?>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                                <?php if ($i === 2) { ?>
                                                                <div id="genstand-logo" class="w100 tal">
                                                                    <img id="genstand-logo-img" src="<?php echo $baseUrl.'/images/questions/genstand-logo-img.png';?>" />
                                                                    <p>
                                                                        Hvor meget er en genstand?
                                                                    </p>
                                                                </div>
                                                                <?php } ?>
                                                                <?php if ($i === 4) { ?>
                                                                <div class="w100 tac test-bottles-many">
                                                                    <img src="<?php echo $baseUrl.'/images/questions/bottles-many.png';?>" style="width:70vw; margin:auto; margin-top: 38vw"/>
                                                                </div>
                                                                <?php } ?>
                                                                <?php if ($i === 5 || $i === 8) { ?>
                                                                <div class="w100 tar">
                                                                    <div class='question-next'><span class='question-next-a' id="question-<?php echo $i; ?>-next">næste</span></div>
                                                                </div>
                                                                <?php } ?>
                                                        </div>
                                                    <?php $i++; ?>
                                                    <?php }  ?>
                                                </section>
                                                <div class="footer">
                                                    <div class="fl">
                                                            <div id="tilbage" onclick='$("#test-questions").hide();$("#general-questions").show();'>TILBAGE</div>
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
                        
                        <!-- The Popup Genstand -->
                        <?php require_once dirname(__FILE__) . '/../../../themes/atest/views/layouts/popup-genstand.php'; ?>
                        
                        <!-- The Popup Home -->
                        <?php require_once dirname(__FILE__) . '/../../../themes/atest/views/layouts/popup-home.php'; ?>
                        
                        <!-- The Popup Disclaimer -->
                        <?php require_once dirname(__FILE__) . '/../../../themes/atest/views/layouts/popup-disclaimer.php'; ?>
		</div>
                <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
		<script src="<?php echo $baseUrl.'/slick/slick.js';?>" type="text/javascript" charset="utf-8"></script>
		<script src="<?php echo $baseUrl.'/js/test.js';?>" type="text/javascript"></script>
                <script src="<?php echo $baseUrl.'/js/rangeslider.js';?>" type="text/javascript"></script>
                <script type="text/javascript">
                        $('#female-form-row label').on('click', function(){
                            var img = '<?php echo $baseUrl.'/images/general-questions/man.png';?>';
                            var img_selected = '<?php echo $baseUrl.'/images/general-questions/female-selected.png';?>';
                            toggle('female-test-img', 'man-test-img', img, img_selected);
                        });
                        
                        $('#man-form-row label').on('click', function(){
                            var img = '<?php echo $baseUrl.'/images/general-questions/female.png';?>';
                            var img_selected = '<?php echo $baseUrl.'/images/general-questions/man-selected.png';?>';
                            toggle('man-test-img', 'female-test-img', img, img_selected);
                        });

                        function toggle(id, id2, img, img_selected){
                                $('#'+id).attr('src',img_selected);
                                $('#'+id2).attr('src',img);
                        }
                        $(window).trigger('resize');
                </script>
                    
                    
                    