<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Home Page</title>
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
		      left: -15px;
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
    </style>
</head>
<body class="home-body">	
	 <div class="top-bar">
	     	<div class="container">
              <ul>
              	<li><a href="home.php">Home</a></li>
                <li><a href="inc/Logout.php">log OUT</a></li>
                  <li><a href="profile.php?posta=<?php echo $_SESSION['user_name'];?>"><!--  <?php  echo $_SESSION['user_name'] ; ?> --> profile</a>
                  </li>                  
                  <li><img src="profile/<?php echo  $_SESSION['user_img']; ?>" alt=""></li>
              </ul>
          </div>
     </div>
</body>