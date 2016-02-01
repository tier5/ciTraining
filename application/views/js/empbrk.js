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
	//$('#clockoutdiv').html('Please clockin');

	$.post('Employee/clockindata',function(data)
		{
			if (data) 
			{
				$('#clockoutdiv').html('');
				$('#clockindiv').html('<br>Already Clocked In @'+data);
			}
			else
			{
				$('#clockindiv').html('');	
				$('#clockoutdiv').html('Please clock in');
			}

			/*$('#clockbtn').click(function(){

				//alert(data);
				if (data) 
					{
						$('#clockoutdiv').html('Please clockin');
					}
					else
					{
						//alert('clock in fast');
						
						$('#clockoutdiv').html('');
						$('#clockindiv').html('<br>Sucessfully clocked in');	
					}
			});*/

		
		});

	});


//================

			/*if (!data) 
			{
			$('#clockoutdiv').html('Please clockin');
			$('#clockindiv').html('');
			//exit(0);
			}
			else
			{	
				$('#clockoutdiv').html('');
				$('#clockindiv').html('<br>Already Clocked In @'+data);
			}*/