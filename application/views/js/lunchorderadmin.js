$(document).ready(function(){
    
	allorder();
	/*var empinfofunctions=setInterval(function(){
         
     allorder();

	},1000);*/
	function allorder(){
       
		
	    $.post(BASE_URL+'Admin/showorder', function(data){
		    	//alert(data);
	        if($.trim(data))
	        {
                var showdiv = "";
		   	    var data1=data.split("?");
			    for(i=0; i<data1.length-1; i++)
			    { 
			      data2= data1[i].split(",");
		          //alert(data2[0]);
		          showdiv +='<tr><td>'+data2[3]+'</td><td>'+data2[1]+'</td><td>'+data2[2]+'</td><td>'+data2[4]+'</td><td>'+data2[5]+'</td><td>'+data2[6]+'</td><td><button id="dlrlnh'+data2[0]+'" class="btn btn-danger btn-sm glyphicon glyphicon-trash" onclick="dlt('+data2[0]+')"></button></td><td><button class="btn btn-danger btn-sm glyphicon glyphicon-print"></button></td></tr>';
		          
		          //$('#lunchlist').append('<tr><td>'+data2[1]+'</td><td>'+data2[0]+'</td><td></td><td>'+data2[2]+'</td><td>'+data2[3]+'</td><td>'+data2[4]+'</td><td></td></tr>');
		        }
		        $('#nolunchorder').hide();
		        $('#lunchlist').html(showdiv);
		    }
		    else
		    {
		    
		    $('#placedordr').html('No Lunch Order!!!!');
		    }
	    });
    }
    
    window.dlt = function(orderid)
	{

        //alert(orderid);
        $.post(BASE_URL+'Admin/dltordr',{orderid1:orderid}, function(data){
          //alert(data);
          
          $('#deletelunch').modal('show');
          $('#lunchdeletmsg').html(data);
          allorder();
        });
    }

    $('#deletallorder').click(function(){
    	$('#cnfrmdltlunchorder').modal('show');
    });

    $('#yesdltall').click(function(){
       $('#cnfrmdltlunchorder').modal('hide');
       $.post(BASE_URL+'Admin/dltallordr',function(data){

        alert(data);
        allorder();
    	});
    	
    });

    $('#nodltall').click(function(){
       $('#cnfrmdltlunchorder').modal('hide');
    });

    $('#subempid').click(function(){
    	$('#shwmsg').empty();
    	var empployeeid=$('#enterempid').val();
       //alert(empployeeid);
       if($.trim(empployeeid))
       {
       	  $.post('Admin/')
          $('#shwmsg').html('Good');

       }
       else
       {
          $('#shwmsg').html('Enter The Employee Id Properly');
       }
    });

    $('#datepickerr').click(function(){

      $.post(BASE_URL+'Admin/hi', function(data){
        alert(data);
      })
      
    });
	
});