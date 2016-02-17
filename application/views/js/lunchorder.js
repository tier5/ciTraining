$(document).ready(function(){
	var selectedshopid="";
//===============================================
	$('#lunchorder').click(function(){
	$('#lunchModal').modal('show');
	//alert('Lunch Lunch Lunch');
	    $.post('Employee/shopoption', function(data){
	  		
			var newdata=data.split("/");
			for (i = 0; i < newdata.length-1; i++)
			{
				data1 = newdata[i].split(',');
				$('.modal-body-tab1').append("<br/>"+'<input type="radio" id="selectshop" onclick="a('+data1[0]+')" name="selectshop">'+data1[1]);
				$('.modal-body-tab2').hide();
			}
					  	/*$('#next').click(function(){
					  	 $('.modal-body-tab1').hide();
					  	 $('.modal-body-tab2').show();*/
					  	 
					  	//}); 
		     //var shopoption=('#selectshop').html();
		   	 
	    });
		
		$('#closelunch').click(function(){
		$('.modal-body-tab1').html("");
		});

	});
//============================================
    /*$('body').click(function(){
	$('.modal-body-tab1').html("");	
	});*/


	window.a = function(shopid)
	{
		
	    //alert(b);
	    selectedshopid=shopid;
	    //$('.modal-body-tab1').html('select item');
	    $.post('Employee/itemoption',{shopopt:selectedshopid},function(data){
          	var data1=data.split("/");
          	for(i=0; i<data1.length-1; i++)
          	{ 
          		$('.modal-body-tab1').hide();
          		data2= data1[i].split(',');
          		

          		$('.modal-body-tab2').append("</br>"+'<input type="checkbox" >'+data2[1]);
          		          	//alert(data1);
          	
          	  //var data2=data1.split(",");
             //$('.modal-body-tab1').hide();
             //$('.modal-body-tab2').append("</br>"+'<input type="checkbox" >'+data2[1]);
             
          	}

          });


		
	}


});