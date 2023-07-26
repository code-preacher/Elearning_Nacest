<?php
session_start();
include('../inc/config.php');

if(isset($_POST['sub'])){
	$pass=$_POST['pwd'];

	$ql=mysqli_query($con,"update user_login set password='$pass' where user_id='".$_SESSION['user_id']."'");
	$qd=mysqli_query($con,"select * from user_login where user_id='".$_SESSION['user_id']."'");
	$qk=mysqli_fetch_array($qd);
	$qp=mysqli_query($con,"update student set password='$pass' where matno='".$_SESSION['user_id']."'");

	if($ql && $qp){
		$_SESSION['pmsg']='<span style="color:green;">'."Password was successfully updated".'</span>';
		$_SESSION['user_id']=$qk['user_id'];
	}
	else{
		$_SESSION['pmsg']='<span style="color:red;">'."Password was not successfully updated".'</span>';    
	}
}

header("location:profile.php");
?>