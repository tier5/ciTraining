$(document).ready(function(){
	/*$('#pointbutton').click(function(){
	   $('#pointtblModal').modal('show');
	   $.post('Employee/pointalt' function(data){
        
      });

	});*/

var breakname;
var pointsdeducted;
  $('#pointbutton').click(function(){
  	var totaldiv="";
  $('#pointtblModal').modal('show');
  $.post('Employee/pointalt', function(data){

	  if ($.trim(data))
	  {
	  	$('#emplatetbl').show();
	  	var data1=data.split("?");


	    for(i=0;i<data1.length-1;i++)
	    {
	    	var data2=data1[i].split(",");

	    	switch (data2[2])
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
					case "Absent":
						breakname = "Absent";
						break;
					case "Early Clock Out":
						breakname = "Early Clock Out";
						break;
					default:
						breakname = "Default";
				}
				sec = data2[1];

				sec = sec%60;

				sec = properSec(sec);

				if(data2[1]<=60)
				{
					min = Math.floor(data2[1]/60);
				}
				else
				{
					min = Math.floor(data2[1]%3600);
				}

				min = properMin(min);

				min = properSec(min);

				hour = Math.floor(data2[1]/3600);

				latetime = hour+":"+min+":"+sec;

				pointsdeducted=deductPointBySec(data2[1]);
	    	//alert(data2[0]);
	    	totaldiv += "<tr><td>"+data2[0]+"</td><td>"+latetime+"</td><td>"+breakname+"</td><td>"+pointsdeducted+"</td></tr>";
	    	
	    	$('#nolaterecords').html('');

	    }
	    $('#pointtblMsg').html('');
	    $('#pointtblMsg').html(totaldiv);
	    /*var data2=data1.split(",");
         $('#pointtblMsg').html(data2);*/





	  }
	  else
	  {
	  	$('#emplatetbl').hide();
	  	$('#nolaterecords').html("Congrats!!!! You are on time every day.");
	  }

  });

	 $.post('Employee/pointaltdeleted', function(data){
var breakname1;
var pointsdeducted1;
var totaldiv1="";
var latetime1="";
	 	if ($.trim(data))
	  {
	  	$('#emplatetbldeleted').show();
	  	var data1=data.split("?");


	    for(i=0;i<data1.length-1;i++)
	    {
	    	var data2=data1[i].split(",");

	    	switch (data2[2])
				{
					case "fbreak": 
						breakname1 = "First Break";
						break;

					case "sbreak":
						breakname1 = "Lunch Break";
						break;

					case "lbreak":
						breakname1 = "Last Break";
						break;

					case "Clock In":
						breakname1 = "Clock In";
						break;
					case "Absent":
						breakname1 = "Absent";
						break;
					case "Early Clock Out":
						breakname1 = "Early Clock Out";
						break;
					default:
						breakname1 = "Default";
				}
				sec = data2[1];

				sec = sec%60;

				sec = properSec(sec);

				if(data2[1]<=60)
				{
					min = Math.floor(data2[1]/60);
				}
				else
				{
					min = Math.floor(data2[1]%3600);
				}

				min = properMin(min);

				min = properSec(min);

				hour = Math.floor(data2[1]/3600);

				latetime1 = hour+":"+min+":"+sec;

				pointsdeducted1=deductPointBySec(data2[1]);
	    	//alert(data2[0]);
	    	totaldiv1 += "<tr><td>"+data2[0]+"</td><td>"+latetime1+"</td><td>"+breakname1+"</td><td>"+pointsdeducted1+"</td></tr>";
	    	
	    	$('#nolaterecordsdeleted').html('');

	    }
	    $('#pointtblMsgdeleted').html('');
	    $('#pointtblMsgdeleted').html(totaldiv1);
	    /*var data2=data1.split(",");
         $('#pointtblMsg').html(data2);*/





	  }
	  else
	  {
	  	$('#emplatetbldeleted').hide();
	  	$('#nolaterecordsdeleted').html("No Points Adjustment From The Admin");
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

function deductPointBySec(time)
	{
		if(time<=7200)
		{
			return 250;
		}

		else if(time>=7201 && time<=14400)
		{
			return 500;
		}

		else
		{
			return 1000;
		}
	}

});