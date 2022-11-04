<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URL . PUBLIC_DIR;?>/css/account/login.css">

    <title>Forgot Password</title>
</head>
<body>


    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-11 col-md-4">
                <!-- Form -->
                <form class="card-body shadow-lg text-white form-edge my-form" method="POST"
                    action="<?=site_url('Account/Send_Code'); ?>">
                    <div class="p-3">
                        <div class="d-flex justify-content-center bg-black pt-3">
                            <img src="<?php echo BASE_URL . PUBLIC_DIR; ?>/images/logo.png" alt="Online Palengke Logo"
                                class="logo">
                            <h2 class="align-self-center m-0 sm web-title">Online Palengke</h2>
                        </div>
                        <h4 class="text-center mt-2 mb-4 web-subtitle">Forgot Password</h4>
                        <div class="row">
                            <?php if($this->session->flashdata('email_err')){ ?>
                                <span class="alert alert-danger p-2 m-0"><?= $this->session->flashdata('email_err') ?></span>
                            <?php } else if ($this->session->flashdata('email_succ')){
                                echo '<span class="alert m-0 p-2 alert-success">'. $this->session->flashdata("email_succ").'</span>';
                            }?>
                            <div class="mb-2 col-12 col-md-12 p-0">
                                <label for="user" class="form-label text-dark">Email/Phone Number:</label>
                                <input type="text" class="input-text form-control m-0 py-2 rounded-0 border-0" id="email" name="email"
                                    required>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <input type="submit" value="Forgot Password" class="btn btn-text mt-5 mb-2 m-0 py-2 rounded-0" required>
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