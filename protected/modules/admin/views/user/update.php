<?php 
	$form = $this->beginWidget('bootstrap.widgets.BootActiveForm',array(
		'id'=>'add-user-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array('validateOnSubmit'=>true,)
	));
	echo "<table>";	
		echo "<tr>";
			echo "<td>";
				echo $form->label($user,'id');
			echo "</td>";
			echo "<td>";
				echo $form->textField($user,'id',array('placeholder'=>'USXXX','disabled'=>true));
			echo "</td>";
			echo "<td>";
				echo $form->error($user,'id');
			echo "</td>";	
		echo "</tr>";
		
		echo "<tr>";
			echo "<td>";
				echo $form->label($user,'username');
			echo "</td>";
			echo "<td>";
				echo $form->textField($user,'username');
			echo "</td>";
			echo "<td>";
				echo $form->error($user,'username');
			echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
			echo "<td>";
				echo $form->label($user,'password');
			echo "</td>";
			echo "<td>";
				echo $form->passwordField($user,'password');
			echo "</td>";
			echo "<td>";
				echo $form->error($user,'password');
			echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
			echo "<td>";
				echo $form->label($user,'password_repeat');
			echo "</td>";
			echo "<td>";
				echo $form->passwordField($user,'password_repeat',array('value'=>$user->password));
			echo "</td>";
			echo "<td>";
				echo $form->error($user,'password_repeat');
			echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
			echo "<td>";
				echo $form->label($user,'role');
			echo "</td>";
			echo "<td>";
				echo $form->dropDownList($user,'role',array(
					Users::USER_USER  => t('user','model'),
					Users::USER_ADMIN => t('admin','model'),
				));
			echo "</td>";
			echo "<td>";
				echo $form->error($user,'role');
			echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
			echo "<td>";
				echo $form->label($user,'full_name');
			echo "</td>";
			echo "<td>";
				echo $form->textField($user,'full_name');
			echo "</td>";
			echo "<td>";
				echo $form->error($user,'full_name');
			echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
			echo "<td>";
				echo $form->label($user,'birthday');
			echo "</td>";
			echo "<td>";
				echo $form->textField($user,'birthday');
			echo "</td>";
			echo "<td>";
				echo $form->error($user,'birthday');
			echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
			echo "<td>";
				echo $form->label($user,'idcard');
			echo "</td>";
			echo "<td>";
				echo $form->textField($user,'idcard');
			echo "</td>";
			echo "<td>";
				echo $form->error($user,'idcard');
			echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
			echo "<td>";
				echo $form->label($user,'work');
			echo "</td>";
			echo "<td>";
				echo $form->textArea($user,'work');
			echo "</td>";
			echo "<td>";
				echo $form->error($user,'work');
			echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
			echo "<td>";
				echo $form->label($user,'address1');
			echo "</td>";
			echo "<td>";
				echo $form->textArea($user,'address1');
			echo "</td>";
			echo "<td>";
				echo $form->error($user,'address1');
			echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
			echo "<td>";
				echo $form->label($user,'address2');
			echo "</td>";
			echo "<td>";
				echo $form->textArea($user,'address2');
			echo "</td>";
			echo "<td>";
				echo $form->error($user,'address2');
			echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
			echo "<td>";
				echo $form->label($user,'email');
			echo "</td>";
			echo "<td>";
				echo $form->textField($user,'email');
			echo "</td>";
			echo "<td>";
				echo $form->error($user,'email');
			echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
			echo "<td>";
				echo $form->label($user,'tel');
			echo "</td>";
			echo "<td>";
				echo $form->textField($user,'tel');
			echo "</td>";
			echo "<td>";
				echo $form->error($user,'tel');
			echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
			echo "<td>";
				echo $form->label($user,'yahoo');
			echo "</td>";
			echo "<td>";
				echo $form->textField($user,'yahoo');
			echo "</td>";
			echo "<td>";
				echo $form->error($user,'yahoo');
			echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
			echo "<td>";
				echo $form->label($user,'skype');
			echo "</td>";
			echo "<td>";
				echo $form->textField($user,'skype');
			echo "</td>";
			echo "<td>";
				echo $form->error($user,'skype');
			echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
			echo "<td>";
				echo $form->label($user,'last_login');
			echo "</td>";
			echo "<td>";
				echo $form->textField($user,'last_login',array('disabled'=>true));
			echo "</td>";
			echo "<td>";
				echo $form->error($user,'last_login');
			echo "</td>";
		echo "</tr>";
	echo "</table>";
	echo $form->errorSummary($user);
	echo "<br>";
	echo Html::submitButton(t("Save",'admin'),array('class'=>'button'));
	$this->endWidget();
?>