<?php

/**
 * Fired during plugin activation
 *
 * @link       https://rowdydesign.com/
 * @since      1.0.0
 *
 * @package    Wise_Email_Tracker
 * @subpackage Wise_Email_Tracker/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Wise_Email_Tracker
 * @subpackage Wise_Email_Tracker/includes
 * @author     Rowdy Design <bret.mette@rowdydesign.com>
 */
class Wise_Email_Tracker_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
        
        add_rewrite_rule( '^offers/offer_([0-9]+)?', 'index.php?email=$matches[1]', 'top' );
        flush_rewrite_rules(false);

	}

}
