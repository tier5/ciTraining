<!DOCTYPE html>
<html lang="en">
<?php include 'lateviewheader.php';?>
<head>
 
 

   <script src="<?php echo base_url().'application/views/js/lunchcost.js'?>"></script>





 
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
        <div class="row">
           <div class="col-sm-4"></div>
           <div class="col-sm-4"></div>
           <div class="col-sm-4">

               <label for="myDate">Choose Month</label>
              <form method="post" action="Lunchcost" >
               <br><input type="hidden" id="datecheck" name="datecheck" value="">
               <input type="hidden" id="endofmonth" name="endofmonth" value="">
               <input id="myDate" name="myDate" class="monthYearPicker" value="<?php echo $current; ?>" />
               <button type="submit"> Submit Month</button>
              </form>
           </div>

        </div>
        <br>
        <br>

            <div class="container">
  
                  <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title" align ="left">
                           Total Expendature For Lunch Program In The Month
                        </h4>
                        <span align ="right">
                        <?php 
                           $total_cost_lunchprogram=$total_vendor_cost+$total_lunchbonus;
                           echo $total_cost_lunchprogram;

                         ?>
                        </span>
                      </div>
                      <!-- <div id="collapse1" class="panel-collapse collapse in">
                        <div class="panel-body">hi hello</div>
                      </div> -->
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title" align ="left">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Expendature On Vendor</a>
                        </h4>
                        <span id="vendor_bonus" align ="right">


                          
                               <?php echo $total_vendor_cost;?>
                        </span>
                      </div>
                      <div id="collapse2" class="panel-collapse collapse">
                        <div class="panel-body">
                           
                           <?php if($result)
                           { ?>
                                <table>
                                        <tr>
                                           <th>Shop Name</th>
                                           <th>Cost</th>
                                        </tr>
                                        <?php echo $result;?>
                                    </table>
                            
                           <?php  } else{?>
                           <label>No Record Found </label>
                           
                           <?php  }?>
                        </div>
                      </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title" align ="left">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Expendature As Lunch Bonus</a>
                        </h4>
                        <span id="lunch_bonus" align ="right">
                            <?php echo $total_lunchbonus; ?>
                        </span>
                      </div>
                      <div id="collapse3" class="panel-collapse collapse">
                        <div class="panel-body">
                         <?php if($bonus) {?>
                    
                           <table>
                            <tr>
                               <th>Employee Name</th>
                               <th>Lunch Bonus</th>
                            </tr>
                          <?php echo $bonus;?>


                            </table>
                           <?php } else {?>
                            <label>No Record Found </label>
                           <?php } ?>
                          
                        </div>
                      </div>
                    </div>
                  </div> 
            </div>
           
    </section>
    

</body>
</html>
