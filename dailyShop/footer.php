<?php
?>
<!-- Subscribe section -->
<section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>Subscribe our newsletter </h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, velit!</p>
            <form action="" class="aa-subscribe-form">
              <input type="email" name="" id="" placeholder="Enter your Email">
              <input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
</section>
<!-- / Subscribe section -->

<!-- footer -->  
<footer id="aa-footer">
  <!-- footer bottom -->
  <div class="aa-footer-top">
    <div class="container">
      <div class="row">
      <div class="col-md-12">
        <div class="aa-footer-top-area">
          <div class="row">
            <div class="col-md-3 col-sm-6">
              <div class="aa-footer-widget">
                <h3>Main Menu</h3>
                <ul class="aa-footer-nav">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Our Services</a></li>
                  <li><a href="#">Our Products</a></li>
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="aa-footer-widget">
                <div class="aa-footer-widget">
                  <h3>Knowledge Base</h3>
                  <ul class="aa-footer-nav">
                    <li><a href="#">Delivery</a></li>
                    <li><a href="#">Returns</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Discount</a></li>
                    <li><a href="#">Special Offer</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="aa-footer-widget">
                <div class="aa-footer-widget">
                  <h3>Useful Links</h3>
                  <ul class="aa-footer-nav">
                    <li><a href="#">Site Map</a></li>
                    <li><a href="#">Search</a></li>
                    <li><a href="#">Advanced Search</a></li>
                    <li><a href="#">Suppliers</a></li>
                    <li><a href="#">FAQ</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="aa-footer-widget">
                <div class="aa-footer-widget">
                  <h3>Contact Us</h3>
                  <address>
                    <p> 25 Astor Pl, NY 10003, USA</p>
                    <p><span class="fa fa-phone"></span>+1 212-982-4589</p>
                    <p><span class="fa fa-envelope"></span>dailyshop@gmail.com</p>
                  </address>
                  <div class="aa-footer-social">
                    <a href="#"><span class="fa fa-facebook"></span></a>
                    <a href="#"><span class="fa fa-twitter"></span></a>
                    <a href="#"><span class="fa fa-google-plus"></span></a>
                    <a href="#"><span class="fa fa-youtube"></span></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
  <!-- footer-bottom -->
  <div class="aa-footer-bottom">
    <div class="container">
      <div class="row">
      <div class="col-md-12">
        <div class="aa-footer-bottom-area">
          <p>Designed by <a href="http://www.markups.io/">MarkUps.io</a></p>
          <div class="aa-footer-payment">
            <span class="fa fa-cc-mastercard"></span>
            <span class="fa fa-cc-visa"></span>
            <span class="fa fa-paypal"></span>
            <span class="fa fa-cc-discover"></span>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
</footer>
<!-- / footer -->
<!-- Login Modal -->  
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">                      
      <div class="modal-body">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4>Login or Register</h4>
        <form class="aa-login-form" action="">
          <label for="">Username or Email address<span>*</span></label>
          <input type="text" placeholder="Username or email">
          <label for="">Password<span>*</span></label>
          <input type="password" placeholder="Password">
          <button class="aa-browse-btn" type="submit">Login</button>
          <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
          <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
          <div class="aa-register-now">
            Don't have an account?<a href="account.html">Register now!</a>
          </div>
        </form>
      </div>                        
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>


    
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.js"></script>  
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="js/jquery.smartmenus.js"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="js/jquery.smartmenus.bootstrap.js"></script>  
  <!-- To Slider JS -->
  <script src="js/sequence.js"></script>
  <script src="js/sequence-theme.modern-slide-in.js"></script>  
  <!-- Product view slider -->
  <script type="text/javascript" src="js/jquery.simpleGallery.js"></script>
  <script type="text/javascript" src="js/jquery.simpleLens.js"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="js/slick.js"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="js/nouislider.js"></script>
  <!-- Custom js -->
  <script src="js/custom.js"></script> 

