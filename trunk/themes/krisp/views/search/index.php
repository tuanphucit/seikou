<div class="pageBreaker"></div>
<h2>Quick Search</h2>

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
			<td>
				<?php echo $form->dropDownListRow($orderTime,'start_ampm',$orderTime->getListAmPm());?>
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
			<td>
				<?php echo $form->dropDownListRow($orderTime,'end_ampm',$orderTime->getListAmPm());?>
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