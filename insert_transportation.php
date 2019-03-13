<?php

include("dbconn.php");


$image_uniqid = uniqid();

$userType_id;
session_start();
if (empty($_SESSION['userType_id'])) {
    header("Location:loginpage.php");
} else {
    $userType_id = $_SESSION['userType_id'];
    $refrence_id = $_SESSION['refrence_id'];
}



$en_brand_name = $_POST['en_brand_name'];
$fr_brand_name = $_POST['fr_brand_name'];
$ar_brand_name = $_POST['ar_brand_name'];

$en_price_day = $_POST['en_price_day'];
$fr_price_day = $_POST['fr_price_day'];
$ar_price_day = $_POST['ar_price_day'];

$en_price_week = $_POST['en_price_week'];
$fr_price_week = $_POST['fr_price_week'];
$ar_price_week = $_POST['ar_price_week'];

$en_price_month = $_POST['en_price_month'];
$fr_price_month = $_POST['fr_price_month'];
$ar_price_month = $_POST['ar_price_month'];

$en_type = $_POST['en_type'];
$fr_type = $_POST['fr_type'];
$ar_type = $_POST['ar_type'];

$en_terms_and_condition = $_POST['en_terms_and_condition'];
$fr_terms_and_condition = $_POST['fr_terms_and_condition'];
$ar_terms_and_condition = $_POST['ar_terms_and_condition'];



$target_dir = "upload/"; 

$tmp_name = $_FILES["card_image"]["tmp_name"];

$name = $_FILES["card_image"]["name"];

$targetFile = $target_dir. $image_uniqid. $name; 

move_uploaded_file($tmp_name, $targetFile);


// $sql = "INSERT INTO transportation (en_brand_name, en_price_day, en_price_week, en_price_month, en_type, en_terms_and_condition, fr_brand_name, fr_price_day, fr_price_week, fr_price_month, fr_type, fr_terms_and_condition, ar_brand_name, ar_price_day, ar_price_week, ar_price_month, ar_type, ar_terms_and_condition, card_image)
//                 VALUES ('$en_brand_name', '$en_price_day', '$en_price_week', '$en_price_month', '$en_type', '$en_terms_and_condition', '$fr_brand_name', '$fr_price_day', '$fr_price_week', '$fr_price_month', '$fr_type', '$fr_terms_and_condition', '$ar_brand_name', '$ar_price_day', '$ar_price_week', '$ar_price_month', '$ar_type', '$ar_terms_and_condition', '$targetFile')";



$stmt = mysqli_stmt_init($conn);

    $statmentQuery = "insert into transportation (en_brand_name, en_price_day, en_price_week, en_price_month, en_type, en_terms_and_condition, fr_brand_name, fr_price_day, fr_price_week, fr_price_month, fr_type, fr_terms_and_condition, ar_brand_name, ar_price_day, ar_price_week, ar_price_month, ar_type, ar_terms_and_condition, card_image) 

     values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ";


     mysqli_stmt_prepare($stmt, $statmentQuery);

     mysqli_stmt_bind_param($stmt, "sssssssssssssssssss", $en_brand_name, $en_price_day, $en_price_week, $en_price_month, $en_type, $en_terms_and_condition, $fr_brand_name, $fr_price_day, $fr_price_week, $fr_price_month, $fr_type, $fr_terms_and_condition, $ar_brand_name, $ar_price_day, $ar_price_week, $ar_price_month, $ar_type, $ar_terms_and_condition, $targetFile);



         if(mysqli_stmt_execute($stmt)){

            $last_id = mysqli_insert_id($conn);

         	  header("Location:view_transportation.php?transid=$last_id");

         }else {
            echo "Error: Incorrect data please try again";
         }



?>

