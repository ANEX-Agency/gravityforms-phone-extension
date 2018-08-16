<?php

/**
 * Plugin Name:       Gravity Forms Phone Extension
 * Plugin URI:        https://github.com/ANEX-Agency/Gravityforms-Phone-Extension
 * Description:       Extends the Phone Field with a Country Code Selectbox
 * Version:           1.2.1
 * Author:            ANEX
 * Author URI:        http://anex.at
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       gravityforms-phone-extension
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'GF_PHONE_EXTENSION_VERSION', '1.2.1' );

add_action( 'gform_loaded', array( 'GF_Phone_Extension_Bootstrap', 'load' ), 5 );

class GF_Phone_Extension_Bootstrap {

	public static function load(){
		
		if ( ! method_exists( 'GFForms', 'include_addon_framework' ) ) {
			return;
		}

		require_once( 'class-gf-phone-extension.php' );

		GFAddOn::register( 'GF_Phone_Extension' );
	}
}

function gf_phone_extension(){
	return GF_Phone_Extension::get_instance();
}