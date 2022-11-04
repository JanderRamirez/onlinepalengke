<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL . PUBLIC_DIR; ?>/css/admin/styles.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.4.0/css/select.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.4.0/css/select.bootstrap5.min.css">

    <title>Admin Dashboard</title>
</head>

<body>
    <?php include 'nav-bar.php' ?>
    <div class="container">
        <div class="mt-5 shadow-lg">
            <div class="bg-dark p-3 rounded-top pt-4 row m-0">
                <div class="col-auto">
                    <img class="imgshop rounded-circle" src="<?= BASE_URL . PUBLIC_DIR ?>/images/shop/<?php echo $shop['image_link']; ?>" alt="User-Profile-Image">
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col-12 ms-4 h2 text-white"> <?= $shop['shop_name'] ?></div>
                        <div class="col-12 text-white-50 fs-5 ms-4">
                            <span><?= ucwords($owner['owner_fname'] . ' ' . $owner['owner_mname'] . ' ' .  $owner['owner_lname']) ?></span>
                            <span class="ps-5">Contact:</span><span class="fs-6 fst-italic">&nbsp&nbsp <?= substr_replace(substr_replace($owner['owner_cnum'], '-', 4, 0), '-', 8, 0) ?></span>
                            <span class="ps-5">Email:</span><span class="fs-6 fst-italic">&nbsp&nbsp<?= $owner['owner_email'] ?></span>
                        </div>
                        <div class="col-12 text-white-50 fs-5 ms-4 mt-4 px-3">
                            <span class="ps-4"></span><?= $shop['shop_description'] ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-0 p-0 text-center fs-2 fw-bold py-3 text-light" style="background-color: darkcyan;"> Update Shop Products List </div>
            <div class="p-3">
                <form name="frm" id="frm" action="<?= site_url('Admin/Update_Shop_Product') ?>" method="POST">
                    <input name="shopId" id="shopId" type="text" value="<?= $data['id'] ?>" hidden>
                    <table id="productsTable" class="table table-bordered border-secondary align-middle table-hover py-3">
                        <thead class="">
                            <tr class="text-white" style="background-color: darkcyan">
                                <th>Selling</th>
                                <th>Product ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Unit</th>
                                <th>Category</th>
                                <th>Product Description</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <?php
                            $unitVal = '';
                            $mainCatVal = '';
                            ?>
                            <?php foreach ($data['products'] as $product) { ?>
                                <?php

                                // GET PRODUCT UNIT VALUE
                                foreach ($data['units'] as $unit) {
                                    ($product['prod_unit'] == $unit['unit_id']) ? $unitVal = $unit['unit'] : "";
                                }

                                // GET PRODUCT MAIN CATEGORY VALUE
                                foreach ($data['mainCats'] as $mainCat) {
                                    ($product['cat_id'] == $mainCat['cat_id']) ? $mainCatVal = $mainCat['category'] : "";
                                }

                                //  GET PRODUCT SUB CATEGORY VALUE IF NOT NULL
                                if ($product['sub_id'] != null) {
                                    foreach ($data['subCats'] as $subCat) {
                                        ($product['sub_id'] == $subCat['sub_id']) ? $mainCatVal .= '/' . $subCat['sub_category'] : "";
                                    }
                                }

                                // CHECK IF PRODUCT IS ALREADY IN THE LIST OF SHOP PRODUCTS AND CHECK CHECKBOX BY DEFAULT
                                $isChecked = '';
                                foreach ($shopProducts as $shopProduct) {
                                    if ($shopProduct['prod_id'] == $product['prod_id'])
                                        $isChecked = 'checked';
                                }
                                ?>
                                <tr>
                                    <td>
                                        <span class="d-flex justify-content-center">
                                            <input class="form-check-input" type="checkbox" value="<?= $product['prod_id'] ?>" name="<?= $product['prod_id'] ?>" <?= $isChecked ?>>
                                        </span>
                                    </td>
                                    <td><?= $product['prod_id'] ?></td>
                                    <td><?= $product['prod_name'] ?></td>
                                    <td>Sea Food</td>
                                    <td><?= ucwords($unitVal) ?></td>
                                    <td><?= ucwords($mainCatVal) ?></td>
                                    <td><?= $product['prod_description'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="text-center row p-3">
                        <input type="submit" class="btn btn-primary py-3 rounded-0 fs-5" style="background-color: darkcyan !important;" value="Update Shop Product List">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include 'footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo BASE_URL . PUBLIC_DIR; ?>/js/admin/scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.4.0/js/dataTables.select.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#productsTable').DataTable({
                select: false,
                aLengthMenu: [
                    [10, 15, 30, 50, -1],
                    [10, 15, 30, 50, "All"]
                ],
            });

            $('#frm').on('submit', function(e) {

                var table = $('#productsTable').DataTable();
                var form = $('#frm');

                // Encode a set of form elements from all pages as an array of names and values
                var params = table.$('input').serializeArray();

                // Iterate over all form elements
                $.each(params, function() {
                    // If element doesn't exist in DOM
                    if (!$.contains(document, form[this.name])) {
                        // Create a hidden element 
                        $(form).append(
                            $('<input>')
                            .attr('type', 'hidden')
                            .attr('name', this.name)
                            .val(this.value)
                        );
                    }
                });
            });
        });
    </script>
</body>

</html>