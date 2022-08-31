<?php
/**
 * krischan back compat functionality
 *
 * Prevents krischan from running on WordPress versions prior to 4.1,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.1.
 *
 * @package WordPress
 * @subpackage Krischan
 * subpackage Krischan 1.0
 */

/**
 * Prevent switching to krischan on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * subpackage Krischan 1.0
 */
function krischan_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'krischan_upgrade_notice' );
}
add_action( 'after_switch_theme', 'krischan_switch_theme' );

/**
 * Add message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * krischan on WordPress versions prior to 4.1.
 *
 * subpackage Krischan 1.0
 */
function krischan_upgrade_notice() {
	$message = sprintf( __( 'krischan requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'krischan' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevent the Customizer from being loaded on WordPress versions prior to 4.1.
 *
 * subpackage Krischan 1.0
 */
function krischan_customize() {
	wp_die( sprintf( __( 'krischan requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'krischan' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'krischan_customize' );

/**
 * Prevent the Theme Preview from being loaded on WordPress versions prior to 4.1.
 *
 * subpackage Krischan 1.0
 */
function krischan_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'krischan requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'krischan' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'krischan_preview' );
