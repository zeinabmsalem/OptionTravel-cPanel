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


$en_itinerary= $_POST['en_iternary'];

$fr_itinerary= $_POST['fr_iternary'];

$ar_itinerary= $_POST['ar_iternary'];


      // $sql = "insert into packages_itinerary (pack_id, en_itinerary, fr_itinerary, ar_itinerary) values ($packid, '$en_itinerary', '$fr_itinerary', '$ar_itinerary')";


$stmt = mysqli_stmt_init($conn);

    $statmentQuery = "insert into packages_itinerary (pack_id, en_itinerary, fr_itinerary, ar_itinerary) values (?, ?, ?, ?)";


     mysqli_stmt_prepare($stmt, $statmentQuery);

     mysqli_stmt_bind_param($stmt, "isss", $packid, $en_itinerary, $fr_itinerary, $ar_itinerary);



         if(mysqli_stmt_execute($stmt)){

            header("Location:view_package.php?packid=$packid");
         }else {
            echo "Error: Incorrect data please try again";
         }




?>