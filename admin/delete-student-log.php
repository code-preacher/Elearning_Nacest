<?php
session_start();
$id=$_GET['id'];
include('../inc/config.php');
mysqli_query($con,"delete from session_log where id='$id'");
$_SESSION['stlmsg']= '<span style="color:green;">'."Student Log was successfully deleted".'</span>';
header("location:student-log.php");
?>