<?php
/*
 * All Front-End Helper Functions
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/* Exclude category from blog */
if( ! function_exists( 'glazov_vt_excludeCat' ) ) {
  function glazov_vt_excludeCat($query) {
  	if ( $query->is_home ) {
  		$exclude_cat_ids = cs_get_option('theme_exclude_categories');
  		if($exclude_cat_ids) {
  			foreach( $exclude_cat_ids as $exclude_cat_id ) {
  				$exclude_from_blog[] = '-'. $exclude_cat_id;
  			}
  			$query->set('cat', implode(',', $exclude_from_blog));
  		}
  	}
  	return $query;
  }
  add_filter('pre_get_posts', 'glazov_vt_excludeCat');
}

/* Excerpt Length */
class GlazovExcerpt {

  // Default length (by WordPress)
  public static $length = 55;

  // Output: glazov_excerpt('short');
  public static $types = array(
    'short' => 25,
    'regular' => 55,
    'long' => 100
  );

  /**
   * Sets the length for the excerpt,
   * then it adds the WP filter
   * And automatically calls the_excerpt();
   *
   * @param string $new_length
   * @return void
   * @author Baylor Rae'
   */
  public static function length($new_length = 55) {
    GlazovExcerpt::$length = $new_length;
    add_filter('excerpt_length', 'GlazovExcerpt::new_length');
    GlazovExcerpt::output();
  }

  // Tells WP the new length
  public static function new_length() {
    if( isset(GlazovExcerpt::$types[GlazovExcerpt::$length]) )
      return GlazovExcerpt::$types[GlazovExcerpt::$length];
    else
      return GlazovExcerpt::$length;
  }

  // Echoes out the excerpt
  public static function output() {
    the_excerpt();
  }

}

// Custom Excerpt Length
if( ! function_exists( 'glazov_excerpt' ) ) {
  function glazov_excerpt($length = 55) {
    GlazovExcerpt::length($length);
  }
}

if ( ! function_exists( 'glazov_new_excerpt_more' ) ) {
  function glazov_new_excerpt_more( $more ) {
    return '...';
  }
  add_filter('excerpt_more', 'glazov_new_excerpt_more');
}

/* Tag Cloud Widget - Remove Inline Font Size */
if( ! function_exists( 'glazov_vt_tag_cloud' ) ) {
  function glazov_vt_tag_cloud($tag_string){
    return preg_replace("/style='font-size:.+pt;'/", '', $tag_string);
  }
  add_filter('wp_generate_tag_cloud', 'glazov_vt_tag_cloud', 10, 3);
}

/* Password Form */
if( ! function_exists( 'glazov_vt_password_form' ) ) {
  function glazov_vt_password_form( $output ) {
    $output = str_replace( 'type="submit"', 'type="submit" class=""', $output );
    return $output;
  }
  add_filter('the_password_form' , 'glazov_vt_password_form');
}

/* Maintenance Mode */
if( ! function_exists( 'glazov_vt_maintenance_mode' ) ) {
  function glazov_vt_maintenance_mode(){

    $maintenance_mode_page = cs_get_option( 'maintenance_mode_page' );

    if ( ! empty( $maintenance_mode_page ) && ! is_user_logged_in() ) {
      get_template_part('layouts/post/content', 'maintenance');
      exit;
    }

  }
  add_action( 'wp', 'glazov_vt_maintenance_mode', 1 );
}

/* Widget Layouts */
if ( ! function_exists( 'glazov_vt_footer_widgets' ) ) {
  function glazov_vt_footer_widgets() {

    $output = '';
    $footer_widget_layout = cs_get_option('footer_widget_layout');

    if( $footer_widget_layout ) {

      switch ( $footer_widget_layout ) {
        case 1: $widget = array('piece' => 1, 'class' => 'col-md-12'); break;
        case 2: $widget = array('piece' => 2, 'class' => 'col-md-6'); break;
        case 3: $widget = array('piece' => 3, 'class' => 'col-md-4'); break;
        case 4: $widget = array('piece' => 4, 'class' => 'col-md-3 col-sm-6'); break;
        case 5: $widget = array('piece' => 3, 'class' => 'col-md-3', 'layout' => 'col-md-6', 'queue' => 1); break;
        case 6: $widget = array('piece' => 3, 'class' => 'col-md-3', 'layout' => 'col-md-6', 'queue' => 2); break;
        case 7: $widget = array('piece' => 3, 'class' => 'col-md-3', 'layout' => 'col-md-6', 'queue' => 3); break;
        case 8: $widget = array('piece' => 4, 'class' => 'col-md-2', 'layout' => 'col-md-6', 'queue' => 1); break;
        case 9: $widget = array('piece' => 4, 'class' => 'col-md-2', 'layout' => 'col-md-6', 'queue' => 4); break;
        default : $widget = array('piece' => 4, 'class' => 'col-md-3'); break;
      }

      for( $i = 1; $i < $widget["piece"]+1; $i++ ) {

        $widget_class = ( isset( $widget["queue"] ) && $widget["queue"] == $i ) ? $widget["layout"] : $widget["class"];

        $output .= '<div class="'. $widget_class .'">';
        ob_start();
        if (is_active_sidebar('footer-'. $i)) {
          dynamic_sidebar( 'footer-'. $i );
        }
        $output .= ob_get_clean();
        $output .= '</div>';

      }
    }

    return $output;

  }
}

