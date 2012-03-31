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
			alert(start+'|'+end);
			startDate = $.datepicker.formatDate('yy-mm-dd',start);
			startTime = add0(start.getHours()) + ":" +add0(start.getMinutes());
			endDate = $.datepicker.formatDate('yy-mm-dd',end);
			endTime = add0(end.getHours()) + ":" +add0(end.getMinutes());
			$("#start-date").text(startDate);$("#start-time").text(startTime);
			$("#end-date").text(endDate);$("#end-time").text(endTime);
			$("#modal").modal('show');
			calendar.fullCalendar('unselect');
		},
	});
});
</script>