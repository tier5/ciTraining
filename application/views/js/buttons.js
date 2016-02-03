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
			$('#breakbtn').text("break");
		}
	});
});
//======================Clock Button Value On Click====================
$(document).ready(function(){
	$('#clockbtn').click(function(){
	  	var clockbtn = $('#clockbtn').val();
        //alert(clockbtn);
		if($('#clockbtn').text()=="Clock In")
		{
			//alert(clockbtn);
			$.post('Employee/clockin',{btn:clockbtn},function(data){
            $('#clockintime').html(data)
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
//===========================Break Button==============================
	$('#breakbtn').click(function(){
		//alert('hey');
		var opt = $('#opt').val();
		if (opt) 
		{
			//alert(opt1);
			if($('#breakbtn').text()=="break")
			{	
				$.post('Employee/breakstart', {brkval: opt}, function(data){
                $('#breakmsg').html(data)
				$('#breakbtn').text("Back To Work");
				});
			}

			else
			{	
			  
			  	//alert(opt);
				$.post('Employee/breakstop', {brkval: opt}, function(data){
                $('#breakmsg').html(data)
				$('#breakbtn').text("break");
				//$('#breakbtn').click(function(){
					//alert(data);
					/*if (data) 
					{*/
						//==disable fbreak on click========= 
						if (opt=='fbreak') 
						{
							if (data) 
							{
								$("#fbreak").prop('disabled', true);
							}
							else
							{
								$("#fbreak").prop('disabled', false);
							}
						}
						
						//alert(opt);
						//==disable sbreak on click========= 
						/*if (opt=='sbreak') 
						{
							if (data) 
							{
								$("#sbreak").prop('disabled', true);
							}
							else
							{
								$("#sbreak").prop('disabled', false);
							}
						}
						//==disable lbreak on click===========
						if (opt=='lbreak') 
						{
							if (data) 
							{
								$("#lbreak").prop('disabled', true);
							}
							else
							{
								$("#lbreak").prop('disabled', false);
							}
						}*/
						//====================disables break carry forward on page load=========
						//alert(opt);
						
							//alert(data);
							if (opt=='sbreak') 
							{
								if (data) {
								$("#fbreak").prop('disabled', true);
								$("#sbreak").prop('disabled', true);
								}
							}
						
							if (opt=='lbreak') 
							{
								if (data) {
								$("#fbreak").prop('disabled', true);
								$("#sbreak").prop('disabled', true);
								$("#lbreak").prop('disabled', true);
								}
		     				}
				});

			}
		}
		else 
		{
			$('#breakmsg').html('If you want to go for a break, please choose the break first.');
		}

	});
});
//==page load =====disable carry=========
$(document).ready(function(){
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
});
//=======================page load fbreak disable===============
$(document).ready(function(){
	//alert(data);
	$.post('Employee/breakdisable',function(data){

		//alert(data);
		if (data) 
		{
			$("#fbreak").prop('disabled', true);
		}
	});

});



