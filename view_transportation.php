<?php

include("dbconn.php");

session_start();
$refrence_id;

if (empty($_SESSION['refrence_id'])) {
    header("Location: loginpage.php");
} else {
    $refrence_id = $_SESSION['refrence_id'];
}

$transid = $_GET['transid'];


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Option Travel - Datatables</title>
    <meta name="description" content="scs is a Web App and Admin Dashboard Template built with Bootstrap 4">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Google Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="assets/vendors/css/base/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendors/css/base/scs.css">
    <link rel="stylesheet" href="assets/css/datatables/datatables.min.css">

         <style>
        
        #edit{
            position: absolute;
            margin-left: 950px;
        }

         #delete{
            position: absolute;
            margin-left: 1100px;
        }
        #edit1{
            position: absolute;
            margin-left: 700px;
        }

         #delete1{
            position: absolute;
            margin-left: 900px;
        }
        #addimage{
        }

    </style>

    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body id="page-top">
    <!-- Begin Preloader -->
    <div id="preloader">
        <div class="canvas">
            <img src="assets/img/option.png" alt="logo" class="loader-logo">
            <div class="spinner"></div>
        </div>
    </div>
    <!-- End Preloader -->
    <div class="page">
        <!-- Begin Header -->

        	<?php

				include("header.php");

			?>

        <!-- End Header -->
        <!-- Begin Page Content -->
        <div class="page-content d-flex align-items-stretch">
            
            <?php

             include("menu.php");

            ?>

            <!-- End Left Sidebar -->
            <div class="content-inner">
                <div class="container-fluid">
                    <!-- Begin Page Header-->
                    <div class="row">
                        <div class="page-header">
                            <div class="d-flex align-items-center">
                                <h2 class="page-header-title">Transportation Details</h2>
                                <div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="home.php"><i class="ti ti-home"></i></a></li>
                                        <li class="breadcrumb-item active">Home</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Page Header -->
                    <div class="row">
                        <div class="col-xl-12">
                            <!-- Export -->
                            <div class="widget has-shadow">
                                <!-- <div class="widget-header bordered no-actions d-flex align-items-center">
                                    <h4>Export</h4>
                                </div> -->
                                <div class="widget-body">
                                    <div class="table-responsive">


                                        <table class="table mb-0">

                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>English</th>
                                                    <th>French</th>
                                                    <th>Arabic</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                            <?php

                                            $sql = "select * from transportation
                                                    where transportation.id = $transid" ;

                                                     
                                                 $result = mysqli_query($conn, $sql);

                                                
                                                 if (mysqli_num_rows($result) > 0) {

                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        
                                            ?>

                                                <tr>
                                                    <th scope="row">Brand Name</th>
                                                    <td><?php echo $row['en_brand_name']; ?></td>
                                                    <td><?php echo $row['fr_brand_name']; ?></td>
                                                    <td><?php echo $row['ar_brand_name']; ?></td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">Price/Day</th>
                                                    <td><?php echo $row['en_price_day']; ?></td>
                                                    <td><?php echo $row['fr_price_day']; ?></td>
                                                    <td><?php echo $row['ar_price_day']; ?></td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">Price/Week</th>
                                                    <td><?php echo $row['en_price_week']; ?></td>
                                                    <td><?php echo $row['fr_price_week']; ?></td>
                                                    <td><?php echo $row['ar_price_week']; ?></td>                                                    
                                                </tr>

                                                 <tr>
                                                    <th scope="row">Price/Month</th>
                                                    <td><?php echo $row['en_price_month']; ?></td>
                                                    <td><?php echo $row['fr_price_month']; ?></td>
                                                    <td><?php echo $row['ar_price_month']; ?></td>
                                                  
                                                </tr>

                                                <tr>
                                                    <th scope="row">Car Type</th>
                                                    <td><?php echo $row['en_type']; ?></td>
                                                    <td><?php echo $row['fr_type']; ?></td>
                                                    <td><?php echo $row['ar_type']; ?></td>                                                   
                                                </tr>

                                                <tr>
                                                    <th scope="row">Terms and Conditions</th>
                                                    <td><?php echo $row['en_terms_and_condition']; ?></td>
                                                    <td><?php echo $row['fr_terms_and_condition']; ?></td>
                                                    <td><?php echo $row['ar_terms_and_condition']; ?></td>
                                                   
                                                </tr>

                                               <?php

                                                  }

                                                }

                                               ?>
                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                            </div>
                            <!-- End Export -->
                        </div>
                    </div>
                    <!-- End Row -->
             <a id="edit" href="edit_transportation.php?transid=<?php echo $transid ?>"><button type="button" class="btn btn-primary">Edit Data</button></a>

             <a id="delete" href="delete_confirmation_transportation.php?transid=<?php echo $transid ?>"><button type="button" class="btn btn-primary">Delete Data</button></a>

