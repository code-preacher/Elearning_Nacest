<?php
session_start();
$id=$_GET['id'];
include('../inc/config.php');
mysqli_query($con,"delete from learning_content where id='$id'");
$_SESSION['lkmsg']= '<span style="color:green;">'."Learning Content was successfully deleted".'</span>';
header("location:view-content.php");
?>