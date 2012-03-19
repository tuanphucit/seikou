<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title><?php echo 'Simpla Admin'?> | <?php echo Yii::t('admin', 'Login')?></title>

		<!--                       CSS                       -->
  
		<!-- Reset Stylesheet -->
		<link rel="stylesheet" href="<?php echo Html::cssUrl('admin/reset.css');?>" type="text/css" media="screen" />
	  
		<!-- Main Stylesheet -->
		<link rel="stylesheet" href="<?php echo Html::cssUrl('admin/style.css');?>" type="text/css" media="screen" />
		
		<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
		<link rel="stylesheet" href="<?php echo Html::cssUrl('admin/invalid.css');?>" type="text/css" media="screen" />	
		
		
		
		<!-- Internet Explorer Fixes Stylesheet -->
		
		<!--[if lte IE 7]>
			<link rel="stylesheet" href="<?php echo Html::cssUrl('admin/ie.css');?>" type="text/css" media="screen" />
		<![endif]-->
		
	</head>
  
	<body id="login">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'login-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
		)); ?>
		
		<div id="login-wrapper" class="png_bg">
			<div id="login-top">
			
				<h1>Simpla Admin</h1>
				<!-- Logo (221px width) -->
				<img id="logo" src="<?php echo Html::imageUrl('logo.png')?>" alt="Simpla Admin logo" />
			</div> <!-- End #logn-top -->
			
			<div id="login-content">
				
				<form action="index.html">
					
					<p>
						<?php echo $form->label($model,'username')?>
						<?php echo $form->textField($model,'username',array('class'=>'text-input'))?>						
					</p>
					<div class="clear"></div>
					<p>
						<?php echo $form->label($model,'password')?>
						<?php echo $form->passwordField($model,'password',array('class'=>'text-input'))?>
					</p>
					<div class="clear"></div>
					<p id="remember-password">
						<?php echo $form->checkBox($model,'rememberMe')?>
						<?php echo $model->getAttributeLabel('rememberMe')?>
					</p>
					<div class="clear"></div>
					<p>
						<?php echo $form->errorSummary($model,null,null,array('class'=>'errorMessage'))?>
					</p>
					<div class="clear"></div>
					<p>
						<?php echo Html::submitButton(Yii::t('admin','Sign In'),array('class'=>'button'))?>
					</p>
					
				</form>
			</div> <!-- End #login-content -->
		</div> <!-- End #login-wrapper -->
		<?php $this->endWidget()?>
		
  </body>
  
</html>
