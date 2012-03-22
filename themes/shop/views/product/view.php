<?php 
	$cs = Yii::app()->getClientScript(); 
	$cs->registerCoreScript( 'jquery.ui' );
	$cs->registerCssFile(
		Yii::app()->assetManager->publish(
			Yii::app()->basePath . '/vendors/jquery.ui/redmond/'
		).
		'/jquery-ui-1.8.18.custom.css', 'screen'
	);
	$cs->registerCssFile(
			Html::cssUrl('ui.daterangepicker.css'),
			'screen'
	);
	$cs->registerCssFile(
			Html::cssUrl('ui.slider.extras.css'),
			'screen'
	);
	$cs->registerScriptFile(Html::jsUrl('selectToUISlider.jQuery.js'));
	$cs->registerScriptFile(Html::jsUrl('date.js'));
	$cs->registerScriptFile(Html::jsUrl('daterangepicker.jQuery.js'));
?>

<script type="text/javascript">	
	$(function(){
		$('#date').daterangepicker({
			arrows:true,
			onChange:calc_total
		}); 

		$('select#start_time, select#end_time').selectToUISlider({
			onChange:function(){alert('nothing')}
		});
	});

	function calc_total() {
		// Get time diff
		start_time = $("#start_time").val().split(":");
		end_time   = $("#end_time").val().split(":");
		time_diff  = (end_time[0] - start_time[0])*2 + ((end_time[1] - start_time[1]))/30;

		// Get date diff
		date = $("#date").val().split(" - ");
		date_diff  = date_diff(date[0],date[1]);

		total = time_diff * date_diff * $("#Products_price").val();

		$("#total").text(addCommas(total));
	}
