<script>
	function loading(btn){
		    btn.button('loading'); // call the loading function
		    setTimeout(function() {
		        btn.button('reset'); // call the reset function
		    }, 10000);
	};
</script>
<?php 
	$this->beginWidget('QuickTipWidget',array())
?>
	<div class="oneThird">
		<?php echo Html::image(Html::imageThemeUrl('default/supportIcon.png'),"servicesIcon",array('class'=>'servicesIcon'))?>
		<h3><?php echo t('Function')?></h3>
		<strong><?php echo t('Quick manage recently orders')?></strong>
	</div>
	<div class="oneThird">
		<?php echo Html::image(Html::imageThemeUrl('default/clockIcon.png'),"servicesIcon",array('class'=>'servicesIcon'))?>
		<h3><?php echo t('Quick Tips')?></h3>
		<ul class="unorderedList">
			<li><strong><?php echo t('You can quick sort by click in header of table','admin');?></strong></li>
		</ul>
	</div>
	<div class="oneThird lastColumn">
		<?php echo Html::image(Html::imageThemeUrl('default/analyticsIcon.png'),"servicesIcon",array('class'=>'servicesIcon'))?>
		<h3><?php echo t('Make Sure That');?></h3>
		<ul class="customList">
	          <li class="checked"><strong><?php echo t("Don't delete orders which are already deleted",'admin')?></strong></li>
	          <li class="checked"><strong><?php echo t("Always check room with current time",'admin')?></strong></li>
	        </ul>
	</div>
	<div class="clear"></div>
<?php $this->endWidget()?>
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
	$this->widget('bootstrap.widgets.BootGridView', array(
		'itemsCssClass'=>'striped bordered condensed',
		'id'=>'order-list',
	    'dataProvider'=>$orders,
	    'template'=>"{items}{pager}",
	    'columns'=>array(
	        array('name'=>'id', 'header'=>'#'),
	        array('value'=>'$data->product->name','header'=>t('Product','model')),
	        array(
	        	'name'=>'user_id',
	        	'value'=>'$data->user->full_name',
	        ),
	        array('name'=>'start_date','header'=>t('Start Date','model')),
	        array('name'=>'end_date','header'=>t('End Date','model')),
	        array('name'=>'start_time','header'=>t('Start Time','model')),
	        array('name'=>'end_time','header'=>t('End Time','model')),
	        array(
	        	'name'=>'status',
	        	'value'=>'$data->getStatusLabel()',
	        ),
	        array(
	            'class'=>'bootstrap.widgets.BootButtonColumn',
        		'deleteConfirmation'=>t('Are you sure to cancel this?'),
	        	'buttons'=>array(
					'view'=>array(
	        			'url'=>'Yii::app()->createUrl("/admin/order/view",array("id"=>$data->id))',
	        		), 
					'update'=>array(
	        			'url'=>'Yii::app()->createUrl("/admin/order/update",array("id"=>$data->id))',
	        		),
	        		'delete'=>array(
	        			'url'=>'Yii::app()->createUrl("/admin/order/delete",array("id"=>$data->id))',
        				'label'=>t('Cancel'),
	        		),	      
	        	),
	        ),
	    ),
	)); 
?>
