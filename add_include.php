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


$en_include_value= $_POST['en_include'];

$fr_include_value= $_POST['fr_include'];

$ar_include_value= $_POST['ar_include'];


      // $sql = "insert into packages_include (pack_id, en_include_value, fr_include_value, ar_include_value) values ($packid, '$en_include_value', '$fr_include_valu', '$ar_include_value')";


$stmt = mysqli_stmt_init($conn);

    $statmentQuery = "insert into packages_include (pack_id, en_include_value, fr_include_value, ar_include_value) values (?, ?, ?, ?)";


     mysqli_stmt_prepare($stmt, $statmentQuery);

     mysqli_stmt_bind_param($stmt, "isss", $packid, $en_include_value, $fr_include_value, $ar_include_value);



         if(mysqli_stmt_execute($stmt)){

            header("Location:view_package.php?packid=$packid");
         }else {
            echo "Error: Incorrect data please try again";
         }




?>