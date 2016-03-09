$(document).ready(function(){
 /*setInterval(function(){
         
     allorder();

	},2000);*/
 allorder();
	function allorder(){
       
	    $.post(BASE_URL+'Admin/showorder', function(data){
		    	//alert(data);
	        if($.trim(data))
	        {
            $('#placedordr').show();
                var showdiv = "";
		   	    var data1=data.split("?");
			    for(i=0; i<data1.length-1; i++)
			    { 
			      data2= data1[i].split(",");
		          //alert(data2[0]);
		          showdiv +='<tr><td id="date_'+$.trim(data2[0])+'">'+data2[3]+'</td><td >'+data2[1]+'</td><td id="name_'+$.trim(data2[0])+'">'+data2[2]+'</td><td id="shop_'+$.trim(data2[0])+'">'+data2[4]+'</td><td  id="items_'+$.trim(data2[0])+'">'+data2[5]+'</td><td id="cost_'+$.trim(data2[0])+'">'+data2[6]+'</td><td><button id="dlrlnh'+data2[0]+'" class="btn btn-danger btn-sm glyphicon glyphicon-trash" onclick="dlt('+data2[0]+')"></button></td><td><button class="btn btn-danger btn-sm glyphicon glyphicon-print" onclick="myFunction('+data2[0]+')"></button></td><td><input type="checkbox" id="printselect_'+$.trim(data2[0])+'" onclick="prntselect('+data2[0]+')" value='+data2[0]+' name="print_check[]"></td></tr>';
		          
		          //$('#lunchlist').append('<tr><td>'+data2[1]+'</td><td>'+data2[0]+'</td><td></td><td>'+data2[2]+'</td><td>'+data2[3]+'</td><td>'+data2[4]+'</td><td></td></tr>');
		        }
		        $('#nolunchorder').hide();
		        $('#lunchlist').html(showdiv);
		    }
		    else
		    {
		    
		      $('#lunchlist').html('');
          $('#placedordr').hide();
		    }
	    });
    }
    
    window.dlt = function(orderid)
	  {
        //alert(orderid);
        $.post(BASE_URL+'Admin/dltordr',{orderid1:orderid}, function(data){
          //$('#deletelunchorder').modal('show');
          //$('#lunchdeletmsg').html(data);
          allorder();
        });
    }

    $('#yesdltall').click(function(){
       $.post(BASE_URL+'Admin/dltallordr',function(data){
        allorder();
    	});
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

    $("#selectdate").datepicker({dateFormat: "dd/mm/yy",
        onSelect: function(date)
        {
        //alert(date);
        $('#placedordr').show();
          $.post(BASE_URL+'Admin/showorder', {optdate:date}, function(data){
              if($.trim(data))
              {
                var showdiv = "";
                var data1=data.split("?");
                for(i=0; i<data1.length-1; i++)
                { 
                  data2= data1[i].split(",");
                    //alert(data2[0]);
                    showdiv +='<tr><td id="date_'+$.trim(data2[0])+'">'+data2[3]+'</td><td >'+data2[1]+'</td><td id="name_'+$.trim(data2[0])+'">'+data2[2]+'</td><td id="shop_'+$.trim(data2[0])+'">'+data2[4]+'</td><td  id="items_'+$.trim(data2[0])+'">'+data2[5]+'</td><td id="cost_'+$.trim(data2[0])+'">'+data2[6]+'</td><td><button id="dlrlnh'+data2[0]+'" class="btn btn-danger btn-sm glyphicon glyphicon-trash" onclick="dlt('+data2[0]+')"></button></td><td><button class="btn btn-danger btn-sm glyphicon glyphicon-print" onclick="myFunction('+data2[0]+')"></button></td></tr>';
                    
                }
                $('#nolunchorder').hide();
                $('#lunchlist').html(showdiv);
              }
              else
              {
                $('#lunchlist').html('');
                $('#placedordr').hide();
              }
          });
        },
    });

    window.myFunction = function(orderid1)
    {
      $("#printsingleorder").modal('show');
      var name=($('#name_'+orderid1).text());
      var date=($('#date_'+orderid1).text());
      var shop=($('#shop_'+orderid1).text());
      var cost=($('#cost_'+orderid1).text());
      var items=($('#items_'+orderid1).text());
     // alert(name);
      //alert(date);
      //alert(shop);
      //alert(cost);
      //alert(items);
      
      $('#empname').html(name);
      $('#emplunch').html(items);
      $('#empdate').html(date);
      $('#empcost').html(cost);
      $('#empshop').html(shop);
      
    
    }

    
    $('#printfinal').click(function(){
      var divContents = $("#printdiv").html();
      //alert(divContents);
      var printWindow = window.open('', '', 'height=400,width=800');
      printWindow.document.write(divContents);
      printWindow.document.close();
      printWindow.print();

    });



      
        $( "#printfinalAll" ).bind( "click", function() {
      
      var divContents = $("#print_all").html();
      //alert(divContents);
      var printWindow = window.open('', '', 'height=400,width=800');
      //printWindow.document.write('<html><head><title>DIV Contents</title>');
      //printWindow.document.write('</head><body >');
      printWindow.document.write(divContents);
      //printWindow.document.write('</body></html>');
      printWindow.document.close();
      printWindow.print();

    });




$('#printorder').click(function() {
  
   $.ajax({

                type:'POST',
                
                url:'FnfetchAllOrder',
                success:function(result)
                {
                   $('#printorderall').modal('show');
                   $('#print_all').html(result);
                }

             });
});
  
 

   
    window.prntselect = function(orderid2)
    {
         //alert(orderid2);
         if($("#printselect_"+orderid2).prop('checked') == true)
         {
          //alert(orderid2);
         }
         else
         {
          //alert('kjsf')
         }
   }


   
   $('#printselected').click(function() {
   
    
    
        $('input[name="print_check[]"]:checked').each ( function() {
        var id= $(this).val();
        //alert(id);

            $.post(BASE_URL+'Admin/selectprint', {orderid:id}, function(data){
             alert(data);

                   //$('#printorderall').modal('show');
                   //$('#print_all').html(data);
                
            
               












            });
        });
   });
  
});