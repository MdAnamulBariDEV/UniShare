
<?php 
	session_start();
	error_reporting(0);
	include('includes/config.php');	

	echo $user_id;
?>


<?php 

		if(isset($_POST['custom-post'])){
			$title = $_POST['post-title'];
			$details = $_POST['post-details'];
			$tag = $_POST['tag'];
			$user_id=$_SESSION['id'];

			if(strlen($_SESSION['login'])==0)
    		{
				echo "<script>alert('You have to login first to create a post');</script>";
			}else{
				
				$query=mysqli_query($con, "insert into post(user_id, post_title, post_details, tag,status) values('".$_SESSION['id']."', '$title', '$details', '$tag',0 )");

				if($query){
					echo "<script>alert('Your post is in review.');</script>"; 
					$success = 'Post Inserted';

				}else{
					echo "<script>alert('Something is wrong! Please try again.');</script>"; 
				}
			}
		}

	

?>

<style>
	.custom{
		padding: 20px 20px;
		border: 1px solid lightgrey;
		margin-bottom: 30px;
		border-radius: 5px;
		background: #f7f7f7;
		box-shadow: 5px 5px 10px #888888;
	}

	
</style>

<!DOCTYPE html>
<html lang="en">

<head>
	<title></title>
	<?php include('includes/links.php')?>
	<link rel="stylesheet" href="css/custom.css">
</head>

<body>
	<?php include('includes/header.php')?>

	<!-- Banner Start -->
	<section class="banner">
		<div class="container">
			<div class="row">
				<div class=" col-md-6 ">
					<div class="block">
						<h1 style="margin-top:50px; font-size:60px; text-shadow: 4px 4px 10px #ffffff;">Upload Your Files And
							<span style="text-weight:bold;">Earn Points</span></h1>

				

						<div class="btn-container mt-5">
							<a href="files.php" class="btn btn-primary">Upload File <i
									class="icofont-simple-right "></i></a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
	<!-- Banner End -->



	
	
	<!-- Featured -->
	<section class="feed">
		<div class="container bootdey">
			<div class="col-md-12 bootstrap snippets">
				<div class="panel">
					<div class="panel-body" style="border: 1px solid lightgrey; border-radius: 5px;     box-shadow: 5px 5px 10px #888888;">
						<h6>Write down your required course details here</h6>

						<form action="" method="post">
							<input type="text" class="form-control mb-4" placeholder="Course Title" name="post-title">
							<input type="text" class="form-control mb-4" placeholder ="Course Tags" name="tag" >
							<textarea class="form-control" rows="4" placeholder="Course Details" name="post-details"></textarea>
							
							<span class="text-success">
								<? echo $success; ?>
							</span>


							<div class="mar-top clearfix">
								<button class="btn btn-sm btn-primary btn-lg pull-right" name="custom-post" type="submit" style="float:right; padding:10px !important;">
									<i class="icofont-pencil-alt-5"></i> &nbsp; Post Now
								</button>							
							</div>
						</form>						
					</div>
				</div>

				<div class="panel">
					<div class="panel-body">

					<h4 class="text-center"> Recent Posts </h4>
						<!-- Newsfeed Content -->

						<?php 

							$query = mysqli_query($con, "select * from post where status=1 order by id DESC ");

							while($post=mysqli_fetch_array($query)){
								$post_id = $post['id'];
								$user_id = $post['user_id'];
								$title = $post['post_title'];
								$details = $post['post_details'];
								$time = $post['post_time'];
							

							$query_name = mysqli_query($con, "select name from user where id = '$user_id'");
							$user_name = mysqli_fetch_array($query_name);

							$name = $user_name["name"];

						?>

						

						<div class="media-block custom">							
							<div class="media-body">
								<div class="mar-btm">
									<h5> 
										<a href="#" class="btn-link text-semibold media-heading box-inline"><?php echo $name ?></a>
									</h5>
									
									<p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i> <?php echo $time; ?> </p>
								</div>
								<h6> <?php echo $title ?> </h6>
								<p>
									<?php echo $details ?>
								</p>
								<p>
									<?php echo $tag ?>
								</p>
								

								
							</div>
						</div>
						
						<!-- End Newsfeed Content -->
						
						<?php } ?>

						
						
					</div>
				</div>
			</div>
		</div>

	</section>

	<!-- Shop End -->

	<!--Scripts -->
	<?php include('includes/scripts.php')?>


</body>

</html>