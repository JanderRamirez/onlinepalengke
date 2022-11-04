<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

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
</head>

<body>
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

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
                <li  class="active"><a href="<?=site_url('Customer/Contact');?>">Contact</a></li>
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
                            <li  class="active"><a href="<?=site_url('Customer/Contact');?>">Contact</a></li>
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

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg align-items-center" data-setbg="<?=BASE_URL . PUBLIC_DIR?>/images/customer/static/breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Phone</h4>
                        <p>+01-3-8888-6868</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>Address</h4>
                        <p>Juan Luna Street
Calapan, 5200
Philippines</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"></span>
                        <h4>Open time</h4>
                        <p>06:00 am to 06:00 pm</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p>onlinepalengke2022@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Begin -->
    <div class="map" style="height: 400px;width: 100%;">
        <!-- <div class="map-inside">
            <i class="icon_pin"></i>
            <div class="inside-widget">
                <h4>New York</h4>
                <ul>
                    <li>Phone: +12-345-6789</li>
                    <li>Add: 16 Creek Ave. Farmingdale, NY</li>
                </ul>
            </div>
        </div> -->
    </div>
    <!-- Map End -->

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Leave Message</h2>
                    </div>
                </div>
            </div>
            <form action="#">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Your name">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Your Email">
                    </div>
                    <div class="col-lg-12 text-center">
                        <textarea placeholder="Your message"></textarea>
                        <button type="submit" class="site-btn">SEND MESSAGE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact Form End -->

    <?php include 'footer.php' ?>

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly"
      defer
    ></script>
    <script>
        // Initialize and add the map
function initMap(): void {
  // The location of Uluru
  const uluru = { lat: -25.344, lng: 131.031 };
  // The map, centered at Uluru
  const map = new google.maps.Map(
    document.getElementById("map") as HTMLElement,
    {
      zoom: 4,
      center: uluru,
    }
  );

  // The marker, positioned at Uluru
  const marker = new google.maps.Marker({
    position: uluru,
    map: map,
  });
}

declare global {
  interface Window {
    initMap: () => void;
  }
}
window.initMap = initMap;

    </script>



</body>

</html>