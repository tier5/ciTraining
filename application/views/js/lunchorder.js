$(document).ready(function(){
	var selectedshopid="";
	var arr="";
	
	//var totaldiv="";

//=======================firstdiv Show=====================
function showfirstdiv()
{
	$('.modal-body-tab1').html(""); 
	$.post('Employee/shopoption', function(data){
			var newdata=data.split("/");
			for (i = 0; i < newdata.length-1; i++)
			{
				data1 = newdata[i].split(',');
				//var arry=[data1[0],data1[1]];
				$('.modal-body-tab1').append("<br/><br/>"+'<input type="button" class="btn btn-warning btn-lg" id="selectshop_'+$.trim(data1[0])+'" onclick="a('+data1[0]+')" name="selectshop" value="'+data1[1]+'">');
			    
			}
	});
}
//=================="Lunch Order" button click======================
	$('#lunchorder').click(function(){
		$('.err_msg').html('');
		$('#lunchModal').modal('show');
		$('.modal-body-tab1').show();
		showfirstdiv();
		
			$('.modal-body-tab3').hide();
        	$('.modal-body-tab2').hide();
		
		/*$('.modal-body-tab3').hide();
        $('.modal-body-tab2').hide();
        //location.reload();*/
        //alert("hello");

	});
//==========================Onclick for Shop option=======================================================================================================
	window.a = function(shopid)
	{
		
		  var totaldiv="";
		    $('#totalitem').empty();
		    $('#totalcost').html("0");
	        $('.modal-body-tab1').hide();
	        $('.modal-body-tab2').show();
	        //var shopName=$('#selectshop_'+id).text();
		    $.post('Employee/itemoption',{shopopt:shopid},function(data){  
	         
	         if($.trim(data)){
				          	var data1=data.split("+");
				          	for(i=0; i<data1.length-1; i++)
				          	{ 
				          		data2= data1[i].split(',');
				          		//alert(data2);
				          		var arr = [data2[0],data2[2]];
				          		console.log(arr);
				                
				                
				                 var limit=data2[3];
				                 //alert(limit);
				                 var options="";
				                 for(y=1;y<=limit;y++)
				                 {
				                 	//console.log(limit);
				                 	options+='<option>'+y+'</option>';
				                 	//limit--;
				                 }
				                 console.log('finished');
				          		totaldiv +='<tr><td><input value="Add"  class="btn btn-warning btn-sm" type="button" id="btnadd_'+$.trim(data2[0])+'" onclick="b('+arr+')"></td><td id="itemname_'+$.trim(data2[0])+'">'+data2[1]+'</td><td id="itemcost_'+$.trim(data2[0])+'">'+data2[2]+'</td><td><select id="itemquantity_'+$.trim(data2[0])+'">'+options+'</select></td></tr>';
				          	    $('#orderbody').html(totaldiv);
				      
				          	}
				}
				else
				{
					$('#orderbody').empty();

				}        
				       
	        });
            
            
		    $.post('Employee/shopname',{shopopt:shopid},function(data){ 
	        //alert(data);
	        $('#shpname').text(data);
		    });
		    

	}
//================================Onclick of "Add/Remove" Button======================================================================================================================================================================================================
	window.b = function(id,cost)
	{
			var itemname=$('#itemname_'+id).text();
			var btnvalue=$('#btnadd_'+id).val();
			var itemquantity = $('#itemquantity_'+id).val();
			var itemcost = cost;
           
			newcost = itemquantity*itemcost;
			totalcost = $('#totalcost').text();
			totalcost = parseInt(totalcost);
			itemquantity=parseInt(itemquantity);
			totalitem = $('#totalitem').text();

			if(btnvalue=='Add')
			{
                    totalcost = totalcost + newcost;
                    if(totalcost>100)
                  	{
                  		
                  		$('.err_msg').css('color','red');
                  		$('.err_msg').html('Your Order Cost Cannot Be More Than 100/-');
                  	}
                  	else
                  	{
                  		$('.err_msg').html('');
                  	}
					$('#totalcost').text(totalcost);
				    $('#btnadd_'+id).val('Remove');
				    $('#totalitem').append('<span id="itemqty_'+id+'">('+itemquantity+')</span><span id="itm_'+id+'">'+itemname+'</span>');
				    $('#itemquantity_'+id).prop('disabled', true);
			}

			else
			{
                   totalcost = totalcost - newcost;
                  	if(totalcost<=100)
                  	{
                  		$('.err_msg').html('');
                  	}
                   $('#itm_'+id).remove();
                   $('#itemqty_'+id).remove();
                   $('#btnadd_'+id).val('Add');
				   $('#totalcost').text(totalcost);
				   $('#itemquantity_'+id).prop('disabled', false);

			}	
	}
//================================On "Prev" button Click===============
	 $('#prev').click(function(){
        $('.modal-body-tab1').show();
		showfirstdiv();
		$('#totalitem').empty();
		$('#totalcost').html("00");
		$('.modal-body-tab2').hide();
		$('#orderbody').empty();

	});


	$('#suborder').click(function(){
		   var shopname=$('#shpname').text();
		   var lunchitm=$('#totalitem').text();
		   var finalcost=$('#totalcost').text();
		    if($.trim(lunchitm))
		    {
		    	if(finalcost>100)
		    	{
		    		$('#lunchModal').animate({scrollTop : 0},800);
		    		
					$('.err_msg').css('color','red');
					$('.err_msg').html('Your Order Cost Cannot Be More Than 100/-');
  

					
		    	}
		    	else
		    	{
                  
			        $.post('Employee/submitorder',{shopname:shopname, lunchitm:lunchitm, finalcost:finalcost },function(data){
			       //alert(data);
			       $('#lunchorder').prop('disabled', true);
			         if ($.trim(data))
			         {
			            $('.modal-body-tab3').show();
					    $('.modal-body-tab2').hide();
					    $('#confirmorder').html("Lunch Order Placed Successfully!!!!!");
					    $('#totalitem').empty();
					    $('#totalcost').html("0");	
			         }
			         else
			         {
			            $('.modal-body-tab3').show();
					    $('.modal-body-tab2').hide();
					    $('#confirmorder').html("You Have Already Placed Your Lunch Order!!!! ");	
			            $('#totalitem').empty();
					    $('#totalcost').html("0");	
			         }
		            });
                }
		    }
		    else
		    {
		    	//$('#emptyorder').modal('show');
		    	$('#lunchModal').animate({scrollTop : 0},800);
		    	$('.err_msg').css('color','red');
		    	$('.err_msg').html('Atleast Select One Item');
		    }
	});
//================================================================================ 
});