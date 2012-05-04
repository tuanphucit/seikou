<?php 
	echo "<h2>".t('List Fee')." (VND)</h2>";
	// プロダクトが一覧に表示される。
	$this->widget('bootstrap.widgets.BootDetailView', array(
	    'data'=>$fee,
	    'attributes'=>array(
	        array('name'=>'register','value'=>number_format($fee->register)),
	        array('name'=>'penalty' ,'value'=>number_format($fee->penalty)),
	        array('name'=>'cancel'  ,'value'=>number_format($fee->cancel)),
	    ),
	)); 
	
	//二つのボタンを表示
	$this->widget('bootstrap.widgets.BootButton', array(
        'label'=>Yii::t('admin','Update'),
        'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size'=>'small', // '', 'small' or 'large'
		'url'=>$this->createUrl('/admin/fee/update/'),
    ));
?>