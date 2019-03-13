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

$transid = $_GET['transid'];



$sql = "DELETE from transportation_images where image_url = '$image'
					and trans_id = $transid";


         if(mysqli_query($conn, $sql)){

         	if (file_exists($image)) {
	
			    unlink($image);
			} 

         	header("Location:view_transportation.php?transid=$transid");
         }else {
            echo "Error: Incorrect data please try again";
         }




?>