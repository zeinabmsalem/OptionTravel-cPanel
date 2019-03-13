<?php

include("dbconn.php");

$transid = $_GET['transid'];

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


            // $sql = "update transportation
            //     set transportation.en_brand_name = '$en_brand_name',
            //     transportation.fr_brand_name= '$fr_brand_name',
            //     transportation.ar_brand_name = '$ar_brand_name',

            //     transportation.en_price_day = '$en_price_day',
            //     transportation.fr_price_day = '$fr_price_day',
            //     transportation.ar_price_day = '$ar_price_day',

            //     transportation.en_price_week = '$en_price_week',
            //     transportation.fr_price_week = '$fr_price_week',
            //     transportation.ar_price_week = '$ar_price_week',

            //     transportation.en_price_month = '$en_price_month',
            //     transportation.fr_price_month = '$fr_price_month',
            //     transportation.ar_price_month = '$ar_price_month',

            //     transportation.en_type = '$en_type',
            //     transportation.fr_type = '$fr_type',
            //     transportation.ar_type = '$ar_type',

            //     transportation.en_terms_and_condition = '$en_terms_and_condition',
            //     transportation.fr_terms_and_condition = '$fr_terms_and_condition',
            //  transportation.ar_terms_and_condition = '$ar_terms_and_condition'

            //     where transportation.id = $transid";



$stmt = mysqli_stmt_init($conn);

    $statmentQuery = "update transportation
                set transportation.en_brand_name = ?,
                transportation.fr_brand_name= ?,
                transportation.ar_brand_name = ?,

                transportation.en_price_day = ?,
                transportation.fr_price_day = ?,
                transportation.ar_price_day = ?,

                transportation.en_price_week = ?,
                transportation.fr_price_week = ?,
                transportation.ar_price_week = ?,

                transportation.en_price_month = ?,
                transportation.fr_price_month = ?,
                transportation.ar_price_month = ?,

                transportation.en_type = ?,
                transportation.fr_type = ?,
                transportation.ar_type = ?,

                transportation.en_terms_and_condition = ?,
                transportation.fr_terms_and_condition = ?,
                transportation.ar_terms_and_condition = ?

                where transportation.id = ?";


     mysqli_stmt_prepare($stmt, $statmentQuery);

     mysqli_stmt_bind_param($stmt, "ssssssssssssssssssi", $en_brand_name, $en_price_day, $en_price_week, $en_price_month, $en_type, $en_terms_and_condition, $fr_brand_name, $fr_price_day, $fr_price_week, $fr_price_month, $fr_type, $fr_terms_and_condition, $ar_brand_name, $ar_price_day, $ar_price_week, $ar_price_month, $ar_type, $ar_terms_and_condition, $transid);


       if(mysqli_stmt_execute($stmt)){

         	header("Location:view_transportation.php?transid=$transid");
         }else {
         	echo "Error: Incorrect data please try again";
         }



?>