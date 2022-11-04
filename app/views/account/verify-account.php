<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= BASE_URL . PUBLIC_DIR ?>/css/account/login.css">
    <title>Finish Account Registration</title>

    <style>
        .fast-spin {
            -webkit-animation: fa-spin 500ms infinite linear;
            animation: fa-spin 500ms infinite linear;
        }
    </style>

</head>

<body>
    <noscript>
        <META HTTP-EQUIV="Refresh" CONTENT="0;<?= site_url('Javascript/disabled') ?>">
    </noscript>

    <div class="container pt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-11 col-md-6">
                <!-- Form -->
                <form class="card-body shadow-lg form-edge ps-4 pe-4 pt-4 p-1 my-form" method="POST" action="<?= site_url('Account/Complete_Registration'); ?>">
                    <div class="d-flex justify-content-between">
                        <img src="<?php echo BASE_URL . PUBLIC_DIR; ?>/images/CalapanLogo.png" alt="Online Palengke Logo" class="logo-footer p-2">
                        <div class="d-flex justify-content-center bg-black pt-3">
                            <img src="<?php echo BASE_URL . PUBLIC_DIR; ?>/images/logo.png" alt="Online Palengke Logo" class="logo align-self-center">
                            <h2 class="align-self-center m-0 sm web-title">Online Palengke</h2>
                        </div>
                        <img src="<?php echo BASE_URL . PUBLIC_DIR; ?>/images/CEEDLogo.png" alt="Online Palengke Logo" class="logo-footer p-2">
                    </div>
                    <input id="id" name="id" type="text" value="<?= $customer['cust_id'] ?>" hidden>
                    <h4 class="text-center mt-2 mb-4 web-subtitle">Complete Verification</h4>
                    <div class="row mt-3 mb-3">
                        <!-- USERNAME -->
                        <div class="row p-0">
                            <div class="col-12 col-md-6 p-0 ps-4">
                                <div class="input-group mb-0">
                                    <label id="usernameMsg" for="username" class="p-0 col-12">Username: <span id="usernameTakenMsg"></span></label>
                                    <input oninput="ifExist()" type="text" class="input-text form-control m-0 rounded-0 p-2 border-0" id="username" name="username" required>
                                    <div class="input-group-append d-flex border-0 m-0">
                                        <span class="input-group-text border-0" hidden>
                                            <i id="toggleUsernameTaken" class="fas fa-times align-self-center text-danger"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Password -->
                        <div class="mt-3 col-12 col-md-6">
                            <label for="pass">Password:</label>
                            <input type="password" class="input-text form-control m-0 rounded-0 p-2 border-0" id="pass" name="pass" required>
                        </div>
                        <!-- Re-enter Password -->
                        <div class="mt-3 col-12 col-md-6">
                            <label for="rePass">Re-enter Password:</label>
                            <input type="password" class="input-text form-control m-0 rounded-0 p-2 border-0" id="rePass" name="rePass" required>
                        </div>

                        <div class="form-label d-flex justify-content-end p-2 pe-3">
                            <label for='passToggle' class="form-label">show password</label>&nbsp
                            <input onclick="togglePassPhrase()" type="checkbox" class="input-text form-check-input" id="passToggle">
                        </div>
                        <div class="row m-0">
                            <input id="btnSubmit" type="submit" hidden>
                            <button type="button" class="btn btn-text rounded-0 m-0 p-2 container-fluid btn-text mt-4 mb-2" onclick="submitForm()">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function submitForm() {
            var pass = document.getElementById('pass').value;
            var rePass = document.getElementById('rePass').value;

            if (pass.length < 8 || pass.length > 20) {
                alert('Password must be between 8 to 20 characters')
            } else if (pass != rePass) {
                alert('Password Did not match!')
            } else if (usernameTaken == true) {
                alert('Username Already Taken')
            } else {
                document.getElementById("btnSubmit").click();
            }
        }

        function togglePassPhrase() {
            var cpass = document.getElementById('rePass')
            var pass = document.getElementById('pass')
            var passToggle = document.getElementById('passToggle');
            if (passToggle.checked) {
                cpass.type = 'text';
                pass.type = 'text';
            } else {
                cpass.type = 'password';
                pass.type = 'password';
            }
        }

        var usernameTaken = false
        // CHECK IF EMAIL IS ALREADY TAKEN
        function ifExist() {
            var iconTag = $('#toggleUsernameTaken')
            var usernameTag = $('#username')

            if (usernameTag.val().length > 4 && usernameTag.val().length < 21) {
                $.post("<?php echo site_url('api/username_exist'); ?>",
                    // DATA TO PASS
                    {
                        username: $('#username').val()
                    },
                    function(data, status, xhr) {
                        if (Object.keys(data).length > 0) {
                            $('#usernameTakenMsg').html('Username already taken')
                            iconTag.attr('class', '')
                            iconTag.closest('span').attr('hidden', false)
                            iconTag.attr('class', 'fas fa-times text-danger fa-spin')
                            iconTag.fadeOut(1)
                            iconTag.fadeIn(100)
                            setTimeout(function() {
                                iconTag.removeClass('fa-spin')
                            }, 100);
                            usernameTaken = true
                        } else {
                            $('#usernameTakenMsg').html('')
                            iconTag.attr('class', '')
                            iconTag.closest('span').attr('hidden', false)
                            iconTag.attr('class', 'fas fa-check text-success fa-spin')
                            iconTag.fadeOut(1)
                            iconTag.fadeIn(100)
                            setTimeout(function() {
                                iconTag.removeClass('fa-spin')
                            }, 100);
                            usernameTaken = false
                        }
                    })
            } else {
                if (usernameTag.val().length > 0) {
                    $('#usernameTakenMsg').html('(Must be 5-20 characters)')
                    iconTag.attr('class', '')
                    iconTag.closest('span').attr('hidden', false)
                    iconTag.attr('class', 'fas fa-times text-danger fa-spin')
                    iconTag.fadeOut(1)
                    iconTag.fadeIn(100)
                    setTimeout(function() {
                        iconTag.removeClass('fa-spin')
                    }, 100);
                } else {
                    $('#usernameTakenMsg').html('(Required)')
                    iconTag.addClass('fast-spin')
                    iconTag.fadeOut(100)
                    setTimeout(function() {
                        iconTag.removeClass('fast-spin')
                        iconTag.closest('span').attr('hidden', true)
                    }, 100);
                }
                usernameTaken = true
            }
        }
    </script>
</body>

</html>