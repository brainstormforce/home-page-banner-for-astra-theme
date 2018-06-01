<?php
/**
 * Astra Home Page Banner - Customizer.
 *
 * @package Home Page Banner for Astra Theme
 * @since 1.0.0
 */

if ( ! class_exists( 'Astra_Home_Page_Banner_Loader' ) ) {

	/**
	 * Customizer Initialization
	 *
	 * @since 1.0.0
	 */
	class Astra_Home_Page_Banner_Loader {

		/**
		 * Member Variable
		 *
		 * @var instance
		 */
		private static $instance;

		/**
		 *  Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 *  Constructor
		 */
		public function __construct() {

			add_filter( 'astra_theme_defaults', array( $this, 'theme_defaults' ) );
			add_action( 'customize_controls_enqueue_scripts', array( $this, 'controls_scripts' ), 9 );
			add_action( 'customize_register', array( $this, 'customize_register' ) );

		}

		/**
		 * Set Options Default Values
		 *
		 * @param  array $defaults  Astra options default value array.
		 * @return array
		 */
		function theme_defaults( $defaults ) {

			// Blog / Archive.
			// $defaults['blog-masonry']               = false;

			return $defaults;
		}

		/**
		 * Add postMessage support for site title and description for the Theme Customizer.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		function customize_register( $wp_customize ) {

			/**
			 * Register Sections & Panels
			 */
			require_once ASTRA_HOME_PAGE_BANNER_DIR . 'customizer-panels-and-sections.php';

			/**
			 * Sections
			 */
			require_once ASTRA_HOME_PAGE_BANNER_DIR . 'sections/section-banner.php';
		}

		/**
		 * Customizer Controls
		 *
		 * @see 'astra-customizer-controls-js' panel in parent theme
		 */
		function controls_scripts() {

			// if ( SCRIPT_DEBUG ) {
			// 	wp_enqueue_script( 'astra-ext-blog-pro-customizer-toggles', ASTRA_EXT_BLOG_PRO_URI . 'assets/js/unminified/customizer-toggles.js', array( 'astra-customizer-controls-toggle-js' ), ASTRA_EXT_VER, true );
			// } else {
			// 	wp_enqueue_script( 'astra-ext-blog-pro-customizer-toggles', ASTRA_EXT_BLOG_PRO_URI . 'assets/js/minified/customizer-toggles.min.js', array( 'astra-customizer-controls-toggle-js' ), ASTRA_EXT_VER, true );
			// }
		}
	}

}

/**
 * Kicking this off by calling 'get_instance()' method
 */
Astra_Home_Page_Banner_Loader::get_instance();
