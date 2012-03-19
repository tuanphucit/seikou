
	<div class="grid_16">
		<div class="ribbonbig">
			<div class="lijevo">
			<div class="bread">
				<?php 
					echo Html::link(
						Yii::t('user','Home'),
						$this->createUrl('home/index')
					);
					echo " » ";
					echo Yii::t('user','My Profile')
				?>
			</div>
			<div class="bigtitle"><?php echo Yii::t('user','My Profile')?></div>
			</div>
		</div>
	</div>
		
	<div class="grid_8">
		<div class="padding25">
			<div class="billing">
				<div class="shiztitle">
					<h2 class="title h2bg">Personal Details</h2>
				</div>
				<?php 
					$form = $this->beginWidget('bootstrap.widgets.BootActiveForm',array(
						'id'=>'profile-form',
						'enableClientValidation'=>true,
						'clientOptions'=>array('validateOnSubmit'=>true,)
					));
					
					echo $form->textField(
						$user,
						'first_name',
						array(
							'class'=>"half req",
							'disabled'=>'true',
						)
					);
					
					echo $form->textField(
						$user,
						'last_name',
						array(
							'class'=>"half",
							'disabled'=>'true',
						)
					);
					
					echo $form->textField(
						$user,
						'address1',
						array(
							'class'=>"full",
							'disabled'=>'true',
						)
					);
					
					echo $form->textField(
						$user,
						'idcard',
						array(
							'class'=>"half req",
							'disabled'=>'true',
						)
					);
					
					echo $form->textField(
						$user,
						'birthday',
						array(
							'class'=>"half",
							'disabled'=>'true',
						)
					);
				
				?>
				<div class="shiztitle">
				<h2 class="title h2bg">Account Details</h2>
				</div>
				<?php 
					echo $form->passwordField(
						$user,
						'password',
						array(
							'class'=>"half req"
						)
					);
					
					echo $form->passwordField(
						$user,
						'password_repeat',
						array(
							'class'=>"half",
							'value'=>$user->password,
						)
					);
					echo $form->textField(
						$user,
						'tel',
						array(
							'class'=>"half req"
						)
					);
					
					echo $form->textField(
						$user,
						'email',
						array(
							'class'=>"half"
						)
					);
					echo $form->textField(
						$user,
						'skype',
						array(
							'class'=>"half req"
						)
					);
					
					echo $form->textField(
						$user,
						'yahoo',
						array(
							'class'=>"half"
						)
					);
					?>
					<fieldset>
						<?php echo $form->errorSummary($user);?>
						<?php Yii::log($form->errorSummary($user));?>
					</fieldset>
					<div class="clear"></div>
				    <?php echo CHtml::htmlButton('<i class="icon-ok icon-white"></i> Submit', array('class'=>'btn btn-primary', 'type'=>'submit')); ?>
				    <?php echo CHtml::htmlButton('<i class="icon-ban-circle"></i> Reset', array('class'=>'btn', 'type'=>'reset')); ?>
			</div>
		
		</div>
	</div>
	<div class="grid_8">
	<div class="padding25">
	
	<div class="billing">
	<div class="shiztitle">
	<h2 class="title h2bg">Your address</h2>
	</div>
	<?php 
		echo $form->textField(
			$user,
			'work',
			array(
				'class'=>"full"
			)
		);
		
		echo $form->textField(
			$user,
			'address2',
			array(
				'class'=>"full"
			)
		);
		$this->endWidget();
	?>
	</div>
	</div>
</div>
