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

	//get info from sql server
	$patient_query = 
	"SELECT * FROM PATIENT WHERE pID = ".$input.";";
	$patient_data = ($conn->query($patient_query))->fetch_assoc();


	$visit_query = 
	"SELECT vID, vDate
	 FROM VISITS
	 WHERE pID = ".$input . ";";	
	$visit_data = $conn->query($visit_query);

	$conn->close();




	

?>

<table style="width:50%" border="">
	<tr><th>Patient details:</ht></tr>
	<tr><td>Name: <?php echo $GLOBALS['patient_data']['pFirstName']. " ". $GLOBALS['patient_data']['pLastName'];?></td>
		<td>Matital Status: <?php echo $GLOBALS['patient_data']['pMarital'];?></td>
    </tr>
	<tr><td>Age: <?php echo $GLOBALS['patient_data']['pAge'];?></td></tr>
	<tr><td>Sex: <?php echo $GLOBALS['patient_data']['pGender'];?></td></tr>
</table>

<br>
<br>
<br>
<br>


<?php

	//display visit table		
	




	if($GLOBALS['visit_data']->num_rows>0){

		echo "<table style=\"width:50%\" border=\"\">";
		echo "<tr><th>Visit Dates:</th></tr>";
		
		while($row=$GLOBALS['visit_data']->fetch_assoc()){
			

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
