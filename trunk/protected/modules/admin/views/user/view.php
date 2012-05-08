<?php 
	// プロダクトが一覧に表示される。
	$this->widget('bootstrap.widgets.BootDetailView', array(
	    'data'=>$user,
	    'attributes'=>array(
	        array('name'=>'id'),
	        array('name'=>'username'),
	        array('name'=>'full_name'),
	        array('name'=>'birthday'),
	        array('name'=>'idcard'),
	        array('name'=>'work'),
	        array('name'=>'address1'),
	        array('name'=>'address2'),
	        array('name'=>'email'),
	        array('name'=>'tel'),
	        array('name'=>'yahoo'),
	        array('name'=>'skype'),
	    	array('name'=>'status','value'=>$user->getStatusLabel()),
	        array('name'=>'last_login'),
	    ),
	)); 
	
	//二つのボタンを表示
	$this->widget('bootstrap.widgets.BootButton', array(
        'label'=>Yii::t('admin','Update'),
        'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size'=>'small', // '', 'small' or 'large'
		'url'=>$this->createUrl('/admin/user/update/',array('id'=>$user->id)),
    ));
    
    echo " | ";
    
    $this->widget('bootstrap.widgets.BootButton',array(
    	'label'=>Yii::t('admin','Back'),
    	'size'=>'small',
    	'url'=>$this->createUrl('/admin/user/'),
    ))
?>