<?php 
if ( is_front_page() ) :
    $footer       = get_option("theme_name_footer_section");
    $footer_args  = array(
                    'category_name'  => 'footer',
                    'posts_per_page' => $footer
                    );
    $footer_query = new WP_Query($footer_args);
    if ($footer > 0) :
    ?>
    <div id="footer-wrapper" class="container-fluid">
        <div class="container" id="footer-content">
            <div class="row" id="footer-widgets">
                <ul>
                <?php 
                global $more; 
                // query_posts("showposts=".$footer); 
                if ( $footer_query->have_posts() ) : 
                  while ( $footer_query->have_posts() ) : 
                    $footer_query->the_post(); 
                    $more = 1;  
                ?>
              <div class="widget col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <h2><?php the_title(); ?></h2>
                  <p><?php the_content(); ?></p>
              </div>
                <?php 
                  endwhile;
                endif; ?>
                </ul>
            </div><!-- END footer-widgets -->
        </div><!-- END footer-content -->
    </div><!-- END footer-wrapper -->
<?php endif; 
endif;?><!-- End front page condition -->
<div class="container-fluid" id="footer-links">
  <div class="container">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">&copy; COPYRIGHT <?php echo date( 'Y' ); ?>, <?php bloginfo( 'name' ); ?></div>

    <?php 
    $facebook = get_option( "theme_name_facebook_link" );
    $twitter  = get_option( "theme_name_twitter_link" );
    $google   = get_option( "theme_name_google_link" );
     ?>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <a href="<?php echo $facebook; ?>"><i class="fa fa-lg fa-facebook"></i></a>
        <a href="<?php echo $twitter; ?>"><i class="fa fa-lg fa-twitter"></i></a>
        <a href="<?php echo $google; ?>"><i class="fa fa-lg fa-google-plus"></i></a>
        <a href="<?php bloginfo('rss_url'); ?>"><i class="fa fa-lg fa-rss"></i></a>
    </div>
    <?php $logo_footer = get_option( 'theme_name_footer_logo_link' ); ?>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><a href="<?php echo get_bloginfo("wpurl"); ?>"><img src="<?php echo $logo_footer; ?>" alt="Site By: i2i Vision Designs"></a></div>
  </div>
</div><!-- END footer-links -->

<?php wp_footer(); ?>
</body>
</html>