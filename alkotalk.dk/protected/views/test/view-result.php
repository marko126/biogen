<?php
$this->css = 'result.css';
$baseUrl = Yii::app()->theme->baseUrl; 
?>	
                <style type="text/css">
                        @import url("<?php echo $baseUrl.'/css/popup.css';?>");
		</style>
                <div id="header">
                    <img id="header-home-img" src="<?php echo $baseUrl.'/images/general/home-icon.png';?>"/>
                    <img id="header-img" src="<?php echo $baseUrl.'/images/general/header.png';?>"/>
                    <img id="header-logo-img" src="<?php echo $baseUrl.'/images/general/header-logo.png';?>"/>    
                    <p id="header-title" class="tac"><?php echo "RESULTAT"; ?></p>
		</div>
		<div id="content-1">
                    <div id="result-container">
                        <div class="result-container-col">
                            <div class="result-div">
                                <img src="<?php echo $baseUrl.'/images/results/result-bottles-'.$resultType->id.'.png'; ?>" class="w100"/>
                            </div>
                            <div class="result-div">
                                <div class="w100 fl result-graph-labels">
                                    <div class="fl tal w33">LAVRISIKO FORBRUG</div>
                                    <div class="fl tac w33">MODERAT RISIKO</div>
                                    <div class="fl tar w33">HØJRISIKO FORBRUG</div>
                                </div>
                                <div id='result-graph'>
                                    <div style="display: table-cell; vertical-align: bottom">
                                        <img src="<?php echo $baseUrl.'/images/results/result-indicator.png'; ?>" class="result-indicator" style="margin-left: <?php echo $resultIndicator.'%'; ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="result-score w100 fl">
                                <div class="result-score-label fl">
                                    DIN SCORE:
                                </div>
                                <div class="result-score-text fl tac" id="result-score-text">
                                    <?php echo $points; ?>
                                </div>
                            </div>
                            <div class="result-div">
                                <p>
                                    <?php 
                                    echo $resultType->text;

                                    if ($resultPriority) { 
                                        echo '<br>';
                                        echo 'Dette skyldes blandt andet, at du svarede:<br>';
                                        echo '"'.$resultPriority['resultAnswer'].'"';
                                        echo '<br>';
                                        echo 'Til spørgsmålet "'.$resultPriority['resultQuestion'].'"';
                                    }
                                    ?>
                                </p>    
                            </div>
                            <div class="result-div">
                                <p>Du kan læse mere om AlkoTalk og kontakte os på:</p>    
                            </div>
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
                            <div class="result-div">
                                <img src="<?php echo $baseUrl.'/images/results/result-border.png'; ?>" class="w100 result-border" />
                            </div>
                        </div>
                        <img id="vertical-result-border" src="<?php echo $baseUrl.'/images/results/border-vertical.png';?>"/>
                        
                        <div class="comparison-div">
                            <div class="comparison-div-text">
                                <div class="comparison-div-text-title">Du drikker typisk</div>
                                <div class="comparison-div-text-genstande">
                                    (Genstande om ugen)
                                    <img id="genstand-result-logo-img" src="<?php echo $baseUrl.'/images/questions/genstand-logo-img.png';?>"/>
                                </div>
                                <div class="comparison-div-text-number"><?php echo $wc; ?></div>
                            </div>
                            <div class="comparison-div-img">
                                <img src="<?php echo $baseUrl.'/images/comparison-page/'.$model->gender.'-genstande-'.$wcimg.'.png';?>"/>
                            </div>
                        </div>
                        
                        <div class="comparison-div">
                            <div class="comparison-div-text">
                                <div class="comparison-div-text-title">I gennemsnit drikker en <?php echo $model->gender === "m" ? "dreng" : "pige"; ?> på din alder</div>
                                <div class="comparison-div-text-genstande">
                                    (Genstande om ugen)
                                    <img src="<?php echo $baseUrl.'/images/questions/genstand-logo-img.png';?>" onclick="$('#genstand-result-logo-img').trigger('click')"/>
                                </div>
                                <div class="comparison-div-text-number" style="color: #706a6a;"><?php echo $ndwc; ?></div>
                            </div>
                            <div class="comparison-div-img">
                                <img src="<?php echo $baseUrl.'/images/comparison-page/'.$model->gender.'-genstande-'.$ndwc.'.png';?>"/>
                            </div>
                        </div>
                        
                        <div class="comparison-div">
                            <div class="next-button-penge" style="margin-bottom: 6vw"> 
                                <div id="next_button" class="next-button">
                                    <div class="next-button-text">
                                        <span id="next_button_link_result" class="next-button-link">PENGE, KILO & TRÆNING</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div id="result-comparison">  
                        <div class="result-advanced-main">
                            <div class="result-div">
                                <img src="<?php echo $baseUrl.'/images/results/result-border.png'; ?>" class="w100 result-border" />
                                <div class="result-advanced money">
                                    <div class="result-advanced-img">
                                        <img src="<?php echo $baseUrl.'/images/results/result-money.png'; ?>"/>
                                    </div>
                                    <div class="result-advanced-text">
                                        <div>Du bruger mellem</div>
                                        <div class="result-advanced-text-value">
                                            <?php echo ($mmh === $mml)?$mml:$mml . ' - ' .$mmh; ?><span>KR</span>
                                        </div>
                                        <div>på alkohol om måneden</div>
                                    </div>
                                </div>
                                <img src="<?php echo $baseUrl.'/images/results/result-border.png'; ?>" class="w100 result-border" />
                                <div class="result-advanced">
                                    <div class="result-advanced-img">
                                        <img src="<?php echo $baseUrl.'/images/results/result-scale.png'; ?>"/>
                                    </div>
                                    <div class="result-advanced-text">
                                        <div>Hvis du skærer halvdelen af  dit alkoholforbrug fra vil du undgå at tage</div>
                                        <div class="result-advanced-text-value">
                                            <div class="result-advanced-text-value-1">
                                                <?php echo $kay; ?><span>KG</span>
                                            </div>
                                            <p>på et år</p>
                                        </div>
                                    </div>
                                </div>
                                <img src="<?php echo $baseUrl.'/images/results/result-border.png'; ?>" class="w100 result-border" />
                                <div class="result-advanced">
                                    <div class="result-advanced-img">
                                        <img src="<?php echo $baseUrl.'/images/results/result-weight.png'; ?>"/>
                                    </div>
                                    <div class="result-advanced-text">
                                        <div>For at forbrænde de kalorier du indtager via alkohol, skal du løbe</div>
                                        <div class="result-advanced-text-value">
                                            <div class="result-advanced-text-value-1">
                                                <?php echo $xx; ?><span>KM</span>
                                            </div>
                                            <p>hver måned</p>
                                        </div>
                                    </div>
                                </div>
                                <?php if ($points < 10) { ?>
                                <img src="<?php echo $baseUrl.'/images/results/result-border.png'; ?>" class="w100 result-border" />
                                <div class="result-advanced-social">
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
                                <?php } else { ?>
                                <div class="result-advanced">
                                    <img src="<?php echo $baseUrl.'/images/results/result-border.png'; ?>" class="w100 result-border-question" />
                                    <div class="result-advanced-img">
                                        <img src="<?php echo $baseUrl.'/images/results/result-questionnaire.png'; ?>"/>
                                    </div>
                                    <div class="result-advanced-text">
                                        <div class="question-title" style=''>Er du enig i, at du har et højrisikoforbrug?</div>
                                        <div class="form-row">
                                                <?php echo CHtml::radioButton('answer1', '', ['value' => 58, 'id' => 'Answer11', 'uncheckValue'=>null]); ?>
                                                <?php //echo CHtml::label('Ja', 'Answer11'); ?>
                                                <div class="ja-nej-button-res">
                                                    <div class="next-button-res">
                                                        <div class="next-button-res-text" style="padding: 1vw;">
                                                            <span id="ja-answer" class="next-button-link" style="padding: 1vw 4vw;">JA</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php echo CHtml::radioButton('answer1', '', ['value' => 59, 'id' => 'Answer12', 'uncheckValue'=>null]); ?>
                                                <?php //echo CHtml::label('Nej', 'Answer12'); ?>
                                                <div class="ja-nej-button-res">
                                                    <div class="next-button-res">
                                                        <div class="next-button-res-text" style="padding: 1vw;">
                                                            <span id="nej-answer" class="next-button-link" style="padding: 1vw 4vw;">NEJ</span>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <img src="<?php echo $baseUrl.'/images/results/result-border.png'; ?>" class="w100 result-border-question" />
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php if ($points < 10) { ?>
                        <div class="comparison-div gode-rad-button">
                            <div id="next_button" class="next-button">
                                <div class="next-button-text">
                                    <span id="next_button_link_comparison" class="next-button-link" style="padding: 2vw 2vw;">GODE RÅD</span>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="w100">
                            
                        </div>
                        <div class="footer fl w100" style="padding: 0;  margin-top: 4vw">
                            <div class="fl">
                                <div id="tilbage" onclick='$("#result-comparison").hide();$("#result-container").show();$("#header-title").text("resultat");'>TILBAGE</div>
                            </div>
                        </div>
                    </div>
                    <div id="result-tips">
                        <ul>
                            <div class="result-tips-col">
                                <li>
                                    <p>Hvis du har lyst til at drikke hver dag er det vigtigt du tænker over hvorfor du har det sådan. Er det fordi du nyder det eller er det en vane? Sæt en realistisk grænse for dig selv og hver ikke bange for at spørg om hjælp hvis dine alkoholvaner er ved at gå ud over dit øvrige liv. Tal med venner, familie eller ring til AlkoTalk.</p>
                                </li>
                                <li>
                                    <p>Det kan være svært at stoppe med at drikke eller at skære ned på dit alkoholforbrug. Hvis du oplever at du får det dårligt hvis du forsøger at stoppe med at drikke (ryster, sveder, får kvalme), så må du ikke blot stoppe fra den ene dag til den anden. Abstinenser kan være farlige og det er vigtigt du søger hjælp.</p>
                                </li>
                                <li>
                                    <p>Prøv at vent med at drikke alkohol til senere på aftenen – hvis du starter senere er det nemmere at undgå at du får for meget.</p>
                                </li>
                            </div>
                            <div class="result-tips-col">
                                <li>
                                    <p>Husk at spis før du drikker: du vil stadig blive fuld, men mad kan sikre at du optager alkohol langsommere og måske undgår at blive syg.</p>
                                </li>
                                <li>
                                    <p>Det er vigtigt du føler dig tryg når du drikker. Hvis stemningen ikke er god eller du føler dig utryg, så tag vennerne med et andet sted hen. Husk altid at du skal kunne komme hjem på en god måde.</p>
                                </li>
                                <li>
                                    <p>Husk altid at drik vand før du sover – og også mellem drinksene.</p>
                                </li>
                                <li>
                                    <p>Drik lidt langsommere i stedet for at bunde drinks hurtigt: du kan altid drikke mere, men du kan ikke drikke mindre når det først er i dit system.</p>
                                </li>
                            </div>
                        </ul>
                        <div class="w100">
                            <div class="result-advanced">
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
                        </div>
                        <div class="footer fl w100">
                            <div class="fl">
                                <div onclick='$("#result-tips").hide();$("#result-comparison").show();$("#header-title").text("PENGE, KILO & TRÆNING");'>TILBAGE</div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-line"></div>
                    <!-- The Popup Info-->
                    <?php require_once dirname(__FILE__) . '/../../../themes/atest/views/layouts/popup-info.php'; ?>
                        
                    <!-- The Popup Genstand-->
                    <?php require_once dirname(__FILE__) . '/../../../themes/atest/views/layouts/popup-genstand.php'; ?>
                        
                    <!-- The Popup Home-->
                    <?php require_once dirname(__FILE__) . '/../../../themes/atest/views/layouts/popup-home.php'; ?>
		</div>
                <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
                <script src="<?php echo $baseUrl.'/js/result.js';?>" type="text/javascript"></script>
                <script>
                    $('input[type=radio]').on('click', function(){
                        console.log($(this).val());
                        $.post('<?php echo Yii::app()->createUrl('test/setanswercookie') ?>', {id:$(this).val()}, function(data){
                            console.log(data);
                            window.location = '<?php echo CHtml::normalizeUrl(array("/test/additional")) ?>';
                        });
                    });
                </script>