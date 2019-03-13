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


$en_iternary= $_POST['en_iternary'];

$fr_iternary= $_POST['fr_iternary'];

$ar_iternary= $_POST['ar_iternary'];


      // $sql = "update packages_itinerary 
      //          set en_itinerary = '$en_iternary',
      //          fr_itinerary = '$fr_iternary',
      //          ar_itinerary = '$ar_iternary'

      //       where packages_itinerary.id = $id
      //       and packages_itinerary.pack_id = $packid";


$stmt = mysqli_stmt_init($conn);

    $statmentQuery = "update packages_itinerary 
                       set en_itinerary = ?,
                       fr_itinerary = ?,
                       ar_itinerary = ?

                      where packages_itinerary.id = ?
                      and packages_itinerary.pack_id = ?";


     mysqli_stmt_prepare($stmt, $statmentQuery);

     mysqli_stmt_bind_param($stmt, "sssii", $en_iternary, $fr_iternary, $ar_iternary, $id, $packid);



         if(mysqli_stmt_execute($stmt)){

         	header("Location:view_package.php?packid=$packid");
         }else {
            echo "Error: Incorrect data please try again";
         }




?>