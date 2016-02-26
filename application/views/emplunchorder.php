<!DOCTYPE html>
<html lang="en">
<?php include 'lateviewheader.php';?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/i18n/jquery-ui-i18n.min.js"></script>
<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">     
            
            <div>
                <a class="navbar-brand page-scroll" href="<?php echo base_url().'Admin'?>"><span class="glyphicon glyphicon-circle-arrow-left"></span>Back To Home</a>
                <form action="<?php echo base_url().'Admin/logout'?>" method="post">
                    <input type="submit" value="logout" class="btn btn-default pull-right">
                </form>
            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li class="hidden">
                            <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li>
                            <a  href="lunchorderview">Today's Order</a>
                    </li>
                </ul>  
            </div>

        </div>

    </nav>
 <section class="intro-section">
      <div class="container">  
         <div class="row" align="center"> 
              <div class="col-sm-4">
                  
                  <input type="button" id="datepickerr">
              </div>
              <div class="col-sm-2" ></div>
              <div class="col-sm-6"><input type="number" id="enterempid" placeholder="Enter Employee Id">
                <input type="submit" id="subempid" value="Submit">
                </br>
                <span id="shwmsg"></span></div>
         </div>
      </div>
 </section>
</body>
</html>