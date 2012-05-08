<?php 
	// Register More Javascript file and Css file
	// Jquery UI
	$cs = Yii::app()->getClientScript();
	$cs->registerCoreScript( 'jquery.ui' );
	$cs->registerCssFile(
		Yii::app()->assetManager->publish(
			Yii::app()->basePath . '/vendors/jquery.ui/redmond/'
		).
		'/jquery-ui-1.8.18.custom.css', 'screen'
	);
	$cs->registerCssFile(Html::cssUrl('admin/jquery.ui.timepicker.css'),'screen');
	$cs->registerScriptFile(Html::jsUrl('admin/jquery.ui.timepicker.js'));
?>

<script>
	$(document).ready(function(){
		$("#SearchOrderForm_start_date").datepicker({dateFormat: "yy-mm-dd"});
		$("#SearchOrderForm_end_date").datepicker({dateFormat: "yy-mm-dd"});

		$('#SearchOrderForm_start_time').timepicker();
		$('#SearchOrderForm_end_time').timepicker();
	});
</script>

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
			$.fn.yiiGridView.update('order-list', {
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

	$form = $this->beginWidget('CActiveForm',array(
		'id'=>'advanced-search',
		
	));
	?>
	<hr>
	<table>
		<tr>
			<td><?php echo $form->label($searchOrder,'user_id')?></td>
			<td><?php echo $form->dropDownList($searchOrder,'user_id',Users::getListUserName())?></td>
			
			<td><?php echo $form->label($searchOrder,'product_id')?></td>
			<td><?php echo $form->dropDownList($searchOrder,'product_id',Products::getListProduct())?></td>
		</tr>
		<tr>
			<td><?php echo $form->label($searchOrder,'start_date')?></td>
			<td><?php echo $form->textField($searchOrder,'start_date')?></td>
			<td><?php echo $form->label($searchOrder,'end_date')?></td>
			<td><?php echo $form->textField($searchOrder,'end_date')?></td>
		</tr>
		<tr>
			<td><?php echo $form->label($searchOrder,'start_time')?></td>
			<td><?php echo $form->textField($searchOrder,'start_time')?></td>
			<td><?php echo $form->label($searchOrder,'end_time')?></td>
			<td><?php echo $form->textField($searchOrder,'end_time')?></td>
		</tr>
		
		<tr>
			<td><?php echo $form->label($searchOrder,'order_status')?></td>
			<td>
				<?php 
					echo $form->dropDownList($searchOrder,'order_status',Orders::getListStatus());
				?>
			</td>
			<td>
				<?php echo t('Page Size','admin')?>
			</td>
			<td><?php 
				echo Html::dropDownList(   'pagerSize',
        									Yii::app()->user->getState('pagerSize',Yii::app()->params['defaultPagerSize']),
        									array(
        								  		10=>10,
        								  		20=>20,
        								  		50=>50,
        								  		100=>100,
        								  		200=>200,
        								  	)
	        	);
	        	?>
			</td>
		</tr>
		<tr>
			<td><?php 
				$this->widget('bootstrap.widgets.BootButton', array(
				    'label'=>t('Search','admin'),
				    'type'=>'success',
				    'size'=>'medium',
					'htmlOptions'=>array('id'=>'search'),
				));
				?>
			</td>
		</tr>
	</table>
	<hr>
	<?php 
	$this->endWidget();
	
?>

