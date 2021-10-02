<?php
	$id = $_GET['id'];
	require 'functions.php';
	
	$result = query("SELECT * FROM post WHERE id=$id");
	$result2 = query("SELECT * FROM komentar WHERE get_id_gambar=$id ORDER BY id DESC");
	
	$komenpostinganresult2 = count($result2);
	session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="assets/vendors/quill/quill.bubble.css">
    <link rel="stylesheet" href="assets/vendors/quill/quill.snow.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="assets/custom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" ></script>
</head>
	<body>
            <div class="page-content" style="margin-left: 20%;">
                <section class="row navbar-fixed-top">
                    <div class="col-12 col-lg-9">
                        
							<!-- Start Posting -->
                        <section class="section shadow">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Post Komentar !</h4>
                                </div>
                                <br>
                                <div class="card-body">

                                    <form method="post" action="Upload_Komentar.php" enctype="multipart/form-data" >
                                        <div class="form-row">
                                            <div class="col">
												<table>
													<?php foreach ($result as $row) :?>
													<div class="row">
														<div class="col-12">
															<div class="card">
																<div class="card-body shadow-sm">
																	<p style="font-weight: bolder; font-size: 20px;"> <?php echo $row['username'] ?><br></p>
																	<?php echo $row['caption'] ?><br><br>
																	<img style="width: 70%;" src="assets/images/<?= $row['image'];?>" alt="picture">
																	<br>
																	<br>
																</div>
															</div>
														</div>
													</div>
													<?php endforeach; ?>
											</div>
													<input type="text" readonly="readonly" class="form-control" name="nama" id="nama" value="<?php $_SESSION['username']; ?>" placeholder="<?php echo $_SESSION['username']; ?>"/>
													<br>
													<label class="card-title" for="checkbox_id">Anonymous &nbsp;</label>
													<input name="checkbox_id" type="checkbox" id="checkbox_id" onclick="anonym()"/>
													<br>
													<textarea class="form-control" name="komentar" placeholder="Type something" maxlength="100" required></textarea>
													<br>
													<input type="submit" class="btn btn-primary" name="upload"/>
													<a href="index.php" style="margin-left: 1%;">
														<input type="submit" class="btn btn-primary" value="Kembali" />
													</a><br>
													<input type="hidden" name="id" value="<?= $id; ?>" />
													
												</table>
											</div>
                                        </div>
                                        <br>
                                        <br>
										<h4>Komentar</h4>
											<?php foreach ($result2 as $row) :?>
												<div class="row">
													<div class="col-12">
														<div class="card">
															<div class="card-body shadow-sm">
																<b><?php echo $row['username_komen']?></b> <br>
																<?php echo $row['komentar'] ?>
															</div>
														</div>
													</div>
												</div>
											<?php endforeach; ?>
                                        <br>
                                    </form>
                                    <!-- End Form  -->
                                                                        
                                </div>
                            </div>
                        </section>
                        <!-- End Posting -->                               
                    </div>
                    <div class="col-12 col-lg-3">
                    </div>
                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; </p>
                    </div>
                    
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>
    <script src="assets/vendors/quill/quill.min.js"></script>
    <script src="assets/js/pages/form-editor.js"></script>

    <script src="TUBES/assets/js/main.js"></script>
	<script>
		function anonym(){
			var checkBox = document.getElementById("checkbox_id");
			if(checkBox.checked == true){
				nama.style.display = "none";
			} else {
				nama.style.display = "block";
			}
		}
	</script>
	</body>
</html>