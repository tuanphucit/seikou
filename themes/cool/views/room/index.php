<?php 
	$this->widget('zii.widgets.CListView', array(
	    'dataProvider'=>$dataProvider,
	    'itemView'=>'_room',
		'template'=>'{items}{pager}',
	));
?>