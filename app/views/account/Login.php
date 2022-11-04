<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="<?php echo BASE_URL . PUBLIC_DIR; ?>/css/account/login.css">
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Varela+Round&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Manrope:wght@300&display=swap" rel="stylesheet">
    <!-- FONTS -->
    <title>Calapan Online Palengke Login</title>
</head>

<body id="body" style="display: none;">
    <noscript>
        <META HTTP-EQUIV="Refresh" CONTENT="0;<?= site_url('Javascript/disabled') ?>">
    </noscript>

    <div class="container mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-11 col-md-7 col-lg-4">
                <!-- Form -->
                <form class="card-body shadow-lg text-white my-form p-4 mt-5" method="POST" action="<?= site_url('Account/Signin'); ?>">
                    <div class="d-flex justify-content-center bg-black pt-3">
                        <img src="<?php echo BASE_URL . PUBLIC_DIR; ?>/images/logo.png" alt="Online Palengke Logo" class="logo">&nbsp
                        <h2 class="align-self-center m-0 sm web-title">Online Palengke</h2>
                    </div>
                    <h4 class="text-center mt-2 mb-4 web-subtitle">Login</h4>
                    <?php if ($this->session->flashdata('login_err')) { ?>
                        <span class="alert alert-danger p-1" style="background-color:;"><?= $this->session->flashdata('login_err') ?></span>
                    <?php } else if ($this->session->flashdata('login_succ')) {
                        echo '<span class="alert alert-success p-1">' . $this->session->flashdata("login_succ") . '</span> ';
                    } ?>
                    <div class="row">
                        <!-- First name -->
                        <div class="mb-3 col-12 col-md-12">
                            <label for="user" class="text-dark form-label">Username or Email:</label>
                            <input type="text" class="input-text form-control p-2 m-0 rounded-0 border-0" id="user" name="username" required>
                        </div>
                        <!-- PASSWORD -->
                        <label for="password" class="text-dark form-label">Password:</label>
                        <div class="input-group mb-0 col-12 col-md-12">
                            <input type="password" class="input-text form-control p-2 m-0 rounded-0 border-0" id="password" name="password" required>
                            <div class="input-group-append d-flex border-0 m-0 bg-white">
                                <span onclick="togglePassPhrase('togglePassPhrase')" class="input-group-text border-0 bg-opacity-100 input-text" style="cursor:pointer;">
                                    <i id="togglePassPhrase" class="fas fa-eye-slash align-self-center text-dark"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 text-dark">
                            <a href="<?= site_url('Account/Forgot'); ?>"><small>Forgot password?</small></a>
                        </div>
                        <div class="col-12 mt-5 mb-2">
                            <input type="submit" value="Login" class="mt-2 btn border-0 rounded-0 m-0 p-2 container-fluid btn-text" required>
                            <small class="mt-4 d-flex justify-content-center text-dark">Don't have and account yet?&nbsp<a href="<?= site_url('Account/Register'); ?>">Click Here</a></small>
                            <div class="text-center pb-1 pt-3">
                                <a href="http://cityofcalapan.gov.ph/" style="text-decoration: none;">
                                    <img src="<?php echo BASE_URL . PUBLIC_DIR; ?>/images/CalapanLogo.png" alt="Online Palengke Logo" class="logo-footer p-2">
                                </a>
                                <img src="<?php echo BASE_URL . PUBLIC_DIR; ?>/images/CEEDLogo.png" alt="Online Palengke Logo" class="logo-footer p-2">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script>
        window.onload = function(e) {
            document.getElementById('body').style.display = "block";
        }

        function togglePassPhrase($id) {
            var id = document.getElementById($id);
            var x = document.getElementById("password");
            if (x.type === "password") {
                id.classList.replace('fa-eye-slash', "fa-eye")
                x.type = "text";
            } else {
                id.classList.replace('fa-eye', "fa-eye-slash")
                x.type = "password";
            }
        }
    </script>
</body>

</html>