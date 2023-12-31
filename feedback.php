<?php 
session_start();
error_reporting(0);
include('includes/config.php');


$pid=intval($_GET['pid']);
$un_id=$_GET['un'];

echo $un_id;
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

    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="col-md-3"></div>
            <div class="col-md-6">               


                
                    
                    <form action="includes/feedback.php" method="post">
                        <input type="hidden" name="pid" value="<?php echo $pid;?>">

                        <div class="rtn">
                            <h3 style="text-align:center">Leave A Feedback</h3>
                            <!--<h4><?php echo $pid?></h4>-->

                            <fieldset class="rating">
                                <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Rocks!">5
                                    stars</label>
                                <input type="radio" id="star4" name="rating" value="4" /><label for="star4"
                                    title="Pretty good">4 stars</label>
                                <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="OK">3
                                    stars</label>
                                <input type="radio" id="star2" name="rating" value="2" /><label for="star2"
                                    title="Kinda bad">2
                                    stars</label>
                                <input type="radio" id="star1" name="rating" value="1" /><label for="star1"
                                    title="The worst">1
                                    star</label>
                            </fieldset>
                        </div>

                        <p>Name</p>
                        <p><input type="text" name="name" class="form-control"></p>

                        <p>Review</p>
                        <p><textarea class="form-control" name="rv"></textarea></p>
                        <p><input type="submit" name="savert" value="Submit" class="btn btn-primary"></p>

                        <hr>
                        <div class="col-md-5"></div>
                        <div class="col-md-2" style="text-align:center;">
                            <!-- <a class="btn btn-primary" href="" onClick="window.open('','_self').close()"> Close This Window</a> -->
                        </div>
                        <div class="col-md-5"></div>



                    </form>
                    
        

            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

    <?php include('includes/scripts.php')?>

    
</body>


</html>