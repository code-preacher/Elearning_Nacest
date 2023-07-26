<?php
session_start();
error_reporting(0);
include '../inc/checklogin.php';
check_login();
$_SESSION['wmsg']="";
?>
<?php
include '../inc/config.php';
$ta=mysqli_query($con,"select * from syllabus where id='".$_GET['id']."'");
$tb=mysqli_fetch_array($ta);



if(isset($_POST['sub'])){
    extract($_POST);
    $date=date("d-m-y @ g:i A");
    $qu=mysqli_query($con,"update syllabus set coursename='$course',syllabus='$syllabus',year='$year',department='$department' where id='".$_GET['id']."' ");
    if($qu){
        $_SESSION['vsmsg']='<span style="color:green;">'."Syllabus was successfully Added".'</span>';
    }
    else{
        $_SESSION['vsmsg']='<span style="color:red;">'."Syllabus was not successfully Added".'</span>';    
    }


    header("location:view-syllabus.php");
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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Edit Syllabus</a></li>
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
                                    <h4>EDIT SYLLABUS</h4>

                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form action="#" method="POST">
                                          
                                            <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Course Name and Title :</p>
                                                <input type="text" class="form-control input-rounded" name="course" placeholder="Please enter course name and title; example :Math101,Introduction to mathematics"  title="Please enter course name and title" value="<?php echo $tb['coursename'];  ?>" required="required">
                                            </div>

                                            <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Outline Syllabus :</p>
                                                <input type="text" class="form-control input-rounded" name="syllabus" placeholder="Please enter ouline syllabus and use comma to separate items"  title="Please enter ouline syllabus and use comma to separate items" value="<?php echo $tb['syllabus'];  ?>" required="required">
                                            </div>

                                            <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Year :</p>
                                                <select class="form-control input-rounded" name="year" title="Please select year" required="required">
                                                   <option value="<?php echo $tb['year'];  ?>"><?php echo strtoupper($tb['year']);  ?></option>
                                                   <?php
                                                   $d=date('Y');
                                                   for ($i=1915; $i <= $d; $i++) { 
                                                    $c=$i + 1;
                                                    ?>

                                                    <option value="<?php echo $i.'/'.$c;?>"><?php echo $i.'/'.$c;?></option>
                                                    
                                                    <?php
                                            # code...
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        
                                        <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Select Department :</p>
                                            <select class="form-control input-rounded" name="department" title="Please select religion" required="required">
                                               <option value="<?php echo $tb['department'];  ?>"><?php echo strtoupper($tb['department']);  ?></option>
                                               <?php
                                               $rt=mysqli_query($con,"select dept_name from department order by id desc");
                                               while ($f=mysqli_fetch_array($rt)) {
                                                 ?>
                                                 <option value="<?php echo $f['dept_name'];  ?>"><?php echo strtoupper($f['dept_name']);  ?></option>
                                                 
                                                 <?php } ?>

                                             </select>
                                         </div>
                                         
                                         

                                         <div class="form-actions">
                                            <button type="submit" name="sub" class="btn btn-success col-md-3"> <i class="fa fa-plus"></i> Update</button>
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