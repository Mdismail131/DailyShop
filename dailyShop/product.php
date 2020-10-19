<?php
/**
 * Products File.
 * PHP version 5
 * 
 * @category Components
 * @package  PHP
 * @author   Md Ismail <mi0718839@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @version  SVN: $Id$
 * @link     https://yoursite.com
 */
$title = "Products";
require "header.php";
require "menubar.php";
require "config.php";


?> 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Products</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>         
          <li class="active">All Products</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- product category -->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-head">
              <div class="aa-product-catg-head-left">
                <form action="" class="aa-sort-form">
                  <label for="">Sort by</label>
                  <select name="">
                    <option value="1" selected="Default">Default</option>
                    <option value="2">Name</option>
                    <option value="3">Price</option>
                    <option value="4">Date</option>
                  </select>
                </form>
                <form action="" class="aa-show-form">
                  <label for="">Show</label>
                  <select name="">
                    <option value="1" selected="12">12</option>
                    <option value="2">24</option>
                    <option value="3">36</option>
                  </select>
                </form>
              </div>
              <div class="aa-product-catg-head-right">
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
              </div>
            </div>
            <div class="aa-product-catg-body">
              <ul class="aa-product-catg"> 
                <!-- start single product item -->
                <?php
                if (isset($_GET['action'])) {
                    if ($_GET['action'] == 'category' && $_GET['category_id'] != 0) {
                        $id = $_GET['category_id'];
                        $select = "SELECT * FROM prod_table WHERE `category_id` = '.$id.' LIMIT ".$this_page_first_result.','.$result_per_page;
                        $result = mysqli_query($conn, $select);
                        $row = mysqli_fetch_all($result);
                        foreach ($row as $val) {
                            echo "<li>";
                            echo "<figure>";
                              echo '<a class="aa-product-img" href="#"><img src="simpleadmin/resources/uploads/'.$val[10].'" alt="polo shirt img"></a>';
                              echo '<a class="aa-add-card-btn" data-categoryid="'.$val[0].'" href="javascript:void(0);"><span class="fa fa-shopping-cart"></span>Add To Cart</a>';
                              echo "<figcaption>";
                                echo '<h4 class="aa-product-title" data-prod_name="'.$val[3].'"><a href="#">'.$val[3].'</a></h4>';
                                echo '<span class="aa-product-price" data-prod_price="'.$val[5].'">Rs.'.$val[5].'</span><span class="aa-product-price"><del>$65.50</del></span>';
                                echo '<p class="aa-product-descrip">'.$val[6].'</p>';
                              echo "</figcaption>";
                            echo "</figure>";
                            echo '<div class="aa-product-hvr-content">';
                              echo '<a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>';
                              echo '<a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>';
                              echo '<a href="http://localhost/Training/dailyShop/product-detail.php?prod_id='.$val[0].'"  title="Quick View" ><span class="fa fa-search"></span></a>';
                            echo "</div>";
                            echo '</li>';
                        }
                    } elseif ($_GET['action'] == 'tag' && $_GET['tag_name'] != "") {
                        $name = $_GET['tag_name'];
                        $select = "SELECT * FROM prod_table  LIMIT ".$this_page_first_result.','.$result_per_page;
                        $result = mysqli_query($conn, $select);
                        $row = mysqli_fetch_all($result);
                        foreach ($row as $val) {
                            $tags = explode(',', $val[2]);
                            if (in_array($name, $tags)) {
                                  echo "<li>";
                                echo "<figure>";
                                  echo '<a class="aa-product-img" href="#"><img src="simpleadmin/resources/uploads/'.$val[10].'" alt="polo shirt img"></a>';
                                  echo '<a class="aa-add-card-btn" data-categoryid="'.$val[0].'" href="javascript:void(0);"><span class="fa fa-shopping-cart"></span>Add To Cart</a>';
                                  echo "<figcaption>";
                                    echo '<h4 class="aa-product-title" data-prod_name="'.$val[3].'"><a href="#">'.$val[3].'</a></h4>';
                                    echo '<span class="aa-product-price" data-prod_price="'.$val[5].'">Rs.'.$val[5].'</span><span class="aa-product-price"><del>$65.50</del></span>';
                                    echo '<p class="aa-product-descrip">'.$val[6].'</p>';
                                  echo "</figcaption>";
                                echo "</figure>";
                                echo '<div class="aa-product-hvr-content">';
                                  echo '<a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>';
                                  echo '<a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>';
                                  echo '<a href="http://localhost/Training/dailyShop/product-detail.php?prod_id='.$val[0].'"  title="Quick View" ><span class="fa fa-search"></span></a>';
                                echo "</div>";
                                echo '</li>';
                            }
                        }
                    } elseif ($_GET['action'] == 'color' && $_GET['color'] != "") {
                        $color = $_GET['color'];
                        $select = "SELECT * FROM prod_table  WHERE `color` = '".$color."'  LIMIT ".$this_page_first_result.','.$result_per_page;
                        $result = mysqli_query($conn, $select);
                        $row = mysqli_fetch_all($result);
                        foreach ($row as $val) {
                                echo "<li>";
                              echo "<figure>";
                                echo '<a class="aa-product-img" href="#"><img src="simpleadmin/resources/uploads/'.$val[10].'" alt="polo shirt img"></a>';
                                echo '<a class="aa-add-card-btn" data-categoryid="'.$val[0].'" href="javascript:void(0);"><span class="fa fa-shopping-cart"></span>Add To Cart</a>';
                                echo "<figcaption>";
                                  echo '<h4 class="aa-product-title" data-prod_name="'.$val[3].'"><a href="#">'.$val[3].'</a></h4>';
                                  echo '<span class="aa-product-price" data-prod_price="'.$val[5].'">Rs.'.$val[5].'</span><span class="aa-product-price"><del>$65.50</del></span>';
                                  echo '<p class="aa-product-descrip">'.$val[6].'</p>';
                                echo "</figcaption>";
                              echo "</figure>";
                              echo '<div class="aa-product-hvr-content">';
                                echo '<a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>';
                                echo '<a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>';
                                echo '<a href="http://localhost/Training/dailyShop/product-detail.php?prod_id='.$val[0].'"  title="Quick View" ><span class="fa fa-search"></span></a>';
                              echo "</div>";
                              echo '</li>';
                        }
                    }
                } else {
                    $select = "SELECT * FROM prod_table LIMIT ".$this_page_first_result.','.$result_per_page;
                    $result = mysqli_query($conn, $select);
                    $row = mysqli_fetch_all($result);
                    foreach ($row as $val) {
                        echo "<li>";
                        echo "<figure>";
                          echo '<a class="aa-product-img" href="http://localhost/Training/dailyShop/product-detail.php"><img src="simpleadmin/resources/uploads/'.$val[10].'" alt="polo shirt img"></a>';
                          echo '<a class="aa-add-card-btn" name = "add_to_cart" data-task="product" data-categoryid="'.$val[0].'" href="javascript:void(0);"><span class="fa fa-shopping-cart"></span>Add To Cart</a>';
                          echo "<figcaption>";
                            echo '<h4 class="aa-product-title" data-prod_name="'.$val[3].'"><a href="#">'.$val[3].'</a></h4>';
                            echo '<span class="aa-product-price" data-prod_price="'.$val[5].'">Rs.'.$val[5].'</span><span class="aa-product-price"><del>$65.50</del></span>';
                            echo '<p class="aa-product-descrip">'.$val[6].'</p>';
                          echo "</figcaption>";
                        echo "</figure>";
                        echo '<div class="aa-product-hvr-content">';
                          echo '<a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>';
                          echo '<a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>';
                          echo '<a href="http://localhost/Training/dailyShop/product-detail.php?prod_id='.$val[0].'"  title="Quick View" ><span class="fa fa-search"></span></a>';
                        echo "</div>";
                        echo '</li>';
                    }
                }
                ?>
              </ul>
              <!-- quick view modal -->                  
              <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">                      
                    <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <div class="row">
                        <!-- Modal view slider -->
                        <div class="col-md-6 col-sm-6 col-xs-12">                              
                          <div class="aa-product-view-slider">                                
                            <div class="simpleLens-gallery-container" id="demo-1">
                              <div class="simpleLens-container">
                                  <div class="simpleLens-big-image-container">
                                      <a class="simpleLens-lens-image" data-lens-image="img/view-slider/large/polo-shirt-1.png">
                                          <img src="img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
                                      </a>
                                  </div>
                              </div>
                              <div class="simpleLens-thumbnails-container">
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-1.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-1.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-1.png">
                                  </a>                                    
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-3.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-3.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-3.png">
                                  </a>

                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-4.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-4.png">
                                      <img src="/img/man/polo-shirt-4.png.png">
                                  </a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Modal view content -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="aa-product-view-content">
                            <h3>T-Shirt</h3>
                            <div class="aa-price-block">
                              <span class="aa-product-view-price">$34.99</span>
                              <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
                            <h4>Size</h4>
                            <div class="aa-prod-view-size">
                              <a href="#">S</a>
                              <a href="#">M</a>
                              <a href="#">L</a>
                              <a href="#">XL</a>
                            </div>
                            <div class="aa-prod-quantity">
                              <form action="">
                                <select name="quantity" id="quantity">
                                  <option value="0" selected="1">1</option>
                                  <option value="1">2</option>
                                  <option value="2">3</option>
                                  <option value="3">4</option>
                                  <option value="4">5</option>
                                  <option value="5">6</option>
                                </select>
                              </form>
                              <p class="aa-prod-category">
                                Category: <a href="#">Polo T-Shirt</a>
                              </p>
                            </div>
                            <div class="aa-prod-view-bottom">
                              <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                              <a href="http://localhost/Training/dailyShop/product-detail.php" class="aa-add-to-cart-btn">View Details</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>                        
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
              <!-- / quick view modal -->   
            </div>
            <div class="aa-product-catg-pagination">
              <nav>
                <ul class="pagination">
                  <li>
                    <a href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                    <?php
                    for ($page=1; $page<=$number_of_pages; $page++) {
                        echo '<li><a href="http://localhost/Training/dailyShop/product.php?page='.$page.'">' . $page . '</a></li>';
                    }
                    ?>
                  <li><?php
                    echo '<a href = "javascript:void(0);" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>'
                    ?>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Category</h3>
              <ul class="aa-catg-nav">
                <?php
                
                $select1 = "SELECT * FROM category "; 
                $result1 = mysqli_query($conn, $select1);
                $row1 = mysqli_fetch_all($result1);
                foreach ($row1 as $value) {
                    echo '<li><a href="http://localhost/Training/dailyShop/product.php?action=category&category_id='.$value[0].'">'.$value[1].'</a></li>';
                }

                ?>
              </ul>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Tags</h3>
              <div class="tag-cloud">
                <?php                  
                  $select2 = "SELECT * FROM tags "; 
                  $result2 = mysqli_query($conn, $select2);
                  $row2 = mysqli_fetch_all($result2);
                foreach ($row2 as $value1) {
                    echo '<a href="http://localhost/Training/dailyShop/product.php?action=tag&tag_name='.$value1[1].'">'.$value1[1].'</a>';
                }

                ?>
                </div>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Shop By Price</h3>              
              <!-- price range -->
              <div class="aa-sidebar-price-range">
               <form method = "POST">
                  <div id="skipstep" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                  </div>
                  <span id="skip-value-lower" class="example-val skip-value-lower">500</span>
                  <input  type="hidden" name="lower" class="skip-value-lower"  value="">
                 <span id="skip-value-upper" class="example-val skip-value-upper">5,000</span>
                 <input  type="hidden" name="upper" class="skip-value-upper" value="">
                 <input class="aa-filter-btn" type="submit" name = "filter" value = "Filter">
               </form>
              </div>              

            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Shop By Color</h3>
              <div class="aa-color-tag">
                <?php 
                
                $sql4 = "SELECT * FROM color ";
                $Call7 = mysqli_query($conn, $sql4);
                $Call4 = mysqli_fetch_all($Call7);
      
                foreach ($Call4 as $val4) {
                ?>
                <a class="aa-color-<?php echo strtolower($val4[1]); ?>" href="http://localhost/Training/dailyShop/product.php?action=color&color=<?php echo $val4[0]; ?>"></a>
                <?php
                }
                ?>
              </div>                            
            </div>
          </aside>
        </div>
       
      </div>
    </div>
  </section>
  <!-- / product category -->
<?php
require "footer.php";
?>