<?php 

	$host = "localhost";
	$user = "root";
	$pass = "";
	$db   = "phonebook";

	$conn = new mysqli($host, $user, $pass, $db);


	if ($conn->error) {
		die("Could not connect to the database!");
	}


 ?>