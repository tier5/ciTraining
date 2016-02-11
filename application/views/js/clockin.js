 $(document).ready(function(){

    function showPointsOnLoad()
    {
    $.post('Employee/showPointsOnLoad', function(data){


        $('#pointbutton').text(data);

    });
    }

        $("#clockbtn").click(function(){

            var btn=$('#clockbtn').text();
            //alert(btn);
            if (btn === 'Clock Out') 
            {
                $.post('Employee/clockin', function(data){

                    $('#clockintime').html(data);
                    $('#clockintime1').html('');


                });

                $.post('Employee/clockinLateChk', function(data){

                        //alert(data);
                        if($.trim(data))
                        {
                             //$('body').html(data);
                             $('#clockintime').html(data);

                        }
                       
                });

                $.post('Employee/clockinLatePoints', function(data){


                        if($.trim(data))
                        {
                             //$('body').html(data);
                             //alert(data);
                             $("#latePoint").modal("show");
                            $("#pointMsg").html(data);
                            showPointsOnLoad();

                        }

                });


            }
            
            else
            {
                $('#clockintime1').html('Hope! You have enjoyed your office');

                $.post('Employee/clockout', function(data){

                    $('#clockintime').html(data);
                    $('#clockintime1').html('see you tommorow');


                });
            }    
    
        });


        


    });
