jQuery(document).ready(function($) {
  "use strict";
  //Glzv Sticky Header Script
  $('.glzv-sticky').sticky ({
    topSpacing: 0,
    zIndex: 4
  });

  // Mean Menu
  var $navmenu = $('header nav');
  var $menu_starts = ($navmenu.data('nav') !== undefined) ? $navmenu.data('nav') : 767;
  $('.navigation-style-one header nav').meanmenu({
    meanMenuContainer: '.navigation-style-one .glzv-header .header-wrap ',
    meanMenuOpen: '<span></span><span></span><span></span>',
    meanMenuClose: '<span></span><span></span>',
    meanExpand: '<i class="fa fa-angle-down"></i>',
    meanContract: '<i class="fa fa-angle-up"></i>',
    meanScreenWidth: $menu_starts,

  });


$(window).load(function() {
  $('.meanmenu-reveal').on( 'click', function() {
    $('.mean-container').toggleClass('meanclose');
  });
  // Splitted Slider Script
  if ($('div').hasClass('glzv-splitted-slider')) {
    $('.glzv-splitted-slider').multiscroll ({
      navigation: false,
      loopBottom: true,
      loopTop: true,
      css3: true,

      afterLoad: function(){
        if ($('.ms-right .ms-section.dark').hasClass('active')) {
          $('body').addClass('dark-menu-color');
        } else {
          $('body').removeClass('dark-menu-color');
        }
        if ($('.ms-right .ms-section.light').hasClass('active')) {
          $('body').addClass('light-menu-color');
        } else {
          $('body').removeClass('light-menu-color');
        }

        // Logo Color
        if ($('.ms-left .ms-section.dark').hasClass('active')) {
          $('body').addClass('dark-logo-color');
        } else {
          $('body').removeClass('dark-logo-color');
        }
        if ($('.ms-left .ms-section.light').hasClass('active')) {
          $('body').addClass('light-logo-color');
        } else {
          $('body').removeClass('light-logo-color');
        }
      }

    });
  };

  if ($('.ms-right .ms-section.dark').hasClass('active')) {
    $('body').addClass('dark-menu-color');
  } else {
    $('body').removeClass('dark-menu-color');
  }
  if ($('.ms-right .ms-section.light').hasClass('active')) {
    $('body').addClass('light-menu-color');
  } else {
    $('body').removeClass('light-menu-color');
  }

  // Logo Color
  if ($('.ms-left .ms-section.dark').hasClass('active')) {
    $('body').addClass('dark-logo-color');
  } else {
    $('body').removeClass('dark-logo-color');
  }
  if ($('.ms-left .ms-section.light').hasClass('active')) {
    $('body').addClass('light-logo-color');
  } else {
    $('body').removeClass('light-logo-color');
  }

  //Glzv Vertical Scroll Script
  $('.vertical-scroll').enscroll ({
    showOnHover: true,
    verticalScrolling: true,
  });
  if (screen.width <= 991) {
    $('.portfolio-detail-wrap .vertical-scroll').enscroll('destroy');
  }
  if (screen.width >= 768) {
    $('.enscroll-horizontal').enscroll ({
      showOnHover: true,
      verticalScrolling: false,
      horizontalScrolling: true,
      addPaddingToPane: false,
      scrollIncrement: 400,
    });
    $('.enscroll-horizontal').mousewheel(function(event,delta) {
      this.scrollLeft-=(delta*event.deltaFactor), 1000, 'easeOutQuad';
      event.preventDefault();
    });
  }

  //Glzv Horizontal Scroll Script
  $('.horizontal-scroll').mCustomScrollbar ({
    axis: 'x',
    scrollInertia: 200,
    autoHideScrollbar: true,
    autoDraggerLength: true,
    advanced: {
      updateOnContentResize: true
    }
  });

  //Glzv Masonry Script
  var $grid = $('.glzv-masonry').isotope ({
    itemSelector: '.masonry-item',
    layoutMode: 'packery',
  });
  var filterFns = {
    ium: function() {
      var name = $(this).find('.name').text();
      return name.match( /ium$/ );
    }
  };
  $('.masonry-filters').on( 'click', 'li a', function() {
    var filterValue = $( this ).attr('data-filter');
    filterValue = filterFns[ filterValue ] || filterValue;
    $grid.isotope({
      filter: filterValue
    });
  });
  $('.masonry-filters').each( function( i, buttonGroup ) {
    var $buttonGroup = $( buttonGroup );
    $buttonGroup.on( 'click', 'li a', function() {
      $buttonGroup.find('.active').removeClass('active');
      $(this).addClass('active');
    });
  });

  //Glzv Light Gallery Custom Setting Script
  $('[data-rel="lightGallery"]').on('click', function() {
    if ($('body').attr('data-lg-share') == 'false') {
      $('#lg-share').remove();
    }
    if ($('body').attr('data-lg-actual-size') == 'false') {
      $('#lg-actual-size').remove();
    }
    if ($('body').attr('data-lg-zoom-out') == 'false') {
      $('#lg-zoom-out').remove();
    }
    if ($('body').attr('data-lg-zoom-in') == 'false') {
      $('#lg-zoom-in').remove();
    }
    if ($('body').attr('data-lg-fullscreen') == 'false') {
      $('.lg-fullscreen').remove();
    }
    if ($('body').attr('data-lg-autoplay-button') == 'false') {
      $('.lg-autoplay-button').remove();
    }
    if ($('body').attr('data-lg-download') == 'false') {
      $('#lg-download').remove();
    }
    if ($('body').attr('data-lg-counter') == 'false') {
      $('#lg-counter').remove();
    }
    if ($('body').attr('data-lg-actions') == 'false') {
      $('.lg-actions').remove();
    }
    if ($('body').attr('data-lg-sub-html') == 'false') {
      $('.lg-sub-html').remove();
    }
    if ($('body').attr('data-thumbnail') == 'false') {
      $('.lg-thumb-outer').remove();
    }
  });

  //Glzv Owl Carousel Slider Script
  $('.owl-carousel').each( function() {
    var $carousel = $(this);
    var $items = ($carousel.data('items') !== undefined) ? $carousel.data('items') : 1;
    var $items_tablet = ($carousel.data('items-tablet') !== undefined) ? $carousel.data('items-tablet') : 1;
    var $items_mobile_landscape = ($carousel.data('items-mobile-landscape') !== undefined) ? $carousel.data('items-mobile-landscape') : 1;
    var $items_mobile_portrait = ($carousel.data('items-mobile-portrait') !== undefined) ? $carousel.data('items-mobile-portrait') : 1;
    $carousel.owlCarousel ({
      loop : ($carousel.data('loop') !== undefined) ? $carousel.data('loop') : true,
      items : $carousel.data('items'),
      margin : ($carousel.data('margin') !== undefined) ? $carousel.data('margin') : 0,
      dots : ($carousel.data('dots') !== undefined) ? $carousel.data('dots') : true,
      nav : ($carousel.data('nav') !== undefined) ? $carousel.data('nav') : false,
      navText : ["<div class='slider-no-current'><span class='current-no'></span><span class='total-no'></span></div><span class='current-monials'></span>", "<div class='slider-no-next'></div><span class='next-monials'></span>"],
      autoplay : ($carousel.data('autoplay') !== undefined) ? $carousel.data('autoplay') : false,
      autoplayTimeout : ($carousel.data('autoplay-timeout') !== undefined) ? $carousel.data('autoplay-timeout') : 5000,
      animateOut : ($carousel.data('animateout') !== undefined) ? $carousel.data('animateout') : false,
      mouseDrag : ($carousel.data('mouse-drag') !== undefined) ? $carousel.data('mouse-drag') : true,
      autoWidth : ($carousel.data('auto-width') !== undefined) ? $carousel.data('auto-width') : false,
      autoHeight : ($carousel.data('auto-height') !== undefined) ? $carousel.data('auto-height') : false,
      center : ($carousel.data('center') !== undefined) ? $carousel.data('center') : false,
      responsiveClass: true,
      dotsEachNumber: true,
      smartSpeed: 600,
      responsive : {
        0 : {
          items : $items_mobile_portrait,
        },
        480 : {
          items : $items_mobile_landscape,
        },
        768 : {
          items : $items_tablet,
        },
        960 : {
          items : $items,
        }
      }
    });
    var totLength = $('.owl-dot', $carousel).length;
    $('.total-no', $carousel).html(totLength);
    $('.current-no', $carousel).html(totLength);
    $carousel.owlCarousel();
    $('.current-no', $carousel).html(1);
    $carousel.on('changed.owl.carousel', function(event) {
      var total_items = event.page.count;
      var currentNum = event.page.index + 1;
      $('.total-no', $carousel ).html(total_items);
      $('.current-no', $carousel).html(currentNum);
    });
  });

  //Glzv Loader Script
  $('.glzv-preloader').fadeOut(500);

  // Match Height Script
  if (screen.width >= 768) {
    var maxheight = 0;
    $('ul.products .product').each(function () {
      maxheight = ($(this).height() > maxheight ? $(this).height() : maxheight);
    });
    $('ul.products .product').height(maxheight);

    $('ul.products .product .product-wrap').each(function () {
      maxheight = ($(this).height() > maxheight ? $(this).height() : maxheight);
    });
    $('ul.products .product .product-wrap').height(maxheight);
  }

});

  //Glzv Navigation Hover Script
  $('.has-dropdown').on('hover', function() {
    $(this).find('ul.dropdown-nav').first().stop(true, true).slideToggle(280);
  });
  $('.navigation li ul li.has-dropdown').has('ul.dropdown-nav').addClass('sub');

  //Glzv Get Height Script
  $(window).on('resize', function() {
    $('.glzv-full-page').css('padding-top', $('.glzv-header').height());
    $('.glzv-full-background').css('padding-top', $('.glzv-header').height());
    if ($('.glzv-main-wrap').hasClass('transparent-header')) {
      $('.glzv-main-wrap').css('padding-top', '0');
    };
    if ($('.glzv-main-wrap').hasClass('dark-transparent-header')) {
      $('.glzv-main-wrap').css('padding-top', '0');
    };
    if (screen.width >= 992) {
      $('html:has(.glzv-full-page)').css('overflow','hidden');
      $('.glzv-full-page').css('padding-bottom', $('.glzv-footer').height());
      $('.glzv-full-background').css('padding-bottom', $('.glzv-footer').height());
      if ($('.glzv-main-wrap').hasClass('dark-footer')) {
        $('.glzv-main-wrap').css('padding-bottom', '0');
      };
    }
  });
  $(window).trigger('resize');

  //Glzv Add Class Script
  $('.glzv-toggle').on('click', function() {
    $('.glzv-navigation, .glzv-navigation-overlay').toggleClass('open');
    $(this).toggleClass('active');
  });
  $('.navigation-wrap .close-btn a, .glzv-navigation-overlay').on('click', function() {
    $('.glzv-navigation, .glzv-navigation-overlay').removeClass('open');
  });
  $('.galley-toggle').removeClass('active');
  $('.galley-toggle').on('click', function() {
    $(this).toggleClass('active');
    $('.glzv-main-wrap').toggleClass('collapse-gallery');
  });
  $('.blog-like a').on('click', function() {
    $(this).toggleClass('active');
  });
  $('.project-info-popup .close-btn').on('click', function() {
    $('.swiper-wrapper').removeClass('project-popup-open');
  });
  if ($('.approved-item').has('.proof-gallery-action a')) {
    $('.approved-item .proof-gallery-action a').addClass('active');
  }
  if ($('.gallerythumbs').attr('data-thumbs') == 'false') {
    $('.glzv-main-wrap').removeClass('collapse-gallery');
    $('.galley-toggle').removeClass('active');
  }

  //Glzv Calculate Height Script
  jQuery(window).on('resize', function() {
    jQuery('.galleryslides').height(jQuery(window).height() - $('.gallerythumbs').height());
  });
  jQuery(window).trigger('resize');

  //Glzv Hover Script
  $('.swiper-slide, .ms-section, .showcase-item, .gallery-item, .archive-item, .glzv-gallery .masonry-filters, .share-portfolio, .service-item, .team-mate, .blog-item, .product-wrap').on('hover', function() {
    $(this).toggleClass('glzv-hover');
  });

  //Glzv Set Equal Height Script
  $('.service-item, .team-mate, .woocommerce ul.products li.product, .woocommerce-page ul.products li.product, .contact-link').matchHeight ({
    property: 'height'
  });

  //Glzv Caption Fadeout Script
  $('.enscroll-horizontal').on('scroll', function() {
    $('.glzv-fade-caption').css ({
      'opacity' : 1-(($(this).scrollLeft())/600)
    });
  });
  function parallax(){
    var scrolled = $(window).scrollTop();
    $('.glzv-fade-caption').css('opacity', 1-(scrolled/600));
  }
  $(window).on('scroll', function(){
    parallax();
  });

  //Glzv On Hover Fadein Fadeout Animation Script
  $('.showcase-cover').on ({
    mouseenter : function() {
      $('.showcase-author-wrap').fadeIn(500);
    },
    mouseleave : function() {
      $('.showcase-author-wrap').fadeOut(500);
    }
  });

  //Glzv Parallax Script
  $(window).on('resize', function() {
    if (screen.width >= 768) {
      if ( $('.glzv-parallax').length > 0 ) {
        $.parallax ({
          scrollProperty: 'scroll',
          verticalOffset: 0,
          horizontalOffset: 0,
          horizontalScrolling: false,
          responsive: true,
       });
      }
    }
  });
  $(window).trigger('resize');

  //Glzv Hover Animtion Script
  $('.direction-hover .gallery-item').hoverdir ({
    hoverElem: '.gallery-info'
  });

  //Glzv On Hover Zoom Scale Image Script
  $('.glzv-panr [class*="-item"] .glzv-image img').panr ({
    sensitivity: 15,
    scale: false,
    scaleOnHover: true,
    scaleTo: 1.21,
    scaleDuration: .30,
    panY: true,
    panX: true,
    panDuration: 1.21,
    resetPanOnMouseLeave: false
  });

  //Glzv Light Gallery Script
  $('.glzv-lightgallery').lightGallery ({
    showThumbByDefault: false,
    download: true,
    controls: true,
    autoplayControls: true,
    thumbnail: true,
    fullScreen: true,
    zoom: true,
    share: true,
    selector: '[data-rel="lightGallery"]',
  });

  //Glzv Gallery Filtring Script
  $('.proof-gallery-action a').on('click', function() {
    if ($(this).hasClass('active')) {
      $(this).removeClass('active');
      $(this).parents('.masonry-item').addClass('rejected-item');
      $(this).parents('.masonry-item').removeClass('approved-item');
    }
    else {
      $(this).addClass('active');
      $(this).parents('.masonry-item').removeClass('rejected-item');
      $(this).parents('.masonry-item').addClass('approved-item');
    }
  });

  //Glzv Sticky Sidebar Script
  $('.glzv-sticky-sidebar').theiaStickySidebar ({
    additionalMarginTop: 150
  });

  //Glzv Floating Sidebar Script
  $(window).on('scroll', function() {
    var $window = jQuery(window),
    $flotingbar = jQuery('.glzv-floating-sidebar'),
    offset = jQuery('.mid-wrap-inner, .glzv-unit-fix, .glzv-page-wrap').offset(),
    $scrolling = jQuery('.glzv-primary').height(),
    $offsetHeight = jQuery('.glzv-primary').offset(),
    $topHeight = 62;
    if (jQuery('.glzv-floating-sidebar').length > 0) {
      if ($window.width() > 1023) {
        if (($window.scrollTop() + $topHeight) > offset.top) {
          if ($window.scrollTop() + $topHeight + $flotingbar.height() + 50 < $offsetHeight.top + $scrolling) {
            $flotingbar.stop().animate ({
              marginTop: ($window.scrollTop() - offset.top) + $topHeight + 30,
            });
          }
          else {
            $flotingbar.stop().animate ({
              marginTop: ($scrolling - $flotingbar.height() - 80) + 30,
            });
          }
        }
        else {
          $flotingbar.stop().animate ({
            marginTop: 0,
          });
        }
      }
      else {
        $flotingbar.css('margin-top', 0);
      }
    }
  });

  //Glzv Calculate Width Script
  jQuery(window).on('resize', function() {
    if (screen.width >= 992) {
      jQuery('.portfolio-horizontal .swiper-container').width(jQuery(window).width() - $('.portfolio-horizontal .portfolio-detail-wrap').width());
    }
    if (screen.width <= 991) {
      jQuery('.portfolio-horizontal .swiper-container').height(jQuery(window).height());
    }
  });
  jQuery(window).trigger('resize');

  //Glzv Responsive Tabs Script
  $('.woocommerce-tabs').responsiveTabs ({
    collapsible: false,
    animation: 'fade',
    duration: 0,
    active: 0,
  });

  //Glzv Checkbox Script
  $('.payment_method_cod').on('change', function() {
    var idx = $(this).index()-1;
    $('.payment_box').slideToggle(400);
  });

  //Glzv Back Top Script
  var backtop = $('.glzv-back-top');
  var position = backtop.offset();
  $(window).on('scroll', function() {
    var windowposition = $(window).scrollTop();
    if(windowposition + $(window).height() == $(document).height()) {
      backtop.removeClass('active');
    }
    else if (windowposition > 150) {
      backtop.addClass('active');
    }
    else {
      backtop.removeClass('active');
    }
  });
  jQuery('.glzv-back-top a').on('click', function () {
    jQuery('body,html').animate ({
      scrollTop: 0
    }, 2000);
    return false;
  });

  //Glzv Swiper Slider Script
  var swipermw = $('.swiper-container.mousewheel').length ? true : false;
  var swiperkb = $('.swiper-container.keyboard').length ? true : false;
  var swipercentered = $('.swiper-container.center').length ? true : false;
  var swiperautoplay = $('.swiper-container').data('autoplay');
  var swiperinterval = $('.swiper-container').data('interval'),
  swiperinterval = swiperinterval ? swiperinterval : 7000;
  swiperautoplay = swiperautoplay ? swiperinterval : false;

  //Glzv Swiper Fadeslides Slider Script
  var autoplay = 5000;
  var swiper = new Swiper('.fadeslides', {
    autoplayDisableOnInteraction: false,
    effect: 'fade',
    speed: 1000,
    loop: true,
    paginationClickable: true,
    watchSlidesProgress: true,
    autoplay: autoplay,
    simulateTouch: false,
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    pagination: '.swiper-pagination',
    paginationType: 'fraction',
    mousewheelControl: swipermw,
    keyboardControl: swiperkb,
  });

  //Glzv Swiper Gallery Slider Script
  var autoplay = 5000;
  var galleryTopSlider = new Swiper('.galleryslides', {
    effect: 'fade',
    speed: 1000,
    loop: true,
    loopedSlides: 5,
    autoplay: autoplay,
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    pagination: '.swiper-pagination',
    paginationType: 'fraction',
    mousewheelControl: swipermw,
    keyboardControl: swiperkb,
  });

  //Glzv Swiper Gallery Slider Script
  var autoplay = 5000;

  var galleryThumbSlider = new Swiper('.gallerythumbs', {
    speed: 1000,
    loop: true,
    loopedSlides: 5,
    centeredSlides: true,
    slidesPerView: 'auto',
    touchRatio: 0.2,
    slideToClickedSlide: true,

  });
  galleryTopSlider.params.control = galleryThumbSlider;
  galleryThumbSlider.params.control = galleryTopSlider;

  //Glzv Swiper Horizontal Slider Script
  var autoplay = 5000;
  var swiperHorizontal = $('.horizontalslides').swiper ({
    autoplayDisableOnInteraction: false,
    effect: 'slide',
    speed: 500,
    loop: true,
    spaceBetween: 10,
    paginationClickable: true,
    watchSlidesProgress: true,
    autoplay: false,
    simulateTouch: false,
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    pagination: '.swiper-pagination',
    paginationType: 'fraction',
    mousewheelControl: swipermw,
    keyboardControl: swiperkb,
    slidesPerView: 'auto',
    loopedSlides: 5,
    noSwipingClass: 'noswipe',
    centeredSlides: swipercentered,
  });

  //Glzv Swiper Slider Custom Controls Script
  swiperautoplay ? $('.swiper-btn-pause').addClass('hidden') : $('.swiper-btn-play').addClass('hidden');
  $('.swiper-btn-play, .project-info-popup .close-btn').on('click', function () {
    $('.swiper-container')[0].swiper.params.autoplay = swiperinterval;
    $('.swiper-container')[0].swiper.startAutoplay();
    $('.swiper-btn-play').addClass('hidden');
    $('.swiper-btn-pause').removeClass('hidden');
  });
  $('.swiper-btn-pause, .expand-btn, .project-info-btn > a').on('click', function () {
    $('.swiper-container')[0].swiper.stopAutoplay();
    $('.swiper-btn-play').removeClass('hidden');
    $('.swiper-btn-pause').addClass('hidden');
  });

  //Glzv Add Class Script
  $('html, .project-info-popup .close-btn').on('click', function() {
    $('.project-info-btn').removeClass('open');
    $('.swiper-wrapper').removeClass('project-popup-open');
  });
  $('.project-info-btn').on('click', function(e) {
    e.stopPropagation();
  });
  $('.project-info-btn a').on('click', function() {
    $(this).parent('.project-info-btn').toggleClass('open');
    $('.swiper-wrapper').toggleClass('project-popup-open');
  });

  //Glzv Hover Script
  $('.swiper-slide').on('hover', function() {
    $(this).toggleClass('glzv-hover');
  });

  //Glzv Zoom Image Popup Script
  initOutdoor();
  function initOutdoor() {
    function d() {
      var a = document.querySelectorAll('.zoom-popup');
      Intense(a);
    }
    d();
  }
});
