<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Palengke</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?=BASE_URL . PUBLIC_DIR ?>/css/customer/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?=BASE_URL . PUBLIC_DIR ?>/css/customer/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?=BASE_URL . PUBLIC_DIR ?>/css/customer/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?=BASE_URL . PUBLIC_DIR ?>/css/customer/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?=BASE_URL . PUBLIC_DIR ?>/css/customer/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?=BASE_URL . PUBLIC_DIR ?>/css/customer/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?=BASE_URL . PUBLIC_DIR ?>/css/customer/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="<?=BASE_URL . PUBLIC_DIR ?>/css/customer/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="<?=BASE_URL . PUBLIC_DIR?>/images/logo2" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            
            <div class="header__top__right">
            <ul>
                <li><a href="<?=site_url('Customer/Cart');?>" class="hvr-icon-grow"><i class="fa fa-shopping-bag fa-4x hvr-icon " style="--fa-primary-color: orangered ;"></i> <span id="cartcount"><?=sizeof($data['cart']);?></span></a></li>
            </ul>
                            <div class="header__top__right__language">
                                <div><i class="fa fa-user">  </i>  
                                <?php if($this->session->has_userdata('username')){
                                    echo '<span>  '.$this->session->userdata('username').'</span>';
                                    echo '<span class="arrow_carrot-down"></span>
                                    <ul>
                                    <li><a  href="'.site_url("Customer/Profile").'"><i class = "fa fa-user text-white"></i>&nbspProfile</a></li>
                                    <li><a  href="'.site_url("Account/Logout").'"><i class = "fa fa-sign-out text-white"></i>&nbspLogout</a></li>
                                    </ul>';
                                } else{
                                    echo  '<span> <i  class ="arrow_carrot-down"></i></span><ul>
                                    <li><a style = "text-decoration: none;" href="'.site_url("Account/Login").'"> Login</a>/li>
                                    </ul>';
                                }
                                ?> </div>
                            </div>
                        </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li><a href="<?= site_url('Customer/Home')?>">Home</a></li>
                <li><a href="<?= site_url('Customer/Order')?>">Orders</a></li>
                <li><a href="<?=site_url('Customer/Cart');?>">Cart</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> onlinepalengke2022@gmail.com</li>
                
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top" style="background-color:orange">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> onlinepalengke2022@gmail.com</li>
                                <li>You made the right choice</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__language">
                                <div><i class="fa fa-user">  </i>  
                                <?php if($this->session->has_userdata('username')){
                                    echo '<span>  '.$this->session->userdata('username').'</span>';
                                    echo '<span class="arrow_carrot-down"></span>
                                    <ul>
                                    <li><a  href="'.site_url("Customer/Profile").'"><i class = "fa fa-user text-white"></i>&nbspProfile</a></li>
                                    <li><a  href="'.site_url("Account/Logout").'"><i class = "fa fa-sign-out text-white"></i>&nbspLogout</a></li>
                                    </ul>';
                                } else{
                                    echo  '<span> <i  class ="arrow_carrot-down"></i></span><ul>
                                    <li><a style = "text-decoration: none;" href="'.site_url("Account/Login").'"> Login</a>/li>
                                    </ul>';
                                }
                                ?> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="<?= site_url('Customer/Home')?>"><img src="<?=BASE_URL . PUBLIC_DIR?>/images/logo2" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="<?= site_url('Customer/Home')?>">Home</a></li>
                            <li><a href="<?= site_url('Customer/Order')?>">Orders</a></li>
                            <li><a href="<?=site_url('Customer/Cart');?>">Cart</a></li>
                            <li><a href="./contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-1">
                    <div class="header__cart">
                        <ul>
                            <!-- <li><a href="#"><i class="fad fa-heart"></i> <span>1</span></a></li> -->
                            
                            <li><a href="<?=site_url('Customer/Cart');?>" class="hvr-icon-grow"><i class="fa fa-shopping-bag fa-4x hvr-icon " style="--fa-primary-color: orangered ;"></i> <span id="cartcount"><?=sizeof($data['cart']);?></span></a></li>
                        </ul>
                        <!-- <div class="header__cart__price">item: <span>Php 100</span></div> -->
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->

    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="<?=BASE_URL . PUBLIC_DIR?>/images/customer/static/breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Profile</h2>
                        <!-- <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Profile Details</h4>
                <form action="<?=site_url('Customer/Place')?>" method="post">
                    <div class="row">
                        
                        <div class="container rounded bg-white pt-4 pb-4 shadow-lg">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="<?=BASE_URL . PUBLIC_DIR ?>/images/logo.png">
            <span class="font-weight-bold"><?=$prof_info['cust_fname'];?> <?=$prof_info['cust_lname'];?></span>
            <span class="text-black-50"><?=$prof_info['cust_email'];?></span><span> </span></div>
        </div>
        <div class="col-md-9 border-right">
        <div class="col-lg-12 col-md-12 col-sm-12  p-4">
                            <div class="row">
                                <div class="mb-3 col-12 col-md-4">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" value = "<?=$prof_info['cust_fname'];?>" required>
                                    </div>
                                </div>
                                <div class="mb-3 col-12 col-md-4">
                                    <div class="checkout__input">
                                        <p>Middle Name<span>*</span></p>
                                        <input type="text" value = "<?=$prof_info['cust_mname'];?>" required>
                                    </div>
                                </div>
                                <div class="mb-3 col-12 col-md-4">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" value = "<?=$prof_info['cust_lname'];?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-12 col-md-4">
                                    <div class="checkout__input">
                                        <p>Sex<span>*</span></p>
                                        <?php
                                        $sex = "male";
                                        if ( $prof_info['cust_sex']== "f"){
                                            $sex = 'female';
                                        }
                                        ?>
                                        <select id="sex" name="sex" class="" required>
                                            <option value="male" <?php if ($sex == 'male') echo 'selected';
                                                                    else echo 'selected'; ?>>Male</option>
                                            <option value="female" <?php if ($sex == 'female') echo 'selected';
                                                                    else echo ''; ?>>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 col-12 col-md-4">
                                    <div class="checkout__input">
                                        <p>Birthday<span>*</span></p>
                                        <input type="date" value = "<?=$prof_info['cust_birthdate'];?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-12 col-md-6">
                                    <div class="checkout__input">
                                        <p>Barangay<span>*</span></p>
                                        <select id="barangay" name="barangay" class="checkout__input__add" required>
                                    <?php foreach ($barangays as $barangay) {
                                        $isSelected = '';
                                        if ( $prof_info['brgy_id']== $barangay['brgy_id'])
                                            $isSelected = 'selected';
                                    ?>
                                        <option value="<?= htmlspecialchars($barangay['brgy_id']) ?>" <?= $isSelected ?>><?= htmlspecialchars($barangay['brgy_name']) ?></option>
                                    <?php } ?>
                                </select>
                                    </div>
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <div class="checkout__input">
                                        <p>Street / House Number<span>*</span></p>
                                        <input type="text" value = "<?=$prof_info['street'];?>" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" value = "<?=$prof_info['cust_cnum'];?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" value = "<?=$prof_info['cust_email'];?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex d-flex flex-row align-items-center justify-content-end ">
                                    <div class="shoping__cart__btns">
                                        <a href="<?= site_url('Customer/Home') ?>" class="primary-btn">SAVE CHANGES</a>
                                    </div>
                                </div>
                            </div>
                        </div>
        </div>
       
    </div>
</div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

    <?php include 'footer.php' ?>

    <!-- Js Plugins -->
    <script src="<?=BASE_URL . PUBLIC_DIR ?>/js/customer/jquery-3.3.1.min.js"></script>
    <script src="<?=BASE_URL . PUBLIC_DIR ?>/js/customer/bootstrap.min.js"></script>
    <script src="<?=BASE_URL . PUBLIC_DIR ?>/js/customer/jquery.nice-select.min.js"></script>
    <script src="<?=BASE_URL . PUBLIC_DIR ?>/js/customer/jquery-ui.min.js"></script>
    <script src="<?=BASE_URL . PUBLIC_DIR ?>/js/customer/jquery.slicknav.js"></script>
    <script src="<?=BASE_URL . PUBLIC_DIR ?>/js/customer/mixitup.min.js"></script>
    <script src="<?=BASE_URL . PUBLIC_DIR ?>/js/customer/owl.carousel.min.js"></script>
    <script src="<?=BASE_URL . PUBLIC_DIR ?>/js/customer/main.js"></script>

 

</body>

</html>