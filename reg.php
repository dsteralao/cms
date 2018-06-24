<?php
require 'embeded.php';

if (isset($_POST['reg'])){
	$pic = $_POST['ava'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$id = $_POST['id'];
	$uname = $_POST['uname'];
	$pwd = $_POST['pwd'];
	$pwd2 = $_POST['pwd2'];
	
	$que = "SELECT * FROM users WHERE username='$uname'";
	$que2 = "SELECT * FROM users WHERE id='$id'";
	$mydata = "INSERT INTO users  	
                    VALUES('$pic','$id','$fname','$lname','$uname','$pwd','$email')";
					
if ($pwd ==$pwd2){
	
if (mysqli_num_rows($db_con->query($que))>0){
	'<script>alert("Username already exists")</script>';
} elseif(mysqli_num_rows($db_con->query($que2))>0){
	'<script>alert("Sorry, Unique Number already taken")</script>';
}{if ($db_con->query($mydata)===TRUE){
	header('location:login.php');
	echo '<script> alert("NEW USER CREATED AND DATA SAVAED")</script>';
}else{
	echo "err".$db_con->error;
}
	
}
	
}else{ 
echo '<script>alert("Sorry passwords dont match")</script>';
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UFT-8">
	<meta name="arthor" content="Adedayo Alao">
	<meta name="description" content=" Register for Content Management Sysytem a personal blogging system">
	<meta name="Viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi">
	<meta name="keywords" content="CMS, Blog, register, Content Management Sysytem">
	<title> Registration Page</title>
	<script src="js/jq.js" type="text/javascript"></script>
	<script src="js/bo.js" type="text/javascript"></script>
	<script src="js/cms.js" type="text/javascript"></script>
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
<div class="container-fluid">

	<form class=" reg" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
	 <h4 class="dy">Please enter your details to create an account</h4>
		<div class="form-group">
		<span class="form-group">Display Picture:</span>
			<label class="btn btn-primary" for="my-file-selector" >
			<input id="my-file-selector" name="ava" type="file" style="display:none;" onchange="$('#upload-file-info').html(this.files[0].name)">
				Select an image...
			</label><span class='label label-info' id="upload-file-info"></span>
		</div>
		<div class="form-group">
			<label for="fname">First Name:</label>
			<input type="text" class="form-control" name="fname">
		</div>
		
		<div class="form-group">
			<label for="lname">Last Name:</label>
			<input type="text" class="form-control " name="lname">
		</div>
		<div class="form-group">
			<label for="email">Email address:</label>
			<input type="email" class="form-control " name="email">
		</div>
		<div class="form-group">
			<label for="id">Unique number:</label>
			<input type="number" class="form-control " name="id">
		</div>
		<div class="form-group">
			<label for="uname">Username:</label>
			<input type="text" class="form-control " name="uname">
		</div>
		<div class="form-group">
			<label for="pwd">Password:</label>
			<input type="password" class="form-control" name="pwd">
		</div>
		<div class="form-group">
			<label for="pwd2">Confirm Password:</label>
			<input type="password" class="form-control imp" name="pwd2">
		</div>
		<div class="checkbox">
			<label><input type="checkbox" class="fro"> <span style="color:red" class="rty">By Submitting you have agreed to our terms and conditions</span></br></label>
		</div>
  
  <button type="submit" name="reg" class="btn btn-default">Submit</button>
</form>

</div>
</body>