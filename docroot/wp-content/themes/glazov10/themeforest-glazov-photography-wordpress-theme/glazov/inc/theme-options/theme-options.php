<?php
/*
 * All Theme Options for Glazov theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

function glazov_vt_settings( $settings ) {

  $settings           = array(
    'menu_title'      => GLAZOV_NAME . esc_html__(' Options', 'glazov'),
    'menu_slug'       => sanitize_title(GLAZOV_NAME) . '_options',
    'menu_type'       => 'menu',
    'menu_icon'       => 'dashicons-awards',
    'menu_position'   => '4',
    'ajax_save'       => false,
    'show_reset_all'  => true,
    'framework_title' => GLAZOV_NAME .' <small>V-'. GLAZOV_VERSION .' by <a href="'. GLAZOV_BRAND_URL .'" target="_blank">'. GLAZOV_BRAND_NAME .'</a></small>',
  );

  return $settings;

}
add_filter( 'cs_framework_settings', 'glazov_vt_settings' );

// Theme Framework Options
function glazov_vt_options( $options ) {

  $options      = array(); // remove old options

  // ------------------------------
  // Theme Brand
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_brand',
    'title'    => esc_html__('Brand', 'glazov'),
    'icon'     => 'fa fa-bookmark',
    'sections' => array(

      // brand logo tab
      array(
        'name'     => 'brand_logo_title',
        'title'    => esc_html__('Logo', 'glazov'),
        'icon'     => 'fa fa-star',
        'fields'   => array(

          // Site Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Site Logo', 'glazov')
          ),
          array(
            'id'    => 'brand_logo_default',
            'type'  => 'image',
            'title' => esc_html__('Default Logo', 'glazov'),
            'info'  => esc_html__('Upload your default logo here. If you not upload, then site title will load in this logo location.', 'glazov'),
            'add_title' => esc_html__('Add Logo', 'glazov'),
          ),
          array(
            'id'    => 'brand_logo_retina',
            'type'  => 'image',
            'title' => esc_html__('Retina Logo', 'glazov'),
            'info'  => esc_html__('Upload your retina logo here. Recommended size is 2x from default logo.', 'glazov'),
            'add_title' => esc_html__('Add Retina Logo', 'glazov'),
          ),
          array(
            'id'          => 'retina_width',
            'type'        => 'text',
            'title'       => esc_html__('Retina & Normal Logo Width', 'glazov'),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'retina_height',
            'type'        => 'text',
            'title'       => esc_html__('Retina & Normal Logo Height', 'glazov'),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'brand_logo_top',
            'type'        => 'number',
            'title'       => esc_html__('Logo Top Space', 'glazov'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'brand_logo_bottom',
            'type'        => 'number',
            'title'       => esc_html__('Logo Bottom Space', 'glazov'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Transparent Header', 'glazov')
          ),
          array(
            'id'    => 'transparent_logo_default',
            'type'  => 'image',
            'title' => esc_html__('Transparent Logo', 'glazov'),
            'info'  => esc_html__('Upload your transparent header logo here. This logo is used in transparent header by enabled in each pages.', 'glazov'),
            'add_title' => esc_html__('Add Transparent Logo', 'glazov'),
          ),
          array(
            'id'    => 'transparent_logo_retina',
            'type'  => 'image',
            'title' => esc_html__('Transparent Retina Logo', 'glazov'),
            'info'  => esc_html__('Upload your transparent header retina logo here. This logo is used in transparent header by enabled in each pages.', 'glazov'),
            'add_title' => esc_html__('Add Transparent Retina Logo', 'glazov'),
          ),

          // WordPress Admin Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('WordPress Admin Logo', 'glazov')
          ),
          array(
            'id'    => 'brand_logo_wp',
            'type'  => 'image',
            'title' => esc_html__('Login logo', 'glazov'),
            'info'  => esc_html__('Upload your WordPress login page logo here.', 'glazov'),
            'add_title' => esc_html__('Add Login Logo', 'glazov'),
          ),
        ) // end: fields
      ), // end: section

      // brand logo tab
      array(
        'name'     => 'mobile_logo_title',
        'title'    => esc_html__('Mobile Logo', 'glazov'),
        'icon'     => 'fa fa-mobile',
        'fields'   => array(

          // Mobile Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Mobile Logo - If you not upload mobile logo as separatly here, then normal logo will place in that position.', 'glazov')
          ),
          array(
            'id'    => 'mobile_logo_retina',
            'type'  => 'image',
            'title' => esc_html__('Mobile Logo', 'glazov'),
            'info'  => esc_html__('Upload your mobile logo as retina size.', 'glazov'),
            'add_title' => esc_html__('Add Mobile Logo', 'glazov'),
          ),
          array(
            'id'          => 'mobile_logo_width',
            'type'        => 'text',
            'title'       => esc_html__('Mobile Logo Width', 'glazov'),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'mobile_logo_height',
            'type'        => 'text',
            'title'       => esc_html__('Mobile Logo Height', 'glazov'),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'mobile_logo_top',
            'type'        => 'number',
            'title'       => esc_html__('Logo Top Space', 'glazov'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'mobile_logo_bottom',
            'type'        => 'number',
            'title'       => esc_html__('Logo Bottom Space', 'glazov'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),

        ) // end: fields
      ), // end: section

      // Fav
      array(
        'name'     => 'brand_fav',
        'title'    => esc_html__('Fav Icon', 'glazov'),
        'icon'     => 'fa fa-anchor',
        'fields'   => array(

            // -----------------------------
            // Begin: Fav
            // -----------------------------
            array(
              'id'    => 'brand_fav_icon',
              'type'  => 'image',
              'title' => esc_html__('Fav Icon', 'glazov'),
              'info'  => esc_html__('Upload your site fav icon, size should be 16x16.', 'glazov'),
              'add_title' => esc_html__('Add Fav Icon', 'glazov'),
            ),
            array(
              'id'    => 'iphone_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPhone icon', 'glazov'),
              'info'  => esc_html__('Icon for Apple iPhone (57px x 57px). This icon is used for Bookmark on Home screen.', 'glazov'),
              'add_title' => esc_html__('Add iPhone Icon', 'glazov'),
            ),
            array(
              'id'    => 'iphone_retina_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPhone retina icon', 'glazov'),
              'info'  => esc_html__('Icon for Apple iPhone retina (114px x114px). This icon is used for Bookmark on Home screen.', 'glazov'),
              'add_title' => esc_html__('Add iPhone Retina Icon', 'glazov'),
            ),
            array(
              'id'    => 'ipad_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPad icon', 'glazov'),
              'info'  => esc_html__('Icon for Apple iPad (72px x 72px). This icon is used for Bookmark on Home screen.', 'glazov'),
              'add_title' => esc_html__('Add iPad Icon', 'glazov'),
            ),
            array(
              'id'    => 'ipad_retina_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPad retina icon', 'glazov'),
              'info'  => esc_html__('Icon for Apple iPad retina (144px x 144px). This icon is used for Bookmark on Home screen.', 'glazov'),
              'add_title' => esc_html__('Add iPad Retina Icon', 'glazov'),
            ),

        ) // end: fields
      ), // end: section

    ),
  );

  // ------------------------------
  // Layout
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_layout',
    'title'  => esc_html__('Layout', 'glazov'),
    'icon'   => 'fa fa-file-text'
  );

  $options[]      = array(
    'name'        => 'theme_general',
    'title'       => esc_html__('General', 'glazov'),
    'icon'        => 'fa fa-wrench',

    // begin: fields
    'fields'      => array(

      // -----------------------------
      // Begin: Responsive
      // -----------------------------
      array(
        'id'    => 'theme_responsive',
        'type'  => 'switcher',
        'title' => esc_html__('Responsive', 'glazov'),
        'info' => esc_html__('Turn off if you don\'t want your site to be responsive.', 'glazov'),
        'default' => true,
      ),
      array(
        'id'      => 'hide_share_icons',
        'type'    => 'checkbox',
        'title'   => esc_html__('Hide Share Icon', 'glazov'),
        'class'      => 'vertical',
        'options'    => array(
          'facebook'   => esc_html__('Facebook', 'glazov'),
          'twitter'   => esc_html__('Twitter', 'glazov'),
          'linkedin'   => esc_html__('Linkedin', 'glazov'),
          'pinterest'   => esc_html__('Pinterest', 'glazov'),
          'googlel_plus'   => esc_html__('Google Plus', 'glazov'),
        ),
      ),
      array(
        'id'    => 'pre_loader',
        'type'  => 'switcher',
        'title' => esc_html__('Pre Loader', 'glazov'),
        'info' => esc_html__('Turn On if you want pre loader in your pages.', 'glazov'),
        'default' => false,
      ),
      array(
        'id'        => 'pre_loader_option',
        'type'      => 'select',
        'options'   => array(
          'ball-scale-multiple'         => esc_html__('Ball Scale Multiple', 'glazov'),
          'ball-pulse'                  => esc_html__('Ball Pulse', 'glazov'),
          'ball-grid-pulse'             => esc_html__('Ball Grid Pulse', 'glazov'),
          'ball-clip-rotate'            => esc_html__('Ball Clip Rotate', 'glazov'),
          'ball-clip-rotate-pulse'      => esc_html__('Ball Clip Rotate Pulse', 'glazov'),
          'square-spin'                 => esc_html__('Square Spin', 'glazov'),
          'ball-clip-rotate-multiple'   => esc_html__('Ball Clip Rotate Multiple', 'glazov'),
          'ball-pulse-rise'             => esc_html__('Ball Pulse Rise', 'glazov'),
          'ball-rotate'                 => esc_html__('Ball Rotate', 'glazov'),
          'cube-transition'             => esc_html__('Cube Transition', 'glazov'),
          'ball-zig-zag'                => esc_html__('Ball Zig Zag', 'glazov'),
          'ball-zig-zag-deflect'        => esc_html__('Ball Zig Zag Deflect', 'glazov'),
          'ball-triangle-path'          => esc_html__('Ball Triangle Path', 'glazov'),
          'ball-scale'                  => esc_html__('Ball Scale', 'glazov'),
          'line-scale'                  => esc_html__('Line Scale', 'glazov'),
          'line-scale-party'            => esc_html__('Line Scale Party', 'glazov'),
          'ball-pulse-sync'             => esc_html__('Ball Pulse Sync', 'glazov'),
          'ball-beat'                   => esc_html__('Ball Beat', 'glazov'),
          'line-scale-pulse-out'        => esc_html__('Line Scale Pulse Out', 'glazov'),
          'line-scale-pulse-out-rapid'  => esc_html__('Line Scale Pulse Out Rapid', 'glazov'),
          'ball-scale-ripple'           => esc_html__('Ball Scale Ripple', 'glazov'),
          'ball-scale-ripple-multiple'  => esc_html__('Ball Scale Ripple Multiple', 'glazov'),
          'ball-spin-fade-loader'       => esc_html__('Ball Spin Fade Loader', 'glazov'),
          'line-spin-fade-loader'       => esc_html__('Line Spin Fade Loader', 'glazov'),
          'triangle-skew-spin'          => esc_html__('Triangle Skew Spin', 'glazov'),
          'pacman'                      => esc_html__('Pacman', 'glazov'),
          'ball-grid-beat'              => esc_html__('Ball Grid Beat', 'glazov'),
          'semi-circle-spin'            => esc_html__('Semi Circle Spin', 'glazov'),
        ),
        'title'     => esc_html__('Loader Style', 'glazov'),
        'dependency'  => array('pre_loader', '==', 'true'),
      ),

    ), // end: fields

  );

  // ------------------------------
  // Header Sections
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_header_tab',
    'title'    => esc_html__('Header', 'glazov'),
    'icon'     => 'fa fa-bars',
    'sections' => array(

      // header design tab
      array(
        'name'     => 'header_design_tab',
        'title'    => esc_html__('Design', 'glazov'),
        'icon'     => 'fa fa-magic',
        'fields'   => array(

          // Header Select
          array(
            'id'        => 'menu_style',
            'type'      => 'select',
            'title'     => esc_html__('Menu Style', 'glazov'),
            'options'   => array(
              'style-one' => esc_html__('Style One', 'glazov'),
              'style-two' => esc_html__('Style Two', 'glazov'),
            ),
          ),
          array(
            'id'    => 'hide_menu_share',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Share', 'glazov'),
            'info' => esc_html__('Turn On if you want to hide share option in menu style two.', 'glazov'),
            'dependency' => array('menu_style', '==', 'style-two'),
          ),
          // Header Select

          // Extra's
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Extra\'s', 'glazov'),
          ),
          array(
            'id'          => 'mobile_breakpoint',
            'type'        => 'text',
            'title'       => esc_html__('Mobile Menu Starts from?', 'glazov'),
            'attributes'  => array( 'placeholder' => '767' ),
            'info' => esc_html__('Just put numeric value only. Like : 767. Don\'t use px or any other units.', 'glazov'),
          ),
          array(
            'id'    => 'sticky_header',
            'type'  => 'switcher',
            'title' => esc_html__('Sticky Header', 'glazov'),
            'info' => esc_html__('Turn On if you want your naviagtion bar on sticky.', 'glazov'),
            'default' => true,
          ),

        )
      ),

      // header banner
      array(
        'name'     => 'header_banner_tab',
        'title'    => esc_html__('Title Bar (or) Banner', 'glazov'),
        'icon'     => 'fa fa-bullhorn',
        'fields'   => array(

          // Title Area
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Title Area', 'glazov')
          ),
          array(
            'id'      => 'hide_title_bar',
            'type'    => 'switcher',
            'title'   => esc_html__('Title Bar', 'glazov'),
            'label'   => esc_html__('If you want to hide title bar in your sub-pages, please turn this ON.', 'glazov'),
          ),
          array(
            'id'        => 'title_area_height',
            'type'      => 'select',
            'title'     => esc_html__('Title Area Height', 'glazov'),
            'options'   => array(
              'default-height' => esc_html__('Default Height', 'glazov'),
              'height-600' => esc_html__('600', 'glazov'),
              'height-400' => esc_html__('400', 'glazov'),
              'height-200' => esc_html__('200', 'glazov'),
            ),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'             => 'titlebar_top_padding',
            'type'           => 'text',
            'title'          => esc_html__('Padding Top', 'glazov'),
            'attributes' => array(
              'placeholder'     => '100px',
            ),
            'dependency'   => array( 'title_bar_padding', '==', 'padding-custom' ),
          ),
          array(
            'id'             => 'titlebar_bottom_padding',
            'type'           => 'text',
            'title'          => esc_html__('Padding Bottom', 'glazov'),
            'attributes' => array(
              'placeholder'     => '100px',
            ),
            'dependency'   => array( 'title_bar_padding', '==', 'padding-custom' ),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Background Options', 'glazov'),
            'dependency' => array( 'hide_title_bar', '!=', 'true' ),
          ),
          array(
            'id'      => 'titlebar_bg',
            'type'    => 'background',
            'title'   => esc_html__('Background', 'glazov'),
            'dependency' => array( 'hide_title_bar', '!=', 'true' ),
          ),
          array(
            'id'      => 'titlebar_bg_overlay_color',
            'type'    => 'color_picker',
            'title'   => esc_html__('Overlay Color', 'glazov'),
            'dependency' => array( 'hide_title_bar', '!=', 'true' ),
          ),

        )
      ),

    ),
  );

  // ------------------------------
  // Footer Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'footer_section',
    'title'    => esc_html__('Footer', 'glazov'),
    'icon'     => 'fa fa-ellipsis-h',
    'sections' => array(

      // footer widgets
      array(
        'name'     => 'footer_widgets_tab',
        'title'    => esc_html__('Widget Area', 'glazov'),
        'icon'     => 'fa fa-th',
        'fields'   => array(

          // Footer Widget Block
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Footer Widget Block', 'glazov')
          ),
          array(
            'id'    => 'footer_widget_block',
            'type'  => 'switcher',
            'title' => esc_html__('Enable Widget Block', 'glazov'),
            'info' => esc_html__('If you turn this ON, then Goto : Appearance > Widgets. There you can see <strong>Footer Widget 1,2,3 or 4</strong> Widget Area, add your widgets there.', 'glazov'),
            'default' => true,
          ),
          array(
            'id'    => 'footer_widget_layout',
            'type'  => 'image_select',
            'title' => esc_html__('Widget Layouts', 'glazov'),
            'info' => esc_html__('Choose your footer widget layouts.', 'glazov'),
            'default' => 4,
            'options' => array(
              1   => GLAZOV_CS_IMAGES . '/footer/footer-1.png',
              2   => GLAZOV_CS_IMAGES . '/footer/footer-2.png',
              3   => GLAZOV_CS_IMAGES . '/footer/footer-3.png',
              4   => GLAZOV_CS_IMAGES . '/footer/footer-4.png',
              5   => GLAZOV_CS_IMAGES . '/footer/footer-5.png',
              6   => GLAZOV_CS_IMAGES . '/footer/footer-6.png',
              7   => GLAZOV_CS_IMAGES . '/footer/footer-7.png',
              8   => GLAZOV_CS_IMAGES . '/footer/footer-8.png',
              9   => GLAZOV_CS_IMAGES . '/footer/footer-9.png',
            ),
            'radio'       => true,
            'dependency'  => array('footer_widget_block', '==', true),
          ),

        )
      ),

      // footer copyright
      array(
        'name'     => 'footer_copyright_tab',
        'title'    => esc_html__('Copyright Bar', 'glazov'),
        'icon'     => 'fa fa-copyright',
        'fields'   => array(

          // Copyright
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Copyright Layout', 'glazov'),
          ),
          array(
            'id'    => 'need_copyright',
            'type'  => 'switcher',
            'title' => esc_html__('Enable Copyright Section', 'glazov'),
            'default' => true,
          ),
          array(
            'id'    => 'footer_copyright_layout',
            'type'  => 'image_select',
            'title' => esc_html__('Select Copyright Layout', 'glazov'),
            'info' => esc_html__('In above image, blue box is copyright text and yellow box is secondary text.', 'glazov'),
            'default'      => 'copyright-3',
            'options'      => array(
              'copyright-1'    => GLAZOV_CS_IMAGES .'/footer/copyright-1.png',
              'copyright-2'    => GLAZOV_CS_IMAGES .'/footer/copyright-2.png',
              'copyright-3'    => GLAZOV_CS_IMAGES .'/footer/copyright-3.png',
              ),
            'radio'        => true,
            'dependency'     => array('need_copyright', '==', true),
          ),
          array(
            'id'    => 'copyright_text',
            'type'  => 'textarea',
            'title' => esc_html__('Copyright Text', 'glazov'),
            'shortcode' => true,
            'dependency' => array('need_copyright', '==', true),
            'after'       => 'Helpful shortcodes: [vt_current_year] [vt_home_url] or any shortcode.',
          ),

          // Copyright Another Text
          array(
            'type'    => 'notice',
            'class'   => 'warning cs-vt-heading',
            'content' => esc_html__('Copyright Secondary Text', 'glazov'),
            'dependency'     => array('need_copyright', '==', true),
          ),
          array(
            'id'    => 'secondary_text',
            'type'  => 'textarea',
            'title' => esc_html__('Secondary Text', 'glazov'),
            'shortcode' => true,
            'dependency' => array('need_copyright', '==', 'true'),
          ),

        )
      ),

    ),
  );

  // ------------------------------
  // Design
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_design',
    'title'  => esc_html__('Design', 'glazov'),
    'icon'   => 'fa fa-magic'
  );

  // ------------------------------
  // color section
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_color_section',
    'title'    => esc_html__('Colors', 'glazov'),
    'icon'     => 'fa fa-eyedropper',
    'fields' => array(

      array(
        'type'    => 'heading',
        'content' => esc_html__('Color Options', 'glazov'),
      ),
      array(
        'type'    => 'subheading',
        'wrap_class' => 'color-tab-content',
        'content' => esc_html__('All color options are available in our theme customizer. The reason of we used customizer options for color section is because, you can choose each part of color from there and see the changes instantly using customizer.
          <br /><br />Highly customizable colors are in <strong>Appearance > Customize</strong>', 'glazov'),
      ),

    ),
  );

  // ------------------------------
  // Typography section
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_typo_section',
    'title'    => esc_html__('Typography', 'glazov'),
    'icon'     => 'fa fa-header',
    'fields' => array(

      // Start fields
      array(
        'id'                  => 'typography',
        'type'                => 'group',
        'fields'              => array(
          array(
            'id'              => 'title',
            'type'            => 'text',
            'title'           => esc_html__('Title', 'glazov'),
          ),
          array(
            'id'              => 'selector',
            'type'            => 'textarea',
            'title'           => esc_html__('Selector', 'glazov'),
            'info'           => esc_html__('Enter css selectors like : <strong>body, .custom-class</strong>', 'glazov'),
          ),
          array(
            'id'              => 'font',
            'type'            => 'typography',
            'title'           => esc_html__('Font Family', 'glazov'),
          ),
          array(
            'id'              => 'css',
            'type'            => 'textarea',
            'title'           => esc_html__('Custom CSS', 'glazov'),
          ),
        ),
        'button_title'        => esc_html__('Add New Typography', 'glazov'),
        'accordion_title'     => esc_html__('New Typography', 'glazov'),
        'default'             => array(
          array(
            'title'           => esc_html__('Body Typography', 'glazov'),
            'selector'        => 'body, .glzv-full-background input[type="password"], .story-subtitle, .story-tageline, .woocommerce .cart_totals table.shop_table, .woocommerce .cart-collaterals .shipping select, .woocommerce .cart-collaterals .shipping input[type="text"], .woocommerce-shipping-calculator .select2-container--default .select2-selection--single .select2-selection__rendered, .select2-container--default .select2-selection--single .select2-selection__rendered, .woocommerce form.woocommerce-checkout .form-row input.input-text, .woocommerce form.woocommerce-checkout .form-row select, .woocommerce .woocommerce-checkout-review-order table.shop_table, .blog-meta',
            'font'            => array(
              'family'        => 'Ek Mukta',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Menu Typography', 'glazov'),
            'selector'        => '.navigation > li > a',
            'font'            => array(
              'family'        => 'Ek Mukta',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Sub Menu Typography', 'glazov'),
            'selector'        => '.dropdown-nav > li > a',
            'font'            => array(
              'family'        => 'Ek Mukta',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Headings Typography', 'glazov'),
            'selector'        => 'h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6, .text-logo',
            'font'            => array(
              'family'        => 'Dosis',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Shortcode Elements Primary Font', 'glazov'),
            'selector'        => '.glzv-btn, input[type="text"], input[type="email"], input[type="password"], input[type="tel"], input[type="search"], input[type="date"], input[type="time"], input[type="datetime-local"], input[type="month"], input[type="url"], input[type="number"], textarea, select, .form-control, input[type="submit"], blockquote, blockquote p, table, .glzv-pagination, .project-share .share-label, .slide-bottom-wrap, .glzv-gallery .masonry-filters, .archive-info,.proof-client-info, .proof-gallery-info, .portfolio-short-details, .share-portfolio .share-label, .control-links .previous:after, .portfolio-fullwidth .view-project-link a, .portfolio-fullwidth .view-project-link span, .glzv-testimonial p, .blog-action-link, .glzv-sigltags_warp, .glzv-sigltags_warp p a, .glzv-social.rounded a, .woocommerce .woocommerce-result-count, .woocommerce-page .woocommerce-result-count, .woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #review_form #respond .form-submit input, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .product_meta, .woocommerce div.product .woocommerce-tabs ul.tabs li a, .woocommerce #reviews #comments ol.commentlist li .comment-text p.meta strong, .woocommerce #review_form #respond p label, .woocommerce-error, .woocommerce-info, .woocommerce-message',
            'font'            => array(
              'family'        => 'Dosis',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Example Usage', 'glazov'),
            'selector'        => '.your-custom-class',
            'font'            => array(
              'family'        => 'Roboto Slab',
              'variant'       => 'regular',
            ),
          ),
        ),
      ),

      // Subset
      array(
        'id'                  => 'subsets',
        'type'                => 'select',
        'title'               => esc_html__('Subsets', 'glazov'),
        'class'               => 'chosen',
        'options'             => array(
          'latin'             => 'latin',
          'latin-ext'         => 'latin-ext',
          'cyrillic'          => 'cyrillic',
          'cyrillic-ext'      => 'cyrillic-ext',
          'greek'             => 'greek',
          'greek-ext'         => 'greek-ext',
          'vietnamese'        => 'vietnamese',
          'devanagari'        => 'devanagari',
          'khmer'             => 'khmer',
        ),
        'attributes'         => array(
          'data-placeholder' => 'Subsets',
          'multiple'         => 'multiple',
          'style'            => 'width: 200px;'
        ),
        'default'             => array( 'latin' ),
      ),

      array(
        'id'                  => 'font_weight',
        'type'                => 'select',
        'title'               => esc_html__('Font Weights', 'glazov'),
        'class'               => 'chosen',
        'options'             => array(
          '100'   => 'Thin 100',
          '100i'  => 'Thin 100 Italic',
          '200'   => 'Extra Light 200',
          '200i'  => 'Extra Light 200 Italic',
          '300'   => 'Light 300',
          '300i'  => 'Light 300 Italic',
          '400'   => 'Regular 400',
          '400i'  => 'Regular 400 Italic',
          '500'   => 'Medium 500',
          '500i'  => 'Medium 500 Italic',
          '600'   => 'Semi Bold 600',
          '600i'  => 'Semi Bold 600 Italic',
          '700'   => 'Bold 700',
          '700i'  => 'Bold 700 Italic',
          '800'   => 'Extra Bold 800',
          '800i'  => 'Extra Bold 800 Italic',
          '900'   => 'Black 900',
          '900i'  => 'Black 900 Italic',
        ),
        'attributes'         => array(
          'data-placeholder' => 'Font Weight',
          'multiple'         => 'multiple',
          'style'            => 'width: 200px;'
        ),
        'default'             => array( '400','300','500','600','700' ),
      ),

      // Custom Fonts Upload
      array(
        'id'                 => 'font_family',
        'type'               => 'group',
        'title'              => 'Upload Custom Fonts',
        'button_title'       => 'Add New Custom Font',
        'accordion_title'    => 'Adding New Font',
        'accordion'          => true,
        'desc'               => 'It is simple. Only add your custom fonts and click to save. After you can check "Font Family" selector. Do not forget to Save!',
        'fields'             => array(

          array(
            'id'             => 'name',
            'type'           => 'text',
            'title'          => 'Font-Family Name',
            'attributes'     => array(
              'placeholder'  => 'for eg. Arial'
            ),
          ),

          array(
            'id'             => 'ttf',
            'type'           => 'upload',
            'title'          => 'Upload .ttf <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.ttf</i>',
            ),
          ),

          array(
            'id'             => 'eot',
            'type'           => 'upload',
            'title'          => 'Upload .eot <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.eot</i>',
            ),
          ),

          array(
            'id'             => 'otf',
            'type'           => 'upload',
            'title'          => 'Upload .otf <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.otf</i>',
            ),
          ),

          array(
            'id'             => 'woff',
            'type'           => 'upload',
            'title'          => 'Upload .woff <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.woff</i>',
            ),
          ),

          array(
            'id'             => 'css',
            'type'           => 'textarea',
            'title'          => 'Extra CSS Style <small><i>(optional)</i></small>',
            'attributes'     => array(
              'placeholder'  => 'for eg. font-weight: normal;'
            ),
          ),

        ),
      ),
      // End All field

    ),
  );

  // ------------------------------
  // Pages
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_pages',
    'title'  => esc_html__('Pages', 'glazov'),
    'icon'   => 'fa fa-files-o'
  );

  // ------------------------------
  // Portfolio Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'portfolio_section',
    'title'    => esc_html__('Portfolio', 'glazov'),
    'icon'     => 'fa fa-briefcase',
    'fields' => array(

      // portfolio name change
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Name Change', 'glazov')
      ),
      array(
        'id'      => 'theme_portfolio_name',
        'type'    => 'text',
        'title'   => esc_html__('Portfolio Name', 'glazov'),
        'attributes'     => array(
          'placeholder'  => 'Portfolio'
        ),
      ),
      array(
        'id'      => 'theme_portfolio_slug',
        'type'    => 'text',
        'title'   => esc_html__('Portfolio Slug', 'glazov'),
        'attributes'     => array(
          'placeholder'  => 'portfolio-item'
        ),
      ),
      array(
        'id'      => 'theme_portfolio_cat_slug',
        'type'    => 'text',
        'title'   => esc_html__('Portfolio Category Slug', 'glazov'),
        'attributes'     => array(
          'placeholder'  => 'portfolio-category'
        ),
      ),
      array(
        'type'    => 'notice',
        'class'   => 'danger',
        'content' => esc_html__('<strong>Important</strong>: Please do not set portfolio slug and page slug as same. It\'ll not work.', 'glazov')
      ),
      // Portfolio Name

      // portfolio listing
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Portfolio Style', 'glazov')
      ),
      array(
        'id'             => 'portfolio_style',
        'type'           => 'select',
        'title'          => esc_html__('Portfolio Style', 'glazov'),
        'options'        => array(
          'bpw-style-one' => esc_html__('Style One', 'glazov'),
          'bpw-style-two' => esc_html__('Style Two', 'glazov'),
        ),
        'default_option'     => esc_html__('Select Portfolio Style', 'glazov'),
      ),
      array(
        'id'             => 'portfolio_column',
        'type'           => 'select',
        'title'          => esc_html__('Portfolio Column', 'glazov'),
        'options'        => array(
          'bpw-col-5' => esc_html__('Five Columns', 'glazov'),
          'bpw-col-4' => esc_html__('Four Columns', 'glazov'),
          'bpw-col-3' => esc_html__('Three Columns', 'glazov'),
        ),
        'default_option'     => esc_html__('Select Portfolio Column', 'glazov'),
      ),
      array(
        "type"        =>'text',
        "title"     => esc_html__('Limit', 'glazov'),
        "id"  => "portfolio_limit",
        "info" => esc_html__( "Enter the number of items to show.", 'glazov'),
      ),
      array(
        'id'          => 'portfolio_order',
        'title'       => esc_html__('Portfolio Order', 'glazov'),
        'desc'        => esc_html__('Select portfolio order', 'glazov'),
        'type'        => 'select',
        'options'        => array(
          'ascending' => esc_html__('Ascending', 'glazov'),
          'decending' => esc_html__('Decending', 'glazov'),
        ),
      ),
      array(
        'id'          => 'portfolio_orderby',
        'title'       => esc_html__('Portfolio Orderby', 'glazov'),
        'desc'        => esc_html__('Select portfolio orderby', 'glazov'),
        'type'        => 'select',
        'options'        => array(
          'None' => esc_html__('None', 'glazov'),
          'id' => esc_html__('ID', 'glazov'),
          'author' => esc_html__('Author', 'glazov'),
          'title' => esc_html__('Title', 'glazov'),
          'name' => esc_html__('Name', 'glazov'),
          'type' => esc_html__('Type', 'glazov'),
          'date' => esc_html__('Date', 'glazov'),
          'modified' => esc_html__('Modified', 'glazov'),
          'random' => esc_html__('Random', 'glazov'),
        ),
      ),

      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Enable/Disable Options', 'glazov')
      ),
      array(
        'id'      => 'portfolio_pagination',
        'type'    => 'switcher',
        'title'   => esc_html__('Pagination', 'glazov'),
        'label'   => esc_html__('If you need pagination in portfolio pages, please turn this ON.', 'glazov'),
        'default'   => true,
      ),
      array(
        'id'      => 'portfolio_filter',
        'type'    => 'switcher',
        'title'   => esc_html__('Portfolio Filter', 'glazov'),
        'dependency'     => array('portfolio_style', '==', 'bpw-style-one'),
        'label'   => esc_html__('If you need filter in portfolio pages, please turn this ON.', 'glazov'),
        'default'   => false,
      ),

      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Single Portfolio', 'glazov')
      ),
      array(
        'id'      => 'portfolio_single_pagination',
        'type'    => 'switcher',
        'title'   => esc_html__('Next & Prev Navigation', 'glazov'),
        'label'   => esc_html__('If you don\'t want next and previous navigation in portfolio single pages, please turn this OFF.', 'glazov'),
        'default'   => true,
      ),
      array(
        'id'      => 'portfolio_home_url',
        'type'    => 'text',
        'title'   => esc_html__('Portfolio URL', 'glazov'),
         'attributes' => array(
            'placeholder'     => esc_html__('http://yourdomain.com/portfolio', 'glazov'),
        ),
      ),
      // Portfolio Listing

    ),
  );

  // ------------------------------
  // Gallery Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'gallery_section',
    'title'    => esc_html__('Gallery', 'glazov'),
    'icon'     => 'fa fa-briefcase',
    'fields' => array(
      // gallery listing
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Gallery Style', 'glazov')
      ),
      array(
        'id'             => 'gallery_style',
        'type'           => 'select',
        'title'          => esc_html__('Gallery Style', 'glazov'),
        'options'        => array(
          'grid' => esc_html__('Grid', 'glazov'),
          'masonry' => esc_html__('Masonry', 'glazov'),
          'thumbnail' => esc_html__('Thumbnail', 'glazov'),
        ),
        'default_option'     => esc_html__('Select Gallery Style', 'glazov'),
      ),
      array(
        'id'             => 'gallery_column',
        'type'           => 'select',
        'title'          => esc_html__('Gallery Column', 'glazov'),
        'options'        => array(
          'col-item-3' => esc_html__('Three Columns', 'glazov'),
          'col-item-4' => esc_html__('Four Columns', 'glazov'),
        ),
        'default_option'     => esc_html__('Select Gallery Column', 'glazov'),
      ),
      array(
        "type"        =>'text',
        "title"     => esc_html__('Limit', 'glazov'),
        "id"  => "gallery_limit",
        "info" => esc_html__( "Enter the number of items to show.", 'glazov'),
      ),
      array(
        'id'          => 'gallery_order',
        'title'       => esc_html__('Gallery Order', 'glazov'),
        'desc'        => esc_html__('Select gallery order', 'glazov'),
        'type'        => 'select',
        'options'        => array(
          'ascending' => esc_html__('Ascending', 'glazov'),
          'decending' => esc_html__('Decending', 'glazov'),
        ),
      ),
      array(
        'id'          => 'gallery_orderby',
        'title'       => esc_html__('Gallery Orderby', 'glazov'),
        'desc'        => esc_html__('Select gallery orderby', 'glazov'),
        'type'        => 'select',
        'options'        => array(
          'None' => esc_html__('None', 'glazov'),
          'id' => esc_html__('ID', 'glazov'),
          'author' => esc_html__('Author', 'glazov'),
          'title' => esc_html__('Title', 'glazov'),
          'name' => esc_html__('Name', 'glazov'),
          'type' => esc_html__('Type', 'glazov'),
          'date' => esc_html__('Date', 'glazov'),
          'modified' => esc_html__('Modified', 'glazov'),
          'random' => esc_html__('Random', 'glazov'),
        ),
      ),
    ),
  );

  // ------------------------------
  // Team Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'team_section',
    'title'    => esc_html__('Team', 'glazov'),
    'icon'     => 'fa fa-users',
    'fields' => array(

      // Team Start
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Team', 'glazov')
      ),
      array(
        'id'             => 'team_column',
        'type'           => 'select',
        'title'          => esc_html__('Team Column', 'glazov'),
        'options'        => array(
          'col-md-4 col-sm-6' => esc_html__('Three Columns', 'glazov'),
          'col-md-3 col-sm-6' => esc_html__('Four Columns', 'glazov'),
        ),
        'default_option'     => esc_html__('Select Team Column', 'glazov'),
      ),
      array(
        "type"        =>'text',
        "title"     => esc_html__('Limit', 'glazov'),
        "id"  => "team_limit",
        "info" => esc_html__( "Enter the number of items to show.", 'glazov'),
      ),
      array(
        'id'          => 'team_order',
        'title'       => esc_html__('Team Order', 'glazov'),
        'desc'        => esc_html__('Select team order', 'glazov'),
        'type'        => 'select',
        'options'        => array(
          'ascending' => esc_html__('Ascending', 'glazov'),
          'decending' => esc_html__('Decending', 'glazov'),
        ),
      ),
      array(
        'id'          => 'team_orderby',
        'title'       => esc_html__('Team Orderby', 'glazov'),
        'desc'        => esc_html__('Select team orderby', 'glazov'),
        'type'        => 'select',
        'options'        => array(
          'None' => esc_html__('None', 'glazov'),
          'id' => esc_html__('ID', 'glazov'),
          'author' => esc_html__('Author', 'glazov'),
          'title' => esc_html__('Title', 'glazov'),
          'name' => esc_html__('Name', 'glazov'),
          'type' => esc_html__('Type', 'glazov'),
          'date' => esc_html__('Date', 'glazov'),
          'modified' => esc_html__('Modified', 'glazov'),
          'random' => esc_html__('Random', 'glazov'),
        ),
      ),
      array(
        'id'      => 'team_title',
        'type'    => 'text',
        'title'   => esc_html__('Team Section Title', 'glazov'),
      ),
      array(
        'id'      => 'team_sub_title',
        'type'    => 'text',
        'title'   => esc_html__('Team Section Sub-Title', 'glazov'),
      ),
      array(
        'id'             => 'team_social_icon',
        'type'           => 'switcher',
        'title'          => esc_html__('Social Icon', 'glazov'),
        'info'          => esc_html__('Enable this if you need social icon', 'glazov'),
      ),
      array(
        'id'             => 'team_pagination',
        'type'           => 'switcher',
        'title'          => esc_html__('Pagination', 'glazov'),
        'info'          => esc_html__('Enable this if you need pagination in team page', 'glazov'),
      ),
      // Team End

    ),
  );

  // ------------------------------
  // Blog Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'blog_section',
    'title'    => esc_html__('Blog', 'glazov'),
    'icon'     => 'fa fa-edit',
    'sections' => array(

      // blog general section
      array(
        'name'     => 'blog_general_tab',
        'title'    => esc_html__('General', 'glazov'),
        'icon'     => 'fa fa-cog',
        'fields'   => array(

          // Layout
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Layout', 'glazov')
          ),
          array(
            'id'             => 'blog_sidebar_position',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Position', 'glazov'),
            'options'        => array(
              'sidebar-right' => esc_html__('Right', 'glazov'),
              'sidebar-left' => esc_html__('Left', 'glazov'),
              'sidebar-hide' => esc_html__('Hide', 'glazov'),
            ),
            'default_option' => 'Select sidebar position',
            'help'          => esc_html__('This style will apply, default blog pages - Like : Archive, Category, Tags, Search & Author.', 'glazov'),
            'info'          => esc_html__('Default option : Right', 'glazov'),
          ),
          array(
            'id'             => 'blog_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'glazov'),
            'options'        => glazov_vt_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'glazov'),
            'dependency'     => array('blog_sidebar_position', '!=', 'sidebar-hide'),
            'info'          => esc_html__('Default option : Main Widget Area', 'glazov'),
          ),
          array(
            'id'             => 'blog_sidebar_type',
            'type'           => 'switcher',
            'title'          => esc_html__('Floating Sidebar', 'glazov'),
            'info'          => esc_html__('Enable this if you need floating sidebar', 'glazov'),
            'dependency'     => array('blog_sidebar_position', '!=', 'sidebar-hide'),
          ),
          // Layout
          // Global Options
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Global Options', 'glazov')
          ),
          array(
            'id'         => 'theme_exclude_categories',
            'type'       => 'checkbox',
            'title'      => esc_html__('Exclude Categories', 'glazov'),
            'info'      => esc_html__('Select categories you want to exclude from blog page.', 'glazov'),
            'options'    => 'categories',
          ),
          array(
            'id'      => 'theme_blog_excerpt',
            'type'    => 'text',
            'title'   => esc_html__('Excerpt Length', 'glazov'),
            'info'   => esc_html__('Blog short content length, in blog listing pages.', 'glazov'),
            'default' => '55',
          ),
          array(
            'id'      => 'theme_metas_hide',
            'type'    => 'checkbox',
            'title'   => esc_html__('Meta\'s to hide', 'glazov'),
            'info'    => esc_html__('Check items you want to hide from blog/post meta field.', 'glazov'),
            'class'      => 'horizontal',
            'options'    => array(
              'category'   => esc_html__('Category', 'glazov'),
              'date'    => esc_html__('Date', 'glazov'),
              'author'     => esc_html__('Author', 'glazov'),
              'comments'      => esc_html__('Comments', 'glazov'),
            ),
            // 'default' => '30',
          ),
          // End fields

        )
      ),

      // blog single section
      array(
        'name'     => 'blog_single_tab',
        'title'    => esc_html__('Single', 'glazov'),
        'icon'     => 'fa fa-sticky-note',
        'fields'   => array(

          // Start fields
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Enable / Disable', 'glazov')
          ),
          array(
            'id'    => 'single_featured_image',
            'type'  => 'switcher',
            'title' => esc_html__('Featured Image', 'glazov'),
            'info' => esc_html__('If need to hide featured image from single blog post page, please turn this OFF.', 'glazov'),
            'default' => true,
          ),
          array(
            'id'        => 'blog_single_featured_img_type',
            'type'      => 'select',
            'title'     => esc_html__('Featured Image Display Type', 'glazov'),
            'options'   => array(
              'original' => 'Original',
              'banner' => 'Banner',
            ),
            'dependency'     => array('single_featured_image', '==', 'true'),
          ),
          array(
            'id'    => 'single_author_info',
            'type'  => 'switcher',
            'title' => esc_html__('Author Info', 'glazov'),
            'info' => esc_html__('If need to hide author info on single blog page, please turn this OFF.', 'glazov'),
            'default' => true,
          ),
          array(
            'id'    => 'single_share_option',
            'type'  => 'switcher',
            'title' => esc_html__('Share Option', 'glazov'),
            'info' => esc_html__('If need to hide share option on single blog page, please turn this OFF.', 'glazov'),
            'default' => true,
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Sidebar', 'glazov')
          ),
          array(
            'id'             => 'single_sidebar_position',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Position', 'glazov'),
            'options'        => array(
              'sidebar-right' => esc_html__('Right', 'glazov'),
              'sidebar-left' => esc_html__('Left', 'glazov'),
              'sidebar-hide' => esc_html__('Hide', 'glazov'),
            ),
            'default_option' => 'Select sidebar position',
            'info'          => esc_html__('Default option : Right', 'glazov'),
          ),
          array(
            'id'             => 'single_blog_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'glazov'),
            'options'        => glazov_vt_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'glazov'),
            'dependency'     => array('single_sidebar_position', '!=', 'sidebar-hide'),
            'info'          => esc_html__('Default option : Main Widget Area', 'glazov'),
          ),
          array(
            'id'             => 'single_sidebar_type',
            'type'           => 'switcher',
            'title'          => esc_html__('Floating Sidebar', 'glazov'),
            'info'          => esc_html__('Enable this if you need floating sidebar', 'glazov'),
            'dependency'     => array('single_sidebar_position', '!=', 'sidebar-hide'),
          ),
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Related Post', 'glazov')
          ),
          array(
            "type"        =>'text',
            "title"     => esc_html__('Related Post Title', 'glazov'),
            "id"  => "related_post_title",
            "info" => esc_html__( "Enter related post title.", 'glazov'),
          ),
          array(
            "type"        =>'text',
            "title"     => esc_html__('Limit', 'glazov'),
            "id"  => "related_post_limit",
            "info" => esc_html__( "Enter the number of items to show.", 'glazov'),
          ),
          array(
            'id'          => 'related_post_order',
            'title'       => esc_html__('Related Post Order', 'glazov'),
            'desc'        => esc_html__('Select related post order', 'glazov'),
            'type'        => 'select',
            'options'        => array(
              'ascending' => esc_html__('Ascending', 'glazov'),
              'decending' => esc_html__('Decending', 'glazov'),
            ),
          ),
          array(
            'id'          => 'related_post_orderby',
            'title'       => esc_html__('Related Post Orderby', 'glazov'),
            'desc'        => esc_html__('Select related post orderby', 'glazov'),
            'type'        => 'select',
            'options'        => array(
              'None' => esc_html__('None', 'glazov'),
              'id' => esc_html__('ID', 'glazov'),
              'author' => esc_html__('Author', 'glazov'),
              'title' => esc_html__('Title', 'glazov'),
              'name' => esc_html__('Name', 'glazov'),
              'type' => esc_html__('Type', 'glazov'),
              'date' => esc_html__('Date', 'glazov'),
              'modified' => esc_html__('Modified', 'glazov'),
              'random' => esc_html__('Random', 'glazov'),
            ),
          ),
          // End fields

        )
      ),

    ),
  );

if (class_exists( 'WooCommerce' )){
  // ------------------------------
  // WooCommerce Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'woocommerce_section',
    'title'    => esc_html__('WooCommerce', 'glazov'),
    'icon'     => 'fa fa-shopping-cart',
    'fields' => array(

      // Start fields
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Layout', 'glazov')
      ),
      array(
        'id'             => 'woo_product_columns',
        'type'           => 'select',
        'title'          => esc_html__('Product Column', 'glazov'),
        'options'        => array(
          3 => esc_html__('Three Column', 'glazov'),
          4 => esc_html__('Four Column', 'glazov'),
        ),
        'default_option' => esc_html__('Select Product Columns', 'glazov'),
        'help'          => esc_html__('This style will apply, default woocommerce listings pages. Like, shop and archive pages.', 'glazov'),
      ),
      array(
        'id'             => 'woo_sidebar_position',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Position', 'glazov'),
        'options'        => array(
          'right-sidebar' => esc_html__('Right', 'glazov'),
          'left-sidebar' => esc_html__('Left', 'glazov'),
          'sidebar-hide' => esc_html__('Hide', 'glazov'),
        ),
        'default_option' => esc_html__('Select sidebar position', 'glazov'),
        'info'          => esc_html__('Default option : Right', 'glazov'),
      ),
      array(
        'id'             => 'woo_widget',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Widget', 'glazov'),
        'options'        => glazov_vt_registered_sidebars(),
        'default_option' => esc_html__('Select Widget', 'glazov'),
        'dependency'     => array('woo_sidebar_position', '!=', 'sidebar-hide'),
        'info'          => esc_html__('Default option : Shop Page', 'glazov'),
      ),
      array(
        'id'             => 'woo_sidebar_type',
        'type'           => 'switcher',
        'title'          => esc_html__('Floating Sidebar', 'glazov'),
        'info'          => esc_html__('Enable this if you need floating sidebar', 'glazov'),
        'dependency'     => array('woo_sidebar_position', '!=', 'sidebar-hide'),
      ),

      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Listing', 'glazov')
      ),
      array(
        'id'      => 'theme_woo_limit',
        'type'    => 'text',
        'title'   => esc_html__('Product Limit', 'glazov'),
        'info'   => esc_html__('Enter the number value for per page products limit.', 'glazov'),
      ),
      array(
        'id'      => 'theme_align_height',
        'type'    => 'text',
        'title'   => esc_html__('Have Alignment Space?', 'glazov'),
        'info'   => esc_html__('Set minimun height of each products here. Current minimum height is 100px', 'glazov'),
      ),
      // End fields

      // Start fields
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Single Product', 'glazov')
      ),
      array(
        'id'             => 'woo_related_limit',
        'type'           => 'text',
        'title'          => esc_html__('Related Products Limit', 'glazov'),
      ),
      array(
        'id'    => 'woo_single_related',
        'type'  => 'switcher',
        'title' => esc_html__('Related Products', 'glazov'),
        'info' => esc_html__('If you don\'t want \'Related Products\' in single product page, please turn this ON.', 'glazov'),
        'default' => false,
      ),
      array(
        'id'    => 'woo_single_upsell',
        'type'  => 'switcher',
        'title' => esc_html__('You May Also Like', 'glazov'),
        'info' => esc_html__('If you don\'t want \'You May Also Like\' products in cart page, please turn this ON.', 'glazov'),
        'default' => false,
      ),
      // End fields

    ),
  );
}

  // ------------------------------
  // Extra Pages
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_extra_pages',
    'title'    => esc_html__('Extra Pages', 'glazov'),
    'icon'     => 'fa fa-clone',
    'sections' => array(

      // PASSOWRD PROOFING
      array(
        'name'     => 'password_proofing_form',
        'title'    => esc_html__('Password Proofing', 'glazov'),
        'icon'     => 'fa fa-unlock',
        'fields'   => array(
          array(
            'id'    => 'password_title',
            'type'  => 'text',
            'title' => esc_html__('Title', 'glazov'),
          ),
          array(
            'id'    => 'password_content',
            'type'  => 'textarea',
            'title' => esc_html__('Content', 'glazov'),
          ),
          array(
            'id'    => 'password_proof_bg',
            'type'  => 'image',
            'title' => esc_html__('Background', 'glazov'),
            'add_title' => esc_html__('Add Background Image', 'glazov'),
          ),
          array(
            'id'    => 'password_proof_icon',
            'type'  => 'image',
            'title' => esc_html__('Icon', 'glazov'),
            'add_title' => esc_html__('Add Password Protected icon', 'glazov'),
          ),

        ) // end: fields
      ), // end: PASSOWRD PROOFING

      // error 404 page
      array(
        'name'     => 'error_page_section',
        'title'    => esc_html__('404 Page', 'glazov'),
        'icon'     => 'fa fa-exclamation-triangle',
        'fields'   => array(

          // Start 404 Page
          array(
            'id'    => 'error_heading',
            'type'  => 'text',
            'title' => esc_html__('404 Page Heading', 'glazov'),
            'info'  => esc_html__('Enter 404 page heading.', 'glazov'),
          ),
          array(
            'id'    => 'error_page_content',
            'type'  => 'textarea',
            'title' => esc_html__('404 Page Content', 'glazov'),
            'info'  => esc_html__('Enter 404 page content.', 'glazov'),
            'shortcode' => true,
          ),
          array(
            'id'    => 'error_page_bg',
            'type'  => 'image',
            'title' => esc_html__('404 Page Background', 'glazov'),
            'info'  => esc_html__('Choose 404 page background styles.', 'glazov'),
            'add_title' => esc_html__('Add 404 Image', 'glazov'),
          ),
          array(
            'id'    => 'error_btn_text',
            'type'  => 'text',
            'title' => esc_html__('Button Text', 'glazov'),
            'info'  => esc_html__('Enter BACK TO HOME button text. If you want to change it.', 'glazov'),
          ),
          // End 404 Page

        ) // end: fields
      ), // end: fields section

      // maintenance mode page
      array(
        'name'     => 'maintenance_mode_section',
        'title'    => esc_html__('Maintenance Mode', 'glazov'),
        'icon'     => 'fa fa-hourglass-half',
        'fields'   => array(

          // Start Maintenance Mode
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('If you turn this ON : Only Logged in users will see your pages. All other visiters will see, selected page of : <strong>Maintenance Mode Page</strong>', 'glazov')
          ),
          array(
            'id'             => 'enable_maintenance_mode',
            'type'           => 'switcher',
            'title'          => esc_html__('Maintenance Mode', 'glazov'),
            'default'        => false,
          ),
          array(
            'id'             => 'maintenance_mode_page',
            'type'           => 'select',
            'title'          => esc_html__('Maintenance Mode Page', 'glazov'),
            'options'        => 'pages',
            'default_option' => esc_html__('Select a page', 'glazov'),
            'dependency'   => array( 'enable_maintenance_mode', '==', 'true' ),
          ),
          array(
            'id'             => 'maintenance_mode_bg',
            'type'           => 'background',
            'title'          => esc_html__('Page Background', 'glazov'),
            'dependency'   => array( 'enable_maintenance_mode', '==', 'true' ),
          ),
          // End Maintenance Mode

        ) // end: fields
      ), // end: fields section

    )
  );

  // ------------------------------
  // Advanced
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_advanced',
    'title'  => esc_html__('Advanced', 'glazov'),
    'icon'   => 'fa fa-cog'
  );

  // ------------------------------
  // Misc Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'misc_section',
    'title'    => esc_html__('Misc', 'glazov'),
    'icon'     => 'fa fa-recycle',
    'sections' => array(

      // custom sidebar section
      array(
        'name'     => 'custom_sidebar_section',
        'title'    => esc_html__('Custom Sidebar', 'glazov'),
        'icon'     => 'fa fa-reorder',
        'fields'   => array(

          // start fields
          array(
            'id'              => 'custom_sidebar',
            'title'           => esc_html__('Sidebars', 'glazov'),
            'desc'            => esc_html__('Go to Appearance -> Widgets after create sidebars', 'glazov'),
            'type'            => 'group',
            'fields'          => array(
              array(
                'id'          => 'sidebar_name',
                'type'        => 'text',
                'title'       => esc_html__('Sidebar Name', 'glazov'),
              ),
              array(
                'id'          => 'sidebar_desc',
                'type'        => 'text',
                'title'       => esc_html__('Custom Description', 'glazov'),
              )
            ),
            'accordion'       => true,
            'button_title'    => esc_html__('Add New Sidebar', 'glazov'),
            'accordion_title' => esc_html__('New Sidebar', 'glazov'),
          ),
          // end fields

        )
      ),
      // custom sidebar section

      // Custom CSS/JS
      array(
        'name'        => 'custom_css_js_section',
        'title'       => esc_html__('Custom Codes', 'glazov'),
        'icon'        => 'fa fa-code',

        // begin: fields
        'fields'      => array(

          // Start Custom CSS/JS
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Custom JS', 'glazov')
          ),
          array(
            'id'             => 'theme_custom_js',
            'type'           => 'textarea',
            'attributes' => array(
              'rows'     => 10,
              'placeholder'     => esc_html__('Enter your JS code here...', 'glazov'),
            ),
          ),
          // End Custom CSS/JS

        ) // end: fields
      ),

      // Translation
      array(
        'name'        => 'theme_translation_section',
        'title'       => esc_html__('Translation', 'glazov'),
        'icon'        => 'fa fa-language',

        // begin: fields
        'fields'      => array(

          // Start Translation
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Common Texts', 'glazov')
          ),
          array(
            'id'          => 'read_more_text',
            'type'        => 'text',
            'title'       => esc_html__('Read More Text', 'glazov'),
          ),
          array(
            'id'          => 'view_more_text',
            'type'        => 'text',
            'title'       => esc_html__('View More Text', 'glazov'),
          ),
          array(
            'id'          => 'share_text',
            'type'        => 'text',
            'title'       => esc_html__('Share Text', 'glazov'),
          ),
          array(
            'id'          => 'share_on_text',
            'type'        => 'text',
            'title'       => esc_html__('Share On Tooltip Text', 'glazov'),
          ),
          array(
            'id'          => 'author_text',
            'type'        => 'text',
            'title'       => esc_html__('Author Text', 'glazov'),
          ),
          array(
            'id'          => 'post_comment_text',
            'type'        => 'text',
            'title'       => esc_html__('Post Comment Text [Submit Button]', 'glazov'),
          ),
          array(
            'id'          => 'p_info_text',
            'type'        => 'text',
            'title'       => esc_html__('Project Info', 'glazov'),
          ),
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('WooCommerce', 'glazov')
          ),
          array(
            'id'          => 'add_to_cart_text',
            'type'        => 'text',
            'title'       => esc_html__('Add to Cart Text', 'glazov'),
          ),
          array(
            'id'          => 'details_text',
            'type'        => 'text',
            'title'       => esc_html__('Details Text', 'glazov'),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Pagination', 'glazov')
          ),
          array(
            'id'          => 'older_post',
            'type'        => 'text',
            'title'       => esc_html__('Older Posts Text', 'glazov'),
          ),
          array(
            'id'          => 'newer_post',
            'type'        => 'text',
            'title'       => esc_html__('Newer Posts Text', 'glazov'),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Single Portfolio Pagination', 'glazov')
          ),
          array(
            'id'          => 'prev_port',
            'type'        => 'text',
            'title'       => esc_html__('Prev Project Text', 'glazov'),
          ),
          array(
            'id'          => 'next_port',
            'type'        => 'text',
            'title'       => esc_html__('Next Project Text', 'glazov'),
          ),
          // End Translation

        ) // end: fields
      ),

    ),
  );

  // ------------------------------
  // envato account
  // ------------------------------
  $options[]   = array(
    'name'     => 'envato_account_section',
    'title'    => esc_html__('Envato Account', 'glazov'),
    'icon'     => 'fa fa-link',
    'fields'   => array(

      array(
        'type'    => 'notice',
        'class'   => 'warning',
        'content' => esc_html__('Enter your Username and API key. You can get update our themes from WordPress admin itself.', 'glazov'),
      ),
      array(
        'id'      => 'themeforest_username',
        'type'    => 'text',
        'title'   => esc_html__('Envato Username', 'glazov'),
      ),
      array(
        'id'      => 'themeforest_api',
        'type'    => 'text',
        'title'   => esc_html__('Envato API Key', 'glazov'),
        'class'   => 'text-security',
        'after'   => esc_html__('<p>This is not a password field. Enter your Envato API key, which is located in : <strong>http://themeforest.net/user/[YOUR-USER-NAME]/api_keys/edit</strong></p>', 'glazov')
      ),

    )
  );

  // ------------------------------
  // backup                       -
  // ------------------------------
  $options[]   = array(
    'name'     => 'backup_section',
    'title'    => 'Backup',
    'icon'     => 'fa fa-shield',
    'fields'   => array(

      array(
        'type'    => 'notice',
        'class'   => 'warning',
        'content' => 'You can save your current options. Download a Backup and Import.',
      ),

      array(
        'type'    => 'backup',
      ),

    )
  );

  return $options;

}
add_filter( 'cs_framework_options', 'glazov_vt_options' );
