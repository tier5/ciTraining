<!DOCTYPE html>
<html lang="en">

<?php include 'header.php';?>


<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

  
  

<?php include 'navbar.php';?>
    <!-- Intro Section -->
    <div id="test" data-status='opened'>
     <div class="user">
      <img src="http://image.priceprice.k-img.com/ph/images/common/face_japan_01.gif" alt="Esempio" class="img-thumbnail">
      <a target="_blank" class="navbar-link">Admin</a>
    </div>
    <div class="list-group">
      <a class="list-group-item1 active"  href="<?php echo base_url()?>">Home</a>
      <a class="list-group-item1" href="<?php echo base_url();?>Admin#contact">Employee's Late</a>
      <a class="list-group-item1" href="<?php echo base_url();?>Admin#employeelate">Show all Employee</a>

      <a  class="list-group-item1" href="<?php echo base_url();?>Admin/showAllLateview">Employee's All Late Information</a>
      <a class="list-group-item1" href="<?php echo base_url();?>Admin/lunchorderview">Lunch Order</a>
      <a class="list-group-item1" href="<?php echo base_url();?>Admin/addEventview">Event</a>
      <a class="list-group-item1" href="<?php echo base_url();?>Admin/ShowPointHistory">Point History</a>
      <a class="list-group-item1" href="logout">Logout</a>
     
  </div>
</div>
    


  
  </div>

    <section id="intro" class="intro-section">
<!-- get the selected date for events -->

<input type='hidden' value='<?php echo $str;?>' id='event_date'>

<!-- get the selected date for events -->




        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Employee's On Break</h1>
                    
                    
                         <div class="row">

                          <div class="col-sm-4"></div>
                          <div class="col-sm-4">

                              <a class="btn btn-default page-scroll" href="#employeelate">Go To Employee Management!</a>

                            
                          </div>
                          <div class="col-sm-4">
                            <div id='notify'>

                             <?php 
                           
                            if(!empty($event_info_tm)) 
                            {
                              echo '<img src="'.base_url().'application/views/img/bell_icon.jpg" alt=" " title="Tomorrow A new Event Is There!! check On the calendar!!">';
                            }

                            ?>
                            </div>
                            <input type="button" value="Change Date" id="datepicker" class="btn btn-warning">
                            
                          </div>
                           
                         </div>           
                </div>
            </div>
        </br>
      
        
        </br>
        </br>
                <!-- event notifications -->
               
                <div class="container-fluid">
                <div class="row">

                      <div class="col-sm-12">
                     <div id='event_spcl' <?php if(empty($event_info)) { ?> style='display:none;' <?php } ?> >
                    <strong>Today's Events</strong>
                    
                    <div class="col-sm-12 table-responsive">
                        <table class="table table-bordered" >
                            <thead>
                              <tr>
                                <th>Employee Name</th>
                                <th>Date</th>
                                <th>Event</th>
                                
                              </tr>
                            </thead>
                            <tbody id="eventdiv">
                           
                              
                            <?php  if(!empty($event_info)) {

                              foreach($event_info as $results)
                              {
                                echo "<tr class='info'>
                <td>".$results['name']."</td>

                <td>".date('d/m/Y',strtotime($results['date']))."</td>
                <td>".$results['event_informations']."</td>
                  </tr>";
                              }
                            }?>
                          
                            </tbody>

                          </table>
                      

                       
                   </div>
                </div>
                </div>  </div>
                    
                <!-- event notifications -->
        <br>
        <br>        
            <div class="row">
              <div class="container-fluid">
                <div class="col-sm-3">

                    <strong>Employee's Clocked In</strong>
                    
                    <div class="col-sm-12 table-responsive">
                        <table class="table table-bordered" >
                            <thead>
                              <tr>
                                <th>UserName</th>
                                <th>ClockIn</th>
                                <th>ClockOut</th>
                                
                              </tr>
                            </thead>
                            <tbody id="tablediv">
                           
                              

                          
                            </tbody>

                          </table>
                      

                       
                   </div>

                </div>

                <div class="col-sm-3">
                    <strong>Employee On First Break</strong>

                        <div class="col-sm-12">
                        <table class="table table-bordered" >
                            <thead>
                              <tr>
                                <th>UserName</th>
                                <th>Time </th>
                                
                              </tr>
                            </thead>
                            <tbody id="fbreaktablecomplete">
                           
                              

                          
                            </tbody>
                            <tbody id="fbreaktable">
                           
                              

                          
                            </tbody>
                            
                          </table>
                      </div>

                </div>

                <div class="col-sm-3">
                    <strong>Employee On Lunch Break</strong>
                    <div class="col-sm-12">
                        <table class="table table-bordered" >
                            <thead>
                              <tr>
                                <th>UserName</th>
                                <th>Time </th>
                                
                              </tr>
                            </thead>
                            <tbody id="sbreaktablecomplete">
                           
                              

                          
                            </tbody>
                            <tbody id="sbreaktable">
                           
                              

                          
                            </tbody>
                            
                          </table>
                      </div>
                </div>

                <div class="col-sm-3">
                    <strong>Employee On Last Break</strong>
                    <div class="col-sm-12">
                        <table class="table table-bordered" >
                            <thead>
                              <tr>
                                <th>UserName</th>
                                <th>Time </th>
                                
                              </tr>
                            </thead>
                            <tbody id="lbreaktablecomplete">
                           
                              

                          
                            </tbody>
                            <tbody id="lbreaktable" class='late'>
                           
                              

                          
                            </tbody>
                            
                          </table>
                      </div>
                </div>
              </div>
            </div>



        </div>
    </section>

    <!-- About Section -->
   <br><br><br><br><br><br> <br><br><br><br><br><br>
    <section id="contact" class="services-section">
          <div class="container">
            <div class="row">
                <h1>Employee's Late</h1>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
                <div class="col-lg-12">
                   
                   <div class="row">
                         <div class="col-sm-12">
                        <table class="table table-bordered" >
                            <thead>
                              <tr>

                                <td><strong>DATE</strong></td>
                                <td><strong>ID</strong></td>
                                <td><strong>USER NAME</strong></td>
                                <td><strong>LATE ON/REASON</strong></td>
                                <td><strong>DURATION</strong></td>
