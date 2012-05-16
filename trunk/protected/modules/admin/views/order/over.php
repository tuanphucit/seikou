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

		$('#Orders_start_time').timepicker({defaultTime:'00:00',minutes:{starts:0,ends:30,interval:30}});
		$('#Orders_end_time').timepicker({defaultTime:'00:00',minutes:{starts:0,ends:30,interval:30}});

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
			<td><?php echo $form->label($order,'status')?></td>
			<td>
				<?php 
					$order->status = Orders::ORDER_OVERTIME;
					echo $order->getStatusLabel();
				?>
			</td>
		</tr>
		<tr>
			<td>
				<?php 
					$fee = Fee::model()->find();
					echo $fee->getAttributeLabel('penalty').'/30分';
				?>
			</td>
			<td><?php echo number_format($fee->penalty) ?></td>
		</tr>
	</table>
	<?php 
		echo $form->errorSummary($order);
		echo "<br>";
		echo Html::submitButton(t("Update",'admin'),array('class'=>'button'));
		$this->endWidget();
	?>
