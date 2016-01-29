$(document).ready(function(){
//======================Clock Button Value In Page Load====================
	$.post('Employee/buttonvalue',function(data){
	//alert(data);
		if ($.trim(data)) 
		{
			$('#clockbtn').text("Clock Out");
		}
		else
		{
			$('#clockbtn').text("Clock In");
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
				$("#"+opt).prop('disabled', true);
			 	$('#breakbtn').text("break");
			 	$('#breakmsg').html('Hope You have enjoyed your break');		 	 	
			}
		}
		else 
		{
			$('#breakmsg').html('Choose a break');
		}

	});
//================================================================================================
});