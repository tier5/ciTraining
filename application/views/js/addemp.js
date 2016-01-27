
$(document).ready(function(){
	$('#errorAdd').html('');
	$('#confirmAdd').html('');
		$('#addemp').click(function(){
	   		var empname= $('#empname').val();
	   		var empname=$.trim(empname);
	   		var filter= /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	   		var empemail= $('#empemail').val();	   	  
	   		var empemail= filter.test(empemail);
	   		if (empemail== true && empemail.length != 0) 
	   		{
	   			
	   			var empemail= $('#empemail').val();
	   			var empemail=$.trim(empemail);

	   			
	   		}
	   		else //if (empemail==false && empemail.length = 0) 
	   		{	
	   				
	   				
	   				$('#errorAdd1').html('*invalid email format, email should be like email@domain.com');
	   			
	   		}

	   		var emppass= $('#emppass').val();
	   		var emppass=$.trim(emppass);
	   		var submitadd= $('#addemp').val();
	   			
	   		if (empname && empemail && emppass) 
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
	   		else 
	   		{	
	   			
	   				$('#confirmAdd').html('');
	   				$('#errorAdd').html('*All Fields are Mandetory');
	   				$('#empname').focus();

	   			

	   				
	   		}
	   		
	   		

		});
});

