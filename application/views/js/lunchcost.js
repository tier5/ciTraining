$(document).ready(function(){
$(function() {
  $('.monthYearPicker').datepicker({
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    dateFormat: 'MM yy',
    altField: '#datecheck',
    altFormat: 'dd-mm-yy'
  }).focus(function() {
    var thisCalendar = $(this);
    $('.ui-datepicker-calendar').detach();
    $('.ui-datepicker-close').click(function() {
var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
thisCalendar.datepicker('setDate', new Date(year, month, 1));
var start_date=$('#datecheck').val();

var dat_chk=start_date.split('-');

var date = new Date();
var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
var lastDay = new Date(dat_chk[2], dat_chk[1], 0);
var month1=lastDay.getMonth() + 1;
var day1=lastDay.getDate();
if(day1<10)
{
  day1='0'+day1;
}
if(month1<10)
{
  month1='0'+month1;
}
var end_date = (day1) + '-' + (month1) + '-' + lastDay.getFullYear();
//$('#end_date').html(end_date);
$('#endofmonth').val(end_date);

//alert(start_date);

//alert(end_date);
          
    });
  });
  
});





$('#selectshop_id').on('change', function() {
  var shopid= $("#selectshop_id").val();
  //alert(shopid);
  if(shopid)
  {
   $.post(BASE_URL+'Admin/getitembyshop',{shopid:shopid}, function(data){
     $('#item_of_employee').html(data);
      //alert(data)
    });
  }
  else
  {
    $('#item_of_employee').html("");
  }
});

 window.add = function(id,cost)
  {

      var btnvalue=$('#btnadd_'+id).val();
          var item=$('#item_name_'+id).text();
          var limit=$('#item_limit_'+id).val();
          var cost=$('#item_cost_'+id).text();
      if(btnvalue=='Add')
      {

          
          //calculation of cost
          var total_costof_lunch=parseInt($('#total_cost_lunch').text());
          var totalcost_per_item=parseInt(limit*cost);
          var cost_total=parseInt(total_costof_lunch+totalcost_per_item);
          //calculation of item
          var total_itemof_lunch=$('#total_item_lunch').text();
          var item_total=total_itemof_lunch+item+"["+limit+"]";
          //$('#total_item_lunch').html(item_total);
          $('#total_item_lunch').append('<span id="itemqty_'+id+'">'+item+'</span><span id="itm_'+id+'">('+limit+')</span>');
          //$('#total_item_lunch1').val('<span id="itemqty_'+id+'">'+item+'</span><span id="itm_'+id+'">('+limit+')</span>');
          $('#total_cost_lunch').html(cost_total);
          $('#btnadd_'+id).val('Remove');
          $('#item_limit_'+id).prop('disabled', true);

      }
      else
      {

           var total_costof_lunch=parseInt($('#total_cost_lunch').text());
           var totalcost_per_item=parseInt(limit*cost);
           var cost_total=parseInt(total_costof_lunch-totalcost_per_item);
           


           $('#itm_'+id).remove();
           $('#itemqty_'+id).remove();
           $('#total_cost_lunch').html(cost_total);
           $('#btnadd_'+id).val('Add');
           $('#item_limit_'+id).prop('disabled', false);
      }
     
  }


  

});


function lunchsubmit()
{
    var total_item_employee=$('#total_item_lunch').text();
    var total_cost_employee=$('#total_cost_lunch').text();
    //alert(total_cost_employee);
    $('#total_item_lunch1').val(total_item_employee);
    $('#total_cost_lunch1').val(total_cost_employee);
    $('#emp_lunch').submit();
}

function check_reset()
{
  // alert('RESET');
   $.post(BASE_URL+'Cronjob/insertemployee', function(data){
      
      alert(data)
    });



}

function lunch_update()
{
   //alert('uPDATE');
   $.post(BASE_URL+'Cronjob/callunchbonus', function(data){
      
      alert(data)
    });

}