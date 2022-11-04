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
                <li class="active"><a href="<?=site_url('Customer/Cart');?>">Cart</a></li>
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
                            <li class="active"><a href="<?=site_url('Customer/Cart');?>">Cart</a></li>
                            <li><a href="<?=site_url('Customer/Contact');?>">Contact</a></li>
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

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            if(!$cart){
                                echo "<tr><td colspan='5' class='text-center'>Your cart is empty!</td></tr>";
                            }
                            $total=0; foreach ($data['cart'] as $product){ 
                                $total +=($product['prod_price']* $product['quantity']);
                                ?>
                                <tr id='cart<?= $product['cart_id'];?>'>
                                    <td class="shoping__cart__item">
                                        <img style="width:80px;height:80px" src="<?=BASE_URL . PUBLIC_DIR?>/images/products/<?=$product['prod_id'];?>" alt="">
                                        <h5><?= $product['prod_name'];?></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                    ₱<?= number_format($product['prod_price'],2);?>
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity ">
                                            <div class="pro-qty disable-select">
                                                <input type="text" id="<?= $product['cart_id'];?> " value="<?php if(strtolower($product['unit'])=='kg') echo $product['quantity']; else echo round($product['quantity'],0);?> <?= strtolower($product['unit']);?>" disabled><span></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total" id = "total<?=$product['cart_id'];?>">₱<span ><?= number_format($product['prod_price']* $product['quantity'],2);?></span>
                                    </td>
                                    <td class="shoping__cart__item__close" >
                                        <span class="delbtn" id = "<?= $product['cart_id'];?>"><i class="fa fa-times"></i></span>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="shoping__cart__btns">
                        <a href="<?=site_url('Customer/Home')?>" class="primary-btn">CONTINUE SHOPPING</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Total <span id = "grand">₱<?=number_format($total,2)?></span></li>
                        </ul>
                        <a id = "checkoutbtn" href="#" onclick = "submitForm()" class="primary-btn" >PROCEED TO CHECKOUT</a>
                        <a id = "submitForm" href="<?=site_url('Customer/Checkout')?>" class="primary-btn" hidden>PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->


<!-- Modal -->
<div class="modal fade" id="data-fetch-error" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header bg-danger  text-white">
            <h5 class="modal-title" id="staticBackdropLabel">Delete Item!</h5>
               <button type="button" class="btn-close bg-danger border-0 btn" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
            </div>
            <div class="modal-body py-5 fs-3">
               <center>Do you want to delete item from cart?</center>
            </div>
            <div class="modal-footer">
               <button type="button" class=" btnyes btn text-white bg-danger border-white" data-dismiss="modal">Yes</button>
               <button type="button" class="btn text-white border-white bg-secondary" data-dismiss="modal">Cancel</button>
            </div>
         </div>
      </div>
   </div>
    
    <?php include 'footer.php' ?>

    <!-- Js Plugins -->
    <script src="<?=BASE_URL . PUBLIC_DIR ?>/js/customer/jquery-3.3.1.min.js"></script>
    <script src="<?=BASE_URL . PUBLIC_DIR ?>/js/customer/bootstrap.min.js"></script>
    <script src="<?=BASE_URL . PUBLIC_DIR ?>/js/customer/jquery.nice-select.min.js"></script>
    <script src="<?=BASE_URL . PUBLIC_DIR ?>/js/customer/jquery-ui.min.js"></script>
    <script src="<?=BASE_URL . PUBLIC_DIR ?>/js/customer/jquery.slicknav.js"></script>
    <script src="<?=BASE_URL . PUBLIC_DIR ?>/js/customer/mixitup.min.js"></script>
    <script src="<?=BASE_URL . PUBLIC_DIR ?>/js/customer/owl.carousel.min.js"></script>
    <script src="<?=BASE_URL . PUBLIC_DIR ?>/js/customer/main.js">
    
    </script>
    <script>
    var changeqtylink = "<?= site_url('api/changeqty'); ?>";    
    var cartdel = "<?= site_url('api/deleteitem'); ?>";   
    
    
    function submitForm(){
        if(document.getElementById('grand').innerHTML == "₱0.00"){
            Toastify({
        text: "You can't proceed to check out unless you have product/s on your cart!  ",
        duration: 3000,
        // destination: "https://github.com/apvarun/toastify-js",
        // newWindow: true,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "center", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
          height: 23,
          background: "linear-gradient(to right, #e21502, #e21502)",
        },
        onClick: function(){} // Callback after click
      }).showToast();
        }
        else{
            document.getElementById('submitForm').click();
        }
    }
    </script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</body>

</html>