<?php
include "../libs/function.php";
$boi=new BookShare;
if(empty($_SESSION['user_name']) AND empty($_SESSION['user_img'])){
  	header("location:../index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>profile</title>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
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
			z-index: 9999;
		}
		.poster{
			padding: 12px 12px 12px 12px;
			background-color: #2d3436;
			margin:100px auto;
		}
		.post-middle {
			padding: 10px 5px;
			background-color: #dfe6e9;
			border-radius: 3px 3px 0% 0%;

		}
		.post-middle:after{
			content:'';
			display: block;
			clear: both;
		}
		.post-middle p{
			padding: 10px;
		}
		.post-input input{
			border:none;
			padding: 5px 10px;
			height: 40px;
		}
		.post-input textarea{
			width: 100%;
			border:none;
			padding: 5px 10px;
			height: 40px;
		}
		.post-input textarea:focus {
			border: none;
			outline: none;
		}
		.post-bottom{
			background-color: #dfe6e9;
			border-top: 1px solid #dddfe2 ;
			padding: 6px 5px;
			border-radius:0% 0% 3px 3px ;
		}
		.post-bottom:after{
			content:'';
			display: block;
			clear: both;
		}
		.post-bottom .p-left{
			width: 50%;
			float: left;
		}
		.post-bottom .p-left ul li{
			display: inline-block;
			margin: 20px 10px 0px 10px;
		}
		.post-bottom .p-right{
			width: 50%;
			float: left;		
		}
		.post-bottom .p-right ul {
			text-align: right;
			margin: 20px 10px 0px 10px;
		}
		.post-bottom .p-right ul li{
			display: inline-block;
		}
		.post-bottom .p-right ul li:last-child button{
			background-color: #d35400;
			color: #FFF;
			font-weight: bold; 
			padding: 4px  10px ;
			border:1px solid #365899;
			border-radius: 2px;
			cursor: pointer;
		}
	    .post-input input{
	    	width: 100%; 
			padding: 5px 10px;
			height: 40px;
	    }
	    .post-input select{
            border:none;
            width: 100%; 
			padding: 5px 10px;
			padding-left:5px;
			height: 40px;	
			color:gray;	
	    }
    </style>
</head>
<body>
                <div class="top-bar">
				<div class="container">
				<ul>
				<li><a href="homepage.php">Home</a></li>
				<li><a href="../libs/Logout.php">log OUT</a></li>
				<li><a href="profile.php?posta=<?php echo $_SESSION['user_name'];?>"><?php  echo $_SESSION['user_name'] ; ?></a>
				</li>                  
				<li><img src="../profile/<?php echo  $_SESSION['user_img']; ?>" alt=""></li>
				</ul>
				</div>
				</div>
<?php
if(isset($_POST['postsub'])){
$post_content=$_POST['post-content'];
$book_name=$_POST['bookname'];
$author_name=$_POST['authorname'];                        
$publisher=$_POST['publisher'];
$publish_year=$_POST['publishyear'];
$subject=$_POST['subject'];
$category=$_POST['cat'];
$post_img=$_FILES['postimg']['name'];
$post_imgt=$_FILES['postimg']['tmp_name'];
$eximg = explode('.', $post_img);
$endeximg= end($eximg);
$uimg=  md5(time() . $post_img) .'.'.$endeximg;                        
$post_author=$_SESSION['user_name'];
$post_author_img=$_SESSION['user_img'];
$post_author_dept=$_SESSION['user_dept'];
$post_author_ses=$_SESSION['user_ses'];
$post_author_roll=$_SESSION['user_roll'];
$post_author_cell=$_SESSION['user_cell'];
$post_time=date('F,d,Y');
if(empty($post_content)){
echo" <script> alert('psot content most not be empty') </script> ";
}else if(in_array($endeximg,['jpg','png','gif','jpeg'])==false){
echo" <script> alert('invalid image format') </script> ";	
}else{
$boi->userPost($post_content,$uimg,$post_author,$post_author_img,$post_time,$post_imgt,$post_author_dept,$post_author_ses,$post_author_roll,$post_author_cell,$book_name,$author_name,$publisher,$publish_year,$subject,$category);
    echo" <script> alert('Shared') </script> ";	

}
}
?>
				    <form action="" method="POST" enctype="multipart/form-data">					
					<div class="poster w-50">
					<div class="post-middle">												
					<p style="font-weight: bold;"> Share a book ,</p>	
					<div class="post-input"> 
					<input type="text" name="bookname" placeholder="Book name">
					<input type="text" name="authorname" placeholder="Author name">
					<input type="text" name="publisher" placeholder="publisher">
					<input type="text" name="publishyear" placeholder="publishing year">     
					<input type="text" name="subject" placeholder="subject">
					<select name="cat" id="" class="form-control">
					<option value="">Select Category</option>
					<option value="Non Fiction">Non Fiction</option>
					<option value="Fiction">Fiction</option>
					<option value="Sci-fi">Sci-fi</option>
					<option value="Poetry">Poetry</option>
					<option value="Academic">Academic</option>
					<option value="Novel">Novel</option>                  
					<option value="Biography">Biography</option> 
					</select>
					<textarea name="post-content" placeholder="book details"></textarea>
					</div>		 
					</div>
					<div class="post-bottom">
					<div class="p-left">
					<ul>								
					<li>
					<label for="aa"><i  class="fa fa-camera"></i> book image</label>
					<input type="file" name="postimg" id="aa" style="width: 0px;opacity:0;">
					</li>
					</ul>
					</div>
					<div class="p-right">
					<ul>
					<li><button type="submit" name="postsub">share</button></li>
					</ul>
					</div>
					</div>
					</div>
					</form>
</body>
