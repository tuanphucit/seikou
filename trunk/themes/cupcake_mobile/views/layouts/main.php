<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php echo t(Yii::app()->name)?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
<?php
	$cs = Yii::app()->getClientScript(); 
	// CSS 
	$cs->registerCssFile(Html::cssThemeUrl('reset.css'), 'screen');
	$cs->registerCssFile(Html::cssThemeUrl('root.css'), 'screen');

	// JS
	$cs->registerCoreScript('jquery');
	$cs->registerScriptFile(Html::jsThemeUrl('toogle.js'));
?>
</head>
<body>
	
    <!-- start header -->
    	<div id="header">
         <a href="#"><img src="<?php echo Html::imageThemeUrl('logo.png'); ?>" width="77" height="24" alt="logo" class="logo" /></a>
         	<?php 
         		echo Html::link(
         			Html::image(
         				Html::imageThemeUrl('back-button.png'),
         				'icon',
         				array(
         					'width'  =>"15",
         					'height' =>"16",
         				)
         			),
         			Yii::app()->homeUrl,
         			array('class'=>'button back')
         		);
         	?>
         	<a href="#" class="button search"><img src="<?php echo Html::imageThemeUrl('search.png'); ?>" width="16" height="16" alt="icon"/></a>
         	<?php 
         		echo Html::link(
         			Html::image(
         				Html::imageThemeUrl('create.png'),
         				'icon',
         				array(
         					'width'  =>"16",
         					'height' =>"16",
         				)
         			),
         			array('/order'),
         			array('class'=>'button create')
         		);
         	?>
        <div class="clear"></div>
</div>
    <!-- end header -->
    
    <!-- start searchbox -->
    <div class="searchbox">
   	  <form id="form1" name="form1" method="post" action="">
      	<input type="text" name="textfield" id="textfield" class="txtbox" />
   	  </form>
    </div>
    <!-- end searchbox -->
    
    
    
    <!-- start page -->
    <div class="page">
    
    		
            <?php echo $content?>
            
            
            <!-- start top button -->
            <div class="topbutton"><a href="#"><span>Top</span></a></div>
            <!-- end top button -->
            
            
            
            <!-- start footer -->
            <div class="footer">
            Reserve system by <a href="http://luckymancvp.eteamvn.com" target="_blank">luckymancvp</a>
            </div>
            <!-- end footer -->
            
            
            
    
    <div class="clear"></div>
    </div>
    <!-- end page -->	
    

<!--DO NOT REMOVE BELOW SCRIPT. IT SHOULD ALWAYS APPEAR AT THE VERY END OF YOUR CONTENT-->

<script language="JavaScript1.2">

//Scrollable content III- By http://www.dynamicdrive.com

var speed, currentpos=curpos1=0,alt=1,curpos2=-1

function initialize(){
if (window.parent.scrollspeed!=0){
speed=window.parent.scrollspeed
scrollwindow()
}
}

function scrollwindow(){
temp=(document.all)? document.body.scrollTop : window.pageYOffset
alt=(alt==0)? 1 : 0
if (alt==0)
curpos1=temp
else
curpos2=temp

window.scrollBy(0,speed)
}

setInterval("initialize()",10)

</script>
    
    
</body>
</html>