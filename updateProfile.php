<?php
require_once 'include/db_functions.php';
$response = array("error" => FALSE);
if (isset($_POST['email']) && isset($_POST['level']) && isset($_POST['tryTimes']) && isset($_POST['score']) && isset($_POST['timeSpent']) ){
	$email = $_POST['email'];
	$level = $_POST['level'];
	$tryTimes = $_POST['tryTimes'];
	$score = $_POST['score'];
	$timeSpent = $_POST['timeSpent'];
	 if (emailExists($email)) {
	 	$user = updateUser($email, $level, $tryTimes, $score, $timeSpent);
	 	  if($user){
	              $response["error"] = FALSE;
	              $response["err_msg"] = "saved";
		          echo json_encode($response);
                  }else{
	              $response["error"] = TRUE;
	              $response["err_msg"] = "UNknown error occurred!";
	              echo json_encode($response);
                  }
	 }else{
	$response["error"] = TRUE;
	$response["err_msg"] = "No such player";
	echo json_encode($response);
	 }


}else{
	$response["error"] = TRUE;
	$response["err_msg"] = "Required paraments missing!";
	echo json_encode($response);
}


?>