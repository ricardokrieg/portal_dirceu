<?php
/**
 * Apex Team back compat functionality
 *
 * Prevents Apex Team from running on WordPress versions prior to 3.6,
 * since this theme is not meant to be backward compatible beyond that
 * and relies on many newer functions and markup changes introduced in 3.6.
 *
 * @package WordPress
 * @subpackage Apex_Team
 * @since Apex Team 1.0
 */

/**
 * Prevent switching to Apex Team on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Apex Team 1.0
 *
 * @return void
 */
function apexteam_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'apexteam_upgrade_notice' );
}
add_action( 'after_switch_theme', 'apexteam_switch_theme' );

/**
 * Add message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Apex Team on WordPress versions prior to 3.6.
 *
 * @since Apex Team 1.0
 *
 * @return void
 */
function apexteam_upgrade_notice() {
	$message = sprintf( __( 'Apex Team requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', 'apexteam' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevent the Theme Customizer from being loaded on WordPress versions prior to 3.6.
 *
 * @since Apex Team 1.0
 *
 * @return void
 */
function apexteam_customize() {
	wp_die( sprintf( __( 'Apex Team requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', 'apexteam' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'apexteam_customize' );

/**
 * Prevent the Theme Preview from being loaded on WordPress versions prior to 3.4.
 *
 * @since Apex Team 1.0
 *
 * @return void
 */
function apexteam_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'Apex Team requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', 'apexteam' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'apexteam_preview' );
