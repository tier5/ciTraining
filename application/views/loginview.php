<html>
	
	
<head>


	<title>Login</title>
</head>

<body>

	<div align='center'>

		<h2>LOGIN</h2>
			<form action="<?php echo base_url()."index.php/Register/login";?>" method="POST">
				<table>
					<tr>
						<td>NAME</td>
						<td><input type="text" id="name" name="name"></td>
					</tr>

					<tr>
						<td>PASSWORD</td>
						<td><input type="password" id="password" name="password"></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="submit" id="submit" value="submit"></td>
					</tr>
				</table>
			</form>

		<h5><a href='<?php echo base_url().'index.php/Register/showRegistration';?>'>click here</a> To Register</h5>

		<h5><a href='<?php echo base_url().'index.php/Register/showAllUser';?>'>click here</a> To See All Users</h5>



		<div id="show"></div>

	</div>

</body>

</html>