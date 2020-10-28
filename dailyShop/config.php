<?php
/**
 * Global settings/Elements.
 * PHP version 5
 * 
 * @category Components
 * @package  PHP
 * @author   Md Ismail <mi0718839@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @version  SVN: $Id$
 * @link     https://yoursite.com
 */

$siteurl="http://http://localhost/Training/dailyShop/simpleadmin/";

$conn = mysqli_connect('localhost', 'root', '', 'product');

$result_per_page = 10; 

$sql = "SELECT * FROM prod_table";
$result = mysqli_query($conn, $sql);
$number_of_results = mysqli_num_rows($result);

$number_of_pages = ceil($number_of_results/$result_per_page);

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

$this_page_first_result = ($page-1) * $result_per_page;

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>