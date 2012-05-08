<?php 
	$this->widget('bootstrap.widgets.BootGridView', array(
	    'dataProvider'=>$products->search(),
	    'template'=>"{items}",
	    'itemsCssClass'=>'table table-striped',
	    'columns'=>array(
	        array('name'=>'id', 'header'=>'#'),
	        array('name'=>'name'),
	    	array(
	    		'name'=>'option',
	    	),
	        array(
	        	'name'=>'price', 
	        	'header'=>$products->getAttributeLabel('price'),
	        	'value'=>'number_format($data->price)',
	        ),
	        array(
				'class'=>'bootstrap.widgets.BootButtonColumn',
	            'htmlOptions'=>array('style'=>'width: 50px'),
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