<?php
/*
 * All customizer related options for Glazov theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

if( ! function_exists( 'glazov_vt_customizer' ) ) {
  function glazov_vt_customizer( $options ) {

	$options        = array(); // remove old options

	// Header Color
	$options[]      = array(
	  'name'        => 'header_color_section',
	  'title'       => esc_html__('01. Header Colors', 'glazov'),
	  'sections'    => array(

	  	array(
	      'name'          => 'header_heading_section',
	      'title'         => esc_html__('Header Section', 'glazov'),
	      'settings'      => array(

	      	// Fields Start
					array(
						'name'      => 'header_bg_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Header Background Color', 'glazov'),
						),
					),
					array(
						'name'      => 'txt_logo_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Text Logo Color', 'glazov'),
						),
					),
					array(
						'name'      => 'txt_logo_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Text Logo Hover Color', 'glazov'),
						),
					),
			    // Fields End

      	)
      ),

      array(
	      'name'          => 'menu_style_one',
	      'title'         => esc_html__('Default Menu', 'glazov'),
	      'settings'      => array(

			    // Fields Start
					array(
						'name'          => 'header_main_menu_heading',
						'control'       => array(
							'type'        => 'cs_field',
							'options'     => array(
								'type'      => 'notice',
								'class'     => 'info',
								'content'   => esc_html__('Main Menu Colors', 'glazov'),
							),
						),
					),
					array(
						'name'      => 'header_link_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Link Color', 'glazov'),
						),
					),
					array(
						'name'      => 'header_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Link Hover Color', 'glazov'),
						),
					),

					// Sub Menu Color
					array(
						'name'          => 'header_submenu_heading',
						'control'       => array(
							'type'        => 'cs_field',
							'options'     => array(
								'type'      => 'notice',
								'class'     => 'info',
								'content'   => esc_html__('Sub-Menu Colors', 'glazov'),
							),
						),
					),
					array(
						'name'      => 'submenu_bg_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Background Color', 'glazov'),
						),
					),
					array(
						'name'      => 'submenu_border_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Border Color', 'glazov'),
						),
					),
					array(
						'name'      => 'submenu_link_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Link Color', 'glazov'),
						),
					),
					array(
						'name'      => 'submenu_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Link Hover Color', 'glazov'),
						),
					),
			    // Fields End
			  )
			),

			array(
	      'name'          => 'menu_style_two',
	      'title'         => esc_html__('Overlay Menu', 'glazov'),
	      'settings'      => array(

			    // Fields Start
	      	array(
						'name'          => 'menu_heading_two',
						'control'       => array(
							'type'        => 'cs_field',
							'options'     => array(
								'type'      => 'notice',
								'class'     => 'info',
								'content'   => esc_html__('Menu Colors', 'glazov'),
							),
						),
					),
			    array(
						'name'      => 'menu_color_two',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Menu Color', 'glazov'),
						),
					),
					array(
						'name'      => 'menu_hover_color_two',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Menu hover Color', 'glazov'),
						),
					),
					array(
						'name'      => 'sub_menu_color_two',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Sub-Menu Color', 'glazov'),
						),
					),
					array(
						'name'      => 'sub_menu_hover_color_two',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Sub-Menu hover Color', 'glazov'),
						),
					),

					array(
						'name'      => 'menu_bg_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Menu Background Color', 'glazov'),
						),
					),
					array(
						'name'      => 'menu_copyright_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Menu Section Copyright Text Color', 'glazov'),
						),
					),
					array(
						'name'      => 'menu_copyright_link_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Menu Section Copyright Link Color', 'glazov'),
						),
					),
					array(
						'name'      => 'menu_copyright_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Menu Section Copyright Link Hover Color', 'glazov'),
						),
					),

					array(
						'name'          => 'menu_btn_two',
						'control'       => array(
							'type'        => 'cs_field',
							'options'     => array(
								'type'      => 'notice',
								'class'     => 'info',
								'content'   => esc_html__('Menu Toggle Colors', 'glazov'),
							),
						),
					),
					array(
						'name'      => 'toggle_icon_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Toggle Button Line Color', 'glazov'),
						),
					),
					array(
						'name'      => 'toggle_bg_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Toggle Button Background Color', 'glazov'),
						),
					),
					array(
						'name'      => 'toggle_bg_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Toggle Button Background Hover Color', 'glazov'),
						),
					),
			    // Fields End
			  )
			),

	  )
	);
	// Header Color

	// Title Bar Color
	$options[]      = array(
	  'name'        => 'titlebar_section',
	  'title'       => esc_html__('02. Title Bar Colors', 'glazov'),
    'settings'      => array(

    	// Fields Start
    	array(
				'name'          => 'titlebar_colors_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('<h2 style="margin: 0;text-align: center;">Title Colors</h2> <br /> This is common settings, if this settings not affect in your page. Please check your page metabox. You may set default settings there.', 'glazov'),
					),
				),
			),
    	array(
				'name'      => 'titlebar_title_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Title Color', 'glazov'),
				),
			),
	    // Fields End

	  )
	);
	// Title Bar Color

	// Content Color
	$options[]      = array(
	  'name'        => 'content_section',
	  'title'       => esc_html__('03. Content Colors', 'glazov'),
	  'description' => esc_html__('This is all about content area text and heading colors.', 'glazov'),
	  'sections'    => array(

	  	array(
	      'name'          => 'content_text_section',
	      'title'         => esc_html__('Content Text', 'glazov'),
	      'settings'      => array(

			    // Fields Start
			    array(
						'name'      => 'body_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Body & Content Color', 'glazov'),
						),
					),
					array(
						'name'      => 'body_links_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Body Links Color', 'glazov'),
						),
					),
					array(
						'name'      => 'body_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Body Links Hover Color', 'glazov'),
						),
					),
					array(
						'name'      => 'sidebar_content_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Sidebar Content Color', 'glazov'),
						),
					),
					array(
						'name'      => 'sidebar_link_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Sidebar Link Color', 'glazov'),
						),
					),
					array(
						'name'      => 'sidebar_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Sidebar Link Hover Color', 'glazov'),
						),
					),
			    // Fields End
			  )
			),

			// Text Colors Section
			array(
	      'name'          => 'content_heading_section',
	      'title'         => esc_html__('Headings', 'glazov'),
	      'settings'      => array(

	      	// Fields Start
					array(
						'name'      => 'content_heading_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Content Heading Color', 'glazov'),
						),
					),
	      	array(
						'name'      => 'sidebar_heading_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Sidebar Heading Color', 'glazov'),
						),
					),
			    // Fields End

      	)
      ),
      // Transparent Button Colors Section
			array(
	      'name'          => 'button_colors_section',
	      'title'         => esc_html__('Buttons', 'glazov'),
	      'settings'      => array(

	      	// Fields Start
	      	array(
						'name'          => 'transparent_btn_colors',
						'control'       => array(
							'type'        => 'cs_field',
							'options'     => array(
								'type'      => 'notice',
								'class'     => 'info',
								'content'   => esc_html__('Transparent Button Colors', 'glazov'),
							),
						),
					),
					array(
						'name'      => 'btn_txt_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Button Text Color', 'glazov'),
						),
					),
					array(
						'name'      => 'btn_txt_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Button Text Hover Color', 'glazov'),
						),
					),
	      	array(
						'name'      => 'btn_bg_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Button Background Color', 'glazov'),
						),
					),
					array(
						'name'      => 'btn_bg_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Button Background Hover Color', 'glazov'),
						),
					),
					array(
						'name'      => 'btn_border_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Button Border Color', 'glazov'),
						),
					),
					array(
						'name'      => 'btn_border_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Button Border Hover Color', 'glazov'),
						),
					),

      		// Filled Button Colors Section
      		array(
						'name'          => 'filled_btn_colors',
						'control'       => array(
							'type'        => 'cs_field',
							'options'     => array(
								'type'      => 'notice',
								'class'     => 'info',
								'content'   => esc_html__('Filled Button Colors', 'glazov'),
							),
						),
					),
					array(
						'name'      => 'fill_btn_txt_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Button Text Color', 'glazov'),
						),
					),
					array(
						'name'      => 'fill_btn_txt_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Button Text Hover Color', 'glazov'),
						),
					),
	      	array(
						'name'      => 'fill_btn_bg_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Button Background Color', 'glazov'),
						),
					),
					array(
						'name'      => 'fill_btn_bg_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Button Background Hover Color', 'glazov'),
						),
					),
					array(
						'name'      => 'fill_btn_border_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Button Border Color', 'glazov'),
						),
					),
					array(
						'name'      => 'fill_btn_border_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Button Border Hover Color', 'glazov'),
						),
					),
			    // Fields End

      	)
      ),

	  )
	);
	// Content Color

	// Footer Color
	$options[]      = array(
	  'name'        => 'footer_section',
	  'title'       => esc_html__('04. Footer Colors', 'glazov'),
	  'description' => esc_html__('This is all about footer settings. Make sure you\'ve enabled your needed section at : Glazov > Theme Options > Footer ', 'glazov'),
	  'sections'    => array(

			// Footer Widgets Block
	  	array(
	      'name'          => 'footer_widget_section',
	      'title'         => esc_html__('Widget Block', 'glazov'),
	      'settings'      => array(

			    // Fields Start
					array(
			      'name'          => 'footer_widget_color_notice',
			      'control'       => array(
			        'type'        => 'cs_field',
			        'options'     => array(
			          'type'      => 'notice',
			          'class'     => 'info',
			          'content'   => esc_html__('Content Colors', 'glazov'),
			        ),
			      ),
			    ),
					array(
						'name'      => 'footer_heading_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Widget Heading Color', 'glazov'),
						),
					),
					array(
						'name'      => 'footer_text_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Widget Text Color', 'glazov'),
						),
					),
					array(
						'name'      => 'footer_link_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Widget Link Color', 'glazov'),
						),
					),
					array(
						'name'      => 'footer_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Widget Link Hover Color', 'glazov'),
						),
					),
					array(
						'name'      => 'footer_bg_color',
						'default'   => '#151515',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Background Color', 'glazov'),
						),
					),
			    // Fields End
			  )
			),
			// Footer Widgets Block

			// Footer Copyright Block
	  	array(
	      'name'          => 'footer_copyright_section',
	      'title'         => esc_html__('Copyright Block', 'glazov'),
	      'settings'      => array(

			    // Fields Start
			    array(
			      'name'          => 'footer_copyright_active',
			      'control'       => array(
			        'type'        => 'cs_field',
			        'options'     => array(
			          'type'      => 'notice',
			          'class'     => 'info',
			          'content'   => esc_html__('Make sure you\'ve enabled copyright block in : <br /> <strong>Glazov > Theme Options > Footer > Copyright Bar : Enable Copyright Block</strong>', 'glazov'),
			        ),
			      ),
			    ),
					array(
						'name'      => 'copyright_text_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Text Color', 'glazov'),
						),
					),
					array(
						'name'      => 'copyright_link_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Link Color', 'glazov'),
						),
					),
					array(
						'name'      => 'copyright_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Link Hover Color', 'glazov'),
						),
					),
					array(
						'name'      => 'copyright_bg_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Background Color', 'glazov'),
						),
					),

			  )
			),
			// Footer Copyright Block

	  )
	);
	// Footer Color

	return $options;

  }
  add_filter( 'cs_customize_options', 'glazov_vt_customizer' );
}
