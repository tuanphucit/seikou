<?php 
	// Register More Javascript file and Css file
	// Jquery UI
	$cs = Yii::app()->getClientScript();
	$cs->registerCoreScript( 'jquery.ui' );
	$cs->registerCssFile(
		Yii::app()->assetManager->publish(
			Yii::app()->basePath . '/vendors/jquery.ui/redmond/'
		).
		'/jquery-ui-1.8.18.custom.css', 'screen'
	);
?>
<script>
	$(document).ready(function(){
		$("#OrderTimeForm_start_date").datepicker({dateFormat: "yy-mm-dd"});
		$("#OrderTimeForm_end_date").datepicker({dateFormat: "yy-mm-dd"});
	});
</script>
<div class="pageBreaker"></div>
<h2><?php echo t('Quick Search')?></h2>
<?php $this->widget('QuickTipWidget',array('header'=>'Nothing','content'=>'todo'))?>


	<div id="loading" style="display:none">
		<div class="ball"></div>
		<div class="ball1"></div>
	</div>
<?php 
	$form = $this->beginWidget('bootstrap.widgets.BootActiveForm',array(
		'id'=>'quick-search-form',
	));
?>
	<table>
		<tr>
			<td>
				<?php echo $form->textFieldRow($orderTime,'start_date');?>
			</td>
			<td>
				<?php echo $form->dropDownListRow($orderTime,'start_hour',$orderTime->getListHours());?>
			</td>
			<td>
				<?php echo $form->dropDownListRow($orderTime,'start_minute',$orderTime->getListMinutes());?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo $form->textFieldRow($orderTime,'end_date');?>
			</td>
			<td>
				<?php echo $form->dropDownListRow($orderTime,'end_hour',$orderTime->getListHours());?>
			</td>
			<td>
				<?php echo $form->dropDownListRow($orderTime,'end_minute',$orderTime->getListMinutes());?>
			</td>
		</tr>
	</table>
	<?php 
		echo Html::ajaxSubmitButton(
			t('Search'), 
			array('/search/index/'),
			array(
				'update'=>'#search-result',
			 	'beforeSend' => 'function(){
			 		$("#loading").fadeIn();
			 	}',
				'complete' => 'function(){
			 		$("#loading").fadeOut();
			 	}',
			),
			array(
				'class'=>'largeYBtn',
			)
		);
	?>
	<div id="search-result">
	</div>
<?php
	$this->endWidget();
?>