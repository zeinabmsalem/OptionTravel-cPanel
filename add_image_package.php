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

            $target_dir = "upload/";

            $threshold = count($_FILES['file']['name']);

            for($i=0; $i < $threshold; $i++){

              $image_uniq = uniqid();
                
              $filename= $_FILES['file']['name'][$i];
                
              $targetFilem = $target_dir. $image_uniq. $filename; 
                
              move_uploaded_file($_FILES['file']['tmp_name'][$i], $targetFilem);

              $sqlimages = "INSERT INTO packages_images (pack_id, img_url)  
              VALUES ($packid, '$targetFilem')";


              mysqli_query($conn, $sqlimages);

            }


header("Location:view_package.php?packid=$packid");




?>