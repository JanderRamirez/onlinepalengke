/*  ---------------------------------------------------
    Template Name: Ogani
    Description:  Ogani eCommerce  HTML Template
    Author: Colorlib
    Author URI: https://colorlib.com
    Version: 1.0
    Created: Colorlib
---------------------------------------------------------  */

"use strict";

(function ($) {
  /*------------------
        Preloader
    --------------------*/
  $(window).on("load", function () {
    $(".loader").fadeOut();
    $("#preloder").delay(200).fadeOut("slow");

    /*------------------
            Gallery filter
        --------------------*/
    $(".featured__controls li").on("click", function () {
      $(".featured__controls li").removeClass("active");
      $(this).addClass("active");
    });
    if ($(".featured__filter").length > 0) {
      var containerEl = document.querySelector(".featured__filter");
      var mixer = mixitup(containerEl);
    }
  });



  /*------------------
        Background Set
    --------------------*/
  $(".set-bg").each(function () {
    var bg = $(this).data("setbg");
    $(this).css("background-image", "url(" + bg + ")");
  });

  //Humberger Menu
  $(".humberger__open").on("click", function () {
    $(".humberger__menu__wrapper").addClass("show__humberger__menu__wrapper");
    $(".humberger__menu__overlay").addClass("active");
    $("body").addClass("over_hid");
  });

  $(".humberger__menu__overlay").on("click", function () {
    $(".humberger__menu__wrapper").removeClass(
      "show__humberger__menu__wrapper"
    );
    $(".humberger__menu__overlay").removeClass("active");
    $("body").removeClass("over_hid");
  });

  /*------------------
    Navigation
  --------------------*/
  $(".mobile-menu").slicknav({
    prependTo: "#mobile-menu-wrap",
    allowParentLinks: true,
  });

  /*-----------------------
        Categories Slider
    ------------------------*/
  $(".categories__slider").owlCarousel({
    loop: true,
    margin: 0,
    items: 4,
    dots: false,
    nav: true,
    navText: [
      "<span class='fa fa-angle-left'><span/>",
      "<span class='fa fa-angle-right'><span/>",
    ],
    animateOut: "fadeOut",
    animateIn: "fadeIn",
    smartSpeed: 1200,
    autoHeight: false,
    autoplay: true,
    responsive: {
      0: {
        items: 1,
      },

      480: {
        items: 2,
      },

      768: {
        items: 3,
      },

      992: {
        items: 4,
      },
    },
  });

  $(".hero__categories__all").on("click", function () {
    $(".hero__categories ul").slideToggle(400);
  });

  /*--------------------------
        Latest Product Slider
    ----------------------------*/
  $(".latest-product__slider").owlCarousel({
    loop: true,
    margin: 0,
    items: 1,
    dots: false,
    nav: true,
    navText: [
      "<span class='fa fa-angle-left'><span/>",
      "<span class='fa fa-angle-right'><span/>",
    ],
    smartSpeed: 1200,
    autoHeight: false,
    autoplay: true,
  });

  /*-----------------------------
        Product Discount Slider
    -------------------------------*/
  $(".product__discount__slider").owlCarousel({
    loop: true,
    margin: 0,
    items: 3,
    dots: true,
    smartSpeed: 1200,
    autoHeight: false,
    autoplay: true,
    responsive: {
      320: {
        items: 1,
      },

      480: {
        items: 2,
      },

      768: {
        items: 2,
      },

      992: {
        items: 3,
      },
    },
  });

  /*---------------------------------
        Product Details Pic Slider
    ----------------------------------*/
  $(".product__details__pic__slider").owlCarousel({
    loop: true,
    margin: 20,
    items: 4,
    dots: true,
    smartSpeed: 1200,
    autoHeight: false,
    autoplay: true,
  });

  /*-----------------------
    Price Range Slider
  ------------------------ */
  var rangeSlider = $(".price-range"),
    minamount = $("#minamount"),
    maxamount = $("#maxamount"),
    minPrice = rangeSlider.data("min"),
    maxPrice = rangeSlider.data("max");
  rangeSlider.slider({
    range: true,
    min: minPrice,
    max: maxPrice,
    values: [minPrice, maxPrice],
    slide: function (event, ui) {
      minamount.val("$" + ui.values[0]);
      maxamount.val("$" + ui.values[1]);
    },
  });
  minamount.val("$" + rangeSlider.slider("values", 0));
  maxamount.val("$" + rangeSlider.slider("values", 1));

  /*--------------------------
        Select
    ----------------------------*/
  $("select").niceSelect();

  /*------------------
    Single Product
  --------------------*/
  $(".product__details__pic__slider img").on("click", function () {
    var imgurl = $(this).data("imgbigurl");
    var bigImg = $(".product__details__pic__item--large").attr("src");
    if (imgurl != bigImg) {
      $(".product__details__pic__item--large").attr({
        src: imgurl,
      });
    }
  });

  /*-------------------
    Delete Item
  --------------------- */

  $(".delbtn").on("click", function () {
    var id = $(this).attr("id");
    $('#data-fetch-error').modal('show')
    $('.btnyes').attr('id','_'+id)
  });


  $(".btnyes").on("click", function () {

    var id = $(this).attr("id");
    $.post(
      cartdel,
      // DATA TO PASS
      {
        id: id.substring(1),
      },
      function (data, status, xhr) {
        document.getElementById("grand").innerHTML = "₱" + (data[0]["total"]);
        if (document.getElementById("grand").innerHTML == "₱null") {
          document.getElementById("grand").innerHTML = "₱0.00"
        }
        
      }
    )
      .done(function () { })

      // TO DO ON FAIL
      .fail(function (jqxhr, settings, ex) {
        alert("failed, " + ex);
      });
      Toastify({
        text: "\u2713 Product deleted from cart!  ",
        duration: 3000,
        // destination: "https://github.com/apvarun/toastify-js",
        // newWindow: true,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "center", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
          height: 23,
          background: "linear-gradient(to right, #00c851, #00c851)",
        },
        onClick: function(){} // Callback after click
      }).showToast();
    $("#"+id.substring(1)).parents('tr').hide(1000, function () {
      $("#"+id.substring(1)).parents('tr').remove();
    });


  });






  /*-------------------
      Cancel Order
    --------------------- */


    $(".cancelbtn").on("click", function () {
      var id = $(this).attr("id");
      $('#data-fetch-error').modal('show')
      $('.btncancel').attr('id','_'+id)
    });


  $(".btncancel").on("click", function () {
    var id = $(this).attr("id");
    console.log(id);
    $.post(
      cancelorder,
      // DATA TO PASS
      {
        id: id.substring(1),
      },
      function (data, status, xhr) {
        
        Toastify({
          text: "\u2713 Order has been canceled!  ",
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
    )
      .done(function () {

      })

      // TO DO ON FAIL
      .fail(function (jqxhr, settings, ex) {
        alert("failed, " + ex);
      });

    $("#"+id.substring(1)).parents('tr').hide(1000, function () {
      $("#"+id.substring(1)).parents('tr').remove();
    });

  });


 /*-------------------
    Add to Cart
  --------------------- */


  $(".addtocart").on("click", function () {
    var id = $(this).attr("id");
    console.log(id);
    if (id.length < 5) {
      // $("#loginerr").modal();
      Toastify({
        text: "You are not logged in!  ",
        duration: 3000,
        // destination: "https://github.com/apvarun/toastify-js",
        // newWindow: true,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "center", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on 
        style: {
          height: 23,
          background: "linear-gradient(to right, #e21502, #e21502)",
        },
        onClick: function(){} // Callback after click
      }).showToast();
    }
    else {
      $.post(
        addtocart,
        // DATA TO PASS
        {
          id: id.slice(5),
        },
        function (data, status, xhr) {
          // $("#cartadd").modal();
          Toastify({
            text: "\u2713 Product added to cart!  ",
            duration: 3000,
            // destination: "https://github.com/apvarun/toastify-js",
            // newWindow: true,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "center", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
              height: 23,
              background: "linear-gradient(to right, #00c851, #00c851)",
            },
            onClick: function(){} // Callback after click
          }).showToast();
          document.getElementById("cartcount1").innerHTML = data["total_row"];
          document.getElementById("cartcount2").innerHTML = data["total_row"];
          console.log(document.getElementById("cartcount1").innerHTML);

        }
      )
        .done(function () {

        })

        // TO DO ON FAIL
        .fail(function (jqxhr, settings, ex) {
          alert("failed, " + ex);
        });
    }
  }); 


  /*-------------------
    Quantity change   65.10 kg
  --------------------- */
  var proQty = $(".pro-qty");
  proQty.prepend('<span class="dec qtybtn">-</span>');
  proQty.append('<span class="inc qtybtn">+</span>');
  proQty.on("click", ".qtybtn", function () {
    var $button = $(this);
    var oldValue = $button.parent().find("input").val();
    var id = $button.parent().find("input").attr("id");
    var newVal;
    if ($button.hasClass("inc")) {
      if (oldValue.substring(oldValue.indexOf(' ') + 1) == 'kg')
        newVal = parseFloat(oldValue.substring(0, oldValue.indexOf(' '))) + 0.05;
      else
        newVal = parseInt(oldValue.substring(0, oldValue.indexOf(' '))) + 1;
    } else {
      // Don't allow decrementing below zero
      if (oldValue.substring(0, oldValue.indexOf(' ')) > 1) {
        if (oldValue.substring(oldValue.indexOf(' ') + 1) == 'kg')
          newVal = parseFloat(oldValue.substring(0, oldValue.indexOf(' '))) - 0.05;
        else
          newVal = parseInt(oldValue.substring(0, oldValue.indexOf(' '))) - 1;
      } else {
        console.log(oldValue.substring(0, oldValue.indexOf(' ')));
        if(oldValue.substring(oldValue.indexOf(' ') + 1) == 'kg')
         newVal = parseFloat(oldValue.substring(0, oldValue.indexOf(' '))) - 0.05;
      }
    }
    $.post(
      changeqtylink,
      // DATA TO PASS
      {
        qty: newVal,
        id: id
      },
      function (data, status, xhr) {
        console.log(data);
        var pid = "total" + id.trim();
        var total = data["single"]["prod_price"] * data["single"]["quantity"];
        document.getElementById(pid).innerHTML = "₱ " + total.toFixed(2);
        document.getElementById("grand").innerHTML = "₱  " + (data["total"][0]["total"]).toFixed(2);
        if (oldValue.substring(oldValue.indexOf(' ') + 1) == 'kg')
          $button.parent().find("input").val(newVal.toFixed(2) + ' ' + data["single"]["unit"].toLowerCase());
        else
          $button.parent().find("input").val(newVal + ' ' + data["single"]["unit"].toLowerCase());
      }
    )

      // TO DO ON SUCCESS
      .done(function () { })

      // TO DO ON FAIL
      .fail(function (jqxhr, settings, ex) {
        alert("failed, " + ex);
      });

  });
})(jQuery);
