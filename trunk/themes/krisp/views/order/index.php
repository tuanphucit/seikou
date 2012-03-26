<?php 
	$cs = Yii::app()->getClientScript(); 
	
	// Jquery UI
	$cs->registerCoreScript( 'jquery.ui' );
	$cs->registerCssFile(
		Yii::app()->assetManager->publish(
			Yii::app()->basePath . '/vendors/jquery.ui/redmond/'
		).
		'/jquery-ui-1.8.18.custom.css', 'screen'
	);
	
	// Frontier cal
	$cs->registerCssFile(
		Html::cssThemeUrl('jquery-frontier-cal-1.3.2.css'),
		'screen');
	$cs->registerScriptFile(Html::jsThemeUrl('jshashtable-2.1.js'));
	$cs->registerScriptFile(Html::jsThemeUrl('jquery-frontier-cal-1.3.2.js'));
	$cs->registerScriptFile(Html::jsThemeUrl('colorpicker/colorpicker.js'));
	$cs->registerScriptFile(Html::jsThemeUrl('jquery-qtip-1.0.0-rc3140944/jquery.qtip-1.0.js'));
	$this->renderPartial('order_js');
?>
<div id="example" style="">
		
		<br>
		
		<div class="shadow" style="border: 1px solid #aaaaaa; padding: 3px;">
			<b>
			Please choose date you want to book room
			<br><br>
			Please note that You can book room in many days with the same time
			</b>
		</div>
		
		<br><br>

		<div id="toolbar" class="ui-widget-header ui-corner-all" style="padding:3px; vertical-align: middle; white-space:nowrap; overflow: hidden;">
			<button id="BtnPreviousMonth">Previous Month</button>
			<button id="BtnNextMonth">Next Month</button>
			&nbsp;&nbsp;&nbsp;
			Date: <input type="text" id="dateSelect" size="20"/>
			&nbsp;&nbsp;&nbsp;
		</div>

		<br>

		<!--
		You can use pixel widths or percentages. Calendar will auto resize all sub elements.
		Height will be calculated by aspect ratio. Basically all day cells will be as tall
		as they are wide.
		-->
		<div id="mycal"></div>

		</div>

		<!-- debugging-->
		<div id="calDebug"></div>

		<!-- Add event modal form -->
		<style type="text/css">
			//label, input.text, select { display:block; }
			fieldset { padding:0; border:0; margin-top:25px; }
			.ui-dialog .ui-state-error { padding: .3em; }
			.validateTips { border: 1px solid transparent; padding: 0.3em; }
		</style>
		<?php $this->renderPartial('order_form',array('orderTime'=>$orderTime,))?>
		
		<div id="display-event-form" title="View Agenda Item">
			
		</div>		

		<p>&nbsp;</p>