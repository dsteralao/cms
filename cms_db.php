<?php
session_start();
$db_con = mysqli_connect('localhost', 'root', '','cms') or die ('Unable to connection');

//Define all Constant
define('DIR','index.php');



//check if db is connected
if ($db_con!=TRUE){
    die("Connection failed: " . mysqli_connect_error()).'<br>';
}
	
//create new db
/*$cr_db= "CREATE DATABASE cms";
if($db_con->query($cr_db)===TRUE){
	echo "database created";
}else{
	echo "database not created".$db_con->error;
}
*/

// select database
/*$sel_db=$db_con->select_db("cms");
if($db_con->query($sel_db)!=TRUE){
	echo "database not selected".$db_con->error;
} else{
	echo "database selected";
}
*/
//create table for users
$users_Tab="CREATE TABLE IF NOT EXISTS users(
							avatar BLOB(1000000) NOT NULL,
							member_id INT(11) UNIQUE NOT NULL,
							first_name VARCHAR(255) NOT NULL,
							last_name VARCHAR(255) NOT NULL,
							username VARCHAR(255) UNIQUE NOT NULL PRIMARY KEY,
							password VARCHAR(255) NOT NULL,
							email VARCHAR(255) UNIQUE NOT NULL)";

if (!$db_con->query($users_Tab)){
	die("'Table not created'.$db_con->error");
}

// CREATE CONTENT TABLE
$cont_tab = "CREATE TABLE IF NOT EXISTS content(
							id INT(111),
							author VARCHAR(255) NOT NULL,
							title VARCHAR(255) NOT NULL,
							description VARCHAR(255),
							username VARCHAR(255) NOT NULL,
							tags VARCHAR(255),
							content VARCHAR(10000) NOT NULL,
							date date,
							FOREIGN KEY (username) REFERENCES users(username))";
							
if (!$db_con->query($cont_tab)){
	die("'Table not created'.$db_con->error");
} 
?>