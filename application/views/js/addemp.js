$(document).ready(function(){
	$('#errorAdd').html('');
	$('#confirmAdd').html('');
	
	   	$('#addemp').click(function(){
	   	  
	   			var empname= $('#empname').val();
	   			var empname=$.trim(empname);
	   			var empemail= $('#empemail').val();
	   			var empemail=$.trim(empemail);
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
                  			
              			});
	   				}
	   			else
	   			{	
	   				$('#confirmAdd').html('');
	   				
	   				$('#errorAdd').html('*All Fields Are Mandetory');
	   				$('#empname').focus();
	   				
	   			}
	   		
	   		

	   		});
		});