<?php
session_start();
$id=$_GET['id'];
include('../inc/config.php');
mysqli_query($con,"delete from department where id='$id'");
$_SESSION['dpmsg']= '<span style="color:green;">'."Department was successfully deleted".'</span>';
header("location:view-department.php");
?>