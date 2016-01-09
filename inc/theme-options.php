<?php
/**
 * Theme Option page that control every section of the theme
 * 
 * @package Modern_One_Page 
 * 
 */

/**
 * Add new page "Theme Options" to Theme menu
 */
function admin_theme_menu() {
  add_submenu_page( 'themes.php','About Section', 'Theme Options', 'manage_options', 'customize_theme', 'theme_custom_option' );  
}
add_action( 'admin_menu', 'admin_theme_menu' );

/**
 * Success notice when update data
 */
function theme_updated() {
    $class = "updated";
    $id = "message";
    $message = "Updated!";
    echo"<div class=\"$class\" id=\"$id\"> <p>$message</p></div>";
}

/**
 * Save data updated in db
 */
function mop_save_theme_option() {

    if( isset($_POST['submit_mop']) ) :
        // Data retrieved from form
        $theme_options['theme_name_logo_link']           = esc_attr( $_POST['logo'] );
        $theme_options['theme_name_slider_posts_number'] = esc_attr( $_POST['post'] );
        $theme_options['theme_name_about_section_post']  = esc_attr( $_POST['page'] );
        $theme_options['theme_name_portfolio_section']   = esc_attr( $_POST['portfolio'] );
        $theme_options['theme_name_user_section']        = esc_attr( $_POST['user'] );
        $theme_options['theme_name_service_section']     = esc_attr( $_POST['service'] );
        $theme_options['theme_name_news_section']        = esc_attr( $_POST['news'] );
        $theme_options['theme_name_latitude']            = esc_attr( $_POST['latitude'] );
        $theme_options['theme_name_longtitude']          = esc_attr( $_POST['longitude'] );
        $theme_options['theme_name_footer_section']      = esc_attr( $_POST['footer'] );
        $theme_options['theme_name_facebook_link']       = esc_attr( $_POST['facebook'] );
        $theme_options['theme_name_twitter_link']        = esc_attr( $_POST['twitter'] );
        $theme_options['theme_name_google_link']         = esc_attr( $_POST['google'] );
        $theme_options['theme_name_footer_logo_link']    = esc_attr( $_POST['logofooter'] );
        // Update data into db
        update_option( 'mop_theme_option', $theme_options );
        // Display Updated Message
        add_action( 'admin_notices', 'theme_updated' );
    endif;
}
add_action( 'admin_init', 'mop_save_theme_option' );

/**
 * Controlling every section on the theme
 * Add images, links and Coordinates for map
 * Choose number of posts or pages show in sections
 */
function theme_custom_option() {
    // Retrieve data to fill inputs
    add_option('mop_theme_option');
    $theme_options = get_option( 'mop_theme_option' );

    $logo_saved        = $theme_options['theme_name_logo_link'];
    $post_saved        = $theme_options['theme_name_slider_posts_number'];
    $page_saved        = $theme_options['theme_name_about_section_post'];
    $portfolio_saved   = $theme_options['theme_name_portfolio_section'] ;
    $user_saved        = $theme_options['theme_name_user_section'];
    $service_saved     = $theme_options['theme_name_service_section'];
    $news_saved        = $theme_options['theme_name_news_section'];
    $footer_saved      = $theme_options['theme_name_footer_section'];
    $facebook_saved    = $theme_options['theme_name_facebook_link'];
    $twitter_saved     = $theme_options['theme_name_twitter_link'];
    $google_saved      = $theme_options['theme_name_google_link'];
    $latitude_saved    = $theme_options['theme_name_latitude'];
    $longtitude_saved  = $theme_options['theme_name_longtitude'];
    $footer_logo_saved = $theme_options['theme_name_footer_logo_link'];
    ?>
    <div class="wrap">
        <h1>Theme Option</h1>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#content"><strong>Section Content</strong></a></li>
            <li><a data-toggle="tab" href="#logos"><strong>Logos</strong></a></li>
            <li><a data-toggle="tab" href="#maps"><strong>Google Maps</strong></a></li>
            <li><a data-toggle="tab" href="#social"><strong>Social links</strong></a></li>
        </ul>
        <br />
        <form method="post" action="">
            <div class="tab-content">
                <!-- Content Tab -->
                <div id="content" class="tab-pane fade in active">
                    <div class="row">
                        <div class="col-md-4 col-xs-6">
                            <strong>Choose The Number of Posts in The Slider</strong>
                        </div>
                        <?php $posts = get_posts(); ?>
                        <div class="col-md-4 col-xs-6">
                            <input type="number" class="form-control" name="post" min="0" value="<?php echo $post_saved; ?>" />
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    <br />
                    <div class="row">
                        <!-- Change About Section Page -->
                        <div class="col-md-4 col-xs-6">
                            <strong>Choose The Page For About Secion</strong>
                        </div>
                        <?php $pages = get_pages(); ?>
                        <div class="col-md-4 col-xs-6">
                            <select name="page" class="form-control">
                                <?php foreach ($pages as $about_page) : ?>
                                        <?php 
                                        if ($about_page->ID == $page_saved) : ?>
                                    <option value="<?php echo $about_page->ID; ?>" selected>
                                        <?php echo $about_page->post_title; ?>
                                    </option>
                                        <?php else : ?>
                                    <option value="<?php echo $about_page->ID; ?>">
                                        <?php echo $about_page->post_title; ?>
                                    </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    <br />
                        <!-- Change The Number of Portfolio in Potfolio Section -->
                    <div class="row">
                        <div class="col-md-4 col-xs-6">
                            <strong>Choose The Number of Potfolio in Potfolio Section</strong>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <input class="form-control" type="number" name="portfolio" min="0" value="<?php echo $portfolio_saved; ?>" />
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    <br />
                        <!-- Change The Number of Users in Our Team -->
                    <div class="row">
                        <div class="col-md-4 col-xs-6">
                            <strong>Choose The Number of Users in Our Team Section</strong>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <input type="number" class="form-control" name="user" min="0" value="<?php echo $user_saved; ?>" />
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    <br />
                        <!-- Change About Section Page -->
                    <div class="row">
                        <div class="col-md-4 col-xs-6">
                            <strong>Choose The Page For Services Secion</strong>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <?php $service_page = get_pages(); ?>
                            <select name="service" class="form-control">
                                <?php 
                                    foreach ( $service_page as $custom_page ) : ?>
                                        <?php 
                                        if ( $custom_page->ID == $service_saved ) : ?>
                                            <option value="<?php echo $custom_page->ID; ?>" selected>
                                                <?php echo $custom_page->post_title; ?>
                                            </option>
                                        <?php else : ?>
                                            <option value="<?php echo $custom_page->ID; ?>">
                                                <?php echo $custom_page->post_title; ?>
                                            </option>
                                        <?php 
                                        endif; ?>
                                <?php 
                                    endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    <br />    
                    <!-- Change The Number of News in News Section -->
                    <div class="row">
                        <div class="col-md-4 col-xs-6">
                            <strong>Choose The Number of Posts in News Section</strong>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <input type="number" class="form-control" name="news" min="0" value="<?php echo $news_saved; ?>" />
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    <br />
                    <!-- Change The Number of Posts in Footer Section -->
                    <div class="row">
                        <div class="col-md-4">
                            <strong>Choose The Number of Posts in Footer Section</strong>
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="footer" min="0" value="<?php echo $footer_saved; ?>" />
                        </div>
                        <div class="col-md-4"></div>
                    </div>    
                </div>
                <!-- Social links Tab -->
                <div id="social" class="tab-pane fade">
                  <!-- Assign Social Links for The Site In Footer Bar -->
                    <div class="row">
                        <!-- Facebook -->
                        <div class="col-md-2 col-xs-6">
                            <strong><label for="facebook">Facebook</label></strong>
                        </div>
                        <?php $posts = get_posts(); ?>
                        <div class="col-md-4 col-xs-6">
                            <input type="text" name="facebook" id="facebook" class="regular-text" value="<?php echo $facebook_saved; ?>" />
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    <br />
                    <div class="row">
                        <!-- Twitter -->
                        <div class="col-md-2 col-xs-6">
                            <strong><label for="twitter">Twitter </label></strong>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <input type="text" name="twitter" id="twitter" class="regular-text" value="<?php echo $twitter_saved; ?>" />
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    <br />
                    <div class="row">
                        <!-- Google Plus -->
                        <div class="col-md-2 col-xs-6">
                            <strong><label for="google">Google+ </label></strong>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <input type="text" name="google" id="google" class="regular-text" value="<?php echo $google_saved; ?>" />
                        </div>
                        <div class="col-md-4"></div>
                    </div> 
                </div>
                <!-- Google Maps -->
                <div id="maps" class="tab-pane fade">
                  <!-- Google Map in Contact Section -->
                    <p class="lead">Google Map Data</p>
                    <div class="row">
                        <div class="col-md-2">
                            <strong><label for="latitdue">Latitude</label></strong>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="latitude" id="latitdue" value="<?php echo $latitude_saved; ?>" />
                        </div>
                        <div class="col-md-5"></div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-md-2">
                            <strong><label for="longtitude">Longitude</label></strong>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="longitude" id="longtitude" value="<?php echo $longtitude_saved; ?>" />
                        </div>
                        <div class="col-md-5"></div>
                    </div>
                </div>
                <!-- Logos -->
                <div id="logos" class="tab-pane fade">
                    <!-- Header Logo -->
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div id="display-logo" class="col-md-4">
                            <img src="<?php echo $logo_saved; ?>" width="150" height="150" />
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-md-3">
                            <strong>Header Logo</strong>
                        </div>
                        <div class="col-md-5">
                            <input type="text" id="logo-input" name="logo" class="regular-text" value="<?php echo $logo_saved; ?>" />
                            <input type="button" id="submit-logo" class="image button button-primary" value="Upload Image" />
                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>
                    <br />
                    <!-- Footer Logo -->
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div id="display-footer" class="col-md-4">
                            <img src="<?php echo $footer_logo_saved; ?>" width="150" />
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-md-3">
                            <strong>Footer Logo</strong>
                        </div>
                        <div class="col-md-5">
                            <input type="text"  name="logofooter" id="footer-input" class="regular-text" value="<?php echo $footer_logo_saved; ?>" />
                            <input type="button" class="image button button-primary" value="Upload Image" />
                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>
                </div>
            </div>
            <br />
            <input type="submit" name="submit_mop" class="button-primary" value="save">
        </form>
    </div>
            
    <?php
}
