'use strict';
$ = jQuery.noConflict();
jQuery(document).ready(function(){
    jQuery('.mg-banner-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 500,
        arrows: false,

    })
    var $grid = $('.grid').isotope({
      itemSelector: '.element-item',
      layoutMode: 'masonry'
    });
    // filter functions
    var filterFns = {
    };
    // bind filter button click
    jQuery('.filters-button-group').on( 'click', 'button', function() {
      var filterValue = $( this ).attr('data-filter');
      // use filterFn if matches value
      filterValue = filterFns[ filterValue ] || filterValue;
      $grid.isotope({ filter: filterValue });
    });
    // change is-checked class on buttons
    jQuery('.button-group').each( function( i, buttonGroup ) {
      var $buttonGroup = $( buttonGroup );
      $buttonGroup.on( 'click', 'button', function() {
        $buttonGroup.find('.is-checked').removeClass('is-checked');
        $( this ).addClass('is-checked');
      });
    });
    extendNav();
  jQuery('.timer').countTo();
  jQuery('.testimonial-wrap').slick({
    dots: false,
    infinite: true,
    speed: 500,
    autoplay: false,
    arrows: false,
  });

  jQuery('.client-slider').slick({
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

  //parallax
  jQuery('.parallax').jarallax({
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
});


// Menu dropdown on hover
function extendNav() {
  jQuery('.nav-wrapper .dropdown').hover(function() {
    jQuery(this).children('.dropdown-menu').stop(true, true).show().addClass('animated-fast slfadeInDown');
    jQuery(this).toggleClass('open');
  }, function() {
    jQuery(this).children('.dropdown-menu').stop(true, true).hide().removeClass('animated-fast slfadeInDown');
    jQuery(this).toggleClass('open');
  });
}



