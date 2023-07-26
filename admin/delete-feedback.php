<?php
session_start();
$id=$_GET['id'];
include('../inc/config.php');
mysqli_query($con,"delete from feedback where id='$id'");
$_SESSION['dmsg']= '<span style="color:green;">'."Feedback was successfully deleted".'</span>';
header("location:view-feedback.php");
?>