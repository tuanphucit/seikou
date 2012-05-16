
<?php 
	$form = $this->beginWidget('bootstrap.widgets.BootActiveForm',array(
		'id'=>'add-user-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array('validateOnSubmit'=>true,)
	));
	echo "<table>";	
		
		echo "<tr>";
			echo "<td>";
				echo $form->label($money,'user_id');
			echo "</td>";
			echo "<td>";
				echo $money->user->full_name;
			echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
			echo "<td>";
				echo $form->label($money,'year');
			echo "</td>";
			echo "<td>";
				echo $money->year;
			echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
			echo "<td>";
				echo $form->label($money,'month');
			echo "</td>";
			echo "<td>";
				echo $money->month;
			echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
			echo "<td>";
				echo $form->label($money,'real');
			echo "</td>";
			echo "<td>";
				echo $form->textField($money,'real');
				echo "<br>";
				echo $form->error($money,'real');
			echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
			echo "<td>";
				echo $form->label($money,'penalty');
			echo "</td>";
			echo "<td>";
				echo $form->textField($money,'penalty');
				echo "<br>";
				echo $form->error($money,'penalty');
			echo "</td>";
		echo "</tr>";
		
		
	echo "</table>";
	echo $form->errorSummary($money);
	echo "<br>";
	echo Html::submitButton(t("Save",'admin'),array('class'=>'button'));
	$this->endWidget();
?>