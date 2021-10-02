<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
    <style type="text/css">
        body {
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
    </style>
</head>
<?php
	include('notifWarning.php');
?>
<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <div style="border-bottom: solid 2px;">
                            <h1 class="auth-title">Photogram</h1>
                        </div>    
                    </div>

                    <h1 class="auth-title">Sign Up</h1>
                    <p class="auth-subtitle mb-5" style="color: white;">Input your data to register to our website.</p>

                    <form method = "POST" enctype="multipart/form-data" action="regis.php">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name= "email" class="form-control form-control-xl" placeholder="Email">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="username" class="form-control form-control-xl" placeholder="Username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
						<div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="no_telp" class="form-control form-control-xl" placeholder="Telephone Number">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
						<div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="bio" class="form-control form-control-xl" placeholder="Biodata">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
						<div class="form-group position-relative has-icon-left mb-4">
                            <input type="file" name="dir_prof_pic" class="form-control form-control-xl" placeholder="Insert file here">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password" class="form-control form-control-xl" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="confirmPass" class="form-control form-control-xl" placeholder="Confirm Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Sign Up</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Already have an account? <a href="auth-login.php"
                                class="font-bold">Log
                                in</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                
            </div>
        </div>

    </div>
</body>

</html>