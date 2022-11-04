<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Admin extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('admin_type'))
            redirect('Account/Login');
        $this->call->helper(['form', 'alert']);
        $this->call->model('M_admin');
        $this->call->model('upload');
    }
    // ------------------------------------------------------------------------------------------
    // CLASS' GLOBAL FUNCTIONS                                                                   -
    // ------------------------------------------------------------------------------------------

    // VALIDATE OF THE LOOGED IN CLIENT IS ADMIN
    public function isAdmin()
    {
        if ($this->session->userdata('admin_type') != '1')
            redirect('Account/Login');
    }


    // ------------------------------------------------------------------------------------------
    // DASHBOARD                                                                                -
    // ------------------------------------------------------------------------------------------

    // DISPLAY DASHBOARD PAGE
    public function dashboard()
    {
        // CHECK IF WHOS LOGGED IN IS ADMIN: IF TRUE, WILL NO BE DIRECTED TO LOGIN PAGE
        $this->isAdmin();
        $data['transaction'] = $this->M_admin->notif_transaction();
        $data['average'] =  $this->M_admin->average_star();
        $data['stars'] = $this->M_admin->star();
        $data['reg_user'] = $this->M_admin->reg_user();
        $data['earnings'] = $this->M_admin->earnings();
        $data['inflation'] = $this->M_admin->get_inflation_data();
        $data['products'] = $this->M_admin->getProducts();
        $data['top_products'] = $this->M_admin->get_top_products();

        // TRANSACTIONS FOR CHART
        $data['transactions'] = $this->M_admin->get_transactions();
        $this->call->view('admin/dashboard', $data);
    }

    // ------------------------------------------------------------------------------------------
    // PRODUCTS                                                                                 -
    // ------------------------------------------------------------------------------------------

    // GET RECORDS AND DISPLAY PRODUCTS PAGE
    public function product($page = 1)
    {
        $data['transaction'] = $this->M_admin->notif_transaction();
        if ($this->session->userdata('admin_type') == '1') {
            $data['categories'] = $this->M_admin->categoryData();
            $data['units'] = $this->M_admin->unitData();
            $data['filter'] = [
                'search' => '',
                'listNum' => '10',
            ];
            if ($this->form_validation->submitted()) {
                $searchVal = $this->io->post('search');
                $data['filter']['listNum'] = 10;
                $data['filter']['search'] = $searchVal;
                $data['products'] = $this->M_admin->productData(
                    $page,
                    10,
                    $searchVal
                );
                $this->call->view('Admin/Product', $data);
            } else {
                $data['products'] = $this->M_admin->productData(
                    $page,
                    $data['filter']['listNum']
                );
                $this->call->view('Admin/Product', $data);
            }
        } else {
            redirect('Account/Login');
        }
    }

    // ADD PRODUCT
    public function Add_Product()
    {
        $data['transaction'] = $this->M_admin->notif_transaction();
        if ($this->form_validation->submitted()) {
            $this->form_validation
                ->name('productName')
                ->required()
                ->name('category')
                ->required()
                ->min_length(1)
                ->max_length(30)
                ->name('unit')
                ->required()
                ->name('productPrice')
                ->required()
                ->name('description')
                ->required()
                ->min_length(1)
                ->max_length(600);

            if ($this->form_validation->run()) {
                $targetDir = 'public/images/products/';
                $fileName = $this->upload->uploadImg($targetDir, 'productImg');
                // CHECK IF FILENAME HAS VALUE(MEANS THE UPLOAD HAS COMPLETED WITHOUT ERROR)
                if (strlen($fileName) > 0) {
                    $this->M_admin->addProduct(
                        $this->io->post('productName'),
                        $this->io->post('description'),
                        $this->io->post('category'),
                        $this->io->post('unit'),
                        $this->io->post('productPrice')
                    );
                    $id = $this->M_admin->latestProduct();
                    rename(
                        $targetDir . $fileName,
                        $targetDir . $id['MAX(prod_id)'] . '.jpg'
                    );
                    $this->M_admin->updateProductLink(
                        $id['MAX(prod_id)'],
                        $targetDir . $id['MAX(prod_id)'] . '.jpg'
                    );
                    redirect('Admin/Product/');
                } else {
                    echo 'Upload error';
                }
            }
        }
    }

    // Update PRODUCT
    public function Update_Product()
    {
        $data['transaction'] = $this->M_admin->notif_transaction();
        if ($this->form_validation->submitted()) {
            $this->form_validation
                ->name('U_id')
                ->required()
                ->name('U_productName')
                ->required()
                ->name('U_category')
                ->required()
                ->min_length(1)
                ->max_length(30)
                ->name('U_unit')
                ->required()
                ->name('U_productPrice')
                ->required()
                ->name('U_description')
                ->required()
                ->min_length(1)
                ->max_length(600);

            if ($this->form_validation->run()) {
                if (strlen($_FILES['U_productImg']['name']) > 0) {
                    $this->call->model('upload');
                    $targetDir = 'public/images/products/';
                    $fileName = $this->upload->uploadImg(
                        $targetDir,
                        'U_productImg'
                    );

                    // CHECK IF FILENAME HAS VALUE(MEANS THE UPLOAD HAS COMPLETED WITHOUT ERROR)
                    if (strlen($fileName) > 0) {
                        $this->M_admin->updateProduct(
                            $this->io->post('U_id'),
                            $this->io->post('U_productName'),
                            $this->io->post('U_category'),
                            $this->io->post('U_unit'),
                            $this->io->post('U_productPrice'),
                            $this->io->post('U_description')
                        );
                        unlink($targetDir . $this->io->post('U_id') . '.jpg');
                        rename(
                            $targetDir . $fileName,
                            $targetDir . $this->io->post('U_id') . '.jpg'
                        );
                        redirect('Admin/Product/');
                    } else {
                        echo 'Upload Failed';
                    }
                } else {
                    $this->M_admin->updateProduct(
                        $this->io->post('U_id'),
                        $this->io->post('U_productName'),
                        $this->io->post('U_category'),
                        $this->io->post('U_unit'),
                        $this->io->post('U_productPrice'),
                        $this->io->post('U_description')
                    );
                    redirect('Admin/Product/');
                }
            }
        }
    }

    // UPDATE ARCHIVE
    public function updateArchive()
    {
        $data['transaction'] = $this->M_admin->notif_transaction();
        if ($this->form_validation->submitted()) {
            $this->form_validation
                ->name('A_id')
                ->required()
                ->name('A_isArchive')
                ->required();

            if ($this->form_validation->run()) {
                $this->M_admin->isArchive(
                    $this->io->post('A_id'),
                    $this->io->post('A_isArchive')
                );
                redirect('Admin/Product/');
            } else {
                echo 'Something went wrong';
            }
        }
    }

    // ------------------------------------------------------------------------------------------
    // SHOP                                                                                     -
    // ------------------------------------------------------------------------------------------

    // GET SHOP RECORDS AND DISPLAY SHOP PAGE
    public function Shop($page = 1)
    {
        $data['transaction'] = $this->M_admin->notif_transaction();
        if ($this->session->userdata('admin_type') == '1') {
            $data['units'] = $this->M_admin->unitData();
            $data['filter'] = [
                'searchVal' => '',
                'records' => 10,
            ];

            if ($this->form_validation->submitted()) {
                $this->form_validation
                    ->name('search')
                    ->required()
                    ->name('listNum')
                    ->required();

                if ($this->form_validation->run()) {
                    $record_per_page = $this->io->post('listNum');
                    $search = $this->io->post('search');

                    $data['products'] = $this->M_admin->productData(
                        $page,
                        $record_per_page,
                        $search
                    );
                    $data['filter']['searchVal'] = $search;
                    $data['filter']['records'] = $record_per_page;
                    $this->call->view('Admin/Shop', $data);
                } else {
                    $record_per_page = $this->io->post('listNum');
                    $data['products'] = $this->M_admin->get_shop(
                        $page,
                        $record_per_page
                    );
                    $data['filter']['records'] = $record_per_page;
                    $this->call->view('Admin/Shop', $data);
                }
            } else {
                $data['shop'] = $this->M_admin->get_shop($page);
                $data['owner'] = $this->M_admin->get_owner();
                $this->call->view('Admin/Shop', $data);
            }
        } else {
            redirect('Account/Login');
        }
    }

    // ADD NEW SHOP
    public function Add_stall()
    {
        $data['transaction'] = $this->M_admin->notif_transaction();
        if ($this->form_validation->submitted()) {
            $this->form_validation
                ->name('name')
                ->required()
                ->min_length(1)
                ->max_length(30)
                ->name('desc')
                ->required()
                ->min_length(1)
                ->max_length(500)
                ->name('owner')
                ->required();

            if ($this->form_validation->run()) {
                $targetDir = 'public/images/shop/';
                $fileName = $this->upload->uploadImg($targetDir, 'stallImg');
                if (strlen($fileName) > 0) {
                    $this->M_admin->Add_stall(
                        $name = $this->io->post('name'),
                        $desc = $this->io->post('desc'),
                        $owner = $this->io->post('owner')
                    );
                    $id = $this->M_admin->lastShop();
                    rename(
                        $targetDir . $fileName,
                        $targetDir . $id['shop_id'] . '.jpg'
                    );
                    $this->M_admin->updateShopLink(
                        $id['shop_id'],
                        $id['shop_id'] . '.jpg'
                    );
                }
            } else {
                $this->session->set_flashdata([
                    'input_err' => 'Invalid Input!',
                ]);
            }
            redirect('Admin/Shop');
        }
    }

    //  UPDATE SHOP INFO
    public function Update_stall()
    {
        $data['transaction'] = $this->M_admin->notif_transaction();
        if ($this->form_validation->submitted()) {
            $this->form_validation
                ->name('name')
                ->required()
                ->min_length(1)
                ->max_length(30)
                ->name('desc')
                ->required()
                ->min_length(1)
                ->max_length(500)
                ->name('id')
                ->required();
            if ($this->form_validation->run()) {
                $this->M_admin->Update_stall(
                    $this->io->post('id'),
                    $this->io->post('name'),
                    $this->io->post('desc')
                );
            } else {
                $this->session->set_flashdata([
                    'input_err' => 'Update Unsuccessful! Invalid Input!',
                ]);
            }
            redirect('Admin/Shop');
        }
    }

    //  UPDATE OWNER INFO
    public function Update_owner()
    {
        $data['transaction'] = $this->M_admin->notif_transaction();
        if ($this->form_validation->submitted()) {
            $this->form_validation
                ->name('num')
                ->required()
                ->min_length(11)
                ->max_length(11)
                ->name('email')
                ->required()
                ->valid_email()
                ->name('id')
                ->required();

            if ($this->form_validation->run()) {
                $this->M_admin->Update_owner(
                    $this->io->post('id'),
                    $this->io->post('num'),
                    $this->io->post('email')
                );
            } else {
                $this->session->set_flashdata([
                    'input_err' => 'Update Unsuccessful!  Invalid Input!',
                ]);
            }
            redirect('Admin/Shop');
        }
    }

    // ADD NEW OWNER
    public function Add_owner()
    {
        $data['transaction'] = $this->M_admin->notif_transaction();
        if ($this->form_validation->submitted()) {
            $this->form_validation
                ->name('num')
                ->required()
                ->min_length(11)
                ->max_length(13)
                ->name('email')
                ->required()
                ->valid_email()
                ->name('fname')
                ->required()
                ->min_length(1)
                ->max_length(20)
                ->name('mname')
                ->required()
                ->min_length(1)
                ->max_length(20)
                ->name('lname')
                ->required()
                ->min_length(1)
                ->max_length(20);
            if ($this->form_validation->run()) {
                $this->M_admin->Add_owner(
                    $this->io->post('fname'),
                    $this->io->post('mname'),
                    $this->io->post('lname'),
                    $this->io->post('num'),
                    $this->io->post('email')
                );
            } else {
                $this->session->set_flashdata([
                    'input_err' => 'Invalid Input!',
                ]);
            }
            // redirect('Admin/Shop');
        }
    }

    // SHOW SHOP PRODUCTS LIST
    public function Shop_Product_List($id)
    {
        $data['transaction'] = $this->M_admin->notif_transaction();
        $data['shopProducts'] = $this->db->raw(
            "SELECT
                p.prod_id,
                p.prod_name,
                u.unit,
                IF(p.sub_id IS NULL, (SELECT c.category FROM tbl_category as c WHERE c.cat_id = p.cat_id), CONCAT((SELECT c.category FROM tbl_category as c WHERE c.cat_id = p.cat_id), '/', (SELECT sc.sub_category FROM tbl_sub_cat as sc WHERE sc.sub_id = p.sub_id))) AS category,
                p.prod_description,
                p.archive
                
            FROM tbl_shop_prod as sp 
            INNER JOIN tbl_product as p ON sp.prod_id = p.prod_id
            INNER JOIN tbl_unit as u ON p.prod_unit = u.unit_id
            
            WHERE sp.shop_id = ? ORDER BY p.prod_name ASC",
            [$id]
        );
        $data['id'] = $id;
        $data['shop'] = $this->M_admin->getSingleShop($id);
        $data['owner'] = $this->M_admin->getSingleOwner(
            $data['shop']['owner_id']
        );

        $this->call->view('admin/shop-product-list', $data);
    }

    // SHOW UPDATE PRODUCT LIST
    public function Update_Shop_Product_List($id)
    {
        $data['transaction'] = $this->M_admin->notif_transaction();
        $data['shopProducts'] = array_values($this->M_admin->getShopProducts($id));
        $data['id'] = $id;
        $data['subCats'] = $this->M_admin->getSubCat();
        $data['mainCats'] = $this->M_admin->getCat();
        $data['units'] = $this->M_admin->unitData();
        $data['shop'] = $this->M_admin->getSingleShop($id);
        $data['products'] = $this->M_admin->getProducts();
        $data['owner'] = $this->M_admin->getSingleOwner($data['shop']['owner_id']);
        $this->call->view('admin/update-shop-product-list', $data);
    }

    // UPDATE PRODUCT LIST
    public function Update_Shop_Product()
    {
        $data['transaction'] = $this->M_admin->notif_transaction();
        $validData = [];
        foreach ($_POST as $key => $productId) {
            if (preg_match('/[^0-9.]/', $key) == 0) {
                array_push($validData, $productId);
            }
        }









        if (count($validData) > 0) {
            $this->M_admin->updateShopProducts($validData, $_POST['shopId']);
            redirect('Admin/Update_Shop_Product_List/' . $_POST['shopId']);
        } else {
            $this->M_admin->updateShopProducts($validData, $_POST['shopId']);
            redirect('Admin/Update_Shop_Product_List/' . $_POST['shopId']);
        }
    }

    // ------------------------------------------------------------------------------------------
    // MARKETER                                                                                 -
    // ------------------------------------------------------------------------------------------

    // SHOW MARKETER PAGE
    public function Marketer()
    {
        $data['transaction'] = $this->M_admin->notif_transaction();
        // CHECK IF WHOS LOGGED IN IS ADMIN: IF TRUE, WILL NO BE DIRECTED TO LOGIN PAGE
        $this->isAdmin();
        $data['marketer'] = $this->M_admin->Marketer();
        $this->call->view('admin/marketer', $data);
    }

    // SHOW UPDATE PRODUCTS PAGE
    public function Update()
    {
        $data['transaction'] = $this->M_admin->notif_transaction();
        // CHECK IF WHOS LOGGED IN IS ADMIN: IF TRUE, WILL NO BE DIRECTED TO LOGIN PAGE
        $this->isAdmin();
        // $data['subCategories'] = $this->M_admin->getSubCat();
        // $data['categories'] = $this->M_admin->getCat();
        // $data['units'] = $this->M_admin->unitData();
        // $data['products'] = $this->M_admin->getProducts();

        $data['products'] = $this->db->raw(
            "SELECT 
                p.shop_id,
                (SELECT shop_name FROM tbl_shop WHERE shop_id = p.shop_id LIMIT 1) AS shop,
                p.prod_id,
                p.prod_name,
                (SELECT unit FROM tbl_unit AS u WHERE u.unit_id = p.prod_unit) AS unit,
                p.date_modified,
            CONCAT(
                (SELECT c.category FROM tbl_category as c WHERE c.cat_id = p.cat_id),
                IF(p.sub_id IS NULL, '',CONCAT('/', (SELECT sc.sub_category FROM tbl_sub_cat as sc WHERE sc.sub_id = p.sub_id)))
            ) AS category,
            p.prod_price
        FROM tbl_product AS p WHERE p.prod_id = IF(prod_id IS NULL, 'not available', (SELECT prod_id FROM tbl_shop_prod WHERE prod_id = p.prod_id LIMIT 1)) AND p.archive = 0 AND p.shop_id != 0 ORDER BY p.prod_name"
        );

        $this->call->view('admin/update-products', $data);
    }

    // UPDATE PRODUCTS FUNCTION
    public function UpdateProducts()
    {
        $data['transaction'] = $this->M_admin->notif_transaction();
        if ($this->form_validation->submitted()) {
            if ($this->form_validation->run()) {

                // LOOP FOR CHECKING ALL INPUTS
                foreach ($_POST as $key => $value) {

                    // CHECKING INPUT CONDITION
                    if (preg_match('/^([0-9]++\.?\d{2,2})$|^([0-9]++)$/', $value) == 1 && preg_match('/^(\d++_\d++)$/', $key) == 1) {
                        $productId = substr($key, 0, strpos($key, '_'));
                        $shopId = substr($key, strpos($key, '_') + 1);
                        $shopProducts = $this->db->raw("SELECT shop_id FROM tbl_shop_prod WHERE prod_id = ? ORDER BY shop_id ASC", array($productId));
                        // $hasAssignedShop = $this->db->raw("SELECT shop_id FROM tbl_product WHERE prod_id = ?", array($productId))[0]['shop_id'];
                        $shopIndex = 0;
                        foreach ($shopProducts as $key => $shopProduct) {
                            if ($shopId == $shopProduct['shop_id']) {
                                if ($shopIndex + 1 == count($shopProducts)) {
                                    $this->M_admin->updateSingleProduct(
                                        $productId,
                                        $shopProducts[0]['shop_id'],
                                        $value
                                    );
                                } else {
                                    $this->M_admin->updateSingleProduct(
                                        $productId,
                                        $shopProducts[$shopIndex + 1]['shop_id'],
                                        $value
                                    );
                                }
                            }
                            if ($shopIndex + 1 == count($shopProducts))
                                echo 'count: ' . count($shopProducts);
                            $shopIndex++;
                        }
                    }
                }
            }
        }
        redirect('Admin/Update');
    }

    // ADD MARKETER 
    public function Add_Marketer()
    {
        $data['transaction'] = $this->M_admin->notif_transaction();
        if ($this->form_validation->submitted()) {
            $this->form_validation
                ->name('contact')
                ->required()
                ->min_length(11)
                ->max_length(13)
                ->name('email')
                ->required()
                ->valid_email()
                ->name('fname')
                ->required()
                ->min_length(1)
                ->max_length(20)
                ->name('mname')
                ->required()
                ->min_length(1)
                ->max_length(20)
                ->name('lname')
                ->required()
                ->min_length(1)
                ->max_length(20)
                ->name('username')
                ->required()
                ->min_length(5)
                ->max_length(20)
                ->name('pass')
                ->required()
                ->name('rePass')
                ->required();
            if ($this->form_validation->run()) {
                $targetDir = 'public/images/marketer/';
                $fileName = $this->upload->uploadImg($targetDir, 'marketerImg');
                if (strlen($fileName) > 0) {
                    $this->M_admin->Add_Marketer(
                        $this->io->post('email'),
                        $this->io->post('username'),
                        $this->io->post('pass'),
                        $this->io->post('fname'),
                        $this->io->post('mname'),
                        $this->io->post('lname'),
                        str_replace('-', '', $this->io->post('contact'))
                    );
                    $id = $this->M_admin->lastMarketer();
                    rename(
                        $targetDir . $fileName,
                        $targetDir . $id[0]['max(admin_id)'] . '.jpg'
                    );
                }
            } else {
                $this->session->set_flashdata([
                    'input_err' => 'Invalid Input!',
                ]);
            }
            redirect('Admin/Marketer');
        }
    }

    // Update Marketer
    public function Update_marketer()
    {
        $data['transaction'] = $this->M_admin->notif_transaction();
        if ($this->form_validation->submitted()) {

            $this->form_validation
                ->name('Uid')->required()
                ->name('Ufname')->required()
                ->min_length(1)
                ->max_length(30)
                ->name('Umname')->required()
                ->min_length(1)
                ->max_length(30)
                ->name('Ucontact')->required()
                ->min_length(1)
                ->max_length(20)
                ->name('Uusername')->required()
                ->min_length(1)
                ->max_length(20)
                ->name('Ulname')->required()
                ->min_length(1)
                ->max_length(30)
                ->name('Uemail')->required()->valid_email();
            if ($this->form_validation->run()) {

                if (strlen($_FILES['Uimage']['name']) > 0) {
                    $this->call->model('upload');
                    $targetDir = "public/images/marketer/";
                    $fileName = $this->upload->uploadImg($targetDir, "Uimage");

                    // CHECK IF FILENAME HAS VALUE(MEANS THE UPLOAD HAS COMPLETED WITHOUT ERROR)
                    if (strlen($fileName) > 0) {
                        $this->M_admin->updateMarketer(
                            $this->io->post('Uid'),
                            $this->io->post('Ufname'),
                            $this->io->post('Umname'),
                            $this->io->post('Ulname'),
                            $this->io->post('Ucontact'),
                            $this->io->post('Uemail'),
                            $this->io->post('Uusername')
                        );
                        unlink($targetDir . $this->io->post('Uid') . '.jpg');
                        rename($targetDir . $fileName, $targetDir . $this->io->post('Uid') . '.jpg');
                        redirect('Admin/Marketer/');
                    } else
                        echo 'Upload Failed';
                } else {
                    $this->M_admin->updateMarketer(
                        $this->io->post('Uid'),
                        $this->io->post('Ufname'),
                        $this->io->post('Umname'),
                        $this->io->post('Ulname'),
                        $this->io->post('Ucontact'),
                        $this->io->post('Uemail'),
                        $this->io->post('Uusername')
                    );
                    redirect('Admin/Marketer');
                }
            }
        }
    }











    // DISPLAY MISCELLANEOUS PAGE
    public function Miscellaneous($mode = ' ', $selected = 'all')
    {
        $data['transaction'] = $this->M_admin->notif_transaction();
        // CHECK IF WHOS LOGGED IN IS ADMIN: IF TRUE, WILL NO BE DIRECTED TO LOGIN PAGE
        $this->isAdmin();
        // DELIVERY FEE PAGE
        if (strtolower($mode) == 'delivery-fee') {
            $data['deliveryFees'] = $this->M_admin->getDeliveryFee();
            $this->call->view('admin/delivery-fee', $data);
        }

        // UNIT OF MEASURE PAGE
        else if (strtolower($mode) == 'unit-of-measure') {
            $data['hasError'] = '';
            if (isset($_POST['unit'])) {
                $data['hasError'] = $this->add_unit_of_measure();
            } else if (isset($_POST['U_unit'])) {
                $data['hasError'] = $this->update_unit_of_measure();
            }
            $data['unitMeasurements'] = $this->M_admin->getUnitMeasurement();
            $this->call->view('admin/unit-of-measure', $data);
        }

        // CATEGORY PAGE
        else if (strtolower($mode) == 'category') {
            $isPresent = false;
            $mainCats = $this->M_admin->getMainCategories();
            foreach ($mainCats as $mainCat) {
                if ($mainCat['category'] == $selected) {
                    $isPresent = true;
                }
            }
            if ($isPresent || $selected == 'all') {
                $data['hasError'] = '';
                if (isset($_POST['subCategory'])) {
                    $data['hasError'] = $this->M_admin->addSubCategory($_POST['mainCategoryId'], $_POST['subCategory']);
                } else if (isset($_POST['mainCategory'])) {
                    $data['hasError'] = $this->M_admin->addMainCategory($_POST['mainCategory']);
                } else if (isset($_POST['U_mainCategory'])) {
                    $data['hasError'] = $this->M_admin->updateMainCategory($_POST['U_mainCategory'], $_POST['U_newMainCategory']);
                } else if (isset($_POST['U_subCategory'])) {
                    $data['hasError'] = $this->M_admin->updateSubCategory($_POST['U_mainCategoryId'], $_POST['U_subCategory'], strtolower($_POST['U_newSubCategory']));
                }
                $data['selected'] = $selected;
                $data['mainCategories'] = $this->M_admin->getMainCategories();
                $data['categories'] = $this->M_admin->get_category($selected);
                $this->call->view('admin/category', $data);
            } else {
                $data['heading'] = '404 Page Not Found';
                $data['message'] = 'The page you requested was not found.';
                $this->call->view('errors/error_404', $data);
            }
        }




        // BARANGAY PAGE
        else if (strtolower($mode) == 'barangay') {
            $data['hasError'] = '';
            if (isset($_POST['barangay'])) {
                $data['hasError'] = $this->M_admin->addBarangay($_POST['barangay']);
            } else if (isset($_POST['U_newBarangay'])) {
                $data['hasError'] = $this->M_admin->updateBarangay($_POST['U_oldBarangay'], $_POST['U_newBarangay']);
            }
            $data['barangays'] = $this->M_admin->getBarangay();
            $this->call->view('admin/barangay', $data);
        }







        // WRONG INPUT PAGE
        else {
            $data['heading'] = '404 Page Not Found';
            $data['message'] = 'The page you requested was not found.';
            $this->call->view('errors/error_404', $data);
        }
    }

    // ADD DELIVERY FEE
    public function add_delivery_fee()
    {
        $data['transaction'] = $this->M_admin->notif_transaction();
        if ($this->form_validation->submitted()) {

            $this->form_validation->name('price')->required();
            if ($this->form_validation->run()) {
                $this->M_admin->add_delivery_fee($this->io->post('price'));
                redirect('admin/miscellaneous/delivery-fee');
            }
        }
    }

    // UPDATE DELIVERY FEE
    public function update_delivery_fee()
    {
        $data['transaction'] = $this->M_admin->notif_transaction();
        if ($this->form_validation->submitted()) {

            $this->form_validation
                ->name('U_price')->required()
                ->name('U_id')->required();
            if ($this->form_validation->run()) {
                $this->M_admin->update_delivery_fee(
                    $this->io->post('U_id'),
                    $this->io->post('U_price')
                );
                redirect('admin/miscellaneous/delivery-fee');
            }
        }
    }


    public function add_unit_of_measure()
    {
        $data['transaction'] = $this->M_admin->notif_transaction();
        if ($this->form_validation->submitted()) {

            $this->form_validation->name('unit')->required();
            if ($this->form_validation->run()) {
                return $this->M_admin->add_unit_of_measure(strtolower($this->io->post('unit')));
            }
        }
    }

    // UPDATE UNIT OF MEASURE
    public function update_unit_of_measure()
    {
        $data['transaction'] = $this->M_admin->notif_transaction();
        if ($this->form_validation->submitted()) {

            $this->form_validation
                ->name('U_unit')->required()
                ->name('U_id')->required();
            if ($this->form_validation->run()) {
                return $this->M_admin->update_unit_of_measure(
                    $this->io->post('U_id'),
                    $this->io->post('U_unit')
                );
            }
        }
    }

    // SHOW COURIER PAGE
    public function courier()
    {
        $data['transaction'] = $this->M_admin->notif_transaction();
        // CHECK IF WHOS LOGGED IN IS ADMIN: IF TRUE, WILL NO BE DIRECTED TO LOGIN PAGE
        $this->isAdmin();
        $data['couriers'] = $this->M_admin->courier();
        $this->call->view('admin/courier', $data);
    }

    //  ADD COURIER
    public function add_courier()
    {
        $data['transaction'] = $this->M_admin->notif_transaction();
        if ($this->form_validation->submitted()) {
            $this->form_validation
                ->name('contact')
                ->required()
                ->min_length(11)
                ->max_length(13)
                ->name('email')
                ->required()
                ->valid_email()
                ->name('fname')
                ->required()
                ->min_length(1)
                ->max_length(20)
                ->name('mname')
                ->required()
                ->min_length(1)
                ->max_length(20)
                ->name('lname')
                ->required()
                ->min_length(1)
                ->max_length(20)
                ->name('username')
                ->required()
                ->min_length(5)
                ->max_length(20)
                ->name('pass')
                ->required()
                ->name('rePass')
                ->required();
            if ($this->form_validation->run()) {
                $targetDir = 'public/images/courier/';
                $fileName = $this->upload->uploadImg($targetDir, 'courierImg');
                if (strlen($fileName) > 0) {
                    $this->M_admin->add_courier(
                        $this->io->post('email'),
                        $this->io->post('username'),
                        $this->io->post('pass'),
                        $this->io->post('fname'),
                        $this->io->post('mname'),
                        $this->io->post('lname'),
                        str_replace('-', '', $this->io->post('contact'))
                    );
                    $id = $this->M_admin->lastCourier();
                    echo 'as';
                    rename(
                        $targetDir . $fileName,
                        $targetDir . $id['MAX(admin_id)'] . '.jpg'
                    );
                }
            } else {
                $this->session->set_flashdata([
                    'input_err' => 'Invalid Input!',
                ]);
            }
            redirect('Admin/courier');
        }
    }

    // Update Marketer
    public function update_courier()
    {
        $data['transaction'] = $this->M_admin->notif_transaction();
        if ($this->form_validation->submitted()) {

            $this->form_validation
                ->name('Uid')->required()
                ->name('Ufname')->required()
                ->min_length(1)
                ->max_length(30)
                ->name('Umname')->required()
                ->min_length(1)
                ->max_length(30)
                ->name('Ucontact')->required()
                ->min_length(1)
                ->max_length(20)
                ->name('Uusername')->required()
                ->min_length(1)
                ->max_length(20)
                ->name('Ulname')->required()
                ->min_length(1)
                ->max_length(30)
                ->name('Uemail')->required()->valid_email();
            if ($this->form_validation->run()) {

                if (strlen($_FILES['Uimage']['name']) > 0) {
                    $this->call->model('upload');
                    $targetDir = "public/images/courier/";
                    $fileName = $this->upload->uploadImg($targetDir, "Uimage");

                    // CHECK IF FILENAME HAS VALUE(MEANS THE UPLOAD HAS COMPLETED WITHOUT ERROR)
                    if (strlen($fileName) > 0) {
                        $this->M_admin->updateCourier(
                            $this->io->post('Uid'),
                            $this->io->post('Ufname'),
                            $this->io->post('Umname'),
                            $this->io->post('Ulname'),
                            $this->io->post('Ucontact'),
                            $this->io->post('Uemail'),
                            $this->io->post('Uusername')
                        );
                        unlink($targetDir . $this->io->post('Uid') . '.jpg');
                        rename($targetDir . $fileName, $targetDir . $this->io->post('Uid') . '.jpg');
                        redirect('Admin/courier/');
                    } else
                        echo 'Upload Failed';
                } else {
                    $this->M_admin->updateCourier(
                        $this->io->post('Uid'),
                        $this->io->post('Ufname'),
                        $this->io->post('Umname'),
                        $this->io->post('Ulname'),
                        $this->io->post('Ucontact'),
                        $this->io->post('Uemail'),
                        $this->io->post('Uusername')
                    );
                    redirect('Admin/courier');
                }
            }
        }
    }










    //-----------------------------------------COURIER-----------------------------------------
    public function delivered()
    {
        $data['transaction'] = $this->M_admin->notif_transaction();
        $this->call->model('mailer');
        $this->call->model('M_marketer');
        $body = '                    
        <div 
        style="
        padding-top: 15px;
        padding-bottom: 25px;
        background-color: rgba(240, 255, 255, 0.68);
        border-top: 10px solid;
        border-color: chocolate ;">
            <center>
            
                <h1 
                style="
                color:chocolate;
                margin-bottom: 20px;">
                    Order Delivered
                </h1>

                <h5 style="color:black">An order with transaction number ' . str_pad($this->io->post('trans_id'), 8, "0", STR_PAD_LEFT) . '  has been successfully delivered!</h5>

                <p style="color:chocolate">Thank you for choosing Online Palengke!</p>
            </center>
        </div>
';

        if ($this->mailer->sendCode('onlinepalengke2022@gmail.com', 'Successfully Delivered', $body) == 'Link has been sent.') {
            $sess = array(
                'email_succ' => 'Email has been sent successfully.'
            );
            $this->M_marketer->update($this->io->post('trans_id'), 'D', "delivered");
            $this->session->set_flashdata($sess);
        }
        redirect('Marketer/OnDelivery/');
    }

















    public function Pending()
    {
        $data['transaction'] = $this->M_admin->notif_transaction();
        $data['order'] = $this->M_admin->pending();
        $this->call->view('admin/pending', $data);
    }

    public function OnProcess()
    {
        $data['transaction'] = $this->M_admin->notif_transaction();
        $data['order'] = $this->M_admin->onprocess();
        $data['courier'] = $this->M_admin->courier();
        $this->call->view('admin/onprocess', $data);
    }

    public function OnDelivery()
    {
        $data['transaction'] = $this->M_admin->notif_transaction();
        $data['order'] = $this->M_admin->ondelivery();
        $this->call->view('admin/ondelivery', $data);
    }
    public function Finished()
    {
        $data['transaction'] = $this->M_admin->notif_transaction();
        $data['order'] = $this->M_admin->finished();
        $this->call->view('admin/finished', $data);
    }




    public function try()
    {
        $this->call->model('M_marketer');
        $this->M_marketer->nextMarketer();
    }




    public function UpdateOrder()
    {
        $data['transaction'] = $this->M_admin->notif_transaction();
        $this->call->model('M_marketer');
        $this->call->model('mailer');
        $subj = "";
        $body = "";
        $id = "";
        if (isset($_POST['decline'])) {
            $status = "D";
            $id = $this->io->post('trans_id');
            $subj = "Order Declined";
            $customer = $this->M_marketer->cust_info($this->io->post('trans_id'));
            $reciever = $customer['cust_email'];
            $body = '                    
                <div 
                style="
                padding-top: 15px;
                padding-bottom: 25px;
                background-color: rgba(240, 255, 255, 0.68);
                border-top: 10px solid;
                border-color: chocolate ;">
                    <center>
                        <h1 
                        style="
                        color:chocolate;
                        margin-bottom: 20px;">
                        Order Declined
                        </h1>
                        <h5 style="color:black">Your order ' . str_pad($this->io->post('trans_id'), 8, "0", STR_PAD_LEFT) . ' has been declined for some reason!</h5>
            
                        <p style="color:chocolate">Sorry for the inconvenience! Please keep on choosing Online Palengke!</p>
                    </center>
                </div>';

            // CHECK IF EMAIL SUCCESSFULLY SENT
            if ($this->mailer->sendCode($reciever, $subj, $body) == 'Link has been sent.') {
                $this->M_marketer->update($id, $status, "cancel");
                $sess = array(
                    'email_succ' => 'Email has been sent successfully.'
                );
                $this->session->set_flashdata($sess);
                redirect('Admin/Pending');
                exit;
            } else {
                $sess = array(
                    'email_err' => 'Email sending failed. Please try again.'
                );
                $this->session->set_flashdata($sess);
                redirect('Admin/Pending');
                exit;
            }
        }
        if (isset($_POST['accept'])) {
            $status = "OP";
            $subj = "Order Confirmed";
            $id = $this->io->post('trans_id');
            $cart = $this->M_marketer->cart($this->io->post('trans_id'));
            $customer = $this->M_marketer->cust_info($this->io->post('trans_id'));
            $reciever = $customer['cust_email'];
            $body = '                    
                                    <div 
                                    style="
                                    padding-top: 15px;
                                    padding-bottom: 25px;
                                    background-image: linear-gradient(345deg, #730703 0%, orange 74%);
                                    border-top: 5px solid;
                                    border-radius:10px;
                                    ">
                                        <center>
                                            <h1 
                                                style="
                                                color:rgba(255,255,255,.9);
                                                margin-bottom: 50px;
                                                ">
                                                    Order Confirmed
                                            </h1>
                                            <h4 style="color:rgba(255,255,255,.7);">Your are assigned to deliver the customer order with transaction number ' . str_pad($this->io->post('trans_id'), 8, "0", STR_PAD_LEFT) . ' !.</h4>
                                            <h3>Your Orders</h3>
                                            <table width="90%" style="border-collapse: collapse;">
                                                <thead>
                                                    <tr style="color:#730703;font-weight: bold;">
                                                        <td>Item</td>
                                                        <td style="text-align: right;">Price</td>
                                                        <td style="text-align: center;">Quantity</td>
                                                        <td style="text-align: right;">Total</td>
                                                    </tr>
                                                </thead>
                                                <tbody>';
            $sub = 0;
            foreach ($cart as $c) {
                $body = $body . ' <tr>
                                                    <td>' . $c['prod_name'] . '</td>
                                                    <td style="text-align: right;">₱' . number_format($c['prod_price'], 2) . '</td>
                                                    <td style="text-align: center;">' . $c['quantity'] . ' ' . $c['unit'] . '</td>
                                                    <td style="text-align: right;">₱' . number_format($c['prod_price'] * $c['quantity'], 2) . '</td>
                                                </tr>';
                $sub += $c['prod_price'] * $c['quantity'];
            }
            $body .= '
                                                   
                                                    <tr style="border-bottom: 1pt solid black;">
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td style="text-align: right;"><b>Sub-total</b></td>
                                                        <td style="text-align: right;"><b>₱' . number_format($sub, 2) . '</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td style="text-align: right;"><b>Shipping fee</b></td>
                                                        <td style="text-align: right;"><b>₱' . number_format($customer['delivery_fee'], 2) . '</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td style="text-align: right;"><b>Total</b></td>
                                                        <td style="text-align: right;"><b>₱' . number_format($sub + $customer['delivery_fee'], 2) . '</b></td>
                                                    </tr>
                                                </tbody>
                                            </table>
    
                                            <h5 style="color:rgba(255,255,255,.7);">Thank you for choosing Online Palengke!</h5>
                                        </center>
                                    </div>
                            ';
            if ($this->mailer->sendCode($reciever, $subj, $body) == 'Link has been sent.') {
                $this->M_marketer->update($id, $status, "process", $this->M_marketer->nextMarketer());
                $sess = array(
                    'email_succ' => 'Email has been sent successfully.'
                );
                $this->session->set_flashdata($sess);
                redirect('Admin/Pending');
                exit;
            } else {
                $sess = array(
                    'email_err' => 'Email sending failed. Please try again.'
                );
                $this->session->set_flashdata($sess);
                redirect('Admin/Pending');
                exit;
            }
        }
    }
}
