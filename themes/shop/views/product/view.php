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
		$('#rangeA').daterangepicker({
			arrows:true
		}); 

		$('select#valueA, select#valueB').selectToUISlider();
	});
</script>

		<div>
			<input type="text" value="" id="rangeA" />			
		</div>
		
		<fieldset>
			<label for="valueA">From:</label>
			<?php 
				echo Html::dropDownList('valueA', '06:00', Timer::getArrayHours());
			?>
			
	
			<label for="valueB">To:</label>
			<?php 
				echo Html::dropDownList('valueB', '12:30', Timer::getArrayHours());
			?>
		</fieldset>
		
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
			<span class="onsale"><span class="oldprice">$314</span>$199</span>
		
		</div>
		
		<div class="productdata">
			<div class="infospan">Model <span>PT - 3</span></div>
			<div class="infospan">Item no <span>2522</span></div>
			<div class="infospan">Manufacturer <span>Nikon</span></div>			
		</div>
		
		<div class="tabs">
			<!-- tabs -->
			<ul class="tabNavigation">
				<li><a href="#desc">Description</a></li>
			</ul>
			
			<!-- tab containers -->
			<div id="desc">
		    	<p>Lorem ipsum dolor sit amet.</p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		  	</div>
		</div>
		
		<div class="shiztitle">
			<h2 class="title h2bg">Order</h2>
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