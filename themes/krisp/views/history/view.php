<div class="pageBreaker"></div>
<h2> <?php echo t('Order Detail')?></h2>

<?php 
	$this->widget('bootstrap.widgets.BootGridView', array(
		'itemsCssClass'=>'striped bordered condensed',
	    'dataProvider'=>$dataProvider,
	    'template'=>"{items}",
	    'columns'=>array(
	        array('name'=>'id', 'header'=>'#'),
	        array('name'=>'time'),
	        array(
	        	'name'=>'status',
	        	'type'=>'raw',
	        	'value'=>'OrdersHistory::getStatusTypeLabel($data->status)',
	        ),
	        array(
	        	'header'=>t('User'),
	        	'value'=>'$data->user->full_name',
	        ),
	        array('name'=>'description'),
	    ),
	)); 
?>