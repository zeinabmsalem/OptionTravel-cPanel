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


$en_title_price= $_POST['en_title_price'];

$fr_title_price= $_POST['fr_title_price'];

$ar_title_price= $_POST['ar_title_price'];


$en_price_value= $_POST['en_price_value'];

$fr_price_value= $_POST['fr_price_value'];

$ar_price_value= $_POST['ar_price_value'];


      // $sql = "update packages_pricing 

      //          set en_title_price = '$en_title_price',
      //          en_price_value = '$en_price_value',
      //          fr_title_price = '$fr_title_price',

      //          fr_price_value = '$fr_price_value',
      //          ar_title_price = '$ar_title_price',
      //          ar_price_value = '$ar_price_value'

      //       where packages_pricing.id = $id
      //       and packages_pricing.pack_id = $packid";


$stmt = mysqli_stmt_init($conn);

    $statmentQuery = "update packages_pricing 

               set en_title_price = ?,
               en_price_value = ?,
               fr_title_price = ?,

               fr_price_value = ?,
               ar_title_price = ?,
               ar_price_value = ?

            where packages_pricing.id = ?
            and packages_pricing.pack_id = ?";


     mysqli_stmt_prepare($stmt, $statmentQuery);

     mysqli_stmt_bind_param($stmt, "ssssssii", $en_title_price, $fr_title_price, $ar_title_price, $en_price_value, $fr_price_value, $ar_price_value, $id, $packid);



         if(mysqli_stmt_execute($stmt)){

         	header("Location:view_package.php?packid=$packid");
         }else {
            echo "Error: Incorrect data please try again";
         }




?>