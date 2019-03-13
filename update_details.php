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

$details_id = $_GET['details_id'];


$en_transportation_details= $_POST['en_details'];

$fr_transportation_details= $_POST['fr_details'];

$ar_transportation_details= $_POST['ar_details'];


      // $sql = "update transportation_details 
      //       set en_transportation_details = '$en_transportation_details',
      //          fr_transportation_details = '$fr_transportation_details',
      //          ar_transportation_details = '$ar_transportation_details'

      //       where transportation_details.trans_id = $transid
      //              and transportation_details.id = $details_id";


$stmt = mysqli_stmt_init($conn);

    $statmentQuery = "update transportation_details 
            set en_transportation_details = ?,
               fr_transportation_details = ?,
               ar_transportation_details = ?

            where transportation_details.trans_id = ?
                   and transportation_details.id = ?";


     mysqli_stmt_prepare($stmt, $statmentQuery);

          mysqli_stmt_bind_param($stmt, "sssii", $en_transportation_details, $fr_transportation_details, $ar_transportation_details, $transid, $details_id);


         if(mysqli_stmt_execute($stmt)){

         	header("Location:view_transportation.php?transid=$transid");
         }else {
            echo "Error: Incorrect data please try again";
         }




?>