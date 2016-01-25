<html>
<head>
	<title>
		Add Employee 
	</title>
	 <meta charset = "utf-8"> 
      <title>Login</title> 
       <!-- Latest compiled and minified CSS -->
	   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	   <!-- jQuery library -->
	   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	   <!-- Latest compiled JavaScript -->
	   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	   <script type="text/javascript" src="<?php echo base_url().'application/views/html/js/addemp.js';?>"></script>
	   <link rel="stylesheet" type="text/css" href="<?php echo base_url().'application/views/html/css/addemp.css';?>">
</head>
<body>
	<div align = 'center'>
		<p><h3>Add Employee</h3></p>
		
		<input type='text' id='empname' name='empname' placeholder='employee Name'><span class="glyphicon glyphicon-pencil"></span><br/>
		
		<input type='text' id='empemail' name='empemail' placeholder='employee Email'><span class="glyphicon glyphicon-pencil"></span><br/>
		
		<input type='password' id='emppass' name='emppass' placeholder='Password'><span class="glyphicon glyphicon-pencil"></span><br/>
		<input type='submit' id='addemp' name='addemp' class='btn btn-default' value='Add Employee'>
	</div>
	<br/>
	
	<div id="errorAdd" align="center" class='addemp'></div>
	
</body>
</html>