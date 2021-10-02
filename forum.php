<?php

require 'functions.php';
date_default_timezone_set("Asia/Jakarta");

SESSION_START();

$id = $_GET['id'];
$result = query("SELECT * FROM chatdiskusi WHERE idDiskusi = $id");

$result2 = query("SELECT * FROM diskusi WHERE id = $id");

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

    <link rel="stylesheet" type="text/css" href="assets/custom.css">
    <style type="text/css">
        .hover:hover {
            background-color: #435ebe;
        }
    </style>
</head>

<body>
    <script type="text/javascript">
        function toBottom() {
            window.scrollTo(0, document.body.scrollHeight);
        }
        window.onload=toBottom;
    </script>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active shadow" >
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <div style="border-bottom: solid 2px;margin-bottom: 10%;">
                                PhotoGram
                            </div>
                            <a href="index.php">
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
                        <li class="sidebar-item  ">
                            <a href="index.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Beranda</span>
                            </a>
                        </li>
                        <!-- End Homepage Menu -->
                        
                        <li class="sidebar-item  active">
                            <a href="discussion.php" class='sidebar-link'>
                                <i class="bi bi-chat-dots-fill"></i>
                                <span>Diskusi - <?php foreach ($result2 as $row): ?>
                                                        <?php echo $row['title'] ?>
                                                    <?php endforeach ?></span>
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
        
        

            <header class="mb-3">
                <div class="container">
                </div>
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div id="main" style="background-color: #f2f7ff;">
            
            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
            <div class="container">
                <div class="row clearfix">

                    <div class="col-lg-12">
                        <div style="background-color: white;" class="rounded-lg">
                            <div class="chat">
                                <div class="chat-header clearfix">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="chat-about">
                                                <h3 class="m-b-0">
                                                    Diskusi - 
                                                    <?php foreach ($result2 as $row): ?>
                                                        <?php echo $row['title'] ?>
                                                    <?php endforeach ?>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-history">
                                    <ul class="m-b-0">
                                        <?php foreach ($result as $row): ?>
                                            <?php 
                                            if ($_SESSION['username'] == $row['username']) {
                                                $color = "#039dfc";
                                            }

                                            ?>
                                            <li class="clearfix">
                                                <div class="message-data">
                                                    <span   class="message-data-time"><?php echo "<b>".$row['username']."</b>    <jam style='font-size : 10px;'>". $row['jam']. "</jam>";?> 
                                                    </span>
                                                </div>
                                                <div class="message my-message" style="width: 40%; background-color: <?php echo $color; ?>">
                                                    <p style="word-break: break-all; font-size: 18px;"><?php echo $row['chat'] ?></p>
                                                </div>                                    
                                            </li>    
                                        <?php endforeach ?>                       
                                    </ul>
                                </div>
                                <form method="POST">
                                    <table style="margin-right: 10px; margin-left: 10px;">
                                        <tr>
                                            <td style="width: 100%;"><div class="form-group">
                                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Type your message here ..." name="chat">
                                            </div></td>
                                             <td><button class="input-group-text" name="submit">
                                                    <i class="fa fa-send"></i>
                                            </button></td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if (isset($_POST['submit'])) {
                $username = $_SESSION['username'];
                $chat = htmlspecialchars($_POST['chat']);
                $idDiskusi = $id;
                $date = date("h:i");

                insertChatForum($username, $chat, $idDiskusi, $date);
                echo("<meta http-equiv='refresh' content='1'>"); //Refresh by HTTP 'meta'
            }
            ?>
           
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