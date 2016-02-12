$(document).ready(function(){
    

		//calling the timer javascript library and it is available all over the script body
		//the path needed to be specified manually as it was not taking, so it needs to be 
		//changed if the folder name is changed

		showTimeOnLoad();

		showPointsOnLoad();

    setInterval(function(){

    	showTimeOnLoad();

    }, 1000);


//==============================================================
function showPointsOnLoad()
{
	$.post('Employee/showPointsOnLoad', function(data){


		$('#pointbutton').text(data);

	});
}


//==============================================================



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
    

//===============================================================
	


	function showTimeOnLoad()
	{
		$.post('Employee/showTimerOnLoad', function(data){
			var totaltime;
			var colorclass;
			var timerinfo = "";

			if(data)
			{
				if(data<0)
				{
					colorclass = "class='text-danger'";
					data = Math.abs(data);

					timerinfo = "YOU ARE LATE";
				}

				else
				{
					colorclass = "class='text-primary'";
				}
				sec = data;

				sec = sec%60;

				sec = properSec(sec);

				min = Math.floor(data/60);

				totaltime = min+":"+sec+"min";
				 
					$('#timeinfo').html(timerinfo);
					$('#timer').html("<div "+colorclass+">"+totaltime+"</div>");
			//alert('hello');

				

				

				/*$('#timer').timer({//timer starts
            				
            				duration: 10,//time value returned from php file

                            countdown: true,
            				
            				callback: function() {
                				
                				$("#timeinfo").html("YOU ARE LATE");

                                //$('#timer').timer('remove');

            				}
        				});*/
			}

	
				
		});
	}
		
	

	
//================================================================
	var opt;
	var properbreakname;
	$('#breakbtn').click(function(){
		//alert('hey');

			$.post('Employee/selectBreakname', function(data){

				if($.trim(data))
				{
					opt = data;
					
				}
				else
				{
					opt = $('#opt').val();
				}
				

			


		if($('#clockbtn').text()=="Clock Out")//checking if he clocked in today or not
		{
			//opt = $('#opt').val();

			if (opt)//while taking break any proper option is selected or not 
			{
				
				//alert(opt1);

				if($('#breakbtn').text()=="break")//if the button is break
				{	
					
					$.post('Employee/inBreak',{opt: opt}, function(data){//inserting 1 in breakstatus and opt value in breakname
					

						
						
						$('#breakbtn').text("work");//changing the button value to work
						
						
					});

					//time operation starts from here
					var totaltime;
					if(opt== 'fbreak')//setting the time according to the breakname
					{
						totaltime = '20:00min';
					}
					
					if(opt=='sbreak')
					{
						totaltime = '60:00min';
					}

					if(opt== 'lbreak')
					{
						totaltime = '20:00min';
					}

					$('#timer').html("<div class='text-primary'>"+totaltime+"</div>");

					/*$('#timer').timer({//timer starts
            				
            				duration: totaltime,//time value

                            countdown: true,
            				
            				callback: function() {
                				
                				$("#timeinfo").html("YOU ARE LATE");

                                $('#timer').timer('remove');

            				}
        				});*/


					
					
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
						 		//$('#breakmsg').html('Hope You have enjoyed your break');
						 		$("#"+opt).prop('disabled', true);
						 		$('#timer').timer('remove');
						 		
					 		});

					 		$.post('Employee/storeReturnTime',{opt: opt}, function(data){//inserting 0 in breakstatus column in attendence table

						 		//alert(data);
						 		/*if(opt=="fbreak")
						 		{
						 			properbreakname="First Break";
						 		}
						 		else if(opt="lbreak")
						 		{
						 			properbreakname="Last Break";
						 		}
						 		else
						 		{
						 			properbreakname="Last Break";
						 		}*/

						 		switch(opt)
						 		{
						 			case "fbreak":
						 				properbreakname="First Break";
						 				break;
						 			case "sbreak":
						 				properbreakname="Lunch Break";
						 				break;
						 			case "lbreak":
						 				properbreakname="Last Break";
						 				break;
						 			default:
						 				properbreakname="default";
						 		}

						 		//alert('you have successfully return from '+properbreakname);
						 		$('#returnbreakMsg').html('you have successfully return from '+properbreakname);
						 		$('#returnbreakModal').modal('show');
					 		});

						 	$.post('Employee/lateInBreak',{opt: opt}, function(data){//inserting 0 in breakstatus column in attendence table

						 		if($.trim(data))
						 		{
						 			$('body').html(data);
						 			//alert(data);

						 		}
						 		
					 		});

					 		$.post('Employee/breakLatePoints',{opt: opt},function(data){

					 			if($.trim(data))
					 			{
					 				//alert(data);



					 				$("#latePoint").modal("show");
					 				$("#pointMsg").html(data);
					 				showPointsOnLoad();

					 			}

					 		});

					 		$.post('Employee/markPreviousBreak',{opt: opt},function(data){

					 			//alert(data);

							});					 		
                                $('#msgbreak').html('');


					 		
						}
				 	
				 		else
				 		{

						 	$('#msgbreak').html('You have not taken that break Choose Properly');
				 		}
					 	
				 		
				 	});
				 	
				}
			}
			else 
			{
				$('#msgbreak').html('Choose a break');
			}
		}
		else
		{
			$('#breakmsg').html('clockin first');
		}

	});
});

  function properSec(val)
	{
		if(val<10)
		{
			val = "0"+val;

			return val;
		}

		else
		{
			return val;
		}
	}

});