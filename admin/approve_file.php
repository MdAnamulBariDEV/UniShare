<?php
session_start();
include('include/config.php');

if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

$id=$_GET['id'];

$upd="UPDATE files SET status='1' WHERE id='$id'";
$con->query($upd);

$q=mysqli_query($con,"select user_id from files where id='$id'");
$r=mysqli_fetch_array($q);

$user_id= $r['user_id'];


if($con)
{
	$update=mysqli_query($con,"update user set point=point+25 where id='$user_id'");
}

header("location:manage-file.php");
}
?>