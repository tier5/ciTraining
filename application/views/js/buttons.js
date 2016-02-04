$(document).ready(function(){
//======================Clock Button Value In Page Load====================
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
//=====================Break Button On Page Load=======================
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
//====================On page LOad Brak Select=======================
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
//==page load =====disable carry=========
	$.post('Employee/carrydisable', function(data){
		if (data=='lbreak') 
		{
			$("#fbreak").prop('disabled', true);
			$("#sbreak").prop('disabled', true);
			$("#lbreak").prop('disabled', true);
		}
		if (data=='sbreak') 
		{
			$("#fbreak").prop('disabled', true);
			$("#sbreak").prop('disabled', true);
		}
	});
//=======================page load fbreak disable===============
	$.post('Employee/breakdisable',function(data){

		//alert(data);
		if (data) 
		{
			$("#fbreak").prop('disabled', true);
		}
	});

});
//======================Clock Button Value On Click====================
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
//===========================Break Button==============================
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
			                //==disable fbreak on click========= 
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
//================================================		
	});
});
//==============================================
/*$(document).ready(function(){	
  if($('#breakbtn').text()=="Back To Work")
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
});*/





