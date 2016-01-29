$(document).ready(function(){
    
   

    	$.post('Employee/autoChangeButton', function(data){

    		$('#clockbtn').text(data);
    	});
//================================================================

		$.post('Employee/autoChangeBreakButton', function(data){

    		$('#breakbtn').text(data);
    		//alert(data);
    	});


//================================================================

		$.post('Employee/autoDisableOption', function(data){

			

    		data = data.split(",");

    		$(data[0]).prop('disabled', true);
            $(data[1]).prop('disabled', true);
            $(data[2]).prop('disabled', true);
    		

    	});
    

	
	
//================================================================

	$('#breakbtn').click(function(){
		//alert('hey');
		if($('#clockbtn').text()=="Clock Out")//checking if he clocked in today or not
		{
			var opt = $('#opt').val();

			if (opt)//while taking break any proper option is selected or not 
			{
				
				//alert(opt1);

				if($('#breakbtn').text()=="break")//if the button is break
				{	
					
					$.post('Employee/inBreak',{opt: opt}, function(data){//inserting 1 in breakstatus and opt value in breakname
					

						$('#breakmsg').html(data);
						
						$('#breakbtn').text("work");//changing the button value to work
						
						
					});
					
					//var opt= $('#opt').val();
					//var opt= $('#opt1').val();
				}

				else//if the button is work
				{	
					
					$.post('Employee/showBreakName', function(data){//fetching the breakname from database

						if(opt==data)//checking if the breakname and selected option is same
						{
							$.post('Employee/endBreak', function(data){//inserting 0 in breakstatus column in attendence table

						 		$('#breakbtn').text("break");//changing the button value to break
						 		$('#breakmsg').html('Hope You have enjoyed your break');
						 		$("#"+opt).prop('disabled', true);
						 		
					 		});

					 		$.post('Employee/storeReturnTime',{opt: opt}, function(data){//inserting 0 in breakstatus column in attendence table

						 		
						 		//alert(data);
					 		});

					 		
						}
				 	
				 		else
				 		{

						 	$('#breakmsg').html('You have not taken that break Choose Properly');
				 		}
					 	
				 		
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