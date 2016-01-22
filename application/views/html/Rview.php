<html>
<head>

<title>Registration Form In CodeIgniter</title>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>

<body>

<h3 align="center"> Registration Form </h3>
	
	

<form style="text-align:center" method="POST" action= "http://localhost/ci/index.php/Rcontrol/" >

    <input type="text" id="name" name="name" placeholder="Enter Your Name Here">
    </br>
    <input type="email" id="email" name="email" placeholder="Enter Your Email Here">
    </br>
    <input type="password" id="pwd" name="pwd" placeholder="Enter Password Here">
    </br>
    <input type="submit" class="btn btn-warning" value="Submit" id="register" name="register">
</form>

<div align="center">
  Already Registered??
</br>
    <a href="http://localhost/ci/index.php/Rcontrol/loginpage">Click Here For Log In</a>

</div>

</body>
</html>