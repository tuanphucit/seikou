<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title><?php 
			$title = t('admin','Admin');
			foreach($this->breadcrumbs as $key=>$value){
				if ($key != '0')
					$title .= " - ".$key;
				else
					$title .= " - ".$value;
			}
			$title .= " - ". t(Yii::app()->name);
			echo $title;
		?></title>
		<link type="image/gif" rel="shortcut icon" href="<?php echo Html::imageThemeUrl('favicon.ico') ?>" />
		
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
				<?php
					echo Yii::t('admin','Welcome');
					echo ", ";
					echo Html::link(
						Yii::app()->user->name,
						"#"
					);
				?>
				<br />
				<a target="_blank" href="<?php echo Yii::app()->homeUrl;?>" title="View the Site"><?php echo Yii::t('admin',"Website")?></a> | <a href="<?php echo $this->createUrl('/site/logout');?>" title="Sign Out"><?php echo Yii::t('admin','Log Out')?></a>
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
						case 'user':
							$htmlTop['setting'] = array("class"=>"nav-top-item current");
							break;
						case 'room':
						case 'equipment':
							$htmlTop['product'] = array("class"=>"nav-top-item current");
							break;
						case 'order':
							$htmlTop['data'] = array("class"=>"nav-top-item current");
							break;
						case 'report':
						case 'tool':
							$htmlTop['tool'] = array("class"=>"nav-top-item current");
							break;
					}
					echo "<li>";
						echo Html::link(Yii::t('admin',"Dashboard"),$this->createUrl('/admin/default/index'),$htmlTop['dashboard']);
					echo "</li>";
					/**********          Quản lý hệ thống                      **********/
					echo "<li>";
						echo Html::link(Yii::t('admin',"System Management"),$this->createUrl('/admin/setting/index'),$htmlTop['setting']);
						echo "<ul>";
							echo "<li>";
								echo Html::link(t('User','admin'),$this->createUrl('/admin/user/index'),($controllerId == 'user')?$htmlItem:null);
							echo "</li>";
						echo "</ul>";
					echo "</li>";
					/**********          プロダクトを管理する                    **********/
					echo "<li>";
						echo Html::link(Yii::t('admin',"Product Management"),"#",$htmlTop['product']);
						echo "<ul>";
							echo "<li>";
								echo Html::link(Yii::t('admin',"Room"),$this->createUrl('/admin/room/index'),($controllerId == 'room')?$htmlItem:null);
							echo "</li>";
							echo "<li>";
								echo Html::link(Yii::t('admin',"Equipment"),$this->createUrl('/admin/equipment/index'),($controllerId == 'equipment')?$htmlItem:null);
							echo "</li>";
						echo "</ul>";
					echo "</li>";
					/**********          Quản lý dữ liệu                    **********/
					echo "<li>";
						echo Html::link(Yii::t('admin',"Order Management"),$this->createUrl('/admin/order/index'),$htmlTop['data']);
						echo "<ul>";
							echo "<li>";
								echo Html::link(t("Order",'admin'),$this->createUrl('/admin/order/index'),($controllerId == 'order')?$htmlItem:null);
							echo "</li>";
						echo "</ul>";
					echo "</li>";
					/**********          Công cụ                    **********/
					echo "<li>";
						echo Html::link(Yii::t('admin',"Tool"),"#",$htmlTop['tool']);
						echo "<ul>";
							echo "<li>";
								echo Html::link(t("Export CSV",'admin'),$this->createUrl('/admin/tool/exportcsv'),($controllerId == 'tool')?$htmlItem:null);
							echo "</li>";
							echo "<li>";
								echo Html::link(t("Report",'admin'),$this->createUrl('/admin/report/index'),($controllerId == 'report')?$htmlItem:null);
							echo "</li>";
							/*
							echo "<li>";
								echo Html::link("Xóa sim lỗi",$this->createUrl('/admin/tool/delSim'),array());
							echo "</li>";*/
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
