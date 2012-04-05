<!DOCTYPE html>
<html>
<head>

<title>Krisp - <?php echo t('Conference Room Reservation System')?></title>
<?php
	$cs = Yii::app()->getClientScript(); 
	// CSS 
	$cs->registerCssFile(Html::cssThemeUrl('style.css'), 'screen');
	$cs->registerCssFile(Html::cssThemeUrl('nivo-slider.css'), 'screen');
	$cs->registerCssFile(Html::cssThemeUrl('custom-nivo-slider.css'), 'screen');
	$cs->registerCssFile(Html::cssThemeUrl('custom-cycle.css'), 'screen');
	$cs->registerCssFile(Html::cssThemeUrl('colorbox.css'), 'screen');
	$cs->registerCssFile(Html::cssThemeUrl('style-1.css'), 'screen');
	if (Yii::app()->controller->id != 'order')
		$cs->registerCssFile(Html::cssThemeUrl('table.css'), 'screen');
	
	// JS
	$cs->registerCoreScript('jquery');
	$cs->registerScriptFile(Html::jsThemeUrl('jquery.easing.1.3.js'));
	$cs->registerScriptFile(Html::jsThemeUrl('jquery.tools.min.js'));
	$cs->registerScriptFile(Html::jsThemeUrl('jquery.cycle.all.js'));
	$cs->registerScriptFile(Html::jsThemeUrl('jquery.nivo.slider.pack.js'));
	$cs->registerScriptFile(Html::jsThemeUrl('colorbox.js'));
	$cs->registerScriptFile(Html::jsThemeUrl('contact.js'));
	$cs->registerScriptFile(Html::jsThemeUrl('myScript.js'));
?>
<link type="image/gif" rel="shortcut icon" href="<?php echo Html::imageThemeUrl('favicon.ico') ?>" />
<!-- scripts start -->

<!-- scripts end -->
<meta charset="UTF-8">
</head>
<body>
<!-- website wrap starts -->
<div class="mainWrap">
  <!-- header wrap starts -->
  <div class="headerWrap"> <a href="<?php echo $this->createUrl('/home/index')?>" class="mainLogo"><img src="<?php echo Html::imageThemeUrl('default/mainLogo.png') ?>" alt=""/></a> 
  <!-- Uncomment this for header Ads
  <a href="" class="headerAd">
  	<img src="<?php echo Html::imageThemeUrl('default/ad1-top.jpg') ?>" alt=""/>
  </a>
  --> 
  </div> 
  <!-- header wrap ends -->
  <!-- page wrap starts -->
  <div class="pageWrap">
    <!-- main menu starts -->
    <div class="menuWrap">
      <ul class="mainMenu">
        <li><?php echo Html::link(t('Home'),$this->createUrl('/home/index'),array())?></li>
        <li><?php echo Html::link(t('Conference Room'),$this->createUrl('/room/index'),array())?></li>
        <li><?php echo Html::link(t('Equipment'),$this->createUrl('/equipment/index'),array())?></li>
        <li><?php echo Html::link(t('Order Now'),$this->createUrl('/order/index'),array())?></li>
        <li><?php echo Html::link(t('Contact Us'),$this->createUrl('/site/contact'),array())?></li>
        <li><?php echo Html::link(t('Your Account'),"#",array())?>
          <ul>
            <li><?php echo Html::link(t('History'),$this->createUrl('/history/index'),array())?></li>
            <li><?php echo Html::link(t('Profile'),$this->createUrl('/profile/index'),array())?></li>
            <li><?php echo Html::link(t('Log Out')." (".Yii::app()->user->name.")",$this->createUrl('/site/logout'),array())?></li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- main menu ends -->
    <div class="generalPageTop"></div>
    <!-- content wrap starts -->
    <div class="contentWrap">
      <?php 
      	$this->widget('bootstrap.widgets.BootBreadcrumbs', array(
    				'links'=>$this->breadcrumbs,
				));
		$this->widget('bootstrap.widgets.BootAlert');
      ?>
      <?php echo $content?>
    </div>
    <!-- content wrap ends -->
  </div>
  <!-- page wrap ends -->
  <!-- footer starts -->
  <div class="footerWrap">
    <div class="copyrightWrap"> <span class="copyright">&copy; copyright JAP-IT Team 12.</span> </div>
  </div>
  <!-- footer ends -->
</div>
<!-- website wrap ends -->
<!-- background switch starts -->
<div class="bgSwitch"> 
	
	<?php 
	
		echo Html::link(
			Html::image(
				Html::imageUrl('flags/en.png'),
				"lang",
				array()
			),
			$this->createUrl('',array('lang'=>'en'))		
		);
	
		echo Html::link(
			Html::image(
				Html::imageUrl('flags/ja.png'),
				"lang",
				array()
			),
			$this->createUrl('',array('lang'=>'ja'))		
		);
		
		echo Html::link(
			Html::image(
				Html::imageUrl('flags/vi.png'),
				"lang",
				array()
			),
			$this->createUrl('',array('lang'=>'vi'))	
		);
		
		echo "<hr>";
	?>
	
	<img src="<?php echo Html::imageThemeUrl('default/plus.png') ?>" alt="" class="plus"/> 
	<a href="<?php echo Html::imageThemeUrl('default/bgPat-1.png') ?>" class="bgSw">
		<img src="<?php echo Html::imageThemeUrl('default/bgs1.png') ?>" alt=""/>
	</a> 
	<a href="<?php echo Html::imageThemeUrl('default/bgPat-2.png') ?>" class="bgSw">
		<img src="<?php echo Html::imageThemeUrl('default/bgs2.png') ?>" alt=""/>
	</a> 
	<a href="<?php echo Html::imageThemeUrl('default/bgPat-3.png') ?>" class="bgSw">
		<img src="<?php echo Html::imageThemeUrl('default/bgs3.png') ?>" alt=""/>
	</a>
</div>
<!-- background switch ends -->
</body>
</html>