/* WP Link Pages */
if ( ! function_exists( 'glazov_wp_link_pages' ) ) {
  function glazov_wp_link_pages() {
    $defaults = array(
      'before'           => '<div class="wp-link-pages">' . esc_html__( 'Pages:', 'glazov' ),
      'after'            => '</div>',
      'link_before'      => '<span>',
      'link_after'       => '</span>',
      'next_or_number'   => 'number',
      'separator'        => ' ',
      'pagelink'         => '%',
      'echo'             => 1
    );
    wp_link_pages( $defaults );
  }
}

/* Metas */
if ( ! function_exists( 'glazov_post_metas' ) ) {
  function glazov_post_metas() {
  $metas_hide = (array) cs_get_option( 'theme_metas_hide' );
  ?>
  <h6 class="blog-meta">
    <?php
    if ( !in_array( 'date', $metas_hide ) ) { // Date Hide
    ?>
      <span class="meta-type"><?php echo get_the_date(); ?></span>
    <?php } // Date Hides
    if ( !in_array( 'author', $metas_hide ) ) { // Author Hide
    ?>
      <?php
      printf(
        '<span class="meta-type">'. esc_html__('by','glazov') .' <a href="%1$s" rel="author">%2$s</a></span>',
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        get_the_author()
      );
      ?>
    <?php }
    if ( !in_array( 'category', $metas_hide ) ) { // Category Hide
      if ( get_post_type() === 'post') {
        $category_list = get_the_category_list( ', ' );
        if ( $category_list ) {
          echo '<span class="meta-type">'. $category_list .' </span>';
        }
      }
    } // Category Hides

     ?>
  </h6>
  <?php
  }
}
// Related Post
function glazov_related_post() {
 // get the custom post type's taxonomy terms
 global $post;
 $related_post_title = cs_get_option('related_post_title');
 $related_post_limit = cs_get_option('related_post_limit');
 $related_post_order = cs_get_option('related_post_order');
 $related_post_orderby = cs_get_option('related_post_orderby');
$custom_taxterms = wp_get_object_terms( $post->ID, 'category', array('fields' => 'ids') );

$title = $related_post_title ? $related_post_title : esc_html__('Related Posts', 'glazov');
$related_post_limit = $related_post_limit ? $related_post_limit : '3';
// arguments
$args = array(
'post_type' => 'post',
'post_status' => 'publish',
'posts_per_page' => (int)$related_post_limit,
'orderby' => $related_post_orderby,
'order' => $related_post_order,
'tax_query' => array(
  array(
    'taxonomy' => 'category',
    'field' => 'id',
    'terms' => $custom_taxterms
  )
),
'post__not_in' => array ($post->ID),
);
$related_items = new WP_Query( $args );
// loop over query
if ($related_items->have_posts()) :
  echo '<div class="klst-related-post">
  <h4 class="related-post-title">'.esc_attr($title).'</h4>
  <div class="owl-carousel" data-items="3" data-margin="30" data-loop="true" data-nav="false" data-dots="false" data-auto-height="true">';
while ( $related_items->have_posts() ) : $related_items->the_post();

// Featured Image
$large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$large_image = $large_image[0];
if(class_exists('Aq_Resize')) {
  $project_img = aq_resize( $large_image, '360', '234', true );
} else {$project_img = $large_image;}
?>
<div class="item">
  <div class="blog-item">
  <?php if($project_img){ ?>
    <div class="glzv-image">
      <a href="<?php esc_url(the_permalink()); ?>"> <img src="<?php echo esc_url($project_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" /></a>
    </div>
    <?php } ?>
    <div class="blog-info">
      <h4 class="blog-title"> <a href="<?php esc_url(the_permalink()); ?>"><?php esc_attr(the_title()); ?></a></h4>
      <?php echo glazov_post_metas(); ?>
    </div>
  </div>
</div>
<?php
endwhile;
echo '</div></div>';
endif;
// Reset Post Data
wp_reset_postdata();
}

