<!DOCTYPE html>
<html lang="en">

<?php include 'lateviewheader.php';?>




<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" onload='fetch_time();'>

<?php include 'navbar.php';?>

    <div id="test" data-status='opened'>
         <div class="user">
          <img src="http://image.priceprice.k-img.com/ph/images/common/face_japan_01.gif" alt="Esempio" class="img-thumbnail">
          <a target="_blank" class="navbar-link">Admin</a>
        </div>
        <div class="list-group">
          <a class="list-group-item1"  href="<?php echo base_url()?>">Home</a>
          <a class="list-group-item1" href="<?php echo base_url();?>Admin#contact">Employee's Late</a>
          <a class="list-group-item1" href="<?php echo base_url();?>Admin#employeelate">Show all Employee</a>

          <a  class="list-group-item1" href="<?php echo base_url();?>Admin/showAllLateview">Employee's All Late Information</a>
          <a class="list-group-item1" href="lunchorderview">Lunch Order</a>
          <a class="list-group-item1" href="addEventview">Event</a>
          <a class="list-group-item1 active" href="ShowPointHistory">Point History</a>
          <a class="list-group-item1" href="logout">Logout</a>
         
       </div>
    


  
  </div>


<section id="contact" class="services-section">
          <div class="container">
            <div class="row">
                <h1>Employees Productivity</h1>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
                <div class="col-lg-12">
                   
                   <div class="row">
                      <div class="col-sm-12">

                      <div id='cur_month'>
                      Date: <?php echo date('d/m/Y');?>  </div>
                      
                      </br></br>
                        <?php
                        $new_array=array();
                        foreach ($All_product as $value) { 
                          if($value['status']==1){
                          array_push($new_array,$value['Eid'].'-'.$value['startTime']);
                          }
                        }
                        $string=implode(',',$new_array);
                        ?>
                        <input type='hidden' id='eid' value='<?php echo $string;?>'>
                         <input type="button" value="Change Date" id="datepicker" class="btn btn-warning productivity_cal pull-right">
                          <div class="form-group col-md-4 pull-left">
                          
                          <label for="sel1">Select Month:</label>
                          <select class="form-control" id="change_month_pro">
                          <option value=''>Select</option>
                          <option value="1" data-title='January'>January</option>
                          <option value="2" data-title='February'>February</option>
                          <option value="3" data-title='March'>March</option>
                          <option value="4" data-title='April'>April</option>
                          <option value="5" data-title='May'>May</option>
                          <option value="6" data-title='June'>June</option>
                          <option value="7" data-title='July'>July</option>
                          <option value="8" data-title='August'>August</option>
                          <option value="9" data-title='September'>September</option>
                          <option value="10" data-title='October'>October</option>
                          <option value="11" data-title='Novembar'>Novembar</option>
                          <option value="12" data-title='December'>December</option>
                          </select>
                          </div>

                          <table class="table table-bordered tbl_old">
                            <thead>
                              <tr>

                                <td><strong>DATE</strong></td>
                                <td><strong>Name</strong></td>
                                <td><strong>USER NAME</strong></td>
                                <td><strong>ClockIn</strong></td>
                                <td><strong>Clockout</strong></td>
                                <td><strong>Field</strong></td>
                                <td><strong>Total time <br>(hh:mm:ss)</strong></td>
                               
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                            </tr>
                            </thead>
                            <tbody id='change_result'>
                             <?php foreach ($All_product as $value) { 

                                if($value['type']==1)
                                {
                                  $dep='Production';
                                }
                                elseif($value['type']==2)
                                {
                                  $dep='R&D';
                                }
                                elseif($value['type']==3)
                                {
                                  $dep='Training';
                                }
                                else
                                {
                                  $dep='Administrative';
                                }

                                if($value['status']==0){
                                  $diff=strtotime($value['endTime'])-strtotime($value['startTime']);
                                  if($diff>=3600)
                                  {
                                    $h=round($diff/3600);
                                    if($h<10)
                                    {
                                      $h='0'.$h;
                                    }
                                    $m=round(($diff%3600)/60);
                                      if($m<10)
                                    {
                                      $m='0'.$m;
                                    }
                                    $s=round(($diff%3600)%60);
                                      if($s<10)
                                    {
                                      $s='0'.$s;
                                    }
                                    $str=$h.':'.$m.':'.$s;
                                  }
                                  else
                                  {
                                    $m=round($diff/60);
                                      if($m<10)
                                    {
                                      $m='0'.$m;
                                    }
                                    $s=round($diff%60);
                                      if($s<10)
                                    {
                                      $s='0'.$s;
                                    }
                                   $str='00:'.$m.':'.$s; 
                                  }
                                }
                                else
                                {
 
                                  $str='';
                                }
                                if($value['status']==0)
                                {
                                  $con='inactive';

                                }
                                else
                                {
                                  $con='active';
                                }
                              ?>
                                         <tr>
                                         <td><?php echo date('d-m-Y',strtotime($value['date']));?></td>
                                         <td><?php echo $value['propname'];?></td>
                                         <td><?php echo $value['name'];?></td>
                                         <td><?php echo date('H:i:s',strtotime($value['startTime']));?></td>
                                         <td><?php if($value['status']==0){ echo date('H:i:s',strtotime($value['endTime']));} else {echo '---';}?></td>
                                         <td><?php echo $dep;?></td>
                                         <td class='<?php echo $con;?>' value="<?php echo $value['startTime'];?>" id='col_<?php echo $value['Eid'].$con ?>'><?php echo $str;?></td>
                                         </tr>
                                         
                            <?php   } ?>
                          
                            </tbody>
                          </table>
                                            
                          <table class="table table-bordered" id='new_tbl'>
                          </table>
                    
                    </div>

                </div>
            </div>
        </div>
    </section>


     

  </body>
</html>