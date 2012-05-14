<?php 
	$cs = Yii::app()->clientScript;
	
	// Jquery UI
	$cs->registerCoreScript( 'jquery.ui' );
	$cs->registerCssFile(
		Yii::app()->assetManager->publish(
			Yii::app()->basePath . '/vendors/jquery.ui/redmond/'
		).
		'/jquery-ui-1.8.18.custom.css', 'screen'
	);
	
	// CSS and JS
	$cs->registerCssFile(Html::cssThemeUrl('fullcalendar/fullcalendar.css'),'screen');
	$cs->registerCssFile(Html::cssThemeUrl('fullcalendar/fullcalendar.print.css'),'print');
	$cs->registerScriptFile(Html::jsThemeUrl('fullcalendar/fullcalendar.min.js'));
	$this->renderPartial('order_js');
	$this->renderPartial('order_form',array(
			'orderTime'=>$orderTime,
	));
?>
<h2><?php echo t('Order Now')?></h2>
<div class="pageBreaker"></div>
<?php 
	$this->beginWidget('QuickTipWidget',array())
?>
	<div class="oneThird">
		<?php echo Html::image(Html::imageThemeUrl('default/supportIcon.png'),"servicesIcon",array('class'=>'servicesIcon'))?>
		<h3><?php echo t('Function')?></h3>
		<ul class="unorderedList">
			<li><strong><?php echo t('Reserve room');?></strong></li>
			<li><strong><?php echo t('View ordered room')?></strong></li>
			<li><strong><?php echo t('Have many views : months, weeks or days')?></strong></li>
		</ul>
	</div>
	<div class="oneThird">
		<?php echo Html::image(Html::imageThemeUrl('default/clockIcon.png'),"servicesIcon",array('class'=>'servicesIcon'))?>
		<h3><?php echo t('Quick Tips')?></h3>
		<ul class="unorderedList">
			<li><strong><?php echo t('Click in WEEK or DAY: you can easily select time to resever');?></strong></li>
			<li><strong><?php echo t('Click in MONTH      : you can easily select many days');?></strong></li>
			<li><strong><?php echo t('Easily select time by drag mouse');?></strong></li>
		</ul>
	</div>
	<div class="oneThird lastColumn">
		<?php echo Html::image(Html::imageThemeUrl('default/analyticsIcon.png'),"servicesIcon",array('class'=>'servicesIcon'))?>
		<h3><?php echo t('Make Sure That');?></h3>
		<ul class="customList">
	          <li class="checked"><?php echo t('To create order : select date and time then select what you want to reserve')?></li>
	          <li class="checked"><?php echo t('Start time must be in the future')?></li>
	          <li class="checked"><?php echo t("Look other order and Don't conflict with other orders")?></li>
	        </ul>
	</div>
	<div class="clear"></div>
<?php $this->endWidget()?>
<div id='calendar'></div>

<div class="clear"></div>

