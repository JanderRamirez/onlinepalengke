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
                <h3 class="fw-bolder text-white mb-0 p-3 shadow-lg">Products List</h3>
            </div>
            <div class="p-4">
                <div class="table-responsive bg-light shadow-lg rounded-3">
                    <form method="POST" action="<?= site_url('Admin/UpdateProducts'); ?>">
                        <table class="table table-borderless m-0 align-middle table-hover">
                            <thead>
                                <tr class="bg-dark text-white">
                                    <th>Shop Name</th>
                                    <th>Product ID</th>
                                    <th>Name</th>
                                    <th>Unit</th>
                                    <th>Last Update</th>
                                    <th>Category</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Update Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // GET CURRENT DATE 
                                $currentDate = date_default_timezone_set('Asia/Singapore');
                                $currentDate = date('Y-m-d');
                                foreach ($data['products'] as $product) {

                                    // CHECK IF PRODUCT IS UPDATED
                                    $isUpdated;
                                    $lastUpdate = substr($product['date_modified'], 0, 10);
                                    if (strtotime($currentDate) - strtotime($lastUpdate) < 1) {
                                        $isUpdated = '<div style="display:inline-block" class="p-2 px-3 rounded-pill text-center text-success border border-success p-1 px-1 fw-bold my-2">Updated</div>';
                                    } else {
                                        $isUpdated = '<div style="display:inline-block" class="p-2 px-3 rounded-pill text-center text-danger border border-danger p-1 px-1 fw-bold my-2">Outdated</div>';
                                    }
                                ?>
                                    <tr>
                                        <td><?= $product['shop'] ?></td>
                                        <td><?= htmlspecialchars($product['prod_id']) ?></td>
                                        <td><?= htmlspecialchars($product['prod_name']) ?></td>
                                        <td><?= htmlspecialchars($product['unit']) ?></td>
                                        <td class="ps-5"><?= htmlspecialchars(date('M-d-Y', strtotime($product['date_modified']))) ?></td>
                                        <td><?= htmlspecialchars($product['category']) ?></td>
                                        <td class="text-center"><?= $isUpdated ?></td>
                                        <td class="text-dark <?= (strpos($isUpdated, 'success')) ? '' : ''; ?>"><?= '&#8369;&nbsp' . trim(htmlspecialchars(number_format($product['prod_price'], 2))); ?></td>
                                        <td class="text-center">
                                            <input step=".01" type="number" name="<?= htmlspecialchars($product['prod_id']) ?>_<?= htmlspecialchars($product['shop_id']) ?>" class="text-center border-0 shadow-sm rounded-pill p-3" placeholder="  update price here">
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div class="text-center me-5 row">
                            <input type="submit" value="Update Products" class=" position-sticky fw-bolder fs-4 btn btn-primary shadow m-4 p-3 rounded-pill">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>











    <!-- ADD PRODUCT MODAL -->
    <div class="modal fade" id="addMarketer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form action="<?= site_url('Admin/Add_Product') ?>" enctype="multipart/form-data" method="POST">
                    <div class="modal-body p-0">
                        <div class="text-white d-flex justify-content-between m-0 p-3 mb-4 bg-dark bg-gradient">
                            <div></div>
                            <h5 class="modal-title fw-bold" id="staticBackdropLabel">Add New Marketer</h5>
                            <i class="fas fa-times-circle align-content-center" data-bs-dismiss="modal" aria-label="Close" style="font-size: 1.5rem; cursor:pointer"></i>
                        </div>
                        <div class="container-fluid p-4">
                            <div class="row">
                                <div class="col-12 text-center pb-5 ui-widget-shadow">
                                    <img class="rounded-circle shadow" src="
                                    
                                    
                                    
                                    https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTI2iHiAT-ICPyezz_uJzuUWArjKnNDaruP-DbfLD0CWrT-oqjcpe2RfBLDl9DTRbFw9qQ&usqp=CAU
                                    
                                    
                                    
                                    " alt="Marketer name" style="height: 2.2in; width: 2.2in; object-position: left; object-fit:cover;">
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
                                    <input type="text" class="form-control" id="number" name="number" placeholder="enter last name..." required>
                                    <label class="ps-4" for="number">Number:</label>
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
                                <label for="productImg" class="pt-2 ps-3">Marketer Image:</label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="productImg" name="productImg" required>
                                    <label class="input-group-text text-white bg-dark bg-gradient" for="productImg">Upload</label>
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








    <?php include 'footer.php' ?>








    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo BASE_URL . PUBLIC_DIR; ?>/js/admin/scripts.js"></script>
</body>

</html>