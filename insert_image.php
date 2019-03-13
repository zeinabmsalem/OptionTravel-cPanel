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

$transid = $_GET['transid'];

            $target_dir = "upload/";

            $threshold = count($_FILES['file']['name']);

            for($i=0; $i < $threshold; $i++){

              $image_uniq = uniqid();
                
              $filename= $_FILES['file']['name'][$i];
                
              $targetFilem = $target_dir. $image_uniq. $filename; 
                
              move_uploaded_file($_FILES['file']['tmp_name'][$i], $targetFilem);

              $sqlimages = "INSERT INTO transportation_images (trans_id, image_url)  
              VALUES ($transid, '$targetFilem')";

              // echo $sqlimages;

              mysqli_query($conn, $sqlimages);

            }


header("Location:view_transportation.php?transid=$transid");




?>