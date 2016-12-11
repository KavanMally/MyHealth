<!doctype html>

<html>

<head>

</head>

<body>

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

	//check if it differs between vid and pid and get deps sorted out	
	$sql = 
	"SELECT * 
	FROM VISITS, VACCINES, PATIENT, HABITS
	WHERE vID = ". $input . " AND rid = ".$input . " AND PATIENT.pID = ".$input . " AND hID = ".$input .";"; 

	$result = $conn->query($sql);

	//spit data onto screen
	$row = $result -> fetch_assoc();

	$conn -> close();
?>

<table style="width:50%" border="">
	<tr rowspan=1><th>Patient Details:</th></tr>
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
	<tr><th>Readings:</th></tr>
	<tr>
		<td>Total Cholestoral</td>
		<td><?php echo $GLOBALS['row']['cholesteral']; ?> mmol/L</td>
	</tr>
	<tr>
		<td>LDC Cholesteral:</td>
		<td><?php echo $GLOBALS['row']['ldc_chol']; ?> mmol/L</td>
	</tr>
	<tr>
		<td>MDL Cholesteral:</td>
		<td><?php echo $GLOBALS['row']['mdl_chol']; ?> mmol/L</td>
	</tr>
	<tr>
		<td>Triglycerides:</td>
		<td><?php echo $GLOBALS['row']['triglycerides']; ?>mmol/L </td>
	</tr>
	<tr>
		<td>Glucose:</td>
		<td><?php echo $GLOBALS['row']['glucose']; ?> mmol/L</td>
	</tr>
	<tr>
		<td>Creatinine:</td>
		<td><?php echo $GLOBALS['row']['creatinine']; ?> mmol/L</td>
	</tr>
	<tr>
		<td>GFR:</td>
		<td><?php echo $GLOBALS['row']['GFR']; ?> mmol/L</td>
	</tr>
</table>
<br><br>

<table style="width:50%" border="">
	<tr><th>Habits:</th></tr>
	<tr>
		<td>Exercise:</td>
		<td><?php echo $GLOBALS['row']['hExercise']; ?></td>
	</tr>
	<tr>
		<td>Meals::</td>
		<td><?php echo $GLOBALS['row']['hMeal']; ?> </td>
	</tr>
	<tr>
		<td>Snacks:</td>
		<td><?php echo $GLOBALS['row']['hSnacks']; ?> </td>
	</tr>
	<tr>
		<td>Sleep:</td>
		<td><?php echo $GLOBALS['row']['hSleep']; ?></td>
	</tr>
	<tr>
		<td>Smoking:</td>
		<td><?php echo $GLOBALS['row']['hSmoke']; ?></td>
	</tr>

	<tr>
		<td>Alcohol</td>
		<td><?php echo $GLOBALS['row']['hAlcohol']; ?></td>
	</tr>

</table>
<br><br>

<table style="width:50%" border="">
	<tr><th>Vaccine Records:</th></tr>
	<tr>
		<td>Tetanus</td>
		<td><?php echo $GLOBALS['row']['rTdep']; ?></td>
	</tr>
	<tr>
		<td>Flu</td>
		<td><?php echo $GLOBALS['row']['rFlu']; ?></td>
	</tr>
	<tr>
		<td>HPV</td>
		<td><?php echo $GLOBALS['row']['rHPV']; ?> </td>
	</tr>
	<tr>
		<td>Hepititus A</td>
		<td><?php echo $GLOBALS['row']['rHepA']; ?></td>
	</tr>
	<tr>
		<td>Hepititus B</td>
		<td><?php echo $GLOBALS['row']['rHepB']; ?></td>
	</tr>
</table>
<br><br>



<br><br>




</body>


</html>
