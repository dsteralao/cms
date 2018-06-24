<?php
require 'embeded.php';
if(!isset($_GET['id']) || $_GET['id'] == ''){ //if no id is passed to this page take user back to previous page
    header('Location: '.DIR); 
}
$id = $_GET['id'];
$v = "SELECT * FROM content WHERE id='$id'";
$vp = $db_con->query($v);
$row = $vp->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UFT-8">
	<meta name="arthor" content="Adedayo Alao">
	<meta name="description" content="Content Management Sysytem a personal blogging system">
	<meta name="Viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi">
	<meta name="keywords" content="CMS, Blog, Content Management Sysytem">
	<title><?php ?></title>
	<script src="js/cms.js" type="text/javascript"></script>
	<script src="js/jq.js" type="text/javascript"></script>
	<script src="js/bo.js" type="text/javascript"></script>
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
			<li class="active"> <a href="index">Home</a></li>
			<li><a  href="mypage.php">My Post</a></li>
			<li><a  href="">About Us</a></li>
			<li><a href="">Contact The TEAM</a></li>
			<li class="nav navbar-nav navbar-right"> <a href="">Send a suggestion</a></li>
		</ul>
		
	</div>
</div>

<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-9">
		<?php 
		 
				echo '<div class="cont-div">';
							echo '<div class="top-div">';
								echo '<div class="top-left">';
									echo '<img class="img-responsive" src="img/cooo.jpg">';
								echo '</div>';
								echo '<div class="top-other">';
								echo '<p class="cont-header">'; 
								echo $row["title"];
								echo '</p>';
								echo '<p class="cont-aut">Posted by:';
								echo $row["author"];
								echo '</p>';
								echo '</div>';
							echo '</div>';
							echo '<div class="cont">';
							echo $row["content"];
							echo '</div>';
							
						echo '</div>';
					
					
						?>
	</div>
	<div class="col-md-1"></div>
</div>


</body>

</html>