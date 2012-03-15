<div class="inner">
	<div class="breadcrumb">
		<?php 
			echo Html::link(
				Yii::t('user','Home'),
				$this->createUrl('home/index')
			);
			echo " » ";
			echo Html::link(
				Yii::t('user','My Profile'),
				$this->createUrl('profile/index')
			);
		?>
	</div>
	<h2 class="heading-title"><span><?php echo Yii::t('user','My Profile')?></span></h2>

	<!-- LEFT COLUMN -->
	<div id="column-left">
		<div class="box">
			<h3 class="heading-title">
				<span><?php echo Yii::t('user','Basic Information')?></span>
			</h3>
			<div class="box-content box-contact-details">
				<ul>
					<li class="user">
						<span>
							<?php echo $user->getAttributeLabel('name')?>
						</span>
						<br/>
						<?php echo $user->name;?>
					</li>
					<li class="birthday">
						<span><?php echo Yii::t('user','Birthday')?></span>
						<br/>
						<?php echo $user->birthday;?>
					</li>
					<li class="idcard">
						<span>
							<?php echo $user->getAttributeLabel('idcard')?>
						</span>
						<br/>
						<?php echo $user->idcard;?>
					</li>
					<li class="address">
						<span><?php echo $user->getAttributeLabel('address1')?><br/>
						<?php echo $user->address1;?>
					</li>
					<li class="role">
						<span><?php echo $user->getAttributeLabel('role')?><br/>
						<?php echo $user->getRoleName();?>
					</li>
					<li class="last_login">
						<span><?php echo $user->getAttributeLabel('last_login')?><br/>
						<?php echo $user->last_login;?>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- END OF LEFT COLUMN -->

	<div id="content" class="content-column-left">
		<div class="content contacts-page">
			<?php 
				$form = $this->beginWidget('CActiveForm',array(
					'id'=>'profile-form',
					'enableClientValidation'=>true,
					'clientOptions'=>array('validateOnSubmit'=>true),
				));
			?>
			<div class="box-contacts fixed">
				<div class="box-content">
					<h3 class="heading-title">
						<span><?php echo Yii::t('user','Additional Information')?></span>
					</h3>
					<div class="stitched"></div>
					<div class="form">
					<?php
						echo $form->label($user,'work');
						echo $form->textArea(
							$user,
							'work',
							array(
								'style'=>"width: 98%",
								'rows' =>"10",
								'cols' =>"40",
							)
						);
						echo "<br>";echo $form->error($user,'work');echo "</br>";
						echo $form->label($user,'address2');
						echo $form->textArea(
							$user,
							'address2',
							array(
								'style'=>"width: 98%",
								'rows' =>"10",
								'cols' =>"40",
							)
						);
						echo "<br>";echo $form->error($user,'address2');echo "</br>";
						
						echo $form->label($user,'email');
						echo "<br>";
						echo $form->textField($user,'email',array('size'=>40));
						echo $form->error($user,'email');echo "</br>";
						
						echo $form->label($user,'tel');
						echo "<br>";
						echo $form->textField($user,'tel',array('size'=>11));
						echo $form->error($user,'tel');echo "</br>";
						
						echo $form->label($user,'yahoo');
						echo "<br>";
						echo $form->textField($user,'yahoo',array('size'=>40));
						echo $form->error($user,'yahoo');echo "</br>";
						
						echo $form->label($user,'skype');
						echo "<br>";
						echo $form->textField($user,'skype',array('size'=>40));
						echo $form->error($user,'skype');echo "</br>";
						echo $form->errorSummary($user);
					?>						
					</div>
					<div class="stitched"></div>
				</div>
			</div>
			<div class="clear"></div>
			<div class="buttons">
				<div class="left">
					<?php
						echo Html::submitButton();
					?>
				</div>
			</div>
			<?php 
				$this->endWidget();
			?>
		</div>
	</div>
	<div class="clear"></div>
</div>