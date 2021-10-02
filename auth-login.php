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

<body>
	<?php
		include("notifWarning.php");
		include("cekLogin.php");
	?>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12" >
                <div id="auth-left" >
                    <div class="auth-logo">
                        <div style="border-bottom: solid 2px;">
                            <h1 class="auth-title">Photogram</h1>
                        </div>   
                    </div>
                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-5" style="color: white;">Log in with your data that you entered during registration.</p>

                    <form method ="POST" action="saveLogin.php">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="username" class="form-control form-control-xl" placeholder="Username">
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
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" name="remember"type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-black-600" for="flexCheckDefault" style="color: black;">
                                Keep me logged in
                            </label>
                        </div>
						<button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4" style="color: black;">
                        <p class="text-black-600">Don't have an account? <a href="auth-register.php"
                                class="font-bold">Sign
                                up</a>.</p>
                       
                    </div>
                </div>
                
            </div>
            <div class="col-lg-7 d-none d-lg-block" >
                
            </div>
        </div>

    </div>
</body>

</html>