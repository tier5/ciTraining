<!DOCTYPE html>
<html lang="en">

<?php include 'employeeheader.php';?>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Tier5 Employee</a>
                
                </br><div class="glyphicon glyphicon-user username" id="username"></div>
                 
                
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                
                
                        <form action="Employee/logout" method="post">
                
                            <input type="submit" value="logout" class="btn btn-primary pull-right"></input>
                         
                        </form>

                    
                </br></br><div class="pull-right"><span><strong>POINTS:</strong></span><button id="pointbutton" class="btn btn-danger"></button></div>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <div class="row">

                            <div class="col-sm-4">
                             <button class="btn btn-default btn-lg" id="lunchorder" name="lunchorder">Lunch Order</button>
                            </div>
                            <div class="col-sm-4">
                                
                                
                                
                                <button class="btn btn-default btn-lg" id="clockbtn" name="clockinbtn">Clock In</button>

                                
                                
                            </div>

                            <div class="col-sm-4">
                                
                                <div id="clockintime"></div>
                                <div id="clockintime1"></div>
                                <div id="clockintimeLate"></div>
                            </div>
                        </div>
                        
                         <br><br><br><br>

                          <hr class="intro-divider">

                         <br><br><br><br>
                        
                        <div class="row">
                
                            <div class="col-sm-4" >

                                <select class="btn btn-default" id="opt">
                                  <option value="" selected="selected"> Select a Break</option>
                                  <option value="fbreak" id="fbreak">First Break</option>
                                  <option value="sbreak" id="sbreak">Second Break</option>
                                  <option value="lbreak" id="lbreak">Last Break</option>
                                </select>

                            </div>
                            
                            <div class="col-sm-4" >

                                <button class="btn btn-default btn-lg" id="breakbtn" name="breakbtn">break</button>
                            
                            </div>
                            
                            
                            
                            <div class="col-sm-4">

                              <div id="timer"></div>
                            
                              <div id="timeinfo"></div>
                              <div id="msgbreak"></div>
                              <div id="breakmsg"></div>
                          
                            </div>
                       
                        </div><!--/row-->
                        
                      <div class='container-fluid calenderbox'>
                        <div class='row'>

                            <div class="col-sm-3"></div>

                            <div class="col-sm-3"></div>

                            <div class="col-sm-3"></div>

                            <div class="col-sm-3">

                                <input type="button" value="Change Date" id="calender" class="btn btn-warning">


                            </div>



                        </div>

                          <br>


                        <div class='row'>

                            <div class="col-sm-3">
                             <div class="row">
                              <div class="col-sm-6">
                                <div class='row calendername'>Clock In</div>
                                <div class='row calendervalue' id="clockintimeshow"></div>
                              </div>

                               <div class="col-sm-6">
                                <div class='row calendername'>Clock Out</div>
                                <div class='row calendervalue' id="clockouttimeshow"></div>
                              </div>
                             </div>
                            </div>


                            <div class="col-sm-3">
                                <div class="col-sm-12">
                                <div class='row calendername'>First Break</div>
                                <div class='row calendervalue' id="fbreaktime"></div>
                              </div>

                            </div>


                            <div class="col-sm-3">
                                <div class="col-sm-12">
                                <div class='row calendername'>Lunch Break</div>
                                <div class='row calendervalue' id="sbreaktime"></div>
                              </div>

                            </div>


                            <div class="col-sm-3">
                                <div class="col-sm-12">
                                <div class='row calendername'>Last Break</div>
                                <div class='row calendervalue' id="lbreaktime"></div>
                              </div>

                            </div>


                        </div>

                      </div>

                    </div>
                </div>
            </div>



        </div>
        <!-- /.container -->

    </div>



    



    

   <!-- Modal -->
  <!-- Modal -->
  <div class="modal fade" id="latePoint" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title error" align="center">Late Message</h4>
        </div>
        <div class="modal-body deleteconfirm" align="center">
          <strong id="pointMsg"></strong>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="returnbreakModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title deleteconfirm" align="center">Break Message</h4>
        </div>
        <div class="modal-body deleteconfirm" align="center">
          <strong id="returnbreakMsg"></strong>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  

    <div class="modal fade" id="pointtblModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title error" align="center">Point Deduction Status</h4>
        </div>
        <div class="modal-body" align="center">
          <div id="emplatetbl">
          <table class="table table-bordered" >

                            <thead>
                              <tr>
                    
                                <td><strong>Date</strong></td>
                                <td><strong>Duration</strong></td>
                                <td><strong>Late On</strong></td>
                                <td><strong>Deducted Points</strong></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
                    
                             </tr>
                            </thead>
                            <tbody id="pointtblMsg">
                           
                              

                          
                            </tbody>
                          </table>
            </div>
            <div id="nolaterecords"></div>

         
          
            
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



<div class="container">

      <!-- Modal -->
      <div class="modal fade" id="earlyclockoutModal" role="dialog">
        <div class="modal-dialog modal-sm">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title deleteconfirm" align="center"><strong>Early Clock Out</strong></h4>
            </div>
            <div class="modal-body">
              
              <div id="earlyclockoutMsg" align='center'><strong></strong></div>


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
      <div class="modal fade" id="idlechkModal" role="dialog">
        <div class="modal-dialog modal-sm">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title deleteconfirm" align="center"><strong>No Activity For More Than 20 minutes</strong></h4>
            </div>
            <div class="modal-body">
              
              <p align='center'>ARE YOU THERE</p>
              
              <div class="col-sm-4">
                
                

                <button id="idlechkYES" class="btn btn-warning" data-dismiss="modal">Yes</button>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    


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
<div class="modal fade" id="lunchModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title error">Place Your Lunch Order</h4>   
        </div>
        <div class="modal-body-tab1" align="center">

        </div>
         
        <div class="modal-body-tab2" align="center">
            <div class="row">
               <div class="col-sm-3" ></div>
               <div class="col-sm-6" >
                    Shop Name: <span id="shpname"></span>
                    </br>
                    Lunch Items:<span id="totalitem"></span>
                    </br>
                    Total Cost:<span id="totalcost">00</span>
                    </br>
               </div>
               <div class="col-sm-3" ></div>
            </div>
               </br>
               </br>
    
                </br>
                <table class="table table-bordered"  >
                  <thead>
                    <tr>
                        <td><strong>Select</strong></td>
                        <td><strong>Items</strong></td>
                        <td><strong>Cost</strong></td>
                        <td><strong>Quantity</strong></td>
                    </tr>
                  </thead>
                  <tbody id="orderbody">        
                  </tbody>
                </table>
                </br>
                <button type="submit" class="btn btn-link pull-left" id="prev"><span><<</span> Prev</button>
                <button type="submit" class="btn btn-danger btn-sm pull-right" id="suborder">Submit Order</button>                    
        </div>
        <div class="modal-body-tab3">
          <div id="confirmorder">

          </div>

        </div>
        
      </br>
      </br>
        <div class="modal-footer">
         
        </div>
      </div>
    </div>
  </div>

</body>
</html>