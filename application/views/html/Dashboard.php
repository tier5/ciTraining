<!DOCTYPE html>
<html>
<head>
	<title>
		Welcome
	</title>
	 <meta charset = "utf-8"> 
      <title>Login</title> 
       <!-- Latest compiled and minified CSS -->
	   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	   <!-- jQuery library -->
	   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	   <!-- Latest compiled JavaScript -->
	   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	   <script type="text/javascript" src="<?php echo base_url().'application/views/html/js/Dashboard.js';?>"></script>
	   <link rel="stylesheet" type="text/css" href="<?php echo base_url().'application/views/html/css/register.css';?>">
</head>
<body>
	
	<p><h1>Welcome<?php echo "\n".$name.",";?></h1></p>
	<a href="<?php echo base_url().'index.php/Hello/logout';?>"><input type="submit" id="logout" name="logout" value="Logout" class="btn btn-warning"></a>
	<input type="submit" id="shw" name="shw" value="show" class="btn btn-warning">
	<br/>
	<div id="datashow" class="style"></div>
</body>
</html>