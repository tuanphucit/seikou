<?php 
	echo "<table>";
		echo "<thead>";
			echo "<tr>";
				echo "<th>Thứ tự</th>";
				echo "<th>Tên</th>";
				echo "<th>Thao tác</th>";
			echo "</tr>";
		echo "</thead>";
		$count = 0;
		foreach ($users as $user) {
			echo "<tr>";
				echo "<td>";echo ++$count;echo "</td>";
				echo "<td>";echo "$user->username";echo "</td>";
				echo "<td>";
					echo Html::link('Edit',$this->createUrl('/admin/user/edit',array('id'=>$user->id)));
					echo "  |  ";
					echo Html::link('Del',$this->createUrl('/admin/user/del',array('id'=>$user->id)),array('class'=>'del-button'));
				echo "</td>";
			echo "</tr>";
		}
		echo "<tfoot>";
			echo "<tr>";
				echo "<td>";
					echo Html::link("Tạo user mới",$this->createUrl('/admin/user/add'),array('class'=>'button'));
				echo "</td>";
			echo "</tr>";
		echo "</tfoot>";
	echo "</table>";
?>