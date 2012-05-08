<!-- For advanced Search -->
<script>
	var show = true;
	$(document).ready(function(){
		$("#advanced-search-button").click(function(){
			if (show == false){
				$("#advanced-search").show();
				show = true;
			}
			else{
				$("#advanced-search").hide();
				show = false;
			}
		});

		$("#search").click(function(){
			$.fn.yiiGridView.update('user-list', {
				data: $("form#advanced-search").serialize()
			});
		});
	});
</script>
<?php 
	$this->widget('bootstrap.widgets.BootButton', array(
	    'label'=>t('Advanced Search','admin'),
	    'type'=>'primary',
	    'size'=>'medium',
		'toggle'=>true,
	    'htmlOptions'=>array('id'=>'advanced-search-button'),
	));
	
	echo "<br>";echo "<br>";echo "<br>";
	echo "<form id='advanced-search'>";
	echo Html::label($users->getAttributeLabel('status'),'',array());
	echo Html::dropDownList('status',0,Users::getListStatus());
	echo "<br>"; 
	$this->widget('bootstrap.widgets.BootButton', array(
			'label'=>t('Search','admin'),
			'type'=>'success',
			'size'=>'medium',
			'htmlOptions'=>array('id'=>'search'),
	));
	echo "</form>";
?>

<?php 
	$this->widget('bootstrap.widgets.BootGridView', array(
	    'dataProvider'=>$users->search(),
	    'template'=>"{items}{pager}",
	    'itemsCssClass'=>'table table-striped',
		'id'=>'user-list',
	    'columns'=>array(
	        array('name'=>'id'),
	        array('name'=>'username'),
	        array('name'=>'full_name',),
	        array('name'=>'email',),
	        array('name'=>'tel',),
	        array(
	        	'name'   =>'status',
	        	'value'  =>'$data->getStatusLabel()',
	        ),
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