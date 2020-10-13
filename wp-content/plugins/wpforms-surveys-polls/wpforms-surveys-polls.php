<?php
/**
 * Plugin Name:       WPForms Surveys and Polls
 * Plugin URI:        https://wpforms.com
 * Description:       Create Surveys and Polls with WPForms.
 * Requires at least: 4.9
 * Requires PHP:      5.4
 * Author:            WPForms
 * Author URI:        https://wpforms.com
 * Version:           1.6.2
 * Text Domain:       wpforms-surveys-polls
 * Domain Path:       languages
 *
 * WPForms is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * WPForms is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with WPForms. If not, see <http://www.gnu.org/licenses/>.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Plugin constants.
define( 'WPFORMS_SURVEYS_POLLS_VERSION', '1.6.2' );
define( 'WPFORMS_SURVEYS_POLLS_FILE', __FILE__ );

/**
 * Check addon requirements.
 * We do it on `plugins_loaded` hook. If earlier - core constants still not defined.
 *
 * @since 1.6.1
 */
function wpforms_surveys_polls_required() {

	if ( version_compare( PHP_VERSION, '5.4', '<' ) ) {
		add_action( 'admin_init', 'wpforms_surveys_polls_deactivate' );
		add_action( 'admin_notices', 'wpforms_surveys_polls_deactivate_msg' );

	} elseif ( ! defined( 'WPFORMS_VERSION' ) || version_compare( WPFORMS_VERSION, '1.6.0.1', '<' ) ) {
		add_action( 'admin_init', 'wpforms_surveys_polls_deactivate' );
		add_action( 'admin_notices', 'wpforms_surveys_polls_fail_wpforms_version' );

	} else {
		// Actually, load the addon now.
		require_once __DIR__ . '/autoloader.php';
	}
}

add_action( 'plugins_loaded', 'wpforms_surveys_polls_required' );

/**
 * Deactivate plugin.
 *
 * @since 1.0.0
 */
function wpforms_surveys_polls_deactivate() {

	deactivate_plugins( plugin_basename( __FILE__ ) );
}

/**
 * Display notice after deactivation.
 *
 * @since 1.0.0
 */
function wpforms_surveys_polls_deactivate_msg() {

	echo '<div class="notice notice-error"><p>';
	printf(
		wp_kses(
			/* translators: %s - WPForms.com documentation page URL. */
			__( 'The WPForms Surveys and Poll plugin has been deactivated. Your site is running an outdated version of PHP that is no longer supported and is not compatible with the Surveys and Polls addon. <a href="%s" target="_blank" rel="noopener noreferrer">Read more</a> for additional information.', 'wpforms-surveys-polls' ),
			array(
				'a' => array(
					'href'   => array(),
					'rel'    => array(),
					'target' => array(),
				),
			)
		),
		'https://wpforms.com/docs/supported-php-version/'
	);
	echo '</p></div>';

	if ( isset( $_GET['activate'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		unset( $_GET['activate'] ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	}
}

/**
 * Admin notice for minimum WPForms version.
 *
 * @since 1.6.1
 */
function wpforms_surveys_polls_fail_wpforms_version() {

	echo '<div class="notice notice-error"><p>';
	esc_html_e( 'The WPForms Surveys and Polls plugin has been deactivated, because it requires WPForms v1.6.0.1 or later to work.', 'wpforms-surveys-polls' );
	echo '</p></div>';

	// phpcs:disable
	if ( isset( $_GET['activate'] ) ) {
		unset( $_GET['activate'] );
	}
	// phpcs:enable
}
