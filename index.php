<?php
include('notifWelcome.php');

require 'functions.php';
date_default_timezone_set("Asia/Jakarta");

$result = query("SELECT * FROM post ORDER BY id DESC");
$result2 = query("SELECT * FROM user_acc ORDER BY id DESC");

if (isset($_SESSION['username']) && $_SESSION['username'] == true) {
    $welcomeMessage = "Welcome to the member's area, " . $_SESSION['username'] . "!";
} else {
    header('Location: auth-login.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photogram - Beranda</title>

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
    <script type="text/javascript" src="customjs/customExternal.js"></script>
</head>




<body>
    <div id="app">
        <div id="sidebar" class="active navv">
            <div class="sidebar-wrapper active shadow" >
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <div style="border-bottom: solid 2px;margin-bottom: 10%;">
                                PhotoGram
                            </div>
                            <a href="Profil.php">
                                <!-- Profile User -->
                                <div style="text-align: left;">
                                    <div class="name ms-4">
                                        <img src="assets/images/faces/<?php echo $_SESSION['dir_prof_pic']; ?>" class="rounded" style="height: 100px;">
                                        <hr>
                                        <h5 class="mb-1"><?php echo $_SESSION['username']; ?></h5>
                                        <h6 class="text-muted mb-0"><?php echo $_SESSION['email']; ?></h6>
                                    </div>
                                </div>
                                <!-- End Profile User -->
                            </a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Menu -->
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <!-- Homepage Menu -->
                        <li class="sidebar-item active ">
                            <a href="index.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Beranda</span>
                            </a>
                        </li>

                        
                        <li class="sidebar-item  ">
                            <a href="discussion.php" class='sidebar-link'>
                                <i class="bi bi-chat-dots-fill"></i>
                                <span>Forum Diskusi</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="application-gallery.html" class='sidebar-link'>
                                <i class="bi bi-image-fill"></i>
                                <span>Foto Saya</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="" class='sidebar-link'>
                                <i class="bi bi-basket-fill"></i>
                                <span>About Us</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="application-email.html" class='sidebar-link'>
                                <i class="bi bi-envelope-fill"></i>
                                <span>Masukkan</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-person-badge-fill"></i>
                                <span>Authentication</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="delCookie.php">Log out</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- End Menu -->
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>


        
        <div id="main" style="background-color: #f2f7ff;">
            <header class="mb-3">
                <div class="container">
                </div>
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>

            </header>
            <div class="jumbotron jumbotron-fluid">
                <hr class="my-4">
                <div class="container  txt1">
                    <h1 class="display-4" >
                        <?php getGreeting((int)date("H"), $_SESSION['username']);?>
                    </h1>
                    <p class="lead txt2"><i><?php getQuote((int)date("H")) ?></i></p>
                </div>
                <hr class="my-4">
            </div>
            
            <div class="page-heading">
                <h3>Beranda</h3>
            </div>

            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        

                        <!-- Start Posting -->
                        <section class="section shadow">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Let's post something !</h4>
                                </div>
                                <div class="card-body">

                                    <!-- Form untuk posting -->
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="custom-file">
                                                    <p>Select image to upload : </p>
                                                    <input type="file" class="custom-file-input" id="validatedCustomFile" required name="myfile">
                                                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                                </div>
                                                <br>
                                                <textarea class="form-control" name="keterangan" placeholder="Type something" required></textarea>
                                            </div>
                                        </div>
                                        <br>
                                        <button class="btn btn-primary" name="upload">Post</button>
                                    </form>
                                    <!-- End Form  -->
                                    <?php

                                    if (isset($_POST['upload'])) {
                                        if($_FILES["myfile"]["error"]>0){
                                            echo "Return code: ".$_FILES["myfile"]["error"]."<br>";
                                        } else{
                                            $path = "assets/images/";
                                            move_uploaded_file($_FILES['myfile']['tmp_name'],$path.$_FILES["myfile"]["name"]);
                                            
                                        }

                                        $nameImage = $_FILES["myfile"]["name"];
                                        $username = $_SESSION['username'];
                                        $caption = $_POST['keterangan'];

                                        if (post($username, $caption, $nameImage) > 0) {
                                            echo "<script>
                                                alert('Berhasil !');
                                                document.location.href = 'index.php';
                                            </script>";

                                        }else {
                                            echo "
                                                document.location.href = 'index.php';
                                            </script>";
                                        }
                                    }
                                    ?>
                                    
                                </div>
                            </div>
                        </section>
                        <!-- End Posting -->
                        <!-- Start timeline -->
                        <?php foreach ($result as $row) :?>
                            <div class="row postingan">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body shadow-sm">
                                            <p style="font-weight: bolder; font-size: 20px;"> <?php echo $row['username'] ?><br></p>
                                            <?php echo $row['caption'] ?><br><br>
                                            <img style="width: 70%;" src="assets/images/<?php echo $row['image'];?>">
                                            <br>
                                            <br>
                                            <a href="" style="margin-right: 2%;">Like</a><a href="isiKomen.php?id= <?= $row['id']; ?>" target="_blank">Comment</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        
                    </div>
                    <div class="col-12 col-lg-3">
                        
                        <div class="card navbar-fixed-top">
                            <div class="card-header">
                                <h4>Pengguna Terbaru</h4>
                            </div>
                            <div class="card-content pb-4">
                                <?php foreach ($result2 as $row): ?>
                                    <?php if ($row['username'] != 'admin132'): ?>
                                        <div class="recent-message d-flex px-4 py-3">
                                            <div class="avatar avatar-lg">
                                                <img src="assets/images/faces/<?php echo $row['dir_prof_pic'] ?>">
                                            </div>
                                            <div class="name ms-4">
                                                <h5 class="mb-1"><?php echo $row['username']; ?></h5>
                                                
                                            </div>
                                        </div>
                                    <?php endif ?>
                                    
                                <?php endforeach ?>
                                
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Copyright</p>
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

    <script src="assets/js/main.js"></script>
</body>

</html>