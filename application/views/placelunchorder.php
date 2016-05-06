<!DOCTYPE html>
<html lang="en">
<?php include 'lateviewheader.php';?>
<head>
 <script src="<?php echo base_url().'application/views/js/lunchcost.js'?>"></script>
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
        <div class="container-fluid">
          <div align="center">
            <strong>PLace Lunch Order For An Employee</strong>
            <br>
              <?php 
              if($this->session->userdata('succ_msg')!='')
              { ?>
                <div class="alert alert-success alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <h4> Success!</h4>
                <?php echo $this->session->userdata('succ_msg');$this->session->set_userdata('succ_msg','');?>
                </div>
             <?php }
              ?>



              <?php 
              if($this->session->userdata('err_msg')!='')
              { ?>
                <div class="alert alert-danger alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <h4> Error!</h4>
                <?php echo $this->session->userdata('err_msg');$this->session->set_userdata('err_msg','');?>
                </div>
             <?php }
              ?>

              <div class="box">
                <form method="post" action="submitlunchorder" id="emp_lunch">
                 <table>
                    <tr>
                         <td>Select The Name Of Employee</td>
                         <td><select id="employee_id" name="employee_id"><option value="">--Select--</option>
                              <?php foreach($allemployee as $employee){?>
                               <option value="<?php echo $employee['id']; ?>"><?php echo $employee['propname']; ?></option>
                              <?php }?>
                            </select>
                         </td>
                    </tr>
                    <tr>
                        <td>Select The Shopname</td>
                        <td><select id="selectshop_id" name="selectshop_id"><option value="">--Select--</option>
                              <?php foreach($allshop as $shop){?>
                               <option value="<?php echo $shop['Lnid']; ?>"><?php echo $shop['item']; ?></option>
                              <?php }?>
                            </select>
                         </td>
                    </tr>
                    <tr>
                         <td>Select The Lunch Item</td>
                         <td >
                          <table>

                            <tbody id="item_of_employee" name="item_of_employee">
                            </tbody>
                          </table>

                          </td>

                    </tr>
                    <tr>
                         <td>Selected Item

                           <input type="hidden" name="total_item_lunch1" id="total_item_lunch1">
                         </td>
                        
                         <td id="total_item_lunch" name="total_item_lunch">
                        
                             
                          </td>
                          
                    </tr>
                    <tr>
                         <td>Cost <input type="hidden" name="total_cost_lunch1" id="total_cost_lunch1"></td>
                         <td id="total_cost_lunch" name="total_cost_lunch">00</td>

                    </tr>
                    <tr>
                         <td><input type="button" value="Submit Lunch Order" onclick="lunchsubmit();"></td>
                         
                   </form>
                    </tr>
                    
                 </table>

                 <!-- <input type="button" value="Check Reset" onclick="check_reset();">
                 <input type="button" value="Lunch Update" onclick="lunch_update();"> -->
              </div>
          </div>
        <div>   
    </section>
    

</body>
</html>
