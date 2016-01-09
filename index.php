<?php get_header();?>

<?php 
// Retrieve data
$theme_options = get_option( 'mop_theme_option' );

$post_number = $theme_options['theme_name_slider_posts_number'];
$the_post_query = new WP_Query(array('category_name' => 'slider', 'posts_per_page' => $post_number));
     ?>
<div id="header-wrapper" class="container-fluid">
  <ul class="bxslider">
    <?php query_posts('showposts='.$post_number); 
    if ( $the_post_query->have_posts() ) :
        while ( $the_post_query->have_posts() ) : 
            $the_post_query->the_post(); ?>
    <li>
        <div class="slide-title">
            <h1><a href="<?php the_permalink(); ?>"><?php the_content(""); ?></a></h1>
            <div class="slide-read-more"><a href="<?php the_permalink(); ?>">Read More <span class="glyphicon glyphicon-circle-arrow-right"></span></a></div>
        </div>
        <?php the_post_thumbnail(); ?>
    </li>
    <?php endwhile; ?>
    <?php else : ?>
    <p>Error in search.</p>
    <?php endif; ?>
  </ul>

  <!-- This is an alternative to the slider in small size devices -->
    <div class="header-articles-links">
        <?php 
        query_posts('showposts='.$post_number); 
        if ( $the_post_query->have_posts() ) :
            while ( $the_post_query->have_posts() ) : $the_post_query->the_post(); ?>
        <div class="one-block">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
            <h1><a href="<?php the_permalink(); ?>"><?php the_content(""); ?></a></h1>
            <div class="header-post-meta"><span class="glyphicon glyphicon-time"></span> <?php the_time('g:i a'); ?> & <span class="glyphicon glyphicon-calendar"></span> <?php the_time( get_option( 'date_format' ) ); ?></div>
            <div class="read-more-button"><a href="<?php the_permalink(); ?>">Read More</a></div>
        </div><!-- END one-block -->
        <?php endwhile; ?>
        <?php 
        else : ?>
        <p>Error in search.</p>
        <?php 
        endif; ?>

    </div><!-- header-articles-links -->
</div><!-- END header-wrapper -->

<?php 
$about = $theme_options["theme_name_about_section_post"]; 
$posts = get_post($about);
if ($posts->post_status == "publish") :
?>
<div id="about-wrapper" class="container-fluid">
    <div class="container" id="about-content">
        <div class="row">

            <div class="about-image col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <?php 
                if (has_post_thumbnail($about)) : 
                    echo get_the_post_thumbnail($about, 'tutorial-thumb-size'); 
                endif; 
                ?>
            </div>
            <div class="about-text col-lg-8 col-md-8 col-sm-8 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
              <h1 class="about-title"><?php echo $posts->post_title; ?></h1>
              <div class="about-p"><?php echo $posts->post_content; ?></div>
            </div>
        </div>
    </div><!-- END about-content -->
</div><!-- END about-wrapper -->
<?php endif; ?>

<?php 
$service_id = $theme_options["theme_name_service_section"]; 
$service_page = get_post($service_id);
if ($service_page->post_status == "publish") :
?>
<div id="services-wrapper" class="container-fluid">
    <div class="container" id="services-content">
        <div class="services-title"><h1>Our Services</h1></div>
        <div class="row" id="services-blocks">
                    <?php echo $service_page->post_content; ?>
        </div>
    </div><!-- END services-content -->
</div><!-- END services-wrapper -->
<?php endif; ?>

<?php
    $portfolio_number = $theme_options["theme_name_portfolio_section"];
    
    $the_portfolio_query = new WP_Query(array('category_name' => 'portfolio', 'posts_per_page' => $portfolio_number));
    $counter = 0;
    $const = 5;
if ($portfolio_number > 0) :
?>
<!-- Start portfolio-wrapper -->
<div id="portfolio-wrapper" class="container-fluid">
    <div class="container" id="portfolio-content">
        <div class="portfolio-title"><h1>Portfolio</h1></div>
        <div class="portfolio-blocks row">
            
            <?php if ( $the_portfolio_query->have_posts() ) : ?>
            <?php while ( $the_portfolio_query->have_posts() ) : $the_portfolio_query->the_post(); ?>
                <?php   $counter++;
                    if ($counter > $const) : $const += 5; ?>
                        
        </div>
        <div class="portfolio-blocks row">
            <?php endif; ?>
              <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>

            <?php wp_reset_postdata(); ?>

            <?php endwhile; ?>
            <?php else : ?>
            	<p>No Portfolio Yet!</p>
            <?php endif; ?>
        </div><!-- END portfolio-blocks -->
    </div><!-- END portfolio-content -->
</div><!-- END portfolio-wrapper -->
<?php endif; ?>

<?php 
$users_number = $theme_options["theme_name_user_section"];

