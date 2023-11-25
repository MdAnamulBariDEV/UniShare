
<?php 
	session_start();
	error_reporting(0);
	include('includes/config.php');	
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title></title>
	<?php include('includes/links.php')?>
	<link rel="stylesheet" href="css/custom.css">
</head>



<body>
    <?php include('includes/header.php')?>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Checkout all the post here</h3>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="post-box">
                <div class="media-block pad-all">
							<a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture"
									src="https://bootdey.com/img/Content/avatar/avatar1.png"></a>
							<div class="media-body">
								<div class="mar-btm">
									<a href="#" class="btn-link text-semibold media-heading box-inline">John Doe</a>
									<p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i> - From Mobile - 11
										min ago</p>
								</div>
								<p>Lorem ipsum dolor sit amet.</p>
															
								<hr>							
							</div>
						</div>
                </div>
            </div>
        </div>
    </div>





    <?php include('includes/scripts.php')?>


</body>
</html>