<!--                                 <td><button class="btn btn-danger" data-toggle="modal" data-target="#deleteAllLate">Delete All</button></td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
 -->                            </tr>
                            </thead>
                            <tbody id="latetable">
                           
                              

                          
                            </tbody>
                          </table>
                      </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Services Section -->

     <section id="employeelate" class="about-section">
        



        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Show all Employee</h1>
                    
                    <div class="col-sm-12">

                    <div class="row">
                         <div class="col-sm-12">
                        <table class="table table-bordered" >
                            <thead>
                              <tr>
                    
                                <td><strong>ID</strong></td>
                                <td><strong>USER NAME</strong></td>
                                <td><strong>EMAIL</strong></td>
                                <td><strong>PASSWORD</strong></td>
                                <td><strong>POINTS</strong><div><button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#resetPoints" data-toggle='tooltip' title='Reset Points For Everyone'>RESET</button></div></td>
                               <td><button id="adminlog" class="btn btn-primary" data-toggle="modal" data-target="#addEmpModal">Add New</button></td>
                               <td><strong>Mark As</br> Absent</strong></td>
                               <td><strong>Delete</br> Employee</strong></td>
                               <td><strong>Deduct</br> Point</strong></td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                    
                             </tr>
                            </thead>
                            <tbody id="showallemployeeDiv">
                           
                              

                          
                            </tbody>
                          </table>
                      </div>
                    </div>
                      




                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    

    

    

    <!-- Modal -->
  <div class="container">

      <!-- Modal -->
      <div class="modal fade" id="addEmpModal" role="dialog">
        <div class="modal-dialog modal-sm">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Add New Employee</h4>
            </div>
            <div class="modal-body">
              
                        <div class="form-group">
                            <input id="empusername" name="name" type="text" class="form-control input-lg" placeholder="user_name">
                        </div>
                        <div class="form-group">
                            <input id="empuseremail" type="email" name="email" class="form-control input-lg" placeholder="email@domain.com">
                        </div>
                        <div class="error" id="improperemail"></div>
                        <div class="form-group">
                            <input id="empuserpass" type="password" name="password" class="form-control input-lg" placeholder="Password">
                        </div>
                        
                        <div class="form-group">
                            <button id="addNewEmp" class="btn btn-primary btn-lg btn-block">ADD</button>
                            
                        </div>
                        <div id="confirmAdd" align="center" class="confirm"></div>
                    
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>
  
</div>


 <div class="container">

      <!-- Modal -->
      <div class="modal fade" id="deleteAllLate" role="dialog">
        <div class="modal-dialog modal-sm">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title deleteconfirm" align="center"><strong>Delete All Late Records</strong></h4>
            </div>
            <div class="modal-body">
              
              <div class="col-sm-4">
                
                <button id="delAllLateTbl" class="btn btn-danger" data-dismiss="modal">Yes</button>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    


              </div>
              <div class="col-sm-4"></div>
              

              <div class="col-sm-4">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

              </div>

            <div class="modal-footer">
            </div>
                        
            </div>
            
          </div>
          
        </div>
      </div>
  
