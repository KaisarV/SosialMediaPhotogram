<?php
include('notifWelcome.php');
include('notifDelete.php');

require 'functions.php';
date_default_timezone_set("Asia/Jakarta");

$result = query("SELECT * FROM diskusi WHERE approve = 0 ORDER BY id DESC");
$result2 = query("SELECT * FROM user_acc");

if (($_SESSION['username']) == 'admin132') {
    $welcomeMessage = "Welcome to the admin area, " . $_SESSION['username'] . "!";
} else {
    header('Location: auth-login.php');
    SESSION_DESTROY();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Page</title>

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
                            <a href="index.html">
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
                        <li class="sidebar-item ">
                            <a href="admin.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Beranda - Admin</span>
                            </a>
                        </li>
                        <!-- End Homepage Menu -->
                        <li class="sidebar-item active">
                            <a href="usermessage.php" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Pesan User</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="delUser.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>User</span>
                            </a>
                        </li>
                        
                        <li class="sidebar-item  ">
                            <a href="discussion.php" class='sidebar-link'>
                                <i class="bi bi-chat-dots-fill"></i>
                                <span>Forum Diskusi</span>
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
           
            
            <div class="page-heading">
                <h3>Pesan User</h3>
            </div>
            <?php if ($result == []): ?>
                <?php echo "<h4>Anda tidak memiliki pesan</h4>" ?>
                <br>
                <br>
            <?php endif ?>

            <div class="page-content">
                <section class="row navbar-fixed-top">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            
                        
                        <!-- Start timeline -->
                        
                        <?php foreach ($result as $row) :?>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body shadow-sm">
                                            <h4>Tipe : Persetujuan Diskusi</h4>
                                            <hr>
                                            <table cellpadding="5" cellspacing="5">
                                                <tr>
                                                    <td><b>Pengirim</b></td>
                                                    <td><b> : <?php echo $row['author']; ?></b></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Tanggal/Waktu</b></td>
                                                    <td><b> : </b><?php echo $row['date'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Kategori</b></td>
                                                    <td><b> : </b><?php echo $row['title'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Pesan</b></td>
                                                    <td rowspan="3"><b> : </b><?php echo $row['chatToAdmin'] ?></td>
                                                </tr>
                                            </table>
                                            
                                            <br>
                                            <a href="approvediskusi.php?id= <?= $row['id']; ?>"><button type="button" class="btn btn-success">Approve</button></a>
                                            <a href="deletediscussion.php?id= <?= $row['id']; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
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