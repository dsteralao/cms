<?php
require 'embeded.php';
//DELETE post
/*if(isset(!$_GET['id']) || $_GET['id'] == ''){ //if no id is passed to this page take user back to previous page
    header('Location: '.DIR); 
}
$id = $_GET['id'];
$d = "DELETE * FROM content WHERE id='$id'";
$del = $db_con->query($d);
*/
//view all users post

if(!logged_in()) {
	header("Location: ". DIR);
	exit;
}
	

if (isset($_GET['logout'])){
	logout();
}
if (isset($_POST['addp'])){
	header('location:addpage.php');
}

if (isset($_POST['del'])){
	$id= $_POST['del'];
	$del = "DELETE * FROM content WHERE id='$id'";
	if ($db->query($del) === TRUE) {
		echo '<script>alert("TASK DELETED")</script>';
		header("Location: " . $_SERVER['REQUEST_URI']);
	} else {
		echo '<script>alert("TASK NOT DELETED")</script>'.$db->error;
		header("Location: " . $_SERVER['REQUEST_URI']);
	}
}
$sel_pro= "SELECT * FROM users WHERE username ='$_SESSION[username]'";
$sel_per= "SELECT * FROM content WHERE username ='$_SESSION[username]' ORDER BY id";
$dis=$db_con->query($sel_per);
$prob=$db_con->query($sel_pro);

$prow = $prob->fetch_assoc();
$fname = $prow['first_name']. ' '. $prow['last_name'];
$image = $prow['avatar'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UFT-8">
	<meta name="arthor" content="Adedayo Alao">
	<meta name="description" content="Content Management Sysytem a personal blogging system">
	<meta name="Viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi">
	<meta name="keywords" content="CMS, Blog, Content Management Sysytem">
	<title><?php echo  $_SESSION["username"] . "'s Page";?></title>
	<script src="js/cms.js" type="text/javascript"></script>
	<script src="js/jq.js" type="text/javascript"></script>
	<link rel='stylesheet' href='css/bo.css'>
	<link rel='stylesheet' href='css/cms.css'>
</head>

<body>
<div class="navbar navbar-default"> 
	<div class="container-fluid">
		<div class="navbar-header">
		<img src="img/cooo.jpg" class="barin img-rounded">
		<a class="navbar-brand">Writa's Block</a>
		</div>
		<ul class="nav navbar-nav">
			<li> <a href="index">Home</a></li>
			<li class="active"><a  href="mypage.php">My Post</a></li>
			<li><a  href="">About Us</a></li>
			<li><a href="">Contact The TEAM</a></li>
			<li class="nav navbar-nav navbar-right"> <a href="">Send a suggestion</a></li>
		</ul>
		
	</div>
</div>
<div class="row" style="">
	<div class="col-md-2">
		<div class="user-pro" id="user-info">
			<span class="user-edit"> edit </span>
			<?php echo '<img  src="$image">'; ?>
			<p class="user-name"><?php echo ucwords($fname) ?> </p>
		</div>
	</div>
	<div class="col-md-9">
		<div class="cont-div">
							 
								<table class="table table-responsive">
								<thead>
								<th>Post name</th>
								<th>Post Decription</th>
								<th>Action</th>
								</thead>
								<tbody>
								<?php
								while ($row = $dis->fetch_assoc()){
									echo '<tr>';
									echo  '<td>'.$row['title'].'</td>';
									echo  '<td>'.$row['description'].'</td>';
									echo  '<td><form method="GET" action=""><a href="edit.php?id='.$row['id'].'" name="ed">Edit</a>';if ($row['id']!=1) {echo '| <a href="del.php?id='.$row['id'].'" name="del">Delete</a><form></td>';}
								
								     echo '</tr>';
								}
								 
								?>
								</tbody>
								</table>
								
								<form method="GET" action="">
							<button type="button" class="btn btn-default" name="addp" ><a href="addpage.php">Add Post</a></button>
							<button type="submit" class="btn btn-success"  name="logout">Logout</button>
							
							</form>
						</div>
						
						
					
		
	</div>
	<div class="col-md-1"></div>
</div>

</body>