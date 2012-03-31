<?php 
	// For calc price
	$products = Products::model()->findAll('',array('order'=>'name ASC'));
	foreach ($products as $product){
		echo "<div id='price-$product->id' style='display:none'>$product->price</div>";
	}
	
?>
<script>
	function changePrice(){
		product_id   = $("#OrderTimeForm_pid").val();
		price_tag_id = '#price-'+product_id;
		$("#price").text($(price_tag_id).text());
	}
	$(document).ready(function(){
		changePrice();
	});
</script>


<?php $this->beginWidget('bootstrap.widgets.BootModal', array(
    'id'=>'modal',
    'htmlOptions'=>array('class'=>'hide'),
    'events'=>array(
        'show'=>"js:function() { console.log('modal show.'); }",
        'shown'=>"js:function() { console.log('modal shown.'); }",
        'hide'=>"js:function() { console.log('modal hide.'); }",
        'hidden'=>"js:function() { console.log('modal hidden.'); }",
    ),
)); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h2>Your Order</h2>
</div>
<?php 
	$form = $this->beginWidget('CActiveForm',array(
		'id'=>'order-form',
	))
?>
<div class="modal-body">
	<div class="oneHalf">
		<h3>Please Choose Product</h3>
		<?php
			echo t('Name :');
			echo $form->dropDownList($orderTime,'pid',$orderTime->getListProducts(),array(
					'onChange'=>'javascript:changePrice()',
			));
			echo "<br>";
		?>
	</div>
	<div class="oneHalf lastColumn">
		<h3>Please Choose Time</h3>
		<div id="time-chooser" class="block">
			<div id="start-date">2012-03-26</div> ~
			<div id="end-date">2012-03-28</div> <br>
			<div id="start-time">09:00</div> ~
			<div id="end-time">24:00</div>
		</div>
	</div>
	<div class="clear"></div>
	<div class="oneHalf"></div>
	<div class="oneHalf lastColumn">
		<h3>Total</h3>
		<div id="total" class="block">
			<div id="price">000</div> *
			<div id="time">000</div>  +
			<div id="register">
				<?php 
					$fee = Fee::model()->find();
					echo $fee->register;
				?>
			</div> =
			<div id="total-price"></div>
		</div>
	</div>
</div>
<div class="modal-footer">
    <?php echo CHtml::ajaxLink(
    		'Save changes', 
    		$this->createUrl('order/add'), 
    		array(
    			'data'=>'js:$("form#order-form").serialize()',
    			'success'=>'function(data){
					if (data=="success"){
    					$("#modal").modal("hide");
    					$("#calendar").fullCalendar( "rerenderEvents" );
    					return;
    				}
    				else $("#order-error").html(data);
				}',
    		),
    		array('class'=>'btn btn-primary')); 
    ?>
    <?php echo CHtml::link('Close', '#', array('class'=>'btn', 'data-dismiss'=>'modal')); ?>
</div>
<?php $this->endWidget(); ?>
<?php $this->endWidget(); ?>