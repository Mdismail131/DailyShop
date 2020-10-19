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
if (isset($_POST['edit_tag'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'product');
    $id             = $_POST['tag_id'];
    $name           = $_POST['tag_name'];
    
    $update_query1 = 'UPDATE `tags` SET `tag_name` = "'.$name.'" WHERE `tag_id` = "'.$id.'" ';
    $result3 = mysqli_query($conn, $update_query1);

    header('Location: http://localhost/Training/dailyShop/simpleadmin/tags.php');
}
if (isset($_POST['edit_category'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'product');
    $id             = $_POST['category_id'];
    $name           = $_POST['category_name'];
    
    $update_query1 = 'UPDATE `category` SET `category_name` = "'.$name.'" WHERE `category_id` = "'.$id.'" ';
    $result3 = mysqli_query($conn, $update_query1);

    header('Location: http://localhost/Training/dailyShop/simpleadmin/Categories.php');
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
    $color = $_POST['color'];
    
    $target_dir = "resources/uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    
    if ($check !== false) {
        if (file_exists($target_file)) {
            // echo "Sorry, file already exists.";
            $uploadOk = 0;
        } else {
        }
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        // echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            //   echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
        } else {
            //   echo "Sorry, there was an error uploading your file.";
        }
    }
    
    $image = $_FILES["image"]["name"];
    $qty = $_POST['prod_qnty'];
    $short_descr    = $_POST['prod_short_det'];
    $long_descr     = $_POST['prod_long_det'];
    $mrp            = $_POST['prod_price'];
    
    $selling_price  = $_POST['prod_selling_price'];


    $update_query1 = 'UPDATE `prod_table` SET `category_id` = "'.$category.'",`product_name` = "'.$name.'",`product_price` = "'.$mrp.'",`selling_price` = "'.$selling_price.'",`qty` = "'.$qty.'",`short_descr` = "'.$short_descr.'",`long_descr` = "'.$long_descr.'",`color` = "'.$color.'",`image` = "'.$image.'" WHERE `product_id` = "'.$id.'" ';
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