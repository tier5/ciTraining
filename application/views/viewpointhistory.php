<!DOCTYPE html>
<html lang="en">

<?php include 'lateviewheader.php';?>




<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

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
                <h1>Point History</h1>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
                <div class="col-lg-12">
                   
                   <div class="row">
                      <div class="col-sm-12">

                      <div id='cur_month'>
                      Month: <?php echo date('F');?>  </div>
                      
                      </br></br>

                          <div class="form-group col-md-4 pull-right">
                          <label for="sel1">Select Month:</label>
                          <select class="form-control" id="change_month">
                          <option value=''>Select</option>
                          <option value="1" data-title='January' <?php if(date('n')==1){echo 'selected';} ?>>January</option>
                          <option value="2" data-title='February' <?php if(date('n')==2){echo 'selected';} ?>>February</option>
                          <option value="3" data-title='March' <?php if(date('n')==3){echo 'selected';} ?>>March</option>
                          <option value="4" data-title='April' <?php if(date('n')==4){echo 'selected';} ?>>April</option>
                          <option value="5" data-title='May' <?php if(date('n')==5){echo 'selected';} ?>>May</option>
                          <option value="6" data-title='June' <?php if(date('n')==6){echo 'selected';} ?>>June</option>
                          <option value="7" data-title='July' <?php if(date('n')==7){echo 'selected';} ?>>July</option>
                          <option value="8" data-title='August' <?php if(date('n')==8){echo 'selected';} ?>>August</option>
                          <option value="9" data-title='September' <?php if(date('n')==9){echo 'selected';} ?>>September</option>
                          <option value="10" data-title='October' <?php if(date('n')==10){echo 'selected';} ?>>October</option>
                          <option value="11" data-title='Novembar' <?php if(date('n')==11){echo 'selected';} ?>>Novembar</option>
                          <option value="12" data-title='December' <?php if(date('n')==12){echo 'selected';} ?>>December</option>
                          </select>
                          </div>

                          <table class="table table-bordered" >
                            <thead>
                              <tr>

                                <td><strong>DATE</strong></td>
                                <td><strong>Name</strong></td>
                                <td><strong>USER NAME</strong></td>
                                <td><strong>Point</strong></td>
                               
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                            </tr>
                            </thead>
                            <tbody id='change_month_result'>
                           
                              <?php foreach($point_history as $points)
                              {
                                if($points['points']<=0)
                                {
                                  $cls='danger';
                                }
                                else
                                {
                                  if($points['points']>=3000)
                                    {
                                    $cls='success';
                                    }
                                    else
                                    {
                                       $cls='medium';
                                    }
                                }
                                $date_exp=explode(" ",$points['time_stamp']);
                                $p_date=date('d-m-Y',strtotime($date_exp[0]));
                                ?>
                              <tr>
                                <td class='<?php echo $cls;?>'><?php echo $p_date;?></td>
                                <td class='<?php echo $cls;?>'><?php echo $points['propname'];?></td>
                                <td class='<?php echo $cls;?>'><?php echo $points['name'];?></td>
                                <td class='<?php echo $cls;?>'><?php echo $points['points'];?></td>
                               
                              </tr>

                              <?php } ?>

                          
                            </tbody>
                          </table>

                    
                    </div>

                </div>
            </div>
        </div>
    </section>


     

  </body>
</html>