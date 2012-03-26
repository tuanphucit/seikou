<div class="pageBreaker"></div>
<h2> <?php echo t('Order Detail')?></h2>
<?php 
	// オーダーが一覧に表示される。
	$this->widget('bootstrap.widgets.BootDetailView', array(
	    'data'=>$order,
	    'attributes'=>array(
	        array('name'=>'id'),
	        array(
	        	'name'=>t('Product'),
	        	'value'=>$order->product->name,
	        ),
	        array(
	        	'name'=>t('Date'),
	        	'value'=>$order->start_date." => ".$order->end_date,
	        ),
	        array(
	        	'name'=>t('Time'),
	        	'value'=>$order->start_time." => ".$order->end_time,
	        ),
	        array('name'=>'total'),
	        
	    ),
	)); 
?>
<h2> <?php echo t('Order History')?></h2>
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