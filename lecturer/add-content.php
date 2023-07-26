<?php
session_start();
error_reporting(0);
include '../inc/checklogin.php';
check_login();
$_SESSION['wmsg']="";
?>
<?php
include '../inc/config.php';
$qd=mysqli_query($con,"select * from lecturer where email='".$_SESSION['user_id']."'");
$qk=mysqli_fetch_array($qd);
$department=$qk['department'];
$id=$qk['id'];

if(isset($_POST['sub'])){ 
    extract($_POST);

    $ry=mysqli_query($con,"select * from syllabus where id='$sid'");
    $rb=mysqli_fetch_array($ry);
    $content_name=$rb['coursename'];
    $syllabus=$rb['syllabus'];

    $doc=$_FILES['document']['name'];
    $temp=$_FILES['document']['tmp_name'];
    $folder="document/" ;  
    $document=$content_name.'_'.$syllabus.'_'.uniqid().'_'.$doc;  

    $aud=$_FILES['audio']['name'];
    $temp2=$_FILES['audio']['tmp_name'];
    $folder2="audio/" ;  
    $audio=$content_name.'_'.$syllabus.'_'.uniqid().'_'.$aud; 


    $vid=$_FILES['video']['name'];
    $temp3=$_FILES['video']['tmp_name'];
    $folder3="video/" ;  
    $video=$content_name.'_'.$syllabus.'_'.uniqid().'_'.$vid; 


    move_uploaded_file($temp,$folder.$document)  ;
    move_uploaded_file($temp2,$folder2.$audio)  ;
    move_uploaded_file($temp3,$folder3.$video)  ;





    $date=date("d-m-y @ g:i A");
    $qz=mysqli_query($con,"insert into learning_content(content_name,document,audio,video,department,syllabus_id,lecturer_id,date) values('$content_name','$document','$audio','$video','$department','$sid','$id','$date')");
    if($qz){
        $_SESSION['lcmsg']='<span style="color:green;">'."Learning Content was successfully Added".'</span>';
    }
    else{
        $_SESSION['lcmsg']='<span style="color:red;">'."Learning Content was not successfully Added".'</span>';    
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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Add Learning Content</a></li>
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
                                    <h4>ADD LEARNING CONTENT</h4>

                                    <p>
                                     
                                        <?php if (!empty($_SESSION['lcmsg'])) {
                                            echo $_SESSION['lcmsg'];
                                            $_SESSION['lcmsg']="";
                                        } 
                                        ?>
                                    </p>

                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form action="#" method="POST" enctype="multipart/form-data">
                                           <div class="col-md-12">

                                            <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Course Name and Title :</p>
                                                <select class="form-control input-rounded" name="sid" title="Please syllabus" required="required">
                                                  <?php
                                                  $rt=mysqli_query($con,"select * from syllabus where lecturer_id='$id' order by id desc");
                                                  while ($f=mysqli_fetch_array($rt)) {
                                                     ?>
                                                     <option value="<?php echo $f['id']?>"><?php echo strtoupper($f['coursename'].'--'.$f['syllabus']);  ?></option>
                                                     
                                                     <?php } ?>

                                                 </select>
                                             </div>
                                             

                                         </div>

                                         <div class="row">
                                             

                                          <div class="col-md-4">
                                           <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Upload Document :</p>
                                            <input type="file" class="form-control input-rounded" name="document" title="Please select document"  required="required">
                                        </div>
                                    </div> 

                                    <div class="col-md-4">
                                       <div class="form-group">
                                        <p class="text-muted m-b-15 f-s-12">Upload Audio :</p>
                                        <input type="file" class="form-control input-rounded" name="audio" title="Please select Audio"  required="required">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                   <div class="form-group">
                                    <p class="text-muted m-b-15 f-s-12">Upload Video :</p>
                                    <input type="file" class="form-control input-rounded" name="video" title="Please select Video"  required="required">
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