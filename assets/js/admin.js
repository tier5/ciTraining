$(document).ready(function(){


	

	$.post('Admin/empClockIn', function(data){

		//console.log(data);

		//var a = JSON.parse(data);
		//for (var i = 0; i < a.length; i++){

			//$('#tablediv').html(a[i].Aid);	
		//}
		if(data)
		{
			$('#tablediv').html(data);
		}
			
		

	});

	$.post('Admin/empFbreak', function(data){


		console.log(data);

		data = data.split(".");

		//alert(data.length-1);

		for(i=0;i<data.length-1;i++)
		{
			var value = data[i].split(",");

			//alert(value[1]);
			var colorclass;

			var countdownval;
			if(value[1]<0)
			{
				colorclass = "class = 'danger'";

				value[1] = Math.abs(value[1]);

				countdownval = false;

			}
			else
			{
				colorclass = "class = 'info'";

				countdownval = true;
			}

			value[0]=$.trim(value[0]);

			var totaldiv = "<tr "+colorclass+"><td >"+value[0]+"</td><td id='"+value[0]+"'></td></tr>";

			$("#fbreaktable").append(totaldiv);
			
			$('#'+value[0]).timer({//timer starts
            				
            	duration: value[1],//time value from the php page

                countdown: countdownval,
            				
            	callback: function() {
                				
                	$('#'+value[0]).timer('remove');
                	$('#'+value[0]).html('LATE');

            	},

            	repeat: false
        	});


			//$('#'+value[0]).html('hh');
				
		}

		
		
		
		
	});



});