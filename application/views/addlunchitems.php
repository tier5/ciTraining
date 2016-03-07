<!DOCTYPE html>
<html lang="en">
<?php include 'addlunchheader.php';?>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">     
            
            <div>
                <a class="navbar-brand page-scroll" href="<?php echo base_url().'Admin'?>"><span class="glyphicon glyphicon-circle-arrow-left"></span>Back To Home</a>
                <form action="<?php echo base_url()?>Admin/logout" method="post">
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
              <div class="col-sm-1"></div>
              <div class="col-sm-10" >
                 <div>
                   Add New Shop:<input type="text" id="newshopname"><button id="addshopname">ADD</button>
                 </div>
                 <div id="errormsg">
                 </div>
              </div>
              <div class="col-sm-1"></div>
         </div>
       </div>

      <br>
      <div class="container">  
         <div class="row" align="center"> 
              <div class="col-sm-4"></div>
              <div class="col-sm-4" >
                <table class="table table-bordered">
                  <thead align="center">
                    <tr>
                      <td><strong>Shop Name</strong></th>
                      <td><strong></strong></th>
                  </thead>
                  <tbody id ="showallshop" align="center"></tbody>
                </table>  
                  </div>
              </div>
              <div class="col-sm-4"></div>
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
        <div class="modal-footer">
         
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="additems" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 align="center">Lunch Items</h4>
            </div>
             <div class="modal-body" align="center">

               <div class="row" align="center"> 
                   <div class="col-sm-1"></div>
                   <div class="col-sm-10">
                     <button class="btn btn-danger pull-right btn-xs" id="addnewitems">Add New Items</button>

                   </div>
                   <div class="col-sm-1"></div>
              </div>

              Shop Name:<span id="shopname"></span>
                  <br>

                  <div id="errornew"></div>
            <div id="divload">
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
                                <td><strong><input type="text" id="newitems" size="10"></strong></th>
                                <td><strong><input type="number" id="newcost" size="1" maxlength="3"></strong></th>
                                  <td><strong><input type="number" id="newlimit" size="1" maxlength="3"></strong></th>
                                  <td><strong><input type="button" value="ADD" id="add"></strong></th>
                                  </tr>
                            </tbody>
                         </table>
                      
              </div>
              
              <div id="showitem" >
                <table class="table table-bordered">
                    <thead align="center">
                      <tr>
                        <td><strong>Item name</strong></th>
                        <td><strong>Cost</strong></th>
                          <td><strong>Limit</strong></th>
                          <td><strong></strong></th>
                      </tr>
                    </thead>
                    <tbody align="center" id="shopitems">

                    </tbody>
                  </table>
                </div>
            </div>
          <div class="modal-footer">
           
          </div>
      </div>
    </div>
  </div>





 </section>
</body>
</html>