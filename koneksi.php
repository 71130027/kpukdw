<?php
	$servername = "kapeti.hol.es";
	$username = "u604461971_kpti";
	$password = "kapefakultas2016";
	$dbname = "u604461971_kpti";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
?>