<?php

include("dbconn.php");

session_start();
$refrence_id;

if (empty($_SESSION['refrence_id'])) {
    header("Location: loginpage.php");
} else {
    $refrence_id = $_SESSION['refrence_id'];
}


$packid = $_GET['packid'];

// $package_type_id = $_GET['package_type_id'];


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

         <style>
        
        #edit{
            position: absolute;
            margin-left: 950px;
        }

         #delete{
            position: absolute;
            margin-left: 1100px;
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
                                <h2 class="page-header-title">Package Details</h2>
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

                                            $sql = "select * from packages
                                            where packages.id = $packid" ; 

                                                     
                                                 $result = mysqli_query($conn, $sql);

                                                
                                                 if (mysqli_num_rows($result) > 0) {

                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        
                                            ?>

                                                <tr>
                                                    <th scope="row">Name</th>
                                                    <td><?php echo $row['en_name']; ?></td>
                                                    <td><?php echo $row['fr_name']; ?></td>
                                                    <td><?php echo $row['ar_name']; ?></td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">Location</th>
                                                    <td><?php echo $row['en_location']; ?></td>
                                                    <td><?php echo $row['fr_location']; ?></td>
                                                    <td><?php echo $row['ar_location']; ?></td>

                                                </tr>                                                

                                                <tr>
                                                    <th scope="row">Title</th>
                                                    <td><?php echo $row['en_title']; ?></td>
                                                    <td><?php echo $row['fr_title']; ?></td>
                                                    <td><?php echo $row['ar_title']; ?></td>

                                                </tr>

                                                <tr>
                                                    <th scope="row">Rating</th>
                                                    <td><?php echo $row['en_rating']; ?></td>
                                                    <td><?php echo $row['fr_rating']; ?></td>
                                                    <td><?php echo $row['ar_rating']; ?></td>                                                    
                                                </tr>

                                                 <tr>
                                                    <th scope="row">Price</th>
                                                    <td><?php echo $row['en_price']; ?></td>
                                                    <td><?php echo $row['fr_price']; ?></td>
                                                    <td><?php echo $row['ar_price']; ?></td>
                                                  
                                                </tr>

                                                <tr>
                                                    <th scope="row">Duration</th>
                                                    <td><?php echo $row['en_duration']; ?></td>
                                                    <td><?php echo $row['fr_duration']; ?></td>
                                                    <td><?php echo $row['ar_duration']; ?></td>                                                   
                                                </tr>

                                                <tr>
                                                    <th scope="row">From Date</th>
                                                    <td><?php echo $row['en_from_date']; ?></td>
                                                    <td><?php echo $row['fr_from_date']; ?></td>
                                                    <td><?php echo $row['ar_from_date']; ?></td>
                                                   
                                                </tr>

                                                <tr>
                                                    <th scope="row">To Date</th>
                                                    <td><?php echo $row['en_to_date']; ?></td>
                                                    <td><?php echo $row['fr_to_date']; ?></td>
                                                    <td><?php echo $row['ar_to_date']; ?></td>                               
                                                </tr>
                                            

                                                <tr>
                                                    <th scope="row">Availability Link</th>
                                                    <td><?php echo $row['en_availability_link']; ?></td>
                                                    <td><?php echo $row['fr_availability_link']; ?></td>
                                                    <td><?php echo $row['ar_availability_link']; ?></td>                               
                                                </tr>                                                           
                                                <tr>
                                                    <th scope="row">Overview</th>
                                                    <td><?php echo $row['en_overview']; ?></td>
                                                    <td><?php echo $row['fr_overview']; ?></td>
                                                    <td><?php echo $row['ar_overview']; ?></td>                              
                                                </tr>                                                           

                                                <tr>
                                                    <th scope="row">What Will We Do</th>
                                                    <td><?php echo $row['en_what_will_we_do']; ?></td>
                                                    <td><?php echo $row['fr_what_will_we_do']; ?></td>
                                                    <td><?php echo $row['ar_what_will_we_do']; ?></td>                               
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


             <a id="edit" href="edit_package.php?packid=<?php echo $packid; ?>"><button type="button" class="btn btn-primary">Edit Package</button></a>

             <a id="delete" href="delete_package_confirmation.php?packid=<?php echo $packid; ?>"><button type="button" class="btn btn-primary">Delete Package</button></a>

<br/><br/><br/>       <br/><br/><br/>         

<div class="row">
    
    <?php

    $sql = "select video_link, card_img from packages
                            where packages.id = $packid" ;

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    ?>

  <iframe src="<?php echo $row['video_link']; ?>" style="width: 250px;
                                    height: 200px;
                                    margin-left: 15px;
                                    margin-right: 6px"></iframe>


                        <form action="update_video.php?packid=<?php echo $packid; ?>" method="POST" enctype="multipart/form-data">
                                    <label>Video Link</label><br/>
                                    <input type="text" name="video_link" required><br/><br/>
                                    <button type="submit" class="btn btn-primary">Change Video Link</button>
                                                
                        </form>                                     


  <img src="<?php echo $row['card_img']; ?>" style="width: 300px;
                                    height: 200px;
                                    margin-left: 150px;
                                    margin-right: 6px">

                        <form action="update_main_image_incoming.php?packid=<?php echo $packid; ?>" method="POST" enctype="multipart/form-data">
                              
                                    <input type="file" name="image" required><br/><br/>
                                    <button type="submit" class="btn btn-primary" name="update_details">Change Card Image</button>
                                                
                        </form>                  


</div>


 <br/><br/>

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
                                                    <th>Package Images</th>
                                                </tr>
                                            </thead>

                                            <tbody>


                                                <tr>
                                                    <form action="add_image_package.php?packid=<?php echo $packid; ?>" method="POST" enctype="multipart/form-data">
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

                             $sql = "select * from packages_images
                                    where packages_images.pack_id = $packid" ;

                         $result = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {

                                $image = $row['img_url'];
            
                        ?>
                      <img src="<?php echo $row['img_url']; ?>" style="width: 150px;
                                    height: 150px;
                                    margin-left: 15px;
                                    margin-right: 6px">

                      <a href="delete_image_incoming.php?image=<?php echo $row['img_url']; ?>&packid=<?php echo $packid; ?>"><button type="button">Delete</button></a>

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
                                            </thead>

                                            <tbody>


                                        <tr>
                                            <form action="add_package_tag.php?packid=<?php echo $packid; ?>" method="POST" enctype="multipart/form-data">
                                            
                                             <select name="get_tag" style="width: 350px; height: 40px;" required>
                                                  <option value="">.........................................Choose Tag.......................................</option>


                                                <?php

                                                            $sql = "select * from tag";
                                                            $result = mysqli_query($conn, $sql);

                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                
                                                        ?>

                                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['en_name']; ?></option>

                                                            <?php

                                                                }
                                                            ?>
                                                            
                                                            </select>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary" name="update_details">Add Tag Name</button>

                                            
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
                                                    <th>Iternanry English</th>
                                                    <th>Iternanry French</th>
                                                    <th>Iternanry Arabic</th>
                                                </tr>
                                            </thead>

                                            <tbody>


                                                <tr>
                                                    <form action="add_iternary.php?packid=<?php echo $packid; ?>" method="post">
                                                    <td><input type="text" name="en_iternary" required></td>
                                                    <td><input type="text" name="fr_iternary" required></td>
                                                    <td><input type="text" name="ar_iternary" required></td>
                                                    <td><button type="submit" class="btn btn-primary" name="update_details">Add Iternary</button></td>
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
                                                    <th>Include English</th>
                                                    <th>Include French</th>
                                                    <th>Include Arabic</th>
                                                </tr>
                                            </thead>

                                            <tbody>


                                                <tr>
                                                    <form action="add_include.php?packid=<?php echo $packid; ?>" method="post">
                                                    <td><input type="text" name="en_include" required></td>
                                                    <td><input type="text" name="fr_include" required></td>
                                                    <td><input type="text" name="ar_include" required></td>
                                                    <td><button type="submit" class="btn btn-primary" name="update_details">Add Include</button></td>
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
                                                    <th>Pricing Title English</th>
                                                    <th>Pricing Title French</th>
                                                    <th>Pricing Title Arabic</th>
                                                    <th>Pricing Value English</th>
                                                    <th>Pricing Value French</th>
                                                    <th>Pricing Value Arabic</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                <tr>
                                                    <form action="add_price_title.php?packid=<?php echo $packid; ?>" method="post">
                                                    <td><input type="text" name="en_title_price" required></td>
                                                    <td><input type="text" name="fr_title_price" required></td>
                                                    <td><input type="text" name="ar_title_price" required></td> 
                                                    <td><input type="text" name="en_value_price" required></td>
                                                    <td><input type="text" name="fr_value_price" required></td>
                                                    <td><input type="text" name="ar_value_price" required></td> 
                                                    <td><button type="submit" class="btn btn-primary" name="update_details">Add Pricing</button></td>
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
                                                    <th>Itinerary English</th>
                                                    <th>Itinerary French</th>
                                                    <th>Itinerary Arabic</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                               <?php

                                                 $sql = "select * from packages_itinerary
                                                        where packages_itinerary.pack_id = $packid" ;
                                                                                 
                                                        $result = mysqli_query($conn, $sql);
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                         
                                              ?>

                                                <tr>
                                                    <form action="update_iternary.php?packid=<?php echo $packid; ?>&id=<?php echo $row["id"]; ?>" method="post">
                                                    <td><input type="text" name="en_iternary" value="<?php echo $row['en_itinerary']; ?>"></td>
                                                    <td><input type="text" name="fr_iternary" value="<?php echo $row['fr_itinerary']; ?>"></td>
                                                    <td><input type="text" name="ar_iternary" value="<?php echo $row['ar_itinerary']; ?>"></td>
                                                    <td>
                                                        <button type="submit" class="btn btn-primary" name="update_details">Update Itinerary</button><br/>
                                                        
                                                        <a href="delete_iternary.php?packid=<?php echo $packid; ?>&id=<?php echo $row["id"]; ?>"><button type="button" class="btn btn-primary" name="update_details">Delete Itinerary</button></a>
                                                    </td>
                                                </form>
                                                </tr>
                                                <?php

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
                                                    <th>Include English</th>
                                                    <th>Include French</th>
                                                    <th>Include Arabic</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                  <?php

                                                     $sql = "select * from packages_include
                                                            where packages_include.pack_id = $packid" ;
                                                                                     
                                                            $result = mysqli_query($conn, $sql);
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                           
                                                  ?>

                                                <tr>
                                                    <form action="update_include.php?packid=<?php echo $packid; ?>&id=<?php echo $row["id"]; ?>" method="post">
                                                    <td><input type="text" name="en_include" value="<?php echo $row['en_include_value']; ?>"></td>
                                                    <td><input type="text" name="fr_include" value="<?php echo $row['fr_include_value']; ?>"></td>
                                                    <td><input type="text" name="ar_include" value="<?php echo $row['ar_include_value']; ?>"></td>
                                                    <td>
                                                        <button type="submit" class="btn btn-primary" name="update_details">Update Include</button><br/>

                                                        <a href="delete_include.php?packid=<?php echo $packid; ?>&id=<?php echo $row["id"]; ?>"><button type="button" class="btn btn-primary" name="update_details">Delete Include</button></a>
                                                    </td>
                                                </form>
                                                </tr>
                                                <?php

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
                                                    <th>Price Title English</th>
                                                    <th>Price Title French</th>
                                                    <th>Price Title Arabic</th>
                                                    <th>Price Value English</th>
                                                    <th>Price Value French</th>
                                                    <th>Price Value Arabic</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                              <?php

                                                 $sql = "select * from packages_pricing
                                                        where packages_pricing.pack_id = $packid" ;
                                                                                 
                                                        $result = mysqli_query($conn, $sql);
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                       
                                              ?>

                                                <tr>
                                                    <form action="update_pricing.php?packid=<?php echo $packid; ?>&id=<?php echo $row["id"]; ?>" method="post">
                                                    <td><input type="text" name="en_title_price" value="<?php echo $row['en_title_price']; ?>"></td>
                                                    <td><input type="text" name="fr_title_price" value="<?php echo $row['fr_title_price']; ?>"></td>
                                                    <td><input type="text" name="ar_title_price" value="<?php echo $row['ar_title_price']; ?>"></td>
                                                    <td><input type="text" name="en_price_value" value="<?php echo $row['en_price_value']; ?>"></td>
                                                    <td><input type="text" name="fr_price_value" value="<?php echo $row['fr_price_value']; ?>"></td>
                                                    <td><input type="text" name="ar_price_value" value="<?php echo $row['ar_price_value']; ?>"></td>
                                                    <td>
                                                        <button type="submit" class="btn btn-primary" name="update_details">Update Pricing</button><br/>

                                                        <a href="delete_pricing.php?packid=<?php echo $packid; ?>&id=<?php echo $row["id"]; ?>"><button type="button" class="btn btn-primary" name="update_details">Delete Pricing</button></a>
                                                    </td>
                                                </form>
                                                </tr>
                                                <?php

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
                                                    <th>Tag English</th>
                                                    <th>Tag French</th>
                                                    <th>Tag Arabic</th>
                                                </tr>
                                            </thead>

                                            <tbody>


                                              <?php

                                                 $sql = "select package_tag.*, tag.* from package_tag
                                                                        inner join tag
                                                                        on package_tag.tag_id = tag.id
                                                                        where package_tag.pack_id = $packid" ; 
                                                                                 
                                                        $result = mysqli_query($conn, $sql);
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                          
                                                       
                                              ?>

                                                <tr>
                                                    <form action="update_tag.php?packid=<?php echo $packid; ?>&id=<?php echo $row["id"]; ?>" method="post">
                                                    <td><input type="text" name="en_name" value="<?php echo $row['en_name']; ?>"></td>
                                                    <td><input type="text" name="fr_name" value="<?php echo $row['fr_name']; ?>"></td>
                                                    <td><input type="text" name="ar_name" value="<?php echo $row['ar_name']; ?>"></td>
                                                    <td>
                                                        <button type="submit" class="btn btn-primary" name="update_details">Update Tag Name</button><br/>

                                                         <a href="delete_tag.php?packid=<?php echo $packid; ?>&id=<?php echo $row["id"]; ?>"><button type="button" class="btn btn-primary" name="update_details">Delete Tag Name</button></a>
                                                    </td>
                                                </form>
                                                </tr>

                                                <?php

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