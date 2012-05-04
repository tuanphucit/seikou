			<!-- start list menu -->
                		
            <div class="simplebox">
            	<h1 class="titleh"><?php echo t('List Rooms')?></h1>
                		
           	 	<?php 
	           	 	$this->widget('zii.widgets.CListView', array(
	           	 			'dataProvider'=>$dataProvider,
	           	 			'itemView'=>'_room',
	           	 			'template'=>'{items}{pager}',
	           	 			'htmlOptions'=>array(
	           	 				'class'=>'list-menu'
	           	 			)
	           	 	));
           	 	?>
             
             </div>
             
            <!-- end list menu -->