<!-- start profile box -->
            <div class="profilebox">
            	<?php echo t('Welcome')?> <b><?php echo Yii::app()->user->name?></b>
                <a href="#" class="logout">logout</a>
                <div class="clear"></div>
            </div>
            <!-- end profile box -->
            
            
            
            <!-- start menu -->
           	 <ul id="menu">
           	 	<li>
           	 		<?php
           	 			echo Html::link(
           	 				Html::image(
           	 					Html::imageThemeUrl('icons/files.png'),
           	 					null,
	           	 				array(
	           	 					'width'  =>"21",
	           	 					'height' =>"21",
	           	 					'alt'    =>"icon",
	           	 					'class'  =>"m-icon"		
	           	 				)
           	 				)
           	 				."<b>".t('List Room')."</b>",
           	 				$this->createUrl('/room')
           	 			);
           	 		?>
           	 	</li>
           	 	<li>
           	 		<?php
           	 			echo Html::link(
           	 				Html::image(
           	 					Html::imageThemeUrl('icons/photo-gallery.png'),
           	 					null,
	           	 				array(
	           	 					'width'  =>"21",
	           	 					'height' =>"21",
	           	 					'alt'    =>"icon",
	           	 					'class'  =>"m-icon"		
	           	 				)
           	 				)
           	 				."<b>".t('Order Now')."</b>",
           	 				$this->createUrl('#')
           	 			);
           	 		?>
           	 	</li>
           	 	<li>
           	 		<?php
           	 			echo Html::link(
           	 				Html::image(
           	 					Html::imageThemeUrl('icons/personal-folder.png'),
           	 					null,
	           	 				array(
	           	 					'width'  =>"21",
	           	 					'height' =>"21",
	           	 					'alt'    =>"icon",
	           	 					'class'  =>"m-icon"		
	           	 				)
           	 				)
           	 				."<b>".t('Profile')."</b>",
           	 				$this->createUrl('#')
           	 			);
           	 		?>
           	 	</li>
           	 	<li>
           	 		<?php
           	 			echo Html::link(
           	 				Html::image(
           	 					Html::imageThemeUrl('icons/blocks.png'),
           	 					null,
	           	 				array(
	           	 					'width'  =>"21",
	           	 					'height' =>"21",
	           	 					'alt'    =>"icon",
	           	 					'class'  =>"m-icon"		
	           	 				)
           	 				)
           	 				."<b>".t('History')."</b>",
           	 				$this->createUrl('#')
           	 			);
           	 		?>
           	 	</li>
             	<li>
           	 		<?php
           	 			echo Html::link(
           	 				Html::image(
           	 					Html::imageThemeUrl('icons/error.png'),
           	 					null,
	           	 				array(
	           	 					'width'  =>"21",
	           	 					'height' =>"21",
	           	 					'alt'    =>"icon",
	           	 					'class'  =>"m-icon"		
	           	 				)
           	 				)
           	 				."<b>".t('Log Out')."</b>",
           	 				$this->createUrl('/site/logout')
           	 			);
           	 		?>
           	 	</li>
             </ul>
            <!-- end menu -->