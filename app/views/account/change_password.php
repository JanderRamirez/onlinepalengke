<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL . PUBLIC_DIR; ?>/css/account/login.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">


    <title>Change Password</title>
</head>

<body>
    <noscript>
        <META HTTP-EQUIV="Refresh" CONTENT="0;<?= site_url('Javascript/disabled') ?>">
    </noscript>

    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-11 col-md-4">
                <!-- Form -->
                <form class="card-body shadow-lg text-white form-edge my-form" method="POST" action="<?= site_url('account/reset_password'); ?>">
                    <div class="p-3">
                        <div class="d-flex justify-content-center bg-black pt-3">
                            <img src="<?php echo BASE_URL . PUBLIC_DIR; ?>/images/logo.png" alt="Online Palengke Logo" class="logo">
                            <h2 class="align-self-center m-0 sm web-title">Online Palengke</h2>
                        </div>
                        <h5 class="text-center mt-2 mb-4 web-subtitle">Change Password</h5>
                        <?php if ($this->session->flashdata('pass_err')) {
                        ?>
                            <span class="alert alert-danger"><?= $this->session->flashdata('pass_err') ?></span>
                        <?php
                        } ?>
                        <div class="row">
                            <input type="email" class="form-control" id="email" name="email" value="<?= $data['cust_email']; ?>" hidden required>

                            <label for="password" class="form-label p-1 text-dark">New Password:</label>
                            <div class="input-group mb-3 col-12 col-md-12 p-0">
                                <input type="password" class="input-text form-control p-2 m-0 border-0 rounded-0" id="password" name="password" required>
                            </div>




                            <label for="cpassword" class="form-label p-1 text-dark">Confirm Password:</label>
                            <div class="input-group mb-3 col-12 col-md-12 p-0">
                                <input type="password" class="input-text form-control border-0 p-2 m-0 rounded-0" id="cpassword" name="cpassword" required>
                            </div>
                            <div class="form-label d-flex justify-content-end">
                                <div class="form-label text-dark">show password</div>&nbsp
                                <input onclick="togglePassPhrase()" type="checkbox" class="form-check-input" id="passToggle">
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <input id="btnSubmit" type="submit" hidden>
                                    <button type="button" class="btn btn-text mt-5 mb-2 m-0 py-2 rounded-0" onclick="submitForm()">Login</button>
                                </div>
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
        function submitForm() {
            var pass = document.getElementById('password').value;
            var rePass = document.getElementById('cpassword').value;

            if (pass.length < 8 || pass.length > 20) {
                alert('Password must be between 8 to 20 characters')
            } else if (pass == rePass) {
                document.getElementById("btnSubmit").click();
            } else {
                alert('Password Did not match!')
            }
        }

        function togglePassPhrase() {
            var cpass = document.getElementById('password')
            var pass = document.getElementById('cpassword')
            var passToggle = document.getElementById('passToggle');
            if (passToggle.checked) {
                cpass.type = 'text';
                pass.type = 'text';
            } else {
                cpass.type = 'password';
                pass.type = 'password';
            }
        }
    </script>
</body>

</html>