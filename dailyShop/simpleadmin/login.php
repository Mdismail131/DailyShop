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
session_start();
 require "config.php";

if (isset($_GET['action']) && $_GET['action'] == 'logout') {

    unset($_SESSION['user_logged_in']);
    unset($_POST);
}

if (isset($_POST['submit'])) {
    $username = (isset($_POST['username'])) ? $_POST['username'] : "";
    $password = (isset($_POST['password'])) ? $_POST['password'] : "";
  
    
    
    //Select all data from DB table.
    $select = "SELECT * FROM users "; 
    $result = mysqli_query($conn, $select);
    $row = mysqli_fetch_all($result);
    $search = '';
    foreach ($row as $val) {
        //check username and password match or not.
        if ($val[1] == $username && $val[2] == $password) {
            $search = 'match found';
            $_SESSION['user_logged_in']['name'] = $username;
            header('Location: http://localhost/Training/dailyShop/simpleadmin/products.php');
        }
    }
    if ($search == '') { ?>
        <script>alert("User Doesn't Exist");</script>
    <?php } 
    unset($_POST);   
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Simple Admin | Sign In</title>
<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="resources/css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="resources/css/invalid.css" type="text/css" media="screen" />
<script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="resources/scripts/simpla.jquery.configuration.js"></script>
<script type="text/javascript" src="resources/scripts/facebox.js"></script>
<script type="text/javascript" src="resources/scripts/jquery.wysiwyg.js"></script>
</head>
  
<body id="login">

    <div id="login-wrapper" class="png_bg">
        <div id="login-top">

          <h1>Simple Admin</h1>
          <!-- Logo (221px width) -->
          <img id="logo" src="resources/images/logo.png" alt="Simpla Admin logo" />
        </div> <!-- End #logn-top -->

        <div id="login-content">

            <form method="post">

                

                <p>
                    <label>Username</label>
                    <input class="text-input" name="username" type="text" />
                </p>
                <div class="clear"></div>
                <p>
                    <label>Password</label>
                    <input class="text-input" name="password" type="password" />
                </p>
                <div class="clear"></div>
                <p id="remember-password">
                    <input type="checkbox" />Remember me
                </p>
                <div class="clear"></div>
                <p>
                    <input class="button" type="submit" name="submit" value="Sign In" />
                </p>

            </form>
        </div> <!-- End #login-content -->

    </div> <!-- End #login-wrapper -->
</body>
</html>
