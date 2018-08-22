/*
 * All Admin Related Scripts in this Glazov Theme
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

jQuery(document).ready(function($) {
  "use strict";

  /*---------------------------------------------------------------*/
  /* =  Toggle Meta boxes based on post formats
  /*---------------------------------------------------------------*/
  function glazov_toggle_metaboxes() {

    var format = $("input[name='post_format']:checked").val();

    $('.cs-element-standard-image, .cs-element-gallery-format, .cs-element-add-gallery').hide();

    if (format == '0' || format == 'image') {
        $('').slideUp('fast');
        $('.cs-element-standard-image').slideDown('slow');
    }
    if (format == 'gallery') {
        $('').slideUp('fast');
        $('.cs-element-gallery-format, .cs-element-add-gallery').slideDown('slow');
    }
  }

  glazov_toggle_metaboxes(); // Execute on document ready

  $('#post-formats-select input[type="radio"]').click(glazov_toggle_metaboxes);

  // home gallery options
  function glazov_toggle_metaboxes_home() {
    var homeformat = $("input[name='page_gallery_metabox[gallery_layout]']:checked").val();
    $('#page_gallery_metabox .cs-element-image-width').hide();
    $('#page_gallery_metabox ul li:nth-child(2)').hide();
    $('#page_gallery_metabox .cs-element-menu-color').hide();
    $('.cs-element-add-gallery').show();
    $('#page_gallery_metabox .cs-element-information-left-column, #page_gallery_metabox .cs-element-information-right-column').show();
    if ( homeformat == 'horizontal_slider' ) {
        $('').slideUp('fast');
        $('#page_gallery_metabox ul li:nth-child(2)').show();
        $('#page_gallery_metabox .cs-element-image-width').show();
        $('#page_gallery_metabox .cs-element-project-information').hide();
        $('#page_gallery_metabox .cs-element-upload-image, #page_gallery_metabox .cs-element-project-category').show();
    }
    if (homeformat == 'home_thumb_slider' || homeformat == 'split_slider' || homeformat == 'home_slider_fullpage' ||  homeformat == 'kenburns' ) {
        $('').slideUp('fast');
        $('#page_gallery_metabox ul li:nth-child(2)').show();
        $('#page_gallery_metabox .cs-element-upload-image').show();
    }
    if (homeformat == 'split_slider') {
        $('').slideUp('fast');
        $('#page_gallery_metabox .cs-element-menu-color').show();
        $('#page_gallery_metabox ul li:nth-child(2)').hide();
        $('#page_gallery_metabox .cs-element-project-information').hide();
        $('#page_gallery_metabox .cs-element-project-category, #page_gallery_metabox .cs-element-project-single-url').hide();
    }
    if (homeformat == 'home_thumb_slider' || homeformat == 'home_slider_fullpage' ||  homeformat == 'kenburns') {
        $('').slideUp('fast');
        $('#page_gallery_metabox .cs-element-image-title, #page_gallery_metabox .cs-element-project-single-url').hide();
        $('#page_gallery_metabox .cs-element-upload-image').show();
        $('#page_gallery_metabox .cs-element-project-information, #page_gallery_metabox .cs-element-project-category').show();
    }
    if (homeformat == 'static_video' ) {
        $('').slideUp('fast');
        $('#page_gallery_metabox ul li:nth-child(2)').show();
        $('#page_gallery_metabox .cs-element-image-title, #page_gallery_metabox .cs-element-project-single-url').hide();
    }
    if ( homeformat == 'home_sliding_showcase' ) {
        $('').slideUp('fast');
        $('#page_gallery_metabox ul li:nth-child(2)').show();
        $('#page_gallery_metabox .cs-element-project-category').show();
    }
  }
  glazov_toggle_metaboxes_home();

  $('#page_gallery_metabox .cs-content input[type="radio"]').click(glazov_toggle_metaboxes_home);

  function glazov_toggle_metaboxes_gallery() {
    var galleruformat = $("input[name='gallery_single_metabox[gallery_layout]']:checked").val();
    $('#gallery_single_metabox .cs-element-image-width').hide();
    $('#gallery_single_metabox .cs-element-image-status').hide();
    $('#gallery_single_metabox ul li:nth-child(2)').show();
    $('#gallery_single_metabox .cs-element-gallery-category').hide();
    if ( galleruformat == 'gallery_horizontal' ) {
        $('').slideUp('fast');
        $('#gallery_single_metabox .cs-element-image-width').show();
    }
    if ( galleruformat == 'gallery_proofing' ) {
        $('').slideUp('fast');
        $('#gallery_single_metabox .cs-element-image-status').show();
    }
    if ( galleruformat == 'gallery_grid' || galleruformat == 'gallery_masonry' ) {
        $('').slideUp('fast');
        $('#gallery_single_metabox ul li:nth-child(2)').hide();
    }
    if ( galleruformat == 'gallery_horizontal' || galleruformat == 'gallery_kenburns' ) {
        $('').slideUp('fast');
        $('#gallery_single_metabox .cs-element-gallery-category').show();
    }
  }
  glazov_toggle_metaboxes_gallery();
  $('#gallery_single_metabox .cs-content input[type="radio"]').click(glazov_toggle_metaboxes_gallery);

  // Portfolio
  function glazov_toggle_metaboxes_portfolio() {
    var portfolioformat = $("input[name='portfolio_single_metabox[portfolio_single_layout]']:checked").val();
    $('#portfolio_single_metabox .cs-element-image-width').hide();
    if ( portfolioformat == 'portfolio_horizontal' ) {
        $('').slideUp('fast');
        $('#portfolio_single_metabox .cs-element-image-width').show();
    }

  }
  glazov_toggle_metaboxes_portfolio();
  $('#portfolio_single_metabox .cs-content input[type="radio"]').click(glazov_toggle_metaboxes_portfolio);

  // page template options
 $('#page_template').change( function() {
    $(' #page_gallery_metabox, #contact_page_metabox, #about_page_metabox').hide();
    switch( $( this ).val() ) {

      case 'about-me.php':
        $('#page_layout_options, .cs-element-custom-title,.cs-element-choose-banner-type, #page_layout_options, #page_type_metabox ul li:nth-child(2)').hide();
        $('#about_page_metabox').show();
      break;

      case 'home-template.php':
      $('#page_gallery_metabox').show();
      break;

      case 'contact.php':
        $('.cs-element-choose-banner-type, .cs-element-custom-title, #page_layout_options, #page_layout_options, #page_type_metabox ul li:nth-child(2)').hide();
        $('#contact_page_metabox').show();
      break;
      default:
        $('#page_layout_options, #page_type_metabox ul li:nth-child(2)').show();
        $(' #page_gallery_metabox').hide();
      break;
    }

  }).change();

  $('.post-type-post #page_layout_options .cs-field-image-select label:nth-child(2), .post-type-post #page_layout_options .cs-field-image-select label:nth-child(3), .post-type-post #page_layout_options .cs-field-image-select label:nth-child(4), .post-type-post #page_layout_options .cs-element-padding').hide();

  // Tooltip for System Status [?]
  $( '.tool_tip_help' ).tipTip({
    attribute: 'data-tip'
  });
  $( 'a.tool_tip_help' ).click( function() {
    return false;
  });
  $( ".vt-cs-widget-fields" ).parents( ".widget-inside" ).addClass( "vt-cs-widget" );

  // Auto & Manual Import Tabs Active Mode
  $(function() {
    var loc = window.location.href; // returns the full URL
    console.log(loc);
    if(loc.indexOf('manual') > -1) {
      $('.nav-tab-wrapper .vt-auto-mode').removeClass('nav-tab-active');
      $('.nav-tab-wrapper .vt-manual-mode').addClass('nav-tab-active');
    }
  });

});