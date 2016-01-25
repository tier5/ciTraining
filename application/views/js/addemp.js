$(document).ready(function(){
	   		$('#addemp').click(function(){
	   			//alert('working');
	   			var empname= $('#empname').val();
	   			var empemail= $('#empemail').val();
	   			var emppass= $('#emppass').val();
	   			var submitadd= $('#addemp').val();
	   			if (empname && empemail && emppass) 
	   				{
	   					//$('#errorAdd').html('uhu');
	   					//alert(empname+""+empemail+""+emppass);
	   					$.post('Admin/addEmp',{name: empname, email: empemail, pass: emppass, btn: submitadd}, function(data){
                  			
                  			$('#errorAdd').html(data);
              			});
	   				}
	   			else
	   			{
	   				$('#errorAdd').html('*All Fields Are Mandetory');
	   				$('#empname').focus();
	   				//$(this).val('');
	   			}

	   		});
		});