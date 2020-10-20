<?php
session_start();
error_reporting(0);
include("include/config.php");
if(isset($_POST['submit']))
	
{
	$ret=mysqli_query($con,"SELECT * FROM users WHERE email='".$_POST['patientemail']."' and password='".$_POST['patientpassword']."'");
	$num=mysqli_fetch_array($ret);
	if($num>0)
	{
$extra="patient/dashboard.php";//
$_SESSION['login']=$_POST['username'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
	$_SESSION['errmsg']="Invalid username or password";
	$extra="index.php";
	$host  = $_SERVER['HTTP_HOST'];
	$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
	header("location:http://$host$uri/$extra");

	exit();
}
}
?>