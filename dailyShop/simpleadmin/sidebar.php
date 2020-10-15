<?php
?>
<div id="sidebar">
    <div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
    <?php
    $filename = basename($_SERVER['REQUEST_URI']);
    // echo $filename;
    
    $productmenu = array('products.php', 'Categories.php', 'tags.php');
    $usermenu = array('users.php', 'adduser.php');
    $signupmenu = array('signup.php');
    $ordermenu = array('order.php');
    
    ?>
    <h1 id="sidebar-title"><a href="#"></a></h1>
    <!-- Logo (221px wide) -->
    <a href="#"><img id="logo" src="resources/images/logo.png" alt="Simpla Admin logo" /></a>

    <!-- Sidebar Profile links -->
    <div id="profile-links"> <?php 
    
    if (isset($_SESSION['user_logged_in'])) :

    ?>
Hello, <a href="#" title="Edit your profile"><?php if (isset($_SESSION['user_logged_in'])) { 
    echo $_SESSION['user_logged_in']['name']; 
} ?></a>, you have <a href="#messages" rel="modal" title="3 Messages">3 Messages</a><br />
        <br />
        <a href="#" title="View the Site">View the Site</a> | <a href='http://localhost/Training/dailyShop/simpleadmin/login.php?action=logout' title="Sign Out">Sign Out</a>
    <?php endif; ?>
    </div>        
    
    <ul id="main-nav">  <!-- Accordion Menu -->
        
        <li>
            <a href="http://www.google.com/" class="nav-top-item no-submenu"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
                Dashboard
            </a>       
        </li>
        
        <li>
            <a href="#" class="nav-top-item <?php if(in_array($filename, $productmenu)) : ?>current<?php endif; ?>"> <!-- Add the class "current" to current menu item -->
            Products
            </a>
            <ul>
                <li><a href="products.php" <?php if($filename == 'products.php') : ?>class = "current"<?php endif; ?>>Manage Products</a></li> <!-- Add class "current" to sub menu items also -->
                <li><a href="Categories.php" <?php if($filename == 'Categories.php') : ?>class = "current"<?php endif ; ?>>Manage Categories</a></li>
                <li><a href="tags.php" <?php if($filename == 'tags.php') : ?>class = "current"<?php endif ; ?>>Manage tags</a></li>
            </ul>
        </li>
        
        <li>
            <a href="#" class="nav-top-item <?php if(in_array($filename, $usermenu)) : ?>current<?php endif ; ?>">
                Users
            </a>
            <ul>
                <li><a href="adduser.php" <?php if($filename == 'adduser.php') : ?>class = "current"<?php endif ; ?>>Add User</a></li>
                <li><a href="users.php" <?php if($filename == 'users.php') : ?>class = "current"<?php endif ; ?>>Manage User</a></li>
            </ul>
        </li>
        
        <li>
            <a href="#" class="nav-top-item <?php if(in_array($filename, $ordermenu)) : ?>current<?php endif ; ?>">
                Orders
            </a>
            <ul>
                <li><a href="order.php" <?php if($filename == 'order.php') : ?>class = "current"<?php endif ; ?>>Manage Orders</a></li>
            </ul>
        </li>
        
        <li>
            <a href="#" class="nav-top-item">
                Settings
            </a>
            <ul>
                <li><a href="#">General</a></li>
            </ul>
        </li> 
        <?php if (!isset($_SESSION['user_logged_in'])) : ?>
        <li>
            <a href="signup.php" class="nav-top-item no-submenu">
                Sign Up
            </a>
        </li>  
        <li>
            <a href="login.php" class="nav-top-item no-submenu">
                Log In
            </a>
        </li>  
        <?php endif; ?>   
        
    </ul> <!-- End #main-nav -->

    <div id="messages" style="display: none"> <!-- Messages are shown when a link with these attributes are clicked: href="#messages" rel="modal"  -->
        
        <h3>3 Messages</h3>
        
        <p>
            <strong>17th May 2009</strong> by Admin<br />
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
            <small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
        </p>
        
        <p>
            <strong>2nd May 2009</strong> by Jane Doe<br />
            Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.
            <small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
        </p>
        
        <p>
            <strong>25th April 2009</strong> by Admin<br />
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
            <small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
        </p>
        
        <form action="#" method="post">
            
            <h4>New Message</h4>
            
            <fieldset>
                <textarea class="textarea" name="textfield" cols="79" rows="5"></textarea>
            </fieldset>
            
            <fieldset>
            
                <select name="dropdown" class="small-input">
                    <option value="option1">Send to...</option>
                    <option value="option2">Everyone</option>
                    <option value="option3">Admin</option>
                    <option value="option4">Jane Doe</option>
                </select>
                
                <input class="button" type="submit" value="Send" />
            </fieldset>
        </form>   
    </div> <!-- End #messages -->

</div></div> <!-- End #sidebar -->