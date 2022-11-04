<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Varela+Round&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Manrope:wght@300&display=swap" rel="stylesheet">
    <!-- FONTS -->
    <link rel="stylesheet" href="<?= BASE_URL . PUBLIC_DIR ?>/css/account/login.css">
    <title>Register</title>
    <style>
        .fast-spin {
            -webkit-animation: fa-spin 500ms infinite linear;
            animation: fa-spin 500ms infinite linear;
        }
    </style>
</head>

<body>

    <body style="display: none;">
        <noscript>
            <META HTTP-EQUIV="refresh" CONTENT="0;<?php echo site_url('Javascript/disabled') ?>">
        </noscript>

        <div class="container mt-5">
            <div class="row d-flex justify-content-center">
                <div class="col-11 col-md-11 col-lg-7">
                    <!-- Form -->
                    <form class="card-body shadow-lg text-white form-edge my-form p-5" method="POST" action="<?= site_url('Account/Link_Sent'); ?>">
                        <div class="d-flex justify-content-between">
                            <img src="<?php echo BASE_URL . PUBLIC_DIR; ?>/images/CalapanLogo.png" alt="Online Palengke Logo" class="logo-footer p-2">
                            <div class="d-flex justify-content-center bg-black pt-3">
                                <img src="<?php echo BASE_URL . PUBLIC_DIR; ?>/images/logo.png" alt="Online Palengke Logo" class="logo align-self-center">
                                <h2 class="web-title align-self-center m-0 sm web-title">Online Palengke</h2>
                            </div>
                            <img src="<?php echo BASE_URL . PUBLIC_DIR; ?>/images/CEEDLogo.png" alt="Online Palengke Logo" class="logo-footer p-2">
                        </div>
                        <h4 class="text-center mt-2 mb-4 web-subtitle">Register</h4>
                        <?php if ($this->session->flashdata('msg')) { ?>
                            <div class="alert alert-danger m-2 text-black"><?= $this->session->flashdata('msg') ?></div>
                        <?php } ?>
                        <div class="row">
                            <!-- First name -->
                            <div class="mb-3 col-12 col-md-4">
                                <label for="fn" class="form-label m-1 text-dark">First name &nbsp<b class="text-danger">*</b></label>
                                <input type="text" class="input-text form-control m-0 rounded-0 border-0 p-2" id="fn" name="fn" value="<?= ($this->session->flashdata('fn')) ? $this->session->flashdata('fn') : ''; ?>" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" title="<b class='text-danger'>Required</b>" required>
                            </div>

                            <!-- Middle name -->
                            <div class="mb-3 col-12 col-md-4">
                                <label for="mn" class="form-label m-1 text-dark">Middle name &nbsp<b class="text-danger">*</b></label>
                                <input type="text" class="input-text form-control m-0 rounded-0 border-0 p-2" id="mn" name="mn" value="<?= ($this->session->flashdata('mn')) ? $this->session->flashdata('mn') : ''; ?>" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" title="<b class='text-danger'>Required</b>" required>
                            </div>
                            <!-- Last name -->
                            <div class="mb-3 col-12 col-md-4">
                                <label for="ln" class="form-label m-1 text-dark">Last name &nbsp<b class="text-danger">*</b></label>
                                <input type="text" class="input-text form-control m-0 rounded-0 border-0 p-2" id="ln" name="ln" value="<?= ($this->session->flashdata('ln')) ? $this->session->flashdata('ln') : ''; ?>" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" title="<b class='text-danger'>Required</b>" required>
                            </div>
                            <!-- Sex & Birthdate Group -->
                            <div class="col-12 col-md-8">
                                <div class="row">
                                    <!-- Sex -->
                                    <div class="col-6 col-md-6 mb-3">
                                        <label for="sex" class="form-label m-1 text-dark">Sex &nbsp<b class="text-danger">*</b></label>
                                        <?php
                                        $sex = "male";
                                        if (($this->session->flashdata('sex')) && ($this->session->flashdata('sex') == "female")) {
                                            $sex = 'female';
                                        }
                                        ?>
                                        <select id="sex" name="sex" class="input-text form-select m-0 rounded-0 border-0 p-2" required>
                                            <option value="male" <?php if ($sex == 'male') echo 'selected';
                                                                    else echo 'selected'; ?>>Male</option>
                                            <option value="female" <?php if ($sex == 'female') echo 'selected';
                                                                    else echo ''; ?>>Female</option>
                                        </select>
                                    </div>
                                    <!-- Birthdate -->
                                    <div class="col-6 col-md-6 mb-3">
                                        <label for="bd" class="form-label m-1 text-dark">Birthdate &nbsp<b class="text-danger">*</b></label>
                                        <input id="bd" name="bd" placeholder="Date" class="input-text form-control m-0 rounded-0 border-0 p-2" type="date" value="<?= ($this->session->flashdata('bd')) ? $this->session->flashdata('bd') : ''; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Barangay -->
                            <div class="col-6 col-md-6 mb-3">
                                <label for="barangay" class="form-label m-1 text-dark">Barangay &nbsp<b class="text-danger">*</b></label>
                                <?php
                                // $address = 'Lalud';
                                // if (($this->session->flashdata('barangay')) && ($this->session->flashdata('barangay') == "Biga")) {
                                //     $address = 'Biga';
                                // } else if (($this->session->flashdata('barangay')) && ($this->session->flashdata('barangay') == "Suqui")) {
                                //     $address = 'Suqui';
                                // } else if (($this->session->flashdata('barangay')) && ($this->session->flashdata('barangay') == "Tibag")) {
                                //     $address = 'Tibag';
                                // } else if (($this->session->flashdata('barangay')) && ($this->session->flashdata('barangay') == "Silonay")) {
                                //     $address = 'Silonay';
                                // } else if (($this->session->flashdata('barangay')) && ($this->session->flashdata('barangay') == "Ibaba East")) {
                                //     $address = 'Ibaba East';
                                // } else if (($this->session->flashdata('barangay')) && ($this->session->flashdata('barangay') == "Ibaba West")) {
                                //     $address = 'Ibaba West';
                                // } else if (($this->session->flashdata('barangay')) && ($this->session->flashdata('barangay') == "Lumangbayan")) {
                                //     $address = 'Lumangbayan';
                                // }
                                ?>
                                <select id="barangay" name="barangay" class="input-text form-select m-0 rounded-0 border-0 p-2 text-dark" required>
                                    <?php foreach ($barangays as $barangay) {
                                        $isSelected = '';
                                        if (($this->session->flashdata('barangay')) && ($this->session->flashdata('barangay') == $barangay['id']))
                                            $isSelected = 'selected';
                                    ?>
                                        <option value="<?= htmlspecialchars($barangay['brgy_id']) ?>" <?= $isSelected ?>><?= htmlspecialchars($barangay['brgy_name']) ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <!-- Street NO. / House No. (Optional) -->
                            <div class="col-6 col-md-6 mb-3">
                                <label for="street" class="form-label m-1 text-dark">Street No., House No. &nbsp<b class="text-danger">*</b></label>
                                <input type="text" class="input-text form-control m-0 rounded-0 border-0 p-2 border-0" id="street" name="street" placeholder="Street, House Number" value="<?= ($this->session->flashdata('street')) ? $this->session->flashdata('street') : ''; ?>" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" title="<b class='text-danger'>Required</b>" required>
                            </div>

                            <!-- Email -->
                            <div class="col-12 m-0 p-0 col-md-6">
                                <div class="row m-0 p-0">
                                    <label for="email" class="form-label m-1 text-dark">Email &nbsp<b class="text-danger">*</b></label>
                                    <div class="input-group mb-0">
                                        <input oninput="ifExist()" type="email" class="input-text form-control m-0 rounded-0 border-0 p-2" id="email" name="email" value="<?= ($this->session->flashdata('email')) ? $this->session->flashdata('email') : ''; ?>" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" title="<b class='text-danger'>Required</b>" required>
                                        <div class="input-group-append d-flex border-0 m-0 bg-white">
                                            <span class="input-group-text bg-white border-0" hidden>
                                                <i id="toggleEmailTaken" class="fas fa-times"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- CONTACT NUMBER -->
                            <div class="col-12 m-0 p-0 col-md-6">
                                <div class="row m-0 p-0">
                                    <label for="contact" class="form-label m-1 text-dark">Contact Number &nbsp<b class="text-danger">*</b></label>
                                    <div class="input-group mb-0">
                                        <input type="text" class="input-text form-control m-0 rounded-0 border-0 p-2" id="contact" name="contact" value="<?= ($this->session->flashdata('email')) ? $this->session->flashdata('contact') : ''; ?>" placeholder="09xx-xxx-xxxx" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" title="<b class='text-danger'>Required</b>" required>
                                        <div class="input-group-append d-flex border-0 m-0 bg-white">
                                            <span class="input-group-text bg-white border-0" hidden>
                                                <i id="toggleContactTaken" class="fas fa-times"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-12 text-center mt-2 mb-4">
                                <h6 class="me-3 text-dark">Send Code via: </h6>
                                <div>
                                    <div class="form-check form-check-inline text-dark">
                                        <input value="email" class="input-text form-check-input border-0" type="radio" name="send-to" id="email-send">
                                        <label class="form-check-label" for="email-send">
                                            Email
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input value="number" class="input-text form-check-input border-0" type="radio" name="send-to" id="number-send" checked>
                                        <label class="form-check-label text-dark" for="number-send">
                                            Number
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <input id="btnSubmit" type="submit" hidden>
                                <button type="button" class="mt-2 btn-text rounded-0 m-0 p-2 container-fluid border-0 mb-2" onclick="submitForm()">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>




        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            // ENABLES TOOLTIP
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })

            window.onload = function(e) {
                $("body").show()
                if ($('#email').val().length > 0) {
                    ifExist()
                }
                phoneFormatter();
                if ($('#fn').val().length > 0) fn = validateText(e, 'fn', 1, 20)
                if ($('#mn').val().length > 0) mn = validateText(e, 'mn', 1, 20)
                if ($('#ln').val().length > 0) ln = validateText(e, 'ln', 1, 20)
                if ($('#street').val().length > 0) street = validateText(e, 'street', 1, 50)
                if ($('#contact').val().length > 0) validatePhone($('#contact'))
            }



            // PHONE INPUT FORMATTER
            function phoneFormatter() {
                var prevVal;
                var newVal;
                document.getElementById("contact").addEventListener("keydown", function() {
                    var element = $('#contact');
                    prevVal = element.val();
                })
                document.getElementById("contact").addEventListener("input", function(e) {
                    var element = $('#contact');
                    newVal = element.val()
                    if ((newVal.length - prevVal.length) == -1) {
                        if (prevVal.length == 10 || prevVal.length == 6) {
                            element.val(newVal.substr(0, newVal.length - 1))
                        }
                    } else if ((newVal.length - prevVal.length) != 1) {
                        element.val(prevVal)
                    } else if ((newVal.length - prevVal.length) == 1) {
                        if (prevVal.length < 13) {
                            if (isNaN(e.data) == true)
                                element.val(prevVal)
                            else {
                                if (prevVal.length == 4 || prevVal.length == 8)
                                    element.val(prevVal + '-' + e.data);
                            }
                        } else {
                            element.val(prevVal)
                        }
                    }

                    validatePhone(element);

                })
            }

            // VALIDATE PHONE NUMBER
            function validatePhone(element) {
                var regEx = /09[0-9]{2}-[0-9]{3}-[0-9]{4}/g;
                if (regEx.test($('#contact').val()) == false) {
                    $(element).attr('data-bs-original-title', '<b class="text-warning"><i class="fas fa-times-circle"> &nbsp input is in wrong format</i></b>').tooltip('show');
                    contact = false
                } else {
                    $(element).attr('data-bs-original-title', '<b class="text-success"><i class="fas fa-check"> &nbsp good to go</i></b>').tooltip('show');
                    contact = true
                }
            }

            // VALIDATE TEXT INPUTS
            function validateText(e, id, min, max) {
                var element = $('#' + id)
                var isValid;
                if (element.val().length == (min - 1)) {
                    $(element).attr('data-bs-original-title', '<b class="text-danger">Required</b>').tooltip('show');
                    isValid = false;
                } else if (element.val().length < max + 1 && element.val().length > min - 1) {
                    $(element).attr('data-bs-original-title', '<b class="text-success"><i class="fas fa-check"></i> &nbsp Good to go</b>').tooltip('show');
                    isValid = true;
                } else {
                    $(element).attr('data-bs-original-title', '<b class="text-warning"><i class="fas fa-times-circle"> &nbsp Must be between 0-21 characters</i></b>').tooltip('show');
                    isValid = false;
                }
                return isValid;
            }


            var fn = false
            var mn = false
            var ln = false
            var street = false
            var email = false
            var contact = false
            $('#fn').on('input', function(e) {
                fn = validateText(e, 'fn', 1, 20)
            });
            $('#mn').on('input', function(e) {
                mn = validateText(e, 'mn', 1, 20)
            });
            $('#ln').on('input', function(e) {
                ln = validateText(e, 'ln', 1, 20)
            });
            $('#street').on('input', function(e) {
                street = validateText(e, 'street', 1, 50)
            });

            // CHECK IF EMAIL IS ALREADY TAKEN
            function ifExist() {
                var iconTag = $('#toggleEmailTaken')
                var emailTag = $('#email')

                if (emailTag.val().length > 0) {
                    if (emailTag.val().includes("@") && emailTag.val().substring(emailTag.val().length - 10, emailTag.val().length) == '@gmail.com' && emailTag.val().indexOf('@') != 0) {
                        $.post("<?php echo site_url('api/email_exist'); ?>",
                            // DATA TO PASS
                            {
                                email: $('#email').val()
                            },
                            function(data, status, xhr) {
                                if (Object.keys(data).length > 0) {
                                    iconTag.attr('class', '')
                                    iconTag.closest('span').attr('hidden', false)
                                    iconTag.attr('class', 'fas fa-times text-danger fa-spin')
                                    iconTag.fadeOut(1)
                                    iconTag.fadeIn(100)
                                    setTimeout(function() {
                                        iconTag.removeClass('fa-spin')
                                    }, 100);
                                    emailTag.attr('data-bs-original-title', '<b class="text-danger"><i class="fas fa-times-circle"> &nbsp Email already taken</i></b>').tooltip('show');
                                } else {
                                    emailTag.tooltip('hide');
                                    iconTag.attr('class', '')
                                    iconTag.closest('span').attr('hidden', false)
                                    iconTag.attr('class', 'fas fa-check text-success fa-spin')
                                    iconTag.fadeOut(1)
                                    iconTag.fadeIn(100)
                                    setTimeout(function() {
                                        iconTag.removeClass('fa-spin')
                                    }, 100);
                                    emailTag.attr('data-bs-original-title', '<b class="text-success"><i class="fas fa-check"> &nbsp good to go</i></b>').tooltip('show');
                                }
                            }
                        )
                    } else if (emailTag.val().length > 0) {
                        emailTag.attr('data-bs-original-title', '<b class="text-danger"><i class="fas fa-times-circle"> &nbsp invalid email</i></b>').tooltip('show');
                        iconTag.attr('class', '')
                        iconTag.closest('span').attr('hidden', false)
                        iconTag.attr('class', 'fas fa-times text-danger fast-spin')
                        iconTag.fadeOut(1)
                        iconTag.fadeIn(100)
                        setTimeout(function() {
                            iconTag.removeClass('fast-spin')
                        }, 100);
                    } else {
                        iconTag.attr('class', '')
                        iconTag.closest('span').attr('hidden', false)
                        iconTag.attr('class', 'fas fa-times text-danger fast-spin')
                        iconTag.fadeOut(1)
                        iconTag.fadeIn(100)
                        setTimeout(function() {
                            iconTag.removeClass('fast-spin')
                        }, 100);
                    }
                } else {
                    emailTag.attr('data-bs-original-title', '<b class="text-warning"><i class="fas fa-times-circle"> &nbsp Required</i></b>').tooltip('show');
                    iconTag.addClass('fast-spin')
                    iconTag.fadeOut(100)
                    setTimeout(function() {
                        iconTag.removeClass('fast-spin')
                        iconTag.closest('span').attr('hidden', true)
                    }, 100);
                }
            }

            // CHECK IF FIELDS ARE VALID
            function submitForm() {
                if ($("#email").attr('data-bs-original-title') == '<b class="text-success"><i class="fas fa-check"> &nbsp good to go</i></b>') email = true
                else email = false

                if (email == false || fn == false || mn == false || ln == false || street == false || contact == false) {
                    if (email == false) $('#email').tooltip('show')
                    if (fn == false) $('#fn').tooltip('show')
                    if (mn == false) $('#mn').tooltip('show')
                    if (ln == false) $('#ln').tooltip('show')
                    if (street == false) $('#street').tooltip('show')
                    if (contact == false) $('#contact').tooltip('show')
                } else {
                    document.getElementById("btnSubmit").click();
                }
            }
        </script>
    </body>

</html>