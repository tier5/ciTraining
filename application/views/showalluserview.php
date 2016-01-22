<html>

	<body>
		<div align='center'>

			<h2>Show All Users</h2>
			
			<?php 

				foreach ($info as $val) 
			{
				echo $val->name." ".$val->id." ".$val->password."</br>";
			}

			?>
			

		</div>
		

	</body>


</html>