 $(document).ready(function(){

 
 	$.getScript("http://localhost/ciproject/application/views/js/timerlib.js", function(){

   		$('#mybtn').click(function(){


   			//$("#divId").html("<div id="1">hello world</div>");

   			//div = $("<div>").html("Loading......");
   			var i=5;
   			var div;
   			var j=20;
   			while(i)
   			{
   				div="<div id='timediv"+i+"'></div>";
   				$("#divId").append(div);
          i--;
        }

   				$('#timediv'+1).timer({

                    duration: 10,

                    countdown: true,

                    callback: function() 
                    {
                    	
                    		//alert('time up');
                    		$('#timediv'+1).timer('remove');

                    		$('#timediv'+1).html('you are late');

                    	
                           

                    }
                    
                });	

   				

   				
			


        			/*$('#divId').timer({

                        duration: '5m30s',

                        countdown: true,

                        callback: function() 
                        {
                            alert('Time up!');
                        }
                    });*/

        });

	});

 });