<!DOCTYPE html>
<html lang="en">
<?php include 'lateviewheader.php';?>
<head>
 <script src="<?php echo base_url().'application/views/js/attendancecost.js'?>"></script>


<style type="text/css">
.ui-datepicker-calendar {
    display: none;
 }





</style>
</head>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
          <div class="container">
              <div>
                 
                  <form action="<?php echo base_url().'Admin/logout'?>" method="post">
                      <input type="submit" value="logout" class="btn btn-default pull-right">
                  </form>
              </div>    
          </div>
    </nav>
    <?php include 'sideber.php';?>
 
    <section class="services-section">

          <div class="container"   align="center" >
               
              <form method="post" action="attendance_bonus"  align="center">
          
                 <label>Choose Month</label>
                 <input  type="hidden" id="datecheck" name="datecheck" value="">
                 <input   type="hidden" id="endofmonth" name="endofmonth" value="">
                  
                 <input id="myDate" name="myDate" class="monthYearPicker" value="<?php echo $current; ?>" />
                 
                
                 
                 <button type="submit">Click To Show</button>
                  
              </form>
          <br><br>

         </div>

         <div class="container">
  
               <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title" align ="left">
                          <a data-parent="#accordion">Expendature As Attendance Bonus</a>
                        </h4>
                        <span align="right"><?php echo $total_attendence_bonus;?></span>
                      </div>
                      
                        <div class="panel-body">
                          <?php if($allemployee) 
                          {?>
                          <table>
                            <tr>
                              <th>Name Of Employee</th>
                              <th>Points</th>
                            </tr>
                          <?php echo $allemployee; ?>
                          </table>
                          <?php }
                          else 
                            {?>
                           <label>No Recorde Available</label>
                           <?php }?>
                        </div>
                      
                    </div>
          </div>
           
    </section>
    

</body>
</html>



