<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title><?php echo $this->pageTitle?></title>
		
		<!--                       CSS                       -->
  
		<!-- Reset Stylesheet -->
		<link rel="stylesheet" href="<?php echo Html::cssUrl('admin/reset.css')?>" type="text/css" media="screen" />
	  
		<!-- Main Stylesheet -->
		<link rel="stylesheet" href="<?php echo Html::cssUrl('admin/style.css')?>" type="text/css" media="screen" />
		
		<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
		<link rel="stylesheet" href="<?php echo Html::cssUrl('admin/invalid.css')?>" type="text/css" media="screen" />	
		
		
		<!-- Internet Explorer Fixes Stylesheet -->
		
		<!--[if lte IE 7]>
			<link rel="stylesheet" href="<?php echo Html::cssUrl('ie.css')?>" type="text/css" media="screen" />
		<![endif]-->
		
		<!--                       Javascripts                       -->
  
		<!-- jQuery -->
		
		<!-- jQuery Configuration -->
		<?php 
			Yii::app()->clientScript->registerCoreScript('jquery');
			Yii::app()->clientScript->registerScriptFile(Html::jsUrl("admin/simpla.jquery.configuration.js"));
		?>
		
		<!-- Internet Explorer .png-fix -->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="<?php echo Html::jsUrl('DD_belatedPNG_0.0.7a.js')?>"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->
		
	</head>
  
	<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
		
		<div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
			
			<h1 id="sidebar-title"><a href="<?php echo $this->createUrl('/admin/default/index');?>">Simpla Admin</a></h1>
		  
			<!-- Logo (221px wide) -->
			<a href="<?php echo $this->createUrl('/admin/default/index');?>"><img id="logo" src="<?php echo Html::imageUrl('logo.png')?>" alt="Simpla Admin logo" /></a>
		  
			<!-- Sidebar Profile links -->
			<div id="profile-links">
				Xin chào, <a href="<?php echo $this->createUrl('/admin/user/index');?>" title="Edit your profile"><?php echo Yii::app()->user->getId()?></a>, Có <a href="<?php echo $this->createUrl('/admin/order/index')?>"><?php echo 3?> ĐDH</a><br />
				<br />
				<a target="_blank" href="<?php echo $this->createUrl('/home/index');?>" title="View the Site">Website</a> | <a href="<?php echo $this->createUrl('/admin/default/logout');?>" title="Sign Out">Thoát</a>
			</div>        
			
			<ul id="main-nav">  <!-- Accordion Menu -->
				<?php 
					$controllerId = $this->id;
					
					$htmlItem = array(
						'class'=>'current',
					);
					$htmlTop  = array(
						'dashboard' => array(
							'class'=> "nav-top-item no-submenu",
						),
						'setting' => array(
							'class'=> "nav-top-item",
						),
						'product' => array(
							'class'=> "nav-top-item",
						),
						'data' => array(
							'class'=> "nav-top-item",
						),
						'tool' => array(
							'class'=> "nav-top-item",
						),
					);
					switch ($controllerId) {
						case 'default':
						case 'dashboard':
							$htmlTop['dashboard'] = array(
								'class'=>'nav-top-item no-submenu current',
							);
							break;
						case 'setting':
						case 'menu':
						case 'banner':
						case 'user':
							$htmlTop['setting'] = array("class"=>"nav-top-item current");
							break;
						case 'product':
							$htmlTop['product'] = array("class"=>"nav-top-item current");
							break;
						case 'sim':
						case 'store':
						case 'order':
							$htmlTop['data'] = array("class"=>"nav-top-item current");
							break;
						case 'tool':
							$htmlTop['tool'] = array("class"=>"nav-top-item current");
							break;
					}
					echo "<li>";
						echo Html::link("Bảng điều khiển",$this->createUrl('/admin/default/index'),$htmlTop['dashboard']);
					echo "</li>";
					/**********          Quản lý hệ thống                      **********/
					echo "<li>";
						echo Html::link("Quản lý hệ thống",$this->createUrl('/admin/setting/index'),$htmlTop['setting']);
						echo "<ul>";
							echo "<li>";
								echo Html::link("Cấu hình hệ thống",$this->createUrl('/admin/setting/index'),($controllerId == 'setting')?$htmlItem:null);
							echo "</li>";
							echo "<li>";
								echo Html::link("Menu",$this->createUrl('/admin/menu/index'),($controllerId == 'menu')?$htmlItem:null);
							echo "</li>";
							echo "<li>";
								echo Html::link("Banner quảng cáo",$this->createUrl('/admin/banner/index'),($controllerId == 'banner')?$htmlItem:null);
							echo "</li>";
							echo "<li>";
								echo Html::link("Thành viên ban quản trị",$this->createUrl('/admin/user/index'),($controllerId == 'user')?$htmlItem:null);
							echo "</li>";
						echo "</ul>";
					echo "</li>";
					/**********          プロダクトを管理する                    **********/
					echo "<li>";
						echo Html::link("Product Management","#",$htmlTop['product']);
						echo "<ul>";
							echo "<li>";
								echo Html::link("Product",$this->createUrl('/admin/product/index'),($controllerId == 'product')?$htmlItem:null);
							echo "</li>";
						echo "</ul>";
					echo "</li>";
					/**********          Quản lý dữ liệu                    **********/
					echo "<li>";
						echo Html::link("Quản lý dữ liệu","#",$htmlTop['data']);
						echo "<ul>";
							echo "<li>";
								echo Html::link("Danh sách sim",$this->createUrl('/admin/sim/index'),($controllerId == 'sim')?$htmlItem:null);
							echo "</li>";
							echo "<li>";
								echo Html::link("Danh sách kho",$this->createUrl('/admin/store/index'),($controllerId == 'store')?$htmlItem:null);
							echo "</li>";
							echo "<li>";
								echo Html::link("Danh sách đơn đặt hàng",$this->createUrl('/admin/order/index'),($controllerId == 'order')?$htmlItem:null);
							echo "</li>";
						echo "</ul>";
					echo "</li>";
					/**********          Công cụ                    **********/
					echo "<li>";
						echo Html::link("Công cụ","#",$htmlTop['tool']);
						echo "<ul>";
							echo "<li>";
								echo Html::link("Xem cập nhật",$this->createUrl('/admin/tool/update'),($controllerId == 'tool')?$htmlItem:null);
							echo "</li>";
							echo "<li>";
								echo Html::link("HDSD",'https://docs.google.com/document/d/1MoJokttxx32f3Bf24mWmmfgJFB-ccXYcIfBFCNLgARQ/edit',array("target"=>"_blank"));
							echo "</li>";
							echo "<li>";
								echo Html::link("Xóa sim lỗi",$this->createUrl('/admin/tool/delSim'),array());
							echo "</li>";
						echo "</ul>";
					echo "</li>";
				?>
				
			</ul> <!-- End #main-nav -->
			
			<div id="messages" style="display: none"> <!-- Messages are shown when a link with these attributes are clicked: href="#messages" rel="modal"  -->
				
				<h3>3 Messages</h3>
			 
				<p>
					<strong>17th May 2009</strong> by Admin<br />
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
			 
				<p>
					<strong>2nd May 2009</strong> by Jane Doe<br />
					Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
			 
				<p>
					<strong>25th April 2009</strong> by Admin<br />
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
				
				<form action="" method="post">
				
					<h4>New Message</h4>
					
					<fieldset>
						<textarea class="textarea" name="textfield" cols="79" rows="5"></textarea>
					</fieldset>
					
					<fieldset>
					
						<select name="dropdown" class="small-input">
							<option value="option1">Send to...</option>
							<option value="option2">Everyone</option>
							<option value="option3">Admin</option>
							<option value="option4">Jane Doe</option>
						</select>
						
						<input class="button" type="submit" value="Send" />
						
					</fieldset>
					
				</form>
				
			</div> <!-- End #messages -->
			
		</div></div> <!-- End #sidebar -->
		
		<div id="main-content"> <!-- Main Content Section with everything -->
			
			<?php
				$this->widget('bootstrap.widgets.BootAlert');
				$this->widget('bootstrap.widgets.BootBreadcrumbs', array(
    				'links'=>$this->breadcrumbs,
				));
				echo $content
			?>			
			<div id="footer">
				<small>
						&#169; Copyright 2009 Simpla Admin | Powered by <a href="http://eteam.vn">eteam.vn</a> | <a href="#">Top</a>
				</small>
			</div><!-- End #footer -->
			
		</div> <!-- End #main-content -->
		
	</div></body>
  
</html>
