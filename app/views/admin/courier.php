<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL . PUBLIC_DIR; ?>/css/admin/styles.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <title>Admin Marketer</title>
</head>

<body>
    <?php include 'nav-bar.php' ?>


    <div class="container-fluid mt-4">
        <div class="row p-3 py-3">
            <div class="bg-dark rounded mb-4">
                <h3 class="fw-bolder text-white mb-0 p-3 shadow-lg">Couriers' List</h3>
            </div>
            <?php
            foreach ($couriers as $courier) {
            ?>
                <div class="col-4 p-4">
                    <div class="shadow card border-0 bg-white my-2 mx-4">
                        <div class="row col m-0 p-0 bg-dark rounded-3">
                            <a onclick="sendData(this.id)" id="<?= $courier['admin_id']; ?>" href="#" data-bs-toggle="modal" data-bs-target="#updateCourier"><i class="fad fa-user-edit text-info text-end p-3"></i></a>
                        </div>
                        <div class="col-12 text-center p-4 ui-widget-shadow">
                            <img id="marketerImg<?= $courier['admin_id'] ?>" class="rounded-circle shadow" src="<?php echo BASE_URL . PUBLIC_DIR; ?>/images/courier/<?= $courier['admin_id']; ?>" alt="Marketer name" style="height: 2.2in; width: 2.2in; object-position: left; object-fit:cover;">
                            <div id="Mid<?= $courier['admin_id'] ?>" class="fs-3 fw-bolder text-dark pt-3"><?= $courier['admin_id']; ?></div>
                        </div>
                        <div class="col-12 py-3" style="box-shadow: inset 0px 1px 8px -7px black;">
                            <div class="d-flex justify-content-center">
                                <h3 id="fname<?= $courier['admin_id'] ?>"><?= $courier['admin_fname']; ?></h3>&nbsp
                                <h3 id="mname<?= $courier['admin_id'] ?>"><?= $courier['admin_mname']; ?></h3>&nbsp
                                <h3 id="lname<?= $courier['admin_id'] ?>"><?= $courier['admin_lname']; ?></h3>
                            </div>
                            <h5 id="username<?=$courier['admin_id']?>" class="text-center text-black-50 mb-4"><?= $courier['admin_username']; ?></h5>
                            <div class="row px-4 gy-3">
                                <div class="col-12"><b>Email:&nbsp</b><span id="email<?=$courier['admin_id']?>"><?= $courier['admin_email']; ?></span></div>
                                <div class="col-12"><b>Number:&nbsp</b><span id="contact<?= $courier['admin_id'] ?>"><?= substr_replace(substr_replace($courier['admin_cnum'], '-', 4, 0), '-', 8, 0) ?></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>











    <!-- ADD COURIER MODAL -->
    <div class="modal fade" id="addCourier" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form action="<?= site_url('Admin/add_courier') ?>" enctype="multipart/form-data" method="POST">
                    <div class="modal-body p-0">
                        <div class="text-white d-flex justify-content-between m-0 p-3 mb-4 bg-dark bg-gradient">
                            <div></div>
                            <h5 class="modal-title fw-bold" id="staticBackdropLabel">Add New Courier</h5>
                            <i class="fas fa-times-circle align-content-center" data-bs-dismiss="modal" aria-label="Close" style="font-size: 1.5rem; cursor:pointer"></i>
                        </div>
                        <div class="container-fluid p-4">
                            <div class="row">
                                <div class="col-12 text-center pb-5 ui-widget-shadow">
                                    <img class="rounded-circle shadow" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTI2iHiAT-ICPyezz_uJzuUWArjKnNDaruP-DbfLD0CWrT-oqjcpe2RfBLDl9DTRbFw9qQ&usqp=CAU" alt="Marketer name" style="height: 2.2in; width: 2.2in; object-position: left; object-fit:cover;">
                                </div>
                                <!-- FIRST NAME -->
                                <div class="form-floating col-4 mb-3">
                                    <input type="text" class="form-control" id="fname" name="fname" placeholder="enter first name..." required>
                                    <label class="ps-4" for="fname">First Name:</label>
                                </div>

                                <!-- MIDDLE NAME -->
                                <div class="form-floating col-4 mb-3">
                                    <input type="text" class="form-control" id="mname" name="mname" placeholder="enter middle name..." required>
                                    <label class="ps-4" for="mname">Middle Name:</label>
                                </div>

                                <!-- LAST NAME -->
                                <div class="form-floating col-4 mb-3">
                                    <input type="text" class="form-control" id="lname" name="lname" placeholder="enter last name..." required>
                                    <label class="ps-4" for="lname">Last Name:</label>
                                </div>

                                <!-- EMAIL -->
                                <div class="form-floating col-4 mb-3">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="enter last name..." required>
                                    <label class="ps-4" for="email">Email:</label>
                                </div>

                                <!-- USERNAME -->
                                <div class="form-floating col-4 mb-3">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="enter last name..." required>
                                    <label class="ps-4" for="username">Username:</label>
                                </div>

                                <!-- NUMBER -->
                                <div class="form-floating col-4 mb-3">
                                    <input type="text" class="form-control" id="contact" name="contact" placeholder="enter last name..." required>
                                    <label class="ps-4" for="contact">Number:</label>
                                </div>

                                <!-- PASSWORD -->
                                <div class="form-floating col-4 mb-3">
                                    <input type="password" class="form-control" id="pass" name="pass" placeholder="enter last name..." required>
                                    <label class="ps-4" for="pass">Enter password:</label>
                                </div>

                                <!-- RE ENTER PASSWORD -->
                                <div class="form-floating col-4 mb-3">
                                    <input type="password" class="form-control" id="rePass" name="rePass" placeholder="enter last name..." required>
                                    <label class="ps-4" for="rePass">Re-enter password:</label>
                                </div>

                                <!-- MARKETER IMAGE -->
                                <label for="productImg" class="pt-2 ps-3">Courier Image:</label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="courierImg" name="courierImg" required>
                                    <label class="input-group-text text-white bg-dark bg-gradient" for="courierImg">Upload</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input id="btnSubmit" type="submit" hidden>
                        <button type="button" onclick="AddSubmitForm()" class="btn btn-primary">&nbspAdd&nbsp</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- UPDATE COURIER MODAL -->
    <div class="modal fade" id="updateCourier" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form action="<?= site_url('Admin/update_courier') ?>" enctype="multipart/form-data" method="POST">
                <input type="text"  name="Uid" id="Uid" hidden>
                    <div class="modal-body p-0">
                        <div class="text-white d-flex justify-content-between m-0 p-3 mb-4 bg-dark bg-gradient">
                            <div></div>
                            <h5 class="modal-title fw-bold" id="staticBackdropLabel">Update Courier</h5>
                            <i class="fas fa-times-circle align-content-center" data-bs-dismiss="modal" aria-label="Close" style="font-size: 1.5rem; cursor:pointer"></i>
                        </div>
                        <div class="container-fluid p-4">
                            <div class="row">
                                <div class="col-12 text-center pb-5 ui-widget-shadow">
                                    <img id="Uimage" class="rounded-circle shadow" src="" alt="Marketer name" style="height: 2.2in; width: 2.2in; object-position: left; object-fit:cover;">
                                </div>
                                <!-- FIRST NAME -->
                                <div class="form-floating col-4 mb-3">
                                    <input type="text" class="form-control" id="Ufname" name="Ufname" placeholder="enter first name..." required>
                                    <label class="ps-4" for="Ufname">First Name:</label>
                                </div>

                                <!-- MIDDLE NAME -->
                                <div class="form-floating col-4 mb-3">
                                    <input type="text" class="form-control" id="Umname" name="Umname" placeholder="enter middle name..." required>
                                    <label class="ps-4" for="Umname">Middle Name:</label>
                                </div>

                                <!-- LAST NAME -->
                                <div class="form-floating col-4 mb-3">
                                    <input type="text" class="form-control" id="Ulname" name="Ulname" placeholder="enter last name..." required>
                                    <label class="ps-4" for="Ulname">Last Name:</label>
                                </div>

                                <!-- EMAIL -->
                                <div class="form-floating col-4 mb-3">
                                    <input type="email" class="form-control" id="Uemail" name="Uemail" placeholder="enter last name..." required>
                                    <label class="ps-4" for="Uemail">Email:</label>
                                </div>

                                <!-- USERNAME -->
                                <div class="form-floating col-4 mb-3">
                                    <input type="text" class="form-control" id="Uusername" name="Uusername" placeholder="enter last name..." required>
                                    <label class="ps-4" for="Uusername">Username:</label>
                                </div>

                                <!-- NUMBER -->
                                <div class="form-floating col-4 mb-3">
                                    <input type="text" class="form-control" id="Ucontact" name="Ucontact" placeholder="" required>
                                    <label class="ps-4" for="Ucontact">Number:</label>
                                </div>

                                <!-- MARKETER IMAGE -->
                                <label for="Uimage" class="pt-2 ps-3">Courier Image:</label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="Uimage" name="Uimage">
                                    <label class="input-group-text text-white bg-dark bg-gradient" for="Uimage">Upload</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="Submit" class="btn btn-primary">&nbsp Update &nbsp</button>
                    </div>
                </form>
            </div>
        </div>
    </div>








    <?php include 'footer.php' ?>








    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo BASE_URL . PUBLIC_DIR; ?>/js/admin/scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        window.onload = function(e) {
            $("body").show()

            phoneFormatter();
        }

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
            })






            var UprevVal;
            var UnewVal;
            document.getElementById("Ucontact").addEventListener("keydown", function() {

                var element = $('#Ucontact');
                UprevVal = element.val();
            })
            document.getElementById("Ucontact").addEventListener("input", function(e) {
                var element = $('#Ucontact');
                UnewVal = element.val()
                if ((UnewVal.length - UprevVal.length) == -1) {
                    if (UprevVal.length == 10 || UprevVal.length == 6) {
                        element.val(UnewVal.substr(0, UnewVal.length - 1))
                    }
                } else if ((UnewVal.length - UprevVal.length) != 1) {
                    element.val(UprevVal)
                } else if ((UnewVal.length - UprevVal.length) == 1) {
                    if (UprevVal.length < 13) {
                        if (isNaN(e.data) == true)
                            element.val(UprevVal)
                        else {
                            if (UprevVal.length == 4 || UprevVal.length == 8)
                                element.val(UprevVal + '-' + e.data);
                        }
                    } else {
                        element.val(UprevVal)
                    }
                }
            })


        }

        function AddSubmitForm() {
            var pass = document.getElementById('pass').value;
            var rePass = document.getElementById('rePass').value;

            if (pass.length < 8 || pass.length > 20) {
                alert('Password must be between 8 to 20 characters')
            } else if (pass != rePass) {
                alert('Password Did not match!')
            } else {
                document.getElementById("btnSubmit").click();
            }
        }

        // SEND RECORD DATA TO UPDATE MODAL
        function sendData($id) {
            document.getElementById('Uid').value = $id;
            $('#Uimage').attr('src',$('#marketerImg'+$id).attr('src'));
            $('#Ufname').val($('#fname'+$id).html())
            $('#Umname').val($('#mname'+$id).html())
            $('#Ulname').val($('#lname'+$id).html())
            $('#Uemail').val($('#email'+$id).html())
            $('#Uusername').val($('#username'+$id).html())
            $('#Ucontact').val($('#contact'+$id).html())
        }
    </script>
</body>

</html>