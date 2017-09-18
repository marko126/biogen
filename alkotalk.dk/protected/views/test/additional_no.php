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
    <?php 
        $test_questions[$i] = new TestQuestion(); 
        $j=1; 
        $answers = Answer::model()->findAll(array("condition" => "question_id = ".$question->id)); 
        echo CHtml::activeHiddenField($test_questions[$i],"[$i]question_id", ['value' => $question->id]); 
    ?>
    <div class="form-column-half">    
        <?php 
            foreach ($answers as $answer) {
                echo '<div class="form-row">';
                echo CHtml::hiddenField('answer_'.$question->id.'_'.$answer->id, '', ['id' => 'answer_'.$question->id.'_'.$answer->id]);
                if ($i == 1) {
                    echo CHtml::activeRadioButton($test_questions[$i], "[$i]answer_id", ['value' => $answer->id, 'id' => 'TestQuestion_'.$i.'_'.$j.'_answer_id', 'uncheckValue'=>null]);
                } else {
                    echo CHtml::activeCheckBox($test_questions[$i], "[$i]answer_id[$j]", ['value' => $answer->id, 'id' => 'TestQuestion_'.$i.'_'.$j.'_answer_id', 'uncheckValue'=>null]);
                }
                echo CHtml::label($answer->text, 'TestQuestion_'.$i.'_'.$j.'_answer_id');
                echo ($i == 2 && $j == 9) ? CHtml::textArea('answer_text['.$answer->id.']', '', ['disabled' => 'disabled']) : '';
                
                echo '</div>';
                if (count($answers) > 3 && round(count($answers)/2) == $j) {
                    echo '</div><div class="form-column-half">'; 
                }
                $j++;
            }
        ?>
    </div>
</div>
                                                            
<?php if ($i === 1) { ?>
<div class="w100 tal">
    <div class="question-title">
        <p>Må vi kontakte dig senere for at høre om dine alkoholvaner?</p>
        <p>Indtast mail eller tlf.</p>
        <?php echo Chtml::textField('Test[email_phone][1]', '') ?>
    </div>
</div>

<div class="w100 tar">
    <div class='question-next'><span class='question-next-a' id="question-<?php echo $i; ?>-next">næste</span></div>
</div>
<?php } ?>
                                                            
<?php if ($i === 2) { ?>
<div class="w100 tar" id="submit-test-div">
    <div class='question-next' style="width: initial"><span class='question-next-a' id="submit-test">Afslut test</span></div>
</div>
<div class="result-advanced-social" style="display:none">
    <div class="w100 tac">
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
</div>
<div class="comparison-div gode-rad-button" style="display:none">
    <div id="next_button" class="next-button">
        <div class="next-button-text">
            <span id="next_button_link_comparison" class="next-button-link" style="padding: 2vw 2vw;">GODE RÅD</span>
        </div>
    </div>
</div>
<?php } ?>