/* Author Info */
if ( ! function_exists( 'glazov_author_info' ) ) {
  function glazov_author_info() {

    if (get_the_author_meta( 'url' )) {
      $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $website_url = get_the_author_meta( 'url' );
      $target = 'target="_blank"';
    } else {
      $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $website_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $target = '';
    }
    $facebook = get_the_author_meta( 'facebook' );
    $twitter = get_the_author_meta( 'twitter' );
    $google_plus = get_the_author_meta( 'google_plus' );
    $linkedin = get_the_author_meta( 'linkedin' );
    $pinterest = get_the_author_meta( 'pinterest' );

    // variables
    $author_text = cs_get_option('author_text');
    $author_text = $author_text ? $author_text : esc_html__( 'Author', 'glazov' );
    $author_content = get_the_author_meta( 'description' );
if ($author_content) {
?>

<div class="glzv-author-info">
  <div class="author-avatar">
    <a href="<?php echo esc_url($website_url); ?>" <?php echo esc_attr($target); ?>>
      <?php echo get_avatar( get_the_author_meta( 'ID' ), 80 ); ?>
    </a>
  </div>
  <div class="author-content">
    <div class="author-pro"><?php echo esc_attr($author_text); ?></div>
    <a href="<?php echo esc_url($author_url); ?>" class="author-name"><?php echo get_the_author_meta('first_name').' '.get_the_author_meta('last_name'); ?></a>
    <p><?php echo get_the_author_meta( 'description' ); ?></p>
     <?php
        if( !empty( $facebook || $twitter || $google_plus || $linkedin ) ){
          echo '<div class="glzv-social">';
            if($facebook){
              echo '<a href="'.esc_url($facebook).'"><i class="fa fa-facebook"></i></a>';
            }
            if($twitter){
              echo '<a href="'.esc_url($twitter).'"><i class="fa fa-twitter"></i></a>';
            }
            if($google_plus){
              echo '<a href="'.esc_url($google_plus).'"><i class="fa fa-google-plus"></i></a>';
            }
            if($linkedin){
              echo '<a href="'.esc_url($linkedin).'"><i class="fa fa-linkedin"></i></a>';
            }
            if($pinterest){
              echo '<a href="'.esc_url($pinterest).'"><i class="fa fa-pinterest-p"></i></a>';
            }
          echo '</div>';
        }
      ?>
  </div>
</div>
<?php
} // if $author_content
  }
}

/* Pre Loader */
if ( ! function_exists( 'glazov_pre_loader' ) ) {
  function glazov_pre_loader() {
    $glazov_pre_loader = cs_get_option('pre_loader');
    $glazov_loader_style = cs_get_option('pre_loader_option');

    if ($glazov_pre_loader) {
      if($glazov_loader_style){
        $glazov_loader_class = $glazov_loader_style;
      } else{
        $glazov_loader_class = '';
      }
      if ($glazov_pre_loader) { ?>
        <div class="glzv-preloader">
          <div class="loader-wrap">
            <div class="loader">
              <div class="loader-inner <?php echo esc_attr($glazov_loader_class); ?>"></div>
            </div>
          </div>
        </div>
      <?php }
    }
  }
}

