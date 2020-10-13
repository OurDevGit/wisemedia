<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://rowdydesign.com/
 * @since      1.0.0
 *
 * @package    Wise_Email_Tracker
 * @subpackage Wise_Email_Tracker/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wise_Email_Tracker
 * @subpackage Wise_Email_Tracker/public
 * @author     Rowdy Design <bret.mette@rowdydesign.com>
 */
class Wise_Email_Tracker_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}
    
    public function add_email_query_var( $vars ) {
        
        $vars[] = 'email';
        
        return $vars;
        
    }
    
    public function check_for_email_clicks( ) {
        
        $email_id = get_query_var( 'email' );
        
        if ( $email_id && (int)$email_id > 0 ) {
            $date_clicked = get_post_meta( $post_id, 'date_clicked', true );

            if ( ! $date_clicked ) {
                $date_format = get_option( 'date_format' );
                $time_format = get_option( 'time_format' );

                $format = $date_format . ' ' . $time_format;

                $date = date( $format, time() + (60 * 60 * get_option('gmt_offset') ) );

                update_post_meta( $email_id, 'date_clicked', $date );            
            }        

            wp_redirect( get_home_url() );
            exit;            
        }
    }

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wise_Email_Tracker_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wise_Email_Tracker_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wise-email-tracker-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wise_Email_Tracker_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wise_Email_Tracker_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wise-email-tracker-public.js', array( 'jquery' ), $this->version, false );

	}
    
    public function offers_rewrite_rule() {
        
        add_rewrite_rule( '^offers/offer_([0-9]+)?', 'index.php?email=$matches[1]', 'top' );
        
    }

}
