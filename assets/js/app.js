(function($)
{
    "use strict"
    $('.mg-banner-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 500,
        autoplay: true,
        arrows: true,
    });

    $('.mg-event-wrap.slider-style').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 500,
        autoplay: true,
        arrows: true,
    });

     $(document).ready(function () {
         $('.menu-btn').sidr({
             body: '.offcanvas-wrap',
              name: 'sidr-main',
             renaming: 'false',
             source: '.mmenuglide',
         });
     });

     //this code is close sidr menu if clicked outside  {optional}
     jQuery(".offcanvas-wrap").on("click", function () {
         jQuery.sidr('close', 'sidr-main');
     });

    $(document).ready(function(){
      $('.sidr-inner [class*="sidr-class"]').each(function(){
        var old_classes = $(this).attr('class');
        old_classes = old_classes.replace(/sidr-class-/g, '');
        $(this).attr('class', old_classes);
      });
    jQuery('<i class="fa fa-caret-down sidedropdown"></i>').appendTo(jQuery(".sidr li.menu-item-has-children > a"));

        jQuery(".sidr ul .sidedropdown").on('click', function(event) {
          event.preventDefault();
          jQuery(this).toggleClass('open');
          jQuery(this).toggleClass('first');
          jQuery(this).parent().next('.sub-menu').toggleClass('open');
        });
    });

    //Preloader
    setTimeout(function(){
        $('body').addClass('loaded');
    }, 3000);

    $(".simply-countdown-one").simplyCountdown({
        year: 2017,
        month: 5,
        day: 10,
        hours:12
    });



    //Mailchimp subscription form
    var subfrom = $(".subscription-form");
    var loader = $(".ajax-loader");

    subfrom.submit(function(e) {
      loader.show()
    });

    $('[data-toggle="tooltip"]').tooltip();

    subfrom.ajaxChimp({
        url: "http://themeforest.us13.list-manage.com/subscribe/post?u=c9f26ead80c5cb7180849094a&amp;id=51cf03ce84",
        callback: function(response) {
            var subresult = $(".subscription-form-wrapper .result");
            if(jQuery('.form-control.valid')[0]){
                $(".subscription-form").hide();
                subresult.removeClass('subscribe-error fadeInDown');
                subresult.addClass('subscribe-success');
                subresult.text(response.msg).addClass('animated fadeInDown');
            }
            else{
                subresult.addClass('subscribe-error');
                subresult.removeClass('subscribe-success fadeInDown');
                subresult.text(response.msg).addClass('animated fadeInDown');
            loader.hide();
            }
        }
    });

    //Contact form validation
    $('#contact_form').validate({
        rules: {
            first_name: {
                required: true,
            },
            comments: {
                required: true,
            },
            user_email: {
                required: true,
                email: true,
            },
        },
        submitHandler: function(form){
            loader.show();
            jQuery.ajax({
                url :"contact_mail.php",
                type : 'POST',
                data : {
                    first_name : $('[name="first_name"]').val(),
                    user_email : $('[name="user_email"]').val(),
                    comments : $('[name="comments"]').val(),
                },

                success:function(data){
                    $("#mail-status").html(data).addClass('animated fadeInDown');
                    loader.hide();
                },
                error:function (){
                    loader.hide();
                }
            })
        }
    });

  // // Fullscreen
  // var scroll = $.FullScreen({
  //     move: '.wrapper',
  //     row: '.row',
  //     nav: '.port-nav',
  //     time: '1s',
  //     type: 'cubic-bezier(1,-0.12, 0.44, 0.99)',
  //     navClass: 'cursor',
  //     minHeight: 200
  // })

// Isotope
    var $grid = $('.product-grid').isotope({
      itemSelector: '.product-wrap',
      layoutMode: 'masonry'
    });


