<!DOCTYPE html>
<html lang="en">

<?php include 'lateviewheader.php';?>




<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">


<?php include 'navbar.php';?>
<?php include 'sideber.php';?>

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
                                <td><strong>LATE ON/REASON</strong></td>
                                <td><strong>DURATION</strong></td>
                                <td><button class="btn btn-danger" data-toggle="modal" data-target="#deleteAllLate">Delete All</button></td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
                            </tr>
                            </thead>
                            <tbody id="showAllLateInfo">
                           
                              

                          
                            </tbody>
                          </table>
                      </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


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

  </body>
</html>