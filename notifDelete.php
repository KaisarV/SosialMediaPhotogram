<?php
	if(isset($_SESSION['errorMsg']) && $_SESSION['errorMsg'] != ''){
		echo'<div style="text-align:center;" class="alert alert-danger">
                <h4 class="alert-heading">Error</h4>
                <p>'.$_SESSION['errorMsg'].'</p>
             </div>'; 
		$_SESSION['errorMsg'] = "";
	}
	else if(isset($_SESSION['successMsg']) && $_SESSION['successMsg'] != ''){
		echo'<div style="text-align:center;" class="alert alert-success">
                <h4 class="alert-heading">Success</h4>
                <p>'.$_SESSION['successMsg'].'</p>
             </div>';
		$_SESSION['successMsg'] = "";
	}
	else{
	}
?>