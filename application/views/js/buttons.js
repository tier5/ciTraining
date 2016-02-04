$(document).ready(function(){
//======================Clock Button Value On Page Load====================
	$.post('Employee/buttonvalue',function(data){
        if (data=='1') 
        {
            $('#clockbtn').text("Clock Out");
        }
        else
        {
        	$('#clockbtn').text("Clock In");
        }
    });
//=====================Break Button On Page Load============================
    $.post('Employee/breakbutton',function(data){
       //alert(data);
		if (data=='1') 
		{
			$('#breakbtn').text("Back To Work");
		}
		else
		{
			$('#breakbtn').text("Break");
		}
	});
//====================On page Load Break Select==============================
    $.post('Employee/breakbackpl', function(data){ 
		//$('#breakbtn').text("break");
	    //alert(data);
	    var optval=data;
        //alert(optval);
        if (optval)
        {
	        $.post('Employee/breakstop', {brkval: optval}, function(data){
	        
			$('#breakbtn').text("Back To Work");
	        //alert(data);
	        });
	    }
	});
//=====================Disable Breaks On Page Load===========================
	$.post('Employee/disablebrk', function(data){
        if (data=='fbreak') 
		{
			$("#fbreak").prop('disabled', true);
		}
        if (data=='sbreak') 
		{
			$("#fbreak").prop('disabled', true);
			$("#sbreak").prop('disabled', true);
		}
		if (data=='lbreak') 
		{
			$("#fbreak").prop('disabled', true);
			$("#sbreak").prop('disabled', true);
			$("#lbreak").prop('disabled', true);
		}
	});
});
//======================Clock Button Value On Click==========================
$(document).ready(function(){
	$('#clockbtn').click(function(){
	  	var clockbtn = $('#clockbtn').text();
        //alert(clockbtn);
		if($('#clockbtn').text()=="Clock In")
		{
			//alert(clockbtn);
			$.post('Employee/clockin',{btn:clockbtn},function(data){
            $('#showattendance').html(data)
		    $('#clockbtn').text("Clock Out");
			});
		}
		else
		{   
			//alert('CLOCK OUT');
			$.post('Employee/clockout', {btn1:clockbtn},function(data){
            $('#clockintime').html(data)
		    $('#clockbtn').text("Clock In");
			});
		}
     });
});
//===========================Break Button On Clock===========================
$(document).ready(function(){	
	$('#breakbtn').click(function(){
	var opt = $('#opt').val();
		if($('#breakbtn').text()=="Break") 
		{
			if(opt)
			{	
			    $.post('Employee/breakstart', {brkval: opt}, function(data){
                 //alert(data);
	                if (data=='Enjoy Your Break & come back soon!') 
	                {
				      //==disable Breaks on click========= 
						if (opt=='fbreak') 
						{
							if (data) 
							{
								$("#fbreak").prop('disabled', true);
							}
						}
						if (opt=='sbreak') 
						{
							if (data)
							{
								$("#fbreak").prop('disabled', true);
								$("#sbreak").prop('disabled', true);
							}
						}
						if (opt=='lbreak') 
						{
						    if (data) 
						    {
						        $("#fbreak").prop('disabled', true);
								$("#sbreak").prop('disabled', true);
								$("#lbreak").prop('disabled', true);
							}
						}
	                    $('#breakmsg').html(data)
					    $('#breakbtn').text("Back To Work");
					}    
					else
					{
						$('#breakmsg').html(data)
					}
				});
			}
			else
			{
				$.post('Employee/breakstart',function(data){ 
			    $('#breakmsg').html(data)	
			    });
			}
	    }
		else
		{	
			$.post('Employee/breakback', function(data){ 
			$('#breakbtn').text("Break");
			//alert(data);
			var optval=data;
			//alert(optval);
				if (optval)
			    {
				     $.post('Employee/breakstop', {brkval: optval}, function(data){
				     $('#breakmsg').html(data);
				     });
				
			    }
			});  	
		}		
	});
});
//==============================================






