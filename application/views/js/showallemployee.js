$(document).ready(function(){
    
   
	
	$.post('Admin/showAllEmployee', function(data){

		

		data = data.split("/");

		var value;

		var totaldiv;

		for(i=0;i<data.length-1;i++)
		{
			//console.log(data[i]);

			value = data[i].split(",");

			

			totaldiv = "<tr><td>"+value[0]+"</td><td>"+value[1]+"</td><td>"+value[2]+"</td><td></td></tr>";

			$("#showallemployeeDiv").append(totaldiv);
			console.log(totaldiv);



			
		}
		//alert(data);

	});



});