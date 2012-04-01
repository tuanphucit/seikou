
<?php 
	// Add highcharts library
	$cs = Yii::app()->clientScript;
	$cs->registerScriptFile(Html::jsUrl('highcharts.js'));
	$cs->registerScriptFile(Html::jsUrl('themesforchart/gray.js'));
?>
<script>
var chart1; // globally available
$(document).ready(function() {
      chart = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'bar'
         },
         title: {
            text: 'Fruit Consumption'
         },
         xAxis: {
            categories: ['Apples', 'Bananas', 'Oranges']
         },
         yAxis: {
            title: {
               text: 'Fruit eaten'
            }
         },
      });
	$.ajax({
		url: '<?php echo $this->createUrl('/admin/report/productMonth/');?>',
		success: function(data) {
			data = $.parseJSON(data);
			chart.options.series = data;
			chart = new Highcharts.Chart(chart.options);
    	}
    });
   });
</script>
<div id="container" style="width: 100%; height: 400px"></div>