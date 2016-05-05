<!DOCTYPE html>
<html lang="en">
<?php include 'addlunchheader.php';?>

<?php include 'lateviewheader.php';?>




<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">


<?php include 'navbar.php';?>
<?php include 'sideber.php';?>

<section class="intro-section">  

      <div class="container">  
         <div class="row" align="center"> 
              <div class="col-sm-4">
                  <div>
                     <p class="text-primary"><strong>Want To Add New Shop?</strong></p>
                     <button type="button" id="showadd" class="btn btn-primary btn-xs">Click Here!</button>
                  </div>
                  </br>
                  <div  id="showaddshop" style="display:none;">
                   <input type="text" id="newshopname" placeholder="Enter Shop Name Here">
                   </br>
                   <button id="addshopname" class="btn btn-danger btn-xs">Click To Add</button>
                  </div>

                  <div id="errormsg" class="error">
                  </div>
                  </br>
                   <table class="table table-bordered" >
                    <thead align="center">
                      <tr>
                        <td><strong>Click On Shop To See The Menu</strong></th>
                        
                      </tr>
                    </thead>
                    <tbody id ="showallshop" align="center">
                    </tbody>
                   </table>  
              </div>
              <div class="col-sm-2" ></div>
              <div class="col-sm-8" align="center" >
                    <div id="addnew" style="display:none;" align="center">
                          <strong>Shop Name:<span id="shpnm" class="text-warning"></span>
                          <p class="text-primary">Want To Add New Item ?</strong></p>
                          <button class="btn btn-primary btn-xs" id="addnewitems">Click Here!</button>
                    </div>
                    <div id="errornew"></div>
                    <br>
                    <div id="newitemdiv" style="display:none;" >
                        <table class="table table-bordered">
                            <thead align="center">
                              <tr>
                                <td><strong>Item name</strong></th>
                                <td><strong>Cost</strong></th>
                                  <td><strong>Limit</strong></th>
                                  <td><strong></strong></th>
                              </tr>
                            </thead>
                            <tbody>
                                 <tr>
                                <td><strong><input type="text" id="newitems"></strong></th>
                                <td><strong><input type="number" id="newcost" size="1" maxlength="3" min="1"></strong></th>
                                  <td><strong><input type="number" id="newlimit" size="1" maxlength="3" min="1"></strong></th>
                                  <td><strong><input type="button" class="btn btn-danger btn-xs" value="Click To Add Item" id="add"></strong></th>
                                  </tr>
                            </tbody>
                        </table>   
                  </div>
                  <div id="showitemofshop" style="display:none;" align="center">
                      <table class="table table-bordered">
                          <thead align="center">
                              <tr>
                               <th><strong>Item name</strong></th>
                               <th><strong>Cost</strong></th>
                               <th><strong>Limit</strong></th>
                               <th><strong></strong></th>
                              </tr>
                          </thead>
                          <tbody align="center" id="itemaccrodingshop">   
                          </tbody>
                      </table>
                  </div>
              </div>
         </div>
      </div>


    <div class="modal fade" id="deletconfm" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title error" align="center">Warning!!</h4>
          </div>
          <div class="modal-body deleteconfirm" align="center">
            Are You Sure You Want To Delete This Shop?
               <div>
                  <button type="submit" class="btn btn-danger pull-left" id="yesdltshop" >Yes</button>
                  <button type="submit" class="btn btn-danger pull-right" id="nodltshop" data-dismiss="modal">No</button>
               </div>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>

</section>
    


   

  </body>
</html>




