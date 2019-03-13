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
</head>

<body id="page-top">
    <!-- Begin Preloader -->
    <div id="preloader">
        <div class="canvas">
            <img src="assets/img/Option.png" alt="logo" class="loader-logo">
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
                                <h2 class="page-header-title">Delete Package from List</h2>
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
<!--                                 <div class="widget-header bordered no-actions d-flex align-items-center">
                                    <h4>Export</h4>
                                </div> -->
                                <div class="widget-body">
                                    <div class="table-responsive">
                                        <table id="export-table" class="table mb-0">
                                           

                <?php
    
                        $packid = $_GET['packid'];

                         $sql = "select * from packages
                                    where packages.id = $packid" ;

                        $result = mysqli_query($conn, $sql);

                         while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        
                        <div class="row">

                           <div class="col-xs-12 col-sm-6 col-md-offset-3 col-md-6 widget-container-col" id="widget-container-col-4" style="margin-top:30px;margin-bottom:150px">
                                <div class="widget-box" id="widget-box-4">
                                    <div class="widget-header widget-header-large">
                                        <h4 class="widget-title" style="font-weight: bold;color: #fc0000;">Delete Package !</h4>


                                    </div>

                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <center>
                                                <p class="alert alert-info" style="border-color: white;background-color: #0490A6">

                                                    Are you sure you want to delete Package: <b><?php echo $row["en_name"]; ?> </b> with ID: <?php echo $packid; ?>

                                                </p>
                                            </center> 
                                        </div>
                                    </div>

                                    

                                    <div class="padding-8 clearfix" style="padding:30px">

                                        <a href="view_package.php?packid=<?php echo $packid ?>">

                                            <button class="btn btn-xs btn-danger pull-left">
                                                <i class="ace-icon fa fa-times"></i>
                                                <span class="bigger-110">No, Please Cancel</span>
                                            </button>
                                        </a>
                                        <a href="delete_package.php?packid=<?php echo $packid ?>">  
                                            <button type="submit" class="btn btn-xs btn-success pull-right" name="delete">

                                                <span class="bigger-110">Yes, I am sure</span>

                                                <i class="ace-icon fa fa-arrow-right icon-on-right"></i>

                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.span -->
                          <?php
                        }
                
                    ?>


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
                <footer class="main-footer">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-start justify-content-lg-start justify-content-md-start justify-content-center">
                            <p class="text-gradient-02">Copyright©2018</p>
                        </div>
                    </div>
                </footer>
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