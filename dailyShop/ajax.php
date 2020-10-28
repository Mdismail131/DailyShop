<?php
/**
 * Ajax Request.
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
require "config.php";
// $count = 0;
$cart_products = array();
if (isset($_SESSION['cart_products']) && $_SESSION['cart_products'] != "") {

    $cart_products = $_SESSION['cart_products'];

}

if (isset($_POST['task']) && $_POST['task'] == 'add_to_cart') {
    $temp = array();
    $product_id = array();
    if (isset($_SESSION['cart_products']) && $_SESSION['cart_products'] != " ") {
        
        $set = "";
        $cart_products = $_SESSION['cart_products'];
        foreach ($cart_products as $key => $val) {
            array_push($product_id, $val['id']);
            if ($val['id'] == $_POST['p_id']) {
                $quan = $val['qnt'];
                $prace = $val['price'];
                unset($cart_products[$key]['qnt']);
                $cart_products[$key]['qnt'] = $quan + 1;
                break;
            } 
             
        }
        if (!in_array($_POST['p_id'], $product_id)) {
                $temp['id'] = $_POST['p_id'];
                $temp['img'] = $_POST['p_img'];
                $temp['name'] = $_POST['p_name'];
                $temp['qnt'] = $_POST['p_quan'];
                $temp['price'] = $_POST['p_price'];
        }
    } else {
        $temp['id'] = $_POST['p_id'];
        $temp['img'] = $_POST['p_img'];
        $temp['name'] = $_POST['p_name'];
        $temp['qnt'] = $_POST['p_quan'];
        $temp['price'] = $_POST['p_price'];
   
    }
    
    if (!empty($temp)) {
        $cart_products[] = $temp;
        
    } 
    
    $_SESSION['cart_products'] = $cart_products;
    $html = "";
    $sum = 0;

    foreach ($cart_products as $val1) {
        $sum = $sum + ($val1['qnt'] * $val1['price']);
        $html .= '<li>
        <a class="aa-cartbox-img" href="#">
        <img src="simpleadmin/resources/uploads/'.$val1['img'].'" alt="img"></a>
        <div class="aa-cartbox-info" data-qty="'.$val1['qnt'].'" data-price="'.$val1['price'].'">
          <h4><a href="#">'.$val1['name'].'</a></h4>
          <p>'.$val1['qnt'].' x $'.$val1['price'].'</p>
        </div>
        <a class="remove-cart aa-remove-product"  data-id="'.$val1['id'].'" data-name="'.$val1['name'].'" data-price="'.$val1['price'].'" href="javascript:void(0)"><fa class="fa fa-close"></fa></a>
      </li>';
    }
    $html .='<li class="tot">
                      <span class="aa-cartbox-total-title">
                        Total
                      </span>
                      <span class="aa-cartbox-total-price">
                        $'.$sum. 
                        '
                      </span>
                    </li>';
    if (isset($_SESSION['user_logged_in'])) {

        $html .= '<a href="http://localhost/Training/dailyShop/simpleadmin/checkout.html" class="aa-cart-view-btn"><input type="submit" class="aa-cart-view-btn" name="checkout" value="Checkout"/></a>';

    } else {
        $html .= '<a class="aa-cartbox-checkout aa-primary-btn" href="http://localhost/Training/dailyShop/simpleadmin/login.php">Login</a>';
    }

    echo $html;

}

if (isset($_POST['task']) && $_POST['task'] == 'add_to_detail_cart') {
    $temp = array();
    if (isset($_SESSION['cart_products'])) {
        
        $cart_products = $_SESSION['cart_products'];
        foreach ($cart_products as $key => $val) {
            if ($val['id'] == $_POST['p_id']) {
                $quan = $val['qnt'];
                $prace = $val['price'];
                unset($cart_products[$key]['qnt']);
                $cart_products[$key]['qnt'] = $quan + $_POST['p_quan'];
                break;
            } 
        }
        if (!in_array($_POST['p_id'], $product_id)) {
            $temp['id'] = $_POST['p_id'];
            // $temp['img'] = $_POST['p_img'];
            $temp['name'] = $_POST['p_name'];
            $temp['qnt'] = $_POST['p_quan'];
            $temp['price'] = $_POST['p_price'];
        }
    } else {
        
        $temp['id'] = $_POST['p_id'];
        // $temp['img'] = $_POST['p_img'];
        $temp['name'] = $_POST['p_name'];
        $temp['qnt'] = $_POST['p_quan'];
        $temp['price'] = $_POST['p_price'];
        
    }
    if (!empty($temp)) {
        $cart_products[] = $temp;
        
    } 
    
    
    $_SESSION['cart_products'] = $cart_products;
    $html = "";

    foreach ($cart_products as $val1) {
        $html .= '<li>
        <a class="aa-cartbox-img" href="#">
        <img src="img/woman-small-1.jpg" alt="img"></a>
        <div class="aa-cartbox-info">
          <h4><a href="#">'.$val1['name'].'</a></h4>
          <p>'.$val1['qnt'].' x $'.$val1['price'].'</p>
        </div>
        <a class="remove-cart aa-remove-product" data-qty="'.$val1['qnt'].'" data-id="'.$val1['id'].'" data-name="'.$val1['name'].'" data-price="'.$val1['price'].'" href="javascript:void(0)"><fa class="fa fa-close"></fa></a>
      </li>';
    }
    $html .='<li class="tot">
                      <span class="aa-cartbox-total-title">
                        Total
                      </span>
                      <span class="aa-cartbox-total-price">
                        $'.$sum. 
                        '
                      </span>
                    </li>';

    echo $html;

}
if (isset($_POST['task']) && $_POST['task'] == 'remove') {
    $arr=$_SESSION['cart_products'];

    foreach ($arr as $key => $war) {
        
        if ($war['id'] == $_POST['p_id']) {

            array_splice($arr, $key, 1);

        }
        
    }
    
    ksort($arr);
    $_SESSION['cart_products']=$arr;
    $cart_products = $_SESSION['cart_products'];
    
    echo json_encode(array('product' => $cart_products));
}

// -------------------- New Filter Query ------------------------------

if (isset($_POST['flag'])) {
    
    $where = " `product_name` != '' ";
    $orderby ="";
    
    if (isset($_POST['sort'])) {
        $sort = $_POST['sort'];
        
        
        if ($sort==0) {
            $orderby .= " ORDER BY `sale_price` ASC "; 
        }
        if ($sort==1) {
            $orderby .= " ORDER BY `sale_price` DESC ";
        }
        if ($sort==2) {
            $orderby .= " ORDER BY `rating` ASC ";
        }
        if ($sort==3) {
            $orderby .= " ORDER BY `rating` DESC ";
        }
    }   
    if (isset($_POST['category']) && ($_POST['category']!= "")) {
         $gender = $_POST['category'];
         $where .= "AND `category_id` = '$gender' ";
    }
    if (isset($_POST['color']) && ($_POST['color']!= "")) {
        $color = $_POST['color'];
        $where .= " AND `color` = '$color' ";   
    }
    if (isset($_POST['tag']) && ($_POST['tag']!= "")) {
         $tag = $_POST['tag'];
         $where .= " AND `tag_name` = '$tag' "; 
    }
    if (isset($_POST['minamt'], $_POST['maxamt']) && ($_POST['minamt']!= "") && ($_POST['maxamt']!= "")) {
         $minprice = $_POST['minamt'];
         $maxprice = $_POST['maxamt'];
         $where .= " AND `sale_price` BETWEEN '".$minprice."' AND '".$maxprice."' ";    
    }

    $query = "SELECT * FROM `prod_table` WHERE".$where."  ";
    // echo $query;
    // exit;
    // ' LIMIT 6 OFFSET 3 '  use this for Sort by number of products
    $result1 = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result1); //,MYSQLI_ASSOC
    $data = json_encode($row);
    echo $data;

    
}