<?php
include "../../libs/function.php";
$boi=new BookShare;
if(empty($_SESSION['user_name']) AND empty($_SESSION['user_img'])){
    header("location:../../index.php");
  }
?>
<?php
include_once("db_connect.php");
if(!empty($_POST['rating']) && !empty($_POST['itemId'])){
	$itemId = $_POST['itemId'];
	$userID = $_SESSION['user_name'];		
	$userImg =  $_SESSION['user_img'];		
	$insertRating = "INSERT INTO item_rating (itemId, userId,user_img,ratingNumber, title, comments, created, modified) VALUES ('".$itemId."', '".$userID."','".$userImg."', '".$_POST['rating']."', '".$_POST['title']."', '".$_POST["comment"]."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')";
	mysqli_query($conn, $insertRating) or die("database error: ". mysqli_error($conn));		
	echo "rating saved!";
}
?>