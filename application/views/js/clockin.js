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

            var btn=$('#clockbtn').text();
            //alert(btn);
            if (btn === 'Clock Out') 
            {
                $('#breakmsg').html('');
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
                calenderclockin();

            }
            
            else
            {
                $('#clockintime1').html('Hope! You have enjoyed your office');

                $.post('Employee/clockout', function(data){

                    $('#clockintime').html(data);
                    $('#clockintime1').html('see you tommorow');


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
            }    
    
        });




















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

        var fullDate = new Date()
        /*console.log(fullDate);*/
        //Thu May 19 2011 17:25:38 GMT+1000 {}
         
        //convert month to 2 digits
        var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : '0' + (fullDate.getMonth()+1);
         
        var currentDate = fullDate.getDate() + "/" + twoDigitMonth + "/" + fullDate.getFullYear();
        /*console.log(currentDate);
        console.log(date);*/

        
        
        
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





































