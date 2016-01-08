<?php
/*
Template Name: Registeration
*/

/*
* Validation and Confirmation the Registeration form 
*/
$name = $email = $failed = "";
if ('POST' == $_SERVER['REQUEST_METHOD']) {
	$name 	  = esc_attr( $_POST['user_login'] );
	$password = esc_attr( $_POST['user_pass'] );
	$email 	  = esc_attr( $_POST['user_email'] );
	// Check for existing data in the form
	if ( !empty($name) && !empty($password) && !empty($email) ) {
		// Check valid email form
		if ( is_email($email) ) {
			// Check email exist in DB
			if ( ! email_exists($email) ) {
				// Check username exist in DB
				if ( ! username_exists($name) ) {
					$userdata = array(
							'user_login' => $name,
							'user_email' => $email,
							'user_pass'  => $password
							);
					$user_id = wp_insert_user( $userdata );
					// Check if Registeration Success
					if ( ! is_wp_error( $user_id ) ) {
					    wp_redirect( home_url() . "/wp-login.php" ); exit;
					} else {
						$failed = "Failed to register Please try again!";
					}
				} else {
					$failed = "This Username is already exist!";
				}
			} else {
				$failed = "This Email is already exist!";
			}
		} else {
			$failed = "Please Enter a valid Email!";
		}
	} else {
		$failed = "Please Complete all inputs!";
	}
}
get_header();
?>

<div id="full-width-content" class="container-fluid">
	<div class="container">
		<div class="post-title">
            <h1>Registeration Form</h1>
        </div>
        <div class="post-content">
	        <div id="tab2_login" class="row">
	        	<div class="col-md-4"></div>
	        	<div class="col-md-5 col-sx-12">
					<form method="post" action="" class="wp-user-form">

							<label for="user_login"><?php _e('Username '); ?>: </label>
							<input type="text" name="user_login" id="user_login" value="<?php echo $name; ?>" />
							<br /><br />
							<label for="user_email"><?php _e('Your Email'); ?>: </label>
							<input type="text" name="user_email" id="user_email" value="<?php echo $email; ?>" />
							<br /><br />
							<label for="password"><?php _e('Password '); ?>: </label>
							<input type="password" name="user_pass"  id="password" />
							<br /><br />
							<input type="submit" name="user-submit" class="user-submit" />
					</form>
					<?php echo $failed; ?>
				</div>
	        	<div class="col-md-3"></div>
			</div>
		</div>
	</div>
</div>
<?php 
get_footer(); 
?>