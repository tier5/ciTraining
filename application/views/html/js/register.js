$(document).ready(function(){
            $('#reg').click(function(){

               var namev= $('#name').val();
               var pv= $('#pwd').val();
               var emailv= $('#email').val();
               var btnv= $('#reg').val();
          
               if(namev && pv && emailv)
               {
                  $.post('page', {name: namev, pwd: pv, email: emailv, btn: btnv}, function(data){
                  $('#diviadd').html(data);
                  
               });

               }
               if(!namev)
               {
                   $('#err1').html('*This field could not be blank');
                   //return false;
               }
               if (!pv)
               {
                   $('#err2').html('*This field could not be blank');
                   //return false;
               }
               if(!emailv)
               {
                  
                 
                  $('#err3').html('*This field could not be blank');
                  return false;
               }

               


            });


         });