// Isotope
    var $grid = $('.grid').isotope({
      itemSelector: '.element-item',
      layoutMode: 'masonry'
    });
    // filter functions
    var filterFns = {
    };
    // bind filter button click
    $('.filters-button-group').on( 'click', 'button', function() {
      var filterValue = $( this ).attr('data-filter');
      // use filterFn if matches value
      filterValue = filterFns[ filterValue ] || filterValue;
      $grid.isotope({ filter: filterValue });
    });
    // change is-checked class on buttons
    $('.button-group').each( function( i, buttonGroup ) {
      var $buttonGroup = $( buttonGroup );
      $buttonGroup.on( 'click', 'button', function() {
        $buttonGroup.find('.is-checked').removeClass('is-checked');
        $( this ).addClass('is-checked');
      });
    });

    if ( jQuery( ".timer" ).length ) {
      jQuery(document).on('scroll', function() {
         var hT = jQuery('.timer').offset().top,
             hH = jQuery('.timer').outerHeight(),
             wH = jQuery(window).height(),
             wS = jQuery(this).scrollTop();
         if (wS > (hT+hH-wH)){
            jQuery(document).off('scroll');
            jQuery('.timer').countTo();
         }
      });
    }

    // $(".jAudio--player").jAudio({
    //   playlist: [
    //     {
    //       file: "http://localhost:8888/blaire/wp-content/themes/manang/assets/tracks/01.mp3",
    //       thumb: "http://localhost:8888/blaire/wp-content/themes/manang/assets/thumbs/01.jpg",
    //       trackName: "Dusk",
    //       trackArtist: "Tobu & Syndec",
    //       trackAlbum: "Single",
    //     },
    //     {
    //       file: "http://localhost:8888/blaire/wp-content/themes/manang/assets/tracks/02.mp3",
    //       thumb: "http://localhost:8888/blaire/wp-content/themes/manang/assets/thumbs/02.jpg",
    //       trackName: "Blank",
    //       trackArtist: "Disfigure",
    //       trackAlbum: "Single",
    //     },
    //     {
    //       file: "http://localhost:8888/blaire/wp-content/themes/manang/assets/tracks/03.mp3",
    //       thumb: "http://localhost:8888/blaire/wp-content/themes/manang/assets/thumbs/03.jpg",
    //       trackName: "Fade",
    //       trackArtist: "Alan Walker",
    //       trackAlbum: "Single",
    //     }
    //   ],

    //     swfPath: "",
    //     supplied: "OGA, MP3",
    //     useStateClassSkin: true,
    //     autoBlur: false,
    //     smoothPlayBar: true,
    // });

      $('.navbar-nav').onePageNav({
        currentClass: 'current',
        changeHash: false,
        scrollSpeed: 900,
        scrollThreshold: 0.1,
        filter: '',
        navItems: 'a',
        navHeight: 70,
        easing: 'swing',
        begin: function() {
            //I get fired when the animation is starting
        },
        end: function() {
            //I get fired when the animation is ending
        },
        scrollChange: function($currentListItem) {
            //I get fired when you enter a section and I pass the list item of the section
        }
      });

    (function() {

      [].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
        new CBPFWTabs( el );
      });

    })();
    (function() {
      if(jQuery("#slideshow").length != 0) {
        document.documentElement.className = 'js';
        var slideshow = new CircleSlideshow(document.getElementById('slideshow'));
      }
    })();

    $('.nav-wrapper').stickMe({
      transitionDuration: 500,
      shadow: true,
      shadowOpacity: 0.6,
      animate: true,
      transitionStyle: 'slide'
    });

    $('.popup-link').magnificPopup({
      type: 'image',
      mainClass: 'mfp-zoom-in',
      tLoading: '',
      removalDelay: 500, //delay removal by X to allow out-animation
      callbacks: {

        imageLoadComplete: function() {
          var self = this;
          setTimeout(function() {
            self.wrap.addClass('mfp-image-loaded');
          }, 16);
        },
        close: function() {
          this.wrap.removeClass('mfp-image-loaded');
        },
      },

      closeBtnInside: true,
      closeOnContentClick: true,
      midClick: true
    });

      $('.testimonial-content.modern-style').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 500,
        autoplay: true,
        arrows: false,
        fade: true,
        asNavFor: '.testimonial-img-wrap'
    });
    $('.testimonial-img-wrap.modern-style').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        speed: 500,
        asNavFor: '.testimonial-content',
        dots: false,
        arrows: false,
        centerMode: true,
        focusOnSelect: true,
        slide: 'div'
    });

    $('.testimonial-content.three-column.slider').slick({
        infinite: true,
        autoplaySpeed: 7000,
        arrows: false,
        slidesToShow: 3,
        autoplay: true,
        slidesToScroll: 1,
        responsive: [
        {
          breakpoint: 990,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: true,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

    $('.testimonial-content.two-column.slider').slick({
        infinite: true,
        autoplaySpeed: 7000,
        arrows: false,
        slidesToShow: 2,
        autoplay: true,
        slidesToScroll: 1,
        responsive: [
        {
          breakpoint: 990,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: true,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

    $('.testimonial-content.one-column.slider').slick({
        infinite: true,
        autoplaySpeed: 7000,
        arrows: false,
        autoplay: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [
        {
          breakpoint: 990,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

    //client
    $('.client-slider').slick({
      infinite: true,
      autoplaySpeed: 7000,
      arrows: false,
      slidesToShow: 5,
      autoplay: true,
      slidesToScroll: 5,
      responsive: [
          {
            breakpoint: 990,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 4,
              infinite: true,
            }
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          }
      ]
    });

    // Insta slider
    $('.instagram-wrap').slick({
      dots: false,
      infinite: true,
      speed: 500,
      autoplay: true,
      arrows: true,
      slidesToShow:5,
      slidesToScroll: 1,
      responsive: [
          {
            breakpoint: 990,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 1,
              infinite: true,
            }
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          }
      ]
    });

      // Product slider
    $('.product-slider-based').slick({
      dots: false,
      infinite: true,
      speed: 500,
      autoplay: true,
      autoplay: true,
      arrows: true,
      slidesToShow:4,
      slidesToScroll: 1,
      responsive: [
          {
            breakpoint: 990,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1,
              infinite: true,
            }
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
      ]
    });

    // Product slider
    $('.product-cat-slider').slick({
      dots: false,
      infinite: true,
      speed: 500,
      autoplay: true,
      arrows: true,
      slidesToShow:1,
      slidesToScroll: 1
    });


    // Blog slider

    $('.blog-post-slider').slick({
        infinite: true,
        autoplaySpeed: 7000,
        arrows: false,
        autoplay: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
        {
          breakpoint: 990,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: true,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

// Portfolio slider

    $('.portfolio-slider').slick({
        infinite: true,
        autoplaySpeed: 7000,
        arrows: false,
        centerMode: true,
        autoplay: true,
        centerPadding: '350px',
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [
        {
          breakpoint: 990,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });


// Flip card
    jQuery(document).ready(function($) {
      var i;
      //Count nr. of square classes
      var countSquare = $('.square').length;

      //For each Square found add BG image
      for (i = 0; i < countSquare; i++) {
        var firstImage = $('.square').eq([i]);
        var secondImage = $('.square2').eq([i]);

        var getImage = firstImage.attr('data-image');
        var getImage2 = secondImage.attr('data-image');

        firstImage.css('background-image', 'url(' + getImage + ')');
        secondImage.css('background-image', 'url(' + getImage2 + ')');
      }

    });
    // Tweet slider
    $('.tweet-slider').slick({
        infinite: true,
        autoplaySpeed: 7000,
        arrows: false,
        autoplay: true,
        slidesToShow: 1,
        slidesToScroll: 1,
    });

    $(".video-popup").YouTubePopUp();

    AOS.init({
      duration: 800,
      easing: 'ease-in-sine',
      delay: 500,
      once: 'true',
    });

    $(".mg-banner-slider").slickAnimation();

    //parallax
    $('.parallax').jarallax({

      // parallax effect speed. 0.0 - 1.0
      speed             : 0.3,

      // path to your parallax image
      imgSrc            : null,

      // width & height of your parallax image
    imgWidth: 1366,
    imgHeight: 768,

      // enable transformations for effect if supported.
      enableTransform   : false,

      // z-index of parallax container.
      zIndex            : -100

    })

  function responsiveIframe(){
  var videoSelectors = [
    'iframe[src*="player.vimeo.com"]',
    'iframe[src*="youtube.com"]',
    'iframe[src*="youtube-nocookie.com"]',
    'iframe[src*="kickstarter.com"][src*="video.html"]',
    'iframe[src*="screenr.com"]',
    'iframe[src*="blip.tv"]',
    'iframe[src*="dailymotion.com"]',
    'iframe[src*="viddler.com"]',
    'iframe[src*="qik.com"]',
    'iframe[src*="revision3.com"]',
    'iframe[src*="hulu.com"]',
    'iframe[src*="funnyordie.com"]',
    'iframe[src*="flickr.com"]',
    'embed[src*="v.wordpress.com"]',
    'iframe[src*="videopress.com"]',
              'embed[src*="videopress.com"]'
    // add more selectors here
  ];
  var allVideos = videoSelectors.join( ',' );
  jQuery( allVideos ).wrap( '<span class="media-holder" />' );
  }
  // Responsive Iframes
    responsiveIframe();

// Roadmap style
    var myLatlng = new google.maps.LatLng(36.964, -122.015);
    var mapOptions = {
      zoom: 18,
      center: myLatlng,
      scrollwheel: false,
      mapTypeId: 'roadmap',
      styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}]
    };
    var map = new google.maps.Map(document.getElementById('roadmap'),
        mapOptions);

// satellite style
    var myLatlng = new google.maps.LatLng(36.964, -122.015);
    var mapOptions = {
      zoom: 18,
      center: myLatlng,
      scrollwheel: false,
      mapTypeId: 'satellite',
    };
    var map = new google.maps.Map(document.getElementById('satellite'),
        mapOptions);

// Hybrid style
    var myLatlng = new google.maps.LatLng(36.964, -122.015);
    var mapOptions = {
      zoom: 18,
      center: myLatlng,
      scrollwheel: false,
      mapTypeId: 'hybrid',
    };
    var map = new google.maps.Map(document.getElementById('hybrid'),
        mapOptions);

    // Terrain
    var myLatlng = new google.maps.LatLng(36.964, -122.015);
    var mapOptions = {
      zoom: 18,
      center: myLatlng,
      scrollwheel: false,
      mapTypeId: 'terrain',
    };
    var map = new google.maps.Map(document.getElementById('terrain'),
        mapOptions);





    var $bubbles = $('.bubbles');

      function bubbles() {

        // Settings
        var min_bubble_count = 20, // Minimum number of bubbles
            max_bubble_count = 60, // Maximum number of bubbles
            min_bubble_size = 3, // Smallest possible bubble diameter (px)
            max_bubble_size = 12; // Maximum bubble blur amount (px)

        // Calculate a random number of bubbles based on our min/max
        var bubbleCount = min_bubble_count + Math.floor(Math.random() * (max_bubble_count + 1));

        // Create the bubbles
        for (var i = 0; i < bubbleCount; i++) {
          $bubbles.append('<div class="bubble-container"><div class="bubble"></div></div>');
        }

        // Now randomise the various bubble elements
        $bubbles.find('.bubble-container').each(function(){

          // Randomise the bubble positions (0 - 100%)
          var pos_rand = Math.floor(Math.random() * 101);

          // Randomise their size
          var size_rand = min_bubble_size + Math.floor(Math.random() * (max_bubble_size + 1));

          // Randomise the time they start rising (0-15s)
          var delay_rand = Math.floor(Math.random() * 16);

          // Randomise their speed (3-8s)
          var speed_rand = 3 + Math.floor(Math.random() * 9);

          // Random blur
          var blur_rand = Math.floor(Math.random() * 3);

          // Cache the this selector
          var $this = $(this);

          // Apply the new styles
          $this.css({
            'left' : pos_rand + '%',

            '-webkit-animation-duration' : speed_rand + 's',
            '-moz-animation-duration' : speed_rand + 's',
            '-ms-animation-duration' : speed_rand + 's',
            'animation-duration' : speed_rand + 's',

            '-webkit-animation-delay' : delay_rand + 's',
            '-moz-animation-delay' : delay_rand + 's',
            '-ms-animation-delay' : delay_rand + 's',
            'animation-delay' : delay_rand + 's',

            '-webkit-filter' : 'blur(' + blur_rand  + 'px)',
            '-moz-filter' : 'blur(' + blur_rand  + 'px)',
            '-ms-filter' : 'blur(' + blur_rand  + 'px)',
            'filter' : 'blur(' + blur_rand  + 'px)',
          });

          $this.children('.bubble').css({
            'width' : size_rand + 'px',
            'height' : size_rand + 'px'
          });

        });
      }

    // In case users value their laptop battery life
    // Allow them to turn the bubbles off
    $('.bubble-toggle').click(function(){
      if($bubbles.is(':empty')) {
        bubbles();
        $bubbles.show();
        $(this).text('Bubbles Off');
      } else {
        $bubbles.fadeOut(function(){
          $(this).empty();
        });
        $(this).text('Bubbles On');
      }

      return false;
    });
      bubbles();
  })(jQuery);
