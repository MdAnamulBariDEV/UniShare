<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
	header('location:index.php');
	}
else{

if(isset($_GET['del']))
		  {
		    mysqli_query($con,"delete from post where id = '".$_GET['id']."'");
                $_SESSION['delmsg']="Post deleted !!";
		  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php include('include/links.php')?>
	<title>Admin| Manage Posts</title>
</head>

<body>
	<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
				<?php include('include/sidebar.php');?>
				<div class="span9">
					<div class="content">
						<div class="module">
							<div class="module-head">
								<h3>Manage Posts</h3>
							</div>
							<div class="module-body table">
								<?php if(isset($_GET['del']))
									{?>
								<div class="alert alert-error">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
								</div>
								<?php } ?>

								<br />


								<table cellpadding="0" cellspacing="0" border="0"
									class="datatable-1 table table-bordered table-striped display" width="100%">
									<thead>
										<tr>
											<th>#</th>											
											<th>User Id</th>
											<th>Post Title</th>
											<th>Post Details</th>											
											<th>Tags</th>
											<th>Upload Date</th>
											<th>Approve/Decline</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>

										<?php 
										$query=mysqli_query($con,"select * from post");
										$cnt=1;
										while($row=mysqli_fetch_array($query))
										{
										?>
										<tr>
											<td><?php echo htmlentities($cnt);?></td>											
											<td><?php echo htmlentities($row['user_id']);?></td>
											<td><?php echo htmlentities($row['post_title']);?></td>
											<td><?php echo htmlentities($row['post_details']);?></td>
											
											<td><?php echo htmlentities($row['tag']);?></td>
											<td><?php echo htmlentities($row['post_time']);?></td>

											<td>
												<?php if($row['status']=='0'){?>
												<a href="approve_pres.php?id=<?php echo $row['id'];?>"
													class="btn btn-primary">Approve</a>
												<?php  } else{ ?>
												<a href="decline_pres.php?id=<?php echo $row['id'];?>"
													class="btn btn-danger">Decline</a>
												<?php } ?>
											</td>

											<td>
												<a href="manage-posts.php?id=<?php echo $row['id']?>&del=delete"
													onClick="return confirm('Are you sure you want to delete this post?')">Delete
												</a>
											</td>

										</tr>
										<?php $cnt=$cnt+1; } ?>

								</table>
							</div>
						</div>
					</div>
					<!--/.content-->
				</div>
				<!--/.span9-->
			</div>
		</div>
		<!--/.container-->
	</div>
	<!--/.wrapper-->



	<?php include('include/scripts.php') ?>

	<script>
	
	</script>
	<script>
		$(document).ready(function () {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		});
	</script>
</body>
<?php } ?>