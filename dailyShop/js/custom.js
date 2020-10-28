/** 
  * Template Name: Daily Shop
  * Version: 1.0  
  * Template Scripts
  * Author: MarkUps
  * Author URI: http://www.markups.io/

  Custom JS
  

  1. CARTBOX
  2. TOOLTIP
  3. PRODUCT VIEW SLIDER 
  4. POPULAR PRODUCT SLIDER (SLICK SLIDER) 
  5. FEATURED PRODUCT SLIDER (SLICK SLIDER)
  6. LATEST PRODUCT SLIDER (SLICK SLIDER) 
  7. TESTIMONIAL SLIDER (SLICK SLIDER)
  8. CLIENT BRAND SLIDER (SLICK SLIDER)
  9. PRICE SLIDER  (noUiSlider SLIDER)
  10. SCROLL TOP BUTTON
  11. PRELOADER
  12. GRID AND LIST LAYOUT CHANGER 
  13. RELATED ITEM SLIDER (SLICK SLIDER)

  
**/

jQuery(function($){

  
  /* ----------------------------------------------------------- */
  /*  Custom Filter code 
  /* ----------------------------------------------------------- */
    

  $(document).ready(function(){

     /*----------------------
       Assigning Filter Values
      -------------------------*/

      var products = [];
      var filter = [];
      filter['category'] = "";
      filter['minamt'] = "";
      filter['maxamt'] = "";
      filter['color'] = "";
      filter['tags'] = "";
      filter['sort'] = "";

       // category filter
      $('.aa-catg-nav li').on('click',function(){
          
          var a = $(this).data('cat_id');
          filter['category'] = a;
          console.log(filter['category']);
          
          get_table(filter);
      });

      // Price filter
      $(".filter-btn").click(function()
      {
          var min = $("#minamount").val();
          var max = $("#maxamount").val();
          var minamt = min.replace("$","");
          var maxamt = max.replace("$","");
          filter['minamt']= minamt;
          filter['maxamt']= maxamt;
          console.log(filter['minamt']);
          console.log(filter['maxamt']);
          get_table(filter);
      });

      // Tag filter
      $(".tag-cloud a").click(function()
      {   
          var tag = $(this).text();
          
          filter['tags'] = tag;
          console.log(filter['tags']);
          get_table(filter);

      });

      // Color filter
      $(".aa-color-tag a").click(function()
      {
          var color = $(this).data('color_id');
          
          filter['color'] = color;
          get_table(filter);

      });

      // Sort By filter
      $(".option").click(function()
      {
          var sort = $(this).attr('data-value');
          console.log(sort);
          filter['sort']= sort;
          get_table(filter);
      });

      // AJAX Request Function
      function get_table(datas)
      {
          console.log(filter);
          $.ajax(
          {

                   url  : "ajax.php",
                  type  : "post",
                  data  :  {  "flag"   : "0",
                             "category" : datas['category'],

                             "minamt"   : datas['minamt'],
                             "maxamt"   : datas['maxamt'],
                             "color"    : datas['color'],
                             "tag"      : datas['tags'],
                             "sort"     : datas['sort']
                           },
              dataType  : "json",
               success  : function(response)
               {    
                  console.log(response);                        
                  console.log(response[0]);                        
                  get_data(response);
               }

          });

      };
     
       /*------------------------
       Display Filtered products
      ---------------------------*/
      function get_data(abc)
      {
          var html = "";
          
          for (var i = 0; i < abc.length; i++)
          {
                                      
            html += '<li><figure>';
            html += '<a class="aa-product-img" data-prod_img="'+abc[i][10]+'" href="http://localhost/Training/dailyShop/product-detail.php">';
            html += '<img src="simpleadmin/resources/uploads/'+abc[i][10]+'"alt="polo shirt img"></a>';
            html += '<a class="aa-add-card-btn" name = "add_to_cart" data-task="product" data-categoryid="'+abc[i][0]+'" href="javascript:void(0);">';
            html += '<span class="fa fa-shopping-cart"></span>Add To Cart</a>';
            html += '<figcaption><h4 class="aa-product-title" data-prod_name="'+abc[i][3]+'">';
            html += '<a href="#">'+abc[i][3]+'</a></h4><span class="aa-product-price" data-prod_price="'+abc[i][5]+'">Rs.'+abc[i][5]+'</span>';
            html += '<span class="aa-product-price"><del>$65.50</del></span><p class="aa-product-descrip">'+abc[i][6]+'</p>';
            html += '</figcaption></figure><div class="aa-product-hvr-content"><a href="#" data-toggle="tooltip"'; 
            html += 'data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>';
            html += '<a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>';
            html += '<a href="http://localhost/Training/dailyShop/product-detail.php?prod_id='+abc[i][0]+'"  title="Quick View" >';
            html += '<span class="fa fa-search"></span></a></div></li>';
                 
         }
          $(".aa-product-catg").html(html);
         
      }

  });   

  /* ----------------------------------------------------------- */
  /*  End Custom Filter code 
  /* ----------------------------------------------------------- */

  /* ----------------------------------------------------------- */
  /*  1. CARTBOX 
  /* ----------------------------------------------------------- */
    
     jQuery(".aa-cartbox").hover(function(){
      jQuery(this).find(".aa-cartbox-summary").fadeIn(500);
    }
      ,function(){
          jQuery(this).find(".aa-cartbox-summary").fadeOut(500);
      }
     );   
  
  /* ----------------------------------------------------------- */
  /*  2. TOOLTIP
  /* ----------------------------------------------------------- */    
    jQuery('[data-toggle="tooltip"]').tooltip();
    jQuery('[data-toggle2="tooltip"]').tooltip();

  /* ----------------------------------------------------------- */
  /*  3. PRODUCT VIEW SLIDER 
  /* ----------------------------------------------------------- */    

    jQuery('#demo-1 .simpleLens-thumbnails-container img').simpleGallery({
        loading_image: 'demo/images/loading.gif'
    });

    jQuery('#demo-1 .simpleLens-big-image').simpleLens({
        loading_image: 'demo/images/loading.gif'
    });

  /* ----------------------------------------------------------- */
  /*  4. POPULAR PRODUCT SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */      

    jQuery('.aa-popular-slider').slick({
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 4,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    }); 

  
  /* ----------------------------------------------------------- */
  /*  5. FEATURED PRODUCT SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */      

    jQuery('.aa-featured-slider').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
    });
    
  /* ----------------------------------------------------------- */
  /*  6. LATEST PRODUCT SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */      
    jQuery('.aa-latest-slider').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
    });

  /* ----------------------------------------------------------- */
  /*  7. TESTIMONIAL SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */     
    
    jQuery('.aa-testimonial-slider').slick({
      dots: true,
      infinite: true,
      arrows: false,
      speed: 300,
      slidesToShow: 1,
      adaptiveHeight: true
    });

  /* ----------------------------------------------------------- */
  /*  8. CLIENT BRAND SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */  

    jQuery('.aa-client-brand-slider').slick({
        dots: false,
        infinite: false,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 2000,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 4,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
    });

  /* ----------------------------------------------------------- */
  /*  9. PRICE SLIDER  (noUiSlider SLIDER)
  /* ----------------------------------------------------------- */        

    jQuery(function(){
      if($('body').is('.productPage')){
       var skipSlider = document.getElementById('skipstep');
        noUiSlider.create(skipSlider, {
            range: {
                'min': 500,
                '10%': 1500,
                '20%': 3000,
                '30%': 4500,
                '40%': 6000,
                '50%': 7500,
                '60%': 9000,
                '70%': 10000,
                '80%': 11000,
                '90%': 20000,
                'max': 26000
            },
            snap: true,
            connect: true,
            start: [500, 26000]
        });
        // for value print
        var skipValues = [
          document.getElementById('skip-value-lower'),
          document.getElementById('skip-value-upper'),
        ];
        var lower;
        var upper;
        skipSlider.noUiSlider.on('update', function( values, handle ) {
          skipValues[handle].innerHTML = values[handle];
          lower = values[0];
          upper = values[1];
        });
        
        $('.aa-filter-btn').on('click',function(){
          task = "filter_by_price";
          
          $.ajax({
            type: "POST",
            url: "ajax.php",
            // dataType: "json",
            data: {
                    task: task,
                    minval: lower,
                    maxval: upper
            },
            success:function(response){

              alert(response);
              console.log(response);
              $('.aa-product-catg').html(response);
            }
        });
        });
      }
    });


    
  /* ----------------------------------------------------------- */
  /*  10. SCROLL TOP BUTTON
  /* ----------------------------------------------------------- */

  //Check to see if the window is top if not then display button

    jQuery(window).scroll(function(){
      if ($(this).scrollTop() > 300) {
        $('.scrollToTop').fadeIn();
      } else {
        $('.scrollToTop').fadeOut();
      }
    });
     
    //Click event to scroll to top

    jQuery('.scrollToTop').click(function(){
      $('html, body').animate({scrollTop : 0},800);
      return false;
    });
  
  /* ----------------------------------------------------------- */
  /*  11. PRELOADER
  /* ----------------------------------------------------------- */

    jQuery(window).load(function() { // makes sure the whole site is loaded      
      jQuery('#wpf-loader-two').delay(200).fadeOut('slow'); // will fade out      
    })

  /* ----------------------------------------------------------- */
  /*  12. GRID AND LIST LAYOUT CHANGER 
  /* ----------------------------------------------------------- */

  jQuery("#list-catg").click(function(e){
    e.preventDefault(e);
    jQuery(".aa-product-catg").addClass("list");
  });
  jQuery("#grid-catg").click(function(e){
    e.preventDefault(e);
    jQuery(".aa-product-catg").removeClass("list");
  });


  /* ----------------------------------------------------------- */
  /*  13. RELATED ITEM SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */      

    jQuery('.aa-related-item-slider').slick({
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 4,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    }); 
    
});

