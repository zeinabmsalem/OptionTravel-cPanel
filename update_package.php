<?php

include("dbconn.php");

$packid = $_GET['packid'];

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


            // $sql = "update packages
            //     set en_name = '$en_name',
            //         fr_name = '$fr_name',
            //         ar_name = '$ar_name',

            //         en_location = '$en_location',
            //         fr_location = '$fr_location',
            //         ar_location = '$ar_location',

            //         en_title = '$en_title',
            //         fr_title = '$fr_title',
            //         ar_title = '$ar_title',


            //         en_rating = '$en_rating',
            //         fr_rating = '$fr_rating',
            //         ar_rating = '$ar_rating',


            //         en_price = '$en_price',
            //         fr_price = '$fr_price',
            //         ar_price = '$ar_price',


            //         en_duration = '$en_duration',
            //         fr_duration = '$fr_duration',
            //         ar_duration = '$ar_duration',


            //         en_from_date = '$en_from_date',
            //         fr_from_date = '$fr_from_date',
            //         ar_from_date = '$ar_from_date',


            //         en_to_date = '$en_to_date',
            //         fr_to_date = '$fr_to_date',
            //         ar_to_date = '$ar_to_date',


            //         en_availability_link = '$en_availability_link',
            //         fr_availability_link = '$fr_availability_link',
            //         ar_availability_link = '$ar_availability_link',


            //         en_overview = '$en_overview',
            //         fr_overview = '$fr_overview',
            //         ar_overview = '$ar_overview',

            //         en_what_will_we_do = '$en_what_will_we_do',
            //         fr_what_will_we_do = '$fr_what_will_we_do',
            //         ar_what_will_we_do = '$ar_what_will_we_do'

            //      where packages.id = $packid";



$stmt = mysqli_stmt_init($conn);

    $statmentQuery = "update packages
                set en_name = ?,
                    fr_name = ?,
                    ar_name = ?,

                    en_location = ?,
                    fr_location = ?,
                    ar_location = ?,

                    en_title = ?,
                    fr_title = ?,
                    ar_title = ?,


                    en_rating = ?,
                    fr_rating = ?,
                    ar_rating = ?,


                    en_price = ?,
                    fr_price = ?,
                    ar_price = ?,


                    en_duration = ?,
                    fr_duration = ?,
                    ar_duration = ?,


                    en_from_date = ?,
                    fr_from_date = ?,
                    ar_from_date = ?,


                    en_to_date = ?,
                    fr_to_date = ?,
                    ar_to_date = ?,


                    en_availability_link = ?,
                    fr_availability_link = ?,
                    ar_availability_link = ?,


                    en_overview = ?,
                    fr_overview = ?,
                    ar_overview = ?,

                    en_what_will_we_do = ?,
                    fr_what_will_we_do = ?,
                    ar_what_will_we_do = ?

                 where packages.id = ?";


     mysqli_stmt_prepare($stmt, $statmentQuery);

     mysqli_stmt_bind_param($stmt, "sssssssssssssssssssssssssssssssssi", $en_name, $fr_name, $ar_name, $en_location, $fr_location, $ar_location, $en_title, $fr_title, $ar_title, $en_rating, $fr_rating, $ar_rating, $en_price, $fr_price, $ar_price, $en_duration, $fr_duration, $ar_duration, $en_from_date, $fr_from_date, $ar_from_date, $en_to_date, $fr_to_date, $ar_to_date, $en_availability_link, $fr_availability_link, $ar_availability_link, $en_overview, $fr_overview, $ar_overview, $en_what_will_we_do, $fr_what_will_we_do, $ar_what_will_we_do, $packid);



       if(mysqli_stmt_execute($stmt)){

         	header("Location:view_package.php?packid=$packid");
         }else {
         	echo "Error: Incorrect data please try again";
         }



?>

