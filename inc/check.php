<?php
session_start();
error_reporting(0);
include("config.php");
if(isset($_POST['submit']))
{
$user_id=Cleanse(mysqli_real_escape_string($con,$_POST['user_id']));
$pass=Cleanse(mysqli_real_escape_string($con,$_POST['password']));
	
#student
$ret=mysqli_query($con,"SELECT * FROM user_login WHERE user_id='$user_id' and password='$pass' and level='student'");
$num=mysqli_fetch_array($ret);

$sysip = gethostbyname($HOSTNAME);
$IP = $_SERVER['REMOTE_ADDR'];        // Obtains the IP address
$cmp = gethostbyaddr($IP);   // Obtains the "remote host


if($num>0)
{
$extra="../student/dashboard.php";//
$_SESSION['user_id']=$num['user_id'];
$_SESSION['login']=1;
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');

$rett=mysqli_query($con,"SELECT * FROM student WHERE matno='$user_id'");
$retr=mysqli_fetch_array($rett);
$fn=$retr['sname'].' '.$retr['mname'].' '.$retr['fname'];
$user=$retr['matno'];
$ps=$retr['password'];
$dt=date("d/m/y");
$time=date("g:i A");

mysqli_query($con,"insert into session_log(level,fullname,user_id,password,login_time,logout_time,device,status,date) values('student','$fn','$user','$ps','$time','','$cmp','1','$dt')");
header("location:http://$host$uri/$extra");
exit();
}
else{
	$_SESSION['msg']='<span style="color:red;">'."Invalid user id or password".'</span>';
	header("location:../login.php");
}



#lecturer
$ret2=mysqli_query($con,"SELECT * FROM user_login WHERE user_id='$user_id' and password='$pass' and level='lecturer'");
$num2=mysqli_fetch_array($ret2);


if($num2>0)
{
$extra="../lecturer/dashboard.php";//
$_SESSION['user_id']=$num2['user_id'];
$_SESSION['login']=1;
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');

$rett2=mysqli_query($con,"SELECT * FROM lecturer WHERE email='$user_id'");
$retr2=mysqli_fetch_array($rett2);
$fn2=$retr2['sname'].' '.$retr2['mname'].' '.$retr2['fname'];
$mt=$retr2['email'];
$ps2=$retr2['password'];
$dt2=date("d/m/y");
$time2=date("g:i A");

mysqli_query($con,"insert into session_log(level,fullname,user_id,password,login_time,logout_time,device,status,date) values('lecturer','$fn2','$mt','$ps2','$time2','','$cmp','1','$dt2')");
header("location:http://$host$uri/$extra");
exit();
}
else{
	$_SESSION['msg']='<span style="color:red;">'."Invalid user id  or password".'</span>';
	header("location:../login.php");
}

#admin
$ret3=mysqli_query($con,"SELECT * FROM admin WHERE user_id='$user_id' and password='$pass'");
$num3=mysqli_fetch_array($ret3);


if($num3>0)
{
$extra="../admin/dashboard.php";//
$_SESSION['user_id']=$num3['user_id'];
$_SESSION['login']=1;
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else{
	$_SESSION['msg']='<span style="color:red;">'."Invalid user id or password".'</span>';
	header("location:../login.php");
}
}


function Cleanse($Data)
{
#$Data = preg_replace('/[^A-Za-z0-9_-]/', '', $Data); /** Allow Letters/Numbers and _ and - Only */
$Data = htmlentities($Data, ENT_QUOTES, 'UTF-8'); /** Add Html Protection */
$Data = stripslashes($Data); /** Add Strip Slashes Protection */
return $Data;
}
?>

