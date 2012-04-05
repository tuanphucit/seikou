<h2>Dash Board</h2>
<div class="content-box column-left" id="room-wrapper">
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
?>		
	<div class="content-box-header">
		
		<h3 style="cursor: s-resize; "><?php echo t('Products List','admin')?></h3>
		
	</div> <!-- End .content-box-header -->
	
	<div class="content-box-content">
		
		<div class="tab-content default-tab" style="display: block; ">
		
			<?php 
				$this->beginWidget('QuickTipWidget',array())
			?>
				<div class="helper">
					<?php echo Html::image(Html::imageThemeUrl('default/supportIcon.png'),"servicesIcon",array('class'=>'servicesIcon'))?>
					<h3><?php echo t('Function')?></h3>
					<strong><?php echo t('List all product are being in used')?></strong>
				</div>
				<div class="clear"></div>
			<?php $this->endWidget()?>
		
			<?php 
			$this->widget('bootstrap.widgets.BootGridView', array(
			    'dataProvider'=>$products,
			    'template'=>"{items}{pager}",
			    'itemsCssClass'=>'table table-striped',
			    'columns'=>array(
			        array('name'=>'id', 'header'=>'#'),
			        array('name'=>'name'),
			        array(
			        	'name'=>'price', 
			        	'value'=>'number_format($data->price).",000"',
			        ),
			        array(
			        	'name'=>'status',
			        	'header'=>t('Status','model'),
			        	'type'=>'raw', 
			        	'value'=>'Products::getStatusLabel($data->getStatus())',
			        ),
			    ),
			)); 
		
			$this->widget('bootstrap.widgets.BootButton', array(
				'label'=>Yii::t('admin','Add'),
		    	'size'=>'small',
				'type'=>'success',
				'url'=>$this->createUrl('/admin/room/add'),
			));
		?>
			
		</div> <!-- End #tab3 -->        
		
	</div> <!-- End .content-box-content -->
				
</div>

<div class="content-box column-right" id="room-wrapper">
	
	<div class="content-box-header">
		
		<h3 style="cursor: s-resize; "><?php echo t('Users List','admin')?></h3>
		
	</div> <!-- End .content-box-header -->
	
	<div class="content-box-content">
		
		<div class="tab-content default-tab" style="display: block; ">
		
			<?php $this->renderPartial('/user/_quick',array('users'=>$users))?>
			
			
		</div> <!-- End #tab3 -->        
		
	</div> <!-- End .content-box-content -->
				
</div>
<div class="clear"></div>

<div class="content-box" id="room-wrapper">
	
	<div class="content-box-header">
		
		<h3 style="cursor: s-resize; "><?php echo t('Products List','admin')?></h3>
		
	</div> <!-- End .content-box-header -->
	
	<div class="content-box-content">
		
		<div class="tab-content default-tab" style="display: block; ">
		
			
			<?php $this->renderPartial('/order/_quick',array('orders'=>$orders))?>		
			
			
		</div> <!-- End #tab3 -->        
		
	</div> <!-- End .content-box-content -->
				
</div>
<div class="clear"></div>