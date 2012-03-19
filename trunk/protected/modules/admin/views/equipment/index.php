<?php 
	$this->widget('bootstrap.widgets.BootGridView', array(
	    'dataProvider'=>$users->search(),
	    'template'=>"{items}",
	    'itemsCssClass'=>'table table-striped',
	    'columns'=>array(
	        array('name'=>'id', 'header'=>'#'),
	        array('name'=>'name', 'header'=>$users->getAttributeLabel('name')),
	        array(
	        	'name'=>'price', 
	        	'header'=>$users->getAttributeLabel('price'),
	        	'value'=>'number_format($data->price)."000"',
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
		'url'=>$this->createUrl('/admin/equipment/add'),
	));
?>