$users = get_users( array('orderby' => 'nicename', 'number' => $users_number, 'meta_key' => 'type', 'meta_value' => 'team',) ); 
if ($users_number > 0) :
?>
<div id="team-wrapper" class="container-fluid">
    <div class="container" id="team-content">
        <div class="team-title"><h1>Our Team</h1></div>
        <div class="row">
            <?php 
            foreach($users as $user) :
                $user_id = $user->ID;
                $user_name = $user->display_name;
                $description = preg_replace('/\s+?(\S+)?$/', '', substr($user->description, 0, 250));
            ?>
            <div class="team-one-block col-lg-3 col-md-3 col-sm-3 col-xs-6">
                <div class="team-member-img"><?php echo get_avatar($user_id,96); ?></div>
                <div class="team-member-name"><h3><?php echo $user_name; ?></h3></div>
                
                <div class="team-member-description"><p><?php echo $description."."; ?></p></div><div class="team-member-social-icons">
                    <a href="<?php echo esc_attr($user->facebook); ?>" target="_blank"><i class="fa fa-2x fa-facebook"></i></a>
                    <a href="<?php echo esc_attr($user->twitter); ?>" target="_blank"><i class="fa fa-2x fa-twitter"></i></a>
                    <a href="<?php echo esc_attr($user->google); ?>" target="_blank"><i class="fa fa-2x fa-google-plus"></i></a>
                </div>
            </div><!-- END team-one-block -->
            <?php 
            endforeach; 
            ?>
        </div>
    </div><!-- END team-content -->
</div><!-- END team-wrapper -->
<?php endif; ?>

<?php 
$news = $theme_options["theme_name_news_section"];
if($news > 0) :
 ?>
<div id="news-wrapper" class="container-fluid">
    <div class="container" id="news-content">
        <div class="news-title"><h1>News</h1></div>
        <div class="row">
            <?php query_posts('showposts='.$news); if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="one-news-block col-lg-12">
                <a href="<?php the_permalink(); ?>"><div class="news-img"><?php the_post_thumbnail(); ?></div></a>
                <div class="news-meta"><span class="glyphicon glyphicon-time"></span> <?php the_time('g:i a'); ?> & <span class="glyphicon glyphicon-calendar"></span> <?php the_time( get_option( 'date_format' ) ); ?></div>
                <div class="news-one-title"><h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1></div>
                <div class="news-p"><?php the_content('<div class="read-more"><span class="glyphicon glyphicon-circle-arrow-right"></span> Read More</div>');?></div>

            </div><!-- END one-news-block -->
            <?php endwhile; ?>
            <?php else : ?>
            <p>Error in search.</p>
            <?php endif; ?>

            <div class="see-all-news"><a href="all-posts">See All News&nbsp;&nbsp;<span class="glyphicon glyphicon-align-center"></span></a></div>
        </div>
    </div><!-- END news-content -->
</div><!-- END news-wrapper -->
<?php endif; ?>

<!-- Start Send Contact Form -->
<?php 
$complete = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") :
    $name = esc_attr($_POST["username"]);
    $mail = esc_attr($_POST["mail"]);
    $title = $name . " - " . $mail;
    $content = esc_attr($_POST["message"]);
    if ($name && $mail && $content) :

        $my_post = array(
              'post_title'    => $title,
              'post_type'    => 'contact',
              'post_content'  => $content,
              'post_status'   => 'draft'
            );

        // Insert the post into the database
        wp_insert_post( $my_post );
    else :
    	$complete = "Please Complete Your Info.";
    endif;
endif;
 ?>
<!-- End Send Contact Form -->

<?php 
$longitude = $theme_options["theme_name_longtitude"];
$latitude = $theme_options["theme_name_latitude"];
$address = $longitude . "," . $latitude; ?>
<div id="contact-wrapper" class="container-fluid" style="background-image: url(http://maps.googleapis.com/maps/api/staticmap?center=<?php echo $address; ?>&zoom=13&scale=2&size=1280x1280&maptype=roadmap&sensor=true&format=png&language=en&visual_refresh=true&markers=size:mid%7Ccolor:red%7C)">
   <div id="contact-wrapper-opacity-bg">
       <div class="container" id="contact-content">
            <div class="contact-title"><h1>Contact Us</h1></div>
            <div class="contact-form row">
                <form method="post" action="" id="form">
                    <div class="name-input">
                        <input type="text" placeholder="Name" name="username" id="name">
                    </div>
                    <div class="email-input">
                        <input type="email" placeholder="email" name="mail" id="mail">
                    </div>
                    <div class="subject-input">
                        <input type="text" placeholder="subject" name="subject" id="subject">
                    </div>
                    <div class="text-area">
                        <textarea placeholder="Message" name="message" id="message"></textarea>
                    </div>
                    <div class="complete">
                        <p><?php echo $complete; ?></p>
                    </div>
                    <div class="send-button">
                        <input type="submit" name="submit" value="Send" id="press">
                    </div>
                </form>
            </div>
      </div><!-- END contact-content -->
  </div><!-- END contact-wrapper-opacity-bg -->
</div><!-- END contact-wrapper -->

<?php get_footer(); ?>