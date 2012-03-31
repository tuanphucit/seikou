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

<div id='calendar'></div>



