<div class="pageBreaker"></div>
<?php echo Html::errorSummary($orderTime,null,null,array("class"=>"alert alert-block alert-error"))?>
<div class="pageBreaker"></div>
<?php 
	$this->widget('bootstrap.widgets.BootGridView', array(
		'itemsCssClass'=>'striped bordered condensed',
	    'dataProvider'=>new CArrayDataProvider($results),
	    'template'=>"{items}",
	    'columns'=>array(
	        array(
	        	'name'=>'id', 
	        	'header'=>'#',
	        ),
	        array(
	        	'name'=>'name',
	        	'header'=>Products::model()->getAttributeLabel('name'),
	        ),
	        array(
	        	'name'=>'price',
	        	'header'=>Products::model()->getAttributeLabel('price'),
	        ),
	        array(
	            'class'=>'bootstrap.widgets.BootButtonColumn',
	        	'template'=>'{view}',
	            'htmlOptions'=>array('style'=>'width: 50px'),
	        	'buttons'=>array(
	        		'view'=>array(
	        			'label'=> t('view'),
			        	'url'  => 'Yii::app()->createUrl("/".(($data->type == Products::TYPE_ROOM)?"room":"equipment")."/view",array("pid"=>$data->id))',
			        ),
			    ),
	        ),
	    ),
	)); 
?>