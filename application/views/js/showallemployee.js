$(document).ready(function(){
  
  

  	allemployee();

 
	

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

			

			totaldiv += "<tr><td id='id_"+$.trim(value[0])+"'>"+value[0]+"</td><td contenteditable='true' id='name_"+$.trim(value[0])+"'>"+value[1]+"</td><td id='email_"+$.trim(value[0])+"' contenteditable='true'>"+value[2]+"</td><td contenteditable='true' id='password_"+$.trim(value[0])+"'>"+value[3]+"</td><td contenteditable='true' id='points_"+$.trim(value[0])+"'>"+value[4]+"</td><td><button onclick='myFunction("+$.trim(value[0])+")' class='btn btn-primary btn-sm glyphicon glyphicon-floppy-saved'></button></td></tr>";

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