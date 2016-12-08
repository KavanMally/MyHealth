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

	$conn -> close();
?>

<table style="width:50%" border="">
	<tr><th>Patient Details:</th></tr>
	<tr>
		<td>Height:</td>
		<td><?php echo $GLOBALS['row']['height']; ?> inches</td>
	</tr>
	<tr>
		<td>Weight:</td>
		<td><?php echo $GLOBALS['row']['weight']; ?> pounds</td>
	</tr>
	<tr>
		<td>Waist Circumference:</td>
		<td><?php echo $GLOBALS['row']['waist']; ?> inches</td>
	</tr>
	<tr>
		<td>Blood Pressure:</td>
		<td><?php echo $GLOBALS['row']['bp']; ?> mmHg</td>
	</tr>
	<tr>
		<td>Pulse:</td>
		<td><?php echo $GLOBALS['row']['pulse']; ?> bpm</td>
	</tr>
</table>
<br><br>

<table style="width:50%" border="">
	<tr>
		<td>Total Cholestoral</td>
		<td><?php echo $GLOBALS['row']['cholesteral']; ?> bpm</td>
	</tr>
	<tr>
		<td>LDC Cholesteral:</td>
		<td><?php echo $GLOBALS['row']['ldc_chol']; ?> bpm</td>
	</tr>
	<tr>
		<td>MDL Cholesteral:</td>
		<td><?php echo $GLOBALS['row']['mdl_chol']; ?> bpm</td>
	</tr>
	<tr>
		<td>Triglycerides:</td>
		<td><?php echo $GLOBALS['row']['triglycerides']; ?> bpm</td>
	</tr>
	<tr>
		<td>Glucose:</td>
		<td><?php echo $GLOBALS['row']['glucose']; ?> bpm</td>
	</tr>
	<tr>
		<td>Creatinine:</td>
		<td><?php echo $GLOBALS['row']['creatinine']; ?> bpm</td>
	</tr>
	<tr>
		<td>GFR:</td>
		<td><?php echo $GLOBALS['row']['GFR']; ?> bpm</td>
	</tr>


</table>

</body>

</html>
