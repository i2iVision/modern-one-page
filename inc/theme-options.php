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
function pu_theme_menu() {
  add_submenu_page( 'themes.php','About Section', 'Theme Options', 'manage_options', 'customize_theme', 'theme_custom_option' );  
}
add_action( 'admin_menu', 'pu_theme_menu' );

/**
 * Controlling every section on the theme
 * Add images, links and Coordinates for map
 * Choose number of posts or pages show in sections
 */
function theme_custom_option() {
    $logo_saved        = get_option( "theme_name_logo_link" );
    $post_saved        = get_option( "theme_name_slider_posts_number" );
    $page_saved        = get_option( "theme_name_about_section_post" );
    $portfolio_saved   = get_option( "theme_name_portfolio_section" );
    $user_saved        = get_option( "theme_name_user_section" );
    $service_saved     = get_option( "theme_name_service_section");
    $news_saved        = get_option( "theme_name_news_section" );
    $footer_saved      = get_option( "theme_name_footer_section" );
    $facebook_saved    = get_option( "theme_name_facebook_link" );
    $twitter_saved     = get_option( "theme_name_twitter_link" );
    $google_saved      = get_option( "theme_name_google_link" );
    $latitude_saved    = get_option( "theme_name_latitude" );
    $longtitude_saved  = get_option( "theme_name_longtitude" );
    $footer_logo_saved = get_option( "theme_name_footer_logo_link" );
    ?>

    <!-- UI Form to choose post -->
    <div class="wrap">
        <h1 class="center">Theme Option</h1>
        <!-- Change The Number of Posts in the Slider -->
        <form method="post" action="">
            <h2>Enter The Link of the Logo</h2>
            <input type="text" id="logo-input" name="logo" class="regular-text" value="<?php echo $logo_saved; ?>" />
            <input type="button" id="submit-logo" class="image button button-primary" value="Upload Image" />
            <br />
            <br />
            <div id="display-logo">
                <img src="<?php echo $logo_saved; ?>" width="150" height="150" />
            </div>
            <br />
            <hr />
            <h2>Choose The Number of Posts in The Slider</h2>
            <?php $posts = get_posts(); ?>
            <input type="number" name="post" min="0" value="<?php echo $post_saved; ?>" />
            <br />
            <br />
            <hr />
            <!-- Change About Section Page -->
            <h2>Choose The Post For About Secion</h2>
            <?php $pages = get_pages(); ?>
            <select name="page">
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
            <br />
            <br />
            <hr />
            <!-- Change The Number of Portfolio in Potfolio Section -->
            <h2>Choose The Number of Potfolio in Potfolio Section</h2>
            <input type="number" name="portfolio" min="0" value="<?php echo $portfolio_saved; ?>" />
            <br />
            <br />
            <hr />
            <!-- Change The Number of Users in Our Team -->
            <h2>Choose The Number of Users in Our Team Section</h2>
            <input type="number" name="user" min="0" value="<?php echo $user_saved; ?>" />
            <br />
            <br />
            <hr />
            <!-- Change About Section Page -->
            <h2>Choose The Page For Services Secion</h2>
            <?php $service_page = get_pages(); ?>
            <select name="service">
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
            <br />
            <br />
            <hr />
            <!-- Change The Number of News in News Section -->
            <h2>Choose The Number of News in News Section</h2>
            <input type="number" name="news" min="0" value="<?php echo $news_saved; ?>" />
            <br />
            <br />
            <hr />
            <!-- Google Map in Contact Section -->
            <h2>Google Map Data</h2>
            <table>
                <tr>
                    <th><label for="latitdue"><?php echo _e( "Latitude" ); ?></label></th><td><input type="text" name="latitude" id="latitdue" value="<?php echo $latitude_saved; ?>" /></td>
                </tr>
                <tr>
                    <th><label for="longtitude"><?php echo _e( "Longitude" ); ?></label></th><td><input type="text" name="longitude" id="longtitude" value="<?php echo $longtitude_saved; ?>" /></td>
                </tr>
            </table>
            <br />
            <br />
            <hr />
            <!-- Change The Number of Posts in Footer Section -->
            <h2>Choose The Number of Posts in Footer Section</h2>
            <input type="number" name="footer" min="0" value="<?php echo $footer_saved; ?>" />
            <br />
            <br />
            <hr />
            <!-- Assign Social Links for The Site In Footer Bar -->
            <h2>Assign Social Links for The Site In Footer Bar</h2>
            <table>
                <tr>
                    <th><label for="facebook"><?php echo _e( "Facebook " ); ?></label></th><td><input type="text" name="facebook" id="facebook" class="regular-text" value="<?php echo $facebook_saved; ?>" /></td>
                </tr>
                <tr>
                    <th><label for="twitter"><?php echo _e( "Twitter " ); ?></label></th><td><input type="text" name="twitter" id="twitter" class="regular-text" value="<?php echo $twitter_saved; ?>" /></td>
                </tr>
                <tr>
                    <th><label for="google"><?php echo _e( "Google+ " ); ?></label></th><td><input type="text" name="google" id="google" class="regular-text" value="<?php echo $google_saved; ?>" /></td>
                </tr>
            </table>
            <br />
            <br />            
            <hr />
            <!-- Enter Footer Logo Link -->
            <h2>Enter Footer Logo Link</h2>
            <input type="text"  name="logofooter" id="footer-input" class="regular-text" value="<?php echo $footer_logo_saved; ?>" />
            <input type="button" class="image button button-primary" value="Upload Image" />
            <br />
            <br />
            <div id="display-footer" style="background-color:#333;width:150px">
                <img src="<?php echo $footer_logo_saved; ?>" width="150" />
            </div>
            <br />
            <input type="submit" name="submit" class="button-primary" value="save">
        </form>
    </div>

    <?php
    // Save the post details in db
    if( isset($_POST['submit'])) :
        // Logo Link
        $logo = esc_attr( $_POST['logo'] );
        update_option( 'theme_name_logo_link', $logo );
        // Slider Post Section
        $post = esc_attr( $_POST['post'] );
        update_option( 'theme_name_slider_posts_number', $post );
        // About Page Section
        $page = esc_attr( $_POST['page'] );
        update_option( 'theme_name_about_section_post', $page );
        // Portfolio Section
        $portfolio = esc_attr( $_POST['portfolio'] );
        update_option( 'theme_name_portfolio_section', $portfolio );
        // Our Team Section (Users)
        $user = esc_attr( $_POST['user'] );
        update_option( 'theme_name_user_section', $user );
        // Services Section 
        $service = esc_attr( $_POST['service'] );
        update_option( 'theme_name_service_section', $service );
        // News Section 
        $new = esc_attr( $_POST['news'] );
        update_option( 'theme_name_news_section', $new );
        // Map Section 
        $latitude  = esc_attr( $_POST['latitude'] );
        $longitude = esc_attr( $_POST['longitude'] );
        update_option( 'theme_name_latitude', $latitude );
        update_option( 'theme_name_longtitude', $longitude );
        // Footer Section 
        $footers = esc_attr( $_POST['footer'] );
        update_option( 'theme_name_footer_section', $footers );
        // Social Links
        $facebook = esc_attr( $_POST['facebook'] );
        $twitter  = esc_attr( $_POST['twitter'] );
        $google   = esc_attr( $_POST['google'] );
        update_option( 'theme_name_facebook_link', $facebook );
        update_option( 'theme_name_twitter_link', $twitter );
        update_option( 'theme_name_google_link', $google );
        // Footer Logo Link
        $logo_footer = esc_attr( $_POST['logofooter'] );
        update_option( 'theme_name_footer_logo_link', $logo_footer );
        ?>
        <!-- Success Message -->
        <div id="message" class="updated notice notice-success is-dismissible">
            <p>Section Updated!</p>
            <button type="button" class="notice-dismiss">
                <span class="screen-reader-text">Dismiss this notice.</span>
            </button>
        </div>
        <?php
    endif;
}

