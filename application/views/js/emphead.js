$(document).ready(function(){
//$('#welcome').html('Hiii');
    $.post('Employee/showclkin',function(data){
         //alert(data);
         if(data)
         {
           $('#showattendance').html('Today you Logged In @'+data);
         }
         else
         {
            $('#showattendance').html('Please Clock In');
         }
     });

    $.post('Employee/showname',function(data){
         //alert(data);
         $('#welcome').html('Hello, \n'+data+'\n have a nice day');
     });

});