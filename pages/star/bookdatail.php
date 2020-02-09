<?php
include "../../libs/function.php";
$boi=new BookShare;
if(empty($_SESSION['user_name']) AND empty($_SESSION['user_img'])){
    header("location:../../index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Book Details</title>
  <link rel="stylesheet" href="../../css/normalize.css">
  <link rel="stylesheet" href="../../css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="../../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../../js/jquery-3.3.1.min.js"></script>
  <script src="rating.js"></script>
  <style>
    *{
    margin: 0px;
    padding: 0px;
    font-family: tahoma;
    }
    a{
      text-decoration: none;
      color:#000;
    }
    ul, ol{
      list-style:none;
    }
    body{
      background-color:#2c3e50;
    }
    .top-bar ul {
      text-align: right;
    }
    .top-bar ul li{
      display: inline-block;
      vertical-align: middle;
      padding: 10px 20px;
      position: relative;
    }
    .top-bar ul li img{
          width: 110px;
          height: 110px;
          border-radius: 50%;
          border: 10px solid #d35400;
          position: absolute;
          top: 10px;
          left: 0px;
    }
    .top-bar {
      background-color:#d35400;
      padding-top: 8px;
      padding-bottom: 3px;
      box-shadow: 0px 1px 1px #000;
      position: fixed;
      top: 0px;
      left: 0px;
      right: 0px;
      z-index:9999;
    }
  </style>
</head>
<body class="home-body" style="background-color:#ecf0f1;">
            <div class="top-bar">
            <div class="container">
            <ul>
            <li><a href="../homepage.php">Home</a></li>
            <li><a href="../../libs/Logout.php">log OUT</a></li>
            <li><a href="../profile.php?posta=<?php echo $_SESSION['user_name'];?>"><?php  echo $_SESSION['user_name'] ; ?></a>
            </li>                  
            <li><img src="../../profile/<?php echo  $_SESSION['user_img']; ?>" alt=""></li>
            </ul>
            </div>
            </div>
<?php         
$book_pro=$_GET["postar"];
$post=$boi->bookPost($book_pro);               
$row=$post->fetch_assoc();
$name=$row['bookname'];
?>     
            <div class="container">
            <div class="card-group w-100 text-center alert bg-dark" style="margin-top: 100px;margin-bottom:0px;">
            <div class="card w-50  float-left alert-dark">
            <div class="card-header " >
            <img style=" width: 200px ; height: 200px;border-radius: 50%; border:10px solid #ecf0f1;" class="card-img" src="../../images/<?php echo $row['post_img'] ?>" alt="Images">
            <div class="alert alert-dark">
            <h4 class="card-title text-dark"><?php echo $row['bookname'] ?></h4>
            <h4 class="card-title text-secondary"><?php echo $row['authorname'] ?></h4>
            </div>
            </div>
            </div>
            <div class="card w-50  float-left">
            <div class="card-body alert-secondary">
            <h4>overview</h4>
            <p class="card-text p-0"><?php echo $row['post_content'] ?> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab iusto, doloribus vero aperiam, sed magni expedita incidunt totam aut dignissimos ipsum nobis tempore autem voluptatibus error quae quod. Repellat labore perferendis id quo, placeat cupiditate veritatis autem, nobis magni, alias illum ad maxime inventore quisquam modi ea hic, voluptate temporibus.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab iusto, doloribus vero aperiam, sed magni expedita incidunt totam aut dignissimos ipsum nobis tempore autem voluptatibus error quae quod. Repellat labore perferendis id quo, placeat cupiditate veritatis autem, nobis magni, alias illum ad maxime inventore quisquam modi ea hic, voluptate temporibus.</p>
            </div>
            <div class="card-footer text-left alert-dark" style=" height:30px;">
            <p class="card-subtitle pl-5"><span style="font-weight:bold;">publisher : </span><?php echo $row['publisher'] ?></p>
            </div>
            <div class="card-footer text-left alert-dark"style=" height:30px;">           
            <p class="card-subtitle pl-5"><span style="font-weight:bold;">publishing year : </span><?php echo $row['publishyear'] ?></p>
            </div>
            <div class="card-footer text-left alert-dark"style=" height:30px;">
            <p class="card-subtitle pl-5"><span style="font-weight:bold;">subject : </span><?php echo $row['subject'] ?></p>
            </div>
            </div>
            </div>
            </div>
<?php include('header.php'); ?>
            <div class="container">   
            <div class="card text-center text-light alert bg-dark">
<?php
include_once("db_connect.php");
$ratingDetails = "SELECT ratingNumber FROM item_rating WHERE itemId='$name'";
$rateResult = mysqli_query($conn, $ratingDetails) or die("database error:". mysqli_error($conn));
$ratingNumber = 0;
$count = 0;
$fiveStarRating = 0;
$fourStarRating = 0;
$threeStarRating = 0;
$twoStarRating = 0;
$oneStarRating = 0;
while($rate = mysqli_fetch_assoc($rateResult)) {
$ratingNumber+= $rate['ratingNumber'];
$count += 1;
if($rate['ratingNumber'] == 5) {
$fiveStarRating +=1;
} else if($rate['ratingNumber'] == 4) {
$fourStarRating +=1;
} else if($rate['ratingNumber'] == 3) {
$threeStarRating +=1;
} else if($rate['ratingNumber'] == 2) {
$twoStarRating +=1;
} else if($rate['ratingNumber'] == 1) {
$oneStarRating +=1;
}
}
$average = 0;
if($ratingNumber && $count) {
$average = $ratingNumber/$count;
} 
?>    
            <br>    
            <div id="ratingDetails">    
            <div class="row">     
            <div class="col-sm-3">        
            <h4>Rating and Reviews</h4>
            <h2 class="bold padding-bottom-7"><?php printf('%.1f', $average); ?> <small>/ 5</small></h2>        
<?php
$averageRating = round($average, 0);
for ($i = 1; $i <= 5; $i++) {
$ratingClass = "btn-default btn-grey";
if($i <= $averageRating) {
$ratingClass = "btn-warning";
}
?>
            <button type="button" class="btn btn-sm <?php echo $ratingClass; ?>" aria-label="Left Align">
            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
            </button> 
<?php } ?>        
            </div>
            <div class="col-sm-3">
<?php
$fiveStarRatingPercent = round(($fiveStarRating/5)*100);
$fiveStarRatingPercent = !empty($fiveStarRatingPercent)?$fiveStarRatingPercent.'%':'0%';  

$fourStarRatingPercent = round(($fourStarRating/5)*100);
$fourStarRatingPercent = !empty($fourStarRatingPercent)?$fourStarRatingPercent.'%':'0%';

$threeStarRatingPercent = round(($threeStarRating/5)*100);
$threeStarRatingPercent = !empty($threeStarRatingPercent)?$threeStarRatingPercent.'%':'0%';

$twoStarRatingPercent = round(($twoStarRating/5)*100);
$twoStarRatingPercent = !empty($twoStarRatingPercent)?$twoStarRatingPercent.'%':'0%';

$oneStarRatingPercent = round(($oneStarRating/5)*100);
$oneStarRatingPercent = !empty($oneStarRatingPercent)?$oneStarRatingPercent.'%':'0%';

?>
            <div class="pull-left">
            <div class="pull-left" style="width:35px; line-height:1;">
            <div style="height:9px; margin:5px 0;">5 <span class="glyphicon glyphicon-star"></span></div>
            </div>
            <div class="pull-left" style="width:180px;">
            <div class="progress" style="height:9px; margin:8px 0;">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $fiveStarRatingPercent; ?>">
            <span class="sr-only"><?php echo $fiveStarRatingPercent; ?></span>
            </div>
            </div>
            </div>
            <div class="pull-right" style="margin-left:10px;"><?php echo $fiveStarRating; ?></div>
            </div>
        
            <div class="pull-left">
            <div class="pull-left" style="width:35px; line-height:1;">
            <div style="height:9px; margin:5px 0;">4 <span class="glyphicon glyphicon-star"></span></div>
            </div>
            <div class="pull-left" style="width:180px;">
            <div class="progress" style="height:9px; margin:8px 0;">
            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $fourStarRatingPercent; ?>">
            <span class="sr-only"><?php echo $fourStarRatingPercent; ?></span>
            </div>
            </div>
            </div>
            <div class="pull-right" style="margin-left:10px;"><?php echo $fourStarRating; ?></div>
            </div>

            <div class="pull-left">
            <div class="pull-left" style="width:35px; line-height:1;">
            <div style="height:9px; margin:5px 0;">3 <span class="glyphicon glyphicon-star"></span></div>
            </div>
            <div class="pull-left" style="width:180px;">
            <div class="progress" style="height:9px; margin:8px 0;">
            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $threeStarRatingPercent; ?>">
            <span class="sr-only"><?php echo $threeStarRatingPercent; ?></span>
            </div>
            </div>
            </div>
            <div class="pull-right" style="margin-left:10px;"><?php echo $threeStarRating; ?></div>
            </div>

            <div class="pull-left">
            <div class="pull-left" style="width:35px; line-height:1;">
            <div style="height:9px; margin:5px 0;">2 <span class="glyphicon glyphicon-star"></span></div>
            </div>
            <div class="pull-left" style="width:180px;">
            <div class="progress" style="height:9px; margin:8px 0;">
            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $twoStarRatingPercent; ?>">
            <span class="sr-only"><?php echo $twoStarRatingPercent; ?></span>
            </div>
            </div>
            </div>
            <div class="pull-right" style="margin-left:10px;"><?php echo $twoStarRating; ?></div>
            </div>

            <div class="pull-left">
            <div class="pull-left" style="width:35px; line-height:1;">
            <div style="height:9px; margin:5px 0;">1 <span class="glyphicon glyphicon-star"></span></div>
            </div>
            <div class="pull-left" style="width:180px;">
            <div class="progress" style="height:9px; margin:8px 0;">
            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $oneStarRatingPercent; ?>">
            <span class="sr-only"><?php echo $oneStarRatingPercent; ?></span>
            </div>
            </div>
            </div>
            <div class="pull-right" style="margin-left:10px;"><?php echo $oneStarRating; ?></div>
            </div>
            </div>    

            <div class="col-sm-3">
            <button type="button" id="rateProduct" class="btn btn-default">Rate this book</button>
            </div>    
            </div>
            <div class="row">
            <div class="col-sm-7">
            <hr/>
            <div class="review-block">    
<?php
$ratinguery = "SELECT ratingId, itemId, userId,user_img, ratingNumber, title, comments, created, modified FROM item_rating WHERE itemId='$name'";
$ratingResult = mysqli_query($conn, $ratinguery) or die("database error:". mysqli_error($conn));
while($rating = mysqli_fetch_assoc($ratingResult)){
$date=date_create($rating['created']);
$reviewDate = date_format($date,"M d, Y");      
?>        
            <div class="row">
            <div class="col-sm-3">

            <img src="../../profile/<?php echo $rating['user_img']; ?>" class="img-rounded" style="   width: 40px;
            height: 40px;
            display: inline-block;
            vertical-align: middle;">


            <div class="review-block-name">By <a href="#"><?php echo $rating['userId']; ?></a></div>
            <div class="review-block-date"><?php echo $reviewDate; ?></div>
            </div>
            <div class="col-sm-9">
            <div class="review-block-rate">
<?php
for ($i = 1; $i <= 5; $i++) {
$ratingClass = "btn-default btn-grey";
if($i <= $rating['ratingNumber']) {
$ratingClass = "btn-warning";
}
?>
          <button type="button" class="btn btn-xs <?php echo $ratingClass; ?>" aria-label="Left Align">
          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
          </button>               
<?php } ?>
          </div>
          <div class="review-block-title"><?php echo $rating['title']; ?></div>
          <div class="review-block-description"><?php echo $rating['comments']; ?></div>
          </div>
          </div>
          <hr/>         
<?php } ?>
          </div>
          </div>
          </div>  
          </div>
          <div id="ratingSection" style="display:none;">
          <div class="row">
          <div class="col-sm-12">
          <form id="ratingForm" method="POST">          
          <div class="form-group">
          <h4>Rate this product</h4>
          <button type="button" class="btn btn-warning btn-sm rateButton" aria-label="Left Align">
          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
          </button>
          <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
          </button>
          <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
          </button>
          <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
          </button>
          <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
          </button>
          <input type="hidden" class="form-control" id="rating" name="rating" value="1">
          <input type="hidden" class="form-control" id="itemId" name="itemId" value="<?php echo $row['bookname'] ?>">
          </div>    
          <div class="form-group">
          <label for="usr">Title*</label>
          <input type="text" class="form-control" id="title" name="title" required>
          </div>
          <div class="form-group">
          <label for="comment">Comment*</label>
          <textarea class="form-control" rows="5" id="comment" name="comment" required></textarea>
          </div>
          <div class="form-group">
          <button type="submit" class="btn btn-info" id="saveReview">Save Review</button> <button type="button" class="btn btn-info" id="cancelReview">Cancel</button>
          </div>      
          </form>
          </div>
          </div>
          </div>        
          <div style="margin:50px 0px 0px 0px;">
          <a class="btn btn-default read-more" style="background:#3399ff;color:white" href="../homepage.php">Back</a>    
          </div>
          </div>  
          </div>     
          </body>
          </html>