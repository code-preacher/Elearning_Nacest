<?php
session_start();
$id=$_GET['id'];
include('../inc/config.php');
mysqli_query($con,"delete from reference where id='$id'");
$_SESSION['rfmsg']= '<span style="color:green;">'."Reference was successfully deleted".'</span>';
header("location:view-reference.php");
?>