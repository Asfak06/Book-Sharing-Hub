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
		.left-area{
			margin-left:50px;
			margin-top:130px;
			margin-right:0px;
			padding-right:0px;
			font-weight:bold;
			color:#2c3e50 ;
			width: 350px;
			border-radius:5%;
		}
		.left-area .user a{
			font-size: 20px;
		}
		.left-area .user img{
			width: 100px;
			height: 100px;
			display: inline-block;
			vertical-align: middle;
			border-radius: 80%;
		    border: 5px solid #2c3e50;
		}
		.card{
			width:600px;
			height: 600px;
		}
		.book{
			width:600px;
			padding:5px;
		}
		#im{
			width: 50px;
			height: 50px;
			border-radius: 5%;
		    border: 1px solid #2c3e50;
		}
		.card-body img{
			width: auto;
			height: 400px;
			padding:0px;
        }
        .card-footer a{
        	font-size: 30px;
        	color: #2c3e50;
        }
        #head{
        	margin-top:35px;
        	margin-left:100px;
        }
        #bod{
        	margin-top:15px;
        	margin-left:100px;
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
$post_pro=$_GET["posta"];
$post=$boi->recPosts($post_pro);               
$row=$post->fetch_assoc();
?>        
			<div class="container-fluid p-0">
			<div class="row">
			<div class="col-md-3">
			<div class="left-area bg-light p-5  ">
			<div class="user p-2">
			<img src="../profile/<?php echo $row['post_author_img']; ?>" alt="">
			<a class="text-dark ml-3" href="profile.php?posta=<?php echo $row['post_author']; ?>">
			<?php echo $row['post_author'];?></a>            
			<br>
			<br>
			<p class="alert-info p-2 m-0 text-center">Department : <?php echo $row['post_author_dept'];?></p>
			<br>
			<p class="alert-info p-2 m-0 text-center">Roll : <?php echo $row['post_author_roll'];?></p>
			<br>
			<p class="alert-info p-2 m-0 text-center">Session : <?php echo $row['post_author_ses'];?></p>
			<br>
			<p class="alert-info p-2 m-0 text-center">Contact : <?php echo $row['post_author_cell'];?></p>
			</div>
			</div>
			</div>
			<div class="col-md-8 mt-5 ml-5">
	             	<div id="head" class="row">
	             		<?php 
	             		$name=$_SESSION['user_name'];
                           if ($post_pro==$name) {
                                echo "<p class='pl-3 mb-0 mt-5 col-12'><a class='text-light' href='add.php'>Add a  book</a><p>";
                           }
	             		?>
	             		<h3 class="h3 text-light pl-3 mb-0 col-12">Showing <?php echo $row['post_author'];?>'s Shared books</h3> 
	             	</div>
	             	<div id="bod" class="row ">
<?php
$i=1;
$post_pro=$_GET["posta"];
$post=$boi->recPosts($post_pro);
while ($row=$post->fetch_assoc()):
?>              
                
                <div class="col-md-12 mb-2">
				<div class="card">
				<div class="card-header text-center">
				<p><?php echo $row['post_date'];?></p>	
				</div>
				<div class="card-body m-auto">
				<img src="../images/<?php echo $row['post_img'];?>" alt="">
				</div>	
				<div class="card-footer text-center p-0">
				<a href="star/bookdatail.php?postar=<?php echo $row['post_id']; ?>"><?php echo $row['bookname'];?></a>
				</div>
		        </div>
		         <div class="post-comments">
<?php
$book_show=$row['post_id'];
$shh=$boi->showBook($book_show);
while($aaa=$shh->fetch_assoc()):
?>     
                <div class="card" style="height:60px;">
                <div class="book alert-secondary ">
				<img id="im" src="../profile/<?php echo $aaa['book_author_img']; ?>" alt="">
				<a class="text-primary" href="profile.php?posta=<?php echo $aaa['book_author']; ?>"><?php echo $aaa['book_author']; ?></a>
				<span class="text-secondary"><?php echo $aaa['book_content']; ?></span>
                </div>
		        </div>
<?php endwhile;?>
                 </div>

<?php
$book_show=$row['post_id'];
$bal=$boi->showBooked($book_show);
if ($bal==0) {
echo '<p style="width:600px; height:25px; margin-bottom:0px;" class="alert-secondary text-center">No one booked this book yet</p>' ;
}
?>                                                
                   <div class="post-comments">
<?php
$post_show=$row['post_id'];
$sh=$boi->showComment($post_show);
while($aa=$sh->fetch_assoc()):
?>                    
                    <div class="card h-25">
					<div class="book bg-light">					
					<img id="im" src="../profile/<?php echo $aa['comment_author_img']; ?>" alt="">
					<a href="#" class="text-primary"><?php echo $aa['comment_author']; ?></a>
					<span ><?php echo $aa['comment_content']; ?></span>
					</div>
					</div>
<?php endwhile;?>
<?php
$non='comm'.$i;
if (isset($_POST[$non])){
$comment=$_POST[$non];
$comment_author=$_SESSION['user_name'];
$comment_author_img=$_SESSION['user_img'];
$post_id=$row['post_id'];
$boi->newComment($comment_author,$comment_author_img,$comment,$post_id);
}
?>                
					<div class="card h-25">
					<div class="book bg-light">
					<img id="im" class="float-left mr-5" src="../profile/<?php echo $_SESSION['user_img']; ?>" alt="">
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
					<input class="form-control w-75 mt-2" placeholder="Add a comment" name="comm<?php  echo $i;$i++;?>" type="text">
					</form>
					</div>						
					</div>
					</div>
					</div> 	
<?php endwhile; ?>							
					</div> 
					</div>  
					</div>
					</div>      

</body>