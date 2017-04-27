<?php

/** 
 * Create Gravity Forms Phone Extension
 * plugin class
 *
 * @since 1.0.0
 */

class GF_Phone_Extension {
	
	/**
	 * Contains an instance of this class, if available.
	 *
	 * @since  1.0.0
	 * @access private
	 * @var    object $_instance If available, contains an instance of this class.
	 */
	private static $_instance = null;

	/**
	 * Defines the version of the Propstack Add-On.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string $_version Contains the version, defined from gravityforms-propstack.php
	 */
	protected $_version = GF_PHONE_EXTENSION_VERSION;

	/**
	 * Defines the minimum Gravity Forms version required.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string $_min_gravityforms_version The minimum version required.
	 */
	protected $_min_gravityforms_version = '2.2';

	/**
	 * Defines the plugin slug.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string $_slug The slug used for this plugin.
	 */
	protected $_slug = 'gravityforms-phone-extension';

	/**
	 * Defines the main plugin file.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string $_path The path to the main plugin file, relative to the plugins folder.
	 */
	protected $_path = 'gravityforms-phone-extension/gravityforms-phone-extension.php';

	/**
	 * Defines the full path to this class file.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string $_full_path The full path.
	 */
	protected $_full_path = __FILE__;

	/**
	 * Defines the URL where this Add-On can be found.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string The URL of the Add-On.
	 */
	protected $_url = 'http://www.anex.at';

	/**
	 * Defines the title of this Add-On.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string $_title The title of the Add-On.
	 */
	protected $_title = 'Gravity Forms Phone Extension Add-On';

	/**
	 * Defines the short title of the Add-On.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string $_short_title The short title.
	 */
	protected $_short_title = 'Phone Extension';

	/**
	 * Defines if Add-On should use Gravity Forms servers for update data.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    bool
	 */
	protected $_enable_rg_autoupgrade = false;

	/**
	 * Get an instance of this class.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @return GF_Phone_Extension
	 */
	public static function get_instance() {

		if ( null === self::$_instance ) {
			self::$_instance = new self;
		}

		return self::$_instance;

	}

	/**
	 * Initializes the plugin
	 *
	 * @since  1.0.0
	 * @access public
	 */
	public function __construct() {

		// Register site styles
		add_action( 'wp_enqueue_scripts', array( $this, 'assets' ) );
        
	}


	/**
	 * Register and enqueue plugin-specific assets
	 *
	 * @since  1.0.0
	 * @access public
	 */
	public function assets() {
		
		// register & enqueue styles
		wp_enqueue_style( 'intl-tel-input',					plugins_url( 'vendor/intl-tel-input/css/intlTelInput.css',		dirname( __FILE__ ) ), array(),								'11.0.11' );
		wp_enqueue_style( 'gravityforms-phone-extension',	plugins_url( 'assets/css/style.css',							dirname( __FILE__ ) ), array(),								$this->_version );

		// register & enqueue scripts
		wp_enqueue_script( 'intl-tel-input',				plugins_url( 'vendor/intl-tel-input/js/intlTelInput.min.js',	dirname( __FILE__ ) ), array( 'jquery' ),					'11.0.11',				true );
		wp_enqueue_script( 'intl-tel-input-utils',			plugins_url( 'vendor/intl-tel-input/js/utils.js',				dirname( __FILE__ ) ), array( 'jquery', 'intl-tel-input' ),	'11.0.11',				true );
		wp_enqueue_script( 'gravityforms-phone-extension',	plugins_url( 'assets/js/init.js',								dirname( __FILE__ ) ), array( 'jquery', 'intl-tel-input' ),	$this->_version,		true );

	}
	
}