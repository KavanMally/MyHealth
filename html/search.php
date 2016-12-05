<!doctype html>

<html>

<head>
	<title>MyHealth Query Results</title>
	<meta charset="UTF-8">
</head>

<body>



<?php


$servername = "localhost";
$username = "root";
$password = "Cleveland123";
$dbname = "my_health";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn -> connect_error) die("Connection failed: " . $conn -> connect_error);
//echo "Connection successful! <br>";



//$conn = $my_connection::get_connection();
$input = htmlspecialchars(stripslashes($_POST["query"]));
//$input = $_POST["query"];
//echo $_POST["query"] . "<br>";
//echo $input . "<br>";



$sql = "SELECT pID, pName FROM PATIENT WHERE pName LIKE '%" . $input . "%' ORDER BY pName ASC;";

//echo $sql;
//echo "<br>";
$result = $conn -> query($sql);

if ($result->num_rows > 0){
	
	echo "<table style=\"width:50%\" border=\"\">";
	//echo "<tr><th>pid</th><th>name</th></tr>";
	echo "<tr><th>Patient Results:</th></tr>";

	//check to see if you can integer loop arr to make columns more dynamic
	while($row = $result->fetch_assoc()){
		echo "<tr>";

	//	echo "<td>" . $row["pid"] . "</td>";
		echo "<td><a href=visits.php?id=".$row["pID"].">"
		. $row["pName"] . "</a>"."</td>";

		echo "</tr>";	
	}
	//echo "pid: " . $row["pid"]. " name: " . $row["name"] . "<br>";
}
else echo "0 results<br>";

echo "</table>";

$conn->close();


?>


</body>

</html>


