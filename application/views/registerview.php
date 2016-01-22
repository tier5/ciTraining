<html>

<head>


</head>


<body>

	<div align="center">

			<form action="<?php echo base_url().'index.php/Register/register';?>" method="POST">

				<table>
					<tr>
						<td>NAME</td>
						<td><input type="text" name="name"></td>
					</tr>

					<tr>
						<td>PASSWORD</td>
						<td><input type="password" name="password"></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="submit" value="submit"></td>
					</tr>
				</table>
			</form>

	</div>

	

</body>



</html>