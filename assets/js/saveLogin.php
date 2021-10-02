<?php
	session_start();
	$formaction = "/TUBES/";
	if($_POST['username'] == "" && $_POST['password'] == ""){
		$_SESSION['errorMsg'] = 'Make sure you fill all of the boxes.';
		header("Location: http://".$_SERVER['HTTP_HOST'].$formaction."auth-login.php");
		exit();
	}
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	
	
	include('conTubes.php');
	
	$result = mysqli_query($con,"SELECT * FROM user_acc where username = '$username' and password = '$password';");
	$finalResult = false;
	$row = mysqli_fetch_row($result);
		if($row[1] == $username && $row[2] == $password){
			$finalResult= true;
			$_SESSION['login'] = true;
			$_SESSION['id'] = $row[0];
			$_SESSION['username'] = $row[1];
			$_SESSION['no_telp'] = $row[3];
			$_SESSION['email'] = $row[4];
			$_SESSION['bio'] = $row[5];
			$_SESSION['dir_prof_pic'] = $row[6];
			if(isset($_POST['remember'])){
				setcookie('login','true',time()+3600);
				setcookie('id',$row[0],time()+3600);
				setcookie('username',$row[1],time()+3600);
				setcookie('no_telp',$row[3],time()+3600);
				setcookie('email',$row[4],time()+3600);
				setcookie('bio',$row[5],time()+3600);
				setcookie('dir_prof_pic',$row[6],time()+3600);
			}
		}
		
	
	if($finalResult){
		header("Location: http://".$_SERVER['HTTP_HOST'].$formaction."index.php");
	}
	else{
		header("Location: http://".$_SERVER['HTTP_HOST'].$formaction."auth-login.php");
	}
?>	