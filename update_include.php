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


$en_include= $_POST['en_include'];

$fr_include= $_POST['fr_include'];

$ar_include= $_POST['ar_include'];


      // $sql = "update packages_include 
      //          set en_include_value = '$en_include',
      //          fr_include_value = '$fr_include',
      //          ar_include_value = '$ar_include'

      //       where packages_include.id = $id
      //       and packages_include.pack_id = $packid";


$stmt = mysqli_stmt_init($conn);

    $statmentQuery = "update packages_include 
                   set en_include_value = ?,
                   fr_include_value = ?,
                   ar_include_value = ?

                  where packages_include.id = ?
                  and packages_include.pack_id = ?";


     mysqli_stmt_prepare($stmt, $statmentQuery);

     mysqli_stmt_bind_param($stmt, "sssii", $en_include, $fr_include, $ar_include, $id, $packid);


         if(mysqli_stmt_execute($stmt)){

         	header("Location:view_package.php?packid=$packid");
         }else {
            echo "Error: Incorrect data please try again";
         }




?>