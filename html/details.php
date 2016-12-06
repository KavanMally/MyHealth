<!doctype html>

<html>

<head>

</head>

<?php

	$id = $_GET["id"];

	//connect
	$servername = "localhost";
	$username = "root";
	$password = "Cleveland123";
	$dbname = "my_health";
	
	$conn = new mysqli($servername, $username, $password, $dbname);

	if($conn->connect_error) die("Connection failed: " . $conn->connect_error);
	$input = htmlspecialchars(stripslashes($id));
	$sql = "SELECT * FROM VISITS WHERE vID =  ". $input . ";"; 
	$result = $conn->query($sql);

	//spit data onto screen
	$row = $result -> fetch_assoc();
?>

<table style="width:50%" border="">
	<tr><th>Patient Details:</th></tr>
	<tr>
		<td>Height:</td>
		<td><?php echo $GLOBALS['row']['height']; ?> inches</td>
	</tr>


</body>

</html>
