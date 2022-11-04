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
    <link rel="stylesheet" href="<?= BASE_URL . PUBLIC_DIR ?>/css/customer/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?= BASE_URL . PUBLIC_DIR ?>/css/customer/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?= BASE_URL . PUBLIC_DIR ?>/css/customer/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?= BASE_URL . PUBLIC_DIR ?>/css/customer/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?= BASE_URL . PUBLIC_DIR ?>/css/customer/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?= BASE_URL . PUBLIC_DIR ?>/css/customer/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?= BASE_URL . PUBLIC_DIR ?>/css/customer/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="<?= BASE_URL . PUBLIC_DIR ?>/css/customer/style.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    
    <style type="text/css">
    * { box-sizing: border-box; }

.cont {
  background:linear-gradient(90deg, orange , #eb130c);
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: center;
  padding: 0 20px;
  border-radius: 3px;
}

.rating {
  display: flex;
  width: 100%;
  justify-content: center;
  overflow: hidden;
  flex-direction: row-reverse;
  height: 150px;
  position: relative;
}

.rating-0 {
  filter: grayscale(100%);
}

.rating > input {
  display: none;
}

.rating > label {
  cursor: pointer;
  width: 40px;
  height: 40px;
  margin-top: auto;
  background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23e3e3e3' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
  background-repeat: no-repeat;
  background-position: center;
  background-size: 76%;
  transition: .3s;
}

.rating > input:checked ~ label,
.rating > input:checked ~ label ~ label {
  background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23fcd93a' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
}


.rating > input:not(:checked) ~ label:hover,
.rating > input:not(:checked) ~ label:hover ~ label {
  background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23d8b11e' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
}

.emoji-wrapper {
  width: 100%;
  text-align: center;
  height: 100px;
  overflow: hidden;
  position: absolute;
  top: 0;
  left: 0;
}

.emoji-wrapper:before,
.emoji-wrapper:after{
  content: "";
  height: 15px;
  width: 100%;
  position: absolute;
  left: 0;
  z-index: 1;
}

.emoji-wrapper:before {
  top: 0;
  background: linear-gradient(to bottom, rgba(255,255,255,1) 0%,rgba(255,255,255,1) 35%,rgba(255,255,255,0) 100%);
}

.emoji-wrapper:after{
  bottom: 0;
  background: linear-gradient(to top, rgba(255,255,255,1) 0%,rgba(255,255,255,1) 35%,rgba(255,255,255,0) 100%);
}

.emoji {
  display: flex;
  flex-direction: column;
  align-items: center;
  transition: .3s;
}

.emoji > svg {
  margin: 15px 0; 
  width: 70px;
  height: 70px;
  flex-shrink: 0;
}

#rating-1:checked ~ .emoji-wrapper > .emoji { transform: translateY(-100px); }
#rating-2:checked ~ .emoji-wrapper > .emoji { transform: translateY(-200px); }
#rating-3:checked ~ .emoji-wrapper > .emoji { transform: translateY(-300px); }
#rating-4:checked ~ .emoji-wrapper > .emoji { transform: translateY(-400px); }
#rating-5:checked ~ .emoji-wrapper > .emoji { transform: translateY(-500px); }

.feedback {
  max-width: 360px;
  background-color: #fff;
  width: 100%;
  padding: 30px;
  border-radius: 8px;
  display: flex;
  flex-direction: column;
  flex-wrap: wrap;
  align-items: center;
  box-shadow: 0 4px 30px rgba(0,0,0,.05);
}
    </style>
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
                <li  class="active"><a href="<?= site_url('Customer/Order')?>">Orders</a></li>
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
                            <li class="active"><a href="<?= site_url('Customer/Order')?>">Orders</a></li>
                            <li><a href="<?=site_url('Customer/Cart');?>">Cart</a></li>
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

    <!-- Hero Section Begin -->
   
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg align-items-center" data-setbg="<?= BASE_URL . PUBLIC_DIR ?>/images/customer/static/breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Your Orders</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-carfeatured__controlst spad">
        <div class="container">
                <div class="featured__controls ">
                    <ul class="p-2">
                        <li class="active" data-filter="*">ALL</li>
                        <li data-filter=".P">PENDING</li>
                        <li data-filter=".OP">ON PROCESS</li>
                        <li data-filter=".O">OUT FOR DELIVERY</li>
                        <li data-filter=".D">DELIVERED</li>
                        <li data-filter=".C">CANCELED</li>
                    </ul>
                </div>
            <div class="row">
                <div class="col-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Transaction Number</th>
                                    <th class="shoping__product">Order Date</th>
                                    <th class="shoping__product">Total</th>
                                    <th class="shoping__product">Status</th>
                                    <th class="shoping__product" width="10%">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="featured__filter">

                                <?php $total = 0;
                                foreach ($data['order'] as $order) {
                                ?>
                                    <tr class="mix oranges <?= $order['trans_status'] ?>" style = "">
                                        <td class="shoping__cart__item pl-4">
                                            <h5><?= str_pad($order['trans_id'], 8, "0", STR_PAD_LEFT); ?></h5>
                                        </td>
                                        <td class="shoping__cart__item">
                                            <h5><?= $order['trans_date'] ?></h5>
                                        </td>
                                        <td class="shoping__cart__item">
                                        ₱<?= number_format($order['total'],2); ?>
                                        </td>
                                        <td class="shoping__cart__item">
                                            <span><?php if ($order['trans_status'] == 'P') {
                                                        echo '<i class = "fa fa-rectangle-wide" style="color:#ffd8a8;"></i>  Pending';
                                                    } else if ($order['trans_status'] == 'O') {
                                                        echo ' <i class = "fa fa-rectangle-wide" style="color:#ffec99;"></i>  Out For Delivery';
                                                    } else if ($order['trans_status'] == 'OP') {
                                                        echo '<i class = "fa fa-rectangle-wide" style="color:#96f2d7;"></i>  On Process';
                                                    } else if ($order['trans_status'] == 'D') {
                                                        echo '<i class = "fa fa-rectangle-wide" style="color:#b2f2bb;"></i>  Delivered';
                                                    } else if ($order['trans_status'] == 'C') {
                                                        echo '<i class = "fa fa-rectangle-wide" style="color:#ffc9c9;"></i>  Canceled';
                                                    }
                                                    ?></span>
                                        </td>
                                        
                                            <td class="shoping__cart__item">
                                                <a href="#" class = "text-dark viewbtn mr-2" title="View"  id = "<?= $order['trans_id']; ?>"><i class="fad fa-eye "></i></a>       
                                                <?php
                                            if ($order['trans_status'] != 'P') { ?>
                                                <a href="<?= site_url('Customer/message/' . $order['trans_id']) ?>" class="text-success messagebtn mr-2" title="Message" id="<?= $order['trans_id']; ?>"><i class="fad fa-envelope"></i></a>
                                            <?php
                                            } ?>
                                            <?php if ($order['trans_status'] == 'P') { ?>
                                                <a href="#" class="text-danger cancelbtn mr-2" title="Cancel" id="<?= $order['trans_id']; ?>"><i class="fad fa-times"></i></a>
                                            <?php } ?>
                                            </td>
                                            
                                        
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="<?= site_url('Customer/Home') ?>" class="primary-btn">CONTINUE SHOPPING</a>
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
            <h5 class="modal-title" id="staticBackdropLabel">Cancel Order!</h5>
               <button type="button" class="btn-close bg-danger border-0 btn" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
            </div>
            <div class="modal-body py-5 fs-3">
               <center>Are you sure you want to cancel your order?</center>
            </div>
            <div class="modal-footer">
               <button type="button" class="btncancel btn text-white bg-danger border-white" data-dismiss="modal">Yes</button>
               <button type="button" class="btn text-white border-white bg-secondary" data-dismiss="modal">Cancel</button>
            </div>
         </div>
      </div>
   </div>

    <?php include 'footer.php' ?>



    <div class="modal fade" id="modalcancel" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="card ">
                    <div class="card-header text-white bg-danger">Cancel Order
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body ">
                        <p class="card-text text-danger bg-white">Are you sure you want to cancel your oder?</p>
                    </div>
                    <div class="card-footer bg-transparent border-danger" style="padding:0px;">
                        <div class="btn-group btn-group-toggle col-12 p-0" data-toggle="buttons">
                            <label class="btn btn-secondary">
                                <input type="radio" name="options" id="option1" data-dismiss="modal" autocomplete="off"> No
                            </label>
                            <label class="btn btn-danger">
                                <input type="radio" name="options" class="cancelbtn" autocomplete="off"> Yes
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="modal fade" id="viewOrder" data-bs-backdrop="" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal modal-dialog-centered">
            <div class="modal-content">
                <form action="<?= site_url('Admin/Add_Marketer') ?>" enctype="multipart/form-data" method="POST">
                    <div class="modal-body p-0">
                        <div class="text-white d-flex justify-content-between m-0 p-3 pb-0 mb-0 header__top">
                            <div></div>
                            <h5 class="modal-title fw-bold" id="staticBackdropLabel">Order Details</h5>
                            <i class="fas fa-times-circle align-content-center" data-dismiss="modal" aria-label="Close" style="font-size: 1.5rem; cursor:pointer"></i>
                        </div>
                        <div class="container-fluid p-4 pt-0">
                            <div>
                                <ul class="timeline" id="timeline">
                                    <li class="li one">
                                        <div class="timestamp">
                                        <small class="author">TBD</small>
                                        </div>
                                        <div class="status">
                                        <P> Pending </P>
                                        </div>
                                    </li>
                                    <li class="li  two complete">
                                        <div class="timestamp">
                                        <small class="author">TBD</small>
                                        
                                        </div>
                                        <div class="status">
                                        <P> On Process </P>
                                        </div>
                                    </li>
                                    <li class="li three">
                                        <div class="timestamp">
                                        <small class="author">TBD
                                            <br> 
                                        </small>                                       
                                        </div>
                                        <div class="status">
                                        <p> On Delivery </p>
                                        </div>
                                    </li>
                                    <li class="li four">
                                        <div class="timestamp">
                                        <small class="author">TBD</small>
                                        </div>
                                        <div class="status">
                                        <p> Delivered </p>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="timeline" id="canceled" hidden>
                                    <li class="li now canceled">
                                        <div class="timestamp">
                                        <small class="author"></small>
                                        </div>
                                        <div class="status">
                                        <h3> Canceled </h3>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="checkout__order">
                                <div class="row border-bottom">
                                    <div class="col-6">
                                        <h4 class = "border-0">Your Order</h4>
                                    </div>
                                    <div class="col-6 mb-1 d-flex justify-content-end">
                                        <h4 id = "ordId"class = "border-0">#00000000</h4>
                                    </div>
                                </div>
                                
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul id = "list">
                                </ul>
                                <div class="checkout__order__subtotal">Subtotal <span id="sub" >₱<?=number_format(10000,2)?></span></div>
                                <div class="checkout__order__subtotal">Shipping Fee <span id= "shipping">₱<?=number_format(10,2);?></span></div>
                                <div class="checkout__order__subtotal">Total <span class = "text-danger" id = "total">₱<?=number_format(1010,2)?></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-grid gap-2">
                        <button type="button" class="btn-receive rounded-0 primary-btn" id = "">Rate</button>
                        <button type="button" class="btn-close rounded-0 primary-btn" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="rateOrder" data-bs-backdrop="" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal modal-dialog-centered">
            <div class="modal-content">
                <form action="<?= site_url('Customer/Rate') ?>" enctype="multipart/form-data" method="POST">
                    <div class="modal-body p-0">
                        <div class="text-white d-flex justify-content-between m-0 p-3 pb-0 mb-0 header__top">
                            <div></div>
                            <h5 class="modal-title fw-bold" id="staticBackdropLabel">Order Ratings</h5>
                            <i class="fas fa-times-circle align-content-center" data-dismiss="modal" aria-label="Close" style="font-size: 1.5rem; cursor:pointer"></i>
                        </div>
                        <div class="container-fluid p-4 pt-0">
                            <div class="checkout__order">
                                <div class="row border-bottom">
                                    <div class="col-6">
                                        <h4 class = "border-0">Your Order</h4>
                                    </div>
                                    <div class="col-6 mb-1 d-flex justify-content-end">
                                        <h4 id = "orNo"class = "border-0">#00000000</h4>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                <div class="cont">
                                    <h5 class = "m-3">How's our service?</h5>
                                    <div class="feedback mb-4" >
                                        <div class="rating">
                                        <input type="radio" name="rating" id="rating-5" value="5" >
                                        <label for="rating-5"></label>
                                        <input type="radio" name="rating" id="rating-4" value="4">
                                        <label for="rating-4"></label>
                                        <input type="radio" name="rating" id="rating-3" value="3">
                                        <label for="rating-3"></label>
                                        <input type="radio" name="rating" id="rating-2" value="2">
                                        <label for="rating-2"></label>
                                        <input type="radio" name="rating" id="rating-1" value="1" required>
                                        <label for="rating-1"></label>
                                        <div class="emoji-wrapper">
                                            <div class="emoji">
                                            <svg class="rating-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                                            <path d="M512 256c0 141.44-114.64 256-256 256-80.48 0-152.32-37.12-199.28-95.28 43.92 35.52 99.84 56.72 160.72 56.72 141.36 0 256-114.56 256-256 0-60.88-21.2-116.8-56.72-160.72C474.8 103.68 512 175.52 512 256z" fill="#f4c534"/>
                                            <ellipse transform="scale(-1) rotate(31.21 715.433 -595.455)" cx="166.318" cy="199.829" rx="56.146" ry="56.13" fill="#fff"/>
                                            <ellipse transform="rotate(-148.804 180.87 175.82)" cx="180.871" cy="175.822" rx="28.048" ry="28.08" fill="#3e4347"/>
                                            <ellipse transform="rotate(-113.778 194.434 165.995)" cx="194.433" cy="165.993" rx="8.016" ry="5.296" fill="#5a5f63"/>
                                            <ellipse transform="scale(-1) rotate(31.21 715.397 -1237.664)" cx="345.695" cy="199.819" rx="56.146" ry="56.13" fill="#fff"/>
                                            <ellipse transform="rotate(-148.804 360.25 175.837)" cx="360.252" cy="175.84" rx="28.048" ry="28.08" fill="#3e4347"/>
                                            <ellipse transform="scale(-1) rotate(66.227 254.508 -573.138)" cx="373.794" cy="165.987" rx="8.016" ry="5.296" fill="#5a5f63"/>
                                            <path d="M370.56 344.4c0 7.696-6.224 13.92-13.92 13.92H155.36c-7.616 0-13.92-6.224-13.92-13.92s6.304-13.92 13.92-13.92h201.296c7.696.016 13.904 6.224 13.904 13.92z" fill="#3e4347"/>
                                            </svg>
                                            <svg class="rating-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                                            <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
                                            <path d="M328.4 428a92.8 92.8 0 0 0-145-.1 6.8 6.8 0 0 1-12-5.8 86.6 86.6 0 0 1 84.5-69 86.6 86.6 0 0 1 84.7 69.8c1.3 6.9-7.7 10.6-12.2 5.1z" fill="#3e4347"/>
                                            <path d="M269.2 222.3c5.3 62.8 52 113.9 104.8 113.9 52.3 0 90.8-51.1 85.6-113.9-2-25-10.8-47.9-23.7-66.7-4.1-6.1-12.2-8-18.5-4.2a111.8 111.8 0 0 1-60.1 16.2c-22.8 0-42.1-5.6-57.8-14.8-6.8-4-15.4-1.5-18.9 5.4-9 18.2-13.2 40.3-11.4 64.1z" fill="#f4c534"/>
                                            <path d="M357 189.5c25.8 0 47-7.1 63.7-18.7 10 14.6 17 32.1 18.7 51.6 4 49.6-26.1 89.7-67.5 89.7-41.6 0-78.4-40.1-82.5-89.7A95 95 0 0 1 298 174c16 9.7 35.6 15.5 59 15.5z" fill="#fff"/>
                                            <path d="M396.2 246.1a38.5 38.5 0 0 1-38.7 38.6 38.5 38.5 0 0 1-38.6-38.6 38.6 38.6 0 1 1 77.3 0z" fill="#3e4347"/>
                                            <path d="M380.4 241.1c-3.2 3.2-9.9 1.7-14.9-3.2-4.8-4.8-6.2-11.5-3-14.7 3.3-3.4 10-2 14.9 2.9 4.9 5 6.4 11.7 3 15z" fill="#fff"/>
                                            <path d="M242.8 222.3c-5.3 62.8-52 113.9-104.8 113.9-52.3 0-90.8-51.1-85.6-113.9 2-25 10.8-47.9 23.7-66.7 4.1-6.1 12.2-8 18.5-4.2 16.2 10.1 36.2 16.2 60.1 16.2 22.8 0 42.1-5.6 57.8-14.8 6.8-4 15.4-1.5 18.9 5.4 9 18.2 13.2 40.3 11.4 64.1z" fill="#f4c534"/>
                                            <path d="M155 189.5c-25.8 0-47-7.1-63.7-18.7-10 14.6-17 32.1-18.7 51.6-4 49.6 26.1 89.7 67.5 89.7 41.6 0 78.4-40.1 82.5-89.7A95 95 0 0 0 214 174c-16 9.7-35.6 15.5-59 15.5z" fill="#fff"/>
                                            <path d="M115.8 246.1a38.5 38.5 0 0 0 38.7 38.6 38.5 38.5 0 0 0 38.6-38.6 38.6 38.6 0 1 0-77.3 0z" fill="#3e4347"/>
                                            <path d="M131.6 241.1c3.2 3.2 9.9 1.7 14.9-3.2 4.8-4.8 6.2-11.5 3-14.7-3.3-3.4-10-2-14.9 2.9-4.9 5-6.4 11.7-3 15z" fill="#fff"/>
                                            </svg>
                                            <svg class="rating-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                                            <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
                                            <path d="M336.6 403.2c-6.5 8-16 10-25.5 5.2a117.6 117.6 0 0 0-110.2 0c-9.4 4.9-19 3.3-25.6-4.6-6.5-7.7-4.7-21.1 8.4-28 45.1-24 99.5-24 144.6 0 13 7 14.8 19.7 8.3 27.4z" fill="#3e4347"/>
                                            <path d="M276.6 244.3a79.3 79.3 0 1 1 158.8 0 79.5 79.5 0 1 1-158.8 0z" fill="#fff"/>
                                            <circle cx="340" cy="260.4" r="36.2" fill="#3e4347"/>
                                            <g fill="#fff">
                                                <ellipse transform="rotate(-135 326.4 246.6)" cx="326.4" cy="246.6" rx="6.5" ry="10"/>
                                                <path d="M231.9 244.3a79.3 79.3 0 1 0-158.8 0 79.5 79.5 0 1 0 158.8 0z"/>
                                            </g>
                                            <circle cx="168.5" cy="260.4" r="36.2" fill="#3e4347"/>
                                            <ellipse transform="rotate(-135 182.1 246.7)" cx="182.1" cy="246.7" rx="10" ry="6.5" fill="#fff"/>
                                            </svg>
                                            <svg class="rating-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                                        <path d="M407.7 352.8a163.9 163.9 0 0 1-303.5 0c-2.3-5.5 1.5-12 7.5-13.2a780.8 780.8 0 0 1 288.4 0c6 1.2 9.9 7.7 7.6 13.2z" fill="#3e4347"/>
                                        <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
                                        <g fill="#fff">
                                        <path d="M115.3 339c18.2 29.6 75.1 32.8 143.1 32.8 67.1 0 124.2-3.2 143.2-31.6l-1.5-.6a780.6 780.6 0 0 0-284.8-.6z"/>
                                        <ellipse cx="356.4" cy="205.3" rx="81.1" ry="81"/>
                                        </g>
                                        <ellipse cx="356.4" cy="205.3" rx="44.2" ry="44.2" fill="#3e4347"/>
                                        <g fill="#fff">
                                        <ellipse transform="scale(-1) rotate(45 454 -906)" cx="375.3" cy="188.1" rx="12" ry="8.1"/>
                                        <ellipse cx="155.6" cy="205.3" rx="81.1" ry="81"/>
                                        </g>
                                        <ellipse cx="155.6" cy="205.3" rx="44.2" ry="44.2" fill="#3e4347"/>
                                        <ellipse transform="scale(-1) rotate(45 454 -421.3)" cx="174.5" cy="188" rx="12" ry="8.1" fill="#fff"/>
                                    </svg>
                                            <svg class="rating-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                                            <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
                                            <path d="M232.3 201.3c0 49.2-74.3 94.2-74.3 94.2s-74.4-45-74.4-94.2a38 38 0 0 1 74.4-11.1 38 38 0 0 1 74.3 11.1z" fill="#e24b4b"/>
                                            <path d="M96.1 173.3a37.7 37.7 0 0 0-12.4 28c0 49.2 74.3 94.2 74.3 94.2C80.2 229.8 95.6 175.2 96 173.3z" fill="#d03f3f"/>
                                            <path d="M215.2 200c-3.6 3-9.8 1-13.8-4.1-4.2-5.2-4.6-11.5-1.2-14.1 3.6-2.8 9.7-.7 13.9 4.4 4 5.2 4.6 11.4 1.1 13.8z" fill="#fff"/>
                                            <path d="M428.4 201.3c0 49.2-74.4 94.2-74.4 94.2s-74.3-45-74.3-94.2a38 38 0 0 1 74.4-11.1 38 38 0 0 1 74.3 11.1z" fill="#e24b4b"/>
                                            <path d="M292.2 173.3a37.7 37.7 0 0 0-12.4 28c0 49.2 74.3 94.2 74.3 94.2-77.8-65.7-62.4-120.3-61.9-122.2z" fill="#d03f3f"/>
                                            <path d="M411.3 200c-3.6 3-9.8 1-13.8-4.1-4.2-5.2-4.6-11.5-1.2-14.1 3.6-2.8 9.7-.7 13.9 4.4 4 5.2 4.6 11.4 1.1 13.8z" fill="#fff"/>
                                            <path d="M381.7 374.1c-30.2 35.9-75.3 64.4-125.7 64.4s-95.4-28.5-125.8-64.2a17.6 17.6 0 0 1 16.5-28.7 627.7 627.7 0 0 0 218.7-.1c16.2-2.7 27 16.1 16.3 28.6z" fill="#3e4347"/>
                                            <path d="M256 438.5c25.7 0 50-7.5 71.7-19.5-9-33.7-40.7-43.3-62.6-31.7-29.7 15.8-62.8-4.7-75.6 34.3 20.3 10.4 42.8 17 66.5 17z" fill="#e24b4b"/>
                                            </svg>
                                            <svg class="rating-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <g fill="#ffd93b">
                                                <circle cx="256" cy="256" r="256"/>
                                                <path d="M512 256A256 256 0 0 1 56.8 416.7a256 256 0 0 0 360-360c58 47 95.2 118.8 95.2 199.3z"/>
                                            </g>
                                            <path d="M512 99.4v165.1c0 11-8.9 19.9-19.7 19.9h-187c-13 0-23.5-10.5-23.5-23.5v-21.3c0-12.9-8.9-24.8-21.6-26.7-16.2-2.5-30 10-30 25.5V261c0 13-10.5 23.5-23.5 23.5h-187A19.7 19.7 0 0 1 0 264.7V99.4c0-10.9 8.8-19.7 19.7-19.7h472.6c10.8 0 19.7 8.7 19.7 19.7z" fill="#e9eff4"/>
                                            <path d="M204.6 138v88.2a23 23 0 0 1-23 23H58.2a23 23 0 0 1-23-23v-88.3a23 23 0 0 1 23-23h123.4a23 23 0 0 1 23 23z" fill="#45cbea"/>
                                            <path d="M476.9 138v88.2a23 23 0 0 1-23 23H330.3a23 23 0 0 1-23-23v-88.3a23 23 0 0 1 23-23h123.4a23 23 0 0 1 23 23z" fill="#e84d88"/>
                                            <g fill="#38c0dc">
                                                <path d="M95.2 114.9l-60 60v15.2l75.2-75.2zM123.3 114.9L35.1 203v23.2c0 1.8.3 3.7.7 5.4l116.8-116.7h-29.3z"/>
                                            </g>
                                            <g fill="#d23f77">
                                                <path d="M373.3 114.9l-66 66V196l81.3-81.2zM401.5 114.9l-94.1 94v17.3c0 3.5.8 6.8 2.2 9.8l121.1-121.1h-29.2z"/>
                                            </g>
                                            <path d="M329.5 395.2c0 44.7-33 81-73.4 81-40.7 0-73.5-36.3-73.5-81s32.8-81 73.5-81c40.5 0 73.4 36.3 73.4 81z" fill="#3e4347"/>
                                            <path d="M256 476.2a70 70 0 0 0 53.3-25.5 34.6 34.6 0 0 0-58-25 34.4 34.4 0 0 0-47.8 26 69.9 69.9 0 0 0 52.6 24.5z" fill="#e24b4b"/>
                                            <path d="M290.3 434.8c-1 3.4-5.8 5.2-11 3.9s-8.4-5.1-7.4-8.7c.8-3.3 5.7-5 10.7-3.8 5.1 1.4 8.5 5.3 7.7 8.6z" fill="#fff" opacity=".2"/>
                                            </svg>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <h5 text-align="left">Comments and Suggestions:</h5>
                                    <textarea class="mb-4 border-1 rounded" name= "review" id = "review" style = "width :100%; max-width:100%" placeholder="Type your comments and suggestions here..." required></textarea>
                                    <input type="hidden" name="id" id="tid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-grid gap-2">
                        <button type="submit" class="btn-rate rounded-0 primary-btn" id = "">Submit</button>
                        <button type="button" class="btn-closerate rounded-0 primary-btn" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!-- Js Plugins -->
    <script src="<?= BASE_URL . PUBLIC_DIR ?>/js/customer/jquery-3.3.1.min.js"></script>
    <script src="<?= BASE_URL . PUBLIC_DIR ?>/js/customer/bootstrap.min.js"></script>
    <script src="<?= BASE_URL . PUBLIC_DIR ?>/js/customer/jquery.nice-select.min.js"></script>
    <script src="<?= BASE_URL . PUBLIC_DIR ?>/js/customer/jquery-ui.min.js"></script>
    <script src="<?= BASE_URL . PUBLIC_DIR ?>/js/customer/jquery.slicknav.js"></script>
    <script src="<?= BASE_URL . PUBLIC_DIR ?>/js/customer/mixitup.min.js"></script>
    <script src="<?= BASE_URL . PUBLIC_DIR ?>/js/customer/owl.carousel.min.js"></script>
    <script src="<?= BASE_URL . PUBLIC_DIR ?>/js/customer/main.js"></script>
    <!-- <script src="https://raw.githubusercontent.com/phstc/jquery-dateFormat/master/dist/jquery-dateformat.js"></script>
    <script src="https://raw.githubusercontent.com/phstc/jquery-dateFormat/master/dist/jquery-dateformat.min.js"></script> -->
    <script>
            $(".viewbtn").on("click",function () {
                
    var id = $(this).attr("id");
    var sub = 0;
    $('#list').empty();
          $.post(
            "<?= site_url('api/order_details'); ?>",
            // DATA TO PASS
            {
              id: id,
            },
            function (data, status, xhr) {  
             
              for( let cart in data['cart']){ 
                var ul = document.getElementById("list");
            var li = document.createElement("li");
            var span = document.createElement("span");
            var b = document.createElement("b");
            b.appendChild(document.createTextNode("(" + data['cart'][cart]['quantity'] + (data['cart'][cart]['unit']).toLowerCase()+")"));
            span.appendChild(document.createTextNode("₱"+(data['cart'][cart]['quantity']*data['cart'][cart]['prod_price']).toFixed(2)));
            li.appendChild(document.createTextNode( " " + data['cart'][cart]['prod_name']));
            li.appendChild(b);
            li.appendChild(span);
            ul.appendChild(li);
            sub+=(data['cart'][cart]['quantity']*data['cart'][cart]['prod_price']);
              }
              document.getElementById('ordId').innerHTML ="#"+ ('0000000'+data['customer']['trans_id']).match(/\d{8}$/);
              document.getElementById('sub').innerHTML = "₱" + sub.toFixed(2);
              document.getElementById('shipping').innerHTML = "₱" + (data['customer']['delivery_fee']).toFixed(2);
              document.getElementById('total').innerHTML = "₱" + (sub+data['customer']['delivery_fee']).toFixed(2);
              var status;
              var rating = data['customer']['rating'];
              $('#review').val(data['customer']['review']);
              $('ul').removeAttr('hidden');
              $('li').removeClass('complete now');
              $('#canceled').attr('hidden','hidden');
            $("#viewOrder").modal('show');
            switch(data['customer']['trans_status']) {
                case 'P':
                    $('.one').addClass('now');
                    $('.one').children('div').children('small').text(data['customer']['pending']);
                    $('.two').children('div').children('small').text("TBD");
                    $('.three').children('div').children('small').text("TBD");
                    $('.four').children('div').children('small').text("TBD");
                    $('.btn-receive').attr('hidden','hidden');
                    $('.btn-close').removeAttr('hidden');
                    break;
                case 'OP':
                    $('.one').addClass('complete');
                    $('.two').addClass('now');
                    $('.one').children('div').children('small').text(data['customer']['pending']);
                    $('.two').children('div').children('small').text(data['customer']['process']);
                    $('.three').children('div').children('small').text("TBD");
                    $('.four').children('div').children('small').text("TBD");
                    $('.btn-receive').attr('hidden','hidden');
                    $('.btn-close').removeAttr('hidden');
                    break;
                case 'O':
                    $('.one').addClass('complete');
                    $('.two').addClass('complete');
                    $('.three').addClass('now');
                    $('.one').children('div').children('small').text(data['customer']['pending']);
                    $('.two').children('div').children('small').text(data['customer']['process']);
                    $('.three').children('div').children('small').text(data['customer']['delivery']);
                    $('.four').children('div').children('small').text("TBD");
                    $('.btn-receive').attr('hidden','hidden');
                    $('.btn-close').removeAttr('hidden');
                    break;
                case 'D':
                    $('.one').addClass('complete');
                    $('.two').addClass('complete');
                    $('.three').addClass('complete');
                    $('.four').addClass('now');
                    $('.one').children('div').children('small').text(data['customer']['pending']);
                    $('.two').children('div').children('small').text(data['customer']['process']);
                    $('.three').children('div').children('small').text(data['customer']['delivery']);
                    $('.four').children('div').children('small').text(data['customer']['delivered']);
                    $('.btn-close').attr('hidden','hidden');
                    $('.btn-receive').attr('id',id);
                    $('.btn-receive').removeAttr('hidden');
                    break;
                case 'C':
                    $('#timeline').attr('hidden','hidden');
                    $('#canceled').removeAttr('hidden');
                    $('.canceled').addClass('now');
                    $('.canceled').children('div').children('small').text(data['customer']['cancel']);
                    $('.btn-receive').attr('hidden','hidden');
                    $('.btn-close').removeAttr('hidden');
                    break;
                default:
                    // code block
                }
                if(rating>0){
                $('#rating-'+rating).prop("checked", true); 
                $('.btn-rate').attr('hidden','hidden');
                $("#review").prop('disabled', true);
                $("#rating-5").prop('disabled', true);
                $("#rating-4").prop('disabled', true);
                $("#rating-3").prop('disabled', true);
                $("#rating-2").prop('disabled', true);
                $("#rating-1").prop('disabled', true);
                $('.btn-closerate').removeAttr('hidden');
              }
              else{
                $('#rating-1').prop("checked", false); 
                $('#rating-2').prop("checked", false); 
                $('#rating-3').prop("checked", false); 
                $('#rating-4').prop("checked", false); 
                $('#rating-5').prop("checked", false); 
                $("#review").prop('disabled', false);
                $("#rating-5").prop('disabled', false);
                $("#rating-4").prop('disabled', false);
                $("#rating-3").prop('disabled', false);
                $("#rating-2").prop('disabled', false);
                $("#rating-1").prop('disabled', false);
                $('.btn-closerate').attr('hidden','hidden');
                $('.btn-rate').removeAttr('hidden');
              }
            }
          )
            .done(function () {})
      
            // TO DO ON FAIL
            .fail(function (jqxhr, settings, ex) {
              alert("failed, " + ex);
            });
  });



        var cancelorder = "<?= site_url('api/cancelorder'); ?>";

        function cancel($id) {
            $("#modalcancel").modal('show');

        };

        $(function () {
  $('[data-toggle="tooltip"]').tooltip()
});





$(".btn-receive").on("click",function () {
    var id = $(this).attr("id");
    console.log(id);
    $('#tid').val(id);
    document.getElementById('orNo').innerHTML ="#"+ ('0000000'+id).match(/\d{8}$/);
    $("#viewOrder").modal('hide');
$("#rateOrder").modal('show');$("#rating").load(" #rating > *" );
});
    </script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>




</body>

</html>