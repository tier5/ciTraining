$(document).ready(function(){
    
   
	
	
//================================================================

	$('#breakbtn').click(function(){
		//alert('hey');
		if($('#clockbtn').text()=="Clock Out")
		{
			var opt = $('#opt').val();

			if (opt) 
			{
				
				//alert(opt1);

				if($('#breakbtn').text()=="break")
				{	
					
					$.post('Employee/inBreak',{opt: opt}, function(data){
					

						$('#breakmsg').html(data);
						
						$('#breakbtn').text("work");
						
						
					});
					
					//var opt= $('#opt').val();
					//var opt= $('#opt1').val();
				}

				else
				{	
					
					
				 	
				 	
				 	$.post('Employee/endBreak', function(data){

				 		$('#breakbtn').text("break");
				 		$('#breakmsg').html('Hope You have enjoyed your break');
				 		$("#"+opt).prop('disabled', true);

				 	});
				 		
				 	
				 	
				}
			}
			else 
			{
				$('#breakmsg').html('Choose a break');
			}
		}
		else
		{
			$('#breakmsg').html('clockin first');
		}
	});

});