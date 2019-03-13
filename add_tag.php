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

$packid = $_GET['packid'];


$en_name= $_POST['en_tag'];

$fr_name= $_POST['fr_tag'];

$ar_name= $_POST['ar_tag'];


      $sql = "insert into tag (en_name, fr_name, ar_name) values ('$en_name', '$fr_name', '$ar_name')";


         if(mysqli_query($conn, $sql)){

         	$last_id = mysqli_insert_id($conn);

         	$sql = "insert into package_tag (pack_id, tag_id) values ($packid, $last_id)";


         	if(mysqli_query($conn, $sql)){

         		header("Location:view_package.php?packid=$packid");

	        }else {
	            echo "Error: Incorrect data please try again";
	           }

         }else {
            echo "Error: Incorrect data please try again";
         }




?>