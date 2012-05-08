<script type="text/javascript">

function add0(x){
	if (x < 10)
		return '0' + x; 
	return x;
}

$(document).ready(function(){	
	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();
	$('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		selectable: true,
		selectHelper: true,
		editable: false,
		defaultView: 'agendaWeek',
		events:"<?php echo $this->createUrl('/order/getOrders')?>",
		select: function(start, end, allDay) {
			// reset order error
			$("#order-error").html("");
			$("#time-chooser").hide();
			
			// load text to order
			startDate = $.datepicker.formatDate('yy-mm-dd',start);
			startTime = add0(start.getHours()) + ":" +add0(start.getMinutes());
			endDate = $.datepicker.formatDate('yy-mm-dd',end);
			endTime = add0(end.getHours()) + ":" +add0(end.getMinutes());
			$("#start-date").text(startDate);$("#end-date").text(endDate);
			$("#OrderTimeForm_start_date").val(startDate);
			$("#OrderTimeForm_end_date").val(endDate);
			if (startTime == "00:00"){
				$("#date-chooser").show();
			}
			else {
				$("#start-time").text(startTime);
				$("#end-time").text(endTime);
				// load value to form
				$("#OrderTimeForm_start_hour").val(start.getHours());
				$("#OrderTimeForm_start_minute").val(start.getMinutes());
				$("#OrderTimeForm_end_hour").val(end.getHours());
				$("#OrderTimeForm_end_minute").val(end.getMinutes());
			}
			calc_total();
			$("#modal").modal('show');
			$('#calendar').fullCalendar('unselect');
		},
		monthNames:      <?php echo t("['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']",'calendar')?>,
		monthNamesShort: <?php echo t("['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']",'calendar')?>,
		dayNames:        <?php echo t("['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']",'calendar')?>,
		dayNamesShort :  <?php echo t("['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']",'calendar')?>,
		buttonText : {
		    prev:     '&nbsp;&#9668;&nbsp;',  // left triangle
		    next:     '&nbsp;&#9658;&nbsp;',  // right triangle
		    prevYear: '&nbsp;&lt;&lt;&nbsp;', // <<
		    nextYear: '&nbsp;&gt;&gt;&nbsp;', // >>
		    today:    '<?php echo t('today','calendar')?>',
		    month:    '<?php echo t('month','calendar')?>',
		    week:     '<?php echo t('week','calendar')?>',
		    day:      '<?php echo t('day','calendar')?>'
		},
	});

	$("#show-date-chooser").click(function(){
		$('#date-chooser').show();
		return false;
	});
	$("#show-time-chooser").click(function(){
		$('#time-chooser').show();
		return false;
	});
});
</script>