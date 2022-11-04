<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL . PUBLIC_DIR; ?>/css/admin/styles.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <title>Admin Products</title>
    <style>
        .set-bg {
            background-repeat: no-repeat;
            background-size: cover;
            background-position: top center;
            border-top-right-radius: 8px;
            border-top-left-radius: 8px;
        }
    </style>
</head>

<body class="bg-white">
    <?php include 'nav-bar.php' ?>
    <?php
    foreach ($products['products'] as $product) {

        // CONVERT ID TO CATEGORY VALUE
        $category = "";
        $id = "";
        foreach ($data['categories'] as $mainCat) {
            if ($product['cat_id'] == $mainCat['cat_id']) {
                $category .= $mainCat['category'];
                $id .= $mainCat['cat_id'];
                break;
            }
        }
        if ($product['sub_id'] != null) {
            foreach ($data['categories'] as $subCat) {
                if ($product['sub_id'] == $subCat['sub_id']) {
                    $category .= '/' . $subCat['sub_category'];
                    $id .= '-' . $subCat['sub_id'];
                }
            }
        }
    }
    ?>
    <div class="container-fluid px-4 mt-4">
        <div class="row mx-1 shadow">
            <div class="col-12 bg-dark bg-gradient d-flex justify-content-between mb-5 p-3">
                <h3 class="ms-0 fw-bolder text-white mb-0">Products</h3>
                <form class="d-flex justify-content-between" method="POST" action="<?= site_url('Admin/Product') ?>">
                    <div class="me-2">
                        <div>
                            <div class="input-group">
                                <input type="text" class="form-control" id="search" placeholder="Search" name="search" value="<?= $filter['search'] ?>">
                                <button id="submitFilter" type="submit" class="input-group-text border-1 bg-dark border-white">
                                    <i class="fad fa-search text-info"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div>

                    </div>
                </form>
            </div>

            <?php
            foreach ($products['products'] as $product) {

                // CONVERT ID TO CATEGORY VALUE
                $category = "";
                $id = "";
                foreach ($data['categories'] as $mainCat) {
                    if ($product['cat_id'] == $mainCat['cat_id']) {
                        $category .= $mainCat['category'];
                        $id .= $mainCat['cat_id'];
                        break;
                    }
                }
                if ($product['sub_id'] != null) {
                    foreach ($data['categories'] as $subCat) {
                        if ($product['sub_id'] == $subCat['sub_id']) {
                            $category .= '/' . $subCat['sub_category'];
                            $id .= '-' . $subCat['sub_id'];
                        }
                    }
                }
                // CONVERT ID TO UNIT VALUE
                $unit = "";
                foreach ($units as $uni) {
                    if ($uni['unit_id'] == $product['prod_unit'])
                        $unit = $uni['unit'];
                }
            ?>
                <div class="col-6 my-4">
                    <div class="row mx-1 shadow-sm">
                        <div onclick="maxImg('img' + <?= $product['prod_id'] ?>, '<?= $product['prod_name'] ?>')" class="col-4 p-0" style="cursor: pointer">
                            <img onmouseover="increaseSize(this.id)" id="img<?= $product['prod_id'] ?>" class="rounded-2 set-bg" src="<?= BASE_URL . $product['image_link'] ?>" alt="<?= $product['prod_name'] ?>" style="width: 280px;height: 240px; object-position: left; object-fit: cover;">
                        </div>
                        <div class="col rounded-end-2" style="background-color: white">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-between <?php if ($product['archive'] == 0) echo "bg-dark";
                                                                                    else echo "bg-danger bg-gradient"; ?>">
                                    <!-- PRODUCT NAME -->
                                    <p id="name<?= $product['prod_id'] ?>" class="pt-2 ps-1 fw-bold h4 text-white">
                                        <?= $product['prod_name'] ?></p>
                                    <div class="pt-2 ps-3">



                                        <a id="archive_<?= $product['prod_id'] ?>" class="pt-2 ps-3 <?php if ($product['archive'] == 0) echo "text-danger";
                                                                                                    else echo "text-dark"; ?>" style="text-decoration:none; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#archiveProduct" onclick="sendId(this.id, <?= $product['archive'] ?>)">
                                            <i class="fas fa-archive"></i>
                                        </a>


                                        <a id="<?= $product['prod_id'] ?>" class="pt-2 ps-3 text-primary" style="text-decoration:none; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#updateProduct" onclick="sendData(this.id)">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </div>
                                </div>
                                <hr class="mb-1">
                                <div class="col-12 pt-2">
                                    <div class="row p-0 m-0">
                                        <p class="col-6 fw-bolder ps-2 h6">
                                            Price:
                                            <!-- PRODUCT PRICE -->
                                            <span id="price<?= $product['prod_id'] ?>" class="text-secondary fw-normal"><?= $product['prod_price'] ?></span>
                                            <span class="text-secondary fw-normal">php</span>
                                        </p>
                                        <p class="col-6 p-0 m-0 fw-bolder">
                                            Category:
                                            <!-- PRODUCT CATEGORY -->
                                            <input id="category<?= $product['prod_id'] ?>" value="<?= $id ?>" type="text" hidden>
                                            <span class="text-secondary fw-normal"><?= $category ?></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-12 pt-2">
                                    <p class="ps-2 fw-bolder h6">
                                        Stock Unit:
                                        <!-- PRODUCT UNIT -->
                                        <input id="unit<?= $product['prod_id'] ?>" type="text" value="<?= $product['prod_unit'] ?>" hidden>
                                        <span class="text-secondary fw-normal"><?= $unit ?></span>
                                    </p>
                                </div>
                                <div class="col-12 pt-2">
                                    <p class="ps-2 fw-bolder h6">Description:</p>
                                    <!-- PRODUCT DESCRIPTION -->
                                    <div id="description<?= $product['prod_id'] ?>" class="ps-2 text-secondary fw-normal">
                                        <?= $product['prod_description'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="d-flex justify-content-end p-3 bg-dark bg-gradient">
                <?= $products["pagination"] ?>
            </div>
        </div>
    </div>

    <!-- ADD PRODUCT MODAL -->
    <div class="modal fade" id="addProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="<?= site_url('Admin/Add_Product') ?>" enctype="multipart/form-data" method="POST">
                    <div class="modal-body p-0">
                        <div class="text-white d-flex justify-content-between m-0 p-3 mb-4 bg-dark bg-gradient">
                            <div></div>
                            <h5 class="modal-title fw-bold" id="staticBackdropLabel">Add New Product</h5>
                            <i class="fas fa-times-circle align-content-center" data-bs-dismiss="modal" aria-label="Close" style="font-size: 1.5rem; cursor:pointer"></i>
                        </div>
                        <div class="container-fluid p-4">
                            <div class="row">
                                <!-- PRODUCT NAME -->
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="productName" name="productName" placeholder="name@example.com" required>
                                    <label class="ps-4" for="productName">Product Name:</label>
                                </div>
                                <!-- PRODUCT CATEGORY -->
                                <div class="form-floating col-8">
                                    <select class="form-select" id="category" name="category" aria-label="Floating label select example" required>
                                        <?php
                                        $printedCategory = [];
                                        foreach ($data['categories'] as $category) {
                                            if ($category['sub_id'] == null) { ?>
                                                <option value="<?= $category['cat_id'] ?>"><?= $category['category'] ?></option>
                                        <?php } else {
                                                if (in_array($category['cat_id'], $printedCategory) == 0) {
                                                    echo '<optgroup label="' . $category['category'] . '">';
                                                    foreach ($data['categories'] as $innerCat) {
                                                        if ($innerCat['sub_id'] != null) {
                                                            echo '<option value="' . $category['cat_id'] . '-' . $innerCat['sub_id'] . '">' . $innerCat['sub_category'] . '</option>';
                                                        }
                                                    }
                                                    echo '</optgroup>';
                                                    array_push($printedCategory, $category['cat_id']);
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                    <label class="ps-4" for="category">Category:</label>
                                </div>
                                <!-- PRODUCT UNIT -->
                                <div class="form-floating col-4">
                                    <select class="form-select" id="unit" name="unit" aria-label="Floating label select example" required>
                                        <?php foreach ($units as $unit) { ?>
                                            <option value="<?= $unit['unit_id'] ?>"><?= $unit['unit'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <label class="ps-4" for="category">Unit:</label>
                                </div>
                                <!-- PRODUCT PRICE -->
                                <label for="productPrice" class="pt-2 ps-3">Product Price:</label>
                                <div class="row col-8 pe-0">
                                    <div class="input-group pe-0">
                                        <input name="productPrice" id="productPrice" type="number" class="form-control" step=".01">
                                        <span class="input-group-text text-white  bg-dark bg-gradient">Php</span>
                                    </div>
                                </div>
                                <!-- PRODUCT IMAGE -->
                                <label for="productImg" class="pt-2 ps-3">Product Image:</label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="productImg" name="productImg" required>
                                    <label class="input-group-text text-white bg-dark bg-gradient" for="productImg">Upload</label>
                                </div>
                                <!-- PRODUCT DESCRIPTION -->
                                <div class="mb-3 mt-4 col-12">
                                    <label for="description">Product Description:</label>
                                    <textarea class="form-control" name="description" id="description" cols="30" rows="5" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">&nbspAdd&nbsp</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- UPDATE PRODUCT MODAL -->
    <div class="modal fade" id="updateProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="<?= site_url('Admin/Update_Product/') ?>" enctype="multipart/form-data" method="POST">
                    <input id="U_id" name="U_id" type="text" value="" hidden>
                    <div class="modal-body p-0">
                        <div class="text-white d-flex justify-content-between m-0 p-3 mb-4 bg-dark">
                            <div></div>
                            <h5 class="modal-title fw-bold">Update Product</h5>
                            <i class="fas fa-times-circle align-content-center" data-bs-dismiss="modal" aria-label="Close" style="font-size: 1.5rem; cursor:pointer"></i>
                        </div>
                        <div class="container-fluid p-4">
                            <div class="row">
                                <!-- PRODUCT NAME -->
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="U_productName" name="U_productName" required>
                                    <label class="ps-4" for="U_productName">Product Name:</label>
                                </div>
                                <!-- PRODUCT CATEGORY -->
                                <div class="form-floating col-8">
                                    <select class="form-select" id="U_category" name="U_category" aria-label="Floating label select example" required>
                                        <?php
                                        $printedCategory = [];
                                        foreach ($data['categories'] as $category) {
                                            if ($category['sub_id'] == null) { ?>
                                                <option value="<?= $category['cat_id'] ?>"><?= $category['category'] ?></option>
                                        <?php } else {
                                                if (in_array($category['cat_id'], $printedCategory) == 0) {
                                                    echo '<optgroup label="' . $category['category'] . '">';
                                                    foreach ($data['categories'] as $innerCat) {
                                                        if ($innerCat['sub_id'] != null) {
                                                            echo '<option value="' . $category['cat_id'] . '-' . $innerCat['sub_id'] . '">' . $innerCat['sub_category'] . '</option>';
                                                        }
                                                    }
                                                    echo '</optgroup>';
                                                    array_push($printedCategory, $category['cat_id']);
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                    <label class="ps-4" for="U_category">Category:</label>
                                </div>
                                <!-- PRODUCT UNIT -->
                                <div class="form-floating col-4">
                                    <select class="form-select" id="U_unit" name="U_unit" aria-label="Floating label select example" required>
                                        <?php foreach ($units as $unit) { ?>
                                            <option value="<?= $unit['unit_id'] ?>"><?= $unit['unit'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <label class="ps-4" for="U_nit">Unit:</label>
                                </div>
                                <!-- PRODUCT PRICE -->
                                <label for="U_productPrice" class="pt-2 ps-3">Product Price:</label>
                                <div class="row col-8 pe-0">
                                    <div class="input-group pe-0">
                                        <input name="U_productPrice" id="U_productPrice" type="number" class="form-control" step=".01">
                                        <span class="input-group-text text-white  bg-dark bg-gradient">Php</span>
                                    </div>
                                </div>
                                <!-- PRODUCT IMAGE -->
                                <label for="U_productImg" class="pt-2 ps-3">Product Image:</label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="U_productImg" name="U_productImg">
                                    <label class="input-group-text text-white  bg-dark bg-gradient" for="U_productImg">Upload</label>
                                </div>
                                <!-- PRODUCT DESCRIPTION -->
                                <div class="mb-3 mt-4 col-12">
                                    <label for="U_description">Product Description:</label>
                                    <textarea class="form-control" name="U_description" id="U_description" cols="30" rows="5" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">&nbspUpdate&nbsp</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- ARCHIVING MODAL -->
    <div class="modal fade" id="archiveProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="<?= site_url('Admin/updateArchive/') ?>" method="POST">
                    <input id="A_id" name="A_id" type="text" hidden>
                    <input id="A_isArchive" name="A_isArchive" type="text" hidden>
                    <div class="modal-body p-0">
                        <div class="text-white d-flex justify-content-between m-0 p-3 mb-4 bg-danger">
                            <div></div>
                            <h5 id="modalHeader" class="modal-title fw-bold">Archive Product</h5>
                            <i class="fas fa-times-circle align-content-center" data-bs-dismiss="modal" aria-label="Close" style="font-size: 1.5rem; cursor:pointer"></i>
                        </div>
                        <div id="modalBody" class="p-3 mb-3"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button id="modalBtn" type="submit" class="btn btn-primary bg-danger border-0">Archive</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- IMG MODAL -->
    <div class="modal fade" id="fullImage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen modal-dialog-centered">
            <div class="modal-content bg-black bg-opacity-50">
                <div class="modal-header bg-dark p-0 pe-3">
                    <h5 class="modal-title text-white ms-3 p-3" id="maxImgTitle"></h5>
                    <button type="button" class="btn-close text-white p-3 bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-black bg-opacity-25 d-flex align-content-center justify-content-center">
                    <img id="fullImageTag" src="" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?php echo BASE_URL . PUBLIC_DIR; ?>/js/admin/scripts.js"></script>
    <script>
        var newNotification = "<?= site_url('api/newNotif'); ?>";
    </script>
    <script>
        // SEND RECORD DATA TO UPDATE MODAL
        function sendData($id) {
            console.log($id)
            document.getElementById('U_id').value = $id
            document.getElementById('U_productName').value = document.getElementById('name' + $id).innerHTML.trim()
            // document.getElementById('U_category').value = document.getElementById('category' + $id).value;

            $('#U_category option[value="' + document.getElementById('category' + $id).value + '"]').prop('selected', true);

            console.log(document.getElementById('category' + $id).value)
            document.getElementById('U_unit').value = document.getElementById('unit' + $id).value;
            document.getElementById('U_productPrice').value = document.getElementById('price' + $id).innerHTML;
            document.getElementById('U_description').value = document.getElementById('description' + $id).innerHTML.trim();
        }

        // SEND ID TO ARCHIVE MODAL
        function sendId($id, $isArchive = null) {
            document.getElementById('A_id').value = $id.substring($id.indexOf("_") + 1)
            document.getElementById('A_isArchive').value = $isArchive
            if ($isArchive == 0 || $isArchive == null) {
                document.getElementById('modalHeader').innerHTML = "Archive Product"
                document.getElementById('modalBody').innerHTML =
                    "<b class='text-danger'>Warning!</b> Archiving a product prevents it from selling to the customers. The product will not be visible to the customer website!"
                document.getElementById('modalBtn').innerHTML = "Archive"
            } else {
                document.getElementById('modalHeader').innerHTML = "Unarchive Product"
                document.getElementById('modalBody').innerHTML =
                    "<b class='text-danger'>Warning!</b> Unarchiving re-enables this product for selling. The product will be visible again to the customer website!"
                document.getElementById('modalBtn').innerHTML = "Unarchive"
            }
        }

        // SUBMIT BUTTON ON LIST ROW NUMBER CHANGE
        function changeList() {
            document.getElementById('submitFilter').click();
        }

        // SHOW MODAL FOR BIGGER IMG
        function maxImg($id, $name) {
            $('#fullImage').modal('show');
            document.getElementById('maxImgTitle').innerHTML = $name
            document.getElementById('fullImageTag').src = document.getElementById($id).src
        }

        function increaseSize($id) {
            $('#' + $id).hover(makeBigger, returnToOriginalSize);
            $height = $("div").height()
            $width = $("div").width()

            function makeBigger() {
                $(this).css({
                    height: '+ 10%',
                    width: '+ 10%'
                });
            }

            function returnToOriginalSize() {

            }
        }
    </script>
</body>

</html>