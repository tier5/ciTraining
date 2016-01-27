
$(document).ready(function(){
	$('#errorAdd').html(''); //making divs empty after page ready
	$('#confirmAdd').html(''); //making divs empty after page ready
		$('#addemp').click(function(){
			var emppass= $('#emppass').val(); //taking values
	   		var emppass=$.trim(emppass);		//removing spaces
	   		var submitadd= $('#addemp').val();
	   		var empname= $('#empname').val();
	   		var empname=$.trim(empname);
	   		//checking proper email type
	   		var filter= /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	   		//taking value of email
	   		var empemail= $('#empemail').val();
	   		var empemail=$.trim(empemail);
	   		if (empname && empemail && emppass) //if all fields exist
	   		{
	   			$('#errorAdd').html('');	//making error div blank 
	   			var empemail= filter.test(empemail); //validating email
	   		
	   		if (empemail== true) //if email in proper way exist
	   		{
	   			//take this new email value
	   			var empemail= $('#empemail').val();
	   			var empemail=$.trim(empemail); //trim this i.e. rmv spaces

	   			
	   		}
	   		else //if email in proper way doesnt exist
	   		{	
	   				
	   				
	   				$('#errorAdd1').html('*invalid email format, email should be like email@domain.com');
	   				
	   		}
	   	
	   		
	   			
	   		if (empname && empemail && emppass) //now again a crosscheck if all fields exist in a proper manner
	   		{
	   			$.post('Admin/addEmp',{name: empname, email: empemail, pass: emppass, btn: submitadd}, function(data){
                $('#confirmAdd').html(data);
                //making fileds blank after submit
                $('#empname').val('');
                $('#empemail').val('');
                $('#emppass').val('');
                $('#errorAdd').html('');
                $('#errorAdd1').html('');
                });
	   					
	   		}
	   		else //if doesnot in proper manner
	   		{	
	   			
	   				$('#confirmAdd').html('');
	   				
	   				$('#empname').focus();

	   			

	   				
	   		}
	   	}
	   	else //if all fields doesnt exist
	   	{	
	   		$('#errorAdd1').html('');
	   		$('#errorAdd').html('*All Fields are Mandetory');
	   	}

	   		
	   		

		});
});

