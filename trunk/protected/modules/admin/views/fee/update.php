<?php 
	echo "<h2>".t('Update Fee','admin')." (VND)</h2>";
	$form = $this->beginWidget('bootstrap.widgets.BootActiveForm',array(
		'id'=>'edit-fee-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array('validateOnSubmit'=>true,)
	));
	echo "<table>";	
		echo "<tr>";
			echo "<td>";
				echo $form->label($fee,'register');
			echo "</td>";
			echo "<td>";
				echo $form->textField($fee,'register');
				echo "<br>";
				echo $form->error($fee,'register');
			echo "</td>";	
		echo "</tr>";
		echo "<tr>";
			echo "<td>";
				echo $form->label($fee,'penalty');
			echo "</td>";
			echo "<td>";
				echo $form->textField($fee,'penalty');
				echo "<br>";
				echo $form->error($fee,'penalty');
			echo "</td>";	
		echo "</tr>";
		echo "<tr>";
			echo "<td>";
				echo $form->label($fee,'cancel');
			echo "</td>";
			echo "<td>";
				echo $form->textField($fee,'cancel');
				echo "<br>";
				echo $form->error($fee,'cancel');
			echo "</td>";	
		echo "</tr>";
	echo "</table>";
	echo $form->errorSummary($fee);
	echo "<br>";
	echo Html::submitButton(t("Save",'admin'),array('class'=>'button'));
	$this->endWidget();
?>