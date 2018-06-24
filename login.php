<?php
require 'embeded.php';


if (isset($_POST['login'])){
	login($_POST['username'], $_POST['password']);
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
	<title> Login Page</title>
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
			<li><a  href="">My Post</a></li>
			<li><a  href="">About Us</a></li>
			<li><a href="">Contact The TEAM</a></li>
			<li class="nav navbar-nav navbar-right"><a href="">Send a suggestion</a></li>
		</ul>
	</div>
</div>
<div class="foc"> 
	<p class="dy cred">PLEASE ENTER YOUR CREDENTIALS</p>
	<div class="log">
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
										
									<div class="form-group">
										<label class="dy">Username:</label>
										<input type="text" class="form-control" name="username" placeholder="please enter your username or email address">
									</div>
									<div class="form-group">
										<label class="dy">Password:</label>
										<input type="password" class="form-control" name="password"  placeholder="please enter your password">
									</div>
									<div class="checkbox">
										<label><input type="checkbox"> Remember me</label>
									</div>
									<div class="dy">
										<button type="submit" class="btn btn-success"  name="login">Login</button>
									</div>
									<p class="p dy">Not a user? <a href="reg.php">Register here</a></p>
								</form>
	</div>
	
</div>
   <div class="pow">
		<p>Powered by Adedayo Alao</p>
   </div>
</body>