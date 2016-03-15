$(document).ready(function(){



$( "#change_month_pro" ).change(function() {
	//alert($(this).val());
	var date=$(this).val();

	$.post('FnfetchProductivityMonth',{optdate: date}, function(data){

			  $('#new_tbl').html(data);
		      });
})

	$('.productivity_cal').datepicker({

altField: "#dateHidden",
    // The format you want
    altFormat: "yy-mm-dd",
    // The format the user actually sees
    dateFormat: "dd/mm/yy",
    onSelect: function (date) {
    	
    	var fullDate = new Date()
		/*console.log(fullDate);*/
		//Thu May 19 2011 17:25:38 GMT+1000 {}
		 
		//convert month to 2 digits
		var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : '0' + (fullDate.getMonth()+1);
		 
		if(fullDate.getDate()<10)
		{
			var day='0'+fullDate.getDate();
		} 
		else
		{
			var day=fullDate.getDate();
		}
		var currentDate = day + "/" + twoDigitMonth + "/" + fullDate.getFullYear();
		/*console.log(currentDate);
		console.log(date);*/

		if(currentDate==date)
		{
			location.reload();
		}
		else
		{
			 $.post('FnfetchProductivity',{optdate: date}, function(data){

			  $('#change_result').html(data);
		      });

		}
    }

	});

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
					case "Early Clock Out":
						breakname = "Early Clock Out";
						break;

					default:
						breakname = value[3];
				}

				sec = value[4];

				sec = sec%60;

				sec = properSec(sec);

				if(value[4]<=60)
				{
					min = Math.floor(value[4]/60);
				}
				else
				{
					min = Math.floor(value[4]%3600);
				}


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

function fetch_time()
{
 var text_val=$('#eid').val();
 var split_arr=text_val.split(",");
 //alert(split_arr);
 for(var i=0;i<split_arr.length;i++)
 {
    var split_Narr=split_arr[i].split("-");
    //alert(split_Narr);
   
	

	call_time(split_Narr[1],split_Narr[0]);



   }
}
setInterval(fetch_time, 1000);

function call_time(s_tome,e_id)
{
	var arr = s_tome.split(':');
	var startTime1=(+arr[0]) * 60 * 60 + (+arr[1]) * 60 + (+arr[2]);
	var dt = new Date();
	// later record end time
	var endTime = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
   

    
    var a = endTime.split(':'); // split it at the colons

// minutes are worth 60 seconds. Hours are worth 60 minutes.
    var seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60 + (+a[2]); 


    // time difference in ms
    var timeDiff = seconds - startTime1;



    var hours=0;
    var minutes=0;
    var seconds=0;
    
     if(timeDiff<60)
     {
       seconds=timeDiff;
     }

     else
     {
        if(timeDiff<3600)
        {
            minutes=Math.floor(timeDiff/60);
            seconds=Math.floor(timeDiff%60);
        }
        else
        {
            hours=Math.floor(timeDiff/3600);
            minutes=Math.floor((timeDiff%3600)/60); 
            seconds=Math.floor((timeDiff%3600)%60);
        }
     }
    if(hours<10)
    {
        hours='0'+hours;
    }
    if(minutes<10)
    {
        minutes='0'+minutes;
    }
    if(seconds<10)
    {
        seconds='0'+seconds;
    }
    
    
    totaltime = hours + ":" + minutes + ":" + seconds;
    $('#col_'+e_id+'active').html(totaltime);
}