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
			add_action( 'customize_preview_init', array( $this, 'controls_scripts' ) );
			add_action( 'customize_register', array( $this, 'customize_register' ) );

		}

		/**
		 * Set Options Default Values
		 *
		 * @param  array $defaults  Astra options default value array.
		 * @return array
		 */
		function theme_defaults( $defaults ) {

			$defaults['ast-banner-heading']     		= __( 'Heading', 'astra' );
			$defaults['ast-banner-subheading']  		= __( 'Sub Heading', 'astra' );
			$defaults['font-family-banner'] 			= 'inherit';
			$defaults['font-weight-banner'] 			= 'inherit';
			$defaults['banner-bg-color'] 				= '#ffffff';
			$defaults['banner-image-size-option'] 		= 'custom-size';
			$defaults['banner-custom-top-padding'] 		= '5';
			$defaults['banner-custom-bottom-padding'] 	= '5';

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

			wp_enqueue_script( 'home-page-banner-preview', ASTRA_HOME_PAGE_BANNER_URI . 'inc/assets/js/unminified/customizer-preview.js', array( 'astra-customizer-preview-js', 'customize-preview' ), ASTRA_HOME_PAGE_BANNER_VER, true );
			wp_enqueue_script( 'home-page-banner-toggles', ASTRA_HOME_PAGE_BANNER_URI . 'inc/assets/js/minified/customizer-toggles.js', array( 'astra-customizer-controls-toggle-js' ), ASTRA_HOME_PAGE_BANNER_VER, true );
		}
	}

}

/**
 * Kicking this off by calling 'get_instance()' method
 */
Astra_Home_Page_Banner_Loader::get_instance();
