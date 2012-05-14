<script>
	function loading(btn){
		    btn.button('loading'); // call the loading function
		    setTimeout(function() {
		        btn.button('reset'); // call the reset function
		    }, 10000);
	};
</script>
<?php 
	$ajaxButton = '
	Yii::app()->controller->widget("bootstrap.widgets.BootButton", 
		array(
			"fn"=>"ajaxButton",
			"url" => Yii::app()->createUrl("/admin/order/finish/",array("id"=>$data->id)),
			"type"=>"primary",
			"label"=>"Normal",
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
    ).
    Yii::app()->controller->widget("bootstrap.widgets.BootButton", 
		array(
			"fn"=>"ajaxButton",
			"url" => Yii::app()->createUrl("/admin/order/stop/",array("id"=>$data->id)),
			"type"=>"danger",
			"label"=>"Over",
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
	
	$this->renderPartial('search',array(
		'orders'=>$orders,
		'searchOrder'=>$searchOrder,
	));
	
	
	$this->widget('bootstrap.widgets.BootGridView', array(
		'itemsCssClass'=>'striped bordered condensed',
		'id'=>'order-list',
	    'dataProvider'=>$orders->advancedSearch($searchOrder),
	    'template'=>"{items}{pager}",
	    'columns'=>array(
	        array(
	        	'header'=>'#',
	        	'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
	        ),
	        array(
	        	'name'=>'user_id',
	        	'filter'=>true,
	        	'value'=>'$data->user->full_name',
	        ),
	        array(
	        	'name'=>'product_id',
	        	'value'=>'$data->product->name',
	        ),
	        array('name'=>'start_date','header'=>t('Start Date','model')),
	        array('name'=>'start_time','header'=>t('Start Time','model')),
	        array('name'=>'end_date','header'=>t('End Date','model')),
	        array('name'=>'end_time'),
	    	array('name'=>'time'),
	        array(
	        	'name'=>'status',
	        	'type'=>'raw',
	        	'value'=>'$data->getStatusLabel()',
	        ),
	    	array(
	    		'name'=>'total',
	    		'value'=>'number_format($data->total)',
	    		'footer'=>number_format($orders->totalSum($searchOrder)),
	    	),
	        array(
	            'class'=>'bootstrap.widgets.BootButtonColumn',
	        	'template'=>'{view}{update}{delete}',
        		'deleteConfirmation'=>t('Are you sure to cancel this?'),
        		'buttons'=>array(
        			'delete'=>array('label'=>t('Cancel')),
        		),
	        ),
	    ),
	)); 
	
	$this->widget('bootstrap.widgets.BootButton', array(
			'label'=>t('New Order','admin'),
			'type'=>'success',
			'size'=>'medium',
			'url' => array('/order/index'),
			'htmlOptions'=>array('id'=>'search'),
	));
?>
