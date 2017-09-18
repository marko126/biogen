<?php
$layout = "yii";
if (Yii::app()->controller->id !== 'site') {
	if (Yii::app()->controller->id === 'test' && (Yii::app()->controller->action->id === 'viewResult' || Yii::app()->controller->action->id === 'viewAdditionalResult' || Yii::app()->controller->action->id === 'new' || Yii::app()->controller->action->id === 'additional')) {
		$layout = "test";
	} else {
		$layout = "yii";
	}
} else {
	if (Yii::app()->controller->action->id === 'login') {
		$layout = "yii";
	} else {
		$layout = "test";
	}
}


if ($layout === 'yii') {
?>    
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
        
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo 'AlkoTalk'; ?></title>
        <script>
            
        </script>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/admin')),
                                array('label'=>'Tests', 'url'=>array('/test/admin')),
                                array('label'=>'Questions', 'url'=>array('/question/admin')),
                                array('label'=>'Results', 'url'=>array('/result/admin')),
                                array('label'=>'App', 'url'=>array('/site/index'), 'linkOptions' => array('target' => '_blank')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>


</div><!-- page -->

</body>
</html>
    
<?php
} else {
?>
<!DOCTYPE html>
<html>

<head>
	
    <title><?php echo 'AlkoTalk'; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        
<?php
	$baseUrl = Yii::app()->theme->baseUrl; 
	$cs = Yii::app()->getClientScript();
	//$cs->registerCssFile($baseUrl.'/css/jquery-ui.css');
	//$cs->registerCssFile($baseUrl.'/css/style.css');			
?>
    <link rel="icon" sizes="192x192" href="<?php echo $baseUrl.'/images/general/icon-homescreen-192.png'; ?>" />
    
    <link rel="apple-touch-icon" sizes="192x192" href="<?php echo $baseUrl.'/images/general/icon-homescreen-192.png'; ?>" />
    
    <link rel="manifest" href="<?php echo $baseUrl.'/js/manifest.json'; ?>" />
    <link href="<?php echo $baseUrl.'/css/main.css'; ?>" type="text/css" rel="stylesheet"/>
    <link href="<?php echo $baseUrl.'/css/'.$this->css; ?>" type="text/css" rel="stylesheet"/>
    <link href="<?php echo $baseUrl.'/cubiq-add-to-homescreen/style/addtohomescreen.css'; ?>" type="text/css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl.'/slick/slick.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl.'/slick/slick-theme.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl.'/css/rangeslider.css'; ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="<?php echo $baseUrl.'/cubiq-add-to-homescreen/src/addtohomescreen.js'; ?>"></script>
    <script src="<?php echo $baseUrl.'/js/main.js'; ?>"></script>
    <script>(function(a,b,c){if(c in b&&b[c]){var d,e=a.location,f=/^(a|html)$/i;a.addEventListener("click",function(a){d=a.target;while(!f.test(d.nodeName))d=d.parentNode;"href"in d&&(d.href.indexOf("http")||~d.href.indexOf(e.host))&&(a.preventDefault(),e.href=d.href)},!1)}})(document,window.navigator,"standalone")</script>
</head>
<body>

    <?php echo $content; ?>

</body>
		
</html>   
<?php
}
?>
