$(document).ready(function(){
	$('#shw').click(function(){
		//alert('hii');
		var btnv1=$('#shw').val();
		//alert(btnv1);
		if(btnv1)
		{
			$.post('showalldata', {btn: btnv1}, function(data){
                  $('#datashow').html(data);
              });
		}
	});

});