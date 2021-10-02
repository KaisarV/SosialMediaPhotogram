

<?php 
require 'functions.php';

session_start();
$id = $_GET['id'];

if (approveDiskusi($id) > 0) {
	echo "<script>
		alert('Approved !');
		document.location.href = 'discussion.php';
	</script>";

}else {
	echo "<script>alert('Failed !');
		document.location.href = 'discussion.php';
	</script>";
}

?>