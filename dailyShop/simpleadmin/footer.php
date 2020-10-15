<?php
?>
<div id="footer">
            <small> <!-- Remove this notice or replace it with whatever you want -->
                    &#169; Copyright 2009 Your Company | Powered by <a href="http://themeforest.net/item/simpla-admin-flexible-user-friendly-admin-skin/46073">Simpla Admin</a> | <a href="#">Top</a>
            </small>
        </div><!-- End #footer -->
        
    </div> <!-- End #main-content -->
</div>
<script>
    //jquery for checking the Password and Re-password matches or not.
    jQuery('input[name="re-password"]').blur(function(){
        var password = jQuery('input[name="password"]').val();
        var repassword = jQuery('input[name="re-password"]').val();
        if(repassword != password){
            alert('Please enter the same password.');
            jQuery('input[name="re-password"]').val('');
        }
    });

</script>
</body>
</html>