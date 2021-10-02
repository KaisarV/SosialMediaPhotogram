<?php
	session_start();
	$formaction = "/TUBES/";
	if($_POST['username'] != "" && $_POST['password'] != "" && $_POST['confirmPass'] != "" && $_POST['email'] != "" && $_POST['no_telp'] != ""){
		
	}
	else{
		$_SESSION['errorMsg'] = 'Make sure you fill all of the boxes.';
		header("Location: http://".$_SERVER['HTTP_HOST'].$formaction."auth-register.php");
		exit();
	}
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$confirmPass = md5($_POST['confirmPass']);
	$email = $_POST['email'];
	$no_telp = $_POST['no_telp'];
	$bio = $_POST['bio'];
	
	if ($_FILES['dir_prof_pic']['tmp_name'] != ""){
		$str = $_FILES['dir_prof_pic']['name'];
		$pos = strpos($str,".");
		$ext = substr($str,$pos);
		$dir_prof_pic = microtime().$ext;
	}
	else {

		$dir_prof_pic = "1.jpg";
	}
	
	$path ="assets/images/faces/";
	
	include('conTubes.php');
	
	if($password == $confirmPass){
		
		$result = mysqli_query($con,"SELECT * FROM user_acc;");
		while($row = mysqli_fetch_row($result)){
			if($username == $row[1] || $email == $row[4]){
				$_SESSION['errorMsg'] = 'Your username or email is already used, please try another one.';
				header("Location: http://".$_SERVER['HTTP_HOST'].$formaction."auth-register.php");
				exit();
			}
		}
		
		if ($_FILES['dir_prof_pic']['error'] > 0){
			$finalResult = false;
		}
		else {
			move_uploaded_file($_FILES['dir_prof_pic']['tmp_name'],$path.$dir_prof_pic);
		}
		
		$_SESSION['login'] = true;
		$_SESSION['id'] = $row[0];
		$_SESSION['username'] = $row[1];
		$_SESSION['no_telp'] = $row[3];
		$_SESSION['email'] = $row[4];
		$_SESSION['bio'] = $row[5];
		$_SESSION['dir_prof_pic'] = $row[6];
		$sql = "INSERT INTO user_acc(id,username,password,no_telp,email,bio,dir_prof_pic)
				VALUES('','$username','$password','$no_telp','$email','$bio','$dir_prof_pic');";	
		if(mysqli_query($con,$sql)){
			$finalResult = true;
			$result = mysqli_query($con,"SELECT * FROM user_acc where username = '$username' and password = '$password';");
			$row = mysqli_fetch_row($result);
			$_SESSION['login'] = true;
			$_SESSION['id'] = $row[0];
			$_SESSION['username'] = $row[1];
			$_SESSION['no_telp'] = $row[3];
			$_SESSION['email'] = $row[4];
			$_SESSION['bio'] = $row[5];
			$_SESSION['dir_prof_pic'] = $row[6];
		}
		else{
			$finalResult = false;
		}
	}
	else{
		$_SESSION['errorMsg'] = 'Your password is different with the confirm password.';
		$finalResult = false;
	}
	
	if($finalResult){
		header("Location: http://".$_SERVER['HTTP_HOST'].$formaction."index.php");
	}
	else{
		header("Location: http://".$_SERVER['HTTP_HOST'].$formaction."auth-register.php");
	}
?>	