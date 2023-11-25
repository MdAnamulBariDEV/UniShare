<?php 

$file_id = $_GET['file'];
$name = $_GET['name'];

if(!empty($name))
{
	$filename = basename($name);
    // echo $filename;
	$filepath = "courses/$file_id/$name";
    // echo $filepath;
	if(!empty($filename) && file_exists($filepath)){
    

//Define Headers
		header("Cache-Control: public");
		header("Content-Description: FIle Transfer");
		header("Content-Disposition: attachment; filename=$filename");
		header("Content-Type: application/zip");
		header("Content-Transfer-Emcoding: binary");

		readfile($filepath);
		exit;

	}
	else{
		echo "This File Does not exist.";
	}
}

 ?>