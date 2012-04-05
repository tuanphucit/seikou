<?php 
	$this->beginWidget('QuickTipWidget',array())
?>
	<div class="oneThird">
		<?php echo Html::image(Html::imageThemeUrl('default/supportIcon.png'),"servicesIcon",array('class'=>'servicesIcon'))?>
		<h3><?php echo t('Function')?></h3>
		<strong><?php echo t('Quick control users who is recently login')?></strong>
	</div>
	<div class="clear"></div>
<?php $this->endWidget()?>
<?php 
	$this->widget('bootstrap.widgets.BootGridView', array(
	    'dataProvider'=>$users,
	    'template'=>"{items}{pager}",
	    'itemsCssClass'=>'table table-striped',
	    'columns'=>array(
	        array('name'=>'id'),
	        array('name'=>'username'),
	        array('name'=>'tel',),
	        array('name'=>'last_login',),
	        array(
				'class'=>'bootstrap.widgets.BootButtonColumn',
	            'htmlOptions'=>array('style'=>'width: 50px'),
	        	'buttons'=>array(
					'view'=>array(
	        			'url'=>'Yii::app()->createUrl("/admin/user/view",array("id"=>$data->id))',
	        		),	    
	        		'update'=>array(
	        			'url'=>'Yii::app()->createUrl("/admin/user/update",array("id"=>$data->id))',
	        		),	  
	        		'delete'=>array(
	        			'url'=>'Yii::app()->createUrl("/admin/user/delete",array("id"=>$data->id))',
	        		),	      
	        	),
	        ),
	    ),
	)); 

	$this->widget('bootstrap.widgets.BootButton', array(
		'label'=>t('Add','admin'),
    	'size'=>'small',
		'type'=>'success',
		'url'=>$this->createUrl('/admin/user/add'),
	));
?>