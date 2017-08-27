<?php

require_once 'include/db_functions.php';
$response = array("error" => FALSE);

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){

	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
     
    if ($email != ""){
    	
    	if($password != ""){
    		
    		if ($username != ""){
    			
             if (emailExists($email)) {
		     $response["error"] = TRUE;
		     $response["err_msg"] = "Email already exists wuth " . $email;
		     echo json_encode($response);
	         }else{
		     $user = storeUser($username, $email, $password);
		         if($user){
	              $response["error"] = FALSE;
		          $response["user"]["id"] = $user["id"];
		          $response["user"]["email"] = $user["email"];
		          $response["user"]["username"] = $user["username"];
		          $response["user"]["email"] = $user["email"];
		          echo json_encode($response);
                  }else{
	              $response["error"] = TRUE;
	              $response["err_msg"] = "UNknown error occurred!";
	              echo json_encode($response);
                  }
               }
    		}else{
    		$response["error"] = TRUE;
		    $response["err_msg"] = "Empty username" ;
		    echo json_encode($response);	
    		}
    	}else{
    		 $response["error"] = TRUE;
		     $response["err_msg"] = "Empty password" ;
		     echo json_encode($response);
    	}
    }else{
    	$response["error"] = TRUE;
		$response["err_msg"] = "Empty email" ;
		echo json_encode($response);	
    }
}else{
	$response["error"] = TRUE;
	$response["err_msg"] = "Required paraments missing!";
	echo json_encode($response);
}


	
?>