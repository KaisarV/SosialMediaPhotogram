

<?php

require 'functions.php';

$id = $_GET['id'];

if (removePost($id) > 0) {
	echo "<script>
		alert('Postingan Berhasil Dihapus');
		document.location.href = 'admin.php';
	</script>";
}else {
	echo "<script>alert('Postingan Gagal Dihapus');
		document.location.href = 'admin.php';
	</script>";
}

?>