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

$id = $_GET['id'];



      $sql = "delete from packages_pricing

            where packages_pricing.id = $id
            and packages_pricing.pack_id = $packid";


         if(mysqli_query($conn, $sql)){

         	header("Location:view_package.php?packid=$packid");
         }else {
            echo "Error: Incorrect data please try again";
         }




?>