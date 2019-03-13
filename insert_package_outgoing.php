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

$type_id = $_GET['type_id'];

$en_name = $_POST['en_name'];
$fr_name = $_POST['fr_name'];
$ar_name = $_POST['ar_name'];

$en_location = $_POST['en_location'];
$fr_location = $_POST['fr_location'];
$ar_location = $_POST['ar_location'];

$en_title = $_POST['en_title'];
$fr_title = $_POST['fr_title'];
$ar_title = $_POST['ar_title'];

$en_rating = $_POST['en_rating'];
$fr_rating = $_POST['fr_rating'];
$ar_rating = $_POST['ar_rating'];

$en_price = $_POST['en_price'];
$fr_price = $_POST['fr_price'];
$ar_price = $_POST['ar_price'];

$en_duration = $_POST['en_duration'];
$fr_duration = $_POST['fr_duration'];
$ar_duration = $_POST['ar_duration'];

$en_from_date = $_POST['en_from_date'];
$fr_from_date = $_POST['fr_from_date'];
$ar_from_date = $_POST['ar_from_date'];

$en_to_date = $_POST['en_to_date'];
$fr_to_date = $_POST['fr_to_date'];
$ar_to_date = $_POST['ar_to_date'];

$en_availability_link = $_POST['en_availability_link'];
$fr_availability_link = $_POST['fr_availability_link'];
$ar_availability_link = $_POST['ar_availability_link'];

$en_overview = $_POST['en_overview'];
$fr_overview = $_POST['fr_overview'];
$ar_overview = $_POST['ar_overview'];

$en_what_will_we_do = $_POST['en_what_will_we_do'];
$fr_what_will_we_do = $_POST['fr_what_will_we_do'];
$ar_what_will_we_do = $_POST['ar_what_will_we_do'];

$en_itinerary = $_POST['en_itinerary'];
$fr_itinerary = $_POST['fr_itinerary'];
$ar_itinerary = $_POST['ar_itinerary'];

$en_include_value = $_POST['en_include_value'];
$fr_include_value = $_POST['fr_include_value'];
$ar_include_value = $_POST['ar_include_value'];


$en_title_price = $_POST['en_title_price'];
$fr_title_price = $_POST['fr_title_price'];
$ar_title_price = $_POST['ar_title_price'];

$en_price_value = $_POST['en_price_value'];
$fr_price_value = $_POST['fr_price_value'];
$ar_price_value = $_POST['ar_price_value'];


$video_link = $_POST['video_link'];



$target_dir = "upload/"; 

$tmp_name = $_FILES["card_img"]["tmp_name"];

$name = $_FILES["card_img"]["name"];

// $targetFile = $target_dir.$name; 

$targetFile = $target_dir. $image_uniqid. $name; 

move_uploaded_file($tmp_name, $targetFile);


$sql = "INSERT INTO packages (package_type_id, en_name, en_location, en_title, en_rating, en_price, video_link, card_img, en_duration, en_from_date, en_to_date, en_availability_link, en_overview, en_what_will_we_do, fr_name, fr_location, fr_title, fr_rating, fr_price, fr_duration, fr_from_date, fr_to_date, fr_availability_link, fr_overview, fr_what_will_we_do, ar_name, ar_location, ar_title, ar_rating, ar_price, ar_duration, ar_from_date, ar_to_date, ar_availability_link, ar_overview, ar_what_will_we_do)

                VALUES ($type_id, '$en_name', '$en_location', '$en_title', '$en_rating', '$en_price', '$video_link', '$targetFile', '$en_duration', '$en_from_date', '$en_to_date', '$en_availability_link', '$en_overview', '$en_what_will_we_do', '$fr_name', '$fr_location', '$fr_title', '$fr_rating', '$fr_price', '$fr_duration', '$fr_from_date', '$fr_to_date', '$fr_availability_link', '$fr_overview', '$fr_what_will_we_do', '$ar_name', '$ar_location', '$ar_title', '$ar_rating', '$ar_price', '$ar_duration', '$ar_from_date', '$ar_to_date', '$ar_availability_link', '$ar_overview', '$ar_what_will_we_do')";
   


         if(mysqli_query($conn, $sql)){

          // $last_id = mysqli_insert_id($conn);

          if($type_id == 1){

            header("Location:incoming.php");

          }

          if($type_id == 2){

            header("Location:outgoing.php");

          }

          if($type_id == 3){

            header("Location:domestic.php");

          }

          if($type_id == 4){

            header("Location:haj.php");

          }          

          }else {
            echo "Error: Incorrect data please try again";
           }


?>