<!DOCTYPE HTML>
<html>
  <head>
    <title><?php echo get_bloginfo( 'name' ); ?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
  </head>
  <body id="home">
    <div id="header-top" class="container-fluid">
      <div class="container">

      <?php if ( is_front_page() ) : ?>
        <div id="logo" class="col-lg-2 col-md-2 col-sm-2">
          <a href="#home">
          <?php $logo = get_option( "theme_name_logo_link" ); ?>
            <img src="<?php echo $logo; ?>" alt="Logo">
          </a>
        </div>
        <div id="header-menu" class="col-lg-10 col-md-10 col-sm-10">
          <?php wp_nav_menu( array('menu' => 'nav header') ); ?>
        </div><!-- END header-menu -->
        <div class="navbar-bars"><a href="#"><span class="glyphicon glyphicon-align-justify"></span></a></div>
        <div id="navbar-collapsed">
            <?php wp_nav_menu( array('menu' => 'nav header') ); ?>
        </div><!-- END navbar-collapsed -->
        
      <?php else : ?>
        <div id="logo" class="col-lg-2 col-md-2 col-sm-2">
          <a href="<?php echo get_bloginfo( "wpurl" ); ?>">
          <?php $logo = get_option( "theme_name_logo_link" ); ?>
            <img src="<?php echo $logo; ?>" alt="Logo">
          </a>
        </div>
      <?php endif; ?>
      </div>
    </div><!-- END header-top -->