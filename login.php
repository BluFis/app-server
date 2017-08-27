<?php
require_once 'include/db_functions.php';

$response = array("error" => FALSE);

if (isset($_POST['email']) && isset($_POST['password'])){
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$user = getUserByEmailAndPassword($email, $password);
	
	if ($user != false) {
		$response["error"] = FALSE;
		$response["user"]["id"] = $user["id"];
		$response["user"]["email"] = $user["email"];
		$response["user"]["username"] = $user["username"];
		$response["user"]["email"] = $user["email"];
		
		echo json_encode($response);
	}else{
		$response["error"] = TRUE;
		$response["err_msg"] = "Wrong email or password";
		echo json_encode($response);
	}
}else{
	$response["error"] = TRUE;
	$response["err_msg"] = "Required parameters missing :(!";
	echo json_encode($response);
}
?>