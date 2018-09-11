<?php

GFForms::include_addon_framework();

/** 
 * Create Gravity Forms Phone Extension
 * plugin class
 *
 * @since 1.0.0
 */

class GF_Phone_Extension extends GFAddon {
	
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
	 * Plugin starting point. Handles hooks, and loading of language files.
	 *
	 * @since  1.2.0
	 * @access public
	 */
	public function init() {

		parent::init();

	}

	/**
	 * Register needed styles.
	 *
	 * @since  1.2.0
	 * @access public
	 *
	 * @return array
	 */
	public function styles() {

		$styles = array(
			array(
				'handle'	=> 'intl-tel-input',
				'src'		=> $this->get_base_url() . '/vendor/intl-tel-input/css/intlTelInput.min.css',
				'version'	=> '11.0.11',
				'enqueue'	=> array(
					array( 'field_types' => array( 'phone' ) )
				),
			),
			array(
				'handle'	=> $this->_slug,
				'src'		=> $this->get_base_url() . '/assets/css/style.css',
				'version'	=> $this->_version,
				'enqueue'	=> array(
					array( 'field_types' => array( 'phone' ) )
				),
			),
		);

		return array_merge( parent::styles(), $styles );

	}

	/**
	 * Register needed scripts.
	 *
	 * @since  1.2.0
	 * @access public
	 *
	 * @return array
	 */
	public function scripts() {

		$scripts = array(
			array(
				'handle'	=> 'intl-tel-input',
				'src'		=> $this->get_base_url() . '/vendor/intl-tel-input/js/intlTelInput.min.js',
				'deps'		=> array( 'jquery' ),
				'version'	=> '11.0.11',
				'in_footer' => true,
				'enqueue'	=> array(
					array( 'field_types' => array( 'phone' ) )
				),
			),
			array(
				'handle'	=> 'intl-tel-input-utils',
				'src'		=> $this->get_base_url() . '/vendor/intl-tel-input/js/utils.js',
				'deps'		=> array( 'jquery', 'intl-tel-input' ),
				'version'	=> '11.0.11',
				'in_footer' => true,
				'enqueue'	=> array(
					array( 'field_types' => array( 'phone' ) )
				),
			),
			array(
				'handle'	=> $this->_slug,
				'src'		=> $this->get_base_url() . '/assets/js/init.js',
				'deps'		=> array( 'jquery', 'intl-tel-input' ),
				'version'	=> $this->_version,
				'in_footer' => true,
				'enqueue'	=> array(
					array( 'field_types' => array( 'phone' ) )
				),
			),
		);

		return array_merge( parent::scripts(), $scripts );

	}

}