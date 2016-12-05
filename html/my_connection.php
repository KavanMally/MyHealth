

<?php

class my_connection{
static public function get_connection(){

	echo "test<br>";
	$servername="localhost";
	$username="root";
	$password="Cleveland123";
	$dbname="test";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if($conn->connect_error) die("Connection failed: ".$conn->connect_error);

	return $conn;

}
}
?>
