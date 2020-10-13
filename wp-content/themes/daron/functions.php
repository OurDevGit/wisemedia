<?php
/**
 * Daron functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Daron
 */

//Daron Theme URL
define("DARON_THEME_URL", get_template_directory_uri());
define("DARON_THEME_DIR", get_template_directory());

/**
 * Enqueue scripts and styles.
 */
add_action('wp_enqueue_scripts','daron_backend_resources');

// On theme activation add defaults theme settings and data
add_action( 'after_setup_theme', 'daron_default_theme_options_setup', 'theme_prefix_setup' );

// add search li to menu
add_filter( 'wp_nav_menu_items', 'add_search_to_nav', 10, 2 );

//Include Customizer File
require get_template_directory() . '/include/customizer.php';

// Set the content_width with 900
if ( ! isset( $content_width ) ) $content_width = 900;

require_once get_template_directory() . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'daron_register_required_plugins' );


	function daron_register_required_plugins() {
		/*
		 * Array of plugin arrays. Required keys are name and slug.
		 * If the source is NOT from the .org repo, then source is also required.
		 */
		$plugins = array(

			// This is an example of how to include a plugin from the WordPress Plugin Repository.
			array(
				'name'      => 'Portfolio Filter Gallery',
				'slug'      => 'portfolio-filter-gallery',
				'required'  => false,
			),
			array(
				'name'      => 'Animated Live Wall',
				'slug'      => 'animated-live-wall',
				'required'  => false,
			),
			array(
				'name'      => 'Contact Form Widget',
				'slug'      => 'new-contact-form-widget',
				'required'  => false,
			),
			array(
				'name'      => 'Blog Filter',
				'slug'      => 'blog-filter',
				'required'  => false,
			),
			array(
				'name'      => 'Event Monster',
				'slug'      => 'event-monster',
				'required'  => false,
			),

		);

		/*
		 * Array of configuration settings. Amend each line as needed.
		 *
		 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
		 * strings available, please help us make TGMPA even better by giving us access to these translations or by
		 * sending in a pull-request with .po file(s) with the translations.
		 *
		 * Only uncomment the strings in the config array if you want to customize the strings.
		 */
		$config = array(
			'id'           => 'daron',                 // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',                      // Default absolute path to bundled plugins.
			'menu'         => 'tgmpa-install-plugins', // Menu slug.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false,                   // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.

		);

		tgmpa( $plugins, $config );
	}

function daron_default_theme_options_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Daron, use a find and replace
	 * to change 'daron' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'daron', DARON_THEME_DIR . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	//Add Theme Support Like - featured image, image crop, post format, rss feed
	add_theme_support('post-thumbnails');	// featured image

	// Add Theme support Title Tag
	add_theme_support( 'title-tag' );
	
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	
	add_image_size('daron_thumb_custum_sizes', 380, 380, true );
	
	//woo-commerce theme support
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	
	add_theme_support( 'custom-background' );
	$defaults = array(
		'default-color'          => '',
		'default-image'          => '',
		'default-repeat'         => 'repeat',
		'default-position-x'     => 'left',
		'default-position-y'     => 'top',
		'default-size'           => 'auto',
		'default-attachment'     => 'scroll',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	);
	add_theme_support( 'custom-background', $defaults );
	
	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );
	
	// Add support for Custom Header.
	add_theme_support( 'custom-header', apply_filters( 'daron_custom_header_args', array(
			'default-image' => get_template_directory_uri() . '/images/banner/banner.jpg',
			'width'         => 1920,
			'height'        => 500,
			'flex-height'   => true,
			'header-text'   => false,
	) ) );

	// Register default headers.
	register_default_headers( array(
		'default-banner' => array(
			'url'           => '%s/images/banner/banner.jpg',
			'thumbnail_url' => '%s/images/banner/banner.jpg',
			'description'   => esc_html_x( 'Default Banner', 'header image description', 'daron' ),
		),

	) );
	
	// editor style
	add_editor_style('css/editor-style.css');
}

/**
 * Enqueue scripts and styles.
 */
