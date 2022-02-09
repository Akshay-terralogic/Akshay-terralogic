<?php
/**
 * The header for our theme
 *
 * @package theme_name
 */
$t_options = get_option('tp_opt');
global $gdir;
?>
<!DOCTYPE html>
<html lang="en" data-page="home" dir="ltr">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Zetwerk">
  <meta name="keywords" content="designs">
  <meta name="google-site-verification" content="kwzF5bi7kmQuKRKEgwYIiPN1sh5PeYVcR0cDbRUz874" />
  <?php wp_head(); ?>
  <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
  <!-- Desktop header-->
  <header class="zw-mainheader" id="header">
    <nav class="navbar navbar-overide navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand me-0 me-lg-3 me-xxl-5 order-2 order-lg-1" href="<?php echo get_site_url(); ?>">
          <?php if ( is_page_template( 'search.php' ) ) { ?>
            <img src="<?php echo $gdir ?>/img/white-logo.svg">
          <?php }elseif(is_search()){ ?>
            <img src="<?php echo $gdir ?>/img/white-logo.svg">
          <?php }else{ ?>
            <img src="<?php echo $t_options['logo']['url'] ?>">
          <?php }?>
        </a>
        <div class="col col-md-auto text-md-end navbar-collapse order-2">
          <?php 
            wp_nav_menu( array( 
            'theme_location' => 'head_menu',
            'container' => 'ul',
            'menu_class' => 'nav navbar-list d-md-flex mb-0',
            'add_a_class' => 'nav-link',
            )); 
          ?>
        </div>
        <!-- Hamber-menu mobile-->
        <a class="zw-mobile-hamberg zw-only-mobile order-1">
          <span class="nav-toggle nav-toggle-bar"></span>
          <div class="zw-close-btn">
            <img src="<?php echo $gdir ?>/img/close-btn.svg" alt="close-btn">
          </div>
        </a>
        <div class="ms-lg-auto justify-content-lg-end order-3" id="navbarText">
          <a class="zw-nav-search em-nav-border em-nav-border--right" href="<?php echo get_site_url(); ?>/search/">
          <?php if ( is_page_template( 'search.php' ) ) { ?>
            <img src="<?php echo $gdir ?>/img/icons/search-icon-white.svg" alt="Search icon">
          <?php }elseif(is_search()){ ?>
            <img src="<?php echo $gdir ?>/img/icons/search-icon-white.svg" alt="Search icon">
          <?php } else{ ?>
            <img src="<?php echo $gdir ?>/img/icons/search-icon.svg" alt="Search icon">
          <?php }?>            
          </a>
        </div>
      </div>
    </nav>
  </header>
  <body <?php body_class('em-home'); ?>>


