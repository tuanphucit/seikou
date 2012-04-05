
<?php 
	// Add highcharts library
	$cs = Yii::app()->clientScript;
	$cs->registerScriptFile(Html::jsUrl('highcharts/highcharts.js'));
	$cs->registerScriptFile(Html::jsUrl('highcharts/themes/gray.js'));
?>
<script>
var chart1; // globally available
$(document).ready(function() {
      chart = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },
         title: {
            text: 'Monthly Room Sales'
         },
         xAxis: {
        	 categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
      					'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
         },
         yAxis: {
            title: {
               text: 'Number of orders'
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