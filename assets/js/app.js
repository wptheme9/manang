(function($)
{
    "use strict"
    $('.mg-banner-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 500,
        arrows: true,
    });

    //Preloader
    setTimeout(function(){
        $('body').addClass('loaded');
    }, 3000);

    //Mailchimp subscription form
    var subfrom = $(".subscription-form");
    var loader = $(".ajax-loader");

    subfrom.submit(function(e) {
      loader.show()
    });

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

    $(".jAudio--player").jAudio({
      playlist: [
        {
          file: "http://localhost:8888/blaire/wp-content/themes/manang/assets/tracks/01.mp3",
          thumb: "http://localhost:8888/blaire/wp-content/themes/manang/assets/thumbs/01.jpg",
          trackName: "Dusk",
          trackArtist: "Tobu & Syndec",
          trackAlbum: "Single",
        },
        {
          file: "http://localhost:8888/blaire/wp-content/themes/manang/assets/tracks/02.mp3",
          thumb: "http://localhost:8888/blaire/wp-content/themes/manang/assets/thumbs/02.jpg",
          trackName: "Blank",
          trackArtist: "Disfigure",
          trackAlbum: "Single",
        },
        {
          file: "http://localhost:8888/blaire/wp-content/themes/manang/assets/tracks/03.mp3",
          thumb: "http://localhost:8888/blaire/wp-content/themes/manang/assets/thumbs/03.jpg",
          trackName: "Fade",
          trackArtist: "Alan Walker",
          trackAlbum: "Single",
        }
      ],

        swfPath: "",
        supplied: "OGA, MP3",
        useStateClassSkin: true,
        autoBlur: false,
        smoothPlayBar: true,
    });

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

    // charts
    var ctx = document.getElementById("bar-chart");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
            datasets: [{
                label: 'Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });


    // And for a doughnut chart
  var dough = document.getElementById("doughnut");
  var myDoughnutChart = new Chart(dough, {
      type: 'doughnut',
      data: {
      labels: [
          "Red",
          "Blue",
          "Yellow"
      ],
      datasets: [
          {
              data: [300, 50, 100],
              backgroundColor: [
                  "#FF6384",
                  "#36A2EB",
                  "#FFCE56"
              ],
              hoverBackgroundColor: [
                  "#FF6384",
                  "#36A2EB",
                  "#FFCE56"
              ]
          }]
    }
  });

  // Pie chart
    var pie = document.getElementById("pie-chart");
    var myPieChart = new Chart(pie,{
      type: 'pie',
      data: {
      labels: [
          "Red",
          "Blue",
          "Yellow"
      ],
      datasets: [
        {
            data: [300, 50, 100],
            backgroundColor: [
                "#FF6384",
                "#36A2EB",
                "#FFCE56"
            ],
            hoverBackgroundColor: [
                "#FF6384",
                "#36A2EB",
                "#FFCE56"
            ]
        }]
    }
  });


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

      $('.testimonial-content').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 500,
        arrows: false,
        fade: true,
        asNavFor: '.testimonial-img-wrap'
    });
    $('.testimonial-img-wrap').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        speed: 500,
        asNavFor: '.testimonial-content',
        dots: false,
        arrows: false,
        centerMode: true,
        focusOnSelect: true,
        slide: 'div'
    });

    //client
    $('.client-slider').slick({
      infinite: true,
      autoplaySpeed: 7000,
      arrows: false,
      slidesToShow: 5,
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

        // When the window has finished loading create our google map below
    google.maps.event.addDomListener(window, 'load', init);

    function init() {
        // Basic options for a simple Google Map
        // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
        var mapOptions = {
            // How zoomed in you want the map to start at (always required)
            zoom: 14,
            scrollwheel: false,

            // The latitude and longitude to center the map (always required)
            center: new google.maps.LatLng(40.6700, -73.9400), // New York

            // How you would like to style the map.
            // This is where you would paste any style found on Snazzy Maps.
            styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}]
        };

        // Get the HTML DOM element that will contain your map
        // We are using a div with id="map" seen below in the <body>
        var mapElement = document.getElementById('map');

        // Create the Google Map using our element and options defined above
        var map = new google.maps.Map(mapElement, mapOptions);

        // Let's also add a marker while we're at it
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(40.6700, -73.9400),
            map: map,
            title: 'Snazzy!'
        });
    }


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
