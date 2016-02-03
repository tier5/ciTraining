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
                        <a class="page-scroll" href="#services">Update Employee</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Show all Employee</a>
                    </li>
                   
                </ul>

                        <form action="Admin/logout" method="post">
                
                            <input type="submit" value="logout" class="btn btn-default pull-right">
                        
                        </form>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Section -->
     <!--  <button class="btn btn-default page-scroll">Go To Employee Management!</button>-->


    <section id="intro" class="intro-section">

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h1>Employee On Break</h1>
                    
                    <a class="btn btn-default page-scroll" href="#about">Go To Employee Management!</a>
                </div>
            </div>
            <div class="row">
                <br/>
                <div class="col-sm-3">

                    <strong>Employee Clocked In</strong>
                    <div id="clockin"></div>

                </div>

                 <div class="col-sm-3">

                    <strong>Employees on First Break @ 20 min</strong>
                </div>
                 <div class="col-sm-3">

                   <strong>Employees on Lunch Break @ 1 hr</strong>
                </div>
                 <div class="col-sm-3">

                   <strong>Employees on Last Break @ 20 min</strong>
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
                        
                        <span class="fieldset">*</span><input type='text' id='empname' name='empname' placeholder='Employee Name'>
                        <br/>
                        
                        <span class="fieldset">*</span><input type='text' id='empemail' name='empemail' placeholder='employee@domain.com'><br/>
                         <div id="errorAdd1" align="center" class="error"></div>
                        
                        <span class="fieldset">*</span><input type='password' id='emppass' name='emppass' placeholder='Password'><br/>
                        
                         &nbsp<input type='submit' id='addemp' name='addemp' class='btn btn-info' value='Add Employee'>
                        
                         <div id="errorAdd" align="center" class="error"></div>
                         <div id="confirmAdd" align="center" class="confirm"></div>

                        
                       
                    </div>
                    <div class="col-lg-4"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Update Employee</h1>
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4" >
                    <span class="fieldset">*</span><input type="text" id="empid" name="empid" placeholder="Enter Old Employee Id">
                    </br>
                    <span class="fieldset">*</span><input type="text" id="newname" name="newname" placeholder="Enter New Name">
                    </br>
                    <span class="fieldset">*</span><input type="text" id="newemail" name="newemail" placeholder="Enter New Email Id">
                    </br>

                    <span class="fieldset">*</span><input type="password" id="newpass" name="newpass" placeholder="Enter New Password">
                    </br>

                    <input type="submit" class="btn btn-info" id="updtemp" name="updtemp" value="Update Employee">
                      </br>
                    <div id="emailcheck"></div>
                     </br>
                    <div id="alartmsg"></div>
                
                    <div id="alartmsg" class="confirm"></div>
                    <div id="alartmsg1" class="error"></div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Show all Employee</h1>
                    <div class="col-lg-4">
                    <div class="col-lg-4">
                        
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <td class="bold">Employee ID</td>
                                        <td class="bold">Employee Name</td>
                                        <td class="bold">Employee Email</td>
                                    </tr>
                                </thead>
                                <tbody id="showallemployeeDiv">

                                    <tr>
                                       <td>
                                       
                                       </td>     
                                    </tr>
                                </tbody>
                                
                            </table>
                        
                    </div>
   
                   

                    </div>
                    <div class="col-lg-4"></div>
                </div>
            </div>
        </div>
    </section>

    

</body>

</html>
