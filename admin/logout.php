<?php
session_start();

include('../inc/config.php');
#date_default_timezone_set('Asia/Kolkata');
#$ldate=date( 'd-m-Y h:i:s A', time () );
$_SESSION['user_id']=="";
$_SESSION['login']=="";
session_unset();
$_SESSION['msg']='<span style="color:green;">'."You have successfully logged out".'</span>';
?>
<script language="javascript">
	document.location="../login.php";
</script>
