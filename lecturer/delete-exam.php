<?php
session_start();
$id=$_GET['id'];
include('../inc/config.php');
mysqli_query($con,"delete from exam where id='$id'");
$_SESSION['vemsg']= '<span style="color:green;">'."Exam was successfully deleted".'</span>';
header("location:view-exam.php");
?>