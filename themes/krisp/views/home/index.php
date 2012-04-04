<div class="sliderWrap">
	<div class="sliderTopLine"></div>
	<div id="mainSlider" class="nivoSlider"> 
		<?php
			// Display image with link to its product
			/* If product have high quality image then uncomment this line	
			foreach ($products as $product)
				echo Html::link(
					Html::image($product->image),
					$this->createUrl('/product/view',array('pid'=>$product->id))
				);
			*/
		?>
		<a href=""><img src="<?php echo Html::url('uploads/homepage/home1.jpg')?>" alt="" /></a>
		<a href=""><img src="<?php echo Html::url('uploads/homepage/home2.jpg')?>" alt="" /></a>
		<a href=""><img src="<?php echo Html::url('uploads/homepage/home3.jpg')?>" alt="" /></a>
		<a href=""><img src="<?php echo Html::url('uploads/homepage/home4.jpg')?>" alt="" /></a>
		<a href=""><img src="<?php echo Html::url('uploads/homepage/home5.jpg')?>" alt="" /></a> 
	</div>
	<div class="sliderBottomLine"></div>
</div>
    
<div class="homeMessageWrap">
	<div class="homeMessage">
		<h1>"<?php echo t('We provide high quality products with lowest cost')?>"</h1>
       	  <p><?php echo t('All rooms here are design by many famous architect around the world with high tech equipment')?></p>
	</div>
	<?php 
		echo Html::link(
			t('Order Now'),
			$this->createUrl('/order/index'),
			array(
				'class' => "largeYBtn",
			)
		);
	?>
</div>
        
<div class="pageBreaker"></div>
<h2><?php echo t('Your Incoming Order')?></h2>
 <?php 
	$this->widget('bootstrap.widgets.BootGridView', array(
		'itemsCssClass'=>'striped bordered condensed',
	    'dataProvider'=>$dataProvider,
	    'template'=>"{items}",
	    'columns'=>array(
	        array('name'=>'id', 'header'=>'#'),
	        array('name'=>'product_id'),
	        array('name'=>'start_date'),
	        array('name'=>'end_date'),
	        array('name'=>'start_time'),
	        array('name'=>'end_time'),
	        array(
	        	'header'=>t('Status','model'),
	        	'type'=>'raw',
	        	'value'=>'OrdersHistory::getStatusTypeLabel($data->getLastestStatus())',
	        ),
	        array(
	            'class'=>'bootstrap.widgets.BootButtonColumn',
	        	'template'=>'{view}{delete}',
	            'htmlOptions'=>array('style'=>'width: 50px'),
	        	'buttons'=>array(
	        		'view'=>array(
	        			'label'=> t('view'),
			        	'url'  => 'Yii::app()->createUrl("/history/view",array("id"=>$data->id))',
			        ),
			        'delete'=>array(
	        			'label'=> t('delete'),
			        	'url'  => 'Yii::app()->createUrl("/history/delete",array("id"=>$data->id))',
			        ),
			    ),
	        ),
	    ),
	)); 
?>

<?php $this->renderPartial('/search/index',array('orderTime'=>$orderTime))?>