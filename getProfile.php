<?php
require_once 'include/db_functions.php';
$response = array("error" => FALSE);
$email = $_POST['email'];
$user = getProfileByEmail($email);
if ($user) {
		$response["error"] = FALSE;
		$response["user"]["level"] = $user["level"];
		$response["user"]["tryTimes"] = $user["tryTimes"];
		$response["user"]["timeSpent"] = $user["timeSpent"];
		$response["user"]["score"] = $user["score"];
		echo json_encode($response);
	}else{
		$response["error"] = TRUE;
		$response["err_msg"] = "failed to get profile";
		echo json_encode($response);
	}


?>