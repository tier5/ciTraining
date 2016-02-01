 $(document).ready(function(){
        $("#clockbtn").click(function(){

            var btn=$('#clockbtn').text();
            //alert(btn);
            if (btn === 'Clock Out') 
            {
                $.post('Employee/clockin', {btn: btn}, function(data){

                $('#clockindiv').html(data);
                 $('#clockoutdiv').html('');
                $('#clockintime1').html('Hey! Guest, have a nice day!');


           });
        }
        else
            {
                $('#clockintime1').html('Hope! You have enjoyed your office');

                 $.post('Employee/clockout', {btn: btn}, function(data){

                $('#clockoutdiv').html(data);
                 $('#clockindiv').html('');
                $('#clockintime1').html('Hey! Guest, see you tommorow');


           });
            }

        });


    });
