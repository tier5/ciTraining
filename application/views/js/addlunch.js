$(document).ready(function(){
var arr="";
var shopid="";
showallshop();
$("#newitem").hide();
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
                 // $('#errormsg').html("Shop Name Added Sucessfully!!");
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
     
      var shopid=shopid;
      jQuery.noConflict();
      showallitems ="";
      $('#shopitems').html("");
      $('#additems').modal('show');
      $("#newitem").hide();

      $.post(BASE_URL+'Admin/showshopname',{shopid:shopid}, function(data){
        $('#shopname').html(data);
      });
      showitemsall(shopid);

//=====================Add New Items========================================
       $("#addnewitems").click(function(){
        $("#newitem").show();
      
             //$('#shopname').html(data);
            $('#newitems').html("");
            $('#newcost').html("");
            $('#newlimit').html("");
            $("#add").click(function(){
               var newitems=$('#newitems').val();
               var newcost=$('#newcost').val();
               var newlimit=$('#newlimit').val();

               if($.trim(newitems) && $.trim(newcost) && $.trim(newlimit))
               {
                  $.post(BASE_URL+'Admin/additems',{parent:shopid,newitems:newitems,newcost:newcost, newlimit:newlimit}, function(data){
                   //alert(shopid);
                     if($.trim(data))
                     {
                        $('#errornew').html("Lunch Items Added Sucessfully!!");
                        $("#newitem").hide();
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
         
        
        });  
    }


//========================Delete Items====================================================================================
    window.deletitems = function(itemid)
    {
        $.post(BASE_URL+'Admin/deleteitems',{itemid:itemid}, function(data){  
             if($.trim(data))
            {
                
                      //showitemsall(shopid);  
            }
        });
    }
//=======================================================================================================================
 
function showitemsall(shopid)
{
  $.post(BASE_URL+'Admin/showitemsbyshop', {shopid:shopid}, function(data){
      if($.trim(data))
          {   
                
                var data1=data.split("/");
                for(i=0; i<data1.length-1; i++)
                { 
                      data2= data1[i].split(','); 
                      showallitems +='<tr><td>'+data2[1]+'</td><td>'+data2[2]+'</td><td>'+data2[3]+'</td><td><button class="glyphicon glyphicon-trash" onclick="deletitems('+data2[0]+')">Delete</button></td></tr>';
                      $('#shopitems').html(showallitems);
                }  
          }
         else
         {
               $("#showitem").hide();
               $('#errornew').html("No Items In The Shop!!");
          }

      });




}






});