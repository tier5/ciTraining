$(document).ready(function(){
    
   
	
	$.post('Admin/showAllEmployee', function(data)
	{

		var newdata= data.split("/");
		var newdata1;
		
		for(i=0;i<newdata.length-1;i++)
		{
			newdata1= newdata[i].split(",");
			//alert(newdata1[2]);
			$("#showallemployeeDiv").append("<tr><td id='id_"+$.trim(newdata1[0])+"'>"+newdata1[0]+"</td><td contenteditable true id='name_"+$.trim(newdata1[0])+"'>"+newdata1[1]+"</td><td contenteditable true id='e_"+$.trim(newdata1[0])+"'>"+newdata1[2]+"</td><td><button onclick='updatefunc("+$.trim(newdata1[0])+")' class='btn btn-info btn-sm glyphicon glyphicon-ok'></button></td></tr>");
		}
		
		
		
    });
    window.updatefunc=function(id)
	{
		var name = $('#name_'+id).text();
		var id_row= $('#id_'+id).text();	

		var email=$('#e_'+id).text();
		/*alert(id);
		alert(name);
		alert(email);*/
		if (name && id_row && email) {
		 $.post('Admin/updatenew', {id: id, name: name, email: email}, function(data){

		 		//alert(newdata);

	        	$('#updatenew').html(data);
	        });  
	        }
	        else
	        {
	        	//$('#updatenew').html('All fields are mand');
	        	alert("when you are editing make sure all fields are filled up properly. Fields could not be blank");
	        } 
	}
	



});