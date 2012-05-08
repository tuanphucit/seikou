<?php 
	// For calc price
	$products = Products::model()->findAll('',array('order'=>'name ASC'));
	$total = 0;
	foreach ($products as $product){
		$total += $product->price;
		echo "<div id='price-$product->id' style='display:none'>$product->price</div>";
	}
	echo "<div id='price-sla' style='display:none'>$total</div>";
	
?>
<script>
	function date_difference(d1,d2){
		if (d2 == null)
			return 1;
		//Total time for one day
		var one_day=1000*60*60*24;
		//Here we need to split the inputed dates to convert them into standard format
		var x=d1.split("-");
	    var y=d2.split("-");
	    //date format(Fullyear,month,date)
	    var date1=new Date(x[0], x[1], x[2]);
	    var date2=new Date(y[0], y[1], y[2]);
	    //Calculate difference between the two dates, and convert to days
	    return Math.ceil((date2.getTime()-date1.getTime())/(one_day))+1;
	}
	/**
		 * Caculate price based on div time and div price  
	 */
	function calc_total() {
		// Get time diff
		start_time = $("#start-time").text().split(":");
		end_time   = $("#end-time").text().split(":");
		time_diff  = (end_time[0] - start_time[0])*2 + Math.ceil(((end_time[1] - start_time[1]))/30);
		$("#time").text(time_diff);
		
		// Get date diff
		
		start_date = $("#start-date").text();
		end_date = $("#end-date").text();
		date_diff  = date_difference(start_date,end_date);
		$("#date").text(date_diff);
	
		total = time_diff * date_diff * $("#price").text() + parseInt($("#register").text());
		$("#total-price").text(total);
		console.log(total);
	}
	function changePrice(){
		// update product price
		product_id   = $("#OrderTimeForm_pid").val();
		price_tag_id = '#price-'+product_id;
		$("#price").text($(price_tag_id).text());

		// update time-chooser
		$("#start-time").text($("#OrderTimeForm_start_hour").val()+':'+$("#OrderTimeForm_start_minute").val());
		$("#end-time").text($("#OrderTimeForm_end_hour").val()+':'+$("#OrderTimeForm_end_minute").val());

		// update date-chooser
		$("#start-date").text($("#OrderTimeForm_start_date").val());
		$("#end-date").text($("#OrderTimeForm_end_date").val());
		calc_total();
	}
	$(document).ready(function(){
		$("select").change(function(){
			changePrice();
		});
		$("input").change(function(){
			changePrice();
		});
		changePrice();
	});
</script>


<?php $this->beginWidget('bootstrap.widgets.BootModal', array(
    'id'=>'modal',
    'htmlOptions'=>array('class'=>'hide'),
)); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h2><?php echo t('Your Order')?></h2>
</div>
<?php 
	$form = $this->beginWidget('CActiveForm',array(
		'id'=>'order-form',
	))
?>
<div class="modal-body">
	<div class="oneHalf">
		<h3><?php echo t('Please Choose Product')?></h3>
		<?php
			echo $orderTime->getAttributeLabel('pid');
			echo " ";
			echo $form->dropDownList($orderTime,'pid',$orderTime->getListProducts(),array(
					'onChange'=>'javascript:changePrice()',
			));
			echo "<br>";
		?>
	</div>
	<div class="oneHalf lastColumn">
		<h3><?php echo t('Please Choose Time')?></h3>
		<div class="block">
			<div id="start-date">2012-03-26</div> ~
			<div id="end-date">2012-03-28</div>
			<?php echo Html::link(t('Select'),'#',array('id'=>'show-date-chooser'))?>
			 <br>
			<div id="date-chooser">
				<?php 
					echo $form->textField($orderTime,'start_date');
					echo $form->textField($orderTime,'end_date');
				?>
			</div>
			<div id="start-time">00:00</div> ~
			<div id="end-time">00:00</div>
			<?php echo Html::link(t('Select'),'#',array('id'=>'show-time-chooser'))?>
			<div id="time-chooser">
				<?php 
					logged(dump($orderTime));
					echo "<br>";
					echo $form->dropDownList($orderTime,'start_hour',$orderTime->getListHours());
					echo " : ";
					echo $form->dropDownList($orderTime,'start_minute',$orderTime->getListMinutes());
					echo " ~ ";
					echo $form->dropDownList($orderTime,'end_hour',$orderTime->getListHours());
					echo " : ";
					echo $form->dropDownList($orderTime,'end_minute',$orderTime->getListMinutes());
				?>
			</div>
		</div>
	</div>
	<div class="clear"></div>
	<div class="oneHalf"></div>
	<div class="oneHalf lastColumn">
		<h3><?php echo t('Total')?></h3>
		<div id="total" class="block">
			<div id="price">0</div> *
			<div id="date">1</div> *
			<div id="time">0</div>  +
			<div id="register">
				<?php 
					$fee = Fee::model()->find();
					echo $fee->register;
				?>
			</div> =
			<div id="total-price">0</div>
		</div>
	</div>
	<div class="clear"></div>
	<div id="order-error"></div>
</div>
<div class="modal-footer">
    <?php echo CHtml::ajaxLink(
    		t('Submit'), 
    		$this->createUrl('order/add'), 
    		array(
    			'data'=>'js:$("form#order-form").serialize()',
    			'success'=>'function(data){
					if (data=="Save successed"){
    					$("#modal").modal("hide");
    					$("#calendar").fullCalendar( "removeEvents");
    					$("#calendar").fullCalendar( "addEventSource", "'.$this->createUrl('/order/getOrders/').'" );
    					return;
    				}
    				else $("#order-error").html(data);
				}',
    		),
    		array('class'=>'btn btn-primary')); 
    ?>
    <?php echo CHtml::link(t('Close'), '#', array('class'=>'btn', 'data-dismiss'=>'modal')); ?>
</div>
<?php $this->endWidget(); ?>
<?php $this->endWidget(); ?>