</div>

<div class="container">

      <!-- Modal -->
      <div class="modal fade" id="resetPoints" role="dialog">
        <div class="modal-dialog modal-sm">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title deleteconfirm" align="center"><strong>Reset Everyone's Point</strong></h4>
            </div>
            <div class="modal-body">
              
              <div class="col-sm-4">
                
                <button id="resetEveryPoints" class="btn btn-warning" data-dismiss="modal">Yes</button>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    


              </div>
              <div class="col-sm-4"></div>
              

              <div class="col-sm-4">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

              </div>

            <div class="modal-footer">
            </div>
                        
            </div>
            
          </div>
          
        </div>
      </div>
  
</div>

<div class="container">

      <!-- Modal -->
      <div class="modal fade" id="deleteEmpModal" role="dialog">
        <div class="modal-dialog modal-sm">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title deleteconfirm" align="center"><strong>Are You Sure You Want To Delete This Employee</strong></h4>
            </div>
            <div class="modal-body">
              
              <div class="col-sm-4">
                
                <button id="deleteEmpYes" class="btn btn-warning" data-dismiss="modal">Yes</button>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    


              </div>
              <div class="col-sm-4"></div>
              

              <div class="col-sm-4">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

              </div>

            <div class="modal-footer">
            </div>
                        
            </div>
            
          </div>
          
        </div>
      </div>
  
</div>


<div class="container">

      <!-- Modal -->
      <div class="modal fade" id="absentModal" role="dialog">
        <div class="modal-dialog modal-sm">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title deleteconfirm" align="center"><strong>Absent</strong></h4>
            </div>
            <div class="modal-body">
              
              <div align='center'><strong>He is Marked as Absent</strong></div>


              </div>

            <div class="modal-footer">

               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>


            </div>
            </div>
                        
            </div>
            
          </div>
          
        </div>


        <div class="container">

      <!-- Modal -->
      <div class="modal fade" id="customPointDeductModal" role="dialog">
        <div class="modal-dialog modal-lg">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title deleteconfirm" align="center"><strong>Give A Reason For The Point Deduction For ID <div id="showiddeductModal"></div></strong></h4>
            </div>
            <div class="modal-body" align="center">


              
              <div class="col-sm-12">

                <div class="row">

                    <div class="col-sm-4"></div>

                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="custompointdeductPoint" placeholder="Points To Deduct"/>
                    </div>

                    <div class="col-sm-4"></div>

                </div>
              </br>
            </br>
                <div class="row">

                    <div class="col-sm-2"></div>

                    <div class="col-sm-8">
                        <textarea class="form-control" id="custompointdeductMsg" placeholder="Reason"/></textarea>
                    </div>

                    <div class="col-sm-2"></div>


                </div>
                </br>
                </br>
                <div class="row">

                    <button class="btn btn-danger" id="custompointdeductbutton" data-dismiss="modal">Deduct</button>

                </div>
              </div>


              </div>

            <div class="modal-footer">

               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>


            </div>
            </div>
                        
            </div>
            
          </div>
          
        </div>


      </div>
  
</div>

<div class="container">

      <!-- Modal -->
      <div class="modal fade" id="cardCheck" role="dialog">
        <div class="modal-dialog modal-sm">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title deleteconfirm" align="center"><strong>A New Card Found</strong></h4>
            </div>
            <div class="modal-body">
              
              <div align='center' ><strong id="cardMsg"></strong></div>
              </br>          
              <input class="form-control" id="idToCard" placeholder="Employee ID"/></textarea>
               </br>
               <button type="button" id="addEmpToCard" class="btn btn-primary" data-dismiss="modal">Add</button>

              </div>

            <div class="modal-footer">

               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>


            </div>
            </div>
                        
            </div>
            
          </div>
          
        </div>


<div class="container">

      <!-- Modal -->
      <div class="modal fade" id="cardAdded" role="dialog">
        <div class="modal-dialog modal-sm">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title deleteconfirm" align="center"><strong>Added Successfully</strong></h4>
            </div>
            <div class="modal-body">
              
              <div align='center' ><strong id="cardAddedMsg"></strong></div>
              </br>          
              
              </div>

            <div class="modal-footer">

               <button type="button" id="cardAddedConfirm" class="btn btn-default" data-dismiss="modal">Close</button>


            </div>
            </div>
                        
            </div>
            
          </div>
          
        </div>



</body>

</html>
