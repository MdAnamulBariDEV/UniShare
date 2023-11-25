<?php
session_start();
error_reporting(0);
include('includes/config.php');

// $find="%{$_POST['course']}%";

$user_id = $_SESSION['id'];
// echo $user_id;
?>

<style>
	.rating {
        float: left;
    }

    /* :not(:checked) is a filter, so that browsers that don’t support :checked don’t 
 follow these rules. Every browser that supports :checked also supports :not(), so
 it doesn’t make the test unnecessarily selective */
    .rating:not(:checked)>input {
        position: absolute;
        top: -9999px;
        clip: rect(0, 0, 0, 0);
    }

    .rating:not(:checked)>label {
        float: right;
        width: 1em;
        padding: 0 .1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 200%;
        line-height: 1.2;
        color: #ddd;
        text-shadow: 1px 1px #bbb, 2px 2px #666, .1em .1em .2em rgba(0, 0, 0, .5);
    }

    .rating:not(:checked)>label:before {
        content: '★ ';
    }

    .rating>input:checked~label {
        color: #f70;
        text-shadow: 1px 1px #c60, 2px 2px #940, .1em .1em .2em rgba(0, 0, 0, .5);
    }

    .rtn {
        float: left;
        width: 100%;
    }

    .rating:not(:checked)>label:hover,
    .rating:not(:checked)>label:hover~label {
        color: gold;
        text-shadow: 1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0, 0, 0, .5);
    }

    .rating>input:checked+label:hover,
    .rating>input:checked+label:hover~label,
    .rating>input:checked~label:hover,
    .rating>input:checked~label:hover~label,
    .rating>label:hover~input:checked~label {
        color: #ea0;
        text-shadow: 1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0, 0, 0, .5);
    }

    .rating>label:active {
        position: relative;
        top: 2px;
        left: 2px;
    }

    .checked {
        color: orange;
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Uni Share</title>
	<?php include('includes/links.php')?>
</head>

<body>
	<?php include('includes/header.php')?>

	
    <section class="shop">
		<div class="col-md-12 mt-100" style="text-align:center; padding:50px;">
			<!-- <h1>Search <span style="color:#E12454">Results</span></h1> -->
		</div>


		<div class="col-md-12">
			<div class="container">
				<div class="row">
					<?php
						$ret=mysqli_query($con,"select * from files");
                        $num=mysqli_num_rows($ret);
                        if($num>0)
                        {
                        while ($row=mysqli_fetch_array($ret)) {
							
							$pro_id=$row['id'];
							$title=$row['title'];
							$desc=$row['description'];
							$tags=$row['tags'];
							$category=$row['category'];
							$vdo=$row['video'];							
							$path="admin/courses/$pro_id/$vdo";
							$type = explode('.', $vdo);
						?>

					<div class='col-md-4' style='margin-bottom:30px;'>
						<div class='card' style='width: 18rem; text-align:center; box-shadow: 5px 5px 10px #888888; padding: 15px;'>							
							<p class="mt-2 mb-1">File Name:</p> 
							<h5><?php echo $vdo;?></h5>
							<p>File Type: <?php echo $type[1];?></p>
							<hr>
							<a href="admin/courses/<?php echo $pro_id;?>/<?php echo $vdo;?>"></a>
							<div class='card-body'>
								
								<h5 class='card-title'><?php echo $title?></h5>	
								<p class="mt-2"><?php echo $desc; ?></p>
								<p class=""><?php echo $tags; ?></p>

                                <?php
                                if(strlen($_SESSION['login'])==0)
                                {
                                ?>
                                <!-- <a href='download.php?file=<?php echo $pro_id;?>&name=<?php echo $vdo;?>' class='btn btn-primary'>Download</a>	 -->
                                <small>Please login to download the course</small>
                                <?php
                                }else{
                                ?>

								<a href='download.php?file=<?php echo $pro_id;?>&name=<?php echo $vdo;?>' class='btn btn-primary'>Download</a>
                                <?php }?>

							</div>


							<!-- Review -->

							<?php 
							$rt=mysqli_query($con,"select * from feedback where pid='$pro_id'");
							$num=mysqli_num_rows($rt);
							{
							?>
							<div class="rating-reviews m-t-20">
								<div class="row">
									<div class="col-sm-12">
										<!--<div class="rating rateit-small"></div>-->
										<?php 
											$pid=$_GET['pid'];
											$sel="SELECT ROUND(AVG(rating),1) as r FROM feedback WHERE pid='$pro_id'";
											$rs=mysqli_query($con,$sel);
								 			$rss=mysqli_fetch_array($rs);
										?>

										<?php 
								
								    
											$i = 1;
											while ($i <= 5) {
												
												if ($i <= $rss['r']) {
													
													echo '<span class="fa fa-star checked"></span>';
												}else {
												
												echo '<span class="fa fa-star"></span>';
												}
												$i++;
											}
								    
										?>


								<a href="#" class="lnk">(<?php echo htmlentities($num);?> Reviews)</a>




									</div>
									
								</div><!-- /.row -->
							</div><!-- /.rating-reviews -->

							<?php } ?>
						</div>
					</div>

					<?php	
						} }else {							
					?>
                    <div class="col-sm-6 col-md-4 wow fadeInUp"> <h3>Found Nothing!</h3>
                    </div>
                    
                    <?php } ?>	
				</div>
			</div>
		</div>
	

	<!--Scripts -->
	<?php include('includes/scripts.php')?>
</body>

</html>