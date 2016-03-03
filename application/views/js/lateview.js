$(document).ready(function(){

	allLateRecords();

function allLateRecords()
{
	$.post(BASE_URL+'Admin/allLateRecord',function(data){

    var latetablediv="";
    var breakname="";
    var latetime="";
    if($.trim(data))
    {
    	data = data.split('?');

    	for(i=0;i<data.length-1;i++)
    	{
    		value = data[i].split(',');
    		
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
					case "Absent":
						breakname = "Absent";
						break;
<<<<<<< HEAD
					case "Early Clock Out":
						breakname = "Early Clock Out";
						break;
=======
>>>>>>> dbb86bf90c4ec609038235eb55762e3f34ef5edb

					default:
						breakname = "Default";
				}

				sec = value[4];

				sec = sec%60;

				sec = properSec(sec);

<<<<<<< HEAD
				if(value[4]<=60)
				{
					min = Math.floor(value[4]/60);
				}
				else
				{
					min = Math.floor(value[4]%3600);
				}

=======
				min = Math.floor(value[4]%3600);
>>>>>>> dbb86bf90c4ec609038235eb55762e3f34ef5edb

				min = properMin(min);

				min = properSec(min);

				hour = Math.floor(value[4]/3600);

				latetime = hour+":"+min+":"+sec;

    		latetablediv += "<tr><td>"+value[0]+"</td><td>"+value[1]+"</td><td>"+value[2]+"</td><td>"+breakname+"</td><td>"+latetime+"</td><td><button class='btn btn-danger glyphicon glyphicon-trash' onclick='deleteLateRow("+$.trim(value[5])+")'></button></td></tr>";
			//latetablediv += "<tr><td>"+value[0]+"</td><td>"+value[1]+"</td><td>"+value[2]+"</td><td>"+breakname+"</td><td>"+latetime+"</td><td><button class='btn btn-danger glyphicon glyphicon-trash' onclick='deleteLateRow("+$.trim(value[5])+")'></button></td></tr>";



    	}
    	$('#showAllLateInfo').html(latetablediv);
    }
		
	$('#showAllLateInfo').html(latetablediv);
		

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

window.deleteLateRow = function(id)
{

	var emp_id=id;
	$.post(BASE_URL+'Admin/deleteEmpLate', {tbl_id: emp_id}, function(data){

		//alert(data);
		allLateRecords();

	});
}

$('#delAllLateTbl').click(function(){

		$.post(BASE_URL+'Admin/lateTblTruncate', function(data){

			allLateRecords();
		});

	});



 });