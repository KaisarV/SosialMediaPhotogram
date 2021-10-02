<?php
	session_start();
	$id = $_GET['q'];
	$formaction = "/TUBES/";
	include('conTubes.php');
	$sql = "DELETE FROM user_acc WHERE id = '$id';";
		if(mysqli_multi_query($con,$sql)){
			$_SESSION['successMsg'] = "User successfully deleted.";
			header("Location: http://".$_SERVER['HTTP_HOST'].$formaction."delUser.php");
			exit();
		}
		else{
			$_SESSION['errorMsg'] = "Error deleting data : " . mysqli_error($con);
			header("Location: http://".$_SERVER['HTTP_HOST'].$formaction."delUser.php");
			exit();	
		}
	mysqli_close($con);
	
?>