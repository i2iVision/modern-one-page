<?php get_header();?>

<div id="full-width-content" class="container-fluid">
    <?php if(have_posts()) : while(have_posts()) : the_post();?>
    <div class="container">
        <div class="post-title">
            <h1><?php the_title(); ?></h1>
        </div>
        <div class="post-thumbnail"><?php the_post_thumbnail(); ?></div>
        <div class="post-meta">
            <span class="glyphicon glyphicon-user"></span> By: <?php the_author();?>&nbsp;&nbsp;&&nbsp;&nbsp;
            <span class="glyphicon glyphicon-time"></span> <?php the_time('g:i a'); ?>&nbsp;&nbsp;&&nbsp;&nbsp;<span class="glyphicon glyphicon-calendar"></span> 
            <?php the_time( get_option( 'date_format' ) ); ?>
        </div>
        <div class="post-content"><?php the_content(); ?></div>
        <div class="next-post"><?php next_post_link(); ?></div>
        <div class="previous-post"><?php previous_post_link(); ?></div>
    </div>
    <?php endwhile; ?>
    <?php else : ?>
    <p>No posts in this page.</p>
    <?php endif; ?>

</div>

<?php get_footer();?>