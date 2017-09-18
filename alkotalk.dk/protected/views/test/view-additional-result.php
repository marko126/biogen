<?php
$this->css = 'result.css';
$baseUrl = Yii::app()->theme->baseUrl; 
?>	
                <style type="text/css">
                        @import url("<?php echo $baseUrl.'/css/popup.css';?>");
                        .result
		</style>
                <div id="header">
                    <img id="header-home-img" src="<?php echo $baseUrl.'/images/general/home-icon.png';?>"/>
                    <img id="header-img" src="<?php echo $baseUrl.'/images/general/header.png';?>"/>
                    <img id="header-logo-img" src="<?php echo $baseUrl.'/images/general/header-logo.png';?>"/>    
                    <p id="header-title" class="tac"><?php echo "GODE RÅD"; ?></p>
		</div>
		<div id="content-1"> 
                    <div id="result-tips" style="display:block">
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
                                <div></div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-line"></div>
                    <!-- The Popup Info-->
                    <?php require_once dirname(__FILE__) . '/../../../themes/atest/views/layouts/popup-info.php'; ?>
                        
                    <!-- The Popup Home-->
                    <?php require_once dirname(__FILE__) . '/../../../themes/atest/views/layouts/popup-home.php'; ?>
		</div>
                <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
                <script src="<?php echo $baseUrl.'/js/result.js';?>" type="text/javascript"></script>