function daron_backend_resources() { 
	// JS
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery-bootstrap', DARON_THEME_URL . '/main/bootstrap/js/bootstrap.js', array('jquery'), '', false );
	//swiper
	wp_enqueue_script('daron-swiper-jquery-min-js', DARON_THEME_URL . '/main/swiper/swiper.jquery.min.js', array('jquery'), '', false );
	wp_enqueue_script('daron-swiper-min-js', DARON_THEME_URL . '/main/swiper/swiper.min.js', array('jquery'), '', false );
	//Portfolio
	wp_enqueue_script('daron-jquery-cubeportfolio-min-js', DARON_THEME_URL . '/main/cubeportfolio/js/jquery.cubeportfolio.min.js', array('jquery'), '', false );
	wp_enqueue_script( 'daron-js', DARON_THEME_URL . '/js/daron.js', array('jquery'), '', false );
	wp_enqueue_script( 'daron-jquery-back-to-top-js', DARON_THEME_URL . '/js/jquery.back-to-top.js', array('jquery'), '', false );
	wp_enqueue_script( 'daron-search-form-js', DARON_THEME_URL . '/js/search-form.js', array('jquery'), '', false );
	wp_enqueue_script( 'comment-reply' );
	// CSS
	wp_enqueue_style( 'daron-bootstrap-min-css', DARON_THEME_URL . '/main/bootstrap/css/bootstrap.min.css');
	wp_enqueue_style( 'daron-swiper-min-css', DARON_THEME_URL . '/main/swiper/swiper.min.css');
	wp_enqueue_style( 'daron-cubeportfolio-min-css', DARON_THEME_URL . '/main/cubeportfolio/css/cubeportfolio.min.css');
	wp_enqueue_style( 'font-awesome-css', DARON_THEME_URL .'/css/font-awesome.min.css');
	wp_enqueue_style( 'daron-style', get_stylesheet_uri());
	wp_enqueue_style( 'daron-global-css', DARON_THEME_URL . '/main/global/global.css');
	wp_enqueue_style( 'daron-css', DARON_THEME_URL . '/css/daron.css');
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Lato', array(), null );
}

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function daron_theme_widgets() {
	// Blog / Page Sidebar Widget
	register_sidebar( array(
		'name' 			=>  esc_html__( 'Sidebar Widget', 'daron'),
		'id' 			=> 'sidebar-widget',
		'before_widget' => '<aside class="widget sidebar-widget g-padding-x-30--xs g-padding-y-30--xs daron-shadow">',
		'after_widget' 	=> '</aside>',
		'before_title' 	=> '<h4 class="g-text-left--xs g-padding-x-10--xs g-font-size-20--xs g-letter-spacing--2 g-margin-b-30--xs">',
		'after_title' 	=> '</h4>'
	));
	
	// Get Footer Layout Settings
	$daron_footer_column_layout = get_theme_mod('daron_footer_column_layout', 3);
	if($daron_footer_column_layout == 1) $daron_footer_class = "col-sm-12 g-margin-b-50--xs g-margin-b-0--md";	// one column
	if($daron_footer_column_layout == 2) $daron_footer_class = "col-sm-6 g-margin-b-50--xs g-margin-b-0--md";		// two column
	if($daron_footer_column_layout == 3) $daron_footer_class = "col-sm-4 g-margin-b-50--xs g-margin-b-0--md";		// three column
	if($daron_footer_column_layout == 4) $daron_footer_class = "col-sm-3 g-margin-b-50--xs g-margin-b-0--md";		// four column

	// Footer Widget 1
	register_sidebar( array(
		'name'			=>  esc_html__( 'Footer Widget', 'daron'),
		'id'			=> 'daron-footer-widget',
		'description'	=>  esc_html__( 'This is footer widget area of the theme.', 'daron'),
		'before_widget' => "<aside class='$daron_footer_class widget footer-widget'>",
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h4 class="g-color--white g-font-size-20--xs g-letter-spacing--2 g-margin-b-25--xs">',
		'after_title'	=> '</h4>',
	));
	
	// WooCommerce sidebar widget
	register_sidebar( array(
		'name'			=> 'WooCommerce sidebar widget area',
		'id'			=> 'woocommerce',
		'description'	=> 'WooCommerce sidebar widget area.',
		'before_widget' => '<aside class="widget sidebar-widget g-padding-x-30--xs g-padding-y-30--xs daron-shadow">',
		'after_widget' 	=> '</aside>',
		'before_title' 	=> '<h4 class="g-text-left--xs g-padding-x-10--xs g-font-size-20--xs g-letter-spacing--2 g-margin-b-30--xs">',
		'after_title' 	=> '</h4>'
	));
}
add_action('widgets_init', 'daron_theme_widgets');

//Register area for custom menu
add_action( 'init', 'daron_menu' );
function daron_menu() {
	register_nav_menu( 'primary-menu', __( 'Primary Menu','daron' ) );
	// Include Walker file
	require get_template_directory() . '/include/walker.php';
}
?>