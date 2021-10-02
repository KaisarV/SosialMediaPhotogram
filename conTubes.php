<?php
	$con = mysqli_connect('localhost','root','','tubesWeb');
				
	if(!$con){
		die('Could not connect: '.mysqli_error($con));
	}
?>