<br/><br/><br/>


        <div class="row">
                        <?php

                         $sql = "select card_image from transportation
                                                where transportation.id = $transid" ;

                         $result = mysqli_query($conn, $sql);

                         $row = mysqli_fetch_assoc($result);

                        ?>
                      <img src="<?php echo $row['card_image']; ?>" style="width: 350px;
                                    height: 270px;
                                    margin-left: 270px;
                                    margin-right: 6px">

             <!-- <a href="edit_trans_card_image.php?image=<?php echo $row['card_image']; ?>&transid=<?php echo $transid; ?>"><button type="button">Edit Image</button></a> -->

                         <form action="insert_trans_card_image.php?transid=<?php echo $transid; ?>" method="POST" enctype="multipart/form-data">
                              
                                    <input type="file" name="image" required><br/><br/>
                                    <button type="submit" class="btn btn-primary">Change Image</button>
                                                
                        </form>
                                    
        </div>

                    
<br/><br/><br/>

<div class="row">
                        <div class="col-xl-12">
                            <!-- Export -->
                            <div class="widget has-shadow">
                                <!-- <div class="widget-header bordered no-actions d-flex align-items-center">
                                    <h4>Export</h4>
                                </div> -->
                                <div class="widget-body">
                                    <div class="table-responsive">


                                        <table class="table mb-0">

                                            <thead>
                                                <tr>
                                                    <th>Transportation Images</th>
                                                </tr>
                                            </thead>

                                            <tbody>


                                                <tr>
                                                    <form action="insert_image.php?transid=<?php echo $transid; ?>" method="POST" enctype="multipart/form-data">
                                                    <td>
                                                        <input type="file" name="file[]" required multiple>
                                                        <button type="submit" class="btn btn-primary" name="update_details">Add Image</button>
                                                    </td>
                                                    
                                                </form>
                                                </tr>

                                            </tbody>


                                        </table>



                                    </div>
                                </div>
                            </div>
                            <!-- End Export -->
                        </div>
                    </div>
                    <!-- End Row -->

<br/><br/>
                    <div class="row">
                        <?php

                             $sql = "select image_url from transportation_images
                                    where transportation_images.trans_id = $transid" ;

                         $result = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {

                                $image = $row['image_url'];
            
                        ?>
                      <img src="<?php echo $row['image_url']; ?>" style="width: 150px;
                                    height: 150px;
                                    margin-right: 6px">

                      <a href="delete_image.php?image=<?php echo $row['image_url']; ?>&transid=<?php echo $transid; ?>"><button type="button">Delete</button></a>

                                    <br/><br/>

                        <?php

                             }
                        ?>
                    </div>

<br/><br/><br/>


