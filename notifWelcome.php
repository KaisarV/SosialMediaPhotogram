<?php
	session_start();
	if(isset($_SESSION['login'])){
		echo'<div style="text-align:center;" class="alert alert-success alert-dismissible show fade">
                <strong>Welcome '.$_SESSION['username'].'.</strong> 
				
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>';
	}
	
?>