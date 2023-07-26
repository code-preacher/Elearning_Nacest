<?php
session_start();
$id=$_GET['id'];
include('../inc/config.php');
mysqli_query($con,"delete from syllabus where id='$id'");
$_SESSION['vsmsg']= '<span style="color:green;">'."Syllabus was successfully deleted".'</span>';
header("location:view-syllabus.php");
?>