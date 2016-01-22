<!DOCTYPE html> 
<html lang = "en"> 

   <head> 
      <meta charset = "utf-8"> 
      <title>Register</title> 
       <!-- Latest compiled and minified CSS -->
	   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	   <!-- jQuery library -->
	   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	   <!-- Latest compiled JavaScript -->
	   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      <script type="text/JavaScript" src="<?php echo base_url().'application/views/html/js/register.js';?>"></script>
      
      <link rel="stylesheet" type="text/css" href="<?php echo base_url().'application/views/html/css/register.css';?>">
   </head>
	
   <body> 
   	<div align="center">
      
     
   		<p><h3>Registration Form</h3></p>
      <input type="text" id ="name" name="name" placeholder="Enter your name"><br/>
      <div id="err1" class="error"></div>
      <input type="password" id ="pwd" name="pwd" placeholder="Enter your password"><br/>
      <div id="err2" class="error"></div>
      <input type="text" id ="email" name="email" placeholder="email@domain.com"><br/>
      <div id="err3" class="error"></div>
      <input type="submit" id="reg" name="reg" value="register" class="btn btn-info">
      <div id="diviadd" class="confirm"></div>
      <!---<?php echo site_url(); ?>-->
      <p>Already a Member ? <a href="<?php echo base_url().'index.php/Hello/load_login'?>">login</a></p>
      
      
      </div>
     
   </body>
	
</html>