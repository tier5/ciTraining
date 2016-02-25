<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<?php include 'employeeheader.php';?>
</head>
<style>
.fa-spinner
{

	color:#4598D6;


}
#spinner
{
	/*vertical-align: center;
	margin: 0px auto;*/
	 width: 100px;
    height: 100px;
    

    position: absolute;
    top:0;
    bottom: 0;
    left: 0;
    right: 0;

    margin: auto;
}

</style>

<script type="text/javascript">

	alert('hello');

		$('#mybtn').click(function(){

			

			$('#spinner').append("<i align='center' class='fa fa-spinner fa-pulse fa-5x'></i>");

		});



</script>



<body>

<button class='btn btn-lg btn-primary' id="mybtn">press</button>
<div id='spinner'>


</div>


	
</body>
</html>