<div class="row">
                        <div class="col-xl-12">
                            <!-- Export -->
                            <div class="widget has-shadow">
                                <!-- <div class="widget-header bordered no-actions d-flex align-items-center">
                                    <h4>Export</h4>
                                </div> -->
                                <div class="widget-body">
                                    <div class="table-responsive">


                                        <table class="table mb-0">

                                            <thead>
                                                <tr>
                                                    <th>English Transportation Details</th>
                                                    <th>French Transportation Details</th>
                                                    <th>Arabic Transportation Details</th>
                                                </tr>
                                            </thead>

                                            <tbody>


                                                <tr>
                                                    <form action="add_details.php?transid=<?php echo $transid; ?>" method="post">
                                                    <td><input type="text" name="en_details" required></td>
                                                    <td><input type="text" name="fr_details" required></td>
                                                    <td><input type="text" name="ar_details" required></td>
                                                    <td><button type="submit" class="btn btn-primary">Add Details</button></td>
                                                </form>
                                                </tr>

                                            </tbody>


                                        </table>



                                    </div>
                                </div>
                            </div>
                            <!-- End Export -->
                        </div>
                    </div>
                    <!-- End Row -->


                    <div class="row">
                        <div class="col-xl-12">
                            <!-- Export -->
                            <div class="widget has-shadow">
                                <!-- <div class="widget-header bordered no-actions d-flex align-items-center">
                                    <h4>Export</h4>
                                </div> -->
                                <div class="widget-body">
                                    <div class="table-responsive">


                                        <table class="table mb-0">

                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>English Transportation Details</th>
                                                    <th>French Transportation Details</th>
                                                    <th>Arabic Transportation Details</th>
                                                    <th>Options</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                            <?php

                                           $sql = "select * from transportation_details
                                                     where transportation_details.trans_id = $transid" ;

                                                     
                                                 $result = mysqli_query($conn, $sql);

                                                
                                                 if (mysqli_num_rows($result) > 0) {

                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        
                                            ?>

                                                <tr>
                                                    <form action="update_details.php?transid=<?php echo $transid; ?>&details_id=<?php echo $row["id"]; ?>" method="post">
                                                    <td><?php echo $row["id"]; ?></td>
                                                    <td><input type="text" name="en_details" value="<?php echo $row['en_transportation_details']; ?>"></td>
                                                    <td><input type="text" name="fr_details" value="<?php echo $row['fr_transportation_details']; ?>"></td>
                                                    <td><input type="text" name="ar_details" value="<?php echo $row['ar_transportation_details']; ?>"></td>
                                                    <input type="hidden" name="details_id" value="<?php echo $row['id']; ?>">
                                                    <td>
                                                        <button type="submit" class="btn btn-primary" name="update_details">Update Details</button><br/>

                                                        <a href="delete_details.php?transid=<?php echo $transid; ?>&details_id=<?php echo $row["id"]; ?>"><button type="button" class="btn btn-primary">Delete Details</button></a>
                                                    </td>
                                                </form>
                                                </tr>

                                               <?php

                                                  }

                                                }

                                               ?>

                                            </tbody>


                                        </table>



                                    </div>
                                </div>
                            </div>
                            <!-- End Export -->
                        </div>
                    </div>
                    <!-- End Row -->


                </div>
                <!-- End Container -->
                <!-- Begin Page Footer-->
                <?php

					include("footer.php");

				?>
                <!-- End Page Footer -->
                <a href="#" class="go-top"><i class="la la-arrow-up"></i></a>
            </div>
        </div>
        <!-- End Page Content -->
    </div>
    <!-- Begin Vendor Js -->
    <script src="assets/vendors/js/base/jquery.min.js"></script>
    <script src="assets/vendors/js/base/core.min.js"></script>
    <!-- End Vendor Js -->
    <!-- Begin Page Vendor Js -->
    <script src="assets/vendors/js/datatables/datatables.min.js"></script>
    <script src="assets/vendors/js/datatables/dataTables.buttons.min.js"></script>
    <script src="assets/vendors/js/datatables/jszip.min.js"></script>
    <script src="assets/vendors/js/datatables/buttons.html5.min.js"></script>
    <script src="assets/vendors/js/datatables/pdfmake.min.js"></script>
    <script src="assets/vendors/js/datatables/vfs_fonts.js"></script>
    <script src="assets/vendors/js/datatables/buttons.print.min.js"></script>
    <script src="assets/vendors/js/nicescroll/nicescroll.min.js"></script>
    <script src="assets/vendors/js/app/app.js"></script>
    <!-- End Page Vendor Js -->
    <!-- Begin Page Snippets -->
    <script src="assets/js/components/tables/tables.js"></script>
    <!-- End Page Snippets -->


</body>

</html>