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
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 *  Constructor
		 */
		public function __construct() {

			add_action( 'admin_notices', array( $this, 'add_notice' ), 1 );
			add_filter( 'astra_theme_defaults', array( $this, 'theme_defaults' ) );
			add_action( 'customize_preview_init', array( $this, 'preview_scripts' ) );
			add_action( 'customize_register', array( $this, 'customize_register' ), 2 );
			add_action( 'customize_controls_enqueue_scripts', array( $this, 'controls_scripts' ) );
			add_action( 'astra_get_fonts', array( $this, 'add_fonts' ) );

		}

		/**
		 * Add Admin Notice.
		 */
		public function add_notice() {

			if ( ! defined( 'ASTRA_THEME_SETTINGS' ) ) {
				$plugin_name = 'Home Page Banner';
				printf( wp_kses_post( '<div class="notice notice-error is-dismissible"><p>Astra Theme needs to be active for you to use currently installed "%1$s" plugin. <a href="%2$s">Install & Activate Now</a></p></div>', 'home-page-banner' ), esc_html( $plugin_name ), esc_url( admin_url( 'themes.php?theme=astra' ) ) );
			}
		}

		/**
		 * Set Options Default Values
		 *
		 * @param  array $defaults  Astra options default value array.
		 * @return array
		 */
		public function theme_defaults( $defaults ) {

			$defaults['ast-banner-heading']               = __( 'Perfect Theme for Any Website', 'home-page-banner' );
			$defaults['ast-banner-subheading']            = __( 'Lightning Fast & Easily Customizable', 'home-page-banner' );
			$defaults['banner-font-family']               = 'inherit';
			$defaults['banner-font-weight']               = 'inherit';
			$defaults['banner-subheading-font-family']    = 'inherit';
			$defaults['banner-subheading-font-weight']    = 'inherit';
			$defaults['banner-heading-text-transform']    = '';
			$defaults['banner-heading-font-size']         = '';
			$defaults['banner-subheading-text-transform'] = '';
			$defaults['banner-subheading-font-size']      = '';
			$defaults['banner-bg-color']                  = '#ffffff';
			$defaults['banner-subheading-bg-color']       = '#ffffff';
			$defaults['banner-image-size-option']         = 'custom-size';
			$defaults['banner-custom-top-padding']        = '10';
			$defaults['banner-custom-bottom-padding']     = '10';
			$defaults['home-page-banner-image']           = HOME_PAGE_BANNER_URI . 'inc/assets/images/banner.jpg';

			return $defaults;
		}

		/**
		 * Add postMessage support for site title and description for the Theme Customizer.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		public function customize_register( $wp_customize ) {

			if ( ! defined( 'ASTRA_THEME_SETTINGS' ) ) {
				return;
			}

			/**
			 * Register Sections & Panels
			 */
			require_once HOME_PAGE_BANNER_DIR . 'inc/classes/customizer-panels-and-sections.php';

			/**
			 * Sections
			 */
			require_once HOME_PAGE_BANNER_DIR . 'inc/classes/sections/section-banner.php';
			require_once HOME_PAGE_BANNER_DIR . 'inc/classes/sections/class-astra-customizer-home-page-banner-configs.php';
		}

		/**
		 * Customizer Controls
		 *
		 * @see 'astra-customizer-controls-js' panel in parent theme
		 */
		public function preview_scripts() {

			wp_enqueue_script( 'home-page-banner-preview', HOME_PAGE_BANNER_URI . 'inc/assets/js/customizer-preview.js', array( 'astra-customizer-preview-js', 'customize-preview' ), HOME_PAGE_BANNER_VER, true );
		}

		/**
		 * Customizer Preview
		 */
		public function controls_scripts() {

			wp_enqueue_script( 'home-page-banner-toggles', HOME_PAGE_BANNER_URI . 'inc/assets/js/customizer-toggles.js', array( 'astra-customizer-controls-toggle-js' ), HOME_PAGE_BANNER_VER, true );
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
