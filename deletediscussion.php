<?php
	require 'functions.php';

	$id = $_GET['id'];

	if (removeDiskusi($id) > 0) {
		echo "<script>
			alert('Diskusi Berhasil Dihapus');
			document.location.href = 'adminDiscussion.php';
		</script>";
	}else {
		echo "<script>alert('Diskusi Gagal Dihapus');
			document.location.href = 'adminDiscussion.php';
		</script>";
	}
?>