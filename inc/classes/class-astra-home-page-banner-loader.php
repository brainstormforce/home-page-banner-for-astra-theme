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
			add_action( 'customize_preview_init', array( $this, 'preview_scripts' ) );
			add_action( 'customize_register', array( $this, 'customize_register' ) );
			add_action( 'customize_controls_enqueue_scripts', array( $this, 'controls_scripts' ) );
			add_action( 'astra_get_fonts', array( $this, 'add_fonts' ) );

		}

		/**
		 * Set Options Default Values
		 *
		 * @param  array $defaults  Astra options default value array.
		 * @return array
		 */
		function theme_defaults( $defaults ) {

			$defaults['ast-banner-heading']     			= __( 'Heading', 'home-page-banner' );
			$defaults['ast-banner-subheading']  			= __( 'Sub Heading', 'home-page-banner' );
			$defaults['banner-font-family'] 				= 'inherit';
			$defaults['banner-font-weight'] 				= 'inherit';
			$defaults['banner-subheading-font-family'] 		= 'inherit';
			$defaults['banner-subheading-font-weight'] 		= 'inherit';
			$defaults['banner-heading-text-transform']		= '';
			$defaults['banner-heading-font-size']			= '';
			$defaults['banner-subheading-text-transform']	= '';
			$defaults['banner-subheading-font-size']		= '';
			$defaults['banner-bg-color'] 					= '#ffffff';
			$defaults['banner-subheading-bg-color'] 		= '#ffffff';
			$defaults['banner-image-size-option'] 			= 'custom-size';
			$defaults['banner-custom-top-padding'] 			= '5';
			$defaults['banner-custom-bottom-padding'] 		= '5';

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
		function preview_scripts() {

			wp_enqueue_script( 'home-page-banner-preview', ASTRA_HOME_PAGE_BANNER_URI . 'inc/assets/js/customizer-preview.js', array( 'astra-customizer-preview-js', 'customize-preview' ), ASTRA_HOME_PAGE_BANNER_VER, true );
		}

		/**
		 * Customizer Preview
		 */
		function controls_scripts() {

			wp_enqueue_script( 'home-page-banner-toggles', ASTRA_HOME_PAGE_BANNER_URI . 'inc/assets/js/customizer-toggles.js', array( 'astra-customizer-controls-toggle-js' ), ASTRA_HOME_PAGE_BANNER_VER, true );
		}

		/**
		 * Add Fonts
		 */
		public function add_fonts() {

			$font_family = astra_get_option( 'banner-font-family' );
			$font_weight = astra_get_option( 'banner-font-weight' );

			Astra_Fonts::add_font( $font_family, $font_weight );
			
			$subheading_font_family = astra_get_option( 'banner-subheading-font-family' );
			$subheading_font_weight = astra_get_option( 'banner-subheading-font-weight' );

			Astra_Fonts::add_font( $subheading_font_family, $subheading_font_weight );
		}
	}

}

/**
 * Kicking this off by calling 'get_instance()' method
 */
Astra_Home_Page_Banner_Loader::get_instance();
