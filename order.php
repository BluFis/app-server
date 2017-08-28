<?php
require_once 'include/db_functions.php';
$response = array("error" => FALSE);

$return_array = order();

if($return_array){
	$response["error"] = FALSE;
	for($i = 0;$i < count($return_array);$i++){
		$response[$i]["username"] = $return_array[$i][0];
		$response[$i]["level"] = $return_array[$i][1];
		$response[$i]["tryTimes"] = $return_array[$i][2];
		$response[$i]["score"] = $return_array[$i][3];
		$response[$i]["timeSpent"] = $return_array[$i][4];
	}
	echo json_encode($response);
    }else{
		$response["error"] = TRUE;
		$response["err_msg"] = "failed to get profile";
		echo json_encode($response);
	}
		
		





?>