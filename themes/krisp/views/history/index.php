<div class="pageBreaker"></div>
<?php 
	$this->widget('bootstrap.widgets.BootGridView', array(
		'itemsCssClass'=>'striped bordered condensed',
	    'dataProvider'=>$dataProvider,
	    'template'=>"{items}{pager}",
	    'columns'=>array(
	        array('name'=>'id', 'header'=>'#'),
	        array('name'=>'product_id'),
	        array('name'=>'start_date'),
	        array('name'=>'end_date'),
	        array('name'=>'start_time'),
	        array('name'=>'end_time'),
	        array(
	        	'name'=>'status',
	        	'header'=>t('Status','model'),
	        	'type'=>'raw',
	        	'value'=>'OrdersHistory::getStatusTypeLabel($data->getLastestStatus())',
	        ),
	        array(
	            'class'=>'bootstrap.widgets.BootButtonColumn',
	        	'template'=>'{view}{delete}',
	            'htmlOptions'=>array('style'=>'width: 50px'),
	        ),
	    ),
	)); 
?>