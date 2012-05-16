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
	$this->widget('bootstrap.widgets.BootGridView', array(
	    'dataProvider'=>$moneys->search(),
	    'template'=>"{items}{pager}",
	    'itemsCssClass'=>'table table-striped',
		'id'=>'money-list',
	    'columns'=>array(
	        array(
	        	'header'=>'#',
	        	'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
	        ),
	        array('name'=>'user_id','value'=>'$data->user->full_name'),
	        array('name'=>'year',),
	        array('name'=>'month',),
	        array('name'=>'real',),
	        array('name'=>'penalty',),
	        array(
				'class'=>'bootstrap.widgets.BootButtonColumn',
	            'template'=>'{update}',
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