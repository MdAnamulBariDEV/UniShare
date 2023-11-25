<?php 
session_start();
error_reporting(0);
include('includes/config.php');


$file_id = $_GET['file'];
$name = $_GET['name'];

$query=mysqli_query($con,"update user set point=point-5 where id='".$_SESSION['id']."'");

if(!empty($name))
{
	$filename = basename($name);
    // echo $filename;
	$filepath = "admin/courses/$file_id/$name";
    // echo $filepath;
	if(!empty($filename) && file_exists($filepath)){
    

//Define Headers
		header("Cache-Control: public");
		header("Content-Description: FIle Transfer");
		header("Content-Disposition: attachment; filename=$filename");
		header("Content-Type: application/zip");
		header("Content-Transfer-Emcoding: binary");

		readfile($filepath);

		$query = mysqli_query($con, "select download from files where id=$file_id");

		$post=mysqli_fetch_array($query);
		$download = $post['download'];
		$download++;


		// echo $post_count;

		$upuery=mysqli_query($con,"update files set download='$download' where id=$file_id");

		
		exit;
					
	}
	else{
		echo "This File Does not exist.";
	}
}

 ?>