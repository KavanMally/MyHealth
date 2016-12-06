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
	$dbname = "my_health";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if($conn->connect_error) die("Connection failed: " . $conn->connect_error);

	$input = htmlspecialchars(stripslashes($id));
	$sql = 
	"SELECT vID, vDate
	 FROM VISITS
	 WHERE pID = ".$input . ";";	
	
	$result = $conn->query($sql);

		
	if($result->num_rows>0){

		echo "<table style=\"width:50%\" border=\"\">";
		echo "<tr><th>Visit Dates:</th></tr>";
		
		while($row=$result->fetch_assoc()){
			

			echo "<tr>";
			echo "<td><a href=details.php?id=".$row["vID"].">"
			. $row["vDate"] . "</a></td>";
			echo "</tr>";
		}
	}
	else echo "0 results<br>";

	echo "</table>";

?>


</body>



</html>
