<?php
session_start();
error_reporting(0);
include '../inc/checklogin.php';
check_login();
$_SESSION['xmsg']="";
?>
<?php
include '../inc/config.php';

$qd=mysqli_query($con,"select * from lecturer where email='".$_SESSION['user_id']."'");
$qk=mysqli_fetch_array($qd);
$id=$qk['id'];

if(isset($_POST['sub'])){
    extract($_POST);
    $date=date("d-m-y @ g:i A");
    $status='0';
    $qu=mysqli_query($con,"insert into exam(lecturer_id,year,department,course,q1,s1,q2,s2,q3,s3,q4,s4,q5,s5,total,status) values('$id','$year','$department','$course','$q1','$s1','$q2','$s2','$q3','$s3','$q4','$s4','$q5','$s5','$total','$status')");
    if($qu){
        $_SESSION['exmsg']='<span style="color:green;">'."Exam was successfully Added".'</span>';
    }
    else{
        $_SESSION['exmsg']='<span style="color:red;">'."Exam was not successfully Added".'</span>';    
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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Add Exam</a></li>
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
                                    <h4>ADD EXAM</h4>

                                    <p>
                                     
                                        <?php if (!empty($_SESSION['exmsg'])) {
                                            echo $_SESSION['exmsg'];
                                            $_SESSION['exmsg']="";
                                        } 
                                        ?>
                                    </p>

                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form action="#" method="POST">
                                          

                                            <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Session Year :</p>
                                                <select class="form-control input-rounded" name="year" title="Please select session year" required="required">
                                                 <?php
                                                 $d=date('Y');
                                                 for ($i=$d; $i >=1915 ; $i--) { 
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
                                            <select class="form-control input-rounded" name="department" title="Please select department" required="required">
                                              <?php
                                              $rt=mysqli_query($con,"select dept_name from department order by id desc");
                                              while ($f=mysqli_fetch_array($rt)) {
                                                 ?>
                                                 <option value="<?php echo $f['dept_name'];  ?>"><?php echo strtoupper($f['dept_name']);  ?></option>
                                                 
                                                 <?php } ?>

                                             </select>
                                         </div>


                                          <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Select Course :</p>
                                            <select class="form-control input-rounded" name="course" title="Please select course" required="required">
                                              <?php
                                              $rt=mysqli_query($con,"select coursename from syllabus order by id desc");
                                              while ($f=mysqli_fetch_array($rt)) {
                                                 ?>
                                                 <option value="<?php echo $f['coursename'];  ?>"><?php echo strtoupper($f['coursename']);  ?></option>
                                                 
                                                 <?php } ?>

                                             </select>
                                         </div>


                                         <div class="container">
                                            <div class="row">

                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <p class="text-muted m-b-15 f-s-12">Question 1:</p>
                                                    <textarea name="q1" rows="8" cols="80" class="form-control" placeholder="Please enter question 1" style="height:100px"></textarea>
                                                </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <p class="text-muted m-b-15 f-s-12">Score Allocation 1:</p>
                                                    <input type="number" class="form-control input-rounded" name="s1" placeholder="Please enter score for question 1" required="required">
                                                </div>
                                                </div>


                                                  <div class="col-md-8">
                                                    <div class="form-group">
                                                        <p class="text-muted m-b-15 f-s-12">Question 2:</p>
                                                    <textarea name="q2" rows="8" cols="80" class="form-control" placeholder="Please enter question 2" style="height:100px"></textarea>
                                                </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <p class="text-muted m-b-15 f-s-12">Score Allocation 2:</p>
                                                    <input type="number" class="form-control input-rounded" name="s2" placeholder="Please enter score for question 2" required="required">
                                                </div>
                                                </div>


                                                  <div class="col-md-8">
                                                    <div class="form-group">
                                                        <p class="text-muted m-b-15 f-s-12">Question 3:</p>
                                                    <textarea name="q3" rows="8" cols="80" class="form-control" placeholder="Please enter question 3" style="height:100px"></textarea>
                                                </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <p class="text-muted m-b-15 f-s-12">Score Allocation 3:</p>
                                                    <input type="number" class="form-control input-rounded" name="s3" placeholder="Please enter score for question 3" required="required">
                                                </div>
                                                </div>

                                                  <div class="col-md-8">
                                                    <div class="form-group">
                                                        <p class="text-muted m-b-15 f-s-12">Question 4:</p>
                                                    <textarea name="q4" rows="8" cols="80" class="form-control" placeholder="Please enter question 4" style="height:100px"></textarea>
                                                </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <p class="text-muted m-b-15 f-s-12">Score Allocation 4:</p>
                                                    <input type="number" class="form-control input-rounded" name="s4" placeholder="Please enter score for question 4" required="required">
                                                </div>
                                                </div>

                                                  <div class="col-md-8">
                                                    <div class="form-group">
                                                        <p class="text-muted m-b-15 f-s-12">Question 5:</p>
                                                    <textarea name="q5" rows="8" cols="80" class="form-control" placeholder="Please enter question 5" style="height:100px"></textarea>
                                                </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <p class="text-muted m-b-15 f-s-12">Score Allocation 5:</p>
                                                    <input type="number" class="form-control input-rounded" name="s5" placeholder="Please enter score for question 5" required="required">
                                                </div>
                                                </div>

                                                  <div class="col-md-12">
                                                    <div class="form-group">
                                                        <p class="text-muted m-b-15 f-s-12">Total Score :</p>
                                                    <input type="number" class="form-control input-rounded" name="total" placeholder="Please enter total score" required="required">
                                                </div>
                                                </div>
                                                
                                            </div>
                                             
                                         </div>
                                         
                                         

                                         <div class="form-actions">
                                            <button type="submit" name="sub" class="btn btn-success col-md-3"> <i class="fa fa-plus"></i> Add</button>
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