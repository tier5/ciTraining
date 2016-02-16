$(document).ready(function(){
	
	$('#datepicker').datepicker({ dateFormat:'dd/mm/yy'});
	var date=('#datepicker').val();
	$('#datepicker').click(function(){
	alert(date);
    });
});