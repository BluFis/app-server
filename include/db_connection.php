<?php

    define("DB_HOST","localhost");
	define("DB_USER","root");
	define("DB_PASSWORD","1q2w3e4r");
	define("DB_DATABASE","users");
	
	$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
	
	if (mysqli_connect_errno()){
		
		die("database connection failed " . "(" .
		   mysqli_connect_error() . " - " . mysqli_connect_errno() . ")"
		   );
	}
?>
	