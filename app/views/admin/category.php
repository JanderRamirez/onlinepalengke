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
            <a class="btn btn-dark col p-3 fs-5 fw-bold border-0 rounded-0" href="<?= BASE_URL . 'admin/miscellaneous/delivery-fee' ?>">Delivery Fee</a>
            <a class="btn btn-dark col p-3 fs-5 fw-bold border-0 rounded-0" href="<?= BASE_URL . 'admin/miscellaneous/unit-of-measure' ?>">Unit Measurement</a>
            <a class="btn btn-dark col p-3 fs-5 fw-bold border-0 rounded-0" style="background-color: darkcyan;" href="<?= BASE_URL . 'admin/miscellaneous/category' ?>">Category</a>
            <a class="btn btn-dark col p-3 fs-5 fw-bold border-0 rounded-0" href="<?= BASE_URL . 'admin/miscellaneous/barangay' ?>">Barangay</a>


            <div class="col-12 bg-light text-black p-4 border-3">
                <?php if ($hasError == 'may laman') { ?>
                    <div class="alert alert-danger alert-dismissible fade show mb-0 fs-5 mb-4" role="alert">
                        <strong><i class="fas fa-exclamation-triangle"></i> &nbsp Error!</strong> Check your new main category, it seems that your input already exists.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
                <div class="container-fluid m-0 p-0 bg-dark rounded-top row">
                    <div class="col-12 bg-light d-flex justify-content-end p-0">
                        <button data-bs-toggle="modal" data-bs-target="#addMainCategory" class="shadow btn btn-dark rounded-top rounded-0 fw-bold border-2"><i class="fad fa-plus-square text-info"></i>&nbsp main category</button>
                    </div>
                    <div class="col"></div>
                    <div class="text-white py-3 fs-3 fw-bold col">
                        <?= ucwords($selected) ?>&nbsp
                        <?php if ($selected != 'all') { ?>
                            <a data-bs-toggle="modal" data-bs-target="#updateMainCategory" class="text-decoration-none" href="#">
                                <i class="fad fa-edit text-info fs-5" data-fa-transform="shrink-8 up-6"></i>
                            </a>
                        <?php } ?>
                    </div>
                    <div class="col"></div>
                </div>
                <div class="d-flex justify-content-between">
                    <?php if ($selected != 'all') { ?>
                        <button data-bs-toggle="modal" data-bs-target="#addSubCateogry" class="btn btn-dark my-2"><i class="fad fa-plus-square text-info align-middle"></i>&nbsp <span class="align-middle">sub category</span></button>
                    <?php } else { ?>
                        <div></div>
                    <?php } ?>
                    <div class="dropdown py-2">
                        <button class="btn btn-secondary dropdown-toggle p-2 bg-dark fs-6 border-dark" type="button" id="categoryList" data-bs-toggle="dropdown" aria-expanded="false">
                            select category
                        </button>
                        <ul class="dropdown-menu border-dark" aria-labelledby="categoryList">
                            <li><a class="dropdown-item fw-bold" href="<?= BASE_URL . 'admin/miscellaneous/category/all' ?>">all</a></li>
                            <?php foreach ($mainCategories as $mainCategory) { ?>
                                <li><a class="dropdown-item fw-bold" href="<?= BASE_URL . 'admin/miscellaneous/category/' . strtolower($mainCategory['category']) ?>"><?= strtolower($mainCategory['category']) ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

                <table class="table table-bordered table-hover m-0 pt-3 fw-normal fs-6 bg-light">
                    <thead class="border-0 text-white" style="background-color: darkcyan;">
                        <tr class="border-1 text-center">
                            <th class="border-0" width="15%">Main Category ID</th>
                            <th class="border-0" width="15%">Sub Category ID</th>
                            <th class="border-0">Main Category</th>
                            <th class="border-0">Sub Category</th>
                            <?php if ($selected != 'all') { ?>
                                <th class="border-0" width="10%">Action</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody class=" border-top-0">
                        <?php if (count($data['categories']) == 0) { ?>
                            <tr>
                                <td colspan="100%" class="fs-5 fw-bolder bg-light">No category is set for now.</td>
                            </tr>
                        <?php } else {
                            $counter = 0; ?>
                            <?php if ($selected == 'all') { ?>
                                <?php foreach ($categories as $category) { ?>
                                    <tr class="align-middle">
                                        <td class="fw-bold fs-5"><?= htmlspecialchars($category['cat_id']) ?></td>
                                        <td class="fw-bold fs-5"><?= $category['sub_id'] ?></td>
                                        <td class="fw-bold fs-5"><?= htmlspecialchars($category['category']) ?></td>
                                        <td class="fw-bold fs-5"><?= $category['sub_category'] ?> </td>
                                    </tr>
                                <?php
                                    $counter++;
                                } ?>
                            <?php } else { ?>
                                <?php foreach ($categories as $category) { ?>
                                    <?php if ($category['sub_id'] != '') { ?>
                                        <tr class="align-middle">
                                            <td class="fw-bold fs-5"><?= htmlspecialchars($category['cat_id']) ?></td>
                                            <td class="fw-bold fs-5"><?= $category['sub_id'] ?></td>
                                            <td class="fw-bold fs-5"><?= htmlspecialchars($category['category']) ?></td>
                                            <td class="fw-bold fs-5"><?= $category['sub_category'] ?> </td>
                                            <td><a style="cursor: pointer;" class="nav-link" onclick="passData(this)" data-bs-toggle="modal" data-bs-target="#updateSubCategory"><i class="fad fa-pen-square text-info fs-3"></i></a></td>
                                        </tr>
                                    <?php
                                        $counter++;
                                    } ?>
                                <?php
                                } ?>
                            <?php }
                            if ($counter == 0) { ?>
                                <tr class="align-middle">
                                    <td class="fw-bold fs-5 text-center" colspan='100%'>There is no sub category set for <?= htmlspecialchars(strtolower($category['category'])) ?>.</td>

                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- ADD MAIN CATEGORY FORM MODAL -->
    <form action="<?= site_url($_SERVER['PATH_INFO']) ?>" method="post">
        <div class="modal fade" id="addMainCategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-0">
                    <div class="modal-header bg-dark rounded-0 d-flex justify-content-center">
                        <h5 class="modal-title text-white fw-bold fs-4 text-center" id="staticBackdropLabel">add new main category</h5>
                    </div>
                    <div class="modal-body">
                        <label class="fs-5 fw-bolder my-2" for="mainCategory">category name:</label>
                        <div class="col-md-auto">
                            <div class="input-group">
                                <input required type="text" class="form-control fs-6 fw-bold" id="mainCategory" name="mainCategory" placeholder="input category here...">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn text-white fw-bold" style="background-color: darkcyan;">Add Category</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- ADD SUB CATEGORY FROM MODAL -->
    <form action="<?= site_url($_SERVER['PATH_INFO']) ?>" method="post">
        <div class="modal fade" id="addSubCateogry" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-0">
                    <div class="modal-header bg-dark rounded-0 d-flex justify-content-center">
                        <h5 class="modal-title text-white fw-bold fs-4 text-center" id="staticBackdropLabel">add sub category</h5>
                    </div>
                    <div class="modal-body row">
                        <label class="fs-5 fw-bolder my-2 col-6" for="subCategory">main category:</label>
                        <label class="fs-5 fw-bolder my-2 col-6" for="subCategory">sub category:</label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input required type="text" class="form-control fs-6 fw-bold" id="mainCategoryId" name="mainCategoryId" value="<?= $selected ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input required type="text" class="form-control fs-6 fw-bold" id="subCategory" name="subCategory" placeholder="input sub category here...">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn text-white fw-bold" style="background-color: darkcyan;">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- UPDATE MAIN CATEGORY FROM MODAL -->
    <form action="<?= site_url(substr($_SERVER['PATH_INFO'], 1)) ?>" method="post">
        <div class="modal fade" id="updateMainCategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-0">
                    <div class="modal-header bg-dark rounded-0 d-flex justify-content-center">
                        <h5 class="modal-title text-white fw-bold fs-4 text-center" id="staticBackdropLabel">update main category</h5>
                    </div>
                    <div class="modal-body row">
                        <label class="fs-5 fw-bolder my-2 col-12" for="U_mainCategory">main category:</label>
                        <div class="col-md-12">
                            <div class="input-group">
                                <input required type="text" id="U_mainCategory" name="U_mainCategory" value="<?= $selected ?>" hidden>
                                <input required type="text" class="form-control fs-6 fw-bold" id="U_newMainCategory" name="U_newMainCategory" placeholder="update main category here..." value="<?= $selected ?>">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn text-white fw-bold" style="background-color: darkcyan;">Update </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- UPDATE SUB CATEGORY FROM MODAL -->
    <form action="<?= site_url(substr($_SERVER['PATH_INFO'], 1)) ?>" method="post">
        <div class="modal fade" id="updateSubCategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-0">
                    <div class="modal-header bg-dark rounded-0 d-flex justify-content-center">
                        <h5 class="modal-title text-white fw-bold fs-4 text-center" id="staticBackdropLabel">update sub category</h5>
                    </div>
                    <div class="modal-body row">
                        <label class="fs-5 fw-bolder my-2 col-12" for="U_subCategory">sub category:</label>
                        <div class="col-md-12">
                            <div class="input-group">
                                <input required type="text" id="U_mainCategoryId" name="U_mainCategoryId" required hidden>
                                <input required type="text" id="U_subCategory" name="U_subCategory" required hidden>
                                <input required type="text" class="form-control fs-6 fw-bold" id="U_newSubCategory" name="U_newSubCategory" placeholder="update main category here..." required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn text-white fw-bold" style="background-color: darkcyan;">Update </button>
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
            $('#U_subCategory').val(data[3].toLowerCase().trim());
            $('#U_mainCategoryId').val(data[0].trim());
            $('#U_newSubCategory').val(data[3].toLowerCase().trim());

        };
    </script>
</body>

</html>