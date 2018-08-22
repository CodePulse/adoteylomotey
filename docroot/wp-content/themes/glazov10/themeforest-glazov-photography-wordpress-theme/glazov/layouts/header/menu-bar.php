<?php
// Metabox
global $post;
$glazov_id    = ( isset( $post ) ) ? $post->ID : false;
$glazov_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $glazov_id;
$glazov_id    = ( glazov_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $glazov_id;
$glazov_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $glazov_id : false;
$glazov_meta  = get_post_meta( $glazov_id, 'page_type_metabox', true );

// Header Style - ThemeOptions & Metabox
if ($glazov_meta) {
  $glazov_menu_style = $glazov_meta['menu_style'];
} else {
  $glazov_menu_style = cs_get_option('menu_style');
}

if ($glazov_meta && $glazov_menu_style !== '') {
  $glazov_menu_style = $glazov_meta['menu_style'];
} else {
  $glazov_menu_style = cs_get_option('menu_style');
}

$glazov_mobile_breakpoint = cs_get_option('mobile_breakpoint');
$glazov_breakpoint = $glazov_mobile_breakpoint ? $glazov_mobile_breakpoint : '767';

$hide_menu_share = cs_get_option('hide_menu_share');

global $post;
if(!is_404() && !is_search()){
  $page_url = get_permalink($post->ID );
  $title = $post->post_title;
} else {
  $page_url = home_url( '/' );
  $title = '';
}
$share_text = cs_get_option('share_text');
$share_text = $share_text ? $share_text : esc_html__( 'Share', 'glazov' );
$share_on_text = cs_get_option('share_on_text');
$share_on_text = $share_on_text ? $share_on_text : esc_html__( 'Share On', 'glazov' );

// Navigation & Search
if ($glazov_meta) {
  $glazov_choose_menu = $glazov_meta['choose_menu'];
} else { $glazov_choose_menu = ''; }
$glazov_choose_menu = $glazov_choose_menu ? $glazov_choose_menu : '';
if ($glazov_menu_style === 'style-two'){ ?>
<nav class="glzv-navigation">
  <div class="navigation-wrap">
    <div class="close-btn"><a href="javascript:void(0);"></a></div>
    <div class="vertical-scroll">
      <div class="glzv-table-wrap">
        <div class="glzv-align-wrap">
          <?php wp_nav_menu(
            array(
              'menu'              => 'primary',
              'theme_location'    => 'primary',
              'container'         => 'div',
              'container_class'   => 'navigation-bar',
              'container_id'      => '',
              'menu'              => $glazov_choose_menu,
              'menu_class'        => 'navigation',
              'fallback_cb'       => 'glazov_wp_bootstrap_navwalker::fallback',
              'walker'            => new glazov_wp_bootstrap_navwalker()
            )
          );
          ?>
        </div>
      </div>
    </div>
    <div class="navigation-bottom-wrap">
      <?php
        $glazov_copyright_text = cs_get_option('copyright_text');
        if ($glazov_copyright_text) {
          echo '<div class="pull-left">'. do_shortcode($glazov_copyright_text) .'</p>';
        } else {
          echo '<div class="pull-left">';

          esc_html_e('Copyrights&copy;', 'glazov');
          echo date('Y');
          esc_html_e(' All Rights Reserved.', 'glazov');
          echo '</div>';
        }
      if(!$hide_menu_share){ ?>
      <div class="pull-right">
        <div class="project-share">
          <div class="share-label">
            <img src="<?php echo esc_url(GLAZOV_IMAGES); ?>/icons/icon4@1x.png" alt="Share" width="32">
          </div>
          <div class="share-links">
            <a href="//twitter.com/home?status=<?php print(urlencode($title)); ?>+<?php print(urlencode($page_url)); ?>" class="icon-fa-twitter" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Twitter', 'glazov'); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
            <a href="//www.facebook.com/sharer/sharer.php?u=<?php print(urlencode($page_url)); ?>&amp;t=<?php print(urlencode($title)); ?>" class="icon-fa-facebook" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Facebook', 'glazov'); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php print(urlencode($page_url)); ?>&amp;title=<?php print(urlencode($title)); ?>" class="icon-fa-linkedin" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Linkedin', 'glazov'); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
            <a href="//plus.google.com/share?url=<?php print(urlencode($page_url)); ?>" class="icon-fa-google-plus" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Google+', 'glazov'); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</nav>
<div class="glzv-navigation-overlay"></div>
<?php } else {

  echo '<nav class="glzv-navigation" data-nav="'. esc_attr($glazov_breakpoint) .'">';
  wp_nav_menu(
    array(
      'menu'              => 'primary',
      'theme_location'    => 'primary',
      'container'         => 'div',
      'container_class'   => 'navigation-bar',
      'container_id'      => '',
      'menu'              => $glazov_choose_menu,
      'menu_class'        => 'navigation',
      'fallback_cb'       => 'glazov_wp_bootstrap_navwalker::fallback',
      'walker'            => new glazov_wp_bootstrap_navwalker()
    )
  );
  echo '</nav>'; }
