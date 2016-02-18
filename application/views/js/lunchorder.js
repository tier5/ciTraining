$(document).ready(function(){
	var selectedshopid="";
	var dbstring="";
	var dbstring1="";
	//var totaldiv="";

//=======================firstdiv Show=====================
function shawfirstdiv()
{
	$('.modal-body-tab1').html(""); 
	$.post('Employee/shopoption', function(data){
			var newdata=data.split("/");
			for (i = 0; i < newdata.length-1; i++)
			{
				data1 = newdata[i].split(',');
				//var array=[data1[0],data1[1]];
				$('.modal-body-tab1').append("<br/>"+'<input type="radio" id="selectshop_'+$.trim(data1[0])+'" onclick="a('+data1[0]+')" name="selectshop">'+data1[1]);
			}
	});
		
    $('#closelunch').click(function(){
	  $('.modal-body-tab1').html("");
	});
}
//=================="Lunch Order" button click======================
	$('#lunchorder').click(function(){
		$('#lunchModal').modal('show');
		shawfirstdiv();
		$('.modal-body-tab3').hide();
        $('.modal-body-tab2').hide();

	});
//==========================Onclick for Shop option=======================================================================================================
	window.a = function(shopid)
	{
	    selectedshopid=shopid;
        var totaldiv="";
	    $.post('Employee/itemoption',{shopopt:selectedshopid},function(data){  	
          	$('.modal-body-tab1').hide();
          	$('.modal-body-tab2').show();
          	var data1=data.split("/");
          	for(i=0; i<data1.length-1; i++)
          	{ 
          		data2= data1[i].split(',');
          		//alert(data2);
          		var arr = [data2[0],data2[2]];

          		console.log(arr);

          		totaldiv +='<tr><td><input value="Add" type="button" id="btnadd_'+$.trim(data2[0])+'" onclick="b('+arr+')"></td><td id="itemname_'+$.trim(data2[0])+'">'+data2[1]+'</td><td id="itemcost_'+$.trim(data2[0])+'">'+data2[2]+'</td><td><input type="text" value=1 id="itemquantity_'+$.trim(data2[0])+'"></td></tr>';
          	    $('#orderbody').html(totaldiv);
          	}
          });	
	}
//================================Onclick of "Add/Remove" Button======================================================================================================================================================================================================
	window.b = function(id,cost)
	{
		if($('#itemquantity_'+id).val())
		{
			var ItemName=$('#itemname_'+id).text();
			var btnvalue=$('#btnadd_'+id).val();
			
			
			//alert(dbstring1);
			//alert(ItemName);

			if(btnvalue=='Add')
			{
				$('#btnadd_'+id).val('Remove');
				//predbstring1=dbstring1;
				//dbstring1=dbstring1+ItemName;

			}
			else
			{
				$('#btnadd_'+id).val('Add');
				//dbstring1=predbstring1;
			}

			var itemquantity = $('#itemquantity_'+id).val();
			var itemcost = cost;
			
			newcost = itemquantity*itemcost;

			totalcost = $('#totalcost').text();

			totalcost = parseInt(totalcost);

			if(btnvalue=='Add')
			{
				totalcost = totalcost + newcost;

			}

			else
			{
				totalcost = totalcost - newcost;
			}
			

			$('#totalcost').text(totalcost);
			//$('#totalitem').text(dbstring1);
		}
	}
//================================On "Prev" button Click===============
    $('#next').click(function(){
    	$('.modal-body-tab3').show();
    	$('.modal-body-tab2').hide();

		//shawfirstdiv();
		//$('.modal-body-tab2').hide();

    

	});
	 $('#prev').click(function(){
  
        $('.modal-body-tab1').show();
		shawfirstdiv();

		$('.modal-body-tab2').hide();

    

	});
//================================================================================ 
});