</body>
<script>
  $(document).ready(function(){
    var qty = 0;
    var price = 0;
    var total = 0;
    var style = "";
    var total1 = "";
    var task = "";
    var count = 0;
    
    $('.aa-add-card-btn').click(function(){
            
        var action = $(this).data('task');
        var prod_id = 0;
        var prod_img = "";
        var prod_quan = 0;
        var prod_name = "";
        var prod_price = 0;
        
        if (action == 'detail' ) {

          task = "add_to_detail_cart";
          prod_id = $(this).attr('data-id');
          prod_quan  = $('select[name="qnt"]').val();
          prod_name = $(this).attr('data-name');
          prod_price = $(this).attr('data-price');

        } else {

          task = "add_to_cart";
          prod_id = $(this).attr('data-categoryid');
          prod_quan = "1";
          prod_img = $(this).parent().find('.aa-product-img').data('prod_img');
          prod_name = $(this).parent().find('.aa-product-title').data('prod_name');
          prod_price = $(this).parent().find('.aa-product-price').data('prod_price');

        }
          $.ajax({
            type: "POST",
            url: "ajax.php",
            data: { 
                    task: task,
                    p_id: prod_id,
                    p_img: prod_img,
                    p_name: prod_name,
                    p_quan: prod_quan,
                    p_price: prod_price
            },
            success:function(response){

              $('.print_cart').html(response);
                
            }
        });
        
        $(".print_cart").children().each(function(){

          style = $(this).attr('style');
          total1  = $(this).attr('class');
          
            if(style != "display: none" && (total1 != "tot" && total1 != "aa-cartbox-checkout aa-primary-btn aa-cart-view-btn")){
              count = count + 1;
              qty = $(this).find('div').attr('data-qty');
              price = $(this).find('div').attr('data-price');
            }
        });

        $('.aa-cart-notify').html(count);
        $('.aa-cartbox-total-price').html(total);
        count = 0;
        total = 0;
    });

    $('.remove-cart').on('click', function(){
            
        var prod_id = $(this).attr('data-id');
        task='remove';
        var prod_name = $(this).attr('data-name');
        $(this).parent().hide();

        $(".print_cart").children().each(function(){
            style = $(this).attr('style');
            total1 = $(this).attr('class');
            
            if(style != "display: none;" && (total1 != "tot" && total1 != "aa-cartbox-checkout aa-primary-btn" ) ){
              count = count + 1;
              qty = $(this).find('div').attr('data-qty');
              price = $(this).find('div').attr('data-price');
              var prod =  price * qty ;

              total = total + prod;
            }
        });
        $('.aa-cart-notify').html(count);
        $('.aa-cartbox-total-price').html(total);
        count = 0;
        $.ajax({
            type: "POST",
            url: "ajax.php",
            dataType: "json",
            data: { 
                    task: task,
                    p_id: prod_id,
                    p_name: prod_name
            },
            success:function(response){

                console.log(response);
            
            }
        });
    });
                
    $('.remove').on('click',function(){
        // alert('1');
        var prod_id = $(this).attr('data-id');
        task='remove';
        var prod_name = $(this).attr('data-name');
        $(this).parent().parent().hide();
        $(".print_cart").children().each(function(){
            style = $(this).attr('style');
            total1 = $(this).attr('class');
            
            if(style != "display: none;" && (total1 != "tot" && total1 != "aa-cartbox-checkout aa-primary-btn" ) ){
              count = count + 1;
              qty = $(this).find('div').attr('data-qty');
              price = $(this).find('div').attr('data-price');
              var prod =  price * qty ;

              total = total + prod;
            }
        });
        $('.aa-cart-notify').html(count);
        $('.aa-cartbox-total-price').html(total);
        count = 0;
          $.ajax({
            type: "POST",
            url: "ajax.php",
            dataType: "json",
            data: { 
                    task: task,
                    p_id: prod_id,
                    p_name: prod_name
            },
            success:function(response){

                console.log(response);
                
            }
        });
        
    });
    
  });

</script>
</html>


