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
	
	// init Fee
	$fee = Fee::model()->find();
?>

<script>
	$(document).ready(function(){
		$("#Orders_start_date").datepicker({dateFormat: "yy-mm-dd"});
		$("#Orders_end_date").datepicker({dateFormat: "yy-mm-dd"});

		$('#Orders_start_time').timepicker();
		$('#Orders_end_time').timepicker();
		$('#Orders_real_stop_time').timepicker();

		penalty = <?php echo $fee->penalty;?>;
		overClicked = false;
		$("#over-time").click(function(){
			//if (overClicked) return;
			overClicked = true;
			start_time = $("#Orders_end_time").val().split(":");
			end_time   = $("#Orders_real_stop_time").val().split(":");
			time_diff  = (end_time[0] - start_time[0])*2 + Math.ceil(((end_time[1] - start_time[1]))/30);
			if (time_diff >= 0){
				$('#Orders_total').val(parseInt($('#Orders_total').val()) + time_diff*penalty);
				$('#Orders_status').val(4);
			}
		});
	});
</script>

<div class="pageBreaker"></div>
<h2> <?php echo t('Order Detail')?></h2>
<?php 
	$form = $this->beginWidget('CActiveForm',array(
			'id'=>'edit-order-form',
	
	));
	
	?>
	<table>
		<tr>
			<td><?php echo $form->label($order,'user_id')?></td>
			<td><?php echo $form->dropDownList($order,'user_id',Users::getListUserName())?></td>
			
			<td><?php echo $form->label($order,'product_id')?></td>
			<td><?php echo $form->dropDownList($order,'product_id',Products::getListProduct())?></td>
		</tr>
		<tr>
			<td><?php echo $form->label($order,'start_date')?></td>
			<td><?php echo $form->textField($order,'start_date')?></td>
			<td><?php echo $form->label($order,'end_date')?></td>
			<td><?php echo $form->textField($order,'end_date')?></td>
		</tr>
		<tr>
			<td><?php echo $form->label($order,'start_time')?></td>
			<td><?php echo $form->textField($order,'start_time')?></td>
			<td><?php echo $form->label($order,'end_time')?></td>
			<td><?php echo $form->textField($order,'end_time')?></td>
		</tr>
		
		<tr>
			<td><?php echo $form->label($order,'real_stop_time')?></td>
			<td>
				<?php 
					echo $form->textField($order,'real_stop_time');
					echo "<br>";
					$this->widget('bootstrap.widgets.BootButton', array(
							'label'=>t('Over Time','model'),
							'type'=>'danger',
							'size'=>'medium',
							'htmlOptions'=>array('id'=>'over-time'),
					));
				?>
			</td>
			<td><?php echo $form->label($order,'status')?></td>
			<td>
				<?php 
					echo $form->dropDownList($order,'status',Orders::getListStatus());
				?>
			</td>
		</tr>
		<tr>
			<td><?php echo $form->label($order,'total')?></td>
			<td><?php echo $form->textField($order,'total')?></td>
			<td><?php echo $form->label($order,'time')?></td>
			<td><?php echo $form->textField($order,'time')?></td>
		</tr>
	</table>
	<?php 
		echo $form->errorSummary($order);
		echo "<br>";
		echo Html::submitButton(t("Update",'admin'),array('class'=>'button'));
		$this->endWidget();
	?>
<hr>
<h2> <?php echo t('Order History')?></h2>
<?php 
	$this->widget('bootstrap.widgets.BootGridView', array(
		'itemsCssClass'=>'striped bordered condensed',
	    'dataProvider'=>$dataProvider,
	    'template'=>"{items}",
	    'columns'=>array(
	        array('name'=>'id', 'header'=>'#'),
	        array('name'=>'time','header'=>t('Time')),
	        array(
	        	'name'=>'status',
	        	'type'=>'raw',
	        	'value'=>'OrdersHistory::getStatusLabel($data->status)',
	        ),
	        array(
	        	'header'=>t('User'),
	        	'value'=>'$data->user->full_name',
	        ),
	        array('name'=>'description'),
	    ),
	)); 
?>