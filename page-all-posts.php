<?php
/*
Template Name: All-Posts
*/
get_header();?>
<div id="full-width-content" class="container-fluid">
  <?php 
      $args      = array( 'order'=> 'DESC', 'orderby' => 'date' );
      $postslist = get_posts( $args );
      foreach ( $postslist as $post ) :
        setup_postdata( $post ); ?>
    <div class="container <?php post_class(); ?>">
        <div class="post-title">
            <a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
        </div>
        <a href="<?php the_permalink(); ?>">
            <div class="post-thumbnail-posts"><?php the_post_thumbnail(); ?></div>
        </a>
        <div class="post-meta">
            <span class="glyphicon glyphicon-user"></span> By: <?php the_author();?>&nbsp;&nbsp;&&nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span> <?php the_time('g:i a'); ?>&nbsp;&nbsp;&&nbsp;&nbsp;<span class="glyphicon glyphicon-calendar"></span> <?php the_time( get_option( 'date_format' ) ); ?>
        </div>
        <div class="post-content"><?php the_content('Read More'); ?></div>
    </div>
    <?php endforeach; ?>
     <?php wp_reset_postdata(); ?>
</div>
<?php get_footer();?>
