<?php
session_start();
error_reporting(0);
include("include/config.php");
if(isset($_POST['submit']))
	
{
	$ret=mysqli_query($con,"SELECT * FROM admin WHERE name='".$_POST['adminname']."' and password='".$_POST['adminpassword']."'");
	$num=mysqli_fetch_array($ret);
	if($num>0)
	{
$extra="admin/dashboard.php";//
$_SESSION['login']=$_POST['adminname'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
	$_SESSION['errmsg']="Invalid admin email or password";
	$extra="index.php";
	$host  = $_SERVER['HTTP_HOST'];
	$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
	header("location:http://$host$uri/$extra");
	exit();
}
}
?>