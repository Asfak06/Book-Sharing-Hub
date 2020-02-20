<?php
include "../../libs/function.php";
$boi=new BookShare;
if(empty($_SESSION['user_name']) AND empty($_SESSION['user_img'])){
    header("location:../../index.php");
  }
$comment="booked this.";
$comment_author=$_SESSION['user_name'];
$comment_author_img=$_SESSION['user_img'];
$post_id=$_POST['npo'];
$boi->newBook($comment_author,$comment_author_img,$comment,$post_id);
echo 'booked';
?>
