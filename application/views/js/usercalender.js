$(document).ready(function(){
var a=0;
//==============================================================

	$.post('Employee/calenderclockin',{clock: 'clockin'}, function(data){

		if($.trim(data))
        {
        	changeCalenderInfo(data,'#clockintimeshow');

       	}
	});



//==============================================================

	$.post('Employee/calenderclockout',{clock: 'clockout'}, function(data){

		if($.trim(data))
        {
        	changeCalenderInfo(data,'#clockouttimeshow');

       	}
	});
//==============================================================

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

//==================================================================
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

//==================================================================
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