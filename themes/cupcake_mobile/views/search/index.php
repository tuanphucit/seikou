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
<!-- For quicktips -->
<h2><?php echo t('Quick Search')?></h2>
<?php 
	$this->beginWidget('QuickTipWidget',array())
?>
	<div class="oneThird">
		<?php echo Html::image(Html::imageThemeUrl('default/supportIcon.png'),"servicesIcon",array('class'=>'servicesIcon'))?>
		<h3><?php echo t('Function')?></h3>
		<strong><?php echo t('You can quick search to find available room in a specific time')?></strong>
	</div>
	<div class="oneThird">
		<?php echo Html::image(Html::imageThemeUrl('default/clockIcon.png'),"servicesIcon",array('class'=>'servicesIcon'))?>
		<h3><?php echo t('Quick Tips')?></h3>
		<ul class="unorderedList">
			<li><strong><?php echo t('You can use calendar by click in start date or end date input');?></strong></li>
			<li><strong><?php echo t('You can resever room in a specific time (in a day) for many days')?></strong></li>
		</ul>
	</div>
	<div class="oneThird lastColumn">
		<?php echo Html::image(Html::imageThemeUrl('default/analyticsIcon.png'),"servicesIcon",array('class'=>'servicesIcon'))?>
		<h3><?php echo t('Make Sure That');?></h3>
		<ul class="customList">
	          <li class="checked"><strong><?php echo t('Date format: yyyy-mm-dd')?></strong></li>
	          <li class="checked"><strong><?php echo t('You must order start time in the future')?></strong></li>
	          <li class="checked"><strong><?php echo t('Start time must be earlier than end time')?></strong></li>
	        </ul>
	</div>
	<div class="clear"></div>
<?php $this->endWidget()?>

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