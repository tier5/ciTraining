$(document).ready(function(){
    
   
	
	$('#clockbtn').click(function(){

		


		if($('#clockbtn').text()=="Clock In")
		{
			$('#clockbtn').text("Clock Out");
		}

		else
		{
			 $('#clockbtn').text("Clock In");
		}

	});

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

	$('#breakbtn').click(function(){
		//alert('hey');
		var opt = $('#opt').val();

		if (opt) 
		{
			
			//alert(opt1);

			if($('#breakbtn').text()=="break")
			{	
				$('#breakmsg').html('Enjoy Your Break come back soon!');
				$('#breakbtn').text("work");
				var opt1 = $('#opt').val();
				//var opt= $('#opt').val();
				//var opt= $('#opt1').val();
			}

			else
			{	
				
					$("#"+opt).prop('disabled', true);
			 		$('#breakbtn').text("break");
			 		$('#breakmsg').html('Hope You have enjoyed your break');
			 		
			 	
			 	
			}
		}
		else 
		{
			$('#breakmsg').html('Choose a break');
		}

	});

});