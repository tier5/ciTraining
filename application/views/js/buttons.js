$(document).ready(function(){

		$("#submit").click(function(){

			var name = $("#name").val();

			var password = $("#password").val();

			var submit = $("#submit").val();

			name = $.trim(name);

			password = $.trim(password);

			//$("#show").text("hello");

			if(name && password)
			{
				$.post('Register/login',{name: name, password: password,submit: submit}, function(data){

					//alert(data);
					$("body").html(data);
					//return false;
				});
			}

		});

	});