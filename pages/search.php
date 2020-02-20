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
	<title>Home Page</title>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="homepage.css">
</head>
<style>
		.left-area{
			margin-left:50px;
			margin-top:95px;
			margin-right:0px;
			padding-right:0px;
			color:#2ecc71 ;
			width: 350px;
		}
		.card img{
		  width:auto;
		  height:200px;
		}
</style>
<body class="home-body">
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
      
					<div class="container-fluid p-0">
					<div class="row">
					<div class="left-area col-md-3">									
					<form action="search.php" method="POST">
					<h5>Search Book</h5>
					<div class="form-group w-75">
					<label for="">book name</label>
					<input type="text" placeholder="Book name" class="form-control" name="bname">
					</div>

					<div class="form-group w-75">
					<h5>Filter Book</h5>
					<label for="">Category</label>
					<select name="cat" id="" class="form-control">
					<option value="">Select</option>
					<option value="Non Fiction">Non Fiction</option>
					<option value="Fiction">Fiction</option>
					<option value="Sci-fi">Sci-fi</option>
					<option value="Poetry">Poetry</option>
					<option value="Academic">Academic</option>
					<option value="Novel">Novel</option>                  
					<option value="Biography">Biography</option> 
					</select>
					<label for="">department</label>
					<select name="dept" id="" class="form-control">
					<option value="">Select</option>
					<option value="ICT">ICT</option>
					<option value="CSE">CSE</option>
					<option value="MATH">MATH</option>
					<option value="PHYSICS">PHYSICS</option>
					<option value="Farmacy">Farmacy</option>
					<option value="MCJ">MCJ</option>                  
					<option value="LAW">LAW</option> 
					</select>
					</div>
					<div class="form-group ">
					<input type="submit" name="sub" value="Search " class="btn btn-block alert-primary w-50" >
					</div>
					</form>                   			
					</div>

					<div class="col-md-8">
					<div class="row">
					<h3 class="h3 text-light pl-3 mb-0">Search result</h3> 
					</div>
					<div class="row">
<?php
$bname= $_POST['bname'];
$dept= $_POST['dept'];
$cat= $_POST['cat'];
$post=$boi->search($bname,$dept,$cat);
while ($row=$post->fetch_assoc()):
?>
					<div class="col-lg-4">              	        			             	<div class="card mt-4">
					<div class="card-header pb-0">
					<p class="float-left"><a href="profile.php?posta=<?php echo $row['post_author'];?>"><?php  echo $row['post_author'] ;?></a></p>
					<p class="text-right text-secondary"><?php echo $row['post_date'];?></p>
					</div>
					<div class="image m-auto">
					<img src="../images/<?php echo $row['post_img'];?>" />
					</div>
					<div class="card-inner">
					<div class="header">
					<h5 class="text-center"><a class="text-dark" href="star/bookdatail.php?postar=<?php echo $row['post_id'];?>"><?php echo $row['bookname'];?></a></h5>	
					<p class="text-center text-secondary"><?php echo $row['authorname'];?></p>
					</div>
					</div>	
					</div>
					</div>	
<?php endwhile; ?>			    
					</div>	
					</div>
					</div>
					</div>
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>
