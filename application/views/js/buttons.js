$(document).ready(function(){
//======================Clock Button Value In Page Load====================
	$.post('Employee/buttonvalue',function(data){

		if ($.trim(data)) 
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

		if ($.trim(data)) 
		{
			$('#breakbtn').text("work");
		}
		else
		{
			$('#breakbtn').text("break");
		}
	});

//======================Clock Button Value On Click====================
	  $('#clockbtn').click(function(){

		if($('#clockbtn').text()=="Clock In")
		{
	
			$('#clockbtn').text("Clock Out");
		}

		else
		{
			 $('#clockbtn').text("Clock In");
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
				$('#breakbtn').text("work");
				});
			}

			else
			{	
				//alert(opt);
				$.post('Employee/breakstop', {brkval: opt}, function(data){
                //$('#breakmsg').html(data)
				//$('#breakbtn').text("break");
				//$('#breakbtn').click(function(){
					//alert(data);
					if (data) 
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

				//});
				//alert(data);
				});
				//$("#"+opt).prop('disabled', true);
			 	//$('#breakbtn').text("break");
			 	//$('#breakmsg').html('Hope You have enjoyed your break');		 	 	
			}
		}
		else 
		{
			$('#breakmsg').html('Choose a break');
		}

	});
});
//===================================page load fbreak disable=============================================================
$(document).ready(function(){
	$.post('Employee/breakdisable',function(data){
		if (data) 
		{
			$("#fbreak").prop('disabled', true);
		}
		else
		{
			$("#fbreak").prop('disabled', false);
		}
		

	});
});

