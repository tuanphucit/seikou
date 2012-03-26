<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="copyright" content="Nikukyu-Punch" />
<title><?php echo Yii::app()->name?></title>
<?php 
	$cs = Yii::app()->getClientScript(); 
	$cs->registerCssFile(
		Html::cssThemeUrl('style.css'), 'screen'
	);
	$cs->registerScriptFile(Html::jsThemeUrl('script.js'));
?>
</head>


<body id="top">


	<div id="container">


		<div id="header">	
		<img src="<?php echo Html::imageThemeUrl("logo.gif")?>" alt="" name="logo" width="459" height="61" id="logo" /></div>
		<!--/header-->


		<div id="mainimg">
		<img class="slide_file" src="<?php echo Html::imageThemeUrl("1.jpg")?>" title="index.html"/>
		<img class="slide_file" src="<?php echo Html::imageThemeUrl("2.jpg")?>" title="index.html"/>
		<img class="slide_file" src="<?php echo Html::imageThemeUrl("3.jpg")?>" title="index.html"/>
		<input type="hidden" id="slide_loop" value="0"/>
		<a href="" id="slide_link">
		<img id="slide_image" src="<?php echo Html::imageThemeUrl("1.jpg")?>" alt="" width="900" height="300" />
		<img id="slide_image2" src="<?php echo Html::imageThemeUrl("1.jpg")?>" alt="" width="900" height="300" /></a>
		</div>
		<!--/mainimg-->


		<ul id="menu">
		<li><a href="index.html"><img src="<?php echo Html::imageThemeUrl("menu_over_01.gif")?>" alt="ホーム" width="139" height="51" id="Image1" onmouseover="MM_swapImage('Image1','','<?php echo Html::imageThemeUrl("menu_over_01.gif")?>',0)" onmouseout="MM_swapImgRestore()" /></a></li>
		<li><a href="product.html"><img src="<?php echo Html::imageThemeUrl("menu_02.gif")?>" alt="製品紹介" name="Image2" width="139" height="51" id="Image2" onmouseover="MM_swapImage('Image2','','<?php echo Html::imageThemeUrl("menu_over_02.gif")?>',0)" onmouseout="MM_swapImgRestore()" /></a></li>
		<li><a href="technology.html"><img src="<?php echo Html::imageThemeUrl("menu_03.gif")?>" alt="技術紹介" name="Image3" width="139" height="51" id="Image3" onmouseover="MM_swapImage('Image3','','<?php echo Html::imageThemeUrl("menu_over_03.gif")?>',0)" onmouseout="MM_swapImgRestore()" /></a></li>
		<li><a href="company.html"><img src="<?php echo Html::imageThemeUrl("menu_04.gif")?>" alt="会社紹介" width="139" height="51" id="Image4" onmouseover="MM_swapImage('Image4','','<?php echo Html::imageThemeUrl("menu_over_04.gif")?>',0)" onmouseout="MM_swapImgRestore()" /></a></li>
		<li><a href="recruit.html"><img src="<?php echo Html::imageThemeUrl("menu_05.gif")?>" alt="採用情報" width="139" height="51" id="Image5" onmouseover="MM_swapImage('Image5','','<?php echo Html::imageThemeUrl("menu_over_05.gif")?>',0)" onmouseout="MM_swapImgRestore()" /></a></li>
		<li><a href="contact.html"><img src="<?php echo Html::imageThemeUrl("menu_06.gif")?>" alt="お問い合わせ" width="139" height="51" id="Image6" onmouseover="MM_swapImage('Image6','','<?php echo Html::imageThemeUrl("menu_over_06.gif")?>',0)" onmouseout="MM_swapImgRestore()" /></a></li>
		</ul>
		<!--/menu-->


		<div id="contents">


			<div id="main_nosub">

				<?php echo $content?>

			</div>
			<!--/main no sub-->


			<ul id="footermenu">
				<li><a href="index.html">ホーム</a></li>
				<li><a href="product.html">製品紹介</a></li>
				<li><a href="technology.html">技術紹介</a></li>
				<li><a href="company.html">会社紹介</a></li>
				<li><a href="recruit.html">採用情報</a></li>
				<li><a href="contact.html">お問い合わせ</a></li>
			</ul>
			<!--/footermenu-->


			<div id="footer">
				Copyright&copy; 2011 サンプル工業株式会社 All Rights Reserved.<br />
				<a href="http://nikukyu-punch.com/" target="_blank">Template design by Nikukyu-Punch.</a>＆<a href="http://www.crytus.co.jp/" target="_blank">Simple Slide Show by Crytus.</a>
			</div>
			<!--/footer-->


		</div>
		<!--/contents-->


	</div>
	<!--/container-->


</body>
</html>
