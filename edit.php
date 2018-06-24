<?php
require 'embeded.php';

if(!isset($_GET['id']) || $_GET['id'] == ''){ //if no id is passed to this page take user back to previous page
    header('Location: '.DIR); 
}
$id = $_GET['id'];
$q = "SELECT * FROM content WHERE id='$id'";
$we = $db_con->query($q);
$row = $we->fetch_assoc();


if(isset($_POST['Update'])){
	$username = $_SESSION["username"];
	$title = $_POST['utit'];
	$description= $_POST['udesc'];
	$tags= $_POST['utag'];
	$author= $_POST['uaut'];
	$content= $_POST['ucont'];
	$date = date("y-m-d");
	
	$queu = "UPDATE content SET title='$title' , description='$description', tags='$tags' WHERE content='$content' ";
	if($db_con->query($queu)===TRUE){
		echo '<script>alert ("Post Updated")</script>';
	}
}

if(!logged_in()) header('Location: '.DIR);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UFT-8">
	<meta name="arthor" content="Adedayo Alao">
	<meta name="description" content=" Login for Content Management Sysytem a personal blogging system">
	<meta name="Viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi">
	<meta name="keywords" content="CMS, Blog, Content Management Sysytem">
	<title> Edit post Page</title>
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
			<li> <a href="">Home</a></li>
			<li ><a  href="mypage.php">My Post</a></li>
			<li><a  href="">About Us</a></li>
			<li><a href="">Contact The TEAM</a></li>
			<li class="nav navbar-nav navbar-right"><a href="">Send a suggestion</a></li>
		</ul>
	</div>
</div>
<div class="ed"> 
	<p class="dy cred" style="color:Blue;font-size:25px;text-align:center">Edit post</p>
	<div class="">
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
		
									<p>Title:<br /> <input name="utit" type="text" value='<?php echo $row['title'];?>' size="103" /></p>
									<p>Description:<br /> <input name="udesc" type="text" value="<?php echo $row['description'];?>" size="103" /></p>
									<p>Tags:<br /> <input name="utag" type="text" value="<?php echo $row['tags'];?>" size="103" /></p>
									<p>Author:<br /> <input name="uaut" type="text" value="<?php echo $row['author'];?>" size="103" / disabled></p>
									<p>Content:<br /><textarea name="ucont" type="text" cols="50" rows="20" ><?php echo $row['content'];?> </textarea></p>	
									
									<div class="dy">
										<button type="submit" class="btn btn-success"  name="Update">Update</button>
										<button type="Cancel" class="btn btn-alert"  name="">Cancel</button>
									</div>
									
								</form>
	</div>
	
</div>
   <div class="pow">
		<p>Powered by Adedayo Alao</p>
   </div>
</body>