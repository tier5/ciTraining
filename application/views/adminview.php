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
                        <a class="page-scroll" href="#about">Add New Employee</a>
                    </li>
                    
                    <li>
                        <a class="page-scroll" href="#employeelate">Employee Late</a>
                    </li>

                    <li>
                        <a class="page-scroll" href="#contact">Show all Employee</a>
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
        <button class="btn btn-default page-scroll">Go To Employee Management!</button>


    <section id="intro" class="intro-section">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Employee On Break</h1>
                    <div id="mydiv">hello</div>
                    
                    <a class="btn btn-default page-scroll" href="#about">Go To Employee Management!</a>
                </div>
            </div>
        </br>
            <div class="row">
                <div class="col-sm-3">

                    <strong>Employee Clocked In</strong>
                    
                    <div class="col-sm-12 table-responsive">
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

                        <div class="col-sm-12 table-responsive">
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
                    <div class="col-sm-12 table-responsive">
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
                    <div class="col-sm-12 table-responsive">
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
    <section id="about" class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Add New Employee</h1>
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                        
                        <span class="fieldset">*</span><input type='text' id='empname' name='empname' placeholder='Employee User_Name'>
                        <br/>
                        
                        <span class="fieldset">*</span><input type='text' id='empemail' name='empemail' placeholder='employee@domain.com'><br/>
                         <div id="errorAdd1" align="center" class="error"></div>
                        
                        <span class="fieldset">*</span><input type='password' id='emppass' name='emppass' placeholder='Password'><br/>
                        
                         <input type='submit' id='addemp' name='addemp' class='btn btn-info' value='Add Employee'>
                        
                         <div id="errorAdd" align="center" class="error"></div>
                         <div id="confirmAdd" align="center" class="confirm"></div>

                        
                       
                    </div>
                    <div class="col-lg-4"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->

     <section id="employeelate" class="about-section">
        <div class="container">
            <div class="row">
                <h1>Employee Late</h1>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
                <div class="col-lg-12">
                   
                   <div class="row">
                         <div class="col-sm-12 table-responsive">
                        <table class="table table-bordered" >
                            <thead>
                              <tr>

                                <td><strong>DATE</strong></td>
                                <td><strong>ID</strong></td>
                                <td><strong>USER NAME</strong></td>
                                <td><strong>LATE ON</strong></td>
                                <td><strong>Time</strong></td>
                                <td><button id="delAllLateTbl" class="btn btn-danger">Delete All</button></td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
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
    

    <!-- Contact Section -->
    <section id="contact" class="services-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Show all Employee</h1>
                    
                    <div class="col-sm-12">

                    <div class="row">
                         <div class="col-sm-12 table-responsive">
                        <table class="table table-bordered" >
                            <thead>
                              <tr>
                                <td><strong>ID</strong></td>
                                <td><strong>USER NAME</strong></td>
                                <td><strong>EMAIL</strong></td>
                                <td><strong>PASSWORD</strong></td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
                                
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
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>




</body>

</html>
