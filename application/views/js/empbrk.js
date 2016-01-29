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
//=================always show clocked in=even after logout==========================================
$(document).ready(function(){
	//alert('test');
	$.post('Employee/btnv',function(data)
	{
		//alert(data);
		if (data) 
		{
			//alert(data);
			$('#clockbtn').text("Clock Out");
		}
		else
		{
			
			$('#clockbtn').text("Clock In");

		}

	});
});
//=======================always show clockin time===========================
$(document).ready(function(){
	$.post('Employee/showclockin',function(data)
	{
		if (data) 
		{
			
			$('#someid1').html('');
			$('#run').append('<div id="someid1" class="confirm">Clocked In @'+data+'</div>');

		}
		else
		{
			//alert('no data');
			$('#run').append('<div id="someid1" class="error">Please clock in</div>');
		}
	//$('#run').append('<div id="someid1"><strong>Already Clocked In @'+data+'</strong></div>');
	});
//});
});