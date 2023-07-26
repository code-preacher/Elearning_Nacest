<?php;
ob_start();
session_start();
error_reporting(0);
include '../inc/checklogin.php';
checkLogin();
$id=$_GET['id'];
?>
<?php
include '../inc/config.php';

$ret=mysqli_query($con,"SELECT * FROM application where id='".$_GET['id']."'");
$row=mysqli_fetch_array($ret);
$idp=$row['id'];
$apm=$row['status'];

 if($apm=='0'){
mysqli_query($con,"UPDATE application SET status='1' WHERE id='$idp'");
 }            
 elseif($apm=='1'){
mysqli_query($con,"UPDATE application SET status='0' WHERE id='$idp'");
 }
 elseif($apm==''){
mysqli_query($con,"UPDATE application SET status='0' WHERE id='$idp'");
 }
 header('location:view-application.php');



?>

