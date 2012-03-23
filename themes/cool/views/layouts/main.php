<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=shift_jis" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="copyright" content="Nikukyu-Punch" />
<title>クール系 ビジネス向けホームページテンプレート cool1</title>
<meta name="description" content="ここにサイト説明を入れます" />
<meta name="keywords" content="キーワード１,キーワード２,キーワード３,キーワード４,キーワード５" />
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
<h1>h1テキスト入力場所です。titleタグの次に重要なので念入りに考えてワードを盛り込みましょう。</h1>
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


<div id="main">

<h2>テンプレートご利用の前に必ずお読み下さい</h2>

<p>■<a href="http://nikukyu-punch.com/temp_biz.html#cool1">当ホームページテンプレートはこちらからダウンロードできます。</a></p>
<p>■<a href="product.html">当テンプレートの詳しい使い方はこちら</a>をご覧下さい</p>
<p>■このテンプレートは、<a href="http://nikukyu-punch.com/">無料テンプレートサイトNikukyu-Punch</a>が配布しているものです。<br />
<a href="http://nikukyu-punch.com/about.html">必ず利用規約をご一読</a>の上でご利用下さい。</p>

<p><span class="color1">■<strong>フッター内(HP最下部)の著作表示・スポンサー表示は削除しないで下さい。</strong></span><br />
お守りいただけない場合、テンプレートの利用を中止し、違反金を請求いたします。 逆に、ライセンス料を支払う事により、外す事も可能です。<br />
<a href="https://nikukyu-punch.com/license/index2.html" target="_blank">&gt;&gt;ライセンスコードお申し込みフォームはこちら</a></p>
<p><span class="color1">■<strong>WEB制作業者様、もしくは外部業者にWEB制作依頼を予定されている方へ</strong></span><br /> 
WEB制作代行用に当テンプレートを使う<strong>WEB制作業者</strong>様などの場合、必ず<strong>事業者登録</strong>(及びテンプレートコード取得)を行って下さい。<a href="http://nikukyu-punch.com/member.html" target="_blank">詳しくはこちら</a>。<br />
また、<strong>外部のWEB制作業者に制作を依頼予定</strong>の方の場合は、その制作業者側にこの事業者登録を行って頂く必要があります。</p>

<p><span class="color1">■<strong>当社関連サイト(※こちらのバナー３点は削除してご利用下さってOKです。)</strong></span><br />
<a href="http://template-punch.com/" target="_blank"><img src="<?php echo Html::imageThemeUrl("banner_tp.png")?>" alt="テンプレート販売サイトのテンプレートパンチ" width="200" height="40" /></a></p>
<p><a href="http://moko-design.com/" target="_blank"><img src="<?php echo Html::imageThemeUrl("banner_md.png")?>" alt="WEB制作サイト Moko Design" width="200" height="40" /></a></p>
<p><a href="http://photo-chips.com/" target="_blank"><img src="<?php echo Html::imageThemeUrl("banner_pc.png")?>" alt="フリー写真サイト PHOTO CHIPS" width="200" height="40" /></a></p>

<h2>テンプレートの編集サービスについて</h2>
<p>ロゴやメニューの画像加工やhtmlコーディング、テンプレートのテーマカラー変更やプログラム設置など、テンプレートに関する様々なサポートも承っております。また、当テンプレートのPSD(Photoshop)ファイル販売も行っております。<br />
<a href="http://nikukyu-punch.com/support.html" target="_blank">詳しくはこちらのテンプレート編集ページをご覧下さい。</a></p>

<h2>更新情報・お知らせ</h2>

<div class="new">
<dl>
<dt>2011/00/00</dt>
<dd>ホームページリニューアル</dd>
<dt>2011/00/00</dt>
<dd>ホームページリニューアル</dd>
<dt>2011/00/00</dt>
<dd>ホームページリニューアル</dd>
<dt>2011/00/00</dt>
<dd>ホームページリニューアル</dd>
<dt>2011/00/00</dt>
<dd>ホームページリニューアル</dd>
<dt>2011/00/00</dt>
<dd>ホームページリニューアル</dd>
<dt>2011/00/00</dt>
<dd>ホームページリニューアル</dd>
<dt>2011/00/00</dt>
<dd>ホームページリニューアル</dd>
<dt>2011/00/00</dt>
<dd>ホームページリニューアル</dd>
<dt>2011/00/00</dt>
<dd>ホームページリニューアル</dd>
</dl>
</div>
<!--/new-->

<p class="pagetop"><a href="#">↑　ページの上部へ</a></p>

</div>
<!--/main-->


<div id="sub">

<div class="subbox">

<h3>サブメニュー</h3>

<ul class="submenu">
<li><a href="#">メニュー１</a></li>
<li><a href="#">メニュー２</a></li>
<li><a href="#">メニュー３</a></li>
<li><a href="#">メニュー４</a></li>
<li><a href="#">メニュー５</a></li>
<li><a href="#">メニュー６</a></li>
<li><a href="#">メニュー７</a></li>
<li><a href="#">メニュー８</a></li>
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
