<?php
/**
 * mon_cahier Theme Options
 *
 * @package mon_cahier
 * @since mon_cahier 1.0
 */

/**
 * Register the form setting for our mon_cahier_options array.
 *
 * This function is attached to the admin_init action hook.
 *
 * This call to register_setting() registers a validation callback, mon_cahier_theme_options_validate(),
 * which is used when the option is saved, to ensure that our option values are complete, properly
 * formatted, and safe.
 *
 * We also use this function to add our theme option if it doesn't already exist.
 *
 * @since mon_cahier 1.0
 */


add_action( 'admin_init', 'mon_cahier_options_init' );
add_action( 'admin_menu', 'mon_cahier_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function mon_cahier_options_init(){
	register_setting( 'mon_cahier_options', 'mon_cahier_theme_options', 'mon_cahier_options_validate' );
}

/**
 * Load up the menu page
 */
function mon_cahier_options_add_page() {
	add_theme_page( __( 'Theme Options', 'mon_cahier' ), __( 'Theme Options', 'mon_cahier' ), 'edit_theme_options', 'theme_options', 'mon_cahier_options_do_page' );
}

/**
 * Create the options page
 */
function mon_cahier_options_do_page() {

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;
	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . wp_get_theme() . __( ' Theme Options', 'mon_cahier' ) . "</h2>"; ?>
		<p><?php _e( 'These options will let you setup the social icons at the top of the theme and your link and navigation colours. You can enter the URLs of your profiles to have the icons show up.', 'mon_cahier' ); ?></p>
		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'mon_cahier' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'mon_cahier_options' ); ?>
			<?php $options = get_option( 'mon_cahier_theme_options' ); ?>

			<table class="form-table">

				<?php
				/**
				 * RSS Icon
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Hide RSS Icon?', 'mon_cahier' ); ?></th>
					<td>
						<input id="mon_cahier_theme_options" name="mon_cahier_theme_options[hiderss]" type="checkbox" value="1" <?php checked( '1', $options['hiderss'] ); ?> />
						<label class="description" for="mon_cahier_theme_options[hiderss]"><?php _e( 'Hide the RSS feed icon?', 'mon_cahier' ); ?></label>
					</td>
				</tr>

				<?php
				/**
				 * Facebook Icon
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Facebook URL', 'mon_cahier' ); ?></th>
					<td>
						<input id="mon_cahier_theme_options" class="regular-text" type="text" name="mon_cahier_theme_options[facebookurl]" value="<?php esc_attr_e( $options['facebookurl'] ); ?>" />
						<label class="description" for="mon_cahier_theme_options[facebookurl]"><?php _e( 'Leave blank to hide Facebook Icon', 'mon_cahier' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Twitter URL
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Twitter URL', 'mon_cahier' ); ?></th>
					<td>
						<input id="mon_cahier_theme_options" class="regular-text" type="text" name="mon_cahier_theme_options[twitterurl]" value="<?php esc_attr_e( $options['twitterurl'] ); ?>" />
						<label class="description" for="mon_cahier_theme_options[twitterurl]"><?php _e( 'Leave blank to hide Twitter Icon', 'mon_cahier' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * You tube
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Youtube URL', 'mon_cahier' ); ?></th>
					<td>
						<input id="mon_cahier_theme_options" class="regular-text" type="text" name="mon_cahier_theme_options[youtubeurl]" value="<?php esc_attr_e( $options['youtubeurl'] ); ?>" />
						<label class="description" for="mon_cahier_theme_options[youtubeurl]"><?php _e( 'Leave blank to hide You Tube Icon', 'mon_cahier' ); ?></label>
					</td>
				</tr>
				<?php
				/**
				 * Pinterest
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Pinterest URL', 'mon_cahier' ); ?></th>
					<td>
						<input id="mon_cahier_theme_options" class="regular-text" type="text" name="mon_cahier_theme_options[pinetresturl]" value="<?php esc_attr_e( $options['pinetresturl'] ); ?>" />
						<label class="description" for="mon_cahier_theme_options[pinetresturl]"><?php _e( 'Leave blank to hide Pintrest Icon', 'mon_cahier' ); ?></label>
					</td>
				</tr>
				<?php
				/**
				 * LinkedIn
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your LinkedIn URL', 'mon_cahier' ); ?></th>
					<td>
						<input id="mon_cahier_theme_options" class="regular-text" type="text" name="mon_cahier_theme_options[linkedinurl]" value="<?php esc_attr_e( $options['linkedinurl'] ); ?>" />
						<label class="description" for="mon_cahier_theme_options[linkedinurl]"><?php _e( 'Leave blank to hide LinkedIn Icon', 'mon_cahier' ); ?></label>
					</td>
				</tr>
				<?php
				/**
				 * Google Plus
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Google Plus URL', 'mon_cahier' ); ?></th>
					<td>
						<input id="mon_cahier_theme_options" class="regular-text" type="text" name="mon_cahier_theme_options[googleplusurl]" value="<?php esc_attr_e( $options['googleplusurl'] ); ?>" />
						<label class="description" for="mon_cahier_theme_options[googleplusurl]"><?php _e( 'Leave blank to hide Google + Icon', 'mon_cahier' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Vimeo
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Vimeo URL', 'mon_cahier' ); ?></th>
					<td>
						<input id="mon_cahier_theme_options" class="regular-text" type="text" name="mon_cahier_theme_options[vimeourl]" value="<?php esc_attr_e( $options['vimeourl'] ); ?>" />
						<label class="description" for="mon_cahier_theme_options[vimeourl]"><?php _e( 'Leave blank to hide Vimeo Icon', 'mon_cahier' ); ?></label>
					</td>
				</tr>
				<?php
				/**
				 * Flickr
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Flickr URL', 'mon_cahier' ); ?></th>
					<td>
						<input id="mon_cahier_theme_options" class="regular-text" type="text" name="mon_cahier_theme_options[flickrurl]" value="<?php esc_attr_e( $options['flickrurl'] ); ?>" />
						<label class="description" for="mon_cahier_theme_options[flickrurl]"><?php _e( 'Leave blank to hide Flickr Icon', 'mon_cahier' ); ?></label>
					</td>
				</tr>	
				
			<?php
			/**
			 * Link Colours		
		 	*/
			?>
			<tr valign="top"><th scope="row"><?php _e( 'Link Colour', 'mon_cahier' ); ?></th>
				<td>
					<input id="mon_cahier_theme_options" class="regular-text" type="text" name="mon_cahier_theme_options[link_color]" value="<?php esc_attr_e( $options['link_color'] ); ?>" />
					<label class="description" for="mon_cahier_theme_options[link_color]"><?php _e( 'Leave blank to black default', 'mon_cahier' ); ?></label>
				</td>
			</tr>
			<?php
			/**
			 * Navigation Colours		
		 	*/
			?>
			<tr valign="top"><th scope="row"><?php _e( 'Rollover Colour', 'mon_cahier' ); ?></th>
				<td>
					<input id="mon_cahier_theme_options" class="regular-text" type="text" name="mon_cahier_theme_options[rollover_color]" value="<?php esc_attr_e( $options['rollover_color'] ); ?>" />
					<label class="description" for="mon_cahier_theme_options[rollover_color]"><?php _e( 'Leave blank to black default', 'mon_cahier' ); ?></label>
				</td>
			</tr>
						
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'mon_cahier' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function mon_cahier_options_validate( $input ) {

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['hiderss'] ) )
		$input['hiderss'] = null;
		$input['hiderss'] = ( $input['hiderss'] == 1 ? 1 : 0 );

	// Our text option must be safe text with no HTML tags
	$input['twitterurl'] = wp_filter_nohtml_kses( $input['twitterurl'] );
	$input['facebookurl'] = wp_filter_nohtml_kses( $input['facebookurl'] );
	$input['youtubeurl'] = wp_filter_nohtml_kses( $input['youtubeurl'] );
	$input['vimeourl'] = wp_filter_nohtml_kses( $input['vimeourl'] );
	$input['flickrurl'] = wp_filter_nohtml_kses( $input['flickrurl'] );
	$input['pinetresturl'] = wp_filter_nohtml_kses( $input['pinetresturl'] );
	$input['linkedinurl'] = wp_filter_nohtml_kses( $input['linkedinurl'] );
	$input['googleplusurl'] = wp_filter_nohtml_kses( $input['googleplusurl'] );
	$input['link_color'] = wp_filter_nohtml_kses( $input['link_color'] );
	$input['rollover_color'] = wp_filter_nohtml_kses( $input['rollover_color'] );
	
	// Encode URLs
	$input['twitterurl'] = esc_url_raw( $input['twitterurl'] );
	$input['facebookurl'] = esc_url_raw( $input['facebookurl'] );
	$input['youtubeurl'] = esc_url_raw( $input['youtubeurl'] );
	$input['vimeourl'] = esc_url_raw( $input['vimeourl'] );
	$input['pinetresturl'] = esc_url_raw( $input['pinetresturl'] );
	$input['linkedinurl'] = esc_url_raw( $input['linkedinurl'] );
	$input['googleplusurl'] = esc_url_raw( $input['googleplusurl'] );
	$input['flickrurl'] = esc_url_raw( $input['flickrurl'] );
	$input['link_color'] = esc_url_raw( $input['link_color'] );
	$input['rollover_color'] = esc_url_raw( $input['rollover_color'] );
	
	return $input;
}
