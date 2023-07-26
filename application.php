<?php
session_start();
error_reporting(0);

include 'inc/config.php';
if(isset($_POST['submit'])){

	extract($_POST);

  $pix=$_FILES['jamb']['name'];
  $temp=$_FILES['jamb']['tmp_name'];
  $folder="application_images/" ;  

  $pix2=$_FILES['result']['name'];
  $temp2=$_FILES['result']['tmp_name'];
  $folder2="application_images/" ;

  $jamb=uniqid().'_'.$pix; 
  $result=uniqid().'_'.$pix2;  


  move_uploaded_file($temp,$folder.$jamb)  ;
  move_uploaded_file($temp2,$folder2.$result)  ;

		$qu=mysqli_query($con,"insert into application(name,email,address,nationality,course,jamb,result,status) values('$name','$email','$address','$nationality','$course','$jamb','$result','0')");
		if($qu){
			$_SESSION['tmsg']='<span style="color:green;">'."Application was sent successfully".'</span>';
		}
		else{
			$_SESSION['tmsg']='<span style="color:red;">'."Application was not sent".'</span>';    
		}

	

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>NACEST, ELEARNING SYSTEM</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<!--===============================================================================================-->

	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form action="application.php" class="login100-form validate-form" method="post" enctype="multipart/form-data">
<!-- 
					<span class="login100-form-title p-b-5">
						<p style="color: blue;opacity: .5;font-size: 20px;margin-top: -150px;"> <marquee behavior="alternate" scrollDelay="10">COURSEWARE FOR DISTANCE LEARNING</marquee></p>
						<br><br><br><br>
						
					</span> -->
					<h1 style="margin-top: -150px;">Application Form</h1>
					<p>
						<?php echo $_SESSION['tmsg']; ?>
						<?php echo $_SESSION['tmsg']=""; ?>
					</p>
					
					<div class="wrap-input100 validate-input" style="margin-top: -2px;" data-validate = "fullname is required">
						<input class="input100" type="text" name="name" placeholder="Your Fullname" required  />
						<span class="focus-input100">Fullname</span>
						<span class="label-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Email is required">
						<input class="input100" type="email" name="email" placeholder="Your Email" required />
						<span class="focus-input100">Email</span>
						<span class="label-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Address is required">
						<input class="input100" type="text" name="address" placeholder="Your Address" required />
						<span class="focus-input100">Address</span>
						<span class="label-input100"></span>
					</div>


					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="text" name="nationality" placeholder="Your Nationality" required />
						<span class="focus-input100">Nationality</span>
						<span class="label-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Course of Study is required">
						<!-- 	<input class="input100" type="text" name="state" placeholder="Your State of Origin" required  /> -->
						<span>Course of Study</span>
						<select class="input100"  name="course" title="Please Course of Study" placeholder="Your Course of Study" required="required">
							<?php
							$rt=mysqli_query($con,"select dept_name from department order by id desc");
							while ($f=mysqli_fetch_array($rt)) {
								?>
								<option value="<?php echo $f['dept_name'];  ?>"><?php echo strtoupper($f['dept_name']);  ?></option>
								
							<?php } ?>

						</select>
						<span class="label-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Jamb Result is required">
						<span>Upload Jamb Result</span>
						<input class="input100" type="file" name="jamb" placeholder="Your Jamb Result" required />
						
						<span class="label-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="WAEC/NECO Result is required">
						<span>Upload Waec/Neco Result</span>
						<input class="input100" type="file" name="result" placeholder="Your WAEC/NECO Result" required />
						
						<span class="label-input100"></span>
					</div>


					<div class="container-login100-form-btn">
						<button  type="submit" name="submit" class="login100-form-btn">
							Submit
						</button>
					</div>
					
					<div class="text-left p-t-46 p-b-20">
						<span class="txt2">
							

							<a href="index.html" style="text-decoration: none;">
								Go back to home?
								<i class="fa fa-home fa-2x"></i>
							</a>
							<a href="application-check.php" style="text-decoration: none;">
								Check Admission Status
								<i class="fa fa-check-circle"></i>
							</a>
						</span>
					</div>


					
					
					


				</fieldset>
			</form>

			<div class="login100-more" style="background-image: url('images/login.jpg');">
			</div>
		</div>
	</div>
</div>





<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>


