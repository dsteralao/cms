<?php
require 'embeded.php';

if(!logged_in()) {
	header('Location: '.DIR);
}


if(isset($_POST['addpsubmit'])){
	$username = $_SESSION["username"];
	$title = $_POST['ptit'];
	$description= $_POST['pdesc'];
	$tags= $_POST['ptag'];
	$author= $_POST['paut'];
	$content= $_POST['pcont'];
	$date = date("y-m-d");
	
	$quep = "INSERT INTO content VALUES('0','$author','$title','$description','$username','$tags','$content','$date')";
	
if ($db_con->query($quep) === TRUE){
		echo '<script>alert("Post Added")</script>';
		 header("Location: mypage.php" );
	} else {
		echo '<script>alert("Post NOT Added")</script>'.$db_con->error;
	}
	
	
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UFT-8">
	<meta name="arthor" content="Adedayo Alao">
	<meta name="description" content=" Login for Content Management Sysytem a personal blogging system">
	<meta name="Viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi">
	<meta name="keywords" content="CMS, Blog, Content Management Sysytem">
	<title> Add post Page</title>
	<script src="js/cms.js" type="text/javascript"></script>
	<script src="js/jq.js" type="text/javascript"></script>
	<script src="js/bo.js" type="text/javascript"></script>
	<link rel='stylesheet' href='css/bo.css'>
	<link rel='stylesheet' href='css/cms.css'>
</head>

<body>
<div class="navbar navbar-inverse"> 
	<div class="container-fluid">
		<div class="navbar-header">
		<img src="img/cooo.jpg" class="barin">
		<a class="navbar-brand">Writa's Block</a>
		</div>
		<ul class="nav navbar-nav">
			<li> <a href="<?php echo DIR ?>">Home</a></li>
			<li ><a  href="mypage.php">My Post</a></li>
			<li><a  href="">About Us</a></li>
			<li><a href="">Contact The TEAM</a></li>
			<li class="nav navbar-nav navbar-right"><a href="">Send a suggestion</a></li>
		</ul>
	</div>
</div>
<div class="ed"> 
	<p class="" style="color:Blue;font-size:25px;text-align:center">Add a new post</p>
	<div class="">
		<form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<p>Title:<br /> <input name="ptit" type="text" value="" size="103" /></p>
			<p>Description:<br /> <input name="pdesc" type="text" value="" size="103" /></p>
			<p>Tags:<br /> <input name="ptag" type="text" value="" size="103" /></p>
			<p>Author:<br /> <input name="paut" type="text" value="" size="103" /></p>
			<p>Content:<br /><textarea name="pcont" cols="100" rows="20"></textarea></p>
			
			
			<p><input type="submit" name="addpsubmit" value="Submit" class="button" /></p>							
		
		</form>
	</div>
	
</div>
   
</body>