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
/**
 * Function callme().
 * 
 * @param array $row The array which contains values of product.                                 
 * 
 * @return void
 */
function callme($row) 
{
    foreach ($row as $val) {
        echo "<li>";
        echo "<figure>";
            echo '<a class="aa-product-img" 
            data-prod_img="'.$val[10].'" 
            href="javascript:void(0)">
            <img src="simpleadmin/resources/uploads/'.$val[10].'" 
            alt="polo shirt img">
            </a>';
            echo '<a class="aa-add-card-btn" name = "add_to_cart" 
            data-task="product" data-categoryid="'.$val[0].'"
            href="javascript:void(0);">
            <span class="fa fa-shopping-cart">
            </span>Add To Cart
            </a>';
            echo "<figcaption>";
            echo '<h4 class="aa-product-title" 
            data-prod_name="'.$val[3].'">
            <a href="#">'.$val[3].'</a>
            </h4>';
            echo '<span class="aa-product-price" 
            data-prod_price="'.$val[5].'">Rs.'.$val[5].'</span>
            <span class="aa-product-price"><del>$65.50</del>
            </span>';
            echo '<p class="aa-product-descrip">'.$val[6].'</p>';
            echo "</figcaption>";
        echo "</figure>";
        echo '<div class="aa-product-hvr-content">';
            echo '<a href="#" data-toggle="tooltip" 
            data-placement="top" title="Add to Wishlist">
            <span class="fa fa-heart-o"></span>
            </a>';
            echo '<a href="#" data-toggle="tooltip" 
            data-placement="top" title="Compare">
            <span class="fa fa-exchange"></span>
            </a>';
            echo '<a href="http://localhost/Training/dailyShop/product-detail.php?prod_id='.$val[0].'"  title="Quick View" >
            <span class="fa fa-search"></span>
            </a>';
        echo "</div>";
        echo '</li>';
    }
}
?>