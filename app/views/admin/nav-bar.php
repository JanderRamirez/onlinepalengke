<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3 d-flex align-content-between" href="<?= site_url('Admin/Dashboard/') ?>">
        <img src="<?= BASE_URL . PUBLIC_DIR . "/images/logo.png" ?>" alt="Online Palengke Logo" height="26rem"> Online Palengke</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></div>
    <!-- Navbar-->

    
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fad fa-user fa-fw text-info"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">Settings</a></li>
                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href="<?php echo site_url('Account/Login') ?>">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <?php if ($this->session->userdata('admin_type') == '1') { ?>
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="<?= site_url('Admin/Dashboard') ?>">
                            <div class="sb-nav-link-icon"><i class="fad fa-tachometer-alt text-info"></i></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a style="cursor: pointer;" class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseMarketer" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fad fa-user-tie text-info"></i></div>
                            Marketer
                            <div class="sb-sidenav-collapse-arrow"><i class="fad fa-angle-down text-info"></i></div>
                        </a>
                        <div class="collapse" id="collapseMarketer" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= site_url('Admin/Marketer/') ?>"><i class="fad fa-address-book text-info"></i>&nbsp Marketer List</a>
                                <a style="cursor: pointer;" class="nav-link" data-bs-toggle="modal" data-bs-target="#addMarketer"><i class="fad fa-user-plus text-info"></i>&nbspAdd Marketer</a>
                            </nav>
                        </div>







                        <a style="cursor: pointer;" class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseCourier" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fad fa-motorcycle text-info"></i></div>
                            Courier
                            <div class="sb-sidenav-collapse-arrow"><i class="fad fa-angle-down text-info"></i></div>
                        </a>
                        <div class="collapse" id="collapseCourier" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= site_url('Admin/courier/') ?>"><i class="fad text-info fa-clipboard-list"></i>&nbsp Courier List</a>
                                <a style="cursor: pointer;" class="nav-link" data-bs-toggle="modal" data-bs-target="#addCourier"><i class="fad fa-user-plus text-info"></i>&nbspAdd Courier</a>
                            </nav>
                        </div>






                        <a style="cursor: pointer;" class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseProducts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fad fa-inventory text-info"></i></div>
                            Products
                            <div class="sb-sidenav-collapse-arrow"><i class="fad fa-angle-down text-info"></i></div>
                        </a>
                        <div class="collapse" id="collapseProducts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= site_url('Admin/Product/') ?>"><i class="fad fa-list-alt text-info"></i>&nbspProduct List</a>
                                <a style="cursor: pointer;" class="nav-link" data-bs-toggle="modal" data-bs-target="#addProduct"><i class="fad fa-cart-plus text-info"></i>&nbspAdd Product</a>
                                <a style="cursor: pointer;" class="nav-link" href="<?= site_url('Admin/Update') ?>"><i class="fad fa-edit text-info"></i>&nbspUpdate Products</a>
                            </nav>
                        </div>

                        <a style="cursor: pointer;" class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseShops" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fad fa-store text-info"></i></div>
                            Shops
                            <div class="sb-sidenav-collapse-arrow"><i class="fad fa-angle-down text-info"></i></div>
                        </a>
                        <div class="collapse" id="collapseShops" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= site_url('Admin/Shop/') ?>"><i class="fad fa-list-alt text-info"></i>&nbspShop List</a>
                                <a style="cursor: pointer;" class="nav-link" data-bs-toggle="modal" data-bs-target="#modalAdd"><i class="fad fa-plus text-info"></i>&nbspAdd Shop</a>
                                <a style="cursor: pointer;" class="nav-link" data-bs-toggle="modal" data-bs-target="#modalAddOwner"><i class="fad fa-plus text-info"></i>&nbspAdd Owner</a>
                            </nav>
                        </div>
                    <?php } ?>

                    <?php if ($this->session->userdata('admin_type') == '3') { ?>
                        <a class="nav-link" href="<?= site_url('Marketer/OnDelivery/') ?>">
                            <div class="sb-nav-link-icon"><i class="fad fa-shipping-fast text-info me-2" aria-hidden="true"></i></div>On Delivery
                        </a>
                        <a class="nav-link" href="<?= site_url('Marketer/Finished/') ?>">
                            <div class="sb-nav-link-icon"><i class="fad fa-shipping-fast text-info me-2" aria-hidden="true"></i></div>Finished
                        </a>
                    <?php } ?>

                    <?php if ($this->session->userdata('admin_type') != '3') { ?>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fad fa-list-alt text-info"></i></div>
                            Orders&nbsp;<span class="badge badge-pill button__badge badge-danger" id="bTotal">
                                <?php if ($this->session->userdata('admin_type') == '1')
                                         echo $transaction['pending']['total']+$transaction['process']['total']+$transaction['delivery']['total'];
                                        else
                                            echo $transaction['process']['total']+$transaction['delivery']['total']+$transaction['successful']['total'];
                                ?></span>
                            
                            <div class="sb-sidenav-collapse-arrow"><i class="fad text-info fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">

                            <?php if ($this->session->userdata('admin_type') == '1') { ?>
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?= site_url('Admin/Pending/') ?>"><i class="fad fa-arrow-right text-info pe-2" aria-hidden="true"></i>&nbspPending
                                    &nbsp;<span class="badge badge-pill button__badge badge-danger" id="bPending"><?=$transaction['pending']['total'];?></span>
                                    </a>
                                    <a class="nav-link" href="<?= site_url('Admin/OnProcess/') ?>"><i class="fad fa-spinner-third text-info fa-spin me-2" aria-hidden="true"></i>&nbspOn Process
                                    &nbsp;<span class="badge badge-pill button__badge badge-danger" id="bProcess"><?=$transaction['process']['total'];?></span>    
                                    </a>
                                    <a class="nav-link" href="<?= site_url('Admin/OnDelivery/') ?>"><i class="fad fa-shipping-fast text-info me-2" aria-hidden="true"></i>On Delivery
                                    &nbsp;<span class="badge badge-pill button__badge badge-danger" id="bDelivery"><?=$transaction['delivery']['total'];?></span>
                                    </a>
                                    <a class="nav-link" href="<?= site_url('Admin/Finished/') ?>"><i class="fad fa-check-circle text-info me-2" aria-hidden="true"></i>Finished</a>
                                </nav>
                            <?php } else { ?>
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?= site_url('marketer/OnProcess/') ?>"><i class="fad fa-spinner-third text-info fa-spin me-2" aria-hidden="true"></i>&nbspOn Process</a>
                                    <a class="nav-link" href="<?= site_url('marketer/OnDelivery/') ?>"><i class="fad fa-shipping-fast text-info me-2" aria-hidden="true"></i>On Delivery</a>
                                    <a class="nav-link" href="<?= site_url('marketer/Finished/') ?>"><i class="fad fa-check-circle text-info me-2" aria-hidden="true"></i>Finished</a>
                                </nav>
                            <?php } ?>


                        </div>
                    <?php } ?>
                    <?php if ($this->session->userdata('admin_type') == '1') { ?>
                        <a class="nav-link" href="<?= site_url('Admin/Miscellaneous/delivery-fee') ?>">
                            <div class="sb-nav-link-icon"><i class="fad fa-ellipsis-v text-info"></i></div>
                            Miscellaneous
                        </a>
                    <?php } ?>


                    <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Pages
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a> -->
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                Authentication
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a> -->
                            <!-- <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="login.html">Login</a>
                                    <a class="nav-link" href="register.html">Register</a>
                                    <a class="nav-link" href="password.html">Forgot Password</a>
                                </nav>
                            </div> -->
                            <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                Error
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a> -->
                            <!-- <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages"> -->
                            <!-- <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="401.html">401 Page</a>
                                    <a class="nav-link" href="404.html">404 Page</a>
                                    <a class="nav-link" href="500.html">500 Page</a>
                                </nav> -->
                            <!-- </div> -->
                        </nav>
                    </div>
                    <!-- <div class="sb-sidenav-menu-heading">Addons</div> -->
                    <!-- <a class="nav-link" href="charts.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Charts
                    </a>
                    <a class="nav-link" href="tables.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Tables
                    </a> -->
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Start Bootstrap
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>