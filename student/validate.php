<?php
session_start();
error_reporting(0);
include '../inc/checklogin.php';
check_login();

?>
<?php
include '../inc/config.php';

$qh=mysqli_query($con,"select * from student where matno='".$_SESSION['user_id']."'");
$qx=mysqli_fetch_array($qh);




if(isset($_POST['sub'])){
    extract($_POST);

    $qg=mysqli_query($con,"select * from reference where ref='$ref' and matno='".$qx['matno']."' and year='".$qx['year']."' and status='0'");
    $qf=mysqli_fetch_array($qg);

    $qs=mysqli_query($con,"select * from reference where ref='$ref' and matno='".$qx['matno']."' and year='".$qx['year']."' and status='1'");
    $qt=mysqli_fetch_array($qs);

    if($qf>0) {
        $_SESSION['vmsg']='<span style="color:green;">'."Congratulation, Reference is Verified and Validated your fees is confirmed".'</span>'; 
        mysqli_query($con,"update reference set status='1' where matno='".$qx['matno']."' and ref='$ref' "); 
    } 
    else if($qt>0) {
        $_SESSION['vmsg']='<span style="color:orange;">'."Reference was already Validated before for ".$qx['sname'].' '.$qx['mname'].' '.$qx['fname'].' with Matric number '.$qx['matno'].'</span>';
    }
    else {
        $_SESSION['vmsg']='<span style="color:red;">'."Error Validating, Invalid reference try again ".'</span>'; 
    }

}
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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Validate Reference</a></li>
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
                                    <h4>VALIDATE REFERENCE</h4>

                                    <p>
                                     
                                        <?php
                                        if (!empty($_SESSION['vmsg'])) {
                                            echo $_SESSION['vmsg'];
                                            $_SESSION['vmsg']="";
                                        } 
                                        ?>
                                    </p>

                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form action="#" method="POST">
                                          
                                           <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Reference :</p>
                                            <input type="text" class="form-control input-rounded" name="ref" placeholder="Please enter reference"  title="Please  enter reference" required="required">
                                        </div>

                                        
                                        <div class="form-actions">
                                            <button type="submit" name="sub" class="btn btn-success col-md-3"> <i class="fa fa-check"></i> Validate</button>
                                            <button type="reset" class="btn btn-inverse col-md-3"><i class="fa fa-refresh"></i> Clear</button>
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