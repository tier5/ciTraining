<html>

	<head>
			
			<script src="<?php echo base_url().'application/views/buttons.js';?>"></script>
			


	</head>

	<body>

		<h1>hello</h1>
		<input type="text" id="textbox" value="<?php echo site_url('/g/t');?>">
		<input type="button" id="mybtn" value="click">

		<h1>hello <?php echo $name.""; ?></h1>

		<div id="show"></div>

	</body>

</html>