<div class="product-box">
<h2><?php echo $data->name?></h2>
<?php echo Html::link(
					Html::image($data->image,$data->name,array('class'=>'image-preview')),
					$this->createUrl('/room/view',array('pid'=>$data->id))
			);
?>
<table>
	<tr>
		<td><?php echo $data->getAttributeLabel('name')?></td>
		<td><?php echo $data->name?></td>
	</tr>
	<tr>
		<td><?php echo $data->getAttributeLabel('id')?></td>
		<td><?php echo $data->id?></td>
	</tr>
	<tr>
		<td><?php echo $data->getAttributeLabel('price')?></td>
		<td><?php echo $data->price?></td>
	</tr>
	<tr>
		<td></td>
		<td>View more</td>
	</tr>
</table>
</div>