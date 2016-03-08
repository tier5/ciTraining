$(document).ready(function(){
var arr="";
var shopid="";
showallshop();

//=============================Showing All Shop==================================
  function showallshop()
   {
  		$.post(BASE_URL+'Admin/showshop', function(data){
  		    if($.trim(data))
  		    {     
  		      showallshop = "";
  		      var data1=data.split("/");
  		      for(i=0; i<data1.length-1; i++)
  		        { 
  		            data2= data1[i].split(',');
  		            var arr = [data2[0],data2[1]];
  		            showallshop +='<tr><td><button class="btn btn-info btn-sm" onclick="lunchshopid('+data2[0]+');">'+data2[1]+'</td><td><button class="btn btn-danger btn-xs" onclick="deleteshop('+data2[0]+')" >Delete Shop</button></td></tr>';
  		            $("#showallshop").html(showallshop);
  		        }
  		    }     
  		});
    }


    
//==============================Add New Shop=====================================================
    $('#addshopname').click(function(){
         var newshop=$('#newshopname').val();
         if($.trim(newshop))
         {
           $.post(BASE_URL+'Admin/addshop',{addshop:newshop}, function(data){
              
              if($.trim(data))
              {
                  window.location.reload();
                  //showallshop();
                  //alert('added shop');
                  //showallshop();
                  //$('#errormsg').html("Shop Name Added Sucessfully!!");
              }
              else
              {
                  $('#errormsg').html("Try Again!!");
              }
           });
         }
         else
         {
            $('#errormsg').html("Enter The Shop Name!");
         }
    });
//============================Delet Shop=============================================================
    window.deleteshop = function(selectedshopid)
    {
      jQuery.noConflict();
      $('#deletconfm').modal('show');
         $('#yesdltshop').click(function(){
           //alert(selectedshopid);
           $('#deletconfm').modal('hide');
           $.post(BASE_URL+'Admin/deleteshop',{shopid:selectedshopid}, function(data){
              if($.trim(data))
              {   
                  window.location.reload();
                  //$('#errormsg').html("Sucessfully Deleted The Shop!");    
              }
         });
      });
    }
//================= Show Items according to Shop=======================================================
    window.lunchshopid = function(shopid)
    {
      GLOBAL_SHOPID=shopid;
      //alert(GLOBAL_SHOPID);
      jQuery.noConflict();
      $( "#newitemdiv" ).hide();
     // alert(shopid);
      $('#errornew').html("");
      $.post(BASE_URL+'Admin/showitemsbyshop', {shopid:GLOBAL_SHOPID}, function(data){
         

      if($.trim(data))
          {   
                $("#showitemofshop").show();
                $("#addnew").show();
                

               //alert(data); 
               showallitems="";
                var data1=data.split("/");
                for(i=0; i<data1.length-1; i++)
                { 
                      data2= data1[i].split(','); 

                      showallitems +='<tr><td>'+data2[1]+'</td><td>'+data2[2]+'</td><td>'+data2[3]+'</td><td><button class="glyphicon glyphicon-trash btn btn-danger" onclick="deletitems('+data2[0]+')"></button></td></tr>';
                     // showallitems +='<tr><td>ji</td></tr>'
                      $('#itemaccrodingshop').html(showallitems);
                }
          
                

          }
          else
          {
            $("#addnew").show();
            $("#showitemofshop").hide();
          }
      });

      $.post(BASE_URL+'Admin/showshopname', {shopid:GLOBAL_SHOPID}, function(data){
          var spnme=data;
          $("#shpnm").html(spnme);
      });
  }

  //========================Delete Items====================================================================================
    window.deletitems = function(itemid)
    {
        $.post(BASE_URL+'Admin/deleteitems',{itemid:itemid}, function(data){  
             if($.trim(data))
            {
              $('#errornew').html("Lunch Item Deleted Sucessfully!!");
                $.post(BASE_URL+'Admin/showitemsbyshop', {shopid:GLOBAL_SHOPID}, function(data){
          
                  if($.trim(data))
                  {   
                    $("#showitemofshop").show();
                    $("#addnew").show();
                   //alert(data); 
                   showallitems="";
                    var data1=data.split("/");
                    for(i=0; i<data1.length-1; i++)
                    { 
                          data2= data1[i].split(','); 

                          showallitems +='<tr><td>'+data2[1]+'</td><td>'+data2[2]+'</td><td>'+data2[3]+'</td><td><button class="glyphicon glyphicon-trash btn btn-danger" onclick="deletitems('+data2[0]+')"></button></td></tr>';
                         // showallitems +='<tr><td>ji</td></tr>'
                          $('#itemaccrodingshop').html(showallitems);
                    }  
                 }
                  else
                  {
                    $("#addnew").show();
                    $("#showitemofshop").hide();
                  }
              });
              

                      //showitemsall(GLOBAL_SHOPID); 
                    //$('#errornew').html("Item Deleted Successfully!!"); 
            }
        });
    }
//=====================Add New Items========================================
$( "#addnewitems" ).click(function() {
  
            $('#newitems').val("");
            $('#newcost').val("");
            $('#newlimit').val("");
            $( "#newitemdiv" ).toggle();
});
//========================On Click On "ADD" bUTTON========================================================================
  $("#add").click(function(){

     //alert(GLOBAL_SHOPID);
              var newitems=$('#newitems').val();
              var newcost=$('#newcost').val();
              var newlimit=$('#newlimit').val();
                 
                 if($.trim(newitems) && $.trim(newcost) && $.trim(newlimit))
                 {
                  $.post(BASE_URL+'Admin/additems',{parent:GLOBAL_SHOPID,newitems:newitems,newcost:newcost, newlimit:newlimit}, function(data){
                   //alert(shopid);
                      if($.trim(data))
                        {   
                            $('#errornew').html("Lunch Items Added Sucessfully!!");
                            $('#newitems').val("");
                            $('#newcost').val("");
                            $('#newlimit').val("");
                            $( "#newitemdiv" ).toggle();

                               $.post(BASE_URL+'Admin/showitemsbyshop', {shopid:GLOBAL_SHOPID}, function(data){
                            
                                  if($.trim(data))
                                  {   
                                      $("#showitemofshop").show();
                                      $("#addnew").show();
                                     //alert(data); 
                                     showallitems="";
                                      var data1=data.split("/");
                                      for(i=0; i<data1.length-1; i++)
                                      { 
                                            data2= data1[i].split(','); 

                                            showallitems +='<tr><td>'+data2[1]+'</td><td>'+data2[2]+'</td><td>'+data2[3]+'</td><td><button class="glyphicon glyphicon-trash btn btn-danger" onclick="deletitems('+data2[0]+')"></button></td></tr>';
                                           // showallitems +='<tr><td>ji</td></tr>'
                                            $('#itemaccrodingshop').html(showallitems);
                                      }  
                                   }
                                });

                     }
                     else
                     {
                         $('#errornew').html("Try Again!!");
                     } 
                  });
                }
                else
                {
                  $('#errornew').html("Fill All Fields Properly!!");
                }
  });


  /*$("#add").click(function(){
              var newitems=$('#newitems').val();
              var newcost=$('#newcost').val();
              var newlimit=$('#newlimit').val();
                 
                 if($.trim(newitems) && $.trim(newcost) && $.trim(newlimit))
                 {
                  $.post(BASE_URL+'Admin/additems',{parent:shopid,newitems:newitems,newcost:newcost, newlimit:newlimit}, function(data){
                   //alert(shopid);
                     if($.trim(data))
                     {  
                        //$('#errornew').html("Lunch Items Added Sucessfully!!");
                        $("#newitemdiv").hide();
                        showitemsall(GLOBAL_SHOPID);
                        $('#errornew').html("Lunch Items Added Sucessfully!!");
                        $("#showitem").show(); 

                     }
                     else
                     {
                         $('#errornew').html("Try Again!!");
                     } 
                  });
                }
                else
                {
                  $('#errornew').html("Fill All Fields Properly!!");
                }
  });

  }
//=======================================================================================================================
 
function showitemsall(GLOBAL_SHOPID)
{
  $('#shopitems').html("");
  var showallitems="";
  




}
*/





});