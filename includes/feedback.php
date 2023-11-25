
<?php
session_start();
include("config.php");
if(isset($_POST['savert'])){

	$name=$_POST['name'];
	$ratting=$_POST['rating'];
	$rv=$_POST['rv'];
	$pid=$_POST['pid'];

	$ins="INSERT INTO feedback SET name='$name',rating='$ratting',review='$rv',pid='$pid'";
	$con->query($ins);

	?>
	<script >
		alert("Thank you for your Review");
		window.location='../index.php ?>';
	</script>
		
	<?php
header('../index.php');
}
?>