<?php 
	$form = $this->beginWidget('bootstrap.widgets.BootActiveForm',array(
		'id'=>'profile-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array('validateOnSubmit'=>true,)
	));
	
	echo "<div class='oneFourth'>";
		echo $form->textFieldRow($user,'full_name',array('disabled'=>true));
	echo "</div>";
	
	echo "<div class='oneFourth'>";
		echo $form->textFieldRow($user,'username',array('disabled'=>true));
	echo "</div>";
	
	echo "<div class='oneFourth'>";
		echo $form->passwordFieldRow($user,'password');
	echo "</div>";
	
	echo "<div class='oneFourth lastColumn'>";
		echo $form->passwordFieldRow($user,'password_repeat',array(
			'value'=>$user->password,
		));
	echo "</div>";
	
	echo '<div class="clear"></div>';
	
	echo "<div class='oneFourth'>";
		echo $form->textFieldRow($user,'birthday',array('disabled'=>true));
	echo "</div>";
	
	echo "<div class='oneFourth'>";
		echo $form->textFieldRow($user,'idcard',array('disabled'=>true));
	echo "</div>";
	
	echo "<div class='oneFourth'>";
		echo $form->textFieldRow($user,'tel');
	echo "</div>";
	
	echo "<div class='oneFourth lastColumn'>";
		echo $form->textFieldRow($user,'email');
	echo "</div>";
	
	echo '<div class="clear"></div>';
	
	echo "<div class='oneHalf'>";
		echo $form->textAreaRow($user,'work');
	echo "</div>";
	
	echo "<div class='oneFourth'>";
		echo $form->textFieldRow($user,'skype');
	echo "</div>";
	
	echo "<div class='oneFourth lastColumn'>";
		echo $form->textFieldRow($user,'yahoo');
	echo "</div>";
	
	echo '<div class="clear"></div>';
	
	echo "<div class='oneHalf'>";
		echo $form->textAreaRow($user,'address2');
	echo "</div>";
	
	echo "<div class='oneHalf lastColumn'>";
		echo $form->textAreaRow($user,'address1');
	echo "</div>";
	
	echo '<div class="clear"></div>';
	echo $form->errorSummary($user);
    echo CHtml::htmlButton('<i class="icon-ok icon-white"></i> '.t('Submit'), array('class'=>'btn btn-primary', 'type'=>'submit'));
    echo CHtml::htmlButton('<i class="icon-ban-circle"></i> '.t('Reset'), array('class'=>'btn', 'type'=>'reset'));
	$this->endWidget();
?>