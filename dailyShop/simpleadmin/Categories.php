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
if (!isset($_SESSION['user_logged_in']) ) {

    header('Location: http://localhost/Trainiing/dailyShop/simpleadmin/login.php');

}

if (isset($_POST['add_category'])) {
    
    $name   = $_POST['category_name'];

    $select = "SELECT * FROM category "; 
    $result = mysqli_query($conn, $select);
    $row = mysqli_fetch_all($result);
    $search = '';
    foreach ($row as $val) {
        if ($val[1] == $name) {
            $search = 'match found';
        }
    }
    if ($search == '') {
        //Insert data into a Database table.
        $insert = "INSERT INTO `category`( `category_name`) VALUES ('".$name."') ";
        // echo $insert;
        $results = mysqli_query($conn, $insert);
        if ($results) { ?>
            <script>alert("New record created successfully");</script>
        <?php }
    } else { ?>
        <script>alert("Category Already Exist");</script>
    <?php }
}

if (isset($_GET['action'])) {

    $id = $_GET['category_id'];

    if ($_GET['action'] == 'edit' && $_GET['category_id'] != 0) {

        $edit_query = 'SELECT  * FROM `category` WHERE `category_id` = '.$id.'';
        $result2 = mysqli_query($conn, $edit_query);
        $row = mysqli_fetch_all($result2);
    ?>
    <div id="main-content">
            <h3>Edit Product #<?php echo $row[0][0]; ?></h3>
        <div class="tab-content" id="tab2">
        <form method="post">
                    
                    <fieldset> <!--Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
                                            
                        <p>
                            <label>Category Id</label>
                                <input class="text-input small-input" id="prod_id" onkeypress="javascript:return isNumber(event)" name="category_id" placeholder="Auto Generated" value="<?php echo $row[0][0]; ?>"/>
                                <br />
                        </p>
    
                        <p>
                            <label>Category Name</label>
                            <input class="text-input medium-input datepicker" type="text" id="prod_name" name="category_name" value="<?php echo $row[0][1]; ?>" required/> 
                        </p>
                        
                        <p>
                            <input class="button" name="edit_category" type="submit" value="Update" />
                        </p>
                        
                    </fieldset>
                    
                    <div class="clear"></div><!--End .clear-->
                    
                </form>
                
            </div> <!-- End #tab2 --> 
        </div>
    
        <!-- end edit form -->
<?php
    exit;
    } elseif ($_GET['action'] == 'delete' && $_GET['category_id'] != 0) {

        $delete_query = 'DELETE FROM `category` WHERE `category_id` = '.$id.' ';
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
                    
                    $select = "SELECT * FROM category "; 
                    $result = mysqli_query($conn, $select);
                    $row = mysqli_fetch_all($result);
                    echo "<thead>";
                    echo '<tr>
                    <th><input class="check-all" type="checkbox" /></th>
                    <th>Category Id</th>
                    <th>Category name</th>
                    <th>Buttons</th>
                    </tr>';
                    echo "</thead>";

                    foreach ($row as $value) {
                        echo "<tr>";
                        echo '<td><input type="checkbox" /></td>';
                        echo "<td name='category_id'>" . $value[0] . "</td>";
                        echo "<td name='category_name'>" . $value[1] . "</td>";
                        echo "<td>";
                        echo '<a href="http://localhost/Training/dailyShop/simpleadmin/Categories.php?action=edit&category_id='.$value[0].'" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>';
                        echo '<a href="http://localhost/Training/dailyShop/simpleadmin/Categories.php?action=delete&category_id='.$value[0].'" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a>';
                        echo "</td>";
                        echo "</tr>";
                    }                
                    ?>
                    </tbody>
                </table>

            </div> <!-- End #tab1 -->
            
            <div class="tab-content" id="tab2">
            
            <form method="post">
                    
                <fieldset> <!--Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
                                        
                    <p>
                        <label>Category Id</label>
                            <input class="text-input small-input" id="prod_id" onkeypress="javascript:return isNumber(event)" name="category_id" placeholder="Auto Generated"/>
                            <br />
                    </p>

                    <p>
                        <label>Category Name</label>
                        <input class="text-input medium-input datepicker" type="text" id="prod_name" name="category_name" required/> 
                    </p>
                    
                    <p>
                        <input class="button" name="add_category" type="submit" value="Submit" />
                    </p>
                    
                </fieldset>
                
                <div class="clear"></div><!--End .clear-->
                
            </form>
                
            </div> <!--End #tab2         -->
            
        </div> <!-- End .content-box-content -->
        
    </div> <!-- End .content-box -->
<?php

require "footer.php";

?>