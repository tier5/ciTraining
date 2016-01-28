$(document).ready(function(){
  $('#updtemp').click(function()

      { 
         //Catching the Value from View(adminview)Page
          var empid= $('#empid').val();
          var newname= $('#newname').val();
          var filter= /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	        var newemail= $('#newemail').val();
          //var newemail=$.trim(newemail);
	        var newpass= $('#newpass').val();
	        var updtemp= $('#updtemp').val();


          if(empid && newname && newemail && newpass)
          {
                if (filter.test(newemail)) //if email in proper way exist
                {
                  $.post('Admin/update',{empid1: empid, newname1: newname, newemail1: newemail, newpass1: newpass, updtemp1: updtemp}, function(data){
                  $('#alartmsg').html(data);
                     });
                }
                else 
                {
                  $('#alartmsg').html('*Invalid email format, email should be like email@domain.com');    
                }
     	      
          }
          else
          {
              $('#alartmsg').html('All * marked fields are required');
          }
      });
});