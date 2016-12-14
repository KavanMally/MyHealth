
<!doctype html>

<html>

<head>
<h1>Add Doctor Record</h1>
</head>

<body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$servername = "localhost";
	$username = "root";
	$password = "Cleveland123";
	$dbname = "my_health";
		
	$conn = new mysqli($servername, $username, $password, $dbname);

	if($conn->connect_error) die("Connection failed: " . $conn->connect_error);
	$count = "SELECT COUNT(did) FROM DOCTOR;";
	$result = $conn->query($count);
	$result = $result->fetch_assoc();
	$sql = 
	"INSERT INTO DOCTOR SET did=".($result["COUNT(did)"]+1).", dFirstName=\"".$_POST["firstname"]."\", dLastName=\"".$_POST["lastname"] . "\", dbday = ".$_POST["birthday"]. ", field = \"".$_POST["field"]."\";";

	//echo $sql;

	if($conn->query($sql) === TRUE) echo "New Record Created!";
	else "ERROR:" . $sql . "<br>". $conn->error;

	$conn->close();
}
?>

<form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>" >
	First name:<br>
	<input type="text" name="firstname" value="">
	<br>
	Last name:<br>
 	<input type="text" name="lastname" value="">
	<br><br>
 	Birthday:<br>
	<input type="text" name="birthday" value="">
	<br>
  	Field of Practice:<br>
	<input type="text" name="field" value="">
	<br>

	<input type="submit" value="Submit">
</form> 

<?php 

?>

</body>

</html>
