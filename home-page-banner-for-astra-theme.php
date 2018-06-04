<?php
/**
 * Plugin Name: Home Page Banner for Astra Theme
 * Plugin URI: https://wpastra.com/
 * Description: This plugin is an add-on for the Astra WordPress Theme. It will help in adding a beautiful banner to your home page.
 * Version: 1.0.0
 * Author: Brainstorm Force, Balachandar Karuparthy
 * Author URI: http://www.brainstormforce.com
 * Text Domain: home-page-banner
 *
 * @package Home Page Banner for Astra Theme
 */


/**
 * Set constants.
 */

if ( ! defined( 'ASTRA_HOME_PAGE_BANNER_VER' ) ) {
	define( 'ASTRA_HOME_PAGE_BANNER_VER', '1.0.0' );
}

if ( ! defined( 'ASTRA_HOME_PAGE_BANNER_FILE' ) ) {
	define( 'ASTRA_HOME_PAGE_BANNER_FILE', __FILE__ );
}

if ( ! defined( 'ASTRA_HOME_PAGE_BANNER_BASE' ) ) {
	define( 'ASTRA_HOME_PAGE_BANNER_BASE', plugin_basename( ASTRA_HOME_PAGE_BANNER_FILE ) );
}

if ( ! defined( 'ASTRA_HOME_PAGE_BANNER_DIR' ) ) {
	define( 'ASTRA_HOME_PAGE_BANNER_DIR', plugin_dir_path( '/', ASTRA_HOME_PAGE_BANNER_FILE ) );
}

if ( ! defined( 'ASTRA_HOME_PAGE_BANNER_URI' ) ) {
	define( 'ASTRA_HOME_PAGE_BANNER_URI', plugins_url( '/', ASTRA_HOME_PAGE_BANNER_FILE ) );
}


if ( ! function_exists( 'astra_home_page_banner_setup' ) ) :

	/**
	 * Astra Home Page Banner Setup
	 *
	 * @since 1.0.0
	 */
	function astra_home_page_banner_setup() {
		require_once ASTRA_HOME_PAGE_BANNER_DIR . 'inc/class-astra-home-page-banner.php';
	}

	add_action( 'plugins_loaded', 'astra_home_page_banner_setup' );

endif;
