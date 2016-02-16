/*$(document).ready(function(){
    $( "#datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });
    
    $("#datepick").click(function(){
    	var datepicker = $('#datepicker').val();
    	if($.trim(datepicker))
    	{
    	var datepicker = $('#datepicker').val();
    	

    	//alert(datepicker);
	    //$.post('Admin',{datepicker:datepicker},function(data){
         //alert(data);
	     //});
        }
        else
        {
        	alert("Hey");
        }
    });
});*/
$(document).ready(function(){
$( "#datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });
setInterval(function(){
var datepicker = $('#datepicker').val();
        $.post('Admin',{datepicker:datepicker},function(data){
                 alert(data);
        });
    
   //alert(datepicker);
    
}, 50000000);
});
