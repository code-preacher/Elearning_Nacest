<?php
session_start();
$id=$_GET['id'];
include('../inc/config.php');
mysqli_query($con,"delete from upcoming_event_department where id='$id'");
$_SESSION['utmsg']= '<span style="color:green;">'."General Upcoming Coming Event was successfully deleted".'</span>';
header("location:view-upcoming-event-department.php");
?>