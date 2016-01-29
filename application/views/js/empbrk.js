//1.========================//show clock in employees function
$(document).ready(function(){
	$.post('Admin/clockInEmp',function(data){
		if ($.trim(data)) 
		{
			$('#clockin').html(data);

		}
		else
		{
			//$('#clockin1').html('No employees Has clocked in till now');
			//$("#foo").append(<div>No employees Has clocked in till now</div>);
			$('#clockin').append('<div id="someid" class="alert alert-danger">No employees Has clocked in till now</div>');
			//$('#someid').html('');
		}
	});
});
//============================================================
