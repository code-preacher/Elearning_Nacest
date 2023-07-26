<?php
session_start();
error_reporting(0);
include '../inc/checklogin.php';
check_login();
$_SESSION['wmsg']="";
?>
<?php
include '../inc/config.php';
if(isset($_POST['sub'])){
    extract($_POST);
    $date=date("d-m-y @ g:i A");
    $pix=$_FILES['pic']['name'];
    $temp=$_FILES['pic']['tmp_name'];
    $folder="lecturerimages/" ;  
    $pd=uniqid().'_'.$pix;  
    move_uploaded_file($temp,$folder.$pd);
    $qu=mysqli_query($con,"insert into lecturer(fname,mname,sname,address,phone,gender,dob,religion,hobby,image,email,password,department,level,date) values('$fname','$mname','$sname','$address','$phone','$gender','$dob','$religion','$hobby','$pd','$email','$password','$department','lecturer','$date')");
    if($qu){
        $_SESSION['wmsg']='<span style="color:green;">'."Lecturer was successfully Added".'</span>';
        mysqli_query($con,"insert into user_login(user_id,password,level) values('$email','$password','lecturer') ");
    }
    else{
        $_SESSION['wmsg']='<span style="color:red;">'."Lecturer was not successfully Added".'</span>';    
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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Add Lecturer</a></li>
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
                                    <h4>ADD LECTURER</h4>

                                    <p>
                                     
                                        <?php if (!empty($_SESSION['wmsg'])) {
                                            echo $_SESSION['wmsg'];
                                        } 
                                        ?>
                                    </p>

                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                       
                                     <form action="#" method="POST"  enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-4">
                                               <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">First Name :</p>
                                                <input type="text" class="form-control input-rounded" name="fname" title="Please enter first name" placeholder="Please enter first name" required="required">
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                           <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Middle Name :</p>
                                            <input type="text" class="form-control input-rounded" name="mname" title="Please enter first name" placeholder="Please enter middle name" required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                        <p class="text-muted m-b-15 f-s-12">Surname :</p>
                                        <input type="text" class="form-control input-rounded" name="sname" title="Please enter surname" placeholder="Please enter surname" required="required">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                   <div class="form-group">
                                    <p class="text-muted m-b-15 f-s-12">Address :</p>
                                    <input type="text" class="form-control input-rounded" name="address" title="Please enter address" placeholder="Please enter address" required="required">
                                </div>
                            </div>

                            <div class="col-md-4">
                               <div class="form-group">
                                <p class="text-muted m-b-15 f-s-12">Phone Number :</p>
                                <input type="text" class="form-control input-rounded" name="phone" title="Please enter phone number" placeholder="Please enter phone number" required="required">
                            </div>
                        </div>

                        <div class="col-md-4">
                           <div class="form-group">
                            <p class="text-muted m-b-15 f-s-12">Select Gender :</p>
                            <select class="form-control input-rounded" name="gender" title="Please select gender" required="required">
                                <option value="MALE">MALE</option>
                                <option value="FEMALE">FEMALE</option>
                                <option value="OTHERS">OTHERS</option>

                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                       <div class="form-group">
                        <p class="text-muted m-b-15 f-s-12">Date of Birth :</p>
                        <input type="date" class="form-control input-rounded" name="dob" title="Please enter date of birth" required="required">
                    </div>
                </div>

                <div class="col-md-4">
                   <div class="form-group">
                    <p class="text-muted m-b-15 f-s-12">Password :</p>
                    <input type="text" class="form-control input-rounded" name="password" title="Please enter password" placeholder="Please enter password" required="required">
                </div>
            </div>


            <div class="col-md-4">
               <div class="form-group">
                <p class="text-muted m-b-15 f-s-12">Email:</p>
                <input type="email" class="form-control input-rounded" name="email" title="Please enter email" placeholder="Please enter email" required="required">
            </div>
        </div>


        <div class="col-md-4">
           <div class="form-group">
            <p class="text-muted m-b-15 f-s-12">Select Religion :</p>
            <select class="form-control input-rounded" name="religion" title="Please select religion" required="required">
                <option value="CHRISTIANITY">CHRISTIANITY</option>
                <option value="ISLAM">ISLAM</option>
                <option value="OTHERS">OTHERS</option>

            </select>
        </div>
    </div>

    <div class="col-md-4">
       <div class="form-group">
        <p class="text-muted m-b-15 f-s-12">Select Department :</p>
        <select class="form-control input-rounded" name="department" title="Please select religion" required="required">
          <?php
          $rt=mysqli_query($con,"select dept_name from department order by id desc");
          while ($f=mysqli_fetch_array($rt)) {
             ?>
             <option value="<?php echo $f['dept_name'];  ?>"><?php echo strtoupper($f['dept_name']);  ?></option>
             
             <?php } ?>

         </select>
     </div>
 </div>

 <div class="col-md-4">
   <div class="form-group">
    <p class="text-muted m-b-15 f-s-12">Upload Image :</p>
    <input type="file" class="form-control input-rounded" name="pic" title="Please select image"  required="required">
</div>
</div>




<div class="col-md-12">
   <div class="form-group">
    <p class="text-muted m-b-15 f-s-12">Hobby :</p>
    <input type="text" class="form-control input-rounded" name="hobby" title="Please enter hobby" placeholder="Please enter hobby" required="required">
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