/* ==============================================
   Custom Comment Area Modification
=============================================== */
if ( ! function_exists( 'glazov_comment_modification' ) ) {
  function glazov_comment_modification($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
    if ( 'div' == $args['style'] ) {
      $tag = 'div';
      $add_below = 'comment';
    } else {
      $tag = 'li';
      $add_below = 'div-comment';
    }
    $comment_class = empty( $args['has_children'] ) ? '' : 'parent';
  ?>

  <<?php echo esc_attr($tag); ?> <?php comment_class('item ' . $comment_class .' ' ); ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-item">
    <?php endif; ?>
    <div class="comment-theme">
        <div class="comment-image">
          <?php if ( $args['avatar_size'] != 0 ) {
            echo get_avatar( $comment, 80 );
          } ?>
        </div>
    </div>
    <div class="comment-main-area">
      <div class="glzv-comments-meta">
        <h5><?php printf( '%s', get_comment_author() ); ?></h5>
        <span class="comments-date">
          <?php echo get_comment_date(); echo esc_html__(' - ', 'glazov'); ?>
          <span class="caps"><?php echo get_comment_time(); ?></span>
        </span>
      </div>
      <?php if ( $comment->comment_approved == '0' ) : ?>
      <em class="comment-awaiting-moderation"><?php echo esc_html__( 'Your comment is awaiting moderation.', 'glazov' ); ?></em>
      <?php endif; ?>
      <div class="comment-area">
        <?php comment_text(); ?>
        <div class="comments-reply">
        <?php
          comment_reply_link( array_merge( $args, array(
          'reply_text' => '<span class="comment-reply-link">'. esc_html__('Reply','glazov') .'</span>',
          'before' => '',
          'class'  => '',
          'depth' => $depth,
          'max_depth' => $args['max_depth']
          ) ) );
        ?>
        </div>
      </div>
    </div>
  <?php if ( 'div' != $args['style'] ) : ?>
  </div>
  <?php endif;
  }
}

