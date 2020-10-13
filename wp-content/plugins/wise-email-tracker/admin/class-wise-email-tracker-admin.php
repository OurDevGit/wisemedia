<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://rowdydesign.com/
 * @since      1.0.0
 *
 * @package    Wise_Email_Tracker
 * @subpackage Wise_Email_Tracker/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wise_Email_Tracker
 * @subpackage Wise_Email_Tracker/admin
 * @author     Rowdy Design <bret.mette@rowdydesign.com>
 */
class Wise_Email_Tracker_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}
    
    protected function get_all_email_subscribers() {
        
        $subscribers = array();
        
        $query = new WP_Query(array(
            'post_type' => 'email_subscriber',
            'post_status' => 'publish',
            'posts_per_page' => -1,
        ));


        while ($query->have_posts()) {
            $query->the_post();
            $subscribers[] = get_post();
        }

        wp_reset_query();
        
        return $subscribers;
        
    }
    
    protected function render_template_body_for_email( $template, $email ) {
        
        $template_body = $template->post_content;
        
        $template_body = str_replace( '[tracking_link]', '<a href="' . site_url() . '/offers/offer_' . $email->ID . '">', $template_body );
        $template_body = str_replace( '[/tracking_link]', '</a>', $template_body );
        
        return $template_body;
        
    }
    
    protected function send_email( $email_to, $email_subject, $email_body ) {
        
        $headers = array( 
            'Content-Type: text/html; charset=UTF-8',
        );
        
        wp_mail( $email_to, $email_subject, $email_body, $headers );
        
    }
    
    public function add_email_actions_meta_box_to_email_template_cpt() {
        
        add_meta_box(
            'email-actions',
            __( 'Email Actions', 'sitepoint' ),
            array( $this, 'email_template_email_actions_meta_box_callback' ),
            'email_template',
            'side'
        );        
        
    }
    
    public function add_page_to_send_emails() {
        
        add_submenu_page( 
            null,                                                // -> Set to null - will hide menu link
            'Send Emails',                                       // -> Page Title
            'Send Emails',                                       // -> Title that would otherwise appear in the menu
            'administrator',                                     // -> Capability level
            'wise_email_template_send',                          // -> Still accessible via admin.php?page=menu_handle
            array( $this, 'wise_email_template_send_render' )    // -> To render the page
        );
        
    }
    
    /**
	 * Define CPT Email
	 *
	 * @since    1.0.0
	 */
	public function define_cpt_email() {

		$labels = array(
			'name'                  => _x( 'Emails', 'wise-email-template' ),
			'singular_name'         => _x( 'Email', 'wise-email-template' ),
			'menu_name'             => __( 'Emails', 'wise-email-template' ),
			'name_admin_bar'        => __( 'Email', 'wise-email-template' ),
			'archives'              => __( 'Email Archives', 'wise-email-template' ),
			'attributes'            => __( 'Email Attributes', 'wise-email-template' ),
			'parent_item_colon'     => __( 'Parent Item:', 'wise-email-template' ),
			'all_items'             => __( 'All Emails', 'wise-email-template' ),
			'add_new_item'          => __( 'Add New Email', 'wise-email-template' ),
			'add_new'               => __( 'Add New', 'wise-email-template' ),
			'new_item'              => __( 'New Email', 'wise-email-template' ),
			'edit_item'             => __( 'Edit Email', 'wise-email-template' ),
			'update_item'           => __( 'Update Email', 'wise-email-template' ),
			'view_item'             => __( 'View Email', 'wise-email-template' ),
			'view_items'            => __( 'View Emails', 'wise-email-template' ),
			'search_items'          => __( 'Search Emails', 'wise-email-template' ),
			'not_found'             => __( 'Not found', 'wise-email-template' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'wise-email-template' ),
			'featured_image'        => __( 'Featured Image', 'wise-email-template' ),
			'set_featured_image'    => __( 'Set featured image', 'wise-email-template' ),
			'remove_featured_image' => __( 'Remove featured image', 'wise-email-template' ),
			'use_featured_image'    => __( 'Use as featured image', 'wise-email-template' ),
			'insert_into_item'      => __( 'Insert into email', 'wise-email-template' ),
			'uploaded_to_this_item' => __( 'Uploaded to this email', 'wise-email-template' ),
			'items_list'            => __( 'Items list', 'wise-email-template' ),
			'items_list_navigation' => __( 'Items list navigation', 'wise-email-template' ),
			'filter_items_list'     => __( 'Filter items list', 'wise-email-template' ),
		);

		$args = array(
			'label'                 => __( 'Email', 'wise-email-template' ),
			'description'           => __( 'Email', 'wise-email-template' ),
			'labels'                => $labels,
			'supports'              => array( 'title' ),
			'taxonomies'            => array( ),
			'hierarchical'          => false,
			'public'                => false,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => false,
			'show_in_nav_menus'     => false,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => false,
			'capability_type'       => 'post',
            'capabilities' => array(
                'create_posts' => 'do_not_allow',
            ),
            'map_meta_cap' => false,  // disable editing and deleting
		);
		register_post_type( 'email', $args );
		
	}
    
	/**
	 * Define CPT Email Template
	 *
	 * @since    1.0.0
	 */
	public function define_cpt_email_template() {

		$labels = array(
			'name'                  => _x( 'Email Templates', 'wise-email-template' ),
			'singular_name'         => _x( 'Email Template', 'wise-email-template' ),
			'menu_name'             => __( 'Email Templates', 'wise-email-template' ),
			'name_admin_bar'        => __( 'Email Template', 'wise-email-template' ),
			'archives'              => __( 'Template Archives', 'wise-email-template' ),
			'attributes'            => __( 'Template Attributes', 'wise-email-template' ),
			'parent_item_colon'     => __( 'Parent Item:', 'wise-email-template' ),
			'all_items'             => __( 'All Templates', 'wise-email-template' ),
			'add_new_item'          => __( 'Add New Template', 'wise-email-template' ),
			'add_new'               => __( 'Add New', 'wise-email-template' ),
			'new_item'              => __( 'New Template', 'wise-email-template' ),
			'edit_item'             => __( 'Edit Template', 'wise-email-template' ),
			'update_item'           => __( 'Update Template', 'wise-email-template' ),
			'view_item'             => __( 'View Template', 'wise-email-template' ),
			'view_items'            => __( 'View Templates', 'wise-email-template' ),
			'search_items'          => __( 'Search Templates', 'wise-email-template' ),
			'not_found'             => __( 'Not found', 'wise-email-template' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'wise-email-template' ),
			'featured_image'        => __( 'Featured Image', 'wise-email-template' ),
			'set_featured_image'    => __( 'Set featured image', 'wise-email-template' ),
			'remove_featured_image' => __( 'Remove featured image', 'wise-email-template' ),
			'use_featured_image'    => __( 'Use as featured image', 'wise-email-template' ),
			'insert_into_item'      => __( 'Insert into template', 'wise-email-template' ),
			'uploaded_to_this_item' => __( 'Uploaded to this template', 'wise-email-template' ),
			'items_list'            => __( 'Items list', 'wise-email-template' ),
			'items_list_navigation' => __( 'Items list navigation', 'wise-email-template' ),
			'filter_items_list'     => __( 'Filter items list', 'wise-email-template' ),
		);

		$args = array(
			'label'                 => __( 'Email Template', 'wise-email-template' ),
			'description'           => __( 'Email marketing template', 'wise-email-template' ),
			'labels'                => $labels,
			'supports'              => array( ),
			'taxonomies'            => array( ),
			'hierarchical'          => false,
			'public'                => false,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => false,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => false,
			'capability_type'       => 'page',
		);
		register_post_type( 'email_template', $args );
		
	}   
    
	/**
	 * Define CPT Email Subscriber
	 *
	 * @since    1.0.0
	 */
	public function define_cpt_email_subscriber() {

		$labels = array(
			'name'                  => _x( 'Email Subscribers', 'wise-email-template' ),
			'singular_name'         => _x( 'Email Subscriber', 'wise-email-template' ),
			'menu_name'             => __( 'Email Subscribers', 'wise-email-template' ),
			'name_admin_bar'        => __( 'Email Subscriber', 'wise-email-template' ),
			'archives'              => __( 'Subscriber Archives', 'wise-email-template' ),
			'attributes'            => __( 'Subscriber Attributes', 'wise-email-template' ),
			'parent_item_colon'     => __( 'Parent Item:', 'wise-email-template' ),
			'all_items'             => __( 'All Subscribers', 'wise-email-template' ),
			'add_new_item'          => __( 'Add New Subscriber', 'wise-email-template' ),
			'add_new'               => __( 'Add New', 'wise-email-template' ),
			'new_item'              => __( 'New Subscriber', 'wise-email-template' ),
			'edit_item'             => __( 'Edit Subscriber', 'wise-email-template' ),
			'update_item'           => __( 'Update Subscriber', 'wise-email-template' ),
			'view_item'             => __( 'View Subscriber', 'wise-email-template' ),
			'view_items'            => __( 'View Subscribers', 'wise-email-template' ),
			'search_items'          => __( 'Search Subscribers', 'wise-email-template' ),
			'not_found'             => __( 'Not found', 'wise-email-template' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'wise-email-template' ),
			'featured_image'        => __( 'Featured Image', 'wise-email-template' ),
			'set_featured_image'    => __( 'Set featured image', 'wise-email-template' ),
			'remove_featured_image' => __( 'Remove featured image', 'wise-email-template' ),
			'use_featured_image'    => __( 'Use as featured image', 'wise-email-template' ),
			'insert_into_item'      => __( 'Insert into subscriber', 'wise-email-template' ),
			'uploaded_to_this_item' => __( 'Uploaded to this subscriber', 'wise-email-template' ),
			'items_list'            => __( 'Items list', 'wise-email-template' ),
			'items_list_navigation' => __( 'Items list navigation', 'wise-email-template' ),
			'filter_items_list'     => __( 'Filter items list', 'wise-email-template' ),
		);

		$args = array(
			'label'                 => __( 'Email Subscriber', 'wise-email-template' ),
			'description'           => __( 'Email marketing subscriber', 'wise-email-template' ),
			'labels'                => $labels,
			'supports'              => array( 'title' ),
			'taxonomies'            => array( ),
			'hierarchical'          => false,
			'public'                => false,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => false,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => false,
			'capability_type'       => 'page',
		);
		register_post_type( 'email_subscriber', $args );
		
	}        
    
	/**
	 * Disable WYSIWYG editor for Email Template custom post type
	 *
	 * @since    1.0.0
	 */    
    public function disable_wysiwyg_editor_for_email_template_cpt( $default ) {
        
        global $post;
        
        if ( $post->post_type === 'email_template') {            
            return false;
        }
  
        return $default;
        
    }
    
    public function email_template_email_actions_meta_box_callback( $post ) {
        
        include 'partials/wise-email-tracker-admin-email-actions-metabox-display.php';
                
    }

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wise-email-tracker-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wise-email-tracker-admin.js', array( 'jquery' ), $this->version, false );
        
        wp_localize_script( $this->plugin_name, 'ajaxData', array(
            'wpAjaxUrl' => admin_url( 'admin-ajax.php' ),
        ) );

	}
    
	/**
	 * Handle request to send emails
     *
     * Handles the ajax request to send the emails
	 *
	 * @since    1.0.0
	 */    
    public function handle_request_to_send_emails() {
        
        $success = false;
        
        $response = array(
            'success' => false,
            'message' => 'The request could not be completed.',
        );
        
        if ( array_key_exists( 'templateId', $_POST ) && ( $template_id = (int)$_POST['templateId'] ) && $template_id > 0 ) {
            $template = get_post( $template_id );
            
            if ( $template ) {
                $all_emails_sent = false;
                $email_subscribers = $this->get_all_email_subscribers();
                
                $email_subject = $template->post_title;
                
                foreach ( $email_subscribers as $subscriber ) {
                    set_time_limit(30);
                    
                    $email_id = wp_insert_post( array(
                        'post_type' => 'email',
                        'post_author' => $subscriber->ID,
                        'post_content' => '',
                        'post_title' => $subscriber->post_title,
                        'post_excerpt' => '',
                        'post_status' => 'draft',
                        'comment_status' => 'closed',
                        'ping_status' => 'closed',
                        'post_parent' => $template->ID,
                    ) );
                    
                    $email = get_post( $email_id );
                    
                    $email_to = $subscriber->post_title;
                    
                    $email_body = $this->render_template_body_for_email( $template, $email );
                    
                    $this->send_email( $email_to, $email_subject, $email_body );
                    
                    wp_update_post( array(
                        'ID' => $email->ID,
                        'post_status' => 'publish',
                    ) );
                    
                    sleep(2);
                }
                
                $success = true;
                $message = 'Success!';
            } else {
                $success = false;
                $message = 'Template not found.';
            }
        }
        
        
        if ( $success ) {
            $response['success'] = true;            
        } else {
            $response['success'] = false;
        }
        
        $response['message'] = $message;
        
        
        header( 'Content-type: application/json' );
        
        echo json_encode( $response );
         
        exit;
        
    }
    
    /**
     * Manage Email posts columns
     *
     * @since  1.0.0
     */
	public function manage_email_posts_columns( $columns ) {

		if ( array_key_exists( 'date', $columns ) ) {
			unset( $columns['date'] );
            unset( $columns['title'] );
		}

		$columns['email'] = __( 'Email', 'wise-email-tracker' );
        $columns['template'] = __( 'Template', 'wise-email-tracker' );
		$columns['date_sent'] = __( 'Date Sent', 'wise-email-tracker' );
		$columns['date_clicked'] = __( 'Date Clicked', 'wise-email-tracker' );

		return $columns;

	}    
    
	/**
     * Manage Coupon Code posts custom columns content
     *
     * @since  1.0.0
     */
	public function manage_email_posts_custom_column_content( $column_id, $post_id ) {

		if ( get_post_type( $post_id ) == 'email' ) {
			$email = get_post( $post_id );

			switch ( $column_id ) {
				case 'email':
					echo $email->post_title;
					break;

				case 'template':
					echo '';
                    $template_id = $email->post_parent;
                    $template = get_post( $template_id );
                    
                    echo $template->post_title;
					break;

				case 'date_sent':
                    $date_format = get_option( 'date_format' );
                    $time_format = get_option( 'time_format' );

                    $format = $date_format . ' ' . $time_format;

                    $date = date( $format, strtotime( $email->post_date ) );					
                    
                    echo $date;
					break;

				case 'date_clicked':
                    $date_clicked = get_post_meta( $post_id, 'date_clicked', true );
                                        
					if ( $date_clicked && strlen( $date_clicked ) > 0 ) {
                        $date_format = get_option( 'date_format' );
                        $time_format = get_option( 'time_format' );

                        $format = $date_format . ' ' . $time_format;

                        $date = date( $format, strtotime( $date_clicked ) );					              
                        
                        echo $date;
                    }
					break;
			}
		}
	}    
    
	/**
	 * Wise Email Template send render
     *
     * Renders the email sending page
	 *
	 * @since    1.0.0
	 */    
    public function wise_email_template_send_render() {
        
        $template_post_id = $_GET['id'];
        
        $confirmed = ( array_key_exists( 'confirmed', $_GET ) && $_GET['confirmed'] === 'yes' );
    
        if ( $confirmed ) {
            include 'partials/wise-email-tracker-send-template-email-confirmed-display.php';
        } else {
            include 'partials/wise-email-tracker-send-template-email-display.php';
        }
        
        
    }

}
