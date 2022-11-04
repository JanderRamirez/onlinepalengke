<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL . PUBLIC_DIR; ?>/css/admin/styles.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
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
                    <a class="text-decoration-none" href="<?= BASE_URL . 'Admin/Update_Shop_Product_List/' . $data['id'] ?>"><i class="d-flex justify-content-end fa-lg fad fa-edit text-info"></i></a>
                    <div class="row">
                        <div class="col-12 ms-4 h2 text-white"> <?= $shop['shop_name'] ?></div>
                        <div class="col-12 text-white-50 fs-5 ms-4">
                            <span><?= ucwords($owner['owner_fname'] . ' ' . $owner['owner_mname'] . ' ' .  $owner['owner_lname']) ?></span>
                            <span class="ps-5">Contact:</span><span class="fs-6 fst-italic">&nbsp&nbsp<?= substr_replace(substr_replace($owner['owner_cnum'], '-', 4, 0), '-', 8, 0) ?></span>
                            <span class="ps-5">Email:</span><span class="fs-6 fst-italic">&nbsp&nbsp<?= $owner['owner_email'] ?></span>
                        </div>
                        <div class="col-12 text-white-50 fs-5 ms-4 mt-4 px-3">
                            <span class="ps-4"></span><?= $shop['shop_description'] ?>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table align-middle table-hover p-1">
                <thead>
                    <tr class="text-white" style="background-color: darkcyan">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Unit</th>
                        <th>Product Description</th>
                        <th>Selling</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($data['shopProducts']) {
                        foreach ($data['shopProducts'] as $shopProduct) {
                            $category = ucfirst($shopProduct['category']);
                    ?>
                            <tr>
                                <td><?= $shopProduct['prod_id'] ?></td>
                                <td><?= ucwords($shopProduct['prod_name']) ?></td>
                                <td><?= $category ?></td>
                                <td><?= ucwords($shopProduct['unit']) ?></td>
                                <td><?= $shopProduct['prod_description'] ?></td>
                                <td>
                                    <div class="rounded-pill text-center <?php echo ($shopProduct['archive'] == 0) ? 'text-success border-success' : 'text-danger border-danger'; ?> border fw-bold py-2 px-0">
                                        <?php echo ($shopProduct['archive'] == 0) ? 'Selling' : 'Not Selling'; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td colspan="6" class="text-center fs-4 text-dark-50 fw-bolder bg-gradient py-4"><?= 'Unfortunately, ' . $data['shop']['shop_name'] . ' is not selling any product/s yet.' ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include 'footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo BASE_URL . PUBLIC_DIR; ?>/js/admin/scripts.js"></script>
</body>

</html>