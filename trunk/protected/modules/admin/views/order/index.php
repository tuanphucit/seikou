<script>
	function loading(btn){
		    btn.button('loading'); // call the loading function
		    setTimeout(function() {
		        btn.button('reset'); // call the reset function
		    }, 10000);
	};
</script>
<?php 
	$ajaxButtonStop = '
	Yii::app()->controller->widget("bootstrap.widgets.BootButton", 
		array(
			"fn"=>"ajaxButton",
			"url" => Yii::app()->createUrl("/admin/order/stop/",array("id"=>$data->id)),
			"type"=>"primary",
			"label"=>"Click me",
			"loadingText"=>"loading...",
			"htmlOptions"=>array(
				"class"=>"stop-button",
				"onClick"=>"javascript:loading($(this))",
			),
	    	"ajaxOptions"=>array(
		    	"complete"=>"function(){
		        	$.fn.yiiGridView.update(\\"order-list\\",{});
		        }",
	    	),
    	),
    	true
    )
	';
	$this->widget('bootstrap.widgets.BootGridView', array(
		'itemsCssClass'=>'striped bordered condensed',
		'id'=>'order-list',
	    'dataProvider'=>$orders->search(),
	    'template'=>"{items}{pager}",
	    'columns'=>array(
	        array('name'=>'id', 'header'=>'#'),
	        array('name'=>'product_id','header'=>t('Product ID','model')),
	        array(
	        	'name'=>'user_id',
	        	'value'=>'$data->user->full_name',
	        ),
	        array('name'=>'start_date','header'=>t('Start Date','model')),
	        array('name'=>'end_date','header'=>t('End Date','model')),
	        array('name'=>'start_time','header'=>t('Start Time','model')),
	        array('name'=>'end_time','header'=>t('End Time','model')),
	        array(
	        	'name' => 'real_stop_time',
	        	'type' => 'raw',
	        	'value'=> '($data->getLastestStatus() != OrdersHistory::HISTORY_CREATE) ? $data->real_stop_time :
	        		'.$ajaxButtonStop,
	        ),
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
