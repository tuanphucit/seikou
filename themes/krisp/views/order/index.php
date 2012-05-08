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
			<td><?php echo $form->textField($orderTime,'end_time')?></td>
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
					array('name'=>'end_date','header'=>t('End Date','model')),
					array('name'=>'start_time','header'=>t('Start Time','model')),
					array('name'=>'end_time'),
					array(
							'name'=>'status',
							'type'=>'raw',
							'value'=>'$data->getStatusLabel()',
					),
			),
	));
?>

<div class="pageBreaker"></div>

