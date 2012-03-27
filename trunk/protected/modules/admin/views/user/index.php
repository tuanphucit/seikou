<?php 
	$this->widget('bootstrap.widgets.BootGridView', array(
	    'dataProvider'=>$users->search(),
	    'template'=>"{items}{pager}",
	    'itemsCssClass'=>'table table-striped',
	    'columns'=>array(
	        array('name'=>'id'),
	        array('name'=>'username'),
	        array('name'=>'full_name',),
	        array('name'=>'email',),
	        array('name'=>'tel',),
	        array('name'=>'yahoo',),
	        array('name'=>'last_login',),
	        array(
				'class'=>'bootstrap.widgets.BootButtonColumn',
	            'htmlOptions'=>array('style'=>'width: 50px'),
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