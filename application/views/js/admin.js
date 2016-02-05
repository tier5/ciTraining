$(document).ready(function(){



setInterval(function(){
    clockin();
    fbreak();
    sbreak();
    lbreak();
    
}, 1000);

	employeeLate();

setInterval(function(){

	employeeLate();

	}, 1000);

window.deleteLateRow = function(id)
{
	$.post('Admin/deleteEmpLate', {tbl_id: id}, function(data){

		//alert(data);
		employeeLate();

	});
}
//=====================================================

	$('#delAllLateTbl').click(function(){

		$.post('Admin/lateTblTruncate', function(data){

			
		});

	});

//======================================================
function employeeLate()
{
	$.post('Admin/employeeLate', function(data){

		var totaldiv="";
		var breakname="";
		var latetime="";

		if($.trim(data))
		{
			//alert(data);
			data = data.split(".");

			for(i=0;i<data.length-1;i++)
			{
				value = data[i].split(',');

				/*if(value[3]=="fbreak")
				{
					breakname = "First Break";
				}
				else if(value[3]=="sbreak")
				{
					breakname = "Lunch Break";
				}
				else
				{
					breakname = "Last Break";
				}*/

				switch (value[3])
				{
					case "fbreak": 
						breakname = "First Break";
						break;

					case "sbreak":
						breakname = "Lunch Break";
						break;

					case "lbreak":
						breakname = "Last Break";
						break;

					case "Clock In":
						breakname = "Clock In";
						break;

					default:
						breakname = "Default";
				}
				//alert(value[4]);

				sec = value[4];

				sec = sec%60;

				sec = properSec(sec);

				min = Math.floor(value[4]/60);

				min = properMin(min);

				min = properSec(min);

				hour = Math.floor(value[4]/3600);

				latetime = hour+":"+min+":"+sec;

				totaldiv += "<tr><td>"+value[0]+"</td><td>"+value[1]+"</td><td>"+value[2]+"</td><td>"+breakname+"</td><td>"+latetime+"</td><td><button class='btn btn-danger glyphicon glyphicon-trash' onclick='deleteLateRow("+$.trim(value[5])+")'></button></td></tr>";

				$('#latetable').html(totaldiv);
			}
			//$('#latetable').html(data);
		}
		

	});
}
	
	


//======================================================
function clockin(){	

	$.post('Admin/empClockIn', function(data){

		//console.log(data);

		//var a = JSON.parse(data);
		//for (var i = 0; i < a.length; i++){

			//$('#tablediv').html(a[i].Aid);	
		//}
		if($.trim(data))
		{
			$('#tablediv').html(data);
		}
			
		

	});
}



//==========================================================

function fbreak(){

	$.post('Admin/empFbreak', function(data){
		
		if($.trim(data))
		{

		var totaldiv = "";
		
		var sec;

		var min;

		var timeshow;

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

			sec = value[1];

			sec = sec%60;

			sec = properSec(sec);

			min = Math.floor(value[1]/60);

			timeshow=min+':'+sec+'m';



			totaldiv += "<tr "+colorclass+"><td >"+value[0]+"</td><td id='"+value[0]+"'>"+timeshow+"</td></tr>";

			$("#fbreaktable").html(totaldiv);
			
			/*$('#'+value[0]).timer({//timer starts
            				
            	duration: value[1],//time value from the php page

                countdown: true,
            				
            	callback: function() {
                				
                	$('#'+value[0]).timer('remove');
                	$('#'+value[0]).html('LATE');

            	},

            	repeat: false
        	});*/


			//$('#'+value[0]).html('hh');
				
		}

		
		
		}

		else
		{
			$("#fbreaktable").html('');
		}
		
	});


}
//================================================================

function sbreak(){

		$.post('Admin/empSbreak', function(data){

			
		if($.trim(data))
		{

		var totaldiv = "";
		

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
			
			sec = value[1];

			sec = sec%60;

			sec = properSec(sec);

			min = Math.floor(value[1]/60);

			timeshow=min+':'+sec+'m';



			totaldiv += "<tr "+colorclass+"><td >"+value[0]+"</td><td id='"+value[0]+"'>"+timeshow+"</td></tr>";
			
			$("#sbreaktable").html(totaldiv);
			
			/*$('#'+value[0]).timer({//timer starts
            				
            	duration: value[1],//time value from the php page

                countdown: true,
            				
            	callback: function() {
                				
                	$('#'+value[0]).timer('remove');
                	$('#'+value[0]).html('LATE');

            	},

            	repeat: false
        	});*/


			//$('#'+value[0]).html('hh');
				
		}

		
		
		}

		else
		{
			$("#sbreaktable").html('');
		}
				
			});
}

//=============================================================
function lbreak()
{
	$.post('Admin/empLbreak', function(data){

			if($.trim(data))
		{

		var totaldiv = "";
		

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

			sec = value[1];

			sec = sec%60;

			min = Math.floor(value[1]/60);

			timeshow=min+':'+sec+'m';



			totaldiv += "<tr "+colorclass+"><td >"+value[0]+"</td><td id='"+value[0]+"'>"+timeshow+"</td></tr>";
			
			$("#lbreaktable").html(totaldiv);
			
			/*$('#'+value[0]).timer({//timer starts
            				
            	duration: value[1],//time value from the php page

                countdown: true,
            				
            	callback: function() {
                				
                	$('#'+value[0]).timer('remove');
                	$('#'+value[0]).html('LATE');

            	},

            	repeat: false
        	});*/


			//$('#'+value[0]).html('hh');
				
		}

		
		
		}

		else
		{
			$("#lbreaktable").html('');
		}
	});
}

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

function properMin(val)
{
	if(val>60)
	{
		val=Math.floor(val/60);
		return val;
	}

	else
	{
		return val;
	}
}




});