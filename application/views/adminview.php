<!DOCTYPE html>
<html lang="en">

<?php include 'header.php';?>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

  
  
  
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
                <a class="navbar-brand page-scroll" href="#page-top">Home</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    
                    <li>
                        <a class="page-scroll" href="#contact">Employee Late</a>
                    </li>
                    
                    <li>
                        <a class="page-scroll" href="#employeelate">Show all Employee</a>
                    </li>

                    
                    <li>
                        <a  href="Admin/showAllLateview">Employee All Late Information</a>
                    </li>
                   
                </ul>

                
                     
                        <form action="Admin/logout" method="post">
                
                            <input type="submit" value="logout" class="btn btn-default pull-right">
                        
                        </form>
                   
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Section -->


    <section id="intro" class="intro-section">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Employee On Break</h1>
                    
                    
                         <div class="row">

                          <div class="col-sm-4"></div>
                          <div class="col-sm-4">

                              <a class="btn btn-default page-scroll" href="#employeelate">Go To Employee Management!</a>


                          </div>
                          <div class="col-sm-4">

                            
                            <!--<input type="button" value="Change Date" id="datepicker" class="btn btn-warning">-->

                          </div>

                         </div>           
                </div>
            </div>
        </br>
            <div class="row">
                <div class="col-sm-3">

                    <strong>Employee Clocked In</strong>
                    
                    <div class="col-sm-12">
                        <table class="table table-bordered" >
                            <thead>
                              <tr>
                                <th>UserName</th>
                                <th>ClockIn</th>
                                
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
                            <tbody id="lbreaktable">
                           
                              

                          
                            </tbody>
                          </table>
                      </div>
                </div>
            </div>



        </div>
    </section>

    <!-- About Section -->
   
    <section id="contact" class="services-section">
          <div class="container">
            <div class="row">
                <h1>Employee Late</h1>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
                <div class="col-lg-12">
                   
                   <div class="row">
                         <div class="col-sm-12">
                        <table class="table table-bordered" >
                            <thead>
                              <tr>

                                <td><strong>DATE</strong></td>
                                <td><strong>ID</strong></td>
                                <td><strong>USER NAME</strong></td>
                                <td><strong>LATE ON</strong></td>
                                <td><strong>DURATION</strong></td>
                                <td><button class="btn btn-danger" data-toggle="modal" data-target="#deleteAllLate">Delete All</button></td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
                            </tr>
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
      </div>
  
</div>




</body>

</html>
