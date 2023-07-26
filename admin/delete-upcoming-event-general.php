<?php
session_start();
$id=$_GET['id'];
include('../inc/config.php');
mysqli_query($con,"delete from upcoming_event_general where id='$id'");
$_SESSION['upmsg']= '<span style="color:green;">'."General Upcoming Coming Event was successfully deleted".'</span>';
header("location:view-upcoming-event-general.php");
?>