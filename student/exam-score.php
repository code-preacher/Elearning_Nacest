<?php
session_start();
error_reporting(0);
include '../inc/checklogin.php';
check_login();
?>
<?php
include '../inc/config.php';

//validate written exams

$qd=mysqli_query($con,"select * from student where matno='".$_SESSION['user_id']."'");
$qk=mysqli_fetch_array($qd);
$matno=$qk['matno'];


$ck=mysqli_query($con,"select * from exam_answer where exam_id='".$_GET['id']."' and student_id='".$_SESSION['user_id']."' and status='1' ");
$answer=mysqli_fetch_array($ck);


$query=mysqli_query($con,"select * from exam where id='".$_GET['id']."'");
$exam=mysqli_fetch_array($query);


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
                            <li class="breadcrumb-item"><a href="javascript:void(0)"><?=$exam['course']?></a></li>
                            <li class="breadcrumb-item active">Exam</li>
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
                                    <h4>SCORE EXAM</h4>

                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form action="#" method="POST">
                                          

                                         <div class="container">
                                            <div class="row">

                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <p class="text-muted m-b-15 f-s-12">Question 1 (Score allocation: <?=$exam['s1']?> Marks):</p>
                                                    <textarea rows="8" cols="80" class="form-control" style="height:100px" readonly><?=$exam['q1']?></textarea>
                                                </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <p class="text-muted m-b-15 f-s-12">Answer 1:</p>
                                                   <textarea rows="8" cols="80" class="form-control"  style="height:100px" readonly><?=$answer['a1']?></textarea>
                                                </div>
                                                </div>


                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <p class="text-muted m-b-15 f-s-12">Allocated Score 1:</p>
                                                   <textarea rows="8" cols="80" class="form-control" name="s1" style="height:100px" readonly><?=$answer['s1']?></textarea>
                                                </div>
                                                </div>


                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <p class="text-muted m-b-15 f-s-12">Question 2 (Score allocation: <?=$exam['s2']?> Marks):</p>
                                                    <textarea rows="8" cols="80" class="form-control" style="height:100px" readonly><?=$exam['q2']?></textarea>
                                                </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <p class="text-muted m-b-15 f-s-12">Answer 2:</p>
                                                   <textarea rows="8" cols="80" class="form-control"  style="height:100px" readonly><?=$answer['a2']?></textarea>
                                                </div>
                                                </div>


                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <p class="text-muted m-b-15 f-s-12">Allocated Score 2:</p>
                                                   <textarea rows="8" cols="80" class="form-control" name="s1" style="height:100px" readonly><?=$answer['s2']?></textarea>
                                                </div>
                                                </div>


                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <p class="text-muted m-b-15 f-s-12">Question 3 (Score allocation: <?=$exam['s3']?> Marks):</p>
                                                    <textarea rows="8" cols="80" class="form-control" style="height:100px" readonly><?=$exam['q3']?></textarea>
                                                </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <p class="text-muted m-b-15 f-s-12">Answer 3:</p>
                                                   <textarea rows="8" cols="80" class="form-control"  style="height:100px" readonly><?=$answer['a3']?></textarea>
                                                </div>
                                                </div>


                                              <div class="col-md-2">
                                                    <div class="form-group">
                                                        <p class="text-muted m-b-15 f-s-12">Allocated Score 3:</p>
                                                   <textarea rows="8" cols="80" class="form-control" name="s1" style="height:100px" readonly><?=$answer['s3']?></textarea>
                                                </div>
                                                </div>



                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <p class="text-muted m-b-15 f-s-12">Question 4 (Score allocation: <?=$exam['s4']?> Marks):</p>
                                                    <textarea rows="8" cols="80" class="form-control" style="height:100px" readonly><?=$exam['q4']?></textarea>
                                                </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <p class="text-muted m-b-15 f-s-12">Answer 4:</p>
                                                   <textarea rows="8" cols="80" class="form-control"  style="height:100px" readonly><?=$answer['a4']?></textarea>
                                                </div>
                                                </div>


                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <p class="text-muted m-b-15 f-s-12">Allocated Score 4:</p>
                                                   <textarea rows="8" cols="80" class="form-control" name="s1" style="height:100px" readonly><?=$answer['s4']?></textarea>
                                                </div>
                                                </div>


                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <p class="text-muted m-b-15 f-s-12">Question 5 (Score allocation: <?=$exam['s5']?> Marks):</p>
                                                    <textarea rows="8" cols="80" class="form-control" style="height:100px" readonly><?=$exam['q5']?></textarea>
                                                </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <p class="text-muted m-b-15 f-s-12">Answer 5:</p>
                                                   <textarea rows="8" cols="80" class="form-control"  style="height:100px" readonly><?=$answer['a5']?></textarea>
                                                </div>
                                                </div>


                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <p class="text-muted m-b-15 f-s-12">Allocated Score 5:</p>
                                                   <textarea rows="8" cols="80" class="form-control" name="s1" style="height:100px" readonly><?=$answer['s5']?></textarea>
                                                </div>
                                                </div>


                                                <div class="col-md-07 offset-md-5">
                                                    <div class="form-group">
                                                        <p class="text-muted m-b-15 f-s-12">Total Score:</p>
                                                   <textarea rows="8" cols="10" class="form-control" name="s1" style="height:100px;font-size: 50px;font-weight: bolder;text-align: center;" readonly><?=$answer['total']?></textarea>
                                                </div>
                                                </div>



                                                
                                            </div>
                                             
                                         </div>
                                         
                                         
                                    </form>
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