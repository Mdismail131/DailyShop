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

if (isset($_GET['action'])) {

    $id = $_GET['order_id'];

    if ($_GET['action'] == 'edit' && $_GET['order_id'] != 0) {

        $edit_query = 'SELECT `order_id`, `user_id`, `cartdata`, `total`, `datetime` FROM `order_table` WHERE `order_id` = '.$id.'';
        $result2 = mysqli_query($conn, $edit_query);
        $row = mysqli_fetch_all($result2);
        
    } elseif ($_GET['action'] == 'delete' && $_GET['order_id'] != 0) {

        $delete_query = 'DELETE FROM `order_table` WHERE `order_id` = '.$id.' ';
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
            <!-- <li><a href="#tab2">Add</a></li> -->
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
                    
                    $select = "SELECT * FROM order_table "; 
                    $result = mysqli_query($conn, $select);
                    $row = mysqli_fetch_all($result);
                    echo "<thead>";
                    echo '<tr>
                    <th><input class="check-all" type="checkbox" /></th>
                    <th>Order Id</th>
                    <th>User Id</th>
                    <th>Cart data</th>
                    <th>Total</th>
                    <th>Date/Time</th>
                    <th>Buttons</th>
                    </tr>';
                    echo "</thead>";

                    foreach ($row as $value) {
                        echo "<tr>";
                        echo '<td><input type="checkbox" /></td>';
                        echo "<td>" . $value[0] . "</td>";
                        echo "<td>" . $value[1] . "</td>";
                        echo "<td>" . $value[2] . "</td>";
                        echo "<td>" . $value[3] . "</td>";
                        echo "<td>" . $value[4] . "</td>";
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
            
            <!-- <div class="tab-content" id="tab2">
            
            <form action="#" method="post"> -->
                    
                <!-- <fieldset> Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
                                        
                    <!-- <p>
                        <label>Category Id</label>
                            <input class="text-input small-input" type="number" id="prod_id" name="category_id" required/>
                            <br />
                    </p>

                    <p>
                        <label>Category Name</label>
                        <input class="text-input medium-input datepicker" type="text" id="prod_name" name="category_name" required/> 
                    </p>
                    
                    <p>
                        <input class="button" name="submit" type="submit" value="Submit" />
                    </p>
                    
                </fieldset>
                 -->
                <!-- <div class="clear"></div>End .clear -->
                
            <!-- </form> -->
                
            <!-- </div> End #tab2         -->
            
        </div> <!-- End .content-box-content -->
        
    </div> <!-- End .content-box -->
<?php

require "footer.php";

?>