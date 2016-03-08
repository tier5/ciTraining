 <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="<?php echo base_url().'Admin'?>">Home</a>
            </div>

             <form action="<?php echo base_url().'Admin/logout'?>" method="post">
                
                            <input type="submit" value="logout" class="btn btn-default pull-right">
                        
                        </form>

            <!-- Collect the nav links, forms, and other content for toggling -->
            

                  <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    
                    <li>
                        <a class="page-scroll" href="<?php echo base_url();?>Admin#contact">Employee's Late</a>
                    </li>
                    
                    <li>
                        <a class="page-scroll" href="<?php echo base_url();?>Admin#employeelate">Show all Employee</a>
                    </li>

                    
                    <li>
                        <a  href="<?php echo base_url();?>Admin/showAllLateview">Employee's All Late Information</a>
                    </li>

                    <li>
                        <a  href="lunchorderview">Lunch Order</a>
                    </li>
                    <li>
                        <a  href="addEventview">Event</a>
                    </li>
                    <li>
                        <a  href="ShowPointHistory">Point History</a>
                    </li>
                    
                   
                </ul>

                
                     
                        
                   
                
            </div>
                     
                       
                   
                
           
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>