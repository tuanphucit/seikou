﻿<!DOCTYPE html>
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
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo Html::jsThemeUrl('jquery.carousel.js')?>" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAcMv377CQr78x__fnejif6hTFwWbAnXhlB366t992QiHPWDYoVxROKqqm5TQzJ8uyw1i7cYqSvzriYA"></script>
	<script type="text/javascript" src="<?php echo Html::jsThemeUrl('jquery.gmap-1.1.0-min.js')?>"></script>
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
				<a href="./index.html"><img src="<?php echo Html::imageThemeUrl('logo.png')?>" alt="logo" /></a>
			</div>
			<div class="grid_6">
				<a href="#" class="search">&nbsp;</a>
				<div class="searchtoggle">
					<form>
						<input type="text" id="s" onblur="if(this.value=='')this.value='Type keyword and hit enter';" onfocus="if(this.value=='Type keyword and hit enter')this.value='';" value="Type keyword and hit enter" />
					</form>
				</div>
				<a href="#" class="loginregister">&nbsp;</a>
				<div class="logreg">
					<div class="log1">
						<div class="shiztitle">
							<h2 class="title">Login</h2>
						</div>
						<form class="minilogin">
							<input type="text" class="miniusername half" id="miniusername" name="miniusername" value="Username" onfocus="if(this.value=='Username')this.value='';" onblur="if(this.value=='')this.value='Username';"/>
							<input type="text" class="minipass half" id="minipass" name="minipass" value="Password" onfocus="if(this.value=='Password')this.value='';" onblur="if(this.value=='')this.value='Password';" />
							<input type="submit" class="mailsubmit" value="Sign In" />
							<a href="#" class="forgotpass">Forgot password?</a>
						</form>
					</div>
					<div class="log2">
						<div class="shiztitle">
							<h2 class="title">Register</h2>
						</div>
						<div class="reginfo">
							New User? By creating an account you 
							be able to shop faster, be up to date on 
							an order's status...
						</div>
						<a href="./register.html" class="regnow">Register Now</a>
					</div>
				</div>
			</div>
			<div class="grid_16 menu">
				<ul class="menu1">
					<li><a href="./index.html" class="active">Home<span>&nbsp;</span></a></li>

					<li><a href="#">Mega Menu</a>

						<div class="megamenu">
							<ul class="sub-menu">
								<li><a href="./cart.html">Cart page</a></li>
								<li><a href="./category.html">Category Page</a></li>
								<li><a href="./checkout.html">Checkout Page</a></li>
								<li><a href="./category-fullwidth.html">Category Fullwidth</a></li>
								<li class="separator"></li>
								<li><h4>Other pages</h4>
									<ul class="sub-menu">
										<li><a href="./contact.html">Contact Page</a></li>
										<li><a href="./order.html">Order Page</a></li>
										<li><a href="./page.html">Normal Page</a></li>
										<li><a href="./product.html">Product Page</a></li>
										<li><a href="./index2.html">Alternative Slider</a></li>
										<li><a href="./page-fullwidth.html">Fullwidth Page(Grid)</a></li>
										<li><a href="./register.html">Register Page</a></li>
									</ul>
								</li>
							</ul>
						</div>

					</li>

					<li><a href="./category.html">Clothing</a></li>
					<li><a href="./category.html">Shoes</a></li>
					<li><a href="./category.html">Sport</a></li>
					<li><a href="./contact.html">Contact</a></li>
				</ul>
				<div class="wrapcart">
					<a href="#" class="cartstatus">$12.90</a>
					<div class="cartdrop">
						<ul>
							<li><a href="#"><img src="<?php echo Html::imageThemeUrl('incart.png')?>" class="inp" alt="" /></a>
								<span class="ininfo">
									<span class="intitle"><a href="#">Casio Exilim Zoom</a></span>
									<span class="inquantity">x 1</span>
									<span class="inprice">138.80$</span>
									<span class="inremove"><img src="<?php echo Html::imageThemeUrl('remove.png')?>" alt="remove" /></span>
								</span>
								<span class="ininfo2">
									Color: green
								</span>
							</li>
							<li><a href="#"><img src="<?php echo Html::imageThemeUrl('incart.png')?>" class="inp" alt="" /></a>
								<span class="ininfo">
									<span class="intitle"><a href="#">Casio Exilim Zoom</a></span>
									<span class="inquantity">x 1</span>
									<span class="inprice">138.80$</span>
									<span class="inremove"><img src="<?php echo Html::imageThemeUrl('remove.png')?>" alt="remove" /></span>
								</span>
								<span class="ininfo2">
									Color: green
								</span>
							</li>
							<li class="pricedet">
								<span class="pricesub">
								Sub-Total : <span class="darker">$277.60</span>  |  Vat (17.5%) : <span class="darker">$36.00 </span>
								</span>
								<a href="./cart.html" class="mailsubmit">More</a>
								<a href="./checkout.html" class="mailsubmit">Checkout</a>
								<span class="whiteprice"><span class="totalno">Total</span> <span class="final">$313.60</span></span>
							</li>
						</ul>
					</div>

				</div>
			</div>
			<div class="grid_16 main">
				<div class="smallmenu">
					<ul>
						<li><a href="#" class="myacc">My Account</a></li>
						<li><a href="./cart.html" class="myshop">Shopping Cart</a></li>
						<li><a href="./checkout.html" class="mycheck">Checkout</a></li>
					</ul>
				</div>
				<div class="lines"></div>
			</div>
		</div>
	</div>
	<!--------------------------------------end of HEADER block  -->
	
	<div class="clear"></div>
	<?php echo $content ?>
	
	
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