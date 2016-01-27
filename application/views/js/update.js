$(document).ready(function(){
    $('#updtemp').click(function()
    { 
      var empid= $('#empid').val();
      var newname= $('#newname').val();
	  var newemail= $('#newemail').val();
	  var newpass= $('#newpass').val();
	  var updtemp= $('#updtemp').val();

        if(empid && newname && newemail && newpass)
        {
     	     $.post('Admin/update',{empid1: empid, newname1: newname, newemail1: newemail, newpass1: newpass, updtemp1: updtemp}, function(data){
             $('#alartmsg').html(data);
     	     });
        }
        else
        {
              alert('All * marked fields are required')
        }
    });
});