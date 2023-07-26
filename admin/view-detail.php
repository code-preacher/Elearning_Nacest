<?php
session_start();
error_reporting(0);
include '../inc/checklogin.php';
check_login();
$_SESSION['wmsg']="";
?>
<?php
include '../inc/config.php';
$qk=mysqli_query($con,"SELECT * from application where id='".$_GET['id']."'");
$ql=mysqli_fetch_array($qk);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  
    <!-- important meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title -->
    <title>NACEST, ELEARNING SYSTEM</title>
    
    <!-- Basic SEO -->
    <meta name="description" content="NACEST, ELEARNING SYSTEM">
    <meta name="keywords" content="NACEST, ELEARNING SYSTEM">

    <!-- Favicon -->
    <link rel="icon" type="img/jpg" href="img/logo.png">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../fonts/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
    <!-- Custom CSS -->


    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
        </div>
        <!-- Main wrapper  -->
        <div id="main-wrapper">
         <?php
         include "inc/header.php";
         ?>
         <!-- End header header -->
         <!-- Left Sidebar  -->
         <?php
         include "inc/sidebar.php";
         ?>     
         <!-- End Left Sidebar  -->
         <!-- Page wrapper  -->
         <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">View Detail</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
                <!-- End Bread crumb -->
                <!-- Container fluid  -->
                <div class="container-fluid">
                    <!-- Start Page Content -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-title">
                                    <h4>VIEW DETAILS</h4>


                                </div>
                                <div class="card-body">

                                    <div class="row">
                      <div class="col-md-4">
                       <div class="form-group">
                        <p class="text-muted m-b-15 f-s-12">Full Name :</p>
                        <input type="text" class="form-control input-rounded"  value="<?php echo $ql['name'];?>" disabled="disabled">
                      </div>

                    </div>
                    <div class="col-md-4">
                     <div class="form-group">
                      <p class="text-muted m-b-15 f-s-12">Email :</p>
                      <input type="text" class="form-control input-rounded" value="<?php echo $ql['email'];?>" disabled="disabled">
                    </div>
                  </div>

                                      <div class="col-md-4">
                     <div class="form-group">
                      <p class="text-muted m-b-15 f-s-12">Address :</p>
                      <input type="text" class="form-control input-rounded" value="<?php echo $ql['address'];?>" disabled="disabled">
                    </div>
                  </div>


                                      <div class="col-md-4">
                     <div class="form-group">
                      <p class="text-muted m-b-15 f-s-12">Nationality :</p>
                      <input type="text" class="form-control input-rounded" value="<?php echo $ql['nationality'];?>" disabled="disabled">
                    </div>
                  </div>

                                      <div class="col-md-4">
                     <div class="form-group">
                      <p class="text-muted m-b-15 f-s-12">Course :</p>
                      <input type="text" class="form-control input-rounded" value="<?php echo $ql['course'];?>" disabled="disabled">
                    </div>
                  </div>

                                                        <div class="col-md-4">
                     <div class="form-group">
                      <p class="text-muted m-b-15 f-s-12">Status :</p>
                      <input type="text" class="form-control input-rounded" value="<?php if($ql['status']==='1'){echo 'Admitted';}else{echo 'Not Admitted';}?>" disabled="disabled">
                    </div>
                  </div>
                  <br><br><br><br>


                                  <div class="col-md-6"><h2>JAMB</h2>
                                      <img width="300" height="600" src="../application_images/<?php echo $ql['jamb'] ;?>">
                                  </div>
                                  <div class="col-md-6"><h2>WAEC/NECO</h2>
                                      <img width="300" height="600" src="../application_images/<?php echo $ql['result'] ;?>">
                                  </div>
                  
          </div>


                                </div>


                            </div>



                 </div>
                 <!-- /# column -->
             </div>
             <!-- End PAge Content -->
         </div>
         <!-- End Container fluid  -->
         <!-- footer -->

         <!-- FOOTER REGION -->
         <?php
         include "inc/footer.php";
         ?>

         <!-- End footer -->
     </div>
     <!-- End Page wrapper  -->
 </div>
 <!-- End Wrapper -->
 <!-- All Jquery -->
 <script src="js/lib/jquery/jquery.min.js"></script>
 <!-- Bootstrap tether Core JavaScript -->
 <script src="js/lib/bootstrap/js/popper.min.js"></script>
 <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
 <!-- slimscrollbar scrollbar JavaScript -->
 <script src="js/jquery.slimscroll.js"></script>
 <!--Menu sidebar -->
 <script src="js/sidebarmenu.js"></script>
 <!--stickey kit -->
 <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
 <!--Custom JavaScript -->
 <script src="js/scripts.js"></script>

</body>

</html>