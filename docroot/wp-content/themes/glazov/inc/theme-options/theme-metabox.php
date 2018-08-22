<?php
/*
 * All Metabox related options for Glazov theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

function glazov_vt_metabox_options( $options ) {

  $options      = array();

  // -----------------------------------------
  // Post Metabox Options                    -
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'post_type_metabox',
    'title'     => esc_html__('Post Options', 'glazov'),
    'post_type' => 'post',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      // All Post Formats
      array(
        'name'   => 'featured_img_type',
        'fields' => array(

          array(
            'id'        => 'blog_single_featured_img_type',
            'type'      => 'select',
            'title'     => esc_html__('Featured Image Display Type', 'glazov'),
            'options'   => array(
              'default'    => 'Default',
              'original' => 'Original',
              'banner' => 'Banner',
            ),
          ),

        ),
      ),

    ),
  );

// -----------------------------------------
// Gallery Metabox Options                    -
// -----------------------------------------
$options[]    = array(
  'id'        => 'gallery_single_metabox',
  'title'     => esc_html__('Gallery Options', 'glazov'),
  'post_type' => array('gallery'),
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(
    // Title Section
    array(
      'name'  => 'page_single_gallery_section',
      'title' => esc_html__('Layout', 'glazov'),
      'icon'  => 'fa fa-minus',

      // Fields Start
      'fields' => array(
        array(
          'id'           => 'gallery_layout',
          'type'         => 'image_select',
          'options'      => array(
            'gallery_grid'     => GLAZOV_CS_IMAGES .'/gallery-grid.jpg',
            'gallery_horizontal'     => GLAZOV_CS_IMAGES .'/gallery_horizontal.jpg',
            'gallery_kenburns' => GLAZOV_CS_IMAGES .'/gallery_kenburns.jpg',
            'gallery_masonry' => GLAZOV_CS_IMAGES .'/gallery_masonry.jpg',
            'gallery_proofing' => GLAZOV_CS_IMAGES .'/gallery_proofing.jpg',
          ),
          'attributes' => array(
            'data-depend-id' => 'gallery_layout',
          ),
          'radio'     => true,
          'default'   => 'gallery_grid',
        ),
        array(
          'id'        => 'gallery_single_width',
          'type'      => 'select',
          'title'     => esc_html__('Layout', 'glazov'),
          'options'   => array(
            'fullwidth'    => 'Fullwidth',
            'contained' => 'Contained',
          ),
          'dependency'   => array('gallery_layout', 'any', 'gallery_grid,gallery_proofing,gallery_masonry'),
        ),
        array(
          'id'        => 'gallery_single_column',
          'type'      => 'select',
          'title'     => esc_html__('Gallery Column', 'glazov'),
          'options'   => array(
            '3'    => esc_html__('Three Columns', 'glazov'),
            '4'    => esc_html__('Four Columns', 'glazov'),
            '5'    => esc_html__('Five Columns', 'glazov'),
          ),
          'dependency'   => array('gallery_layout', 'any', 'gallery_grid,gallery_masonry,gallery_proofing'),
        ),
        array(
          'id'          => 'notify_txt',
          'type'        => 'text',
          'title'       => esc_html__('Notify Button Text', 'glazov'),
          'dependency'   => array('gallery_layout', '==', 'gallery_proofing'),
        ),
        array(
          'id'          => 'notify_link',
          'type'        => 'text',
          'title'       => esc_html__('Notify Button Link', 'glazov'),
          'dependency'   => array('gallery_layout', '==', 'gallery_proofing'),
        ),
        // start fields
        array(
          'id'          => 'gallery_images_for_galleries',
          'type'        => 'gallery',
          'title'       => esc_html__('Add Gallery', 'glazov'),
          'add_title'   => esc_html__('Add Image(s)', 'glazov'),
          'edit_title'  => esc_html__('Edit Image(s)', 'glazov'),
          'clear_title' => esc_html__('Clear Image(s)', 'glazov'),
        ),
        // start fields
        array(
          'id'              => 'gallery_informations',
          'title'           => esc_html__('Informations', 'glazov'),
          'desc'            => esc_html__('Each group is each meta info', 'glazov'),
          'type'            => 'group',
          'fields'          => array(
            array(
              'id'          => 'title',
              'type'        => 'text',
              'title'       => esc_html__('Meta Title', 'glazov'),
            ),
            array(
              'id'          => 'meta_info',
              'type'        => 'textarea',
              'title'       => esc_html__('Info', 'glazov'),
              'desc'       => esc_html__('Type multiple information by separting "Enter"', 'glazov'),
            ),
            array(
              'id'          => 'info_url',
              'type'        => 'textarea',
              'title'       => esc_html__('Info URL', 'glazov'),
              'attributes' => array(
                'placeholder' => esc_html__('http://', 'glazov'),
              ),
              'desc'       => esc_html__('Type multiple information by separting "Enter" (Make equality of info and url)', 'glazov'),
            )
          ),
          'accordion'       => true,
          'button_title'    => esc_html__('Add New Info', 'glazov'),
          'dependency'   => array('gallery_layout', '==', 'gallery_proofing'),
          'accordion_title' => esc_html__('New Info', 'glazov'),
        ), // information meta
        // end fields

      ), // End : Fields

    ), // Title Section

    // Enable & Disable
    array(
      'name'  => 'gallery_hide_show_section',
      'title' => esc_html__('Enable & Disable', 'glazov'),
      'icon'  => 'fa fa-toggle-on',
      'fields' => array(
        array(
          'type'    => 'notice',
          'wrap_class' => 'hide-title',
          'class'   => 'info cs-vt-heading',
          'content' => esc_html__('Slider Controls', 'glazov')
        ),
        array(
          'id'    => 'hide_zoom_icon',
          'type'  => 'switcher',
          'title' => esc_html__('Hide Zoom Icon', 'glazov'),
          'label' => esc_html__('Yes, Please do it.', 'glazov'),
          'dependency'   => array('gallery_layout', 'any', 'gallery_kenburns,gallery_horizontal,gallery_proofing'),
        ),
        array(
          'id'    => 'hide_next_prev',
          'type'  => 'switcher',
          'title' => esc_html__('Hide Next and Previous Controls', 'glazov'),
          'label' => esc_html__('Yes, Please do it.', 'glazov'),
          'dependency'   => array('gallery_layout', '==', 'gallery_kenburns'),
        ),
        array(
          'id'    => 'hide_next_prev',
          'type'  => 'switcher',
          'title' => esc_html__('Hide Controls', 'glazov'),
          'label' => esc_html__('Yes, Please do it.', 'glazov'),
          'dependency'   => array('gallery_layout', '==', 'gallery_kenburns'),
        ),
      ),
    ),
    // Enable & Disable
  ),
);

// -----------------------------------------
// Homepage Metabox Options                    -
// -----------------------------------------
$options[]    = array(
  'id'        => 'page_gallery_metabox',
  'title'     => esc_html__('Home Page Metas', 'glazov'),
  'post_type' => array('page'),
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(
    // Title Section
    array(
      'name'  => 'page_gallery_section',
      'title' => esc_html__('Layout', 'glazov'),
      'icon'  => 'fa fa-minus',
      // Fields Start
      'fields' => array(
        array(
          'id'           => 'gallery_layout',
          'type'         => 'image_select',
          'options'      => array(
            'home_thumb_slider'     => GLAZOV_CS_IMAGES .'/home-thumb-slider.jpg',
            'home_slider_fullpage'     => GLAZOV_CS_IMAGES .'/home-slider-full-page.jpg',
            'horizontal_slider' => GLAZOV_CS_IMAGES .'/horizontal_slider.jpg',
            'kenburns' => GLAZOV_CS_IMAGES .'/kenburns.jpg',
            'split_slider' => GLAZOV_CS_IMAGES .'/split_effect.jpg',
            'static_video' => GLAZOV_CS_IMAGES .'/static_video.jpg',
            'home_sliding_showcase' => GLAZOV_CS_IMAGES .'/home_sliding_showcase.jpg',
          ),
          'attributes' => array(
            'data-depend-id' => 'gallery_layout',
          ),
          'radio'     => true,
          'default'   => 'home_thumb_slider',
        ),
        // start fields
        array(
          'id'          => 'custom_title',
          'type'        => 'text',
          'title'       => esc_html__('Custom Title', 'glazov'),
          'dependency'   => array('gallery_layout', '==', 'home_sliding_showcase'),
        ),

        array(
          'id'          => 'gallery_images_for_galleries',
          'type'        => 'gallery',
          'title'       => esc_html__('Add Gallery', 'glazov'),
          'add_title'   => esc_html__('Add Image(s)', 'glazov'),
          'edit_title'  => esc_html__('Edit Image(s)', 'glazov'),
          'clear_title' => esc_html__('Clear Image(s)', 'glazov'),
        ),
        array(
          'id'          => 'gallery_images_for_galleries_sec',
          'type'        => 'gallery',
          'title'       => esc_html__('Add Gallery (Secondary)', 'glazov'),
          'add_title'   => esc_html__('Add Image(s)', 'glazov'),
          'edit_title'  => esc_html__('Edit Image(s)', 'glazov'),
          'clear_title' => esc_html__('Clear Image(s)', 'glazov'),
          'dependency'   => array('gallery_layout', '==', 'home_sliding_showcase'),
        ),
        array(
          'id'          => 'follow_title',
          'type'        => 'text',
          'title'       => esc_html__('Follow Title', 'glazov'),
          'dependency'   => array('gallery_layout', '==', 'home_sliding_showcase'),
        ),
         array(
            'id'                  => 'social_icons_slide',
            'type'                => 'group',
            'title'    => esc_html__('Social Icons', 'glazov'),
            'button_title'       => 'Add New Icon',
            'accordion_title'    => 'Adding New Icon',
            'dependency'   => array('gallery_layout', '==', 'home_sliding_showcase'),
            'accordion'          => true,
            'fields'              => array(
              array(
                'id'              => 'icon',
                'type'            => 'icon',
                'title'           => esc_html__('Select your icon', 'glazov'),
              ),
              array(
                'id'              => 'icon_link',
                'type'            => 'text',
                'title'           => esc_html__('Enter your icon link', 'glazov'),
              ),
              array(
                'id'    => 'social_open_link',
                'type'  => 'switcher',
                'title' => esc_html__('Open New Tab?', 'glazov'),
                'label' => esc_html__('Yes, Please do it.', 'glazov'),
              ),

            ),

          ),

        array(
          'id'              => 'gallery_videos',
          'title'           => esc_html__('Gallery Videos', 'glazov'),
          'desc'            => esc_html__('Each group is each gallery image', 'glazov'),
          'type'            => 'group',
          'fields'          => array(
            array(
                'id'    => 'video_source',
                'type'  => 'text',
                'title' => esc_html__('Video Source', 'glazov'),
                'info' => esc_html__('Add youtube video url', 'glazov'),
              ),
              array(
                'id'    => 'video_poster',
                'type'  => 'image',
                'title' => esc_html__('Video Poster', 'glazov'),
              ),
              array(
              'id'    => 'video_information_left',
              'type'  => 'textarea',
              'title' => esc_html__('Project Information', 'glazov'),
              'shortcode' => true,
              'after'       => 'Helpful shortcodes: [glazov_project_info] or any shortcode.',
            ),
              array(
              'id'          => 'video_proj_cat',
              'type'        => 'textarea',
              'title'       => esc_html__('Project Category', 'glazov'),
              'shortcode' => true,
              'desc'        => esc_html__('Enter Project category shortcode here ', 'glazov'),
            ),
          ),
          'accordion'       => true,
          'button_title'    => esc_html__('Add New Video', 'glazov'),
          'accordion_title' => esc_html__('New Video', 'glazov'),
          'dependency'   => array('gallery_layout', '==', 'static_video'),
        ),
        // end fields
      ), // End : Fields
    ), // Title Section
    // Enable & Disable
    array(
      'name'  => 'gallery_hide_show_section',
      'title' => esc_html__('Enable & Disable', 'glazov'),
      'icon'  => 'fa fa-toggle-on',
      'fields' => array(

        array(
          'type'    => 'notice',
          'wrap_class' => 'hide-title',
          'class'   => 'info cs-vt-heading',
          'content' => esc_html__('Slider Controls', 'glazov')
        ),
        array(
          'id'    => 'hide_zoom_icon',
          'type'  => 'switcher',
          'title' => esc_html__('Hide Zoom Icon', 'glazov'),
          'label' => esc_html__('Yes, Please do it.', 'glazov'),
          'dependency'   => array('gallery_layout', 'any', 'kenburns,home_slider_fullpage,home_thumb_slider,horizontal_slider,static_video'),
        ),
        array(
          'id'    => 'hide_next_prev',
          'type'  => 'switcher',
          'title' => esc_html__('Hide Controls', 'glazov'),
          'label' => esc_html__('Yes, Please do it.', 'glazov'),
          'dependency'   => array('gallery_layout', 'any', 'kenburns,home_slider_fullpage,home_thumb_slider,static_video'),
        ),
        array(
          'id'    => 'hide_project_info',
          'type'  => 'switcher',
          'title' => esc_html__('Hide Project Info?', 'glazov'),
          'label' => esc_html__('Yes, Please do it.', 'glazov'),
          'dependency'   => array('gallery_layout', 'any', 'kenburns,home_slider_fullpage,home_thumb_slider,static_video'),
        ),
        array(
          'id'    => 'hide_share',
          'type'  => 'switcher',
          'title' => esc_html__('Hide Share?', 'glazov'),
          'label' => esc_html__('Yes, Please do it.', 'glazov'),
          'dependency'   => array('gallery_layout', 'any', 'home_sliding_showcase,kenburns,home_slider_fullpage,home_thumb_slider,static_video'),
        ),
      ),
    ),
    // Enable & Disable
  ),
);

// -----------------------------------------
// Portfolio Metabox Options                    -
// -----------------------------------------
$options[]    = array(
  'id'        => 'portfolio_single_metabox',
  'title'     => esc_html__('Portfolio Meta', 'glazov'),
  'post_type' => array('portfolio'),
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    // Portfolio Layout
    array(
      'name'  => 'portfolio_layout_section',
      'title' => esc_html__('Layout', 'glazov'),
      'icon'  => 'fa fa-minus',

      // Fields Start
      'fields' => array(

        array(
          'id'           => 'portfolio_single_layout',
          'type'         => 'image_select',
          'options'      => array(
            'portfolio_grid'    => GLAZOV_CS_IMAGES . '/Portfolio-single-grid.jpg',
            'portfolio_masonry'    => GLAZOV_CS_IMAGES . '/Portfolio-Single-Masonry.jpg',
            'portfolio_stack'    => GLAZOV_CS_IMAGES . '/portfolio-stack.jpg',
            'portfolio_horizontal'    => GLAZOV_CS_IMAGES . '/portfolio-horizontal.jpg',
            'portfolio_stack_with_sidebar'    => GLAZOV_CS_IMAGES . '/portfolio-stack-with-sidebar.jpg',
          ),
          'attributes' => array(
            'data-depend-id' => 'portfolio_single_layout',
          ),
          'radio'     => true,
          'default'   => 'portfolio_grid',
        ),
        array(
          'id'        => 'portfolio_single_width',
          'type'      => 'select',
          'title'     => esc_html__('Layout', 'glazov'),
          'options'   => array(
            'fullwidth'    => 'Fullwidth',
            'contained' => 'Contained',
          ),
          'dependency'   => array('portfolio_single_layout', 'any', 'portfolio_masonry,portfolio_stack,portfolio_grid'),
        ),
        array(
          'id'        => 'portfolio_single_column',
          'type'      => 'select',
          'title'     => esc_html__('Portfolio Column', 'glazov'),
          'options'   => array(
            '3'    => esc_html__('Three Columns', 'glazov'),
            '4'    => esc_html__('Four Columns', 'glazov'),
            '5'    => esc_html__('Five Columns', 'glazov'),
          ),
          'dependency'   => array('portfolio_single_layout', 'any', 'portfolio_masonry,portfolio_grid'),
        ),
        array(
          'id'        => 'portfolio_single_sidebar',
          'type'      => 'select',
          'title'     => esc_html__('Sidebar Position', 'glazov'),
          'options'   => array(
            'left'    => 'Left',
            'right' => 'Right',
          ),
          'dependency'   => array('portfolio_single_layout', 'any', 'portfolio_horizontal,portfolio_stack_with_sidebar'),
        ),
        array(
          'id'        => 'portfolio_single_sidebar_type',
          'type'      => 'select',
          'title'     => esc_html__('Sidebar Type', 'glazov'),
          'options'   => array(
            'default'    => 'Default',
            'floating' => 'Floating',
            'sticky' => 'Sticky',
          ),
          'dependency'   => array('portfolio_single_layout', '==', 'portfolio_stack_with_sidebar'),
        ),
        // end fields
      ), // End : Fields
    ), // Portfolio Layout
    // Portfolio Images
    array(
      'name'  => 'portfolio_image_section',
      'title' => esc_html__('Images', 'glazov'),
      'icon'  => 'fa fa-image',

      // Gallery Images
      'fields' => array(

        array(
          'id'          => 'port_single_images',
          'type'        => 'gallery',
          'title'       => esc_html__('Add Gallery', 'glazov'),
          'add_title'   => esc_html__('Add Image(s)', 'glazov'),
          'edit_title'  => esc_html__('Edit Image(s)', 'glazov'),
          'clear_title' => esc_html__('Clear Image(s)', 'glazov'),
        ),

      ), // End : Fields
    ), //Gallery Images

    // Portfolio Info
    array(
      'name'  => 'portfolio_info_section',
      'title' => esc_html__('Portfolio Informations', 'glazov'),
      'icon'  => 'fa fa-info',
      'fields' => array(

        array(
          'id'          => 'portfolio_title',
          'type'        => 'text',
          'title'       => esc_html__('Portfolio Title', 'glazov'),
        ),
        array(
          'id'          => 'portfolio_sub_title',
          'type'        => 'text',
          'dependency'   => array('portfolio_single_layout', 'any', 'portfolio_masonry,portfolio_grid'),
          'title'       => esc_html__('Portfolio Sub-Title', 'glazov'),
        ),
        array(
          'id'          => 'view_portfolio_txt',
          'type'        => 'text',
          'title'       => esc_html__('View Project Text', 'glazov'),
        ),
        array(
          'id'          => 'view_portfolio_link',
          'type'        => 'text',
          'title'       => esc_html__('View Project Link', 'glazov'),
        ),

        // start fields
        array(
          'id'              => 'portfolio_informations',
          'title'           => esc_html__('Informations', 'glazov'),
          'desc'            => esc_html__('Each group is each meta info', 'glazov'),
          'type'            => 'group',
          'fields'          => array(
            array(
              'id'          => 'title',
              'type'        => 'text',
              'title'       => esc_html__('Meta Title', 'glazov'),
            ),
            array(
              'id'          => 'meta_info',
              'type'        => 'textarea',
              'title'       => esc_html__('Info', 'glazov'),
              'desc'       => esc_html__('Type multiple information by separting "Enter"', 'glazov'),
            ),
            array(
              'id'          => 'info_url',
              'type'        => 'textarea',
              'title'       => esc_html__('Info URL', 'glazov'),
              'attributes' => array(
                'placeholder' => esc_html__('http://', 'glazov'),
              ),
              'desc'       => esc_html__('Type multiple information by separting "Enter" (Make equality of info and url)', 'glazov'),
            )
          ),
          'accordion'       => true,
          'button_title'    => esc_html__('Add New Info', 'glazov'),
          'accordion_title' => esc_html__('New Info', 'glazov'),
        ), // information meta
        array(
          'id'          => 'portfolio_share',
          'type'        => 'textarea',
          'title'       => esc_html__('Share Option Shortcode', 'glazov'),
          'desc'       => esc_html__('Include Portfolio Share option shortcode here.', 'glazov'),
          'shortcode'  => true,
        ),
      ),
    ),
    // Portfolio Info
  ),
);

  // -----------------------------------------
  // Page Metabox Options                    -
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'page_type_metabox',
    'title'     => esc_html__('Page Custom Options', 'glazov'),
    'post_type' => array('post', 'page', 'portfolio', 'product', 'team', 'gallery'),
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(

      // Header
      array(
        'name'  => 'header_section',
        'title' => esc_html__('Header', 'glazov'),
        'icon'  => 'fa fa-bars',
        'fields' => array(

          array(
            'id'    => 'transparency_header',
            'type'  => 'switcher',
            'title' => esc_html__('Transparent Header', 'glazov'),
            'info' => esc_html__('Use Transparent Method', 'glazov'),
          ),
          array(
            'id'    => 'transparent_menu_color',
            'type'  => 'color_picker',
            'title' => esc_html__('Menu Color', 'glazov'),
            'info' => esc_html__('Pick your menu color. This color will only apply for non-sticky header mode.', 'glazov'),
            'dependency'   => array('transparency_header', '==', 'true'),
          ),
          array(
            'id'    => 'transparent_menu_hover_color',
            'type'  => 'color_picker',
            'title' => esc_html__('Menu Hover Color', 'glazov'),
            'info' => esc_html__('Pick your menu hover color. This color will only apply for non-sticky header mode.', 'glazov'),
            'dependency'   => array('transparency_header', '==', 'true'),
          ),
          array(
            'id'    => 'full_page',
            'type'  => 'switcher',
            'title' => esc_html__('Full Page', 'glazov'),
            'info' => esc_html__('Use Full Page', 'glazov'),
          ),
          array(
            'id'             => 'menu_style',
            'type'           => 'select',
            'title'          => esc_html__('Choose Menu Style', 'glazov'),
            'desc'          => esc_html__('Choose custom menus for this page.', 'glazov'),
            'options'   => array(
              'style-one' => 'Style One',
              'style-two'   => 'Style Two',
            ),
            'default_option' => esc_html__('Default Menu', 'glazov'),
          ),
          array(
            'id'             => 'choose_menu',
            'type'           => 'select',
            'title'          => esc_html__('Choose Menu', 'glazov'),
            'desc'          => esc_html__('Choose custom menus for this page.', 'glazov'),
            'options'        => 'menus',
            'default_option' => esc_html__('Select your menu', 'glazov'),
          ),

          // Enable & Disable
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Enable & Disable', 'glazov'),
            'dependency' => array('header_design', '!=', 'default'),
          ),
          array(
            'id'    => 'sticky_header',
            'type'  => 'switcher',
            'title' => esc_html__('Sticky Header', 'glazov'),
            'info' => esc_html__('Turn On if you want your naviagtion bar on sticky.', 'glazov'),
            'default' => true,
          ),

        ),
      ),
      // Header

      // Banner & Title Area
      array(
        'name'  => 'banner_title_section',
        'title' => esc_html__('Banner & Title Area', 'glazov'),
        'icon'  => 'fa fa-bullhorn',
        'fields' => array(

          array(
            'id'        => 'banner_type',
            'type'      => 'select',
            'title'     => esc_html__('Choose Banner Type', 'glazov'),
            'options'   => array(
              'default-title'    => 'Default Title',
              'hide-title-area'   => 'Hide Title/Banner Area',
            ),
          ),
          array(
            'id'    => 'page_custom_title',
            'type'  => 'text',
            'title' => esc_html__('Custom Title', 'glazov'),
            'attributes' => array(
              'placeholder' => esc_html__('Enter your custom title...', 'glazov'),
            ),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'        => 'title_area_height',
            'type'      => 'select',
            'title'     => esc_html__('Title Area Height', 'glazov'),
            'options'   => array(
              'default-height' => esc_html__('Default Height', 'glazov'),
              'height-700' => esc_html__('700', 'glazov'),
              'height-600' => esc_html__('600', 'glazov'),
              'height-400' => esc_html__('400', 'glazov'),
              'height-200' => esc_html__('200', 'glazov'),
            ),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'title_top_spacings',
            'type'  => 'text',
            'title' => esc_html__('Top Spacing', 'glazov'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('banner_type|title_area_spacings', '==|==', 'default-title|padding-custom'),
          ),
          array(
            'id'    => 'title_bottom_spacings',
            'type'  => 'text',
            'title' => esc_html__('Bottom Spacing', 'glazov'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('banner_type|title_area_spacings', '==|==', 'default-title|padding-custom'),
          ),
          array(
            'id'    => 'title_area_bg',
            'type'  => 'background',
            'title' => esc_html__('Background', 'glazov'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'titlebar_bg_overlay_color',
            'type'  => 'color_picker',
            'title' => esc_html__('Overlay Color', 'glazov'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),

        ),
      ),
      // Banner & Title Area

      // Content Section
      array(
        'name'  => 'page_content_options',
        'title' => esc_html__('Content Options', 'glazov'),
        'icon'  => 'fa fa-file',

        'fields' => array(

          array(
            'id'        => 'content_spacings',
            'type'      => 'select',
            'title'     => esc_html__('Content Spacings', 'glazov'),
            'options'   => array(
              'padding-none' => esc_html__('Default Spacing', 'glazov'),
              'padding-xs' => esc_html__('Extra Small Padding', 'glazov'),
              'padding-sm' => esc_html__('Small Padding', 'glazov'),
              'padding-md' => esc_html__('Medium Padding', 'glazov'),
              'padding-lg' => esc_html__('Large Padding', 'glazov'),
              'padding-xl' => esc_html__('Extra Large Padding', 'glazov'),
              'padding-cnt-no' => esc_html__('No Padding', 'glazov'),
              'padding-custom' => esc_html__('Custom Padding', 'glazov'),
            ),
            'desc' => esc_html__('Content area top and bottom spacings.', 'glazov'),
          ),
          array(
            'id'    => 'content_top_spacings',
            'type'  => 'text',
            'title' => esc_html__('Top Spacing', 'glazov'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('content_spacings', '==', 'padding-custom'),
          ),
          array(
            'id'    => 'content_bottom_spacings',
            'type'  => 'text',
            'title' => esc_html__('Bottom Spacing', 'glazov'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('content_spacings', '==', 'padding-custom'),
          ),

        ), // End Fields
      ), // Content Section

      // Enable & Disable
      array(
        'name'  => 'hide_show_section',
        'title' => esc_html__('Enable & Disable', 'glazov'),
        'icon'  => 'fa fa-toggle-on',
        'fields' => array(

          array(
            'id'    => 'hide_header',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Header', 'glazov'),
            'label' => esc_html__('Yes, Please do it.', 'glazov'),
          ),
          array(
            'id'    => 'hide_footer',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Footer', 'glazov'),
            'label' => esc_html__('Yes, Please do it.', 'glazov'),
          ),
          array(
            'id'    => 'hide_copyright',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Copyright Bar', 'glazov'),
            'label' => esc_html__('Yes, Please do it.', 'glazov'),
          ),

        ),
      ),
      // Enable & Disable

    ),
  );

 // -----------------------------------------
  // Featured Image Options
  // -----------------------------------------

  $options[]    = array(
    'id'        => 'portfolio_featurd_image',
    'title'     => esc_html__('Featured Image', 'glazov'),
    'post_type' => 'portfolio',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(
        array(
          'name'  => 'page_layout_section',
          'fields' => array(
            array(
              'id'        => 'featured_image_masonry',
              'type'      => 'image',
              'title'   => esc_html__('Masonry Featurd Image', 'glazov'),
              'info' => esc_html__( 'This featured image is used for portfolio style Masonry', 'glazov' ),
            ),
            array(
              'type' => 'select',
              'title' => esc_html__( 'Portfolio Masonry Image Size', 'glazov' ),
              'options' => array(
                'default'     => 'Default',
                '2x-width'      => '2X Width',
                '2x-height'      => '2X Height',
                '2x-width-height' => '2X Width & Height',
              ),
              'id' => 'masonry_img_size',
              'info' => esc_html__( 'Select your masonry image size.(2X Width And 2X Width & Height will only apply for portfolio style three )', 'glazov' ),
            ),
          ), // End Fields
        ), // Content Section
      ),
    ); // featured image

  // -----------------------------------------
  // Page Layout
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'page_layout_options',
    'title'     => esc_html__('Page Layout', 'glazov'),
    'post_type' => 'page',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'page_layout_section',
        'fields' => array(

          array(
            'id'        => 'page_layout',
            'type'      => 'image_select',
            'options'   => array(
              'full-width'    => GLAZOV_CS_IMAGES . '/page-1.png',
              'extra-width'   => GLAZOV_CS_IMAGES . '/page-2.png',
              'left-sidebar'  => GLAZOV_CS_IMAGES . '/page-3.png',
              'right-sidebar' => GLAZOV_CS_IMAGES . '/page-4.png',
            ),
            'attributes' => array(
              'data-depend-id' => 'page_layout',
            ),
            'default'    => 'full-width',
            'radio'      => true,
            'wrap_class' => 'text-center',
          ),
          array(
            'id'            => 'page_sidebar_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'glazov'),
            'options'        => glazov_vt_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'glazov'),
            'dependency'   => array('page_layout', 'any', 'left-sidebar,right-sidebar'),
          ),
          array(
            'id'             => 'post_page_sidebar_type',
            'type'           => 'switcher',
            'title'          => esc_html__('Floating Sidebar', 'glazov'),
            'info'          => esc_html__('Enable this if you need floating sidebar', 'glazov'),
            'dependency'   => array('page_layout', 'any', 'right-sidebar,left-sidebar'),
          ),

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Testimonial
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'testimonial_options',
    'title'     => esc_html__('Testimonial Client', 'glazov'),
    'post_type' => 'testimonial',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'testimonial_option_section',
        'fields' => array(

          array(
            'id'      => 'testi_name',
            'type'    => 'text',
            'title'   => esc_html__('Name', 'glazov'),
            'info'    => esc_html__('Enter client name', 'glazov'),
          ),
          array(
            'id'      => 'testi_pro',
            'type'    => 'text',
            'title'   => esc_html__('Profession', 'glazov'),
            'info'    => esc_html__('Enter client profession', 'glazov'),
          ),

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Team
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'team_options',
    'title'     => esc_html__('Job Position', 'glazov'),
    'post_type' => 'team',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'team_option_section',
        'fields' => array(

          array(
            'id'      => 'team_job_position',
            'type'    => 'text',
            'attributes' => array(
              'placeholder' => esc_html__('Eg : Financial Manager', 'glazov'),
            ),
            'info'    => esc_html__('Enter this employee job position, in your company.', 'glazov'),
          ),
          array(
            'id'      => 'team_custom_link',
            'type'    => 'text',
            'title'    => esc_html__('Custom Link', 'glazov'),
            'attributes' => array(
              'placeholder' => esc_html__('http://', 'glazov'),
            ),
            'info'    => esc_html__('Enter your custom link, if you don\'t want to show this page.', 'glazov'),
          ),
          // Start fields
          array(
            'id'                  => 'social_icons',
            'type'                => 'group',
            'title'    => esc_html__('Social Icons', 'glazov'),
            'button_title'       => 'Add New Icon',
            'accordion_title'    => 'Adding New Icon',
            'accordion'          => true,
            'fields'              => array(
              array(
                'id'              => 'icon',
                'type'            => 'icon',
                'title'           => esc_html__('Select your icon', 'glazov'),
              ),
              array(
                'id'              => 'icon_link',
                'type'            => 'text',
                'title'           => esc_html__('Enter your icon link', 'glazov'),
              ),
              array(
                'id'    => 'social_open_link',
                'type'  => 'switcher',
                'title' => esc_html__('Open New Tab?', 'glazov'),
                'label' => esc_html__('Yes, Please do it.', 'glazov'),
              ),

            ),

          ),

        ),
      ),

    ),
  );

  return $options;

}
add_filter( 'cs_metabox_options', 'glazov_vt_metabox_options' );
