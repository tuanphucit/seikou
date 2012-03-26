<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="utf-8">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="copyright" content="Luckymancvp" />
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
		<?php 
			echo "<li>";
				echo Html::link(
					Html::image(
						Html::imageThemeUrl("menu_over_01.gif"),
						t("home"),
						array(
							'width'=>"139",
							'height'=>"51",
							'id'=>"Image1",
							'onmouseover'=>"MM_swapImage('Image1','','".Html::imageThemeUrl("menu_over_01.gif")."',0)",
							'onmouseout'=>"MM_swapImgRestore()",
						)
					),
					Yii::app()->homeUrl
				);
			echo "</li>";
			echo "<li>";
				echo Html::link(
					Html::image(
						Html::imageThemeUrl("menu_02.gif"),
						t("product"),
						array(
							'width'=>"139",
							'height'=>"51",
							'id'=>"Image2",
							'onmouseover'=>"MM_swapImage('Image2','','".Html::imageThemeUrl("menu_over_02.gif")."',0)",
							'onmouseout'=>"MM_swapImgRestore()",
						)
					),
					$this->createUrl('/product/index')
				);
			echo "</li>";
			echo "<li>";
				echo Html::link(
					Html::image(
						Html::imageThemeUrl("menu_03.gif"),
						t("product"),
						array(
							'width'=>"139",
							'height'=>"51",
							'id'=>"Image3",
							'onmouseover'=>"MM_swapImage('Image3','','".Html::imageThemeUrl("menu_over_03.gif")."',0)",
							'onmouseout'=>"MM_swapImgRestore()",
						)
					),
					$this->createUrl('/equipment/index')
				);
			echo "</li>";
			echo "<li>";
				echo Html::link(
					Html::image(
						Html::imageThemeUrl("menu_04.gif"),
						t("company"),
						array(
							'width'=>"139",
							'height'=>"51",
							'id'=>"Image4",
							'onmouseover'=>"MM_swapImage('Image4','','".Html::imageThemeUrl("menu_over_04.gif")."',0)",
							'onmouseout'=>"MM_swapImgRestore()",
						)
					),
					$this->createUrl('/equipment/index')
				);
			echo "</li>";
			echo "<li>";
				echo Html::link(
					Html::image(
						Html::imageThemeUrl("menu_05.gif"),
						t("recruit"),
						array(
							'width'=>"139",
							'height'=>"51",
							'id'=>"Image5",
							'onmouseover'=>"MM_swapImage('Image5','','".Html::imageThemeUrl("menu_over_05.gif")."',0)",
							'onmouseout'=>"MM_swapImgRestore()",
						)
					),
					$this->createUrl('/equipment/index')
				);
			echo "</li>";
			echo "<li>";
				echo Html::link(
					Html::image(
						Html::imageThemeUrl("menu_06.gif"),
						t("contact"),
						array(
							'width'=>"139",
							'height'=>"51",
							'id'=>"Image6",
							'onmouseover'=>"MM_swapImage('Image6','','".Html::imageThemeUrl("menu_over_06.gif")."',0)",
							'onmouseout'=>"MM_swapImgRestore()",
						)
					),
					$this->createUrl('/contact/index')
				);
			echo "</li>";
		?>
		</ul>
		<!--/menu-->


		<div id="contents">


			<div id="main">

			<?php echo $content?>

			</div>
			<!--/main-->


			<div id="sub">

				<div class="subbox">

					<h3>submenu</h3>

					<ul class="submenu">
					<li><a href="#">Menu-1</a></li>
					<li><a href="#">Menu-2</a></li>
					<li><a href="#">Menu-3</a></li>
					<li><a href="#">Menu-4</a></li>
					<li><a href="#">Menu-5</a></li>
					<li><a href="#">Menu-6</a></li>
					<li><a href="#">Menu-7</a></li>
					<li><a href="#">Menu-8</a></li>
					</ul>

				</div>
				<!--/subbox-->

				<div class="subbox">

					<h3>当ブロック内のテキストは</h3>
					<p>段落タグ&lt;p&gt;で囲みましょう。余白が自動で反映されます。 </p>

					<h3>ブロック内に画像を置く場合</h3>
					<p>段落タグ内なら幅180pxまで。段落タグの外なら幅190pxまで。</p>

				</div>
				<!--/subbox-->

				<h3>subboxで囲まなければ</h3>
				<p>このようにも使えます。ここに画像をおく場合、段落タグ内なら幅220px、段落タグの外なら幅230pxまで。</p>

				<div class="subbox">

					<h3>サポート</h3>
					<p>■HPカラーの変更、お問い合わせフォームの設置、画像加工サービス(500円?)など、ホームページ編集のお手伝いもしております。<br />
					<a href="http://nikukyu-punch.com/support.html" target="_blank">&gt;&gt;詳細はこちら</a></p>

				</div>
				<!--/subbox-->

			</div>
			<!--/sub-->


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
