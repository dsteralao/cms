<?php
require 'cms_db.php';




function login($user,$pass){
	$user = $user;
	$pass = $pass;
	
    global $db_con ;
	$qulo = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
	if(mysqli_num_rows($db_con->query($qulo))>0){
		$_SESSION["authorized"]= true;
		$_SESSION["username"]= $user;
		$_SESSION["password"]=$pass;
		header('location:index.php');
	}else{
		echo'<script>alert("Dont match")</script>';
		$_SESSION['error'] ="SORRY, USERNAME AND PASSWORD DO NOT MATCH";
	}
}

function logged_in(){
	if ($_SESSION["authorized"]== true){
		return true;
	}else{
		return false;
	}
}

function login_required(){
	if(logged_in()== false){
		header("location:".$_SERVER['REQUEST_URI'].login.php);
		exit();
	}else{
		return true;
	}
}
function logout(){
	session_unset();
	header('location:'.DIR);
	exit();
}

function messages() {
    $message = '';
    if($_SESSION['success'] != '') {
        $message = '<div class="msg-ok">'.$_SESSION['success'].'</div>';
        $_SESSION['success'] = '';
    }
    if($_SESSION['error'] != '') {
        $message = '<div class="msg-error">'.$_SESSION['error'].'</div>';
        $_SESSION['error'] = '';
    }
    echo "$message";
}

function errors($error){
    if (!empty($error))
    {
            $i = 0;
            while ($i < count($error)){
            $showError.= '<div class="msg-error">'.$error[$i]."</div>";
            $i ++;}
            echo $showError;
    }
}


function make_excerpt($text,$text_len = 200, $append='...'){
	if ( strlen( $text ) < $text_len ) {
        echo $text;
    }
    else {
        $excerpt = substr( $text, 0, $text_len );
        $excerpt .= $append;
        echo $excerpt;
    }
	
}

?>