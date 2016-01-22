<!DOCTYPE html> 
<html lang = "en"> 

   <head> 
      <meta charset = "utf-8"> 
      <title>Login</title> 
       <!-- Latest compiled and minified CSS -->
	   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	   <!-- jQuery library -->
	   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	   <!-- Latest compiled JavaScript -->
	   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url().'application/views/html/css/login.css';?>">
       <script type="text/JavaScript" src="<?php echo base_url().'application/views/html/js/login.js';?>"></script>
    </head>


    <body>
      <div align="center">
        <form action="<?php echo base_url().'index.php/Hello/login_page';?>" method="post" onsubmit="return validate()">
          <p><h2>Login</h2></p>
          <input type="text" id ="email1" name="email1" placeholder="Enter your email"><br/>
          <div id="error1" class="error"></div>
          <input type="password" id ="pwd1" name="pwd1" placeholder="Enter your password"><br/>
          <div id="error2" class="error"></div>
          <input type="submit" id="login" name="login" value="Login" class="btn btn-info">
          <div id="diviadd23" class="confirm"></div>
           <p>New Here? <a href="<?php echo base_url().'index.php/Hello/page'?>">Register here</a></p>
        </form>



        </div>
    </body>
</html>