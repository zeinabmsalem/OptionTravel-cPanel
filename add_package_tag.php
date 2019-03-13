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

$get_tag_id = $_POST['get_tag'];


// $sql = "insert into package_tag (pack_id, tag_id) values ($packid, $get_tag_id)";


$stmt = mysqli_stmt_init($conn);

    $statmentQuery = "insert into package_tag (pack_id, tag_id) values (?, ?)";


     mysqli_stmt_prepare($stmt, $statmentQuery);

     mysqli_stmt_bind_param($stmt, "ii", $packid, $get_tag_id);



            if(mysqli_stmt_execute($stmt)){

                header("Location:view_package.php?packid=$packid");

            }else {
                echo "Error: Incorrect data please try again";
               }


?>