<?php
session_start();
error_reporting(0);
include '../inc/checklogin.php';
check_login();
?>
<?php
include '../inc/config.php';
?>

<?php
session_start();

$d=date("d/m/y");
$time=date("g:i A");
$st=mysqli_query($con,"SELECT user_id FROM user_login where user_id= '".$_SESSION['user_id']."' order by id desc");
$ts=mysqli_fetch_array($st);
mysqli_query($con,"UPDATE session_log  SET logout_time='$time',status='0' WHERE user_id= '".$ts['user_id']."' and date='$d' ");

$_SESSION['user_id']=="";
$_SESSION['login']=="";
session_unset();
$_SESSION['msg']='<span style="color:green;">'."You have successfully logged out".'</span>';
?>
<script language="javascript">
	document.location="../login.php";
</script>
