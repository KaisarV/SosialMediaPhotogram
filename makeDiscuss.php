<?php

require 'functions.php';

$result = query("SELECT * FROM post");
$result2 = query("SELECT * FROM diskusi");

SESSION_START();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photogram - Forum Diskusi</title>

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
    <script type="text/javascript" src="customjs/customExternal.js"></script>
    <style type="text/css">
        .hover:hover {
            background-color: #435ebe;
        }
    </style>
</head>



<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active shadow" >
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <div style="border-bottom: solid 2px;margin-bottom: 10%;">
                                PhotoGram
                            </div>
                            <a href="index.html">
                                <!-- Profile User -->
                                <div style="text-align: left;">
                                    <div class="name ms-4">
                                        <img src="assets/images/faces/<?php echo $_SESSION['dir_prof_pic'] ?>" class="rounded" style="height: 100px;">
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
                        <li class="sidebar-item">
                            <a href="index.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Beranda</span>
                            </a>
                        </li>
                        <!-- End Homepage Menu -->
                        <li class="sidebar-item">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Catatan</span>
                            </a>
                        </li>

                        
                        <li class="sidebar-item active ">
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
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Buat komunitasmu !</h3>
                            <p class="text-subtitle text-muted">Give textual form controls like input upgrade with
                                custom styles,
                                sizing, focus states, and more.</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Input</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <form method="post">
                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Input</h4>
                            </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="basicInput">Masukkan Judul Forum</label>
                                                <input type="text" class="form-control" id="basicInput"
                                                    placeholder="Judul Forum" name="judul" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Pesan anda kepada admin</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="pesan"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="disabledInput">Username anda</label>
                                                <p class="form-control-static" id="staticInput"><?php echo $_SESSION['username']; ?></p>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" name="submit2">Submit</button>
                                    </div>
                                </div>
                            </div>
                    </section>
                </form>
            </div>
            <?php 
            if (isset($_POST['submit2'])) {
                $nama = $_SESSION['username'];
                $judul = ucwords($_POST['judul']);
                $chat = htmlspecialchars($_POST['pesan']);
                $date = date("Y-m-d")." ".date("h:i:sa");

                if (requestDiscuss($nama, $judul, $chat, $date) > 0) {
                    echo "<script>

                            alert('Data Berhasil Terkirim');
                        </script>";

                }else {
                    echo "<script>
                            alert('Data Gagal Terkirim');    
                        </script>";
                }
            }
            ?>

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