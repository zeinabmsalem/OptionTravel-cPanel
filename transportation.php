<?php

include("dbconn.php");

session_start();
$refrence_id;

if (empty($_SESSION['refrence_id'])) {
    header("Location: loginpage.php");
} else {
    $refrence_id = $_SESSION['refrence_id'];
}

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
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

        <style>
            
           #addtrans{
                position: absolute;
                margin-left: 500px;

          }

        </style>
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
                                <h2 class="page-header-title">Transportation</h2>
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
                                <div class="widget-header bordered no-actions d-flex align-items-center">
                                 <a id="addtrans" href="add_transportation.php"><button type="button" class="btn btn-primary">Add Transportation</button></a>

                                </div>
                                <div class="widget-body">
                                    <div class="table-responsive">

                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Brand Name</th>
                                                    <th>Price/Day</th>
                                                    <th>Card Image</th>
                                                    <th width="100">Options</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                        <?php

                                            $sql = "select * from transportation";


                                            // $sql = "select transportation.*, transportation_details.*, transportation_images.image_url from transportation
                                            // INNER JOIN transportation_details
                                            // on transportation.id = transportation_details.trans_id
                                            // INNER JOIN transportation_images
                                            // on transportation.id = transportation_images.trans_id" ; 
                                                 
                                                 $result = mysqli_query($conn, $sql);

                                                
                                                 if (mysqli_num_rows($result) > 0) {

                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        
                                            ?>
                                                <tr>
                                                    <td><?php  echo $row['id']; ?></td>
                                                    <td><?php  echo $row['en_brand_name']; ?></td>
                                                    <td><?php  echo $row['en_price_day']; ?></td>

                                                    <td><img src="<?php  echo $row['card_image']; ?>" style="width: auto;
                                    height: 40px;
                                    margin-left: 10px;
                                    margin-right: 6px"></td>

                                                    <td>
                                                        <a href="view_transportation.php?transid=<?php echo $row['id']; ?>">
                                                            <!-- <img src="pencil.svg" width="40px" height="40px"/> -->
                                                            <button type="button" class="btn btn-primary">View Details</button>
                                                        </a>
                                                    </td>
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