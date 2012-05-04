<li>
	<?php 
		if ($data->option < 10)
			$seat = "<span class='red'>$data->option seats</span>";
		else
			$seat = "<span>$data->option seats</span>";
		echo Html::link(
			"<b>{$data->name}$seat</b>",
			$this->createUrl('/room/view',array('pid'=>$data->id))
		);
	?>
</li>