</script>
	<div class="grid_16">
		<div class="ribbonbig">
			<div class="lijevo">
				<div class="bread">
					<?php 
						echo Html::link(
							Yii::t('user','Home'),
							Yii::app()->homeUrl
						);
						echo " > ";
						echo $product->name;
					?>
				</div>
				<div class="bigtitle"><?php echo $product->name?></div>
			</div>
		</div>
	
	</div>
	
	<div class="grid_11 singleleft">
		<div class="shiztitle">
			<h2 class="title h2bg"><?php echo $product->name?></h2>
		</div>
		<div class="clear"></div>
		
		<div class="productimages">
			<div class="mainimg">
				<?php 
					echo Html::image($product->image,$product->name,array('width'=>332))
				?>
			</div>
			<span class="onsale"><?php echo number_format($product->price)?> đ</span>
		
		</div>
		
		<div class="productdata">
			<div class="infospan">
				<?php echo $product->getAttributeLabel('id')?>
				<span><?php echo $product->id?></span>
			</div>
			<div class="infospan">
				<?php echo $product->getAttributeLabel('price')?>
				<span><?php echo number_format($product->price)?> đ</span>
			</div>
			<div class="infospan">
				<?php echo $product->getAttributeLabel('type')?>
				<span><?php echo $product->getProductType()?></span>
			</div>
			<div class="infospan">
				<?php echo $product->getAttributeLabel('option')?>
				<span><?php echo $product->option?></span>
			</div>
		</div>
		
		<div class="tabs">
			<!-- tabs -->
			<ul class="tabNavigation">
				<li><a href="#desc"><?php echo Yii::t('user','Description')?></a></li>
			</ul>
			
			<!-- tab containers -->
			<div id="desc">
		    	<?php echo $product->description?>
		  	</div>
		</div>
		
		<div class="shiztitle">
			<h2 class="title h2bg">Order</h2>
		</div>
		
		<div id="order-content">
			<?php 
				$form = $this->beginWidget('bootstrap.widgets.BootActiveForm',array(
					'id'=>'order-form',
				));
					echo $form->hiddenField($product,'price');
					
					echo Html::label(Yii::t('user','Pick day you want to rent:'),"date");
					echo Html::textField("date");
					echo Html::label(Yii::t('user','Pick time you want to rent:'),"start_time");
					echo "<fieldset>";
						echo Html::label(Yii::t('user','From'),'start_time');
						echo Html::dropDownList('start_time', '8:00', Timer::getArrayHours());
						echo Html::label(Yii::t('user','To'),'end_time');
						echo Html::dropDownList('end_time', '11:00', Timer::getArrayHours());
					echo "</fieldset>";
					
					echo "<br><br><br>";
					echo "<strong> Total: </strong>";
					echo Html::tag("div",array('id'=>'total','style'=>"display: inline-block"),0);
					echo " 000 VND";
					echo "<br>";
					echo CHtml::htmlButton('Rent it', array('class'=>'btn', 'type'=>'submit'));
				$this->endWidget();
			?>
		</div>
		
		<div class="shiztitle">
			<h2 class="title h2bg">Related Products</h2>
		</div>
		<ul class="featprod grayprod">
			<li>
				<img class="fimg2" alt="" src="<?php echo Html::imageThemeUrl('productexample3.png')?>">
				<span class="smalltitle"><a href="./product.html">Some title here</a></span>
				<span class="smalldesc">Item no.: 1422</span>
				<span class="onsale"><span class="oldprice">$314</span>$199</span>
			</li>
			<li>
				<img class="fimg2" alt="" src="<?php echo Html::imageThemeUrl('productexample3.png')?>">
				<span class="smalltitle"><a href="./product.html">Some title here</a></span>
				<span class="smalldesc">Item no.: 1422</span>
				<span class="green gray">$199</span>
			</li>
			<li class="lastli">
				<img class="fimg2" alt="" src="<?php echo Html::imageThemeUrl('productexample3.png')?>">
				<span class="smalltitle"><a href="./product.html">Some title here</a></span>
				<span class="smalldesc">Item no.: 1422</span>
				<span class="green gray">$199</span>
			</li>
		</ul>
		
		
	</div>
	
	
	<div class="grid_4 righthome">
		<h2 class="title">Categories</h2><div class="shizzley shizzley3"></div>
		<div class="categorybox">
		<ul>
		<li><a href="#">Category 1</a></li>
		<li><a href="#">Adidas shoes</a></li>
		<li><a href="#">Category 1</a></li>
		<li><a href="#">Adidas shoes</a></li>
		</ul>
		</div>
		<div class="ads">
		<a href="#"><img src="<?php echo Html::imageThemeUrl('ads.png')?>" alt="ads"></a>
		</div>
		<div class="categories-widget">
		<div class="shiztitle">
		<h2 class="title h2bg">Best sellers</h2>
		</div>
		<div class="categorybox sellers">
		<ul>
		<li><a href="#"><img class="smallpreview" alt="" src="<?php echo Html::imageThemeUrl('smallcam.png')?>"></a>
		<a class="smalltitle2" href="#">Panasonic M3</a>
		<span class="smallprice2">Price : $122</span>
		</li>
		<li><a href="#"><img class="smallpreview" alt="" src="<?php echo Html::imageThemeUrl('smallcam.png')?>"></a>
		<a class="smalltitle2" href="#">Panasonic M3</a>
		<span class="smallprice2">Price : $122</span>
		</li>
		<li><a href="#"><img class="smallpreview" alt="" src="<?php echo Html::imageThemeUrl('smallcam.png')?>"></a>
		<a class="smalltitle2" href="#">Panasonic M3</a>
		<span class="smallprice2">Price : $122</span>
		</li>
		<li class="lastone"><a href="#"><img class="smallpreview" alt="" src="<?php echo Html::imageThemeUrl('smallcam.png')?>"></a>
		<a class="smalltitle2" href="#">Panasonic M3</a>
		<span class="smallprice2">Price : $122</span>
		</li>
		</ul>
		</div>
		</div>
	</div>