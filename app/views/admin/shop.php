<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="<?php echo BASE_URL . PUBLIC_DIR; ?>/css/admin/styles.css">
    <title>Admin Products</title>
</head>

<body class="bg-white">
    <?php include 'nav-bar.php' ?>


    <div class="container-fluid px-4 mt-4">

        <div class="row m-0 p-0 shadow">
            <div class="col-12 bg-dark bg-gradient d-flex justify-content-between mb-5 px-3">
                <h3 class="m-3 ms-0 fw-bolder text-white">Shop List</h3>
                <form action="<?= site_url("Admin/Product/") ?>" class="m-3 me-0" method="POST">
                    <div class="d-flex justify-content-between">
                        <div class="me-2">
                            <div>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="search" placeholder="Search" name="search" value="">
                                    <button class="input-group-text border-1 bg-dark border-white"><i class="fad fa-search text-info"></i></button>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="input-group">
                                <select class="form-select rounded-1 border-0 bg-white text-black border-top border-bottom border-end" name="listNum" id="listNum">
                                    <?php $val = trim($filter['records']); ?>
                                    <option value="5" <?php if ($val == 5) echo 'selected' ?>>5</option>
                                    <option value="10" <?php if ($val == 10) echo 'selected' ?>>10</option>
                                    <option value="15" <?php if ($val == 15) echo 'selected' ?>>15</option>
                                    <option value="25" <?php if ($val == 25) echo 'selected' ?>>25</option>
                                    <option value="50" <?php if ($val == 50) echo 'selected' ?>>50</option>
                                    <option value="All" <?php if ($val == 'All') echo 'selected' ?>>All</option>
                                </select>
                                <label for="listNum" class="input-group-text border-0 bg-dark border-start border-top border-bottom">
                                    <i class="fas fa-list-ol text-info"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <?php foreach ($data['shop'] as $shop) { ?>
                <div class="col-6">
                    <div class="row rounded-3 shadow m-4 p-0 bg-dark">
                        <div class="col-auto border-0 pt-4">
                            <div class="pt-3 text-center text-white justify-content-center px-4">
                                <div class="mb-4"> <img class="imgshop rounded-circle" src="<?= BASE_URL . PUBLIC_DIR ?>/images/shop/<?php echo $shop['image_link']; ?>" alt="User-Profile-Image"> </div>
                                <h3 class="fw-bold"><?= $shop['shop_id'] ?></h3>
                                <p id="shop_name<?= $shop['shop_id'] ?>"><?= $shop['shop_name'] ?></p>
                            </div>
                        </div>
                        <div class="col p-0 bg-white">
                            <div class="row m-0 p-0">
                                <div class="col-12 mb-2 text-white p-2 bg-dark">
                                    <div class="d-flex justify-content-between">
                                        <span class="h5 fw-bolder m-0 d-flex align-content-center"> Shop Information</span>
                                        <div class="d-flex justify-content-end m-0 p-0">
                                            <a class="text-primary" style="text-decoration:none; cursor: pointer;" href="#" onclick="openUpdateModal(this.id)" id=<?= $shop['shop_id']; ?>>
                                                <i class="fa fa-edit text-info"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 pb-3">
                                    <p class="mb-2 pt-2 fw-bold">Description</p>
                                    <h6 class="text-muted fw-normal" id="desc<?= $shop['shop_id'] ?>"><?= $shop['shop_description'] ?></h6>
                                </div>
                                <div class="col-12 mb-2 text-white bg-dark p-2">
                                    <div class="d-flex justify-content-between">
                                        <span class="h5 fw-bolder m-0 d-flex align-content-center">Owner Information</span>
                                        <div class="d-flex justify-content-end m-0 p-0">
                                            <a class="font-weight-light p-0 text-primary" style="text-decoration:none; cursor: pointer;" href="#" onclick="OwnerUpdateModal(this.id)" id=<?= $shop['owner_id']; ?>>
                                                <i class="fa fa-edit text-info"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p class="mb-2 pt-2  fw-bold">Name</p>
                                        <h6 class="text-muted fw-normal"> <span id="fname<?= $shop['owner_id'] ?>"><?= $shop['owner_fname'] ?></span> <span id="mname<?= $shop['owner_id'] ?>"><?= $shop['owner_mname'] ?></span> <span id="lname<?= $shop['owner_id'] ?>"><?= $shop['owner_lname'] ?></span></h6>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-2 fw-bold">Phone</p>
                                        <h6 class="text-muted fw-noraml" id="num<?= $shop['owner_id'] ?>"><?= $shop['owner_cnum'] ?></h6>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-2 fw-bold">Email</p>
                                        <h6 class="text-muted fw-noraml" id="email<?= $shop['owner_id'] ?>"><?= $shop['owner_email'] ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <a onmouseout="moreInfoMouseLeave(this)" onmouseover="moreInfoMouseOver(this)" href="<?= BASE_URL . 'Admin/Shop_Product_List/' . $shop['shop_id'] ?>" class="moreInfo text-white-50 row d-flex justify-content-between text-decoration-none">
                                <div class="col-4"></div>
                                <div class="fw-bold col-4 py-2 text-center">
                                    Show products...
                                </div>
                                <div class="col-4 text-end d-flex align-items-center justify-content-end">
                                    <i class="fw-bold fs-5 fas fa-chevron-circle-right text-info"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>



    <!-- --------------------------------MODAL UPDATE STALL----------------------------------- -->
    <div class="modal fade modalEdit" id="modalEdit" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="post" action="<?= site_url('Admin/Update_stall') ?>" enctype="multipart/form-data">
                    <div class="modal-body p-0">
                        <div class="text-white d-flex justify-content-between m-0 p-3 mb-4 bg-dark bg-gradient">
                            <div></div>
                            <h5 class="modal-title fw-bold">Update Shop</h5>
                            <i class="fas fa-times-circle align-content-center" data-bs-dismiss="modal" aria-label="Close" style="font-size: 1.5rem; cursor:pointer"></i>
                        </div>
                        <div class="container-fluid p-4 bg-white">
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="id">Stall Id:</label>
                                    <input type="text" class="form-control" name="id" id="mid" placeholder="Stall Name" readonly>
                                </div>
                                <div class="mb-3 col-12">
                                    <label for="name">Stall Name:</label>
                                    <input type="text" class="form-control" name="name" id="mshopname" placeholder="Stall Name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <label for="desc">Description:</label>
                                    <textarea class="form-control" name="desc" id="mshopdesc" aria-label="With textarea"></textarea>
                                </div>
                                <div class="mb-3 col-12">
                                    <label for="fileToUpload">Photo:</label>
                                    <input type="file" class="form-control" name="stallImg" id="fileToUpload">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" value="Save" class="btn btn-primary" required>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- --------------------------------MODAL UPDATE STALL END----------------------------------- -->
    <!-- --------------------------------MODAL UPDATE OWNER----------------------------------- -->
    <div class="modal fade modalEdit" id="modalEditOwner" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="post" action="<?= site_url('Admin/Update_owner') ?>" enctype="multipart/form-data">
                    <div class="modal-body p-0">
                        <div class="text-white d-flex justify-content-between m-0 p-3 mb-4 bg-dark bg-gradient">
                            <div></div>
                            <h5 class="modal-title fw-bold">Update Owner</h5>
                            <i class="fas fa-times-circle align-content-center" data-bs-dismiss="modal" aria-label="Close" style="font-size: 1.5rem; cursor:pointer"></i>
                        </div>
                        <div class="container-fluid p-4 bg-white">
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="id">Owner Id:</label>
                                    <input type="text" class="form-control" name="id" id="moid" readonly>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="name">Firstname:</label>
                                    <input type="text" class="form-control" name="fname" id="mfname" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="name">Middle Name:</label>
                                    <input type="text" class="form-control" name="mname" id="mmname" readonly>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="name">Lastname:</label>
                                    <input type="text" class="form-control" name="lname" id="mlname" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-4">
                                    <label for="name">Phone:</label>
                                    <input type="text" maxlength="11" class="form-control" name="num" id="mmphone">
                                </div>
                                <div class="mb-3 col-8">
                                    <label for="name">Email:</label>
                                    <input type="email" class="form-control" name="email" id="memail">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" value="Save" class="btn btn-primary" required>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- --------------------------------MODAL UPDATE OWNER END----------------------------------- -->
    <!-- --------------------------------MODAL ADD OWNER----------------------------------- -->
    <div class="modal fade modalEdit" id="modalAddOwner" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="post" action="<?= site_url('Admin/Add_owner') ?>" enctype="multipart/form-data">
                    <div class="modal-body p-0">
                        <div class="text-white d-flex justify-content-between m-0 p-3 mb-4 bg-dark bg-gradient">
                            <div></div>
                            <h5 class="modal-title fw-bold">Add Owner</h5>
                            <i class="fas fa-times-circle align-content-center" data-bs-dismiss="modal" aria-label="Close" style="font-size: 1.5rem; cursor:pointer"></i>
                        </div>
                        <div class="container-fluid p-4 bg-white">
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="name">Firstname:<span class="text-danger"><small id="fn">*</small></span></label>
                                    <input type="text" class="form-control" name="fname" id="fname">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="name">Middle Name:<span class="text-danger"><small id="fn">*</small></span></label>
                                    <input type="text" class="form-control" name="mname" id="mname">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="name">Lastname:<span class="text-danger"><small id="fn">*</small></span></label>
                                    <input type="text" class="form-control " name="lname" id="lname">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="name">Phone:<span class="text-danger"><small id="fn">*</small></span></label>
                                    <input type="text" maxlength="13" class="form-control" name="num" id="mphone">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <label for="name">Email:<span class="text-danger"><small id="fn">*</small></span></label>
                                    <input type="email" class="form-control" name="email" id="oemail">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" value="" class="btn btn-primary" hidden>
                            <input type="submit" value="Save" class="btn btn-primary" required>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- --------------------------------MODAL ADD OWNER END----------------------------------- -->
    <!-- --------------------------------MODAL ADD STALL----------------------------------- -->
    <div class="modal fade modalEdit" id="modalAdd" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="post" action="<?= site_url('Admin/Add_stall') ?>" enctype="multipart/form-data">
                    <div class="modal-body p-0">
                        <div class="text-white d-flex justify-content-between m-0 p-3 mb-4 bg-dark bg-gradient">
                            <div></div>
                            <h5 class="modal-title fw-bold">Add Shop</h5>
                            <i class="fas fa-times-circle align-content-center" data-bs-dismiss="modal" aria-label="Close" style="font-size: 1.5rem; cursor:pointer"></i>
                        </div>
                        <div class="container-fluid p-4 bg-white">
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <label for="name">Stall Name:</label>
                                    <input type="text" class="form-control" name="name" id="mshopname" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <label for="desc">Description:</label>
                                    <textarea class="form-control" name="desc" id="mshopdesc" aria-label="With textarea" required></textarea>
                                </div>
                                <div class="mb-3 col-12">
                                    <label for="fileToUpload">Photo:</label>
                                    <input type="file" class="form-control" name="stallImg" id="fileToUpload">
                                </div>
                            </div>
                            <label for="owner">Owner:</label>
                            <div class="input-group mb-3">
                                <select class="form-select" id="owner" name="owner" required>
                                    <option selected>Select owner</option>
                                    <?php foreach ($data['owner'] as $owner) { ?>
                                        <option value="<?= $owner['owner_id'] ?>"><?= $owner['owner_lname'] ?>,
                                            <?= $owner['owner_fname'] ?> <?= $owner['owner_mname'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" value="Save" class="btn btn-primary" required>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- --------------------------------MODAL ADD STALL END----------------------------------- -->


    <?php include 'footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo BASE_URL . PUBLIC_DIR; ?>/js/admin/scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>
        // OPEN SHOP UPDATE MODAL
        function openUpdateModal($id) {
            $("#modalEdit").modal('show');
            $('#mid').val(document.getElementById($id).id);
            $('#mshopname').val(document.getElementById("shop_name" + $id).innerHTML);
            $('#mshopdesc').val(document.getElementById("desc" + $id).innerHTML);
        };

        //  OPEN OWNER UPDATE MODAL
        function OwnerUpdateModal($id) {
            $("#modalEditOwner").modal('toggle');
            $('#moid').val($id);
            $('#mfname').val(document.getElementById("fname" + $id).innerHTML);
            $('#mmname').val(document.getElementById("mname" + $id).innerHTML);
            $('#mlname').val(document.getElementById("lname" + $id).innerHTML);
            $('#mmphone').val(document.getElementById("num" + $id).innerHTML);
            $('#memail').val(document.getElementById("email" + $id).innerHTML);
        };

        // CHANGE MORE INFO CLASS ON HOVER
        function moreInfoMouseOver($element) {
            $($element).removeClass('text-white-50 bg-dark')
            $($element).addClass('bg-light bg-gradient text-dark rounded-bottom border-bottom border-3 border-info')
        }

        // CAHNGE MORE INFO CLASS ON MOUSELEAVE
        function moreInfoMouseLeave($element) {
            $($element).removeClass('bg-light bg-gradient text-dark rounded-bottom border-bottom border-info')
            $($element).addClass('text-white-50 bg-none')
        }
    </script>
</body>

</html>