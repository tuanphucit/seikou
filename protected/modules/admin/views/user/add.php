<?php 
	$form = $this->beginWidget('CActiveForm',array(
		'id'=>'add-user-form',
	));
	echo "<table>";
		echo "<tr>";
			echo "<td>";
				echo $form->label($user,'username');
			echo "</td>";
			echo "<td>";
				echo $form->textField($user,'username',array('class'=>'text-input',"size"=>25));
			echo "</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td>";
				echo $form->label($user,'password');
			echo "</td>";
			echo "<td>";
				echo $form->passwordField($user,'password',array('class'=>'text-input',"size"=>25));
			echo "</td>";
		echo "<tfoot>";
			echo "<tr>";
				echo "<td>";
					echo Html::submitButton("Lưu",array('class'=>'button'));
				echo "</td>";
			echo "</tr>";
		echo "</tfoot>";
	echo "</table>";
	$this->endWidget();
?>