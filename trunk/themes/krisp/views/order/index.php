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
	$cs->registerCssFile(Html::cssUrl('admin/jquery.ui.timepicker.css'),'screen');
	$cs->registerScriptFile(Html::jsUrl('admin/jquery.ui.timepicker.js'));
?>

<script>
	$(document).ready(function(){
		$("#OrderTimeForm_start_date").datepicker({dateFormat: "yy-mm-dd"});
		$("#OrderTimeForm_end_date").datepicker({dateFormat: "yy-mm-dd"});

		$("#OrderTimeForm_start_time").timepicker({
			 hours: {
			        starts: 0,                // First displayed hour
			        ends: 23                  // Last displayed hour
			    },
			    minutes: {
			        starts: 0,                // First displayed minute
			        ends: 30,                 // Last displayed minute
			        interval: 30               // Interval of displayed minutes
			    },
		});
		$("#OrderTimeForm_end_time").timepicker({
			 hours: {
			        starts: 0,                // First displayed hour
			        ends: 23                  // Last displayed hour
			    },
			    minutes: {
			        starts: 0,                // First displayed minute
			        ends: 30,                 // Last displayed minute
			        interval: 30               // Interval of displayed minutes
			    },
		});

		$(".error").show();
	});
</script>

<?php
	$form = $this->beginWidget('bootstrap.widgets.BootActiveForm',array(
		'id'=>'order-form',
		
	));
	?>
	<hr>
	<table>
		<tr>
			<td><?php echo $form->label($orderTime,'pid')?></td>
			<td><?php echo $form->dropDownList($orderTime,'pid',Products::getListProduct(false))?></td>
		</tr>
		<tr>
			<td><?php echo $form->label($orderTime,'start_date')?></td>
			<td><?php echo $form->textField($orderTime,'start_date')?></td>
			<td><?php echo $form->label($orderTime,'end_date')?></td>
			<td><?php echo $form->textField($orderTime,'end_date')?></td>
		</tr>
		<tr>
			<td><?php echo $form->label($orderTime,'start_time')?></td>
			<td><?php echo $form->textField($orderTime,'start_time')?></td>
			<td><?php echo $form->label($orderTime,'end_time')?></td>
			<td><?php echo $form->textField($orderTime,'end_time');
			?>
				
			</td>
		</tr>
		<tr>
			<?php echo $form->errorSummary($orderTime)?>
		</tr>
		<tr>
			<td><?php 
				echo Html::submitButton(t("Order"),array('class'=>'btn btn-success'));
				?>
			</td>
		</tr>
	</table>
	<hr>
	<?php 
	$this->endWidget();
	
	$this->widget('bootstrap.widgets.BootGridView', array(
			'itemsCssClass'=>'striped bordered condensed',
			'id'=>'order-list',
			'dataProvider'=>$orders,
			'template'=>"{items}{pager}",
			'columns'=>array(
					array(
							'header'=>'#',
							'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
					),
					array(
							'name'=>'product_id',
							'value'=>'$data->product->name',
					),
					array('name'=>'start_date','header'=>t('Start Date','model')),
					array('name'=>'start_time','header'=>t('Start Time','model'),'value'=>'Html::formatDateTime($data->start_time, "HH:mm:ss", "H:i")'),
					array('name'=>'end_date','header'=>t('End Date','model')),
					array('name'=>'end_time','value'=>'Html::formatDateTime($data->end_time, "HH:mm:ss", "H:i")'),
					array(
							'name'=>'status',
							'type'=>'raw',
							'value'=>'$data->getStatusLabel()',
					),
			),
	));
?>

<div class="pageBreaker"></div>

