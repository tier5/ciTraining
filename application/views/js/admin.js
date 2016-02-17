$(document).ready(function(){

$('[data-toggle="tooltip"]').tooltip();
clockin();
employeeLate();
fbreak();
sbreak();
lbreak();
allemployee();

setInterval(function(){
    
    fbreak();
    sbreak();
    lbreak();
    
}, 1000);

setInterval(function(){

	clockin();
	employeeLate();

	}, 60000);

window.deleteLateRow = function(id)
{
	var emp_id=id;
	$.post('Admin/deleteEmpLate', {tbl_id: emp_id}, function(data){

		//alert(data);
		employeeLate();

	});
}



//=======================DATEPICKER=============================
	 $("#datepicker").datepicker({
    // The hidden field to receive the date
    altField: "#dateHidden",
    // The format you want
    altFormat: "yy-mm-dd",
    // The format the user actually sees
    dateFormat: "dd/mm/yy",
    onSelect: function (date) {
        // Your CSS changes, just in case you still need them
        $('a.ui-state-default').removeClass('ui-state-highlight');
        $(this).addClass('ui-state-highlight');
        //alert(date);
        //var date=date;
        $.post('Admin/checkdateonclock',{optdate: date},function(data){
		$('#tablediv').html(data);
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

					default:
						breakname = "Default";
				}
				//alert(value[4]);

				sec = value[4];

				sec = sec%60;

				sec = properSec(sec);

				min = Math.floor(value[4]%3600);

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

			

			totaldiv += "<tr><td id='id_"+$.trim(value[0])+"'>"+value[0]+"</td><td contenteditable='true' id='name_"+$.trim(value[0])+"'>"+value[1]+"</td><td id='email_"+$.trim(value[0])+"' contenteditable='true'>"+value[2]+"</td><td contenteditable='true' id='password_"+$.trim(value[0])+"'>"+value[3]+"</td><td contenteditable='true' id='points_"+$.trim(value[0])+"'>"+value[4]+"</td><td><button onclick='myFunction("+$.trim(value[0])+")' class='btn-primary btn-sm glyphicon glyphicon-floppy-saved' data-toggle='tooltip' title='Save This Row'></button></td><td><button id='absent_"+$.trim(value[0])+"' class='btn btn-warning btn-sm glyphicon glyphicon-copy' onclick='markAbsent("+$.trim(value[0])+")' data-toggle='tooltip' title='Mark Absent'></button></td></tr>";

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

    


});