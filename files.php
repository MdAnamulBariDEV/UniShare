<?php 
  session_start();
  error_reporting(0);
	include('includes/config.php');

  if(strlen($_SESSION['login'])==0)
    {
      header('location:login.php');
    }else{
      $user_id=$_SESSION['id'];

      // echo $user_id;
      if(isset($_POST['submit']))
      {
          $title = $_POST['title'];
          $tags = $_POST['tag'];
          $desc = $_POST['desc'];         
          $category = $_POST['category'];

          $file=$_FILES['file']['name'];
          $status = 0;

          $query=mysqli_query($con,"select max(id) as pid from files");
          $result=mysqli_fetch_array($query);
          $courseid=$result['pid']+1;
          $dir="admin/courses/$courseid";

          if(!is_dir($dir)){
              mkdir("admin/courses/".$courseid);
            }

          
          // $temp_name1=$_FILES['file']['tmp_name'];
          // move_uploaded_file($temp_name1,"admin/images/prescriptions/$file");

          move_uploaded_file($_FILES["file"]["tmp_name"],"admin/courses/$courseid/".$_FILES["file"]["name"]);

          $query="insert into files(user_id,title,tags,description,video,category, status) values('".$_SESSION['id']."','$title','$tags','$desc','$file','$category', '$status')";

          $run_query=mysqli_query($con,$query);

          if($run_query)
            {               
              echo "<script>alert('Your upload is under review.');</script>";     
            }
          else{
                // echo $user_id;
                echo "<script>alert('Something went worng, try again');</script>";
            }
                    
      }
?>



<!DOCTYPE html>
<html lang="en">

<head>

  <title></title>
  <?php include('includes/links.php')?>

</head>

<body>

  <header>
    <?php include('includes/header.php')?>
  </header>

  <section class="page-title">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="block text-center">
            <h1>UPLOAD YOUR FILES HERE</h1>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="appoinment section">
    <div class="container" style= "box-shadow: 5px 5px 10px #888888; padding-bottom: 30px; margin-top: 20px;">
      <div class="row">
        <div class="col-md-12">         
          <br>
          <br>
          <form method="post" action="#" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <p>Enter Course Title</p>
                  <input name="title" id="" type="text" class="form-control" placeholder="Course Title" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <p>Enter Tags</p>
                  <input name="tag" id="" type="text" class="form-control" placeholder="Comma seperated values" required>

                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <p>Enter Course Description</p>
                    <textarea name="desc" class="form-control" placeholder="description" required> </textarea>                  
                </div>
              </div>              
            </div>

            

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <p>Course Category</p>                    
                    <select class="form-control" id="exampleFormControlSelect1" name="category">
                      <option disabled selected>Select a category</option>
                      <option value="Mathematics">Mathematics</option>
                      <option value="algorithm">Data Structure and Algorithms</option>
                      <option value="hardware">Hardware</option>
                      <option value="programming">Programming Compulsory</option>
                      <option value="system">System Analytics</option>
                      <option value="other">Other</option>
                    </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <p>Upload Files</p>
                    <div class="input-group">
                      <input type="file" class="form-control" id="" name="file">
                    </div>
                </div>
              </div>
            </div>              
            

            <div class="col-md-12" style="text-align:center;">
              <button type="submit" name="submit" style="background-color: #223A66; color: aliceblue; margin-top: 20px;"
                class="btn btn-main">Upload File</button>
            </div>


          </form>
        </div>
      </div>
    </div>
  </section>





  <!-- Footer Start -->

  <?php include('includes/footer.php')?>

  <!-- Footer End -->

  <!--     Essential Scripts    -->
  <?php include('includes/scripts.php')?>




</body>

</html>

<?php } ?>