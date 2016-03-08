<!DOCTYPE html>
<html lang="en">

<?php include 'lateviewheader.php';?>




<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">


<?php include 'navbar.php';?>


<section id="contact" class="services-section">
          <div class="container">
            <div class="row">
                <h1>Point History</h1>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
                <div class="col-lg-12">
                   
                   <div class="row">
                      <div class="col-sm-12">

                      <div id='cur_month'>
                      Month: <?php echo date('F');?>  </div>
                      
                      </br></br>

                          <div class="form-group col-md-4 pull-right">
                          <label for="sel1">Select Month:</label>
                          <select class="form-control" id="sel1">
                          <option value=''>Select</option>
                          <option>January</option>
                          <option>February</option>
                          <option>March</option>
                          </select>
                          </div>

                          <table class="table table-bordered" >
                            <thead>
                              <tr>

                                <td><strong>DATE</strong></td>
                                <td><strong>Name</strong></td>
                                <td><strong>USER NAME</strong></td>
                                <td><strong>Point</strong></td>
                                <td><strong>DURATION</strong></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                            </tr>
                            </thead>
                            <tbody>
                           
                              

                          
                            </tbody>
                          </table>

                    
                    </div>

                </div>
            </div>
        </div>
    </section>


     

  </body>
</html>