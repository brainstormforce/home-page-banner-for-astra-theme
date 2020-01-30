<?php
/**
 * Astra Home Page Banner
 *
 * @package Home Page Banner for Astra Theme
 * @since 1.0.0
 */

if ( ! class_exists( 'Astra_Home_Page_Banner' ) ) {

	/**
	 * Advanced Headers Initial Setup
	 *
	 * @since 1.0.0
	 */
	class Astra_Home_Page_Banner {


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
		 * Constructor function that initializes required actions and hooks
		 */
		public function __construct() {

			require_once HOME_PAGE_BANNER_DIR . 'inc/classes/class-astra-home-page-banner-loader.php';
			require_once HOME_PAGE_BANNER_DIR . 'inc/classes/class-astra-home-page-banner-markup.php';

			// Include front end files.
			if ( ! is_admin() && 'astra' === get_template() ) {
				require_once HOME_PAGE_BANNER_DIR . 'inc/classes/dynamic.css.php';
			}

		}
	}

	/**
	 *  Kicking this off by calling 'get_instance()' method
	 */
	Astra_Home_Page_Banner::get_instance();

}
