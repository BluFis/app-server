<?php require_once("include/db_connection.php");?>
<?php
     
	 function storeUser($username, $email, $password){
		 
		 global $connection;
		 
		 $query = "INSERT INTO users(";
		 $query .= "username, email, password, level, score, tryTimes,timeSpent) ";
		 $query .= "VALUES ( '{$username}', '{$email}', '{$password}', 0, 0, 0, '00:00')";
		 
		 $result = mysqli_query($connection, $query);
		 
		 if($result){
			 $user = "SELECT * FROM users WHERE email = '{$email}'";
			 $res = mysqli_query($connection, $user);
			 
			 while ($user = mysqli_fetch_assoc($res)){
				 return $user;
			 }
		 }else{
			 return false;
		 }
	 }
	 function order(){
	 	
	 }

	 function updateUser($email, $level, $tryTimes, $score, $timeSpent){
	 	global $connection;
	 	$datetime = date('y-m-d h:i:s',time());
	 	$query = "UPDATE users SET lastLogin = '".$datetime."',level = '{$level}',tryTimes = '{$tryTimes}', score = '{$score}',timeSpent = '{$timeSpent}' WHERE email = '{$email}'";
	 	$result = mysqli_query($connection, $query);
		 
		 if($result){
			 $user = "SELECT * FROM users WHERE email = '{$email}'";
			 $res = mysqli_query($connection, $user);
			 
			 while ($user = mysqli_fetch_assoc($res)){
				 return $user;
			 }
		 }else{
			 return false;
		 }
	 }
	 
	 function getUserByEmailAndPassword($email, $password){
		 global $connection;
		 $query = "SELECT * FROM users Where email = '{$email}' and password = '{$password}'";
		 $user = mysqli_query($connection, $query);
		 
		 if($user){
			 while ($res = mysqli_fetch_assoc($user)){
			 
			 	$datetime = date('y-m-d h:i:s',time());
			 	$query2 = "UPDATE users SET lastLogin = '".$datetime."' WHERE email = '{$email}'";
			 	mysqli_query($connection, $query2);
				return $res;
			 }
		 }else{
			 return false;
		 }
	 }
	 function getProfileByEmail($email){
        global $connection;
        $query = "SELECT * FROM users Where email = '{$email}'";
        $user = mysqli_query($connection, $query);
        if($user){
                while ($res = mysqli_fetch_assoc($user)){
			 	$datetime = date('y-m-d h:i:s',time());
			 	$query2 = "UPDATE users SET lastLogin = '".$datetime."' WHERE email = '{$email}'";
			 	mysqli_query($connection, $query2);
				return $res;
			 }
			}else{
             return false;
			}
         
       
	 }
	 function emailExists($email){
		 global $connection;
		 $query = "SELECT email from users where email = '{$email}'";
		 $result = mysqli_query($connection, $query);
		 if (mysqli_num_rows($result) > 0){
			 return true;
		 }else{
			 return false;
		 }
	 }
	 ?>
		 