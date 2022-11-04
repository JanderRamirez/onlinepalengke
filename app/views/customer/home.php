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
    <link rel="stylesheet" href="<?=BASE_URL . PUBLIC_DIR ?>/css/customer/style.css" type="text/css">
    <link rel="stylesheet" href="<?=BASE_URL . PUBLIC_DIR ?>/css/customer/hover.css" type="text/css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    
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
                <li><a href="<?=site_url('Customer/Cart');?>" class="hvr-icon-grow"><i class="fa fa-shopping-bag fa-4x hvr-icon " style="--fa-primary-color: orangered ;"></i> <span id="cartcount1"><?=sizeof($data['cart']);?></span></a></li>
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
                <li class="active"><a href="<?= site_url('Customer/Home')?>">Home</a></li>
                <li><a href="<?= site_url('Customer/Order')?>">Orders</a></li>
                <li><a href="<?=site_url('Customer/Cart');?>">Cart</a></li>
                <li><a href="<?=site_url('Customer/Contact');?>">Contact</a></li>
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
                                    <li ><a  href="'.site_url("Account/Logout").'"><i class = "fa fa-sign-out text-white"></i>&nbspLogout</a></li>
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
                            <li class="active"><a href="<?= site_url('Customer/Home')?>">Home</a></li>
                            <li><a href="<?= site_url('Customer/Order')?>">Orders</a></li>
                            <li><a href="<?=site_url('Customer/Cart');?>">Cart</a></li>
                            <li><a href="<?=site_url('Customer/Contact');?>">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-1">
                    <div class="header__cart">
                        <ul>
                            <!-- <li><a href="#"><i class="fad fa-heart"></i> <span>1</span></a></li> -->
                            
                            <li><a href="<?=site_url('Customer/Cart');?>" class="hvr-icon-grow"><i class="fa fa-shopping-bag fa-4x hvr-icon " style="--fa-primary-color: orangered ;"></i> <span id="cartcount2"><?=sizeof($data['cart']);?></span></a></li>
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
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fad fa-bars" style="--fa-primary-color: gold ;"></i>
                            <span>All Categories</span>
                        </div>
                        <ul class = "p-0">
                            <?php foreach($data['category'] as $cat){
                                ?>
                            <li class= "hvr-sweep-to-right"><a class = "ml-4" href="<?=site_url('Customer/Search/'.$cat['cat_id'])?>"><?=ucfirst($cat['category']);?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="<?=site_url('Customer/Result/')?>" method="POST">
                                <input type="text" name = "search" data-ref="input-search" placeholder="What do yo u need?" required>
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="<?=BASE_URL . PUBLIC_DIR?>/images/customer/static/banner2.png">
                        <div class="hero__text">
                            <span class="">PRODUCT FRESH</span>
                            <h2 class="">Vegetable <br />100% Organic</h2>
                            <p class="text-dark">Pickup and Delivery Available</p>
                            <!-- <h5 class="text-dark">Don't panic, it's Organic! 👌</h5> -->
                            <a href="#middle" class="primary-btn hvr-glow">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                <?php foreach($data['category'] as $cat){ ?>
                           <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="<?=BASE_URL . PUBLIC_DIR?>/images/customer/category/<?=$cat['category'];?>    ">
                            <h5><a class="primary-btn rainbowGradient" href="<?=site_url('Customer/Search/'.$cat['cat_id'])?>"><?=$cat['category'];?></a></h5>
                        </div>
                    </div>
                            <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->
<!-- Latest Product Section Begin -->
<?php if ($this->session->has_userdata('username')){?>
<section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Just For You</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item" >
                            <?php $count =0; foreach($data['jfy'] as $jfy){ if($count == 3){echo '</div>
                            <div class="latest-prdouct__slider__item">';} $count++;?>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width: 110px" src="<?=BASE_URL . PUBLIC_DIR?>/images/products/<?=$jfy['prod_id'];?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?=$jfy['prod_name'];?></h6>
                                        <span>₱<?=number_format($jfy['prod_price'],2);?></span>
                                    </div>
                                </a>
                                <?php } ?>
                            
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Selling Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item" >
                            <?php $count =0; foreach($data['tsp'] as $tsp){ if($count == 3){echo '</div>
                            <div class="latest-prdouct__slider__item">';} $count++;?>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width: 110px" src="<?=BASE_URL . PUBLIC_DIR?>/images/products/<?=$tsp['prod_id'];?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?=$tsp['prod_name'];?></h6>
                                        <span>₱<?=number_format($tsp['prod_price'],2);?></span>
                                    </div>
                                </a>
                                <?php } ?>
                            
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Previous Purchased</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item" >
                            <?php $count =0; foreach($data['lpp'] as $lpp){ if($count == 3){echo '</div>
                            <div class="latest-prdouct__slider__item">';} $count++;?>
                                <a href="#" class="latest-product__item ">
                                    <div class="latest-product__item__pic">
                                        <img style="width: 110px" src="<?=BASE_URL . PUBLIC_DIR?>/images/products/<?=$lpp['prod_id'];?>" alt="">
                                    </ul>
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?=$lpp['prod_name'];?></h6>
                                        <span>₱<?=number_format($lpp['prod_price'],2);?></span>
                                    </div>
                                </a>
                                <?php } ?>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
    <!-- Latest Product Section End -->
    <!-- Featured Section Begin -->
    <section class="featured spad" id="middle">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>All Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <?php foreach ($data['category'] as $cat){ ?>
                            <li data-filter=".<?=$cat['category'];?>"><?=strtoupper($cat['category']);?></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter" data-ref="container">
                <?php foreach ($data['product']['product'] as $product){ ?>
                <div class="col-lg-2 col-md-3 col-sm-4 col-4 mix oranges <?=$product['category'];?> <?=$product['prod_name'];?>">
                    <div class="bg-opacity-100 featured__item card border-0 shadow">
                        <div class="featured__item__pic set-bg" data-setbg="<?=BASE_URL . PUBLIC_DIR?>/images/products/<?=$product['prod_id'];?>">
                            <ul class="featured__item__pic__hover">
                                <li><a class="addtocart" id = "<?php if($this->session->has_userdata('username')) echo 'login'; echo $product['prod_id']; ?>"><i class="fa fa-shopping-cart "></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text bg-gradient-primary pb-2">
                            <h6><a href="#"><?=$product['prod_name'];?></a></h6>
                            <h5>₱<?=number_format($product['prod_price'],2);?></h5>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="row justify-content-center">
            <?php echo $data['product']['pagination']; ?>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <?php include 'addtocartmodal.php' ?>
    <?php include 'footer.php' ?>

    

    <!-- Js Plugins -->
    <script src="<?=BASE_URL . PUBLIC_DIR ?>/js/customer/jquery-3.3.1.min.js"></script>
    <script src="<?=BASE_URL . PUBLIC_DIR ?>/js/customer/bootstrap.min.js"></script>
    <script src="<?=BASE_URL . PUBLIC_DIR ?>/js/customer/jquery.nice-select.min.js"></script>
    <script src="<?=BASE_URL . PUBLIC_DIR ?>/js/customer/jquery-ui.min.js"></script>
    <script src="<?=BASE_URL . PUBLIC_DIR ?>/js/customer/jquery.slicknav.js"></script>
    <script src="<?=BASE_URL . PUBLIC_DIR ?>/js/customer/mixitup.min.js"></script>
    <script src="<?=BASE_URL . PUBLIC_DIR ?>/js/customer/owl.carousel.min.js"></script>
    <script>var addtocart = "<?= site_url('api/addtocart'); ?>";</script>
    <script src="<?=BASE_URL . PUBLIC_DIR ?>/js/customer/main.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>


    


    <script>


 
        


    var container = document.querySelector('[data-ref="container"]');
            var inputSearch = document.querySelector('[data-ref="input-search"]');
            var keyupTimeout;

            var mixer = mixitup(container, {
                animation: {
                    duration: 350
                },
                callbacks: {
                    onMixClick: function() {
                        // Reset the search if a filter is clicked

                        if (this.matches('[data-filter]')) {
                            inputSearch.value = '';
                        }
                    }
                }
            });

            // Set up a handler to listen for "keyup" events from the search input

            inputSearch.addEventListener('keyup', function() {
                var searchValue;

                if (inputSearch.value.length < 3) {
                    // If the input value is less than 3 characters, don't send

                    searchValue = '';
                } else {
                    searchValue = inputSearch.value.toLowerCase().trim();
                }

                // Very basic throttling to prevent mixer thrashing. Only search
                // once 350ms has passed since the last keyup event

                clearTimeout(keyupTimeout);

                keyupTimeout = setTimeout(function() {
                    filterByString(searchValue);
                }, 350);
            });

            /**
             * Filters the mixer using a provided search string, which is matched against
             * the contents of each target's "class" attribute. Any custom data-attribute(s)
             * could also be used.
             *
             * @param  {string} searchValue
             * @return {void}
             */

            function filterByString(searchValue) {
                if (searchValue) {
                    // Use an attribute wildcard selector to check for matches

                    mixer.filter('[class*="' + searchValue + '"]');
                } else {
                    // If no searchValue, treat as filter('all')

                    mixer.filter('all');
                }
            }
    </scrip>

</body>

</html>