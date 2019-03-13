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


$id = $_GET['tagid'];


      $sql = "delete from tag
               where tag.id = $id";


         if(mysqli_query($conn, $sql)){

         	header("Location:tag.php");
         }else {
            echo "Error: Incorrect data please try again";
         }




?>