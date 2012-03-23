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
				
		SUCCESS
		
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