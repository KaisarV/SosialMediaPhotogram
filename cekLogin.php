<?php
	$formaction = "/TUBES/";
	if(isset($_COOKIE['login'])){
		$_SESSION['login'] = $_COOKIE['login'];
		$_SESSION['id'] = $_COOKIE['id'];
		$_SESSION['username'] = $_COOKIE['username'];
		$_SESSION['no_telp'] = $_COOKIE['no_telp'];
		$_SESSION['email'] = $_COOKIE['email'];
		$_SESSION['bio'] = $_COOKIE['bio'];
		$_SESSION['dir_prof_pic'] = $_COOKIE['dir_prof_pic'];
	}
	else{
		$_SESSION['login'] = false;
	}
	if($_SESSION['login'] == true){
		header("Location: http://".$_SERVER['HTTP_HOST'].$formaction."index.php");
	}
	else{	
	}
	
?>