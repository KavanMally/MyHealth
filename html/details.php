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

	$patient_query = 
	"SELECT * 
	FROM PATIENT, VISITS
	WHERE PATIENT.pID = VISITS.pID and VISITS.vID = ". $input.";";


	$readings_query = 
	"SELECT *
	FROM VISITS
	WHERE vID = ".$input.";";

	$habit_query = 
	"SELECT *
	FROM HABITS, VISITS
	WHERE HABITS.hid = VISITS.pID and VISITS.vID = ". $input;

	$vaccine_query = 
	"SELECT *
	FROM VACCINES, VISITS
	WHERE VACCINES.rid = VISITS.pid and VISITS.vID = ". $input;

	$patient_result = $conn->query($patient_query);
	$readings_result = $conn->query($readings_query);
	$habit_result = $conn->query($habit_query);
	$vaccine_result = $conn->query($vaccine_query);


	//spit data onto screen
	$patient_row = $patient_result -> fetch_assoc();
	$readings_row = $readings_result -> fetch_assoc();
	$habits_row = $habit_result -> fetch_assoc();
	$vaccine_row = $vaccine_result -> fetch_assoc();

	$conn -> close();
?>

<table style="width:50%" border="">
	<tr><th colspan="2">Patient Details:</th></tr>
	<tr>
		<td>Height:</td>
		<td><?php echo $GLOBALS['patient_row']['height']; ?> inches</td>
	</tr>
	<tr>
		<td>Weight:</td>
		<td><?php echo $GLOBALS['patient_row']['weight']; ?> pounds</td>
	</tr>
	<tr>
		<td>Waist Circumference:</td>
		<td><?php echo $GLOBALS['patient_row']['waist']; ?> inches</td>
	</tr>
	<tr>
		<td>Blood Pressure:</td>
		<td><?php echo $GLOBALS['patient_row']['bp']; ?> mmHg</td>
	</tr>
	<tr>
		<td>Pulse:</td>
		<td><?php echo $GLOBALS['patient_row']['pulse']; ?> bpm</td>
	</tr>
</table>
<br><br>

<table style="width:50%" border="">
	<tr><th colspan="2">Readings:</th></tr>
	<tr>
		<td>Total Cholestoral</td>
		<td><?php echo $GLOBALS['readings_row']['cholesteral']; ?> mmol/L</td>
	</tr>
	<tr>
		<td>LDC Cholesteral:</td>
		<td><?php echo $GLOBALS['readings_row']['ldc_chol']; ?> mmol/L</td>
	</tr>
	<tr>
		<td>MDL Cholesteral:</td>
		<td><?php echo $GLOBALS['readings_row']['mdl_chol']; ?> mmol/L</td>
	</tr>
	<tr>
		<td>Triglycerides:</td>
		<td><?php echo $GLOBALS['readings_row']['triglycerides']; ?>mmol/L </td>
	</tr>
	<tr>
		<td>Glucose:</td>
		<td><?php echo $GLOBALS['readings_row']['glucose']; ?> mmol/L</td>
	</tr>
	<tr>
		<td>Creatinine:</td>
		<td><?php echo $GLOBALS['readings_row']['creatinine']; ?> mmol/L</td>
	</tr>
	<tr>
		<td>GFR:</td>
		<td><?php echo $GLOBALS['readings_row']['GFR']; ?> mmol/L</td>
	</tr>
</table>
<br><br>

<table style="width:50%" border="">
	<tr><th colspan="2">Habits:</th></tr>
	<tr>
		<td>Exercise:</td>
		<td><?php echo $GLOBALS['habits_row']['hExercise']; ?></td>
	</tr>
	<tr>
		<td>Meals::</td>
		<td><?php echo $GLOBALS['habits_row']['hMeal']; ?> </td>
	</tr>
	<tr>
		<td>Snacks:</td>
		<td><?php echo $GLOBALS['habits_row']['hSnacks']; ?> </td>
	</tr>
	<tr>
		<td>Sleep:</td>
		<td><?php echo $GLOBALS['habits_row']['hSleep']; ?></td>
	</tr>
	<tr>
		<td>Smoking:</td>
		<td><?php echo $GLOBALS['habits_row']['hSmoke']; ?></td>
	</tr>

	<tr>
		<td>Alcohol</td>
		<td><?php echo $GLOBALS['habits_row']['hAlcohol']; ?></td>
	</tr>

</table>
<br><br>

<table style="width:50%" border="">
	<tr><th colspan="2">Vaccine Records:</th></tr>
	<tr>
		<td>Tetanus</td>
		<td><?php echo $GLOBALS['vaccine_row']['rTdep']; ?></td>
	</tr>
	<tr>
		<td>Flu</td>
		<td><?php echo $GLOBALS['vaccine_row']['rFlu']; ?></td>
	</tr>
	<tr>
		<td>HPV</td>
		<td><?php echo $GLOBALS['vaccine_row']['rHPV']; ?> </td>
	</tr>
	<tr>
		<td>Hepititus A</td>
		<td><?php echo $GLOBALS['vaccine_row']['rHepA']; ?></td>
	</tr>
	<tr>
		<td>Hepititus B</td>
		<td><?php echo $GLOBALS['vaccine_row']['rHepB']; ?></td>
	</tr>
</table>
<br><br>


<br><br>


</body>


</html>
