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


$id = $_GET['tagid'];


$en_name= $_POST['en_name'];

$fr_name= $_POST['fr_name'];

$ar_name= $_POST['ar_name'];


      // $sql = "update tag 
      //          set en_name = '$en_name',
      //          fr_name = '$fr_name',
      //          ar_name = '$ar_name'

      //       where tag.id = $id";


$stmt = mysqli_stmt_init($conn);

    $statmentQuery = "update tag 
                       set en_name = ?,
                       fr_name = ?,
                       ar_name = ?

                       where tag.id = ?";


     mysqli_stmt_prepare($stmt, $statmentQuery);

     mysqli_stmt_bind_param($stmt, "sssi", $en_name, $fr_name, $ar_name, $id);



         if(mysqli_stmt_execute($stmt)){

         	header("Location:tag.php");
         }else {
            echo "Error: Incorrect data please try again";
         }




?>