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
</head>
<body>
	
	<p><h1>Welcome<?php echo "\n".$name.",";?></h1></p>
	<a href="<?php echo base_url().'index.php/Hello/logout';?>"><input type="submit" id="logout" name="logout" value="Logout" class="btn btn-warning"></a>
	<a href="<?php echo base_url().'index.php/Hello/showalldata';?>"><input type="submit" id="shw" name="shw" value="show" class="btn btn-warning"></a>
	
</body>
</html>