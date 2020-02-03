<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> log in or sign up</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<style>
   	   #bod{
   		 	background-color: #2c3e50;
   		}
         #title{
         	font-weight: bold;        	 
         	font-size: 40px;
         	color:#d35400;
         	margin-top:70px;
         	float:left;
         }
         #img1{
         	height: 20%;
         	width: 20%;
            margin-left: 60px;
         	margin-top: 50px;
         }
         .head{
            width:600px;
         }         
         .login h1{
            text-align: center;
            color:black ;
         }
         .login hr{
            border:1px solid #d35400;
            width: 300px;
         }
         .login form{
            width:300px;
            text-align: center;
            margin: auto;          
         }
         .login form label{
            color:lightblue;
         }
         .login form input{
            color:lightblue;
            width: 200px;
            margin:auto;
         }
         #in{
            background-color:#b2bec3;
            color:black;
         }
        
         .reg h1{
            text-align:center;
            color:black;
         }
         .reg hr{
            border:1px solid #d35400;
            width: 300px;
         }
         .reg form{
            margin:auto;
            text-align:center;
            width:450px;
            color:lightblue;
         }
         .reg form input{
            margin:auto;
         }
         .reg form select{
             margin:auto;
         }	 
	</style>
</head>

<body id="bod">
 <div class="container-fluid p-0">   
	<div class="head m-auto">
		<h1 id="title" >Unversity <br> Book Sharing Hub</h1>
		<img src="handbook.png" alt="" id="img1">
	</div>
   <div class="row">
   <div class="login col-sm-12 col-md-6 mt-5" >
            <h1>log in</h1>
            <hr>
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" >
                   <div class="form-group" >
                     <label for="">PHONE NUMBER</label>
                     <input type="text" class="form-control " name="uname">
                   </div>
                  <div class="form-group" >
                    <label for="">PASSWORD</label>
                    <input type="password" class="form-control " name="upass">
                  </div>
                   <div class="form-group">
                     <input id="in" type="submit" class="btn btn-block  w-25 m-auto" name="sublog" value="login">
                   </div>
                </form>                                
         <br>
   </div>
   <div class="reg col-sm-12 col-md-6 mt-5 ">
      <h1 style="">Ragistration</h1>
         <hr>
         <form action=" "method="POST" enctype="multipart/form-data">                     
                       <div class="form-group">
                       <label for="">User Name</label>
                       <input type="text" name="uname" class="form-control w-75">
                       </div>
                       <div class="form-group">
                       <label for="">Password</label>
                       <input type="text" name="npo" class="form-control w-75">
                       </div>
                       <div class="form-group">
                       <label for="">Phone number</label>
                       <input type="text" name="ce" class="form-control w-75">
                       </div>                     
                       <div class="form-group">
                       <label for="">User Image</label>
                       <input type="file" name="img"class="form-control w-75 "style="height:60px; " >
                       </div>
                       <div class="form-group">
                       <label for="">Roll</label>
                       <input type="text" name="roll" class="form-control w-75">
                       </div>
                        <div class="form-group">
                              <label for="">Department</label>
                              <select name="sel" class="form-control w-75">
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
                       <div class="form-group">
                              <label for="">Session</label>
                              <select name="ses" class="form-control w-75">
                                <option value="">Select</option>
                                <option value="2010-2011">2010-2011</option>
                                <option value="2011-2012">2011-2012</option>
                                <option value="2012-2013">2012-2013</option>
                                <option value="2013-2014">2013-2014</option>
                                <option value="2015-2016">2015-2016</option>
                                <option value="2016-2017">2016-2017</option>                  
                                <option value="2018-2019">2018-2019</option>                  
                              </select>
                       </div>                                             
                       <div class="form-group">
                           <input type="submit" name="sub"class="btn  form-control w-50" value="submit" style="background-color:#b2bec3" >
                       </div>        
         </form>                       
   </div>
  </div>
 </div> 
</body>
</html>