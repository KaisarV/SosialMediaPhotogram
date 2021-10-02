<?php
	session_start();
	if(isset($_SESSION['errorMsg'])){
		echo'<div class="alert alert-danger">
                <h4 class="alert-heading">Error</h4>
                <p>'.$_SESSION['errorMsg'].'</p>
             </div>';
		session_destroy();	 
	}
?>
