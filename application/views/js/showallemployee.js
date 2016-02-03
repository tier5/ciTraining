$(document).ready(function(){
    
   
	
	$.post('Admin/showAllEmployee', function(data){

		//alert(data);

		var newdata= data.split("/");
		var newdata1;
		
		for(i=0;i<newdata.length-1;i++)
		{
			//alert(newdata[i]);
			newdata1= newdata[i].split(",");
			//alert(newdata1[0]);
			$("#showallemployeeDiv").append('<tr><td>'+newdata1[0]+'</td><td>'+newdata1[1]+'</td><td>'+newdata1[2]+'<td><td><button type="submit" id="'+newdata1[0]+'"class="btn btn-primary glyphicon glyphicon-pencil"><br>Edit</button></td></tr>');
			
		}
		
		var test;
		for(i=0;i<newdata.length-1;i++)
		{
			newdata1= newdata[i].split(",");
			//alert('#'+newdata1[0]);
			for(j=0;j<)
			test=newdata1[0];
			alert(test);		


		}	
	/*	alert(test);		
*/
	});



});