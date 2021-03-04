<?php
/**
 * Plugin Name: Home Page Banner for Astra Theme
 * Plugin URI: https://wpastra.com/
 * Description: This plugin is an add-on for the Astra WordPress Theme. It will help in adding a beautiful banner to your home page.
 * Version: 1.0.3
 * Author: Brainstorm Force
 * Author URI: http://www.brainstormforce.com
 * Text Domain: home-page-banner
 *
 * @package Home Page Banner for Astra Theme
 */

/**
 * Set constants.
 */

if ( ! defined( 'HOME_PAGE_BANNER_VER' ) ) {
	define( 'HOME_PAGE_BANNER_VER', '1.0.3' );
}

if ( ! defined( 'HOME_PAGE_BANNER_FILE' ) ) {
	define( 'HOME_PAGE_BANNER_FILE', __FILE__ );
}

if ( ! defined( 'HOME_PAGE_BANNER_BASE' ) ) {
	define( 'HOME_PAGE_BANNER_BASE', plugin_basename( HOME_PAGE_BANNER_FILE ) );
}

if ( ! defined( 'HOME_PAGE_BANNER_DIR' ) ) {
	define( 'HOME_PAGE_BANNER_DIR', plugin_dir_path( HOME_PAGE_BANNER_FILE ) );
}

if ( ! defined( 'HOME_PAGE_BANNER_URI' ) ) {
	define( 'HOME_PAGE_BANNER_URI', plugins_url( '/', HOME_PAGE_BANNER_FILE ) );
}


if ( ! function_exists( 'home_page_banner_setup' ) ) :

	/**
	 * Astra Home Page Banner Setup
	 *
	 * @since 1.0.0
	 */
	function home_page_banner_setup() {
		require_once HOME_PAGE_BANNER_DIR . 'inc/class-astra-home-page-banner.php';
	}

	add_action( 'after_setup_theme', 'home_page_banner_setup' );

endif;
