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
		.card img{
		  width:100%;
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
	                      <select name="dept" id="" class="form-control">
	                            <option value="">Select</option>
	                            <option value="ICT">Non Fiction</option>
	                            <option value="CSE">Fiction</option>
	                            <option value="MATH">Sci-fi</option>
	                            <option value="PHYSICS">Poetry</option>
	                            <option value="Farmacy">Academic</option>
	                            <option value="MCJ">Novel</option>                  
	                            <option value="LAW">Biography</option> 
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
	                      <input type="submit" name="sub" value="Search Data" class="btn btn-block alert-primary w-50" >
	                    </div>
	                  </form>                   			
	             </div>
	             <div class="col-md-8">
	             	<div class="row">
	             		<h3 class="h3 text-light pl-3">Showing Shared books</h3> 
	             	</div>
	             	<div class="row">
	             	  
<?php
$post=$boi->recPost();
$j=1; 
while ($row=$post->fetch_assoc()):
?>	             		    <div class="col-md-4">              	        			             							   <div class="card">
	                            <div class="card-header">
	                            <p class="float-left"><?php echo $row['post_author'];?></p>
							    <p class="text-right"><?php echo $row['post_date'];?></p>
	                            </div>
							    <div class="image m-auto">
							      <img src="../images/<?php echo $row['post_img'];?>" />
							    </div>
							    <div class="card-inner">
								    <div class="header">
								        <h5><a href="star/bookdatail.php?postar=<?php echo $row['bookname']; ?>"><?php echo $row['bookname'];?></a></h5>
								        
								    </div>
								    <div class="content">
								      <input id="in" type="submit" class="btn btn-block alert-secondary  w-25 m-auto" value="book">
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