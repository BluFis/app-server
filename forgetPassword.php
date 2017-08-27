<?php
require_once 'include/db_functions.php';//连接数据库
require_once 'include/db_connection.php';
$response = array("error" => FALSE);
if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['identify'])){
	global $connection;
	$username = $_POST['username'];
	$email = $_POST['email'];
	$identify = $_POST['identify'];
	if ($identify == null){
        if (emailExists($email)) {
			$time = date('Y-m-d H:i'); 
			$checknum = rand(1001,9999)
            $result = sendmail($time,$email,$checknum); 
               if($result==1){//邮件发送成功 
                    $response["error"] = FALSE;
	                $response["err_msg"] = "Email send,please check you email to get the identify number";	
	                echo json_encode($response);
			        $query = "update users set getpasstime='{$getpasstime}' , checknum = '{$checknum}' where id='{$uid}'"
                    mysqli_query($connection, $query); 
                }else{ 
                    $response["error"] = TRUE;
	                $response["err_msg"] = "Email is not available";	
	                echo json_encode($response);
                } 
            }else{ 
	            $response["error"] = TRUE;
	            $response["err_msg"] = "No such email" . $email;	
	            echo json_encode($response);
            }
	
        }else{
		if (emailExists($email)) {
		    $time = date('Y-m-d H:i'); 
			$query = "SELECT checknum from users where email = '{$email}'";
            $checknum = mysqli_query($connection, $query); 
			if ($checknum == $identify){
			$response["error"] = FALSE;
	        $response["err_msg"] = "checked";	
	        echo json_encode($response);	
			}else{
			$response["error"] = TRUE;
	        $response["err_msg"] = "identify number wrong,please check again";	
	        echo json_encode($response);	
			}
		}else{
			$response["error"] = TRUE;
	        $response["err_msg"] = "No such email" . $email;	
	        echo json_encode($response);	
			}	
		
		}	

	}
function sendmail($time,$email,$checknum){ 
    include_once("smtp.class.php"); 
    $smtpserver = "smtp.tom.com"; //SMTP服务器，如smtp.163.com 
    $smtpserverport = 25; //SMTP服务器端口 
    $smtpusermail = "newgenius@tom.com"; //SMTP服务器的用户邮箱 
    $smtpuser = "newgenius@tom.com"; //SMTP服务器的用户帐号 
    $smtppass = "1q2w3e4r"; //SMTP服务器的用户密码 
    $smtp = new Smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass);
    //这里面的一个true是表示使用身份验证,否则不使用身份验证. 
    $emailtype = "HTML"; //信件类型，文本:text；网页：HTML 
    $smtpemailto = $email; 
    $smtpemailfrom = $smtpusermail; 
    $emailsubject = "找回密码"; 
    $emailbody = "亲爱的".$email."：
    您在".$time."提交了找回密码请求。您的识别码24小时内有效
    ".$checknum.""; 
    $rs = $smtp->sendmail($smtpemailto, $smtpemailfrom, $emailsubject, $emailbody, $emailtype); return $rs; 
}




