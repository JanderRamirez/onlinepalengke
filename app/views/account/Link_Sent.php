<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Link Sent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= BASE_URL . PUBLIC_DIR ?>/css/account/login.css">
</head>

<body>
    <noscript>
        <META HTTP-EQUIV="Refresh" CONTENT="0;<?= site_url('Javascript/disabled') ?>">
    </noscript>

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-11 col-md-6">
                <!-- Form -->
                <div class="card-body shadow-lg text-white form-edge px-4 py-4 p-1 my-form mt-3">
                    <div class="d-flex justify-content-center bg-black pt-3">
                        <img src="<?php echo BASE_URL . PUBLIC_DIR; ?>/images/logo.png" alt="Online Palengke Logo" class="logo align-self-center">
                        <h2 class="align-self-center m-0 sm web-title">Online Palengke</h2>
                    </div>
                    <h4 class="text-center mt-2 mb-4 web-subtitle">Register</h4>
                    <h5 class="text-center text-dark">Thank for Choosing Calapan Online Palengke</h5>
                    <div class="row">
                        <p class="text-start m-3 text-dark">We've sent a verification link in your email account. Open the link to complete the registration!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>

</html>