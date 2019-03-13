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
            <img src="assets/img/logo.png" alt="logo" class="loader-logo">
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
                                <h2 class="page-header-title">Edit Transportation</h2>
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
                               <!--  <div class="widget-header bordered no-actions d-flex align-items-center">
                                    <h4>Export</h4>
                                </div> -->
                                <div class="widget-body">
                                    <div class="table-responsive">
                                        <table id="export-table" class="table mb-0">
                                           
                                          
                                                          <!-- Begin Form -->
                <div class="authentication-form mx-auto">
<!--                     <div class="logo-centered">
                        <a href="db-default.html">
                            <img src="assets/img/logo.png" alt="logo">
                        </a>
                    </div> -->

                    <?php

                        $transid = $_GET['transid'];

                        $sql = "select * from transportation 
                                    where transportation.id = $transid";


                        $result = mysqli_query($conn, $sql);

                        $row = mysqli_fetch_assoc($result); 

                    ?>

        <form method="post" action="update_transportation.php?transid=<?php echo $transid; ?>" enctype="multipart/form-data">

            <!-- // <input type="hidden" id="form-field-1" name="transid" value="<?php echo $driver_id; ?>"/> -->

                        <div>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                          <label>Brand Name English</label>
                        </div>

                        <div class="group material-input">
                           <input type="text" name="en_brand_name" value="<?php echo $row['en_brand_name']; ?>">
                        </div>

                        <div>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                          <label>Brand Name French</label>
                        </div>

                        <div class="group material-input">
                           <input type="text" name="fr_brand_name" value="<?php echo $row['fr_brand_name']; ?>">
                        </div>

                        <div>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                          <label>Brand Name Arabic</label>
                        </div>

                        <div class="group material-input">
                           <input type="text" name="ar_brand_name" value="<?php echo $row['ar_brand_name']; ?>">
                        </div>

                        <div>
                               <span class="highlight"></span>
                               <span class="bar"></span>
                              <label>Price/Day English</label>
                        </div>   
                        <div class="group material-input">
                           <input type="text" name="en_price_day" value="<?php echo $row['en_price_day']; ?>">
                        </div>

                      <div>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>Price/Day French</label>
                      </div>   
                      <div class="group material-input">
                        <input type="text" name="fr_price_day" value="<?php echo $row['fr_price_day']; ?>">
                      </div>

                      <div>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>Price/Day Arabic</label>
                      </div>   
                      <div class="group material-input">
                        <input type="text" name="ar_price_day" value="<?php echo $row['ar_price_day']; ?>">
                      </div>

                      <div>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>Price/Week English</label>
                      </div>   
                      <div class="group material-input">
                        <input type="text" name="en_price_week" value="<?php echo $row['en_price_week']; ?>">
                      </div>

                      <div>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>Price/Week French</label>
                      </div>   
                      <div class="group material-input">
                        <input type="text" name="fr_price_week" value="<?php echo $row['fr_price_week']; ?>">
                      </div>

                      <div>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>Price/Week Arabic</label>
                      </div>   
                      <div class="group material-input">
                        <input type="text" name="ar_price_week" value="<?php echo $row['ar_price_week']; ?>">
                      </div>

                      <div>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>Price/Month English</label>
                      </div>   
                      <div class="group material-input">
                        <input type="text" name="en_price_month" value="<?php echo $row['en_price_month']; ?>">
                      </div>

                      <div>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>Price/Month French</label>
                      </div>   
                      <div class="group material-input">
                        <input type="text" name="fr_price_month" value="<?php echo $row['fr_price_month']; ?>">
                      </div>

                      <div>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>Price/Month Arabic</label>
                      </div>   
                      <div class="group material-input">
                        <input type="text" name="ar_price_month" value="<?php echo $row['ar_price_month']; ?>">
                      </div>

                      <div>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>Car type English</label>
                      </div>   
                      <div class="group material-input">
                        <input type="text" name="en_type" value="<?php echo $row['en_type']; ?>">
                      </div>

                      <div>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>Car type French</label>
                      </div>   
                      <div class="group material-input">
                        <input type="text" name="fr_type" value="<?php echo $row['fr_type']; ?>">
                      </div>

                      <div>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>Car type Arabic</label>
                      </div>   
                      <div class="group material-input">
                        <input type="text" name="ar_type" value="<?php echo $row['ar_type']; ?>">
                      </div>

                      <div>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>Terms and condition English</label>
                      </div>   
                      <div class="group material-input">
                        <input type="text" name="en_terms_and_condition" value="<?php echo $row['en_terms_and_condition']; ?>">
                      </div>

                      <div>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>Terms and Condition French</label>
                      </div>   
                      <div class="group material-input">
                        <input type="text" name="fr_terms_and_condition" value="<?php echo $row['fr_terms_and_condition']; ?>">
                      </div>                                                                                                              
                      <div>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>Terms and Condition Arabic</label>
                      </div>   
                      <div class="group material-input">
                        <input type="text" name="ar_terms_and_condition" value="<?php echo $row['ar_terms_and_condition']; ?>">
                      </div>
                                    
                        <button type="submit" class="btn btn-primary" name="add">Save Edited Data</button>
                    </form>

                  <!--   
                    <div class="sign-btn text-center">
                        <a href="#" class="btn btn-lg btn-gradient-01">
                            Sign in
                        </a>
                    </div> -->
                </div>

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