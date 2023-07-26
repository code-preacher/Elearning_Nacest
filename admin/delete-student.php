<?php
session_start();
$id=$_GET['id'];
include('../inc/config.php');
mysqli_query($con,"delete from student where id='$id'");
$_SESSION['stmsg']= '<span style="color:green;">'."Student was successfully deleted".'</span>';
header("location:view-student.php");
?>