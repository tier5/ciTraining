$(document).ready(function(){
    
   
	
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

//====================================================

	/*$('#breakbtn').click(function(){

		var opt = $('#opt').val();

		if(opt)
		{
			if($('#clockbtn').text()=="Clock In")
			{
				$('#clockbtn').text("Clock Out");
			}

			else
			{
				 $('#clockbtn').text("Clock In");
			}
			$("#"+opt).prop('disabled', true);
		}

		else
		{
			alert("enter a valid choice");
		}

	});*/
//================================================================

	$('#breakbtn').click(function(){
		//alert('hey');
		var opt = $('#opt').val();

		if (opt) 
		{
			
			//alert(opt1);

			if($('#breakbtn').text()=="break")
			{	
				$('#breakmsg1').html('Enjoy Your Break come back soon!');
				$('#breakbtn').text("work");
				var opt1 = $('#opt').val();
				var btn= $('#breakbtn').text();
				
				$.post('Employee/breakload',{opt: opt1, btn: btn},function(data){
					$('#breakmsg').html(data);
					//alert(data);
				});
				
				//var opt= $('#opt').val();
				//var opt= $('#opt1').val();
			}

			else
			{	
				
					$("#"+opt).prop('disabled', true);
			 		$('#breakbtn').text("break");
			 		$('#breakmsg1').html('Hope You have enjoyed your break');
			 		$.post('Employee/breakunload',{opt: opt}, function(data){
			 			//alert(data);
			 			$('#breakmsg1').html(data);
			 		});
			 	
			}
		}
		else 
		{
			$('#breakmsg').html('Choose a break');
		}

	});
	//================break selection after retrun from break=================

	$('#breakbtn').click(function(){

		//alert("test");

	});
});