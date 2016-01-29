//1.========================//show clock in employees function
$(document).ready(function(){
	$.post('Admin/clockInEmp',function(data){
		if ($.trim(data)) 
		{
			$('#clockin').html(data);
		}
		else
		{
			$('#clockin').html('No employees clocked in till now');
		}
	});
});
