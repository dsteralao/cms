<?php
require 'embeded.php';

//all posts
$sel_all= "SELECT * FROM content ORDER BY date DESC ";
$dal=$db_con->query($sel_all);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UFT-8">
	<meta name="arthor" content="Adedayo Alao">
	<meta name="description" content="Content Management Sysytem a personal blogging system">
	<meta name="Viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi">
	<meta name="keywords" content="CMS, Blog, Content Management Sysytem">
	<title> Home Page</title>
	<script src="js/jq.js" type="text/javascript"></script>
	<script src="js/cms.js" type="text/javascript"></script>
	<script src="js/bo.js" type="text/javascript"></script>
	<link rel='stylesheet' href='css/bo.css'>
	<link rel='stylesheet' href='css/cms.css'>
</head>

<body>
<div style="height:350px;width:100%; background-color:black">
<img class="img-responsive" src="img/blog.jpg" style="height:100%;width:100%;margin:10px">
</div>
<nav class="navbar  navbar-expand-sm bg-dark navbar-dark navbar-sticky-top"> 
	<div class="container-fluid">
		<div class="navbar-header">
		<img src="img/cooo.jpg" class="barin img-rounded">
		<a class="navbar-brand">Writa's Block</a>
		</div>
		<ul class="nav navbar-nav">
			<li class="active"> <a href="">Home</a></li>
			<li><a href="mypage" onclick="check_log() ">My Post</a></li>
			<li><a  href="#">About Us</a></li>
			<li><a href="#">Contact The TEAM</a></li>
			<li class="nav navbar-nav navbar-right"> <a href="">Send a suggestion</a></li>
		</ul>
		
	</div>
</nav>
<div class="container" style="height:250px;background-color:#BDC3C7">
<h2 style="font-size:44px;text-align:center;color:white"> OUR BLOG </h2>

</div>
<div class="row" style="background-color:;margin-top:50px">
	<div class="col-md-2"></div>
	<div class="col-md-9" style="background-color:#DADFE1;padding:20px">
		<?php 
		 
					while ($row = $dal->fetch_assoc()){
							if ($row['id']!=1){
								
						echo '<div class="" style="background-color:#BDC3C7;margin-top:20px;padding:20px">';
						echo '<img class="img-responsive" src="img/cooo.jpg" style="height:100%;width:150px;float:left;margin:10px">';
						
							echo '<div style="color:#6C7A89" >';
							echo '<p class="" style="font-size:24px;text-align:center"><a href="viewpost.php?id='.$row['id'].'"> '.$row['title'].'</a> <br>
						<span style="font-size:12px;color:white">Posted by:'.$row['author'].'</span>  ,
						<span style="font-size:12px;color:white">Posted on:'.$row['date'].'</span>
						</p>';
								echo '<p style="margin:10px" > '.make_excerpt(''.$row['content'].'').'</p>';
							echo '</div>';
							
							
						echo '</div>';
					 }else { echo "<script>alert('there are no post available')</script>";}
					}
					
						?>
	</div>
	<div class="col-md-1"></div>
</div>

</body>