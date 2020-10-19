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
global $count;
$count = 0;
$cart_products = array();
if (isset($_SESSION['cart_products']) && $_SESSION['cart_products'] != "") {

    $cart_products = $_SESSION['cart_products'];

}

if (isset($_POST['task']) && $_POST['task'] == 'add_to_cart') {
    $temp = array();
    if (isset($_SESSION['cart_products'])) {
        
        $cart_products = $_SESSION['cart_products'];
        foreach ($cart_products as $key => $val) {
            if ($val['id'] == $_POST['p_id']) {
                $quan = $val['qnt'];
                $prace = $val['price'];
                unset($cart_products[$key]['qnt']);
                $cart_products[$key]['qnt'] = $quan + 1;
                break;
            } 
        }
        if ($val['id'] != $_POST['p_id']) {
            $temp['id'] = $_POST['p_id'];
            $temp['name'] = $_POST['p_name'];
            $temp['qnt'] = $_POST['p_quan'];
            $temp['price'] = $_POST['p_price'];
        }
    } else {
        
        $temp['id'] = $_POST['p_id'];
        $temp['name'] = $_POST['p_name'];
        $temp['qnt'] = $_POST['p_quan'];
        $temp['price'] = $_POST['p_price'];
        
    }
    if (!empty($temp)) {
        $cart_products[] = $temp;
        
    } 
    
    foreach ($cart_products as $key => $val) {
        $count++;
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
        <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
      </li>';
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
        if ($val['id'] != $_POST['p_id']) {
            $temp['id'] = $_POST['p_id'];
            $temp['name'] = $_POST['p_name'];
            $temp['qnt'] = $_POST['p_quan'];
            $temp['price'] = $_POST['p_price'];
        }
    } else {
        
        $temp['id'] = $_POST['p_id'];
        $temp['name'] = $_POST['p_name'];
        $temp['qnt'] = $_POST['p_quan'];
        $temp['price'] = $_POST['p_price'];
        
    }
    if (!empty($temp)) {
        $cart_products[] = $temp;
        
    } 
    
    foreach ($cart_products as $key => $val) {
        $count++;
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
        <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
      </li>';
    }
    echo $html;
}

?>