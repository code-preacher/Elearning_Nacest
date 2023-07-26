<?php
session_start();
error_reporting(0);
include '../inc/checklogin.php';
check_login();
?>
<?php
include '../inc/config.php';
$qd=mysqli_query($con,"select * from student where matno='".$_SESSION['user_id']."'");
$qk=mysqli_fetch_array($qd);
$sd=$qk['sname'].' '.$qk['mname'].' '.$qk['fname'].'(Student)';
if(isset($_POST['sub'])){   
    $fed=$_POST['fed'];
    $date=date("d-m-y @ g:i A");
    $qz=mysqli_query($con,"insert into feedback(sender,message,date) values('$sd','$fed','$date')");
    if($qz){
        $_SESSION['bmsg']='<span style="color:green;">'."Feedback was successfully Added".'</span>';
    }
    else{
        $_SESSION['bmsg']='<span style="color:red;">'."Feedback was not successfully Added".'</span>';    
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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Send Feedback</a></li>
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
                                    <h4>SEND FEEDBACK</h4>

                                    <p>
                                     
                                        <?php if (!empty($_SESSION['bmsg'])) {
                                            echo $_SESSION['bmsg'];
                                            $_SESSION['bmsg']="";
                                        } 
                                        ?>
                                    </p>

                                </div>
                                <div class="card-body">
                                    <div class="card-content">
                                        <!-- Left sidebar -->
                                        
                                        <div class="mt-2">

                                            <form action="#" role="form" method="POST">
                                                
                                                <div class="form-group">
                                                    <textarea name="fed" rows="8" cols="80" class="form-control" style="height:100px">


                                                    </textarea>
                                                </div>

                                                <div class="form-group m-b-0">
                                                    <div class="text-right">
                                                        
                                                        <button type="reset" class="btn btn-success waves-effect waves-light m-r-5"><i class="fa fa-trash-o"></i></button>
                                                        <button type="submit" name="sub" class="btn btn-purple waves-effect waves-light"> <span>Send</span> <i class="fa fa-send m-l-10"></i> </button>
                                                    </div>
                                                </div>

                                            </form>


                                        </div>

                                        <div class="clearfix"></div>

                                    </div>

                                </div>


                            </div>



                            <?php
                            $seat=mysqli_query($con,"SELECT * FROM feedback order by id desc");
                            while($row3=mysqli_fetch_array($seat)){
                               $sender=$row3['sender'];    
                               $message=$row3['message'];
                               $date=$row3['date'];
                               ?>

                               <div class="col-lg-10 offset-lg-1">
                                <div class="card">
                                    <div style="padding: 2px;">
                                     <?php echo $message."<br/>"."<hr/><div class='offset-lg-6'>".$sender."&nbsp;&nbsp;&nbsp;@&nbsp;&nbsp;".$date."</div>"; ?>

                                 </div>
                             </div><br/>
                         </div>
                         
                         
                         <?php          
                     }
                     
                     ?>
                     




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