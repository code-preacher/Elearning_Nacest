<?php
session_start();
$id=$_GET['id'];
include('../inc/config.php');
mysqli_query($con,"delete from lecturer where id='$id'");
$_SESSION['lecmsg']= '<span style="color:green;">'."Lecturer was successfully deleted".'</span>';
header("location:view-lecturer.php");
?>