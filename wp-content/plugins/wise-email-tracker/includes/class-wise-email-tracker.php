<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://rowdydesign.com/
 * @since      1.0.0
 *
 * @package    Wise_Email_Tracker
 * @subpackage Wise_Email_Tracker/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Wise_Email_Tracker
 * @subpackage Wise_Email_Tracker/includes
 * @author     Rowdy Design <bret.mette@rowdydesign.com>
 */
class Wise_Email_Tracker {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Wise_Email_Tracker_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'WISE_EMAIL_TRACKER_VERSION' ) ) {
			$this->version = WISE_EMAIL_TRACKER_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'wise-email-tracker';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Wise_Email_Tracker_Loader. Orchestrates the hooks of the plugin.
	 * - Wise_Email_Tracker_i18n. Defines internationalization functionality.
	 * - Wise_Email_Tracker_Admin. Defines all hooks for the admin area.
	 * - Wise_Email_Tracker_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wise-email-tracker-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wise-email-tracker-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wise-email-tracker-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-wise-email-tracker-public.php';

		$this->loader = new Wise_Email_Tracker_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Wise_Email_Tracker_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Wise_Email_Tracker_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Wise_Email_Tracker_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
        
        // Email CPT
        $this->loader->add_action( 'init', $plugin_admin, 'define_cpt_email' );
        $this->loader->add_filter( 'manage_email_posts_columns', $plugin_admin, 'manage_email_posts_columns' );
        $this->loader->add_action( 'manage_posts_custom_column', $plugin_admin, 'manage_email_posts_custom_column_content', 10, 2 );
        
        // Email Subscriber CPT
        $this->loader->add_action( 'init', $plugin_admin, 'define_cpt_email_subscriber' );        
        
        // Email Template CPT
        $this->loader->add_action( 'init', $plugin_admin, 'define_cpt_email_template' );
        $this->loader->add_filter( 'user_can_richedit', $plugin_admin, 'disable_wysiwyg_editor_for_email_template_cpt' );
        $this->loader->add_action( 'add_meta_boxes_email_template', $plugin_admin, 'add_email_actions_meta_box_to_email_template_cpt' );
        $this->loader->add_action( 'admin_menu', $plugin_admin, 'add_page_to_send_emails' );
        
        $this->loader->add_action( 'wp_ajax_wet_send_emails', $plugin_admin, 'handle_request_to_send_emails' );


	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Wise_Email_Tracker_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
        
        $this->loader->add_action( 'init', $plugin_public, 'offers_rewrite_rule', 10, 0 );
        
        $this->loader->add_action( 'template_redirect', $plugin_public, 'check_for_email_clicks' );
        
        $this->loader->add_filter( 'query_vars', $plugin_public, 'add_email_query_var' );


	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Wise_Email_Tracker_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
