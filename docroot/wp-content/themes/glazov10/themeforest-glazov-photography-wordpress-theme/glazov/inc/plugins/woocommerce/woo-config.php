<?php
/*
 * All WooCommerce Related Functions
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

if ( class_exists( 'WooCommerce' ) ) {

	/**
	 * Remove each style one by one
	 * https://docs.woothemes.com/document/disable-the-default-stylesheet/
	 */

	// Remove Shop Page Title
	add_filter( 'woocommerce_show_page_title' , 'glazov_hide_page_title' );
	function glazov_hide_page_title() {
		return false;
	}

	// WooCommerce Products per Page Limit
	add_filter( 'loop_shop_per_page', 'glazov_product_limit', 20 );
	if ( ! function_exists('glazov_product_limit') ) {
	  function glazov_product_limit() {
	    $woo_limit = cs_get_option('theme_woo_limit');
	    $woo_limit = $woo_limit ? $woo_limit : '12';
	    return $woo_limit;
	  }
	}

	// Single Product Page - Related Products Limit
	add_filter( 'woocommerce_output_related_products_args', 'glazov_related_products_args' );
  function glazov_related_products_args( $args ) {
  	$woo_related_limit = cs_get_option('woo_related_limit');
  	if ($woo_related_limit) {
			$args['posts_per_page'] = (int)$woo_related_limit; // 4 related products
		} else {
			$args['posts_per_page'] = 4; // 4 related products
		}
		return $args;
	}

	// Remove Related Products section
  $woo_single_related = cs_get_option('woo_single_related');
  if($woo_single_related) {
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
  }

  // Added New action hook for cross sell(You May Also Like Section)
	if ( ! function_exists( 'glazov_woocommerce_cross_sell_display' ) ) {

		function glazov_woocommerce_cross_sell_display( $limit = 2, $columns = 2, $orderby = 'rand', $order = 'desc' ) {
			global $woocommerce_loop;

			if ( is_checkout() ) {
				return;
			}
			// Get visible cross sells then sort them at random.
			$cross_sells                 = array_filter( array_map( 'wc_get_product', WC()->cart->get_cross_sells() ), 'wc_products_array_filter_visible' );
			$woocommerce_loop['name']    = 'cross-sells';
			$woocommerce_loop['columns'] = apply_filters( 'woocommerce_cross_sells_columns', $columns );

			// Handle orderby and limit results.
			$orderby     = apply_filters( 'woocommerce_cross_sells_orderby', $orderby );
			$cross_sells = wc_products_array_orderby( $cross_sells, $orderby, $order );
			$limit       = apply_filters( 'woocommerce_cross_sells_total', $limit );
			$cross_sells = $limit > 0 ? array_slice( $cross_sells, 0, $limit ) : $cross_sells;

			wc_get_template( 'cart/cross-sells.php', array(
				'cross_sells'    => $cross_sells,

				// Not used now, but used in previous version of up-sells.php.
				'posts_per_page' => $limit,
				'orderby'        => $orderby,
				'columns'        => $columns,
			) );
		}
	}
	add_action( 'glazov_woocommerce_cross_sell', 'glazov_woocommerce_cross_sell_display', 10 );

	// Remove You May Also Like section
	remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
  $woo_single_upsell = cs_get_option('woo_single_upsell');
  if($woo_single_upsell) {
		remove_action( 'glazov_woocommerce_cross_sell', 'glazov_woocommerce_cross_sell_display', 10 );
	}

  // Removed product image function and wrap image and add to cart button in a div class named woo-prdt-img
	remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
	function glazov_woocommerce_template_loop_product_link_open() {
		echo '<div class="product-wrap"><a href="' . esc_url(get_the_permalink()) . '" class="woocommerce-LoopProduct-link">';
	}
	add_action( 'woocommerce_before_shop_loop_item', 'glazov_woocommerce_template_loop_product_link_open', 10 );

	// Wrap Product Image in div
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
	remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

	// Removed woocommerce_template_loop_product_link_close and added close div in that function
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
	function glazov_woocommerce_template_loop_product_link_close() {
		echo '</div>';
	}
	add_action( 'woocommerce_after_shop_loop_item', 'glazov_woocommerce_template_loop_product_link_close', 5 );

	add_action( 'woocommerce_before_shop_loop_item_title', function($args = array()){
    echo '</a><div class="product-image-wrap">';
    echo woocommerce_get_product_thumbnail();
    global $product;
				if ( $product ) {
					$defaults = array(
						'quantity' => 1,
						'class'    => implode( ' ', array_filter( array(
								'button',
								'product_type_' . $product->get_type(),
								$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
								$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
						) ) ),
					);

					$args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );

					wc_get_template( 'loop/add-to-cart.php', $args );
				}
	}, 9 );
	add_action( 'woocommerce_before_shop_loop_item_title', function(){
	    echo '</div>';
	    echo '<h3><a href="' . esc_url(get_the_permalink()) . '">' . esc_attr(get_the_title()) . '</a></h3>';
	}, 11 );

	// Define image sizes
	function glazov_woo_image_dimensions() {
		global $pagenow;

		if ( ! isset( $_GET['activated'] ) || $pagenow != 'themes.php' ) {
			return;
		}
  	$catalog = array(
			'width' 	=> '442',
			'height'	=> '330',
			'crop'		=> 1
		);
		$single = array(
			'width' 	=> '992',
			'height'	=> '768',
			'crop'		=> 1
		);
		$thumbnail = array(
			'width' 	=> '75',
			'height'	=> '80',
			'crop'		=> 1
		);
		// Image sizes
		update_option( 'shop_catalog_image_size', $catalog ); // Product category thumbs
		update_option( 'shop_single_image_size', $single ); // Single product image
		update_option( 'shop_thumbnail_image_size', $thumbnail ); // Image gallery thumbs
	}
	add_action( 'after_switch_theme', 'glazov_woo_image_dimensions', 1 );

	// Single Product Single/Gallery Script
	add_action( 'after_setup_theme', 'glazov_single_product_gallery_image' );
	function glazov_single_product_gallery_image() {
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}

	// Product Column
	add_filter('loop_shop_columns', 'glazov_loop_columns');
	if ( ! function_exists('glazov_loop_columns') ) {
		function glazov_loop_columns() {
			return cs_get_option('woo_product_columns', '4');
		}
	}

} // class_exists => WooCommerce