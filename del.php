<?php
require 'embeded.php';
if(!isset($_GET['id']) || $_GET['id'] == ''){ //if no id is passed to this page take user back to previous page
    header('Location: mypage.php'); 
}
$id = $_GET['id'];
$d = "DELETE FROM content WHERE id='$id'";
function del(){
	global $db_con;
	global $d;
	$del = $db_con->query($d);
	header("location:mypage.php");
	exit();
}
del();
?>