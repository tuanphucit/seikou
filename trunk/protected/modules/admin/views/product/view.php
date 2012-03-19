<?php 
	// プロダクトが一覧に表示される。
	$this->widget('bootstrap.widgets.BootDetailView', array(
	    'data'=>$product,
	    'attributes'=>array(
	        array('name'=>'id', 'label'=>$product->getAttributeLabel('id')),
	        array('name'=>'name', 'label'=>$product->getAttributeLabel('name')),
	        array('name'=>'price', 'label'=>$product->getAttributeLabel('price')),
	        array(
	        	'name'=>'description', 
	        	'type'=>'html',
	        	'label'=>$product->getAttributeLabel('description'),
	        ),
	        array('name'=>'option', 'label'=>$product->getAttributeLabel('option')),
	        array(
	        	'label'=>$product->getAttributeLabel('image'),
	        	'type'=>'html',
	        	'value'=>Html::image($product->image,$product->name),
	        ),
	    ),
	)); 
	
	//二つのボタンを表示
	$this->widget('bootstrap.widgets.BootButton', array(
        'label'=>Yii::t('admin','Edit'),
        'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size'=>'small', // '', 'small' or 'large'
		'url'=>$this->createUrl('/admin/product/update/',array('id'=>$product->id)),
    ));
    
    echo " | ";
    
    $this->widget('bootstrap.widgets.BootButton',array(
    	'label'=>Yii::t('admin','Back'),
    	'size'=>'small',
    	'url'=>$this->createUrl('/admin/product/'),
    ))
?>