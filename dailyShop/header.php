<?php
/**
 * Header File.
 * PHP version 5
 * 
 * @category Components
 * @package  PHP
 * @author   Md Ismail <mi0718839@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @version  SVN: $Id$
 * @link     https://yoursite.com
 */ 
session_start();
require 'config.php';
if (isset($_POST['checkout'])) {
    if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in']['id'] != 0 ) {
        $user_id = $_SESSION['user_logged_in']['id'];
    }
    
    $numbr = 0;
    $cartdata = array();
    foreach ($_POST['data'] as $key => $value) {

        if ($key == $numbr) {

            $cartdata[] = $value;

        }

        $numbr++;
    }

    $cartdata = json_encode($cartdata);
    $total1 = $_POST['data']['total'];
    $create_order = "INSERT INTO `order_table`(`user_id`, `cartdata`, `total`) VALUES (  '".$user_id."', '".$cartdata."', '".$total1."') ";
  
    $insert_result = mysqli_query($conn, $create_order);
    unset($_SESSION['cart_products']);
    unset($_POST['data']);
    $_POST['data'] = array();
  
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Daily Shop | <?php echo $title; ?></title>
    
    <!-- Font awesome -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">   
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="css/jquery.simpleLens.css">    
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="css/nouislider.css">
    <!-- Theme color -->
    <link id="switcher" href="css/theme-color/default-theme.css" rel="stylesheet">
    <!-- Top Slider CSS -->
    <link href="css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="css/style.css" rel="stylesheet">    

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    

  </head>
  <!-- !Important notice -->
  <!-- Only for product page body tag have to added .productPage class -->
  <body class="productPage">  
   <!-- wpf loader Two -->
    <div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div> 
    <!-- / wpf loader Two -->       
 <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->


  <!-- Start header section -->
  <header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">
                <!-- start language -->
                <div class="aa-language">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <img src="img/flag/english.jpg" alt="english flag">ENGLISH
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="#"><img src="img/flag/french.jpg" alt="">FRENCH</a></li>
                      <li><a href="#"><img src="img/flag/english.jpg" alt="">ENGLISH</a></li>
                    </ul>
                  </div>
                </div>
                <!-- / language -->

                <!-- start currency -->
                <div class="aa-currency">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <i class="fa fa-usd"></i>USD
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="#"><i class="fa fa-euro"></i>EURO</a></li>
                      <li><a href="#"><i class="fa fa-jpy"></i>YEN</a></li>
                    </ul>
                  </div>
                </div>
                <!-- / currency -->
                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span>00-62-658-658</p>
                </div>
                <!-- / cellphone -->
              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                  <li><a href="account.html">My Account</a></li>
                  <li class="hidden-xs"><a href="wishlist.html">Wishlist</a></li>
                  <li class="hidden-xs"><a href="http://localhost/Training/dailyShop/cart.php">My Cart</a></li>
                  <li class="hidden-xs"><a href="checkout.html">Checkout</a></li>
                  <li>
                    <?php 
                    
                    if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in']['name']) {
                        echo '<a href="http://localhost/Training/dailyShop/simpleadmin/login.php?action=logout" data-toggle="modal1" data-target="#login-modal1">Logout</a>';
                    } else {
                        echo '<a href="http://localhost/Training/dailyShop/simpleadmin/login.php" data-toggle="modal1" data-target="#login-modal1">Login</a>';
                    }
                    ?>
                </li>
                </ul>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="index.html">
                  <span class="fa fa-shopping-cart"></span>
                  <p>daily<strong>Shop</strong> <span>Your Shopping Partner</span></p>
                </a>
                <!-- img based logo -->
                <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
              </div>
              <!-- / logo  -->
               <!-- cart box -->
              <div class="aa-cartbox">
              <form method="POST">
                <a class="aa-cart-link" href="http://localhost/Training/dailyShop/cart.php">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">SHOPPING CART</span>
                    <?php
                    $cart_products = array();
                    if (isset($_SESSION['cart_products']) && $_SESSION['cart_products'] != "") {

                        $cart_products = $_SESSION['cart_products'];
                
                    }
                    $count = 0;
                    
                    foreach ($cart_products as $val1) {
                        $count++;
                    }  
                    ?>
                  <span class="aa-cart-notify"><?php echo $count; ?></span>
                </a>
                <div class="aa-cartbox-summary">
                  <ul class="print_cart">
                    <?php
                    $num = 0; 
                    $sum = 0;
                    $total = 0;
                    $amount = "";
                    $html = "";
                    
                    foreach ($cart_products as $val1) {
                      
                        $html .= '<li>
                        <a class="aa-cartbox-img" href="#">

                        <img src="simpleadmin/resources/uploads/'.$val1['img'].'"
                          alt="img"></a>
                        <div class="aa-cartbox-info" data-qty="'.$val1['qnt'].'" 
                          data-price="'.$val1['price'].'">
                          <input type="hidden" name="data['.$num.'][name]" 
                            value="'.$val1['name'].'" />
                          <input type="hidden" data-price="'.$val1['price'].'" 
                            name="data['.$num.'][price]" value="'.$val1['price'].'"/>
                          <input type="hidden" data-qty="'.$val1['qnt'].'"
                          name="data['.$num.'][quantity]" value="'.$val1['qnt'].'" />
                          <h4><a href="#" class="val_name">'.$val1['name'].'</a></h4>
                          <p>'.$val1['qnt'].' x $'.$val1['price'].'</p>
                        </div>
                        <a class="remove-cart aa-remove-product" 
                          data-id="'.$val1['id'].'" data-name="'.$val1['name'].'" 
                          data-price="'.$val1['price'].'" href="javascript:void(0)">
                          <fa class="fa fa-close"></fa>
                        </a>
                        </li>';
                        $sum += $val1['qnt'] * $val1['price'];
                        $num++;
                    }
                    $amount .='<li class="tot">
                      <span class="aa-cartbox-total-title">
                        Total
                      </span>
                      <input type="hidden" name="data[total]" value="'.$sum.'" />
                      <span class="aa-cartbox-total-price">
                        $'.$sum.'
                      </span>
                    </li>'; 

                    echo $html;
                    echo $amount;
                    
                    if (isset($_SESSION['user_logged_in'])) {

                        echo '<a href="javascript:void(0)" class="aa-cart-view-btn">
                          <input type="submit" class="aa-cart-view-btn" 
                            name="checkout" value="Checkout"/>
                        </a>';

                    } else {
                        echo '<a class="aa-cartbox-checkout aa-primary-btn" 
                          href="http://localhost/Training/dailyShop/simpleadmin/login.php">
                          Login
                        </a>';
                    }

                ?>
                
                  </ul>
                </div>
              </form>
              </div>
              <!-- / cart box -->
              <!-- search box -->
              <div class="aa-search-box">
                <form action="">
                  <input type="text" placeholder="Search here ex. 'man' ">
                  <button type="submit"><span class="fa fa-search"></span></button>
                </form>
              </div>
              <!-- / search box -->             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->