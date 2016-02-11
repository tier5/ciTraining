<!DOCTYPE html>
<html lang="en">

<?php include 'employeeheader.php';?>

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
                <a class="navbar-brand page-scroll" href="#page-top">Tier5 Employee</a>
                
                </br><div class="glyphicon glyphicon-user username" id="username"></div>
                 
                
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                
                
                        <form action="Employee/logout" method="post">
                
                            <input type="submit" value="logout" class="btn btn-default pull-right">
                        
                        </form>

                    
                </br></br><div class="pull-right"><span><strong>POINTS : </strong></span><button id="pointbutton" class="btn btn-danger"></button></div>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <section id="intro" class="intro-section">
        <div class="container">
            <div class="row">

                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    
                    
                    
                    <button class="btn btn-primary" id="clockbtn" name="clockinbtn">Clock In</button>

                    
                    
                </div>

                <div class="col-sm-4">
                    
                    <div id="clockintime"></div>
                    <div id="clockintime1"></div>
                    <div id="clockintimeLate"></div>
                </div>
            </div>

            <br><br><br><br><br><br><br>


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

                    <button class="btn btn-primary" id="breakbtn" name="breakbtn">break</button>
                
                </div>
                
                <div id="timer"></div>
                <div id="timeinfo"></div>
                <div class="col-sm-4" id="msgbreak"></div>
           
            </div>
        
        </div>
        
    </section>

   <!-- Modal -->
  <!-- Modal -->
  <div class="modal fade" id="latePoint" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title error">Late Message</h4>
        </div>
        <div class="modal-body">
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
          <h4 class="modal-title error">Break Message</h4>
        </div>
        <div class="modal-body">
          <strong id="returnbreakMsg"></strong>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

</body>
</html>