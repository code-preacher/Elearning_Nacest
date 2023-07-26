<?php
session_start();
error_reporting(0);
include '../inc/checklogin.php';
check_login();
?>
<?php
include '../inc/config.php';


$x=mysqli_query($con,"select * from admin where email='".$_SESSION['email']."'");
$xx=mysqli_fetch_array($x);

$q2=mysqli_query($con,"select * from student ");
$qr2=mysqli_num_rows($q2);

$q3=mysqli_query($con,"select * from lecturer");
$qr3=mysqli_num_rows($q3);

$q4=mysqli_query($con,"select * from department");
$qr4=mysqli_num_rows($q4);
$q5=mysqli_query($con,"select * from syllabus");
$qr5=mysqli_num_rows($q5);
$q6=mysqli_query($con,"select * from feedback");
$qr6=mysqli_num_rows($q6);
$q7=mysqli_query($con,"select * from reference");
$qr7=mysqli_num_rows($q7);
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

    <link href="css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="css/lib/owl.theme.default.min.css" rel="stylesheet" />
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
            <!-- header header  -->
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
                        <h3 class="text-primary">Dashboard</h3> 

                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
                <!-- End Bread crumb -->
                


                <!-- Container fluid  -->
                <div class="container-fluid">
                    <!-- Start Page Content -->
                    <div class="row">
                        

                       <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                 <a href="view-lecturer.php"> <span><i class="fa fa-users f-s-50 color-success"></i></span></a>
                             </div>
                             <div class="media-body media-text-right">
                                <h2>
                                    <?php 
                                    if ($qr3>0) {
                                     echo $qr3;
                                 } else {
                                     echo "0";
                                 }
                                 
                                 
                                 ?>
                                 
                             </h2>
                             <p class="m-b-0"><a href="view-lecturer.php">Total Lecturer</a></p>
                         </div>
                     </div>
                 </div>
             </div>






             <div class="col-md-3">
                <div class="card p-30">
                    <div class="media">
                        <div class="media-left meida media-middle">
                           <a href="view-student.php">   <span><i class="fa fa-users f-s-50 color-warning"></i></span></a>
                       </div>
                       <div class="media-body media-text-right">
                         <h2>
                            <?php 
                            if ($qr2>0) {
                             echo $qr2;
                         } else {
                             echo "0";
                         }
                         
                         
                         ?>
                         
                     </h2>
                     <p class="m-b-0"><a href="view-student.php">Total Student</a></p>
                 </div>
             </div>
         </div>
     </div>



     <div class="col-md-3">
        <div class="card p-30">
            <div class="media">
                <div class="media-left meida media-middle">
                 <a href="view-department.php"> <span><i class="fa fa-institution f-s-50 color-dark"></i></span></a>
             </div>
             <div class="media-body media-text-right">
                <h2>
                    <?php 
                    if ($qr4>0) {
                     echo $qr4;
                 } else {
                     echo "0";
                 }
                 
                 
                 ?>
                 
             </h2>
             <p class="m-b-0"><a href="view-department.php">Total Department</a></p>
         </div>
     </div>
 </div>
</div>

<div class="col-md-3">
    <div class="card p-30">
        <div class="media">
            <div class="media-left meida media-middle">
             <a href="view-all-syllabus.php"> <span><i class="fa fa-list f-s-50 text-online"></i></span></a>
         </div>
         <div class="media-body media-text-right">
            <h2>
                <?php 
                if ($qr5>0) {
                 echo $qr5;
             } else {
                 echo "0";
             }
             
             
             ?>
             
         </h2>
         <p class="m-b-0"><a href="view-all-syllabus.php">Total Syllabus</a></p>
     </div>
 </div>
</div>
</div>



<div class="col-md-3">
    <div class="card p-30">
        <div class="media">
            <div class="media-left meida media-middle">
             <a href="view-feedback.php"> <span><i class="fa fa-comment f-s-50 text-offline"></i></span></a>
         </div>
         <div class="media-body media-text-right">
            <h2>
                <?php 
                if ($qr6>0) {
                 echo $qr6;
             } else {
                 echo "0";
             }
             
             
             ?>
             
         </h2>
         <p class="m-b-0"><a href="view-feedback.php">Total Feedback</a></p>
     </div>
 </div>
</div>
</div>

<div class="col-md-3">
    <div class="card p-30">
        <div class="media">
            <div class="media-left meida media-middle">
             <a href="view-reference.php"> <span><i class="fa fa-money f-s-50 text-dark"></i></span></a>
         </div>
         <div class="media-body media-text-right">
            <h2>
                <?php 
                if ($qr7>0) {
                 echo $qr7;
             } else {
                 echo "0";
             }
             
             
             ?>
             
         </h2>
         <p class="m-b-0"><a href="view-reference.php">Total Payment Reference</a></p>
     </div>
 </div>
</div>
</div>


<div class="col-md-3">
    <div class="card p-30">
        <div class="media">
            <div class="media-left meida media-middle">
               <a href="profile.php">   <span><i class="fa fa-user f-s-50 color-primary"></i></span></a>
           </div>
           <div class="media-body media-text-right">
             <p></p>
             <p class="m-b-0"><a href="profile.php">View Profile</a></p>
         </div>
     </div>
 </div>
</div>



<div class="col-md-3">
    <div class="card p-30">
        <div class="media">
            <div class="media-left meida media-middle">
              <a href="logout.php">  <span><i class="fa fa-sign-out f-s-50 color-danger"></i></span></a>
          </div>
          <div class="media-body media-text-right">
            <p></p>
            <p class="m-b-0"><a href="logout.php" onClick="return confirm('Are you sure you want to logout ?')">Logout</a></p>
        </div>
    </div>
</div>
</div>
<div class="col-lg-12">
    
    <div class="card">
        <div class="card-body">
            <div class="year-calendar"></div>
        </div>
    </div>

</div>




</div>




<!-- End PAge Content -->
</div>
<!-- End Container fluid  -->






<!-- FOOTER SCRIPT -->
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


<!-- Amchart -->
<script src="js/lib/morris-chart/raphael-min.js"></script>
<script src="js/lib/morris-chart/morris.js"></script>
<script src="js/lib/morris-chart/dashboard1-init.js"></script>


<script src="js/lib/calendar-2/moment.latest.min.js"></script>
<!-- scripit init-->
<script src="js/lib/calendar-2/semantic.ui.min.js"></script>
<!-- scripit init-->
<script src="js/lib/calendar-2/prism.min.js"></script>
<!-- scripit init-->
<script src="js/lib/calendar-2/pignose.calendar.min.js"></script>
<!-- scripit init-->
<script src="js/lib/calendar-2/pignose.init.js"></script>

<script src="js/lib/owl-carousel/owl.carousel.min.js"></script>
<script src="js/lib/owl-carousel/owl.carousel-init.js"></script>

<!-- scripit init-->

<script src="js/scripts.js"></script>

</body>

</html>