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

$sqlselect = "select * from packages
        where packages.id = $packid";

        $result = mysqli_query($conn, $sqlselect);
        $row = mysqli_fetch_assoc($result);

      $package_type_id = $row['package_type_id'];



$sql = "delete from packages
        where packages.id = $packid";

        mysqli_query($conn, $sql);


$sql= "delete from packages_images
       where packages_images.pack_id = $packid";
  

     mysqli_query($conn, $sql);


 $sql= "delete from packages_include
       where packages_include.pack_id = $packid";    

            mysqli_query($conn, $sql);


 $sql= "delete from packages_itinerary
       where packages_itinerary.pack_id = $packid";    

            mysqli_query($conn, $sql);



 $sql= "delete from packages_pricing
       where packages_pricing.pack_id = $packid";    

            mysqli_query($conn, $sql);



 $sql= "delete from package_tag
        where package_tag.pack_id = $packid";    

        mysqli_query($conn, $sql);

        header("Location:package.php?type=$package_type_id");


  

?>