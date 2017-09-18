<?php
$this->css = 'result.css';
$baseUrl = Yii::app()->theme->baseUrl; 
?>		 
                <style type="text/css">
                        /* The Modal (background) */
                        .modal {
                            display: none; /* Hidden by default */
                            position: fixed; /* Stay in place */
                            z-index: 1; /* Sit on top */
                            padding-top: 20px; /* Location of the box */
                            left: 0;
                            top: 0;
                            width: 100%; /* Full width */
                            height: 100%; /* Full height */
                            overflow: auto; /* Enable scroll if needed */
                            background-color: rgb(0,0,0); /* Fallback color */
                            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
                        }

                        /* Modal Content */
                        .modal-content {
                            position: relative;
                            background-color: #fefefe;
                            margin: auto;
                            padding: 0;
                            border: 1px solid #888;
                            border-radius: 20px;
                            width: 90%;
                            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
                            -webkit-animation-name: animatetop;
                            -webkit-animation-duration: 0.4s;
                            animation-name: animatetop;
                            animation-duration: 0.4s
                        }

                        /* Add Animation */
                        @-webkit-keyframes animatetop {
                            from {top:-300px; opacity:0} 
                            to {top:0; opacity:1}
                        }

                        @keyframes animatetop {
                            from {top:-300px; opacity:0}
                            to {top:0; opacity:1}
                        }

                        .modal-header {
                            padding: 2px 16px;
                            color: #4cada6;
                            text-align: center;
                        }

                        .modal-body {
                            padding: 2px 16px;
                        }

                        .modal-footer {
                            padding: 2px 16px;
                            color: #4cada6;
                            text-align: center;
                        }
                        
                        .modal-footer:hover {
                            cursor: pointer;
                        }
			
		</style>
		<div id="header">
                        <a href="<?php echo Yii::app()->createUrl('site/page', array('view'=>'front')); ?>">
                            <img id="top-bar-home" src="<?php echo $baseUrl.'/images/home-icon.png';?>"/>
                        </a>
			<img id="top-bar" src="<?php echo $baseUrl.'/images/top-bar.png';?>"/>
			<img id="top-bar-tin2" src="<?php echo $baseUrl.'/images/top-bar-tin2.png';?>"/>
			<div style="float: left; width:99%">
				<p class="text-style-3">
                                    <?php echo "RESULTAT OM PARATHED"; ?>
				</p>
			</div>
			<div id="info-container">
                                <div id="info-div">
                                        <a href="<?php echo Yii::app()->request->urlReferrer; ?>"><img id="left-arrow-info" src="<?php echo $baseUrl.'/images/left-arrow-info.png';?>"/></a>
                                        <img id="info-button" src="<?php echo $baseUrl.'/images/info-button.png';?>"/>
                                </div>
                        </div>
		</div>
		<div id="content-1">
                        <div>
                            <img src="<?php echo $baseUrl.'/images/'.$model->url; ?>" style="width: 100%"/>
                        </div>
			<div id="result-container">
                            <div id="result-text"><?php echo $model->text;?></div>
                            <div id="kilde-sundhedsstyrelsen">
                                <p class="text-style-1">
                                  Kilde: Lænken behandlingsambulatorie
                                </p>
                            </div>
			</div>
		</div>
                        <!-- The Modal -->
                        <div id="myModal" class="modal">

                            <!-- Modal content -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2>INFORMATION</h2>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        Alkohol er en naturlig del af mange menneskers liv. Men hvad er et normalt alkoholforbrug, og hvorn&#229;r har du et alkoholproblem? Denne test er udviklet af WHO, og anbefales af Sundhedsstyrelsen.
                                    </p>
                                    <p>
                                        Den giver et mere nuanceret billede af alkoholforbruget end blot antal genstande. Testen medtager ogs&#229; drikke-og adf&#230;rdsm&#248;nstre samt relationer til andre. Derfor er resultatet b&#229;de mere p&#229;lideligt og nemmere at forholde sig til.
                                    </p>
                                    <p>
                                        Testen tager kun f&#229; minutter at gennemf&#248;re, og du er fuldst&#230;ndig anonym.
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <h3>OK</h3>
                                </div>
                            </div>

                        </div>
                <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
                <script type="text/javascript">
			
                        // Get the modal
                        var modal = document.getElementById('myModal');

                        // Get the button that opens the modal
                        var btn = document.getElementById("info-button");

                        // Get the <span> element that closes the modal
                        var span = document.getElementsByClassName("modal-footer")[0];

                        // When the user clicks the button, open the modal 
                        btn.onclick = function() {
                            modal.style.display = "block";
                        }

                        // When the user clicks on <span> (x), close the modal
                        span.onclick = function() {
                            modal.style.display = "none";
                        }

                        // When the user clicks anywhere outside of the modal, close it
                        window.onclick = function(event) {
                            if (event.target == modal) {
                                modal.style.display = "none";
                            }
                        }
                        
                        $(document).on('ready', function() {
			
                            var screen_width = screen.width;
                            if (screen_width > 1024){
                                screen_width = 1024;
                            }
                            var font_size = screen_width*0.05;
                            var img_size = document.getElementById('top-bar-home').clientHeight; 
                            var margin_top = (screen_width/8 - font_size)/2;
                            var margin_top_img = (screen_width/8 - img_size)/2;

                            $('.text-style-3').attr('style', 'font-size:'+font_size+'px; line-height:'+font_size+'px; margin-top:'+margin_top+'px');
                            $('#top-bar-home').attr('style', 'top:'+margin_top_img+'px');
                            
                            window.onresize = function(event){
                                var screen_width = screen.width;
                                if (screen_width > 1024){
                                    screen_width = 1024;
                                }
                                var font_size = screen_width*0.05;
                                var img_size = document.getElementById('top-bar-home').clientHeight; 
                                var margin_top = (screen_width/8 - font_size)/2;
                                var margin_top_img = (screen_width/8 - img_size)/2;
                                $('.text-style-3').attr('style', 'font-size:'+font_size+'px; line-height:'+font_size+'px; margin-top:'+margin_top+'px');
                                $('#top-bar-home').attr('style', 'top:'+margin_top_img+'px');
                            }
			});
		</script>