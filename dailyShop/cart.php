<?php
/**
 * Cart.
 * PHP version 5
 * 
 * @category Components
 * @package  PHP
 * @author   Md Ismail <mi0718839@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @version  SVN: $Id$
 * @link     https://yoursite.com
 */
$title = "Cart";
require "header.php";
require "config.php";
require "menubar.php";

?>  
 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Cart Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>                   
          <li class="active">Cart</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
     <form action = "product.php" method="POST">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody id="cart">
                    <?php
                    
                    $cart_products = array();
                    $total = 0;
                    $num = 0; 
                    if (isset($_SESSION['cart_products']) && $_SESSION['cart_products'] != "") {

                        $cart_products = $_SESSION['cart_products'];
                    }
                    
                    foreach ($cart_products as $val1) {
                    ?>
                    <tr>
                      <td><a class="remove aa-remove-product" data-id="<?php echo $val1['id']?>" data-name="<?php echo $val1['name']?>" data-price="<?php echo $val1['price']?>" href="javascript:void(0)"><fa class="fa fa-close"></fa></a></td>
                      <td><a href="#"><img src="simpleadmin/resources/uploads/<?php echo $val1['img']?>" alt="img"></a></td>
                      <td><a class="aa-cart-title" href="#"><?php echo $val1['name']; ?></a></td>
                      <td><?php echo $val1['price']; ?></td>
                      <td><input class="aa-cart-quantity" type="text" readonly value="<?php echo $val1['qnt']; ?>"></td>
                      <td>$<?php 
                          $sum = $val1['qnt'] * $val1['price'];
                          echo $sum;
                        ?></td>
                    </tr>
                    <input type="hidden" name="data[<?php echo $num; ?>][name]" value="<?php echo $val1['name']; ?>" />
                    <input type="hidden" name="data[<?php echo $num; ?>][price]" value="<?php echo $val1['price']; ?>" />
                    <input type="hidden" name="data[<?php echo $num; ?>][quantity]" value="<?php echo $val1['qnt']; ?>" />
                    <?php 
                    $total = $total + $sum;
                    $num++; 
                    } ?>
                    </tbody>
                  </table>
                </div>
             
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Cart Totals</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Subtotal</th>
                     <td>$<?php echo $total; ?></td>
                   </tr>
                   <tr>
                     <th>Total</th>
                     <input type="hidden" name="data[total]" value="<?php echo $total; ?>" />
                     <td>$<?php echo $total; ?></td>
                   </tr>
                 </tbody>
               </table>
                <?php

                if (isset($_SESSION['user_logged_in'])) {

                    echo '<a href="javascript:void(0)" class="aa-cart-view-btn"><input type="submit" class="aa-cart-view-btn" name="checkout" value="Proced to Checkout"/></a>';

                } else {
                    echo '<a href="http://localhost/Training/dailyShop/simpleadmin/login.php" class="aa-cart-view-btn">Login</a>';
                }

                ?>
              
             </div>
           </div>
         </div>
       </div>
      </form>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
<?php
require "footer.php";
?>