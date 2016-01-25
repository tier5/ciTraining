$(document).ready(function(){
    
    alert("hello");
	
	$.post('Admin/showAllEmployee', function(data){

		$('#showallemployeeDiv').html(data);

	});



});