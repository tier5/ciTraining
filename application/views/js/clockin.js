 $(document).ready(function(){

    function showPointsOnLoad()
    {
    $.post('Employee/showPointsOnLoad', function(data){


        $('#pointbutton').text(data);

    });
    }

//===============================================================

    
        
//================================================================

        $("#clockbtn").click(function(){

            //$('#spinner').append("<i align='center' class='fa fa-spinner fa-pulse fa-5x'></i>");
            $(this).prop('disabled', true);

            var btn=$('#clockbtn').text();
            
                console.log('button disabled');
                if (btn === 'Clock In') 
                {
                  
                    $('#breakmsg').html('');
                    $.post('Employee/clockin', function(data){
                      
                      $('#production').show();
                     //alert(data);
                        /*$('#clockintime').html(data);
                        $('#clockintime1').html('');*/
                        if($.trim(data))
                        {
                          
                            data = data.split(',');

                            $('#clockintime').html(data[0]);
                            $('#clockintime1').html('');
                            $('#clockintime').html(data[1]);
                           
                            var event_exists=$('#event_notify').val();
                           /* if(event_exists==1)
                            {
                                $('#event_modal').modal("show");
                            }*/
                            

                            if(data[2])
                            {
                              
                                $('#close_new').on('click', function () {

                               if(event_exists !='')
                                   {
                                    $('#event_modal').modal('show');
                                   }
                                });
                                   
                                $('#close_new_btn').on('click', function () {
                                
                                 if(event_exists !='')
                                   {
                                    $('#event_modal').modal('show');
                                   }
                                   
                                });
                            
                                $("#latePoint").modal("show");
                                $("#pointMsg").html(data[2]);
                                showPointsOnLoad();
                            }
                            else
                            {
                                  if(event_exists !='' && data[0]!='you have already clocked in today')
                                   {
                                     $('#event_modal').modal('show');
                                   }
                                   else
                                   {
                                   
                                    $.post('Employee/removeClockout', function(data){
                                    });
                                   }
                            }


                            
                        }
                        


                    });

                   /* $.post('Employee/clockinLateChk', function(data){

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

                    });*/
                    $('#clockbtn').text("Clock Out");
                    calenderclockin();
                    
                    /*$('#spinner').remove();
                    console.log('spinner removed');*/
                    $('#clockbtn').prop('disabled', false);
                    console.log('button enabled');

                }
            
            else
            {
                $('#clockoutModal').modal('show');

                $('#clockoutYes').click(function(){
                   
                       $.post('Employee/FnstopProduction', function(data){
                         $('.production').removeAttr('disabled');
                         $('#timer1').hide();
                         $('#timer2').hide();
                         $('#timer').hide();
                         $('#production').hide();
                       });

                    $('#clockintime1').html('Hope! You have enjoyed your office');

                    $.post('Employee/clockout', function(data){

                        $('#clockintime').html(data);
                        $('#clockintime1').html('see you tommorow');
                        $('#clockbtn').text("Clock In");


                    });

                    $.post('Employee/earlyClockOut',function(data){

                    if($.trim(data))
                    {
                       
                         $('#earlyclockoutMsg').html(data);
                        $("#earlyclockoutModal").modal("show");
                        showPointsOnLoad();
                    }
                       

                    });

                    calenderclockout();
                     /*$('#spinner').remove();*/
                     //console.log('spinner removed');
                     $('#clockbtn').prop('disabled', false);
                     console.log('button enabled');

                });

                $('#clockoutNo').click(function(){

                    $('#clockbtn').prop('disabled', false);

                });
                
            }
            
            //alert(btn);
                
    
        });


   var startTime;
   


 $(".production").click(function(){


   var type_p=$(this).data('status');

   $.post('Employee/Fnaddproduction',{type: type_p}, function(data){
      //alert(data);
      if(data)
      {
        $('.production').removeAttr('disabled');

        $('#production'+type_p).attr('disabled', 'disabled');
        $('.new_timer').removeClass('chktimer1');
        $('.newtimer2').addClass('chktimer1');
       startTime = new Date();
       
      setTimeout(display, 1000);
     
      }
   });

   
 });


var totaltime;
function display() {
  
    // later record end time
    var endTime = new Date();

    // time difference in ms
    var timeDiff = endTime - startTime;

    // strip the miliseconds
    timeDiff /= 1000;

    // get seconds
    var seconds = Math.round(timeDiff % 60);

    // remove seconds from the date
    timeDiff = Math.floor(timeDiff / 60);

    // get minutes
    var minutes = Math.round(timeDiff % 60);

    // remove minutes from the date
    timeDiff = Math.floor(timeDiff / 60);

    // get hours
    var hours = Math.round(timeDiff % 24);

    // remove hours from the date
    timeDiff = Math.floor(timeDiff / 24);

    // the rest of timeDiff is number of days
    var days = timeDiff;

    if(hours<10)
    {
        hours='0'+hours;
    }
    if(minutes<10)
    {
        minutes='0'+minutes;
    }
    if(seconds<10)
    {
        seconds='0'+seconds;
    }
    

    var colorclass = "class='text-default'";
    totaltime = hours + ":" + minutes + ":" + seconds;
   $('#timer1').html("<div "+colorclass+">"+totaltime+"</div>");
    //$("#timer1").text(hours + ":" + minutes + ":" + seconds);

    setTimeout(display, 1000);

}









//============================USER CALENDER===============================

calenderclockin();
calenderclockout();
calenderFbreak();
calenderSbreak();
calenderLbreak();
//==============================================================
function calenderclockin()
{
      $.post('Employee/calenderclockin',{clock: 'clockin'}, function(data){

        if($.trim(data))
        {

            changeCalenderInfo(data,'#clockintimeshow');

        }
    });
}
  



//==============================================================
function calenderclockout()
{
    $.post('Employee/calenderclockout',{clock: 'clockout'}, function(data){

        if($.trim(data))
        {

           
            changeCalenderInfo(data,'#clockouttimeshow');

        }
    });
}
    
//==============================================================
function calenderFbreak()
{
    $.post('Employee/calenderFbreak', function(data){
        
        if($.trim(data))
        {
            changeCalenderInfo(data,'#fbreaktime'); 
        }
        else
        {
            $('#fbreaktime').html('');
        }
        

    }); 

}
    
//==================================================================
function calenderSbreak()
{
    $.post('Employee/calenderSbreak', function(data){
        
        if($.trim(data))
        {
            changeCalenderInfo(data,'#sbreaktime'); 
        }
        else
        {
            $('#sbreaktime').html('');
        }
        

    }); 
}
    

//==================================================================
function calenderLbreak()
{
    $.post('Employee/calenderLbreak', function(data){
        
        if($.trim(data))
        {
            changeCalenderInfo(data,'#lbreaktime'); 
        }
        else
        {
            $('#lbreaktime').html('');
        }
        

    }); 
}
    

//===================================================================



//========================================================================
$("#calender").datepicker({
    // The hidden field to receive the date
    altField: "#dateHidden",
    // The format you want
    altFormat: "yy-mm-dd",
    // The format the user actually sees
    dateFormat: "dd/mm/yy",
    onSelect: function (date) {

        //a=1;
       // alert(date);
        var changedate=date.split('/');
        //alert(changedate);
        date=changedate[0]+'-'+changedate[1]+'-'+changedate[2];
       // alert(new_date);
       
        var fullDate = new Date();
       if(fullDate.getDate()<10)
       {
        var day='0'+fullDate.getDate();
       }
       else
       {
        var day=fullDate.getDate();
       }
        /*console.log(fullDate);*/
        //Thu May 19 2011 17:25:38 GMT+1000 {}
         
        //convert month to 2 digits
        var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : '0' + (fullDate.getMonth()+1);
         
        var currentDate = fullDate.getFullYear() + "-" + twoDigitMonth + "-" + day;
        /*console.log(currentDate);
        console.log(date);*/

        
       // alert(currentDate);
        
        //alert(a);
        // Your CSS changes, just in case you still need them
        $('a.ui-state-default').removeClass('ui-state-highlight');
        $(this).addClass('ui-state-highlight');
//==================

        $.post('Employee/calenderclockinDateChk',{optdate: date, clock: 'clockin'}, function(data){
         
            if($.trim(data))
            {

                changeCalenderInfo(data,'#clockintimeshow');
            }

            else
            {
                $('#clockintimeshow').html('');
            }
        });

//====================
        $.post('Employee/calenderclockoutDateChk',{optdate: date, clock: 'clockout'}, function(data){

            if($.trim(data))
            {
                
                changeCalenderInfo(data,'#clockouttimeshow');
            }
            else
            {
                $('#clockouttimeshow').html('');
            }
        });

//====================
        $.post('Employee/calenderFbreakDateChk',{optdate: date}, function(data){
        
            if($.trim(data))
            {
                changeCalenderInfo(data,'#fbreaktime'); 
            }
            else
            {
                $('#fbreaktime').html('');
            }

        }); 


//====================
        $.post('Employee/calenderSbreakDateChk',{optdate: date}, function(data){
        
            if($.trim(data))
            {
                changeCalenderInfo(data,'#sbreaktime'); 
            }
            else
            {
                $('#sbreaktime').html('');
            }
        

        }); 
//====================

        $.post('Employee/calenderLbreakDateChk',{optdate: date}, function(data){
            
            if($.trim(data))
            {
                changeCalenderInfo(data,'#lbreaktime'); 
            }
            else
            {
                $('#lbreaktime').html('');
            }
            

        }); 

//====================

        }
    });

    function changeCalenderInfo(data,id)
    {
        
        data = data.split(",");
        $(id).html("<span class="+data[1]+">"+data[0]+"</span>");

    }

 });





























