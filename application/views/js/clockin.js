 $(document).ready(function(){
        $("#clockbtn").click(function(){

            var btn=$('#clockbtn').text();
            //alert(btn);
            if (btn === 'Clock Out') 
            {
                $.post('Employee/clockin', function(data){

                    $('#clockintime').html(data);
                    $('#clockintime1').html('Hey! Guest, have a nice day!');


                });
            }
            
            else
            {
                $('#clockintime1').html('Hope! You have enjoyed your office');

                $.post('Employee/clockout', function(data){

                    $('#clockintime').html(data);
                    $('#clockintime1').html('Hey! Guest, see you tommorow');


                });
            }    
    
        });


        


    });
