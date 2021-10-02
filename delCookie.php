<?php

	setcookie('login',"",time()-3600);
	setcookie('id',"",time()-3600);
	setcookie('username',"",time()-3600);
	setcookie('no_telp',"",time()-3600);
	setcookie('email',"",time()-3600);
	setcookie('bio',"",time()-3600);
	setcookie('dir_prof_pic',"",time()-3600);

	$formaction = "/TUBES/";
	session_start();
	session_destroy();
	header("Location: http://".$_SERVER['HTTP_HOST'].$formaction."auth-login.php");
	
?>