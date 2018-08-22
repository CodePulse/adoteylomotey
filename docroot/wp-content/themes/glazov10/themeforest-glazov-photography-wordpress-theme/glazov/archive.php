<?php
/*
 * The template for displaying archive pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();
if( 'portfolio' == get_post_type() ) {
	$portfolio_style = cs_get_option('portfolio_style');
	$portfolio_column = cs_get_option('portfolio_column');
	$portfolio_limit = cs_get_option('portfolio_limit');
	$portfolio_order = cs_get_option('portfolio_order');
	$portfolio_orderby = cs_get_option('portfolio_orderby');
	$portfolio_pagination = cs_get_option('portfolio_pagination');

	$portfolio_style_class = $portfolio_style === 'bpw-style-two' ? ' expand-hover' : ' gallery-style-two shifting-hover';
  $portfolio_column = $portfolio_column ? $portfolio_column : ' bpw-col-5';

  // View Details Button
  if (glazov_framework_active()) {
    $view_more_text = cs_get_option('view_more_text');
    if($view_more_text) {
      $btn_text = $view_more_text;
    } else {
      $btn_text = esc_html__('View Details', 'glazov');
    }
  } else {
    $btn_text = $btn_text ? $btn_text : esc_html__('View Details', 'glazov');
  }
?>
  <div class="glzv-mid-wrap">
    <div class="glzv-gallery <?php echo esc_attr($portfolio_style_class); ?>">
    <!-- Portfolio Filter -->
    <?php if ($portfolio_style != 'bpw-style-two') { ?>
      <div class="masonry-filters">
      <div class="filters-btn "><a href="javascript:void(0);">Filter <i class="fa fa-caret-down" aria-hidden="true"></i></a></div>
      <ul>
		<li><a href="javascript:void(0);" data-filter="*" class="active"><span>All</span></a></li>
    <?php
      if ($portfolio_show_category) {
        $cat_name = explode(',', $portfolio_show_category);
        $terms = $cat_name;
        $count = count($terms);
        if ($count > 0) {
          foreach ($terms as $term) {
            echo '<li class="cat-'. preg_replace('/\s+/', "", strtolower($term)) .'"><a href="#0" class="filter cat-'. preg_replace('/\s+/', "", strtolower($term)) .'" data-filter=".cat-'. preg_replace('/\s+/', "", strtolower($term)) .'" title="' . str_replace('-', " ", strtolower($term)) . '"><span>' . str_replace('-', " ", strtolower($term)) . '</span></a></li>';
           }
        }
      } else {
        $terms = get_terms('portfolio_category');
        $count = count($terms);
        $i=0;
        $term_list = '';
        if ($count > 0) {
          foreach ($terms as $term) {
            $i++;
            $term_list .= '<li><a href="#0" class="filter cat-'. $term->slug .'" data-filter=".'. $term->slug .'-item" title="' . esc_attr($term->name) . '"><span>' . $term->name . '</span></a></li>';
            if ($count != $i) {
              $term_list .= '';
            } else {
              $term_list .= '';
            }
          }
          echo $term_list;
        }
      }
    ?>
	</ul>
  </div>
  <?php }
  $portfolio_limit = $portfolio_limit ? $portfolio_limit : '-1';

  // Pagination
  global $paged;
  if( get_query_var( 'paged' ) )
    $my_page = get_query_var( 'paged' );
  else {
    if( get_query_var( 'page' ) )
      $my_page = get_query_var( 'page' );
    else
      $my_page = 1;
    set_query_var( 'paged', $my_page );
    $paged = $my_page;
  }

  $args = array(
    // other query params here,
    'paged' => $my_page,
    'post_type' => 'portfolio',
    'posts_per_page' => (int)$portfolio_limit,
    'portfolio_category' => '',
    'orderby' => $portfolio_orderby,
    'order' => $portfolio_order
  );

  $glazov_port = new WP_Query( $args ); ?>

  <!-- Portfolio Start -->
  <div class="glzv-masonry <?php echo esc_attr($portfolio_column); ?>" data-item="5" data-space="25">

    <?php
    if ($glazov_port->have_posts()) : while ($glazov_port->have_posts()) : $glazov_port->the_post();

      // Category
      global $post;
      $terms = wp_get_post_terms($post->ID,'portfolio_category');
      foreach ($terms as $term) {
        $cat_class = $term->slug.'-item';
      }
      $count = count($terms);
      $i=0;
      $cat_class = '';
      if ($count > 0) {
        foreach ($terms as $term) {
          $i++;
          $cat_class .= $term->slug .'-item ';
          if ($count != $i) {
            $cat_class .= '';
          } else {
            $cat_class .= '';
          }
        }
      }

      // Featured Image
      $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
      $large_image = $large_image[0];
        if ($portfolio_column === 'bpw-col-3') {
          if(class_exists('Aq_Resize')) {
            $portfolio_img = aq_resize( $large_image, '598', '594', true );
          } else {$portfolio_img = $large_image;}
          $featured_img = ( $portfolio_img ) ? $portfolio_img : GLAZOV_PLUGIN_ASTS . '/images/598x594.jpg';
        } elseif ($portfolio_column === 'bpw-col-4') {
          if(class_exists('Aq_Resize')) {
            $portfolio_img = aq_resize( $large_image, '442', '439', true );
          } else {$portfolio_img = $large_image;}
          $featured_img = ( $portfolio_img ) ? $portfolio_img : GLAZOV_PLUGIN_ASTS . '/images/442x439.jpg';
        } else {
          if(class_exists('Aq_Resize')) {
            $portfolio_img = aq_resize( $large_image, '349', '347', true );
          } else {$portfolio_img = $large_image;}
          $featured_img = ( $portfolio_img ) ? $portfolio_img : GLAZOV_PLUGIN_ASTS . '/images/420x280.jpg';
        }

      if ($portfolio_style === 'bpw-style-two') {
        $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
        $large_image = $large_image[0];
        $portfolio_featurd_image = get_post_meta( get_the_ID(), 'portfolio_featurd_image', true );
        if ($portfolio_featurd_image){
          $masonry_img_size = $portfolio_featurd_image['masonry_img_size'];
          if($portfolio_featurd_image['featured_image_masonry']) {
            $portfolio_msnr_img = wp_get_attachment_image_url( $portfolio_featurd_image['featured_image_masonry'], 'fullsize', true );
          } else {
            $portfolio_msnr_img = $large_image;
          }
        } else {
          $masonry_img_size = '';
          $portfolio_msnr_img = $large_image;
        }
        $img_custom_cls = $portfolio_featurd_image['featured_image_masonry'] ? $portfolio_featurd_image['featured_image_masonry'] : get_post_thumbnail_id(get_the_ID());
        $image_media_class = get_post_meta($img_custom_cls, 'image_media_class', true);
        if ($masonry_img_size) {
          if ($masonry_img_size === '2x-height') {
            $img_size_class = 'double-height ';
            if(class_exists('Aq_Resize')) {
              $portfolio_img = aq_resize( $portfolio_msnr_img, '438', '722', true );
            } else {$portfolio_img = $portfolio_msnr_img;}
            $portfolio_img = ( $portfolio_img ) ? $portfolio_img : GLAZOV_PLUGIN_ASTS . '/images/438x346.jpg';
          } elseif ($masonry_img_size === '2x-width') {
            $img_size_class = 'double-width ';
            if(class_exists('Aq_Resize')) {
              $portfolio_img = aq_resize( $portfolio_msnr_img, '876', '346', true );
            } else {$portfolio_img = $portfolio_msnr_img;}
            $portfolio_img = ( $portfolio_img ) ? $portfolio_img : GLAZOV_PLUGIN_ASTS . '/images/438x346.jpg';
          } elseif ($masonry_img_size === '2x-width-height') {
            $img_size_class = 'one-half-item ';
            if(class_exists('Aq_Resize')) {
              $portfolio_img = aq_resize( $portfolio_msnr_img, '904', '722', true );
            } else {$portfolio_img = $portfolio_msnr_img;}
            $portfolio_img = ( $portfolio_img ) ? $portfolio_img : GLAZOV_PLUGIN_ASTS . '/images/438x346.jpg';
          } else {
            $img_size_class = '';
            if(class_exists('Aq_Resize')) {
              $portfolio_img = aq_resize( $portfolio_msnr_img, '438', '346', true );
            } else {$portfolio_img = $portfolio_msnr_img;}
            $portfolio_img = ( $portfolio_img ) ? $portfolio_img : GLAZOV_PLUGIN_ASTS . '/images/438x346.jpg';
          }
        } else {
          $img_size_class = '';
          if(class_exists('Aq_Resize')) {
            $portfolio_img = aq_resize( $portfolio_msnr_img, '438', '346', true );
          } else {$portfolio_img = $portfolio_msnr_img;}
          $portfolio_img = ( $portfolio_img ) ? $portfolio_img : GLAZOV_PLUGIN_ASTS . '/images/438x346.jpg';
        }
        ?>
      <div class="masonry-item nature-item <?php echo esc_attr($img_size_class); ?>" data-category="nature-item">
        <div class="gallery-item">
          <div class="glzv-image <?php echo esc_attr($image_media_class); ?>"><img src="<?php echo esc_url($portfolio_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"></div>
          <div class="gallery-info">
            <div class="glzv-table-wrap">
              <div class="glzv-align-wrap">
                <h4 class="gallery-title"><a href="<?php echo esc_url(the_permalink()); ?>"><?php echo esc_attr(get_the_title()); ?></a></h4>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php
      } else {
        $image_media_class = get_post_meta(get_post_thumbnail_id(get_the_ID()), 'image_media_class', true);
    ?>
    <div class="masonry-item <?php echo esc_attr($cat_class); ?>" data-category="nature-item">
      <div class="gallery-item">
        <div class="glzv-image <?php echo esc_attr($image_media_class); ?>"><img src="<?php echo esc_url($featured_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"></div>
        <div class="gallery-info">
          <div class="glzv-table-wrap">
            <div class="glzv-align-wrap">
              <h4 class="gallery-title"><a href="<?php echo esc_url(the_permalink()); ?>"><?php echo esc_attr(get_the_title()); ?></a></h4>
              <div class="project-categories">
                <?php
                  $category_list = wp_get_post_terms($post->ID, 'portfolio_category');
                  $i=1;
                  foreach ($category_list as $term) {
                    $term_link = get_term_link( $term );
                    echo '<span><a href="'. esc_url($term_link) .'" class="category-name">'. esc_attr($term->name) .'</a></span> ';
                    if($i++==2) break;
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
      }
    endwhile;
    endif;
     ?>

  </div>
  <!-- Portfolio End -->

  <?php
  if (!$portfolio_pagination) {} else {
    glazov_custom_paging_nav($glazov_port->max_num_pages,"",$paged);
    wp_reset_postdata();  // avoid errors further down the page
  }
  ?>
  </div>
</div>
<?php

} elseif( 'gallery' == get_post_type() ) {
	$album_style = cs_get_option('gallery_style');
	$album_column = cs_get_option('gallery_column');
	$album_limit = cs_get_option('gallery_limit');
	$album_order = cs_get_option('gallery_order');
	$album_orderby = cs_get_option('gallery_orderby');

	$album_column = $album_column ? $album_column : 'col-item-4';
  $album_style = $album_style ? $album_style : 'grid';

  $album_limit = $album_limit ? $album_limit : -1;
  $args = array(
    // other query params here,
    'post_type' => 'gallery',
    'posts_per_page' => (int) $album_limit,
    'post__in' => '',
    'orderby' => $album_orderby,
    'order' => $album_order
  );
  $glazov_albm = new WP_Query( $args );
  if($album_style == 'masonry') {
    $hover_cls =' direction-hover';
  } else {
    $hover_cls = ' glzv-panr';
  }
  if($album_style == 'grid') {
    $gal_cls = ' glzv-glry-grid';
  } else {
    $gal_cls = '';
  }
?>
<!-- glazov masonry (col item 4, dark gallery overlay) -->
<div class="mid-wrap-inner inner-space-eleven gallery-global">
  <div class="glzv-gallery glzv-lightgallery <?php echo esc_attr($album_column . $hover_cls . $gal_cls); ?>">
      <?php if($album_style == 'masonry') { ?>
        <div class="glzv-masonry">
      <?php }
      global $post;
      // Album Filter
      if ($glazov_albm->have_posts()) : while ($glazov_albm->have_posts()) : $glazov_albm->the_post();
        $large_imagee =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
        if ($album_style == 'grid'){
          if ( !empty($large_imagee) ) {
            $large_image = $large_imagee[0];
            if(class_exists('Aq_Resize')) {
              $large_image = aq_resize( $large_image, '442', '350', true );
            } else {$large_image = $large_image;}
            $large_image = $large_image ? $large_image : GLAZOV_IMAGES.'/grid-placeholder.jpg';
          } else {
            $large_image =  GLAZOV_PLUGIN_IMGS.'/1000x850.jpg';
          }
        } else {
          if ( !empty($large_imagee) ) {
            $large_image = $large_imagee[0];
          } else {
            $large_image =  GLAZOV_PLUGIN_IMGS.'/1000x850.jpg';
          }
        }
        $glazov_alt = get_post_meta( get_post_thumbnail_id(get_the_ID()), '_wp_attachment_image_alt', true);
        $img_title = get_the_title();
        $image_media_class = get_post_meta(get_post_thumbnail_id(get_the_ID()), 'image_media_class', true);
    ?>
    <?php if($album_style == 'masonry' || $album_style == 'grid' ){ ?>

      <div class="masonry-item nature-item" data-category="nature-item">
        <div class="gallery-item">
          <div class="glzv-image <?php echo esc_attr($image_media_class); ?>"><img src="<?php echo esc_url($large_image); ?>" alt="<?php echo esc_attr($glazov_alt); ?>"></div>
          <div class="gallery-info">
            <div class="glzv-table-wrap">
              <div class="glzv-align-wrap">
                <h4 class="gallery-title"><?php echo esc_attr($img_title); ?></h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php } else {
        $glazov_c_gallery_metabox  = get_post_meta( get_the_ID(), 'gallery_single_metabox', true );
        if ($glazov_c_gallery_metabox) {
          if ($glazov_c_gallery_metabox['gallery_images_for_galleries']) {
            $gallery_imagess = explode(',', $glazov_c_gallery_metabox['gallery_images_for_galleries']);
          } else {
            $gallery_imagess = array();
          }
        } else {
          $gallery_imagess = array();
        } ?>
        <div class="gallery-row">
          <h5 class="gallery-row-title"><?php the_title(); ?></h5>
            <div class="horizontal-scroll">
            <?php
              foreach ($gallery_imagess as $key => $image) {
                $imagess = wp_get_attachment_image_src( $image, 'full' );
                $glazov_alt = get_post_meta( $image, '_wp_attachment_image_alt', true );
                if (!empty( $imagess )) {
                  if(class_exists('Aq_Resize')) {
                    $images = aq_resize( $imagess[0], '180', '120', true );
                  } else {$images = $imagess[0];}
                  $images = $images ? $images : GLAZOV_IMAGES.'/438x347.png';
                } else {
                  $images = GLAZOV_IMAGES.'/grid-placeholder.jpg';
                }
                $image_id = glazov_get_image_id($imagess[0]);
                $attachment = get_post( $image_id );
                $image_title = $attachment->post_title;
                $image_media_info = get_post_meta($image, 'image_media_info', true);
                $image_media_cat = get_post_meta($image, 'image_media_cat', true);
                $image_media_class = get_post_meta($image, 'image_media_class', true);
                $image_media_link = get_post_meta($image, '_image_media_link', true);
                if ( $image_media_link ) {
                  $largeimage = $image_media_link;
                } else {
                  $largeimage = $imagess[0];
                }
            ?>
              <div class="gallery-item">
                <div class="glzv-image <?php echo esc_attr($image_media_class); ?>">
                  <a href="<?php echo esc_url( $largeimage ); ?>" data-rel="lightGallery"><img src="<?php echo esc_url( $images ); ?>" alt="<?php echo esc_attr($glazov_alt); ?>"></a>
                </div>
              </div>
          <?php } ?>
          </div>
        </div>
      <?php  }
      endwhile;
      endif;
      wp_reset_postdata();

    if($album_style == 'masonry') { ?>
        </div>
      <?php } ?>
  </div>
</div> <!-- end wrapper -->
<?php
} elseif( 'team' == get_post_type() ) {
  $team_column = cs_get_option('team_column');
  $team_limit = cs_get_option('team_limit');
  $team_order = cs_get_option('team_order');
  $team_orderby = cs_get_option('team_orderby');
  $team_social_icon = cs_get_option('team_social_icon');
  $team_pagination = cs_get_option('team_pagination');
  $team_section_title = cs_get_option('team_title');
  $team_section_sub_title = cs_get_option('team_sub_title');

    // Team Column
    $team_column = $team_column ? $team_column : 'col-md-4 col-sm-6';

    // Turn output buffer on
    ob_start();

    // Query Starts Here
    // Pagination
    global $paged;
    if( get_query_var( 'paged' ) )
      $my_page = get_query_var( 'paged' );
    else {
      if( get_query_var( 'page' ) )
        $my_page = get_query_var( 'page' );
      else
        $my_page = 1;
      set_query_var( 'paged', $my_page );
      $paged = $my_page;
    }

    $args = array(
      'paged' => $my_page,
      'post_type' => 'team',
      'posts_per_page' => (int)$team_limit,
      'orderby' => $team_orderby,
      'order' => $team_order,
      'post__in' => '',
    );

    $glazov_team_qury = new WP_Query( $args );

    if ($glazov_team_qury->have_posts()) :
    ?>

  <div class="glzv-team">
    <div class="container">
      <div class="glzv-section-title">
        <?php if($team_section_title){
          echo '<h3 class="section-title">'.esc_attr($team_section_title).'</h3>';
        }
        if($team_section_sub_title){
          echo '<p>'.esc_attr($team_section_sub_title).'</p>';
        } ?>
      </div>
      <div class="row">

        <?php
        while ($glazov_team_qury->have_posts()) : $glazov_team_qury->the_post();

        // Link
        $team_options = get_post_meta( get_the_ID(), 'team_options', true );
        $team_socials = $team_options['social_icons'];
        $team_pro = $team_options['team_job_position'];

        // Featured Image
        $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
        $large_image = $large_image[0];
        $abt_title = get_the_title();
        $image_media_class = get_post_meta(get_post_thumbnail_id(get_the_ID()), 'image_media_class', true);
        ?>
        <div class="<?php echo esc_attr($team_column); ?>">
          <div class="team-mate">
            <div class="glzv-image <?php echo esc_attr($image_media_class); ?>">
             <?php if($large_image) {
               echo '<img src="'. esc_url($large_image) .'" alt="'.esc_attr($abt_title).'">';
             } ?>
              <div class="mate-info">
                <div class="glzv-table-wrap">
                  <div class="glzv-align-wrap">
                    <h4 class="mate-name"><a href="<?php the_permalink(); ?>"><?php echo esc_attr($abt_title); ?></a></h4>
                    <?php if($team_pro){
                      echo '<h5 class="mate-designation">'.esc_attr($team_pro).'</h5>';
                    } ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="mate-info">
              <div class="mate-primary-wrap">
                <h4 class="mate-name"><?php echo esc_attr($abt_title); ?></h4>
                <?php if($team_pro){
                  echo '<h5 class="mate-designation">'.esc_attr($team_pro).'</h5>';
                } ?>
              </div>
              <?php
              if($team_social_icon) { ?>
                <div class="glzv-social">
                  <div class="glzv-table-wrap">
                    <div class="glzv-align-wrap">
                      <?php
                        if ( ! empty( $team_socials ) ) {
                        foreach ( $team_socials as $social ) {
                          if(isset($social['social_open_link'])) {
                            $target = 'target="_blank"';
                          } else {
                            $target = '';
                          }
                      ?>
                        <a href="<?php echo esc_url($social['icon_link']); ?>" <?php echo esc_attr($target); ?>><i class="<?php echo esc_attr($social['icon']); ?>" aria-hidden="true"></i></a>
                      <?php } } ?>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
    </div>

  <?php
  endif;

  if ($team_pagination) {
    glazov_custom_paging_nav($glazov_team_qury->max_num_pages,"",$paged);
    wp_reset_postdata(); // avoid errors further down the page
  } ?>
</div> <!-- Team End -->
<?php
} else {

// Theme Options
$glazov_sidebar_position = cs_get_option('blog_sidebar_position');

// Sidebar Position
if ($glazov_sidebar_position === 'sidebar-hide') {
	$glazov_layout_class = 'col-md-12';
	$glazov_sidebar_class = 'glzv-hide-sidebar';
} elseif ($glazov_sidebar_position === 'sidebar-left') {
	$glazov_layout_class = 'col-md-9';
	$glazov_sidebar_class = 'left-sidebar';
} else {
	$glazov_layout_class = 'col-md-9';
	$glazov_sidebar_class = 'glzv-right-sidebar';
}
?>

<div class="container glzv-content-area <?php echo esc_attr($glazov_sidebar_class); ?>">
  <div class="row">
  	<?php
    	if ($glazov_sidebar_position === 'sidebar-left' && $glazov_sidebar_position !== 'sidebar-hide') {
    		get_sidebar(); // Sidebar
    	}
  	?>
  	<div class="glzv-content-side <?php echo esc_attr($glazov_layout_class); ?>">
  		<div class="blog-items-wrap">
    		<?php
    		if ( have_posts() ) :
    			/* Start the Loop */
    			while ( have_posts() ) : the_post();
    				get_template_part( 'layouts/post/content' );
    			endwhile;
    		else :
    			get_template_part( 'layouts/post/content', 'none' );
    		endif; ?>
  		</div>
  		<?php
        glazov_paging_nav();
        wp_reset_postdata(); // avoid errors further down the page
  		?>
  	</div>
		<?php
  		if ($glazov_sidebar_position !== 'sidebar-hide') {
  			get_sidebar(); // Sidebar
  		}
		?>
  </div>
</div>

<?php }
get_footer();
