<!doctype html>

<html>

<head>
	<title>MyHealth Query Results</title>
	<meta charset="UTF-8">
</head>

<body>


<?php
//search.php
$servername = "localhost";
$username = "root";
$password = "Cleveland123";
$dbname = "my_health";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn -> connect_error) die("Connection failed: " . $conn -> connect_error);
//echo "Connection successful! <br>";

//include 'my_connection.php';

$input = htmlspecialchars(stripslashes($_POST["query"]));
//$input = $_POST["query"];
//echo $_POST["query"] . "<br>";
//echo $input . "<br>";

$parts = explode(" ", $input);
$lastname = array_pop($parts);
$firstname = implode(" ", $parts);


$sql = 
"SELECT pID, pFirstName, pLastName 
FROM PATIENT 
WHERE pFirstName LIKE '" . $firstname . "' OR pLastName LIKE '" . $lastname . "'
OR pFirstName LIKE '" . $lastname . "' OR pLastName LIKE '".$firstname."'
ORDER BY pFirstName ASC;";

//echo $sql;
//echo "<br>";
$result = $conn -> query($sql);

if ($result->num_rows > 0){
	
	echo "<table style=\"width:50%\" border=\"\">";
	echo "<tr><th>Patient Results:</th></tr>";

	while($row = $result->fetch_assoc()){
		echo "<tr>";

		echo "<td><a href=visits.php?id=".$row["pID"].">"
		. $row["pFirstName"]. " " . $row["pLastName"] . "</a>"."</td>";

		echo "</tr>";	
	}
}
else echo "0 results<br>";

echo "</table>";

$conn->close();


?>


</body>

</html>