/* Title Area */
if ( ! function_exists( 'glazov_title_area' ) ) {
  function glazov_title_area() {

    global $post, $wp_query;

    // Get post meta in all type of WP pages
    $glazov_id    = ( isset( $post ) ) ? $post->ID : 0;
    $glazov_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $glazov_id;
    $glazov_id    = ( glazov_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $glazov_id;
    $glazov_meta  = get_post_meta( $glazov_id, 'page_type_metabox', true );
    if ($glazov_meta && (!is_archive() || glazov_is_woocommerce_shop())) {
      $custom_title = $glazov_meta['page_custom_title'];
      if ($custom_title) {
        $custom_title = $custom_title;
      } elseif(post_type_archive_title()) {
        post_type_archive_title();
      } else {
        $custom_title = '';
      }
    } else { $custom_title = ''; }

    /**
     * For strings with necessary HTML, use the following:
     * Note that I'm only including the actual allowed HTML for this specific string.
     * More info: https://codex.wordpress.org/Function_Reference/wp_kses
     */
    $allowed_title_area_tags = array(
        'a' => array(
          'href' => array(),
        ),
        'span' => array(
          'class' => array(),
        )
    );

    if( $custom_title ) {
      echo esc_attr($custom_title);
    } elseif ( is_home() ) {
      bloginfo('description');
    } elseif ( is_search() ) {
      printf( esc_html__( 'Search Results for %s', 'glazov' ), '<span>' . get_search_query() . '</span>' );
    } elseif ( is_category() || is_tax() ){
      single_cat_title();
    } elseif ( is_tag() ){
      single_tag_title(esc_html__('Posts Tagged: ', 'glazov'));
    } elseif ( is_archive() ){
      if ( is_day() ) {
        printf( esc_html__( 'Archive for %s', 'glazov' ), get_the_date());
      } elseif ( is_month() ) {
        printf( esc_html__( 'Archive for %s', 'glazov' ), get_the_date( 'F, Y' ));
      } elseif ( is_year() ) {
        printf( esc_html__( 'Archive for %s', 'glazov' ), get_the_date( 'Y' ));
      } elseif ( is_author() ) {
        printf( esc_html__( 'Posts by: %s', 'glazov' ), get_the_author_meta( 'display_name', $wp_query->post->post_author ));
      } elseif( glazov_is_woocommerce_shop() ) {
        echo esc_attr($custom_title);
      } elseif ( is_post_type_archive() ) {
        post_type_archive_title();
      } else {
        esc_html_e( 'Archives', 'glazov' );
      }
    } elseif( is_404() ) {
      esc_html_e('404', 'glazov');
    } else {
      the_title();
    }

  }
}

/**
 * Pagination Function
 */
if ( ! function_exists( 'glazov_paging_nav' ) ) {
  function glazov_paging_nav() {
    if ( function_exists('wp_pagenavi')) {
      wp_pagenavi();
    } else {
      $older_post = cs_get_option('older_post');
      $newer_post = cs_get_option('newer_post');
      $older_post = $older_post ? $older_post : esc_html__( '&larr;', 'glazov' );
      $newer_post = $newer_post ? $newer_post : esc_html__( '&rarr;', 'glazov' );
      global $wp_query;
      $big = 999999999;
      if($wp_query->max_num_pages == '1' ) {} else {echo '';}
      echo '<div class="glzv-pagination">';
      echo paginate_links( array(
        'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
        'format' => '?paged=%#%',
        'prev_text' => $older_post,
        'next_text' => $newer_post,
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        // 'type' => 'list'
      ));
      echo '</div>';
      if($wp_query->max_num_pages == '1' ) {} else {echo '';}
    }
  }
}
// Custom Pagination Function
if ( ! function_exists( 'glazov_custom_paging_nav' ) ) {
  function glazov_custom_paging_nav($numpages = '', $pagerange = '', $paged='') {
    if (empty($pagerange)) {
      $pagerange = 2;
    }
    if (empty($paged)) {
      $paged = 1;
    } else {
      $paged = $paged;
    }
    if ($numpages == '') {
      global $wp_query;
      $numpages = $wp_query->max_num_pages;
      if(!$numpages) {
        $numpages = 1;
      }
    }
    $big = 999999999; ?>
  <div class="glzv-pagination">
      <?php echo paginate_links( array(
        'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
        'format' => '?page=%#%',
        'prev_text' => esc_html__('&larr;</a>', 'glazov'),
        'next_text' => esc_html__('&rarr;', 'glazov'),
        'current' => $paged,
        'total' => $numpages,
        'type' => 'plain'
      )); ?>
  </div>
<?php
  }
}

// information portfolio
function glazov_portfolio_information_meta( $meta_name, $meta_id ) {
    global $post;
    $portfolio_meta  = get_post_meta( $post->ID, $meta_name, true );
    $informations = $portfolio_meta[$meta_id];
    if ($informations) {
      $infos = $informations;
    } else {
      $infos = array();
    } ?>
    <ul>
      <?php
      foreach ( $infos as $key => $information ) {
        $meta_info = explode('<br>', nl2br($information['meta_info'], false));
        $meta_url = explode('<br>', nl2br($information['info_url'], false));

        if(!empty($information['info_url'])) {
          $meta_i = count($meta_info);
          $meta_u = count($meta_url);
          if ($meta_i > $meta_u) {
            $meta_info = array_slice($meta_info, 0, count($meta_url));
          } elseif($meta_u > $meta_i) {
            $meta_url = array_slice($meta_url, 0, count($meta_info));
          } else {
            $meta_info = $meta_info;
            $meta_url = $meta_url;
          }
          $totlal_info = array_combine($meta_info, $meta_url);
          ?>
            <li>
            <span class="portfolio-detail-title"><?php echo esc_attr($information['title']); ?></span>
              <?php foreach ($totlal_info as $info => $url) {  ?>
                      <a href="<?php echo trim($url);?>"><?php echo trim($info); ?></a>
              <?php } ?>
            </li>
        <?php
        } else {
             ?>
            <li>
            <span class="portfolio-detail-title"><?php echo esc_attr($information['title']); ?></span>
              <?php foreach ($meta_info as $key => $info) { ?>
                      <?php echo trim($info); ?>
              <?php } ?>
            </li>
        <?php
        }
      } ?>
    </ul>
<?php
}

// information portfolio
function glazov_gallery_client_information_meta( $meta_name, $meta_id ) {
    global $post;
    $portfolio_meta  = get_post_meta( $post->ID, $meta_name, true );
    $informations = $portfolio_meta[$meta_id];
    if ($informations) {
      $infos = $informations;
    } else {
      $infos = array();
    } ?>
    <div class="proof-client-info">
    <ul>
      <?php
      foreach ( $infos as $key => $information ) {
        $meta_info = explode('<br>', nl2br($information['meta_info'], false));
        $meta_url = explode('<br>', nl2br($information['info_url'], false));

        if(!empty($information['info_url'])) {
          $meta_i = count($meta_info);
          $meta_u = count($meta_url);
          if ($meta_i > $meta_u) {
            $meta_info = array_slice($meta_info, 0, count($meta_url));
          } elseif($meta_u > $meta_i) {
            $meta_url = array_slice($meta_url, 0, count($meta_info));
          } else {
            $meta_info = $meta_info;
            $meta_url = $meta_url;
          }
          $totlal_info = array_combine($meta_info, $meta_url);
          ?>
            <li>
            <span class="proof-info-title"><?php echo esc_attr($information['title']); ?></span>
              <?php foreach ($totlal_info as $info => $url) {  ?>
                      <a href="<?php echo trim($url);?>"><?php echo trim($info); ?></a>
              <?php } ?>
            </li>
        <?php
        } else {
             ?>
            <li>
            <span class="proof-info-title"><?php echo esc_attr($information['title']); ?></span>
              <?php foreach ($meta_info as $key => $info) { ?>
                      <?php echo trim($info); ?>
              <?php } ?>
            </li>
        <?php
        }
      } ?>
    </ul>
    </div>
<?php
}

// single pagination portfolio
if ( ! function_exists( 'glazov_portfolio_next_prev' ) ) {
function glazov_portfolio_next_prev() {
  global $post;
    $p_home_url = cs_get_option('portfolio_home_url');
    $next_port = cs_get_option('next_port');
    $prev_port = cs_get_option('prev_port');
    $previous_project = $prev_port ? $prev_port : esc_html__( 'Previous Project', 'glazov' );
    $next_project = $next_port ? $next_port : esc_html__( 'Next Project', 'glazov' );
    ?>
    <div class="portfolio-controls">
      <div class="pull-left">
        <a href="<?php echo esc_url( $p_home_url ); ?>" class="grid-view-link"><span class="grid-view-square"></span> <span class="grid-view-square"></span></a>
      </div>
      <div class="pull-right">
        <div class="control-links">
        <?php $prev_post = get_adjacent_post(false, '', true);
        if(!empty($prev_post)) {
          echo'<span class="previous">
            <a href="' . esc_url(get_permalink($prev_post->ID)) . '">
              <img src="'.esc_url(GLAZOV_IMAGES).'/icons/icon14@1x.png" alt="Previous" width="16">
            </a>
          </span>';
        }
          $next_post = get_adjacent_post(false, '', false);
          if(!empty($next_post)) {
          echo '<span class="next">
            <a href="' . esc_url(get_permalink($next_post->ID)) . '">
              <img src="'.esc_url(GLAZOV_IMAGES).'/icons/icon15@1x.png" alt="Next" width="16">
            </a>
          </span>';
          } ?>
        </div>
      </div>
    </div>

<?php
}
}

/* Password Form */
function glazov_password_form() {
  // global $post;
  global $post;
  $password_title = cs_get_option('password_title');
  $password_content = cs_get_option('password_content');
  $password_title = ( $password_title ) ? $password_title : esc_html__( 'PASSWORD PROTECTED', 'glazov' );
  $password_proof_bg = cs_get_option('password_proof_bg');
  $password_proof_icon = cs_get_option('password_proof_icon');
  $password_proof_bg = ( $password_proof_bg ) ? wp_get_attachment_url( $password_proof_bg )  :get_template_directory_uri().'/assets/images/backgrounds/background1.png';
  $password_proof_icon = ( $password_proof_icon ) ? wp_get_attachment_url( $password_proof_icon )  :get_template_directory_uri().'/assets/images/icons/icon7@1x.png';
  $pass_content = $password_content ? '<p>'.$password_content.'</p>' : '';

  $pass = '<div class="glzv-full-wrap">
    <div class="glzv-full-background" style="background-image:url('.$password_proof_bg.');">
      <div class="full-background-wrap">
        <div class="vertical-scroll">
          <div class="glzv-table-wrap">
            <div class="glzv-align-wrap">
              <div class="container">
                <div class="glzv-password-protected">
                  <div class="glzv-icon">
                    <img src="'.$password_proof_icon.'" alt="Password Protected" width="135">
                  </div>
                  <h3 class="protected-title">'.esc_attr( $password_title ).'</h3>
                  '.$pass_content.'
                  <form action="'.esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ).'" method="post"><p><input name="post_password" placeholder="Password" type="password"/><input type="submit" value="" name="Submit"  /></p></form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>';
  return $pass;
}
add_filter('the_password_form' , 'glazov_password_form');

// Custom Post Per Page
function glazov_custom_posts_per_page( $query ) {
  if ( post_type_exists( 'team' ) ) {
    if ( is_post_type_archive('team') ) {
      $team_limit = cs_get_option('team_limit');
      if ( $query->query_vars['post_type'] == 'team' ) $query->query_vars['posts_per_page'] = $team_limit;
    }
  }
  return $query;
}
add_filter( 'pre_get_posts', 'glazov_custom_posts_per_page' );

// Remove Protected Title From Password Protected Page/Post Title
add_filter( 'protected_title_format', 'glazov_remove_protected_title' );
function glazov_remove_protected_title( $title ) {
    return "%s";
}
