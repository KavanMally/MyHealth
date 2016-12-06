<!doctype html>

<html>

<head>

</head>

<body>


<?php
//visits.php
	$id = $_GET["id"];

	//connect 
	$servername = "localhost";
	$username = "root";
	$password = "Cleveland123";
	$dbname = "test";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if($conn->connect_error) die("Connection failed: " . $conn->connect_error);

	$input = htmlspecialchars(stripslashes($id));
	$sql = "SELECT rnum FROM names WHERE pid=".$input;	
	$result = $conn->query($sql);
	
	if($result->num_rows>0){
		
		while($row=$result->fetch_assoc()){
			echo $row["rnum"];
		}
	}

?>


</body>



</html>
