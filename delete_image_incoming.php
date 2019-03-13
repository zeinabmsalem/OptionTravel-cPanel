<?php

include("dbconn.php");

$userType_id;
session_start();
if (empty($_SESSION['userType_id'])) {
    header("Location:loginpage.php");
} else {
    $userType_id = $_SESSION['userType_id'];
    $refrence_id = $_SESSION['refrence_id'];
}

$image = $_GET['image'];

$packid = $_GET['packid'];



$sql = "DELETE from packages_images where img_url = '$image'
					and pack_id = $packid";


         if(mysqli_query($conn, $sql)){

         	if (file_exists($image)) {
	
			    unlink($image);
			} 

         	header("Location:view_package.php?packid=$packid");
         }else {
            echo "Error: Incorrect data please try again";
         }




?>