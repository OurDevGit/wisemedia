<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://rowdydesign.com/
 * @since      1.0.0
 *
 * @package    Wise_Email_Tracker
 * @subpackage Wise_Email_Tracker/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wise_Email_Tracker
 * @subpackage Wise_Email_Tracker/includes
 * @author     Rowdy Design <bret.mette@rowdydesign.com>
 */
class Wise_Email_Tracker_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wise-email-tracker',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
