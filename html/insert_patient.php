
<!doctype html>

<html>

<head>
<h1>Insert Patient Record</h1>
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
	$count = "SELECT COUNT(pID) FROM PATIENT;";
	$result = $conn->query($count);
	$result = $result->fetch_assoc();
	$sql = 
	"INSERT INTO PATIENT SET pID=".($result["COUNT(pID)"]+1).", pFirstName=\"".$_POST["firstname"]."\", pLastName=\"".$_POST["lastname"] . "\", pBday = ".$_POST["birthday"]. ", pAge = ".$_POST["age"]." , pGender = \"".$_POST["gender"]. "\", pMarital = \"".$_POST["marital_status"]."\", pDem = \"".$_POST["demographic"]."\";";

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
	Gender:
	<input type="text" name="gender" value="">
	<br>
	Age:<br>
	<input type="text" name="age" value="">
	<br>
 	Birthday:<br>
	<input type="text" name="birthday" value="">
	<br>
  	Martial Status:<br>
	<input type="text" name="marital_status" value="">
	<br>
  	Demographic:<br>
	<input type="text" name="demographic" value="">
	<br>

	<input type="submit" value="Submit">
</form> 

<?php 

?>

</body>

</html>
