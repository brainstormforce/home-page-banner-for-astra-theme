<?php
/**
 * Advanced Headers Markup
 *
 * @package Home Page Banner for Astra Theme
 * @since 1.0.0
 */

if ( ! class_exists( 'Astra_Home_Page_Banner_Markup' ) ) {

	/**
	 * Advanced Headers Markup Initial Setup
	 *
	 * @since 1.0.0
	 */
	class Astra_Home_Page_Banner_Markup {


		/**
		 * Member Variable
		 *
		 * @var object instance
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

			add_filter( 'body_class', array( $this, 'body_classes' ), 10, 1 );

			// After Headers action.
			add_action( 'astra_header_after', array( $this, 'load_markup' ), 0 );

			add_action( 'wp_enqueue_scripts', array( $this, 'add_scripts' ), 9 );

		}

		/**
		 * Add Body Classes
		 *
		 * @param  array $classes Body Class Array.
		 * @return array
		 */
		public function body_classes( $classes ) {

			if ( ! defined( 'ASTRA_THEME_SETTINGS' ) ) {
				return;
			}

			$classes[] = 'ast-home-page-banner';

			return $classes;
		}

		/**
		 * Advanced Headers markup loader
		 *
		 * Loads appropriate template file based on the style option selected in options panel.
		 *
		 * @since 1.0.0
		 */
		public function load_markup() {

			if ( ! defined( 'ASTRA_THEME_SETTINGS' ) ) {
				return;
			}

			if ( is_front_page() ) {
				$banner_heading        = astra_get_option( 'ast-banner-heading' );
				$banner_subheading     = astra_get_option( 'ast-banner-subheading' );
				$home_page_banner_size = astra_get_option( 'banner-image-size-option' );

				// Full Screen.
				$full_screen = ( 'full-size' == $home_page_banner_size ) ? ' ast-full-home-page-banner' : '';

				$html = '<div class="home-page-banner' . $full_screen . '">' .
							'<div class="heading-container">' .
								'<h2 class="banner-heading">' . $banner_heading . '</h2>' .
								'<h3 class="banner-subheading">' . $banner_subheading . '</h3>' .
							'</div>' .
						'</div>';
				echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

		}

		/**
		 * Add Styles
		 */
		public function add_scripts() {

			if ( ! defined( 'ASTRA_THEME_SETTINGS' ) ) {
				return;
			}

			if ( is_front_page() ) {
				wp_enqueue_style( 'home-page-banner-css', HOME_PAGE_BANNER_URI . 'inc/assets/css/style.css', array(), HOME_PAGE_BANNER_VER );
				wp_enqueue_script( 'home-page-banner-js', HOME_PAGE_BANNER_URI . 'inc/assets/js/home-page-banner.js', array( 'jquery' ), HOME_PAGE_BANNER_VER, false );
			}
		}
	}
}

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Astra_Home_Page_Banner_Markup::get_instance();
