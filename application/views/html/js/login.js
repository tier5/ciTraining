/*$(document).ready(function(){
   $('#login').click(function(){

      var emailv= $('#email').val();
      var pv= $('#pwd').val();
      var btnv= $('#login').val();
      if (!emailv && !pv) 
      {
         $('#error1').html('*This field could not be blank');
         $('#error2').html('*This field could not be blank');

      } 
      else
      {
      	$.post('Hello', {pwd: pv, email: emailv, btn: btnv}, function(data){
        $('#diviadd23').html(data);
                  
           

   });
      }
  });


});*/
function validate()
		{
			var email = document.getElementById('email1');
			var p = document.getElementById('pwd1');
			var emv = email.value;
			var pv = p.value;
			if(emv == '' || emv == !emv)
			{
				document.getElementById("error1").innerHTML="*Id field could not be blank";
				//alert("ID FIELD COULD NOT BE BLANK");
				//return false;
			}
			if(pv == '' || pv == !pv)
			{
				document.getElementById("error2").innerHTML="*password field could not be blank";
				//alert("ID FIELD COULD NOT BE BLANK");
				return false;
			}
			
		}
