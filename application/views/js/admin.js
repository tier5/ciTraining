$(document).ready(function(){

	$.post('Admin/empClockIn', function(data){

		//console.log(data);

		//var a = JSON.parse(data);
		//for (var i = 0; i < a.length; i++){

			//$('#tablediv').html(a[i].Aid);	
		//}
		if(data)
		{
			$('#tablediv').html(data);
		}
			
		

	});


});