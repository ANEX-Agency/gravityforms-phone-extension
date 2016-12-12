<?php

/**
 * Plugin Name:       Gravity Forms - Phone Extension
 * Plugin URI:        https://github.com/ANEX-Agency/Gravityforms-Phone-Extension
 * Description:       Extends the Phone Field with a Country Code Selectbox
 * Version:           1.0.1
 * Author:            ANEX
 * Author URI:        http://anex.at
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       gravityforms-phone-extension
 * Domain Path:       /languages
 */

// If this file is called directly or Gravity Forms isn't loaded, abort.
if ( ! defined( 'WPINC' ) || ! class_exists( 'GFForms' ) ) {
	die;
}

/** 
 * Create Gravity Forms Phone Extension
 * plugin class
 *
 * @since 1.0.0
 */

class GravityForms_Phone_Extension {

	/**
	 * Initializes the plugin
	 */
	function __construct() {
		
		// Register site styles
		add_action( 'wp_enqueue_scripts', array( $this, 'assets' ) );
        
	}


	/**
	 * Register and enqueue plugin-specific assets.
	 */
	public function assets() {
		
		// register & enqueue styles
		wp_enqueue_style( 'intl-tel-input', plugins_url( 'vendor/intl-tel-input/css/intlTelInput.css', __FILE__ ), array(), '9.2.4' );
		wp_enqueue_style( 'gravityforms-phone-extension', plugins_url( 'assets/css/style.css', __FILE__ ), array(), '1.0.1' );

		// register & enqueue scripts
		wp_enqueue_script( 'intl-tel-input', plugins_url( 'vendor/intl-tel-input/js/intlTelInput.min.js', __FILE__ ), array( 'jquery' ), '9.2.4', true );
		wp_enqueue_script( 'intl-tel-input-utils', plugins_url( 'vendor/intl-tel-input/js/utils.js', __FILE__ ), array( 'jquery', 'intl-tel-input' ), '9.2.4', true );
		wp_enqueue_script( 'gravityforms-phone-extension', plugins_url( 'assets/js/init.js', __FILE__ ), array( 'jquery' ), '1.0.1', true );

	}
	
}

/**
 * Call class
 *
 * @since 1.0.0
 */
if( ! is_admin() )
	$GravityForms_Phone_Extension= new GravityForms_Phone_Extension();
