$(document).ready(function(){
    
   	$.post('Employee/showUserName', function(data){

   		$('#username').html(data);

	});
	/*
	$('#clockbtn').click(function(){

		


		if($('#clockbtn').text()=="Clock In")
		{
			$('#clockbtn').text("Clock Out");
		}

		else
		{
			 $('#clockbtn').text("Clock In");
		}

	});*/

//====================================================

	/*$('#breakbtn').click(function(){

		var opt = $('#opt').val();

		if(opt)
		{
			if($('#clockbtn').text()=="Clock In")
			{
				$('#clockbtn').text("Clock Out");
			}

			else
			{
				 $('#clockbtn').text("Clock In");
			}
			$("#"+opt).prop('disabled', true);
		}

		else
		{
			alert("enter a valid choice");
		}

	});*/
//================================================================

	

});