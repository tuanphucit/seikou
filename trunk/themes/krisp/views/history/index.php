<h2><?php echo t('Order History')?></h2>
<div class="pageBreaker"></div>
<?php 
	$this->beginWidget('QuickTipWidget',array())
?>
	<div class="oneThird">
		<?php echo Html::image(Html::imageThemeUrl('default/supportIcon.png'),"servicesIcon",array('class'=>'servicesIcon'))?>
		<h3><?php echo t('Function')?></h3>
		<ul class="unorderedList">
			<li><strong><?php echo t('Manage all order with its status');?></strong></li>
			<li><strong><?php echo t('Cancel an orders by click delete icon in the end of each rows')?></strong></li>
			<li><strong><?php echo t("View order's detail by click view icon in the end of each rows")?></strong></li>
		</ul>
	</div>
	<div class="oneThird">
		<?php echo Html::image(Html::imageThemeUrl('default/clockIcon.png'),"servicesIcon",array('class'=>'servicesIcon'))?>
		<h3><?php echo t('Quick Tips')?></h3>
		<ul class="unorderedList">
			<li><strong><?php echo t('Quick sort by click in each header');?></strong></li>
			<li><strong><?php echo t('Table are already sorted by start_date');?></strong></li>
		</ul>
	</div>
	<div class="oneThird lastColumn">
		<?php echo Html::image(Html::imageThemeUrl('default/analyticsIcon.png'),"servicesIcon",array('class'=>'servicesIcon'))?>
		<h3><?php echo t('Make Sure That');?></h3>
		<ul class="customList">
	          <li class="checked"><strong><?php echo t("You don't cancel order which was canceled or stopped by admin")?></strong></li>
	   	</ul>
	</div>
	<div class="clear"></div>
<?php $this->endWidget()?>
<?php 
	$this->widget('bootstrap.widgets.BootGridView', array(
		'itemsCssClass'=>'striped bordered condensed',
	    'dataProvider'=>$dataProvider,
	    'template'=>"{items}{pager}",
	    'columns'=>array(
	        array('name'=>'id', 'header'=>'#'),
	        array('name'=>'product_id'),
	        array('name'=>'start_date'),
	        array('name'=>'end_date'),
	        array('name'=>'start_time'),
	        array('name'=>'end_time'),
	        array(
	        	'name'=>'status',
	        	'header'=>t('Status','model'),
	        	'type'=>'raw',
	        	'value'=>'OrdersHistory::getStatusTypeLabel($data->getLastestStatus())',
	        ),
	        array(
	            'class'=>'bootstrap.widgets.BootButtonColumn',
	        	'template'=>'{view}{delete}',
	            'htmlOptions'=>array('style'=>'width: 50px'),
	        ),
	    ),
	)); 
?>