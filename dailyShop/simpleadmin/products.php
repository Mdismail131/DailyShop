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
require "header.php";
require "sidebar.php";  
require "config.php";
$msg = "";

if (!isset($_SESSION['user_logged_in']) ) {

    header('Location: http://localhost/Training/dailyShop/simpleadmin/login.php');

} elseif (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in']['role'] == 'user') {
    echo '<div id="main-content">';
    echo '<h3>You do not have permission to access this page.</h3>';
    echo '<a href="http://localhost/Training/dailyShop/simpleadmin/login.php">Click here to login</a>';
    echo '</div>';
    exit;
}

if (isset($_POST['add_product'])) {
    $target_dir = "resources/uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    
    if($check !== false) {
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

    $id             = $_POST['prod_id'];
    $name           = $_POST['prod_name'];
    $category       = $_POST['prod_cat'];
    $image          = $_FILES["image"]["name"];
    $tags = "";
    if (isset($_POST['fashion'])) {
        $tags .= $_POST['fashion'];    
    }
    if (isset($_POST['electronics'])) {
        $tags .= $_POST['electronics'];    
    }
    if (isset($_POST['games'])) {
        $tags .= $_POST['games'];
    }
    if (isset($_POST['handbag'])) {
        $tags .= $_POST['handbag'];
    }
    if (isset($_POST['laptop'])) {
        $tags .= $_POST['laptop'];
    }
    if (isset($_POST['headphone'])) {
        $tags .= $_POST['headphone'];
    }
    $color = $_POST['color'];
    $qty = $_POST['prod_qnty'];
    $short_descr    = $_POST['prod_short_det'];
    $long_descr     = $_POST['prod_long_det'];
    $mrp            = $_POST['prod_price'];
    $selling_price  = $_POST['prod_selling_price'];

    $insert_query1 = 'INSERT INTO `prod_table`(`product_id`, `category_id`, `tag_name` ,`product_name`, `product_price`, `selling_price`, `qty`, `short_descr`, `long_descr`, `color`, `image`) VALUES ( "'.$id.'","'.$category.'","'.$tags.'","'.$name.'","'.$mrp.'","'.$selling_price.'","'.$qty.'","'.$short_descr.'","'.$long_descr.'","'.$color.'","'.$image.'" )';
    
    $exec1 = mysqli_query($conn, $insert_query1);
    
}

if (isset($_GET['action'])) {

    $id = $_GET['product_id'];

    if ($_GET['action'] == 'edit' && $_GET['product_id'] != 0) {

        $edit_query = 'SELECT * FROM `prod_table` WHERE  `product_id` = '.$id.'';
        $result2 = mysqli_query($conn, $edit_query);
        $row = mysqli_fetch_all($result2);
        ?>
        
        <div id="main-content">
            <h3>Edit Product #<?php echo $row[0][0]; ?></h3>
        <div class="tab-content" id="tab2">
                
                <form method="POST" enctype="multipart/form-data">
                    
                    <fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
                        
                        <p>
                            <label>product Id</label>
                                <input class="text-input small-input" type="text" id="prod_id" name="prod_id"  onkeypress="javascript:return isNumber(event)" value="<?php echo $row[0][0]; ?>" required/>
                                <br />
                        </p>

                        <p>
                            <label>Product Name</label>
                            <input class="text-input medium-input datepicker" type="text" id="prod_name" name="prod_name" value="<?php echo $row[0][3]; ?>" required/> 
                        </p>
                        
                        <p>
                        <?php 

                            $sql = 'SELECT * FROM `category`';
                            $Call = Call_query($sql);

                            ?>
                            <label>Category</label>              
                            <select name="category" class="prod_cat">
                                <?php  foreach ($Call as $val2) : ?>
                                <option value="<?php echo $val2[0]?>" <?php if ($row[0][1] == $val2[0]) { echo 'selected'; } ?>><?php echo $val2[1]?></option>
                                <?php  endforeach; ?>    
                            </select> 
                        </p>
                        <?php 

                        $tags = explode(',', $row[0][2]);
                        
                        ?>
                        
                        <p>
                            <label>Tags</label>
                            <?php

                            $sql1 = 'SELECT * FROM `tags`';
                            $Call1 = Call_query($sql1);
                            foreach ($Call1 as $val1) {

                            ?>
                            <input type="checkbox" name="<?php echo strtolower($val1[1]); ?>" value="<?php echo $val1[1]; ?>" <?php if (in_array($val1[1], $tags)) { echo "checked"; } ?>/><?php echo $val1[1]; ?><br>
                            <?php } ?> 
                            
                        </p>
                        
                        <p>
                        <?php 

                            $sql3 = 'SELECT * FROM `color`';
                            $Call3 = Call_query($sql3);

                            ?>
                            <label>Color</label>              
                            <select name="color" class="prod_cat">
                                <?php  foreach ($Call3 as $val3) : ?>
                                <option value="<?php echo $val3[0]?>" <?php if ($row[0][9] == $val3[0]) { echo 'selected'; } ?> ><?php echo $val3[1]?></option>
                                <?php  endforeach; ?>    
                            </select> 
                        </p>
                        <p>
                            <label>Image</label>
                            <input class="text-input short-input" type="file"  name="image" required/>
                        </p>
                        <p>
                            <label>Quantity</label>
                            <input class="text-input short-input" type="text" id="prod_qnty" name="prod_qnty" onkeypress="javascript:return isNumber(event)" value="<?php echo $row[0][6]; ?>" required/>
                        </p>

                        <p>
                            <label>Short Details</label>
                            <input class="text-input short-input" type="text" id="short-input" name="prod_short_det"  value="<?php echo $row[0][7]; ?>" required/>
                        </p>
                        
                        <p>
                            <label>Long Details</label>
                            <input class="text-input large-input" type="text" id="large-input" name="prod_long_det" value="<?php echo $row[0][8]; ?>"  required/>
                        </p>
                        
                        <p>
                            <label>MRP</label>
                            <input type="text" class="text-input short-input" name="prod_price" onkeypress="javascript:return isNumber(event)" value="<?php echo $row[0][4]; ?>"  required/> 
                        </p>

                        <label>Selling Price</label>
                            <input type="text" class="text-input short-input" name="prod_selling_price" onkeypress="javascript:return isNumber(event)" value="<?php echo $row[0][5]; ?>"  required/> 
                        </p>
                        
                        <p>
                            <input class="button" type="submit" name="edit_product" value="Update" />
                        </p>
                        
                    </fieldset>
                    
                    <div class="clear"></div><!-- End .clear -->
                    
                </form>
                
            </div> <!-- End #tab2 --> 
        </div>

        <!-- end edit form -->
        
<?php
    exit;
    } elseif ($_GET['action'] == 'delete' && $_GET['product_id'] != 0) {

        $delete_query = 'DELETE FROM `prod_table` WHERE `product_id` = '.$id.' ';
        $delete_query1 = 'DELETE FROM `tags` WHERE `product_id` = '.$id.' ';
        $result1 = mysqli_query($conn, $delete_query);
        
    }

}

?>
<div id="main-content"> <!-- Main Content Section with everything -->

    <noscript> <!-- Show a notification if the user has disabled javascript -->
        <div class="notification error png_bg">
            <div>
                Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
            </div>
        </div>
    </noscript>

    <!-- Page Head -->
<h2>Welcome <?php if (isset($_SESSION['user_logged_in'])) { 
    echo $_SESSION['user_logged_in']['name']; 
} ?></h2>
    <p id="page-intro">What would you like to do?</p>    
    <div class="clear"></div> <!-- End .clear -->    
        <div class="content-box"><!-- Start Content Box -->

        <div class="content-box-header">
            
            <h3>Content box</h3>
            
            <ul class="content-box-tabs">
                <li><a href="#tab1" class="default-tab">Manage</a></li> <!-- href must be unique and match the id of target div -->
                <li><a href="#tab2">Add</a></li>
            </ul>
            
            <div class="clear"></div>
            
        </div> <!-- End .content-box-header -->
            
            <div class="content-box-content">
                
                <div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
                    
                    <!-- <div class="notification attention png_bg">
                        <a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
                        <div>
                            This is a Content Box. You can put whatever you want in it. By the way, you can close this notification with the top-right cross.
                        </div>
                    </div> -->
                    
                    <table>
                        <tfoot>
                            <tr>
                                <td colspan="6">
                                    <div class="bulk-actions align-left">
                                        <select name="dropdown">
                                            <option value="option1">Choose an action...</option>
                                            <option value="option2">Edit</option>
                                            <option value="option3">Delete</option>
                                        </select>
                                        <a class="button" href="#">Apply to selected</a>
                                    </div>
                                    
                                    <div class="pagination">
                                        <a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a>
                                        <a href="#" class="number" title="1">1</a>
                                        <a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a>
                                    </div> <!-- End .pagination -->
                                    <div class="clear"></div>
                                </td>
                            </tr>
                        </tfoot>

                        <tbody>
                        <?php
                        
                        $select = "SELECT * FROM prod_table "; 
                        $result = mysqli_query($conn, $select);
                        $row = mysqli_fetch_all($result);
                        echo "<thead>";
                        echo '<tr>
                        <th><input class="check-all" type="checkbox" /></th>
                        <th>Product Id</th>
                        <th>Category Id</th>
                        <th>Image</th>
                        <th>Tag Name</th>
                        <th>Product name</th>
                        <th>Product Price</th>
                        <th>Selling Price</th>
                        <th>Quantity</th>
                        <th>Color</th>
                        <th>Short Description</th>
                        <th>Long Description</th>
                        <th>Buttons</th>
                        </tr>';
                        echo "</thead>";

                        foreach ($row as $value) {
                            echo "<tr>";
                            echo '<td><input type="checkbox" /></td>';
                            echo "<td>" . $value[0] . "</td>";
                            echo "<td>" . $value[1] . "</td>";
                            echo "<td>" . $value[10] . "</td>";
                            echo "<td>" . $value[2] . "</td>";
                            echo "<td>" . $value[3] . "</td>";
                            echo "<td>" . $value[4] . "</td>";
                            echo "<td>" . $value[5] . "</td>";
                            echo "<td>" . $value[6] . "</td>";
                            echo "<td>" . $value[9] . "</td>";
                            echo "<td>" . $value[7] . "</td>";
                            echo "<td>" . $value[8] . "</td>";
                            echo "<td>";
                            echo '<a href="http://localhost/Training/dailyShop/simpleadmin/products.php?action=edit&product_id='.$value[0].'" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>';
                            echo '<a href="http://localhost/Training/dailyShop/simpleadmin/products.php?action=delete&product_id='.$value[0].'" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a>';
                            echo "</td>";
                            echo "</tr>";
                        }                
                        ?>
                        </tbody>
                    </table>
                </div> <!-- End #tab1 -->
                
                <div class="tab-content" id="tab2">
                
                <form method="POST" enctype="multipart/form-data">
                    
                    <fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
                        
                        <p>
                            <label>product Id</label>
                                <input class="text-input small-input" type="text" id="prod_id" onkeypress="javascript:return isNumber(event)" name="prod_id" required/>
                                <br />
                        </p>

                        <p>
                            <label>Product Name</label>
                            <input class="text-input medium-input datepicker" type="text" id="prod_name" name="prod_name" required/> 
                        </p>
                        
                        <p>
                        <?php 

                            $sql = 'SELECT * FROM `category`';
                            $Call = Call_query($sql);

                            ?>
                            <label>Category</label>              
                            <select name="prod_cat" class="prod_cat">
                                <?php  foreach ($Call as $val2) : ?>
                                <option value="<?php echo $val2[0]?>"><?php echo $val2[1]?></option>
                                <?php  endforeach; ?>    
                            </select> 
                        </p>
                        
                        <p>
                            <label>Tags</label>
                            <?php

                                    $sql1 = 'SELECT * FROM `tags`';
                                    $Call1 = Call_query($sql1);
                                    foreach ($Call1 as $val1) {
                            ?>
                            <input type="checkbox" name="<?php echo strtolower($val1[1]); ?>" value="<?php echo $val1[1]; ?>"/><?php echo $val1[1]; ?><br>
                                    <?php } ?> 
                            
                        </p>

                        <p>
                        <?php 

                            $sql3 = 'SELECT * FROM `color`';
                            $Call3 = Call_query($sql3);

                            ?>
                            <label>Color</label>              
                            <select name="color" class="prod_cat">
                                <?php  foreach ($Call3 as $val3) : ?>
                                <option value="<?php echo $val3[0]?>"><?php echo $val3[1]?></option>
                                <?php  endforeach; ?>    
                            </select> 
                        </p>

                        <p>
                            <label>Quantity</label>
                            <input class="text-input short-input" type="text" id="prod_qnty" onkeypress="javascript:return isNumber(event)" name="prod_qnty"  required/>
                        </p>
                        <p>
                            <label>Image</label>
                            <input class="text-input short-input" type="file"  name="image" required/>
                        </p>
                        <p>
                            <label>Short Details</label>
                            <input class="text-input short-input" type="text" id="short-input" name="prod_short_det" required/>
                        </p>
                        
                        <p>
                            <label>Long Details</label>
                            <input class="text-input large-input" type="text" id="large-input" name="prod_long_det" required/>
                        </p>
                        
                        <p>
                            <label>MRP</label>
                            <input type="text" class="text-input short-input" onkeypress="javascript:return isNumber(event)" name="prod_price" required/> 
                        </p>

                        <label>Selling Price</label>
                            <input type="text" class="text-input short-input" onkeypress="javascript:return isNumber(event)" name="prod_selling_price" required/> 
                        </p>
                        
                        <p>
                            <input class="button" type="submit" name="add_product" value="Submit" />
                        </p>
                        
                    </fieldset>
                    
                    <div class="clear"></div><!-- End .clear -->
                    
                </form>
                
            </div> <!-- End #tab2 -->        
            
        </div> <!-- End .content-box-content -->
        
    </div> <!-- End .content-box -->
<?php

require "footer.php";

?>