<?php 
	$yearList = array();
	for ($i=2012; $i > 2002; $i--)
		$yearList[$i] = $i;
	$monthList = array();
	for ($i=1; $i < 13; $i++)
		$monthList[$i] = $i;
	echo Html::form();
		echo Html::dropDownList("year", NULL, $yearList);
		echo Html::dropDownList("month", NULL, $monthList);
		echo Html::submitButton(t('Submit','admin'));
	echo Html::endForm();
?>