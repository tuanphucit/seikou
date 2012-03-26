<?php 
	// プロダクトが一覧に表示される。
	$this->widget('bootstrap.widgets.BootDetailView', array(
	    'data'=>$product,
	    'attributes'=>array(
	        array('name'=>'id', 'label'=>$product->getAttributeLabel('id')),
	        array('name'=>'name', 'label'=>$product->getAttributeLabel('name')),
	        array('name'=>'price', 
	        	'label'=>$product->getAttributeLabel('price'),
	        	'value'=>number_format($product->price)." ,000 VND",
	        ),
	        array(
	        	'name'=>'description', 
	        	'type'=>'html',
	        	'label'=>$product->getAttributeLabel('description'),
	        ),
	        array('name'=>'option', 'label'=>$product->getOptionLabel()),
	        array(
	        	'label'=>$product->getAttributeLabel('image'),
	        	'type'=>'html',
	        	'value'=>Html::image($product->image,$product->name),
	        ),
	    ),
	)); 
	
	//二つのボタンを表示
	$this->widget('bootstrap.widgets.BootButton', array(
        'label'=>t('Order'),
        'type'=>'danger', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size'=>'large', // '', 'small' or 'large'
		'url'=>$this->createUrl('/order/index/',array('pid'=>$product->id)),
    ));
    
    echo t(' now for the best price');
?>