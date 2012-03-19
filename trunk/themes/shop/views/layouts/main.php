<!DOCTYPE html>
<html lang="en">
<head>
	<!-- システムのタイトル　-->
	<title><?php echo Yii::app()->name;?></title>
	
	<!-- CSS -->
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo Html::cssThemeUrl('reset.css')?>" />
	<link rel="stylesheet" href="<?php echo Html::cssThemeUrl('text.css')?>" />
	<link rel="stylesheet" href="<?php echo Html::cssThemeUrl('960.css')?>" />
	<link rel="stylesheet" href="<?php echo Html::cssThemeUrl('style.css')?>" />
	
	<!-- JAVASCRIPT -->
	<?php Yii::app()->clientScript->registerCoreScript('jquery') ?>
	<script src="<?php echo Html::jsThemeUrl('jquery.carousel.js')?>" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo Html::jsThemeUrl('jquery.rating.js')?>" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo Html::jsThemeUrl('jquery.anythingslider.js')?>" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo Html::jsThemeUrl('custom.js')?>" type="text/javascript" charset="utf-8"></script>
	
	<!-- META DATA -->
	<meta charset="UTF-8"></head>
<body>

	<!-- --------------------------------------------------HEADER BLOCK ------------------------------------------------------------------------------->
	<div class="header">
		<div class="container_16">
			<div class="grid_10 logo">
				<?php 
					echo Html::link(
						Html::image(Html::imageThemeUrl('logo.png'),'logo'),
						Yii::app()->homeUrl
					); 
				?>
			</div>
			<div class="grid_6">
				<a href="#" class="search">&nbsp;</a>
				<div class="searchtoggle">
					<form class="custom">
						<input type="text" id="s" class="search-box" onblur="if(this.value=='')this.value='Type keyword and hit enter';" onfocus="if(this.value=='Type keyword and hit enter')this.value='';" value="Type keyword and hit enter" />
					</form>
				</div>
			</div>
			<div class="grid_16 menu">
				<ul class="menu1">
					<li>
						<?php
							echo Html::link(
								Yii::t('user', 'Home'),
								$this->createUrl('/home/index'),
								array('class'=>'active')
							);
						?>
					</li>
					<li>
						<?php
							echo Html::link(
								Yii::t('user', 'About Us'),
								$this->createUrl('/profile/index')
							);
						?>
					</li>
					<li>
						<?php
							echo Html::link(
								Yii::t('user', 'Contact Us'),
								$this->createUrl('/site/contact')
							);
						?>
					</li>
					<li><a href="#">Rent</a>
						<div class="megamenu">
							<ul class="sub-menu">
								<li><a href="./cart.html">Rooms</a></li>
								<li><a href="./category.html">Equipments</a></li>
								
							</ul>
						</div>
						
					</li>
				</ul>
			</div>
			<div class="grid_16 main">
				<div class="smallmenu">
					<ul>
						<li>
							<?php
								echo Html::link(
									Yii::t('user', 'My Profile'),
									$this->createUrl('/profile/index'),
									array(
										'class'=>'myacc',
									)
								);
							?>
						<li>
						<li>
							<?php
								echo Html::link(
									Yii::t('user', 'History'),
									$this->createUrl('/history/index'),
									array(
										'class'=>'myshop',
									)
								);
							?>
						<li>
						<li>
							<?php
								echo Html::link(
									Yii::t('user', 'Log Out'),
									$this->createUrl('/site/logout'),
									array(
										'class'=>'mycheck',
									)
								);
							?>
						<li>
					</ul>
				</div>
				<div class="lines"></div>
			</div>
		</div>
	</div>
	<!--------------------------------------end of HEADER block  -->
	
	
	<div class="clear"></div>
	<div class="container_16 padding50">
		<?php $this->widget('bootstrap.widgets.BootAlert'); ?>
		<?php echo $content ?>
	</div>
	<div class="clear"></div>
	
	
	<!-- ----------------------------------------------   FOOTER ---------------------------------------------->
	<div class="subfooter">
		<div class="container_16">
			<div class="boxwrap">
				<div class="footerbox twitter">
					<h2 class="title">Twitter Updates</h2><div class="shizzle4"></div>
					<ul class="tweets">
					<li>Check out this great #themeforest item for you
					'Simpler Landing' <a href="#">http://t.co/LbLwldb6 </a>
					<span>2 hours ago</span></li>
					<li class="lastone">Check out this great #themeforest item for you
					'Simpler Landing' <a href="#">http://t.co/LbLwldb6 </a>
					<span>2 hours ago</span></li>
					</ul>
					<a href="#" class="followus">Follow us on twitter</a>
				</div>
				<div class="footerbox">
				<h2 class="title">Newsletter Signup</h2><div class="shizzle4 mid"></div>
					<div class="newsletter">
						Become the first one to know about every new
						product we release on every day. Sign Up for
						the newsletter to get discouns too..
						<form class="signup" action="#" method="GET">
						<label for="emailba">Your email address</label>
						<input type="text" value="your@email.com" class="mailinput" id="mailinput" name="mailinput" />
						<input type="submit" class="mailsubmit" value="Sign Up" id="signup" name="signup" />
					</form>
					</div>
				</div>
				<div class="footerboxlast">
					<img src="<?php echo Html::imageThemeUrl('minilogo.png')?>" class="minilogo" alt="logo" />
					<div class="shizzle4 slast"></div>
					<div class="clear"></div>
					<ul class="infos">
					<li class="fphone">+387 123 456, +387 123 456 <br /> +387 123 456</li>
					<li class="fmobile">+387-123-456-1<br />+387-123-456-2</li>
					<li class="fmail lastone">your@email.com<br />customer.care@mail.com</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="footer">
		<div class="container_16">
			<div class="grid_13">
				<ul class="footermenu">
					<li><a href="./index.html">Home</a></li>
					<li><a href="./cart.html">My Cart</a></li>
					<li><a href="./checkout.html">Checkout</a></li>
					<li><a href="./order.html">Completed Orders</a></li>
					<li><a href="./contact.html">Contact us</a></li>
				</ul>
				<span class="copyline">&copy;All rights reserved by <a href="#">yoursite.com</a></span>
				<div class="cards"><img src="<?php echo Html::imageThemeUrl('cards.png')?>" alt="credit cards" /></div>
			</div>
			<div class="grid_3">
				<span class="followon">Follow us on</span>
				<div class="socializer">
					<a href="http://twitter.com/minimalthemes" class="ftwitter">twitter</a>
					<a href="http://www.facebook.com/pages/Minimal-Themes/264056723661265" class="ffacebook">facebook</a>
					<a href="#" class="fflickr">flickr</a>
					<a href="#" class="ffeed">feed</a>
				</div>
			</div>
		</div>
	</div>
	<!-------------------------------------------------------------- end FOOTER -->
</body>
</html>