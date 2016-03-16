$(document).ready(function(){
	
var a=0;

$('[data-toggle="tooltip"]').tooltip();
clockin();
employeeLate();
fbreak();
sbreak();
lbreak();
allemployee();
showEmpFcomplete();
showEmpScomplete();
showEmpLcomplete();

var breakfunctions=setInterval(function(){
    if(a==1)
    {
    	clearInterval(breakfunctions);
    	//exit(0);
    }
    else
    {
    	fbreak();
    	sbreak();
    	lbreak();
    	
    }
    
    
    
}, 1000);

	

var empinfofunctions=setInterval(function(){

	if(a==1)
    {
    	clearInterval(empinfofunctions);
    	//exit(0);
    }
    else
    {
    	clockin();
		employeeLate();
		showEmpFcomplete();
		showEmpScomplete();
		showEmpLcomplete();
    }
	

	}, 60000);

window.deleteLateRow = function(id)
{
	var emp_id=id;
	$.post('Admin/deleteEmpLate', {tbl_id: emp_id}, function(data){

		//alert(data);
		
		employeeLate();

	});
}
//==============================================================

function showEmpFcomplete()
{
	
	$.post('Admin/shoEmpFcomplete', function(data){

		var totaldiv2 = "";
		if($.trim(data))
		{
			data = data.split('?');

			for(i=0;i<data.length-1;i++)
			{
				value = data[i].split(',');

				if(value[2]>1200)
				{
					colorclasscomplete = "class='warning'";
				}

				else
				{
					colorclasscomplete = "class='success'";
				}

				totaldiv2 += "<tr "+colorclasscomplete+"><td>"+value[0]+"</td><td>"+value[1]+"</td></tr>";

			}

			$("#fbreaktablecomplete").html(totaldiv2);
		}
		else
		{
			$("#fbreaktablecomplete").html("");
		}

	});
}

//=============================================================

function showEmpScomplete()
{
	
	$.post('Admin/shoEmpScomplete', function(data){

		var totaldiv2 = "";
		if($.trim(data))
		{
			data = data.split('?');

			for(i=0;i<data.length-1;i++)
			{
				value = data[i].split(',');

				if(value[2]>3600)
				{
					colorclasscomplete = "class='warning'";
				}

				else
				{
					colorclasscomplete = "class='success'";
				}

				totaldiv2 += "<tr "+colorclasscomplete+"><td>"+value[0]+"</td><td>"+value[1]+"</td></tr>";

			}

			$("#sbreaktablecomplete").html(totaldiv2);
		}
		else
		{
			$("#sbreaktablecomplete").html("");
		}

	});
}
//=============================================================

	function showEmpLcomplete()
{
	
	$.post('Admin/shoEmpLcomplete', function(data){

		var totaldiv2 = "";
		if($.trim(data))
		{
			data = data.split('?');

			for(i=0;i<data.length-1;i++)
			{
				value = data[i].split(',');

				if(value[2]>1200)
				{
					colorclasscomplete = "class='warning'";
				}

				else
				{
					colorclasscomplete = "class='success'";
				}

				totaldiv2 += "<tr "+colorclasscomplete+"><td>"+value[0]+"</td><td>"+value[1]+"</td></tr>";

			}

			$("#lbreaktablecomplete").html(totaldiv2);
		}
		else
		{
			$("#lbreaktablecomplete").html("");
		}

	});
}

	
var get_date=$('#event_date').val();
var array = get_date.split(",");

var disabledDays = [];
    for (var i = 0; i < array.length; i++) {

      disabledDays.push(array[i]);
    }




//=======================DATEPICKER=============================
	 $("#datepicker").datepicker({
    // The hidden field to receive the date
    altField: "#dateHidden",
    // The format you want
    altFormat: "yy-mm-dd",
    // The format the user actually sees
    dateFormat: "dd/mm/yy",

   

         beforeShowDay: function(date) {
            var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
            for (i = 0; i < disabledDays.length; i++) {
                if($.inArray(y + '-' + (m+1) + '-' + d,disabledDays) != -1) {
                    //return [false];
                    return [true, 'highlight', ''];
                }
            }
            return [true];

        },


    onSelect: function (date) {


    	/* 03.03.2016 */

            $.post('Admin/empEventcheck',{optdate: date}, function(data){
           //alert(data);
            var arr=data.split('+');

            if(arr[0].length>1)
            {
            	if(arr[1]>0)
            	{
            	$('#notify').show();
            	$('#notify').html('<img src="application/views/img/bell_icon.jpg" alt=" " title="Tomorrow A new Event Is There!! check On the calendar!!">');
            	}
            	else
            	{
            	$('#notify').hide();
            	}
			$('#event_spcl').show();
			$('#eventdiv').html(data);
		    }
		    else
		    {
		    	if(arr[1]>0)
            	{
            	$('#notify').show();
            	$('#notify').html('<img src="application/views/img/bell_icon.jpg" alt=" " title="Tomorrow A new Event Is There!! check On the calendar!!">');
            	}
            	else
            	{
            	$('#notify').hide();
            	}
		    	
		    	$('#event_spcl').hide();
		    	$('#eventdiv').html('');
		    }
		});


    	/* 03.03.2016 */

    	//a=1;

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
			a=1;
			//b=1;
		}
		console.log(a);

    	$('#sbreaktable').html('');
    	//alert(a);
        // Your CSS changes, just in case you still need them
        $('a.ui-state-default').removeClass('ui-state-highlight');
        $(this).addClass('ui-state-highlight');
        
        
        $.post('Admin/empClockInDateChk',{optdate: date}, function(data){

			$('#tablediv').html(data);
		});


		$.post('Admin/empSbreakDateChk1',{optdate: date}, function(data){

          
			if($.trim(data))
		{

		var totaldiv = "";
		

		//data = data.split(".");

		//alert(data.length-1);

		/*for(i=0;i<data.length-1;i++)
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

			hour = Math.floor(value[1]/3600);

			sec = sec%60;

			sec = properSec(sec);

			if(value[1]<=60)
			{
				min = Math.floor(value[1]/60);
			}
			else
			{
				min = Math.floor(value[1]%3600);
			}

			min = properMin(min);

			min = properSec(min);

			timeshow=hour+":"+min+':'+sec+'m';



			totaldiv += "<tr "+colorclass+"><td >"+value[0]+"</td><td id='"+value[0]+"'>"+timeshow+"</td></tr>";
			
			$("#sbreaktable").html(totaldiv);
			
			
		}*/

		$("#sbreaktable").html(data);
		
		}

		else
		{
			$("#sbreaktable").html('');
		}
		});


		$.post('Admin/empFbreakDateChk1',{optdate: date}, function(data){
          
          
			if($.trim(data))
		{
   /*
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

			hour = Math.floor(value[1]/3600);

			sec = sec%60;

			sec = properSec(sec);

			if(value[1]<=60)
			{
				min = Math.floor(value[1]/60);
			}
			else
			{
				min = Math.floor(value[1]%3600);
			}

			min = properMin(min);

			min = properSec(min);

			

			timeshow=hour+":"+min+':'+sec+'m';



			totaldiv += "<tr "+colorclass+"><td >"+value[0]+"</td><td id='"+value[0]+"'>"+timeshow+"</td></tr>";

			$("#fbreaktable").html(totaldiv);
			
			
				
		}*/

		$("#fbreaktable").html(data);
		
		}

		else
		{
			$("#fbreaktable").html('');
		}

				
		});


		
		$.post('Admin/empLbreakDateChk1',{optdate: date}, function(data){
          
        
        
       	if($.trim(data))
		{

		$(".late").html(data);
		}
		else
		{
			$(".late").html('');
		}
		

				
		});

		$.post('Admin/empFbreakDateChk',{optdate: date}, function(data){

/*
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

			hour = Math.floor(value[1]/3600);

			sec = sec%60;

			sec = properSec(sec);

			if(value[1]<=60)
			{
				min = Math.floor(value[1]/60);
			}
			else
			{
				min = Math.floor(value[1]%3600);
			}
			

			min = properMin(min);

			min = properSec(min);

			timeshow=hour+":"+min+':'+sec+'m';



			totaldiv += "<tr "+colorclass+"><td >"+value[0]+"</td><td id='"+value[0]+"'>"+timeshow+"</td></tr>";
			
			$("#lbreaktable").html(totaldiv);
			
			
		}

		
		
		}

		else
		{
			$("#lbreaktable").html('');
		}*/

		$.post('Admin/employeeLateDateChk',{optdate: date}, function(data){
			//alert(data);

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
						breakname = "Default";
				}
				//alert(value[4]);

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

				totaldiv += "<tr><td>"+value[0]+"</td><td>"+value[1]+"</td><td>"+value[2]+"</td><td>"+breakname+"</td><td>"+latetime+"</td><td><button class='btn btn-danger glyphicon glyphicon-trash' onclick='deleteLateRow("+$.trim(value[5])+")'></button></td></tr>";

				
			}
			//$('#latetable').html(data);

		}
		
				$('#latetable').html(totaldiv);

		});

		$.post('Admin/shoEmpFcompleteDateChk',{optdate: date}, function(data){

			var totaldiv2 = "";
		if($.trim(data))
		{
			data = data.split('?');

			for(i=0;i<data.length-1;i++)
			{
				value = data[i].split(',');

				if(value[2]>1200)
				{
					colorclasscomplete = "class='warning'";
				}

				else
				{
					colorclasscomplete = "class='success'";
				}

				totaldiv2 += "<tr "+colorclasscomplete+"><td>"+value[0]+"</td><td>"+value[1]+"</td></tr>";

			}

			$("#fbreaktablecomplete").html(totaldiv2);
		}
		else
		{
			$("#fbreaktablecomplete").html("");
		}
	});

		$.post('Admin/shoEmpScompleteDateChk',{optdate: date}, function(data){

			var totaldiv2 = "";
		if($.trim(data))
		{
			data = data.split('?');

			for(i=0;i<data.length-1;i++)
			{
				value = data[i].split(',');

				if(value[2]>3600)
				{
					colorclasscomplete = "class='warning'";
				}

				else
				{
					colorclasscomplete = "class='success'";
				}

				totaldiv2 += "<tr "+colorclasscomplete+"><td>"+value[0]+"</td><td>"+value[1]+"</td></tr>";

			}

			$("#sbreaktablecomplete").html(totaldiv2);
		}
		else
		{
			$("#sbreaktablecomplete").html("");
		}
	});

		$.post('Admin/shoEmpLcompleteDateChk',{optdate: date}, function(data){

			var totaldiv2 = "";
		if($.trim(data))
		{
			data = data.split('?');

			for(i=0;i<data.length-1;i++)
			{
				value = data[i].split(',');

				if(value[2]>1200)
				{
					colorclasscomplete = "class='warning'";
				}

				else
				{
					colorclasscomplete = "class='success'";
				}

				totaldiv2 += "<tr "+colorclasscomplete+"><td>"+value[0]+"</td><td>"+value[1]+"</td></tr>";

			}

			$("#lbreaktablecomplete").html(totaldiv2);
		}
		else
		{
			$("#lbreaktablecomplete").html("");
		}
	});
			

		});
    }

    


    });
	

//=====================================================

	$('#delAllLateTbl').click(function(){

		$.post('Admin/lateTblTruncate', function(data){

			employeeLate();
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
				//alert(value[4]);

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

				totaldiv += "<tr><td>"+value[0]+"</td><td>"+value[1]+"</td><td>"+value[2]+"</td><td>"+breakname+"</td><td>"+latetime+"</td><td><button class='btn btn-danger glyphicon glyphicon-trash' onclick='deleteLateRow("+$.trim(value[5])+")'></button></td></tr>";

				
			}
			//$('#latetable').html(data);

		}
		
				$('#latetable').html(totaldiv);
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

			hour = Math.floor(value[1]/3600);

			sec = sec%60;

			sec = properSec(sec);

			if(value[1]<=60)
			{
				min = Math.floor(value[1]/60);
			}
			else
			{
				min = Math.floor(value[1]%3600);
			}

			min = properMin(min);

			min = properSec(min);

			

			timeshow=hour+":"+min+':'+sec+'m';



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

			hour = Math.floor(value[1]/3600);

			sec = sec%60;

			sec = properSec(sec);

			if(value[1]<=60)
			{
				min = Math.floor(value[1]/60);
			}
			else
			{
				min = Math.floor(value[1]%3600);
			}

			min = properMin(min);

			min = properSec(min);

			timeshow=hour+":"+min+':'+sec+'m';



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

			hour = Math.floor(value[1]/3600);

			sec = sec%60;

			sec = properSec(sec);

			if(value[1]<=60)
			{
				min = Math.floor(value[1]/60);
			}
			else
			{
				min = Math.floor(value[1]%3600);
			}
			

			min = properMin(min);

			min = properSec(min);

			timeshow=hour+":"+min+':'+sec+'m';



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



 
	

  	$('#resetEveryPoints').click(function(){

  		$.post('Admin/resetPoints', function(data){

  			if($.trim(data))
  			{
  				allemployee();
  			}

  		});

  	});


 function allemployee()
 {
 	//alert('hello');
 	$.post('Admin/showAllEmployee', function(data){

		

		data = data.split("/");

		var value;

		var totaldiv;

		for(i=0;i<data.length-1;i++)
		{
			//console.log(data[i]);

			value = data[i].split(",");

			

			totaldiv += "<tr><td id='id_"+$.trim(value[0])+"'>"+value[0]+"</td><td contenteditable='true' id='name_"+$.trim(value[0])+"'>"+value[1]+"</td><td id='email_"+$.trim(value[0])+"' contenteditable='true'>"+value[2]+"</td><td contenteditable='true' id='password_"+$.trim(value[0])+"'>"+value[3]+"</td><td contenteditable='true' id='points_"+$.trim(value[0])+"'>"+value[4]+"</td><td><button onclick='myFunction("+$.trim(value[0])+")' class='btn-primary btn-sm glyphicon glyphicon-floppy-saved' data-toggle='tooltip' title='Save This Row'></button></td><td><button id='absent_"+$.trim(value[0])+"' class='btn btn-warning btn-sm glyphicon glyphicon-copy' onclick='markAbsent("+$.trim(value[0])+")' data-toggle='tooltip' title='Mark Absent'></button></td><td><button id='absent_"+$.trim(value[0])+"' class='btn btn-danger btn-sm glyphicon glyphicon-trash' onclick='deleteEmp("+$.trim(value[0])+")' data-toggle='tooltip' title='Delete This Employee'></button></td><td><button id='absent_"+$.trim(value[0])+"' class='btn btn-default btn-sm glyphicon glyphicon-scissors' onclick='deductPointCustomReason("+$.trim(value[0])+")' data-toggle='tooltip' title='Deduct Point'></button></td></tr>";

			$("#showallemployeeDiv").html(totaldiv);
			//console.log(totaldiv);



			
		}
		//alert(data);

	});
 }

	window.myFunction = function(id)
	{
		/**/
		var password = $('#password_'+id).text();
		var email = $('#email_'+id).text();
		var name = $('#name_'+id).text();
		var points = $('#points_'+id).text();
		var id = $('#id_'+id).text();
		
		if(id && name && email && password)
		{
			
			$.post('Admin/update',{id: id, newname: name,newemail: email,newpass: password,points :points} ,function(data){

				//alert(data);
				allemployee();
			});
		}
			
		
		
	}

	window.deductPointCustomReason = function(id)
	{
		//alert(id);
		$('#showiddeductModal').text(id);
		$('#customPointDeductModal').modal('show');

		$('#custompointdeductbutton').click(function(){

			var point = $('#custompointdeductPoint').val();
			var pointisnum = isNaN(point);
			var msg = $('#custompointdeductMsg').val();
			
			if(point && msg && !pointisnum)
			{
				$.post('Admin/deductPointCustomReason',{point: point, msg: msg, id: id},function(data){

					employeeLate();
					allemployee();
					


				});

			}
			$('#custompointdeductPoint').val("");
			$('#custompointdeductMsg').val("");

		});

	}

	window.deleteEmp = function(id)
	{
		$('#deleteEmpModal').modal('show');

		$('#deleteEmpYes').click(function(){

			$.post('Admin/deleteEmp',{id: id} ,function(data){

				//alert(data);
				//$('body').html(data);
				allemployee();
			});

		});

		
	}

	window.markAbsent = function(id)
	{
		var Eid = id;

		$.post('Admin/markAbsent', {Eid: Eid}, function(data){

				if($.trim(data))
				{
					//alert(data);

					$('#absentModal').modal('show');
					employeeLate();
					allemployee();
				}

		});
	}

	$('#addNewEmp').click(function(){

		//alert('hello');
		var username = $('#empusername').val();
		var useremail = $('#empuseremail').val();
		var userpassword = $('#empuserpass').val();
		/*alert(username);
		alert(useremail);
		alert(userpassword);*/
		useremail = validateEmail(useremail);
		
		if(useremail && userpassword && username)
		{
			$.post('Admin/addEmp',{name: username, email: useremail, pass: userpassword, btn: "submit"}, function(data)
			{
                $('#confirmAdd').html(data);
                allemployee();
			});
		}

		else
		{
			$('#improperemail').html('all fields are needed & a proper email');
		}

		


	});
//=================================================

	function validateEmail(email) {
    var x = email;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) 
    {
        //alert("Not a valid e-mail address");
        return false;
    }
    else
    {
    	return email;
    }
}


	$("#showalldaylate").click(function(){

		alert('hiiii');


	});




});
