<html>
<head>
<title></title>
<meta charset = "utf-8"> 
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.mincss">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<body>
<?php 

foreach ($title as $q)
{
	echo "Name:" .$q->email."\n &nbsp Email:".$q->name."<br/>";
}





?>

</body>

</html>