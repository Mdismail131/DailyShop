<?php
/**
 * Index File.
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
$arr = $_SERVER['PHP_SELF'];
$url = explode('/', $arr);
if (!isset($_SESSION['user_logged_in']) && (( in_array('products.php', $url)) || (in_array('Categories.php', $url)) || (in_array('users.php', $url)) || (in_array('adduser.php', $url)) || (in_array('tags.php', $url)) )) {

    header('Location: http://localhost/Training/dailyShop/simpleadmin/login.php');

}
if (isset($_GET['action']) && ($_GET['action'] == 'signout')) {
    session_unset();
    session_destroy();
}
if (isset($_POST['edit_product'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'product');
    $id             = $_POST['prod_id'];
    $name           = $_POST['prod_name'];
    $category       = $_POST['prod_cat'];
    $tags = "";
    if (isset($_POST['fashion'])) {
        $tags .= $_POST['fashion'].",";    
    }
    if (isset($_POST['electronics'])) {
        $tags .= $_POST['electronics'].",";    
    }
    if (isset($_POST['games'])) {
        $tags .= $_POST['games'].",";
    }
    if (isset($_POST['handbag'])) {
        $tags .= $_POST['handbag'].",";
    }
    if (isset($_POST['laptop'])) {
        $tags .= $_POST['laptop'].",";
    }
    if (isset($_POST['headphone'])) {
        $tags .= $_POST['headphone'];
    }

    $qty = $_POST['prod_qnty'];
    $short_descr    = $_POST['prod_short_det'];
    $long_descr     = $_POST['prod_long_det'];
    $mrp            = $_POST['prod_price'];
    
    $selling_price  = $_POST['prod_selling_price'];


    $update_query1 = 'UPDATE `prod_table` SET `category_id` = "'.$category.'",`product_name` = "'.$name.'",`product_price` = "'.$mrp.'",`selling_price` = "'.$selling_price.'",`qty` = "'.$qty.'",`short_descr` = "'.$short_descr.'",`long_descr` = "'.$long_descr.'" WHERE `product_id` = "'.$id.'" ';
    $result3 = mysqli_query($conn, $update_query1);

    header('Location: http://localhost/Training/dailyShop/simpleadmin/products.php');
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Simpla Admin</title>
<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="resources/css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="resources/css/invalid.css" type="text/css" media="screen" />
<script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="resources/scripts/simpla.jquery.configuration.js"></script>
<script type="text/javascript" src="resources/scripts/facebox.js"></script>
<script type="text/javascript" src="resources/scripts/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="resources/scripts/jquery.datePicker.js"></script>
<script type="text/javascript" src="resources/scripts/jquery.date.js"></script>
</head>
    <body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
    

<!-- 
UPDATE `prod_table`
SET `category_id` = "1",`product_name` = "FootBall",`product_price` = "2200",
`selling_price` = "2000",`qty` = "1",`short_descr` = "Lorem ipsum dolor sit amet, ",
`long_descr` = "Lorem ipsum dolor sit amet, consectetur adipiscing elit " 
WHERE `product_id` = "101" -->