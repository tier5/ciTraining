$(document).ready(function(){
  
  

  	allemployee();

 
	
  	$('#addemp').click(function(){

		setTimeout(function(){ 

			allemployee();
			//alert('hello');

		}, 1000);

		

		
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

			

			totaldiv += "<tr><td id='id_"+$.trim(value[0])+"'>"+value[0]+"</td><td contenteditable='true' id='name_"+$.trim(value[0])+"'>"+value[1]+"</td><td id='email_"+$.trim(value[0])+"' contenteditable='true'>"+value[2]+"</td><td contenteditable='true' id='password_"+$.trim(value[0])+"'>"+value[3]+"</td><td><button onclick='myFunction("+$.trim(value[0])+")' class='btn btn-primary btn-sm glyphicon glyphicon-pencil'></button></td></tr>";

			$("#showallemployeeDiv").html(totaldiv);
			console.log(totaldiv);



			
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
		var id = $('#id_'+id).text();
		
		if(id && name && email && password)
		{
			
			$.post('Admin/update',{id: id, newname: name,newemail: email,newpass: password} ,function(data){

				//alert(data);
				allemployee();
			});
		}
			
		
		
	}



});