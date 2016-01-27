$(document).ready(function(){

	$('#adminsigdfsdn').click(function(){//for admin login modal

		var name = $('#adminname').val();

		var password = $('#adminpassword').val();

		$.post('Dashboard/adminlogin',{name: name, password: password}, function(data){
			
			$('body').html(data);
			
		});

	});

});