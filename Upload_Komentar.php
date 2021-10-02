<?php
	require "functions.php";
	session_start();

	$id = $_POST['id'];

	echo $id;
	if(!isset($_POST['checkbox_id'])){
		$nama = $_SESSION['username'];

	} else {
		$nama = "anonymous";

	}

	echo "<br>";
	$komentar = $_POST['komentar'];	
	$sql = insertKomentar($id,$nama,$komentar);
	header("Location: isiKomen.php?id=$id");
?>