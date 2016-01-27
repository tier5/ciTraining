$(document).ready(function(){
    
   
	
	$.post('Admin/showAllEmployee', function(data){

		$('#showallemployeeDiv').html(data);

	});



});