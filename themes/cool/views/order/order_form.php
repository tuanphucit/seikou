<?php 
	$products = Users::model()->findAll('',array('order'=>'name ASC'));
	foreach ($products as $product){
		echo "<div id='price-$product->id' style='display:none'>$product->price</div>";
	}
	
?>
<script>
	function changePrice(){
		product_id   = $("#OrderTimeForm_pid").val();
		price_tag_id = '#price-'+product_id;
		$("#product-price").text($(price_tag_id).text());
	}
	$(document).ready(function(){
		changePrice();
	});
</script>
<div id="add-event-form" title="Add New Order">
	<p class="validateTips">Please complete your order.</p>
	<?php 
		$form = $this->beginWidget('CActiveForm',array(
			'id'=>'order-form',
		))
	?>
	<fieldset>
		<?php
			echo $orderTime->getAttributeLabel('pid');
			echo " : ";
			echo $form->dropDownList($orderTime,'pid',$orderTime->getListProducts(),array(
				'onChange'=>'javascript:changePrice()',
			));
			echo "<br>";
			echo t('Price');
			echo " : ";
			echo "<div id='product-price' style='display:inline-block'></div>";
			echo " VND / 0.5 hour";
			
		?>
		<table style="width:100%; padding:5px;">
			<tr>
				<td>
					<?php
						echo $form->label($orderTime,'start_date');
						echo $form->textField($orderTime,'start_date',array(
							'id'=>'startDate',
							'class'=>"text ui-widget-content ui-corner-all",
							'style'=>"margin-bottom:12px; width:95%; padding: .4em;",
						));
					?>
				</td>
				<td>&nbsp;</td>
				<td>
					<?php
						echo $form->label($orderTime,'start_hour');
						echo $form->dropDownList($orderTime,'start_hour',$orderTime->getListHours(),array(
							'id'=>'startHour',
							'class'=>"text ui-widget-content ui-corner-all",
							'style'=>"margin-bottom:12px; width:95%; padding: .4em;",
						));
					?>			
				<td>
				<td>
					<?php
						echo $form->label($orderTime,'start_minute');
						echo $form->dropDownList($orderTime,'start_minute',$orderTime->getListMinutes(),array(
							'id'=>'startMin',
							'class'=>"text ui-widget-content ui-corner-all",
							'style'=>"margin-bottom:12px; width:95%; padding: .4em;",
						));
					?>				
				<td>
				<td>
					<?php
						echo $form->label($orderTime,'start_ampm');
						echo $form->dropDownList($orderTime,'start_ampm',$orderTime->getListAmPm(),array(
							'id'=>'startMeridiem',
							'class'=>"text ui-widget-content ui-corner-all",
							'style'=>"margin-bottom:12px; width:95%; padding: .4em;",
						));
					?>			
				</td>
			</tr>
			<tr>
				<td>
					<?php
						echo $form->label($orderTime,'end_date');
						echo $form->textField($orderTime,'end_date',array(
							'id'=>'endDate',
							'class'=>"text ui-widget-content ui-corner-all",
							'style'=>"margin-bottom:12px; width:95%; padding: .4em;",
						));
					?>				
				</td>
				<td>&nbsp;</td>
				<td>
					<?php
						echo $form->label($orderTime,'end_hour');
						echo $form->dropDownList($orderTime,'end_hour',$orderTime->getListHours(),array(
							'id'=>'endHour',
							'class'=>"text ui-widget-content ui-corner-all",
							'style'=>"margin-bottom:12px; width:95%; padding: .4em;",
						));
					?>				
				<td>
				<td>
					<?php
						echo $form->label($orderTime,'end_minute');
						echo $form->dropDownList($orderTime,'end_minute',$orderTime->getListMinutes(),array(
							'id'=>'endMin',
							'class'=>"text ui-widget-content ui-corner-all",
							'style'=>"margin-bottom:12px; width:95%; padding: .4em;",
						));
					?>				
				<td>
				<td>
					<?php
						echo $form->label($orderTime,'end_ampm');
						echo $form->dropDownList($orderTime,'end_ampm',$orderTime->getListAmPm(),array(
							'id'=>'endMeridiem',
							'class'=>"text ui-widget-content ui-corner-all",
							'style'=>"margin-bottom:12px; width:95%; padding: .4em;",
						));
					?>			
				</td>			
			</tr>			
		</table>
		<div id="order-error"></div>
	</fieldset>
	<?php $this->endWidget()?>
</div>