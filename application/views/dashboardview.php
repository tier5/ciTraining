<!DOCTYPE html>
<html lang="en">

<?php include 'dashboardheader.php';?>



<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Tier5</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#about"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact"></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>WELCOME TO Tier5</h1>
                <hr>
                
                <div class="row">
                
                <div class="col-sm-6" >
	                <button id="adminlog" class="btn btn-primary btn-xl page-scroll" data-toggle="modal" data-target="#adminlogModal">Admin Login</button>

				</div>
				
				<div class="col-sm-6" >
	                <button id="employeelog" class="btn btn-primary btn-xl page-scroll" data-toggle="modal" data-target="#employeelogModal">Employee Login</button>

				</div>

				</div>
                
                
            </div>
        </div>
    </header>

    <div class="container">

      <!-- Modal -->
      <div class="modal fade" id="adminlogModal" role="dialog">
        <div class="modal-dialog modal-sm">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Admin Login</h4>
            </div>
            <div class="modal-body">
              
                    <form action="<?php echo base_url().'index.php/Dashboard/adminlogin'; ?>" method="post">
                        <div class="form-group">
                            <input id="adminname" name="name" type="text" class="form-control input-lg" placeholder="name">
                        </div>
                        <div class="form-group">
                            <input id="adminpassword" type="password" name="password" class="form-control input-lg" placeholder="Password">
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" value="Sign In" id="adminsign" class="btn btn-primary btn-lg btn-block">
                            
                        </div>
                    </form>

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
      <div class="modal fade" id="employeelogModal" role="dialog">
        <div class="modal-dialog modal-sm">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Employee Login</h4>
            </div>
            <div class="modal-body">
                
                    <form action="<?php echo base_url().'index.php/Dashboard/employeelogin'; ?>" method="post">
                        <div class="form-group">
                            <input id="employeename" name="name" type="text" class="form-control input-lg" placeholder="name">
                        </div>
                        <div class="form-group">
                            <input password="employeepassword" name="password" type="password" class="form-control input-lg" placeholder="Password">
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" value="Sign In" id="employeesign" class="btn btn-primary btn-lg btn-block">
                            
                        </div>
                    </form>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>
  
</div>

    

    

    

</body>

</html>
