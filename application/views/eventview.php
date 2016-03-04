<!DOCTYPE html>
<html lang="en">

<?php include 'lateviewheader.php';?>

<script type="text/javascript">
$(document).ready(function(){

			$("#datepicker").datepicker();
$('#eventForm').validate();

});

</script>


<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">


<?php include 'navbar.php';?>


<section id="contact" class="services-section">
<div class="success">
<?php 
if($this->session->userdata('s_message')!=' ')
{
echo $this->session->userdata('s_message');
$this->session->set_userdata('s_message',' ');
}
?>
</div>
<div class="error">
<?php
if($this->session->userdata('e_message')!=' ')
{
echo $this->session->userdata('e_message');
$this->session->set_userdata('e_message',' ');
}
?>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><h2>Event List</h2></div>
		<div class="col-sm-4">

				<a data-toggle="modal" data-target="#myModal" style="cursor:pointer;">Add Event</a>

		</div>

	</div>
  
              
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Date</th>
        <th>Event</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      
      <?php

      		foreach ($info_event as $result) 
      		{
      			?>

      			<tr><td><?php echo $result['name'];?></td>
		        <td>
		        	<?php echo date('d-m-Y',strtotime($result['date']));?> 
		        </td>
		        <td><?php echo $result['event_informations'];?>
		        </td><td><a href='delete_event/<?php echo $result['EventId']?>' onclick='return confirm('Are You Sure?')'>Delete</a></td>
		      </tr>

      			<?php } ?>
      <!-- <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr> -->
     	
    </tbody>
  </table>
</div>
          

    </section>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" align="center" id="myModalLabel">Add New Event</h4>
      </div>
      <div class="modal-body">
      	<form action="newEventInsert" method="post" id="eventForm">
        <select name="empId[]" id="empId" class="required" multiple>
        	<option value=''>select</option>
        	<?php

        		foreach ($employeeinfo as $value) { ?>
        			<option value='<?php echo $value['id'];?>'><?php echo $value['name'];?></option>
        		<?php }

        	 ?>
        </select>
        <input class="required" name="date" id="datepicker" type="text" placeholder="Insert Date">
         <input class="required" name="event_info" id="event_info" type="text" placeholder="Add Event">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="Save changes"  value="Save changes">
    </form>
      </div>
    </div>
  </div>
</div>
      

  </body>
</html>