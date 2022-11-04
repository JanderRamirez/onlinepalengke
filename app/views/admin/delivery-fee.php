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


    <div class="container px-4 pt-5">



        <div class="bg-dark text-white p-3 border-bottom text-center fs-3 fw-bold rounded-top">Miscellaneous</div>
        <div class="p-0 row m-0 text-center bg-dark text-white align-items-center fs-4 fw-bold shadow">
            <a class="btn btn-dark col p-3 fs-5 fw-bold border-0 rounded-0" style="background-color: darkcyan;" href="<?= BASE_URL . 'admin/miscellaneous/delivery-fee' ?>">Delivery Fee</a>
            <a class="btn btn-dark col p-3 fs-5 fw-bold border-0 rounded-0" href="<?= BASE_URL . 'admin/miscellaneous/unit-of-measure' ?>">Unit Measurement</a>
            <a class="btn btn-dark col p-3 fs-5 fw-bold border-0 rounded-0" href="<?= BASE_URL . 'admin/miscellaneous/category' ?>">Category</a>
            <a class="btn btn-dark col p-3 fs-5 fw-bold border-0 rounded-0" href="<?= BASE_URL . 'admin/miscellaneous/barangay' ?>">Barangay</a>
            
            <div class="col-12 bg-light text-black p-4 border-3 border-warning">
                <div class="fw-bold fs-4 text-white py-3 mt-4 bg-dark rounded-top d-flex justify-content-between">
                    <span></span>
                    <span class="fs-3 fw-bold">Delivery Fee</span>
                    <div></div>
                    <!-- <a style="cursor: pointer;" class="nav-link" data-bs-toggle="modal" data-bs-target="#addPrice"><i class="fad fa-plus-square text-info fs-3 me-2"></i></a> -->

                </div>
                <table class="table table-bordered table-hover m-0 pt-3 fw-normal fs-6 bg-light">
                    <thead class="border-0 text-white" style="background-color: darkcyan;">
                        <tr class="border-1 border-dark">
                            <th class="border-0 text-start" width="10%">ID</th>
                            <th class="border-0 text-center">Date Assigned</th>
                            <th class="border-0 text-center">Price</th>
                            <th class="border-0 text-center" width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody class=" border-top-0">

                        <?php if (count($data['deliveryFees']) == 0) { ?>
                            <tr>
                                <td colspan="100%" class="fs-5 fw-bolder bg-light">No price is set for now.</td>
                            </tr>
                        <?php } else { ?>
                            <?php foreach ($deliveryFees as $deliveryFee) { ?>
                                <tr class="align-middle">
                                    <td class="fw-bold fs-5"><?= htmlspecialchars($deliveryFee['brgy_id']) ?></td>
                                    <td class="fw-bold fs-5"><?= htmlspecialchars($deliveryFee['brgy_name']) ?></td>
                                    <td class="fw-bold fs-5"><?= '&#8369;&nbsp' . htmlspecialchars(number_format($deliveryFee['delivery_fee'], 2)) ?> </td>
                                    <td><a style="cursor: pointer;" class="nav-link" onclick="passData(this)" data-bs-toggle="modal" data-bs-target="#updatePrice"><i class="fad fa-pen-square text-info fs-3"></i></a></td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <!-- ADD DELIVERY FEE MODAL -->
    <form action="<?= site_url("Admin/add_delivery_fee/") ?>" method="post">
        <div class="modal fade" id="addPrice" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-0">
                    <div class="modal-header bg-dark rounded-0 d-flex justify-content-center">
                        <h5 class="modal-title text-white fw-bold fs-4 text-center" id="staticBackdropLabel">Add Delivery Fee</h5>
                    </div>
                    <div class="modal-body row">
                        <label class="col-md-6 fs-5 fw-bolder my-2" for="brgy">Barangay</label>
                        <label class="col-md-6 fs-5 fw-bolder my-2" for="price">Delivery Fee</label>
                        <div class="col-md-6">
                            <select class="form-select col-md-6 fw-bold" name="brgy">
                                <?php foreach ($deliveryFees as $deliveryFee) { ?>
                                    <option value="<?=$deliveryFee['brgy_id']?>"><?= $deliveryFee['brgy_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group">
                                <input required type="number" step=".01" class="form-control fs-6 fw-bold" id="price" name="price" placeholder="input price here...">
                                <div class="input-group-text bg-dark text-white fs-6 fw-bold">PHP</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn text-white fw-bold" style="background-color: darkcyan;">Add Price</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form action="<?= site_url("Admin/update_delivery_fee/") ?>" method="post">
        <div class="modal fade" id="updatePrice" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-0">
                    <div class="modal-header bg-dark rounded-0 d-flex justify-content-center">
                        <h5 class="modal-title text-white fw-bold fs-4 text-center" id="staticBackdropLabel">Update Delivery Fee</h5>
                    </div>
                    <div class="modal-body">
                        <label class="fs-5 fw-bolder my-2" for="U_price">Delivery Fee</label>
                        <div class="col-md-auto">
                            <div class="input-group">
                                <input required id="U_id" name="U_id" type="text" hidden>
                                <input required type="number" step=".01" class="form-control fs-6 fw-bold" id="U_price" name="U_price" placeholder="input price here...">
                                <div class="input-group-text bg-dark text-white fs-6 fw-bold">PHP</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn text-white fw-bold" style="background-color: darkcyan;">Update Price</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php include 'footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="<?php echo BASE_URL . PUBLIC_DIR; ?>/js/admin/scripts.js"></script>
    <script>
        function passData($element) {
            $tr = $($element).closest('tr');


            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();
            $('#U_price').val(data[2].substr(1).trim());
            $('#U_id').val(data[0].trim());
        };
    </script>
</body>

</html>