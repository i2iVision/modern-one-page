<?php 
/**
 * Custom field for admin user page
 * Add social links to every user, and give authorization to appear in our team section
 * @package Modern_One_Page
 */

// Show social field in admin user page
add_action( 'show_user_profile', 'add_user_custom_fields' );
add_action( 'edit_user_profile', 'add_user_custom_fields' );

/**
 * Add Extra Fields to Admin User Page 
 * @param [Object array] $user 
 * @return [HTMl]
 */
function add_user_custom_fields( $user ) { ?>
  <h3><?php _e( "Extra profile information", "blank" ); ?></h3>
  <table class="form-table">
    <tr>
        <th><label><?php _e( "Type" ); ?></label></th>
        <td>
        <input type="checkbox" name="type" id="type" value="team" 
        <?php if (get_the_author_meta( 'type', $user->ID ) == "team") {echo "checked";} ?> /> <label for="type">Our Team</label><br />
        </td>
    </tr>
        <!-- Make Social links for Users -->
    <tr>
        <th><label><?php _e( "Facebook Link" ) ?></label></th>
        <td><input type="text" name="facebook" class="regular-text" value="<?php echo get_the_author_meta( 'facebook', $user->ID ); ?>" /></td>
    </tr>
    <tr>
        <th><label><?php _e( "Twitter Link" ) ?></label></th>
        <td><input type="text" name="twitter" class="regular-text" value="<?php echo get_the_author_meta( 'twitter', $user->ID ); ?>" /></td>
    </tr>
    <tr>
        <th><label><?php _e( "Google+ Link" ) ?></label></th>
        <td><input type="text" name="google" id="user-input" class="regular-text" value="<?php echo get_the_author_meta( 'google', $user->ID ); ?>" /></td>
    </tr>
  </table>
<?php
}

// Edit social field in admin user page
add_action( 'personal_options_update', 'save_user_custom_fields' );
add_action( 'edit_user_profile_update', 'save_user_custom_fields' );
/**
 * [save_user_custom_fields]
 * Save Data posted in user extra fields
 * @param type $user_id 
 * @return Boolean
 */
function save_user_custom_fields( $user_id ) {
  $saved = false;
  if ( current_user_can( 'edit_user', $user_id ) ) {
    update_user_meta( $user_id, 'type', $_POST['type'] );
    update_user_meta( $user_id, 'facebook', $_POST['facebook'] );
    update_user_meta( $user_id, 'twitter', $_POST['twitter'] );
    update_user_meta( $user_id, 'google', $_POST['google'] );
    $saved = true;
  }
  return $saved;
}