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

if (isset($_POST['submit'])) {
    $username = (isset($_POST['username'])) ? $_POST['username'] : "";
    $password = (isset($_POST['password'])) ? $_POST['password'] : "";
    $repassword = (isset($_POST['re-password'])) ? $_POST['re-password'] : "";
    $email = (isset($_POST['email'])) ? $_POST['email'] : "";
    $role = (isset($_POST['userrole'])) ? $_POST['userrole'] : "";
    
    //select all data form Database table.
    $select = "SELECT * FROM users "; 
    $result = mysqli_query($conn, $select);
    $row = mysqli_fetch_all($result);
    $search = '';
    foreach ($row as $val) {
        if ($val[1] == $username && $val[3] == $email) {
            $search = 'match found';
        } else if ($val[3] == $email) {
            $search = 'match found';
        }
    }
    if ($search == '') {
        //Insert data into a Database table.
        $insert = "INSERT INTO `users`( `user_name`, `password`, `Email`, `role`) 
		           VALUES ('".$username."', '".$password."', '".$email."', '".$role."') ";
        $results = mysqli_query($conn, $insert);
        if ($results) { ?>
            <script>alert("New record created successfully");</script>
        <?php }
    } else { ?>
        <script>alert("User Already Exist");</script>
    <?php }
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
            <li><a href="#tab2" class="default-tab">Add</a></li>
        </ul>
        
        <div class="clear"></div>
        
    </div> <!-- End .content-box-header -->
        
        <div class="content-box-content">
            
            <div class="tab-content default-tab" id="tab2">
            
            <form action="#" method="post">
                    
                    <fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
                        
                    
                    <p>
                        <label for="username">Username: <input type="text" 
                                name="username" required></label>
                    </p>
                    <p>
                        <label for="password">Password: <input type="password" 
                                name="password" required></label>
                    </p>
                    <p>
                        <label for="password2">Re-Password: <input type="password" 
                                name="re-password" required></label>
                    </p>
                    <p>
                        <label for="email">Email: <input type="email" 
                                name="email" required></label>
                    </p>

                    <p>
                        <label for="role">User Role: <input type="text" 
                                name="userrole" required></label>
                    </p>

                    <p>
                        <input type="submit" name="submit" value="Submit">
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