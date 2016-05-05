<html>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Left Sidebar</title>

  <link rel="stylesheet" href="css/demo.css">
  <link rel="stylesheet" href="css/sidebar-left.css">

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>

</head>



<body>
<div id="test" data-status='opened'>
         <div class="user">
          <img src="http://image.priceprice.k-img.com/ph/images/common/face_japan_01.gif" alt="Esempio" class="img-thumbnail">
          <a target="_blank" class="navbar-link">Admin</a>
        </div>
        <div class="list-group">
          <a class="list-group-item1"  href="<?php echo base_url()?>">Home</a>
          <a class="list-group-item1" href="<?php echo base_url();?>Admin#contact">Employee's Late</a>
          <a class="list-group-item1" href="<?php echo base_url();?>Admin#employeelate">Show all Employee</a>

          <a  class="list-group-item1" href="<?php echo base_url();?>Admin/showAllLateview">Employee's All Late Information</a>
          <a class="list-group-item1" href="<?php echo base_url();?>Admin/lunchorderview">Lunch order</a>
                    <a class="list-group-item1" href="<?php echo base_url();?>Admin/addlunchitems">Add Lunch Item</a>
          <a class="list-group-item1" href="<?php echo base_url();?>Admin/addEventview">Event</a>
          <a class="list-group-item1" href="<?php echo base_url();?>Admin/ShowPointHistory">Point History</a>
           <a class="list-group-item1" href="<?php echo base_url();?>Admin/empProductivity">Employee Productivity</a>
            <a class="list-group-item1" href="<?php echo base_url();?>Admin/lunchcost">Expendature For Lunch Program</a>
            <a class="list-group-item1" href="<?php echo base_url();?>Admin/attendance_bonus">Expendature For Attendence Bonus</a>
                        <a class="list-group-item1" href="<?php echo base_url();?>Admin/placelunchorder">Place Lunch Order In Behalf Of An Employee</a>
          <a class="list-group-item1" href="logout">Logout</a>
         
       </div>
</div>
</body>
</html>






















