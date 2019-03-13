<?php

include("dbconn.php"); 


$username = $_POST['username'];
$password = $_POST['password'];



if($username=='admin' && $password=='admin123')
{
	session_start();
			ob_start();
			$row=mysqli_fetch_array($strId_result,MYSQLI_ASSOC);

		 	$_SESSION['user_id']= 1;
		 	$_SESSION['refrence_id']=  1;
		 	$_SESSION['userType_id']=  1;  

			header("Location: transportation.php");
			exit;
}else {
             
        $message="invaild username or password";
	    header("Location: loginpage.php?message=".$message);
	    exit;

    }

     

?>