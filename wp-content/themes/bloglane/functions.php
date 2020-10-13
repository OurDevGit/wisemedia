<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

//Load text domain for translation-ready
load_theme_textdomain('bloglane', get_stylesheet_directory() . '/languages');

if ( !function_exists( 'bloglane_child_theme_parent_css' ) ):
    function bloglane_child_theme_parent_css() {
		wp_enqueue_style( 'bloglane-parent-style', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style('bloglane-child-style',get_stylesheet_directory_uri() . '/style.css',array('parent-style'));
		wp_enqueue_style('default-style-css', get_stylesheet_directory_uri()."/css/bloglane-default.css" );
	}
endif; 
add_action( 'wp_enqueue_scripts', 'bloglane_child_theme_parent_css', 999 );

// END ENQUEUE PARENT ACTION 

function bloglane_customize_register() {     
	global $wp_customize;
	$wp_customize->remove_section( 'daron_service_option' );  //Modify this line as needed 
	$wp_customize->remove_section( 'daron_portfolio_option' );  //Modify this line as needed 
	$wp_customize->remove_section( 'daron_testimonial_option' );  //Modify this line as needed 
	//$wp_customize->remove_section( 'upgrade_daron_premium' );  //Modify this line as needed 
	$wp_customize->remove_control( 'daron_skin_theme_color' ); //Modify this line as needed                                                                                                           );  //Modify this line as needed 
	$wp_customize->remove_control( 'daron_blog_column_layout' ); //Modify this line as needed 
	
	
	// Add recent post control to child
	$wp_customize->add_control( new Daron_info( $wp_customize, 'bloglane_cz_recent_post', array(
				'label' 	=> __('Blog HomePage Recent Post', 'bloglane'),
				'section' 	=> 'daron_blog_option',
				'settings' 	=> 'daron_title',
				'priority' 	=> 5,
				'active_callback' => 'daron_blog_callback',
			) 
		)
	);    
	
	//bloglane recent post
	$wp_customize->add_setting('bloglane_home_recent_post', array(
			'default' 			=> esc_html__( '10', 'bloglane' ),
			'sanitize_callback' => 'absint'
		)
	);
	$wp_customize->add_control('bloglane_home_recent_post', array(
			'section' 		=> 'daron_blog_option',
			'type'		 	=> 'number',
			'input_attrs'	=> array( 'min' => 0, 'max' => 10, 'step'  => 1 ),
			'priority' 		=> 6,
			'active_callback' => 'daron_blog_callback',
		)
	);
	
	// Add sidebar control to child
	$wp_customize->add_control( new Daron_info( $wp_customize, 'bloglane_cz_blog_layout', array(
				'label' 	=> __('Blog HomePage Layout', 'bloglane'),
				'section' 	=> 'daron_blog_option',
				'settings' 	=> 'daron_title',
				'priority' 	=> 7,
				'active_callback' => 'daron_blog_callback',
			) 
		)
	);    
	$wp_customize->add_setting( 'bloglane_blog_sidebar_layout', array (
			'default'      		=>  __('fullwidth', 'bloglane'),
			'sanitize_callback' => 'daron_sanitize_radio'
		)
	);
	$wp_customize->add_control('bloglane_blog_sidebar_layout', array(
			'type'      => 'radio',
			'section'   => 'daron_blog_option',
			'priority'  => 8,
			'choices'   => array(
				'leftsidebar'       => __( 'Left Sidebar', 'bloglane' ),
				'fullwidth'         => __( 'Full width (no sidebar)', 'bloglane' ),
				'rightsidebar'    	=> __( 'Right Sidebar', 'bloglane' )
			),
			'active_callback' => 'daron_blog_callback',
		)
	);
	
	//Image crop			
	$wp_customize->add_setting( 'bloglane_blog_img_crop', array(
			'default'      		=> 'daron_thumb_custum_sizes',
			'sanitize_callback' => 'daron_sanitize_select',
		)
	);
	$wp_customize->add_control('bloglane_blog_img_crop', array(
			'type'      => 'select',
			'label'     => __('Image Size for Blog', 'daron'),
			'section'   => 'daron_general_settings',
			'priority'  => 9,
			'choices'   => array(
				'daron_thumb_custum_sizes'       => __( 'Custom 380 x 380 (Recommended)', 'daron' ),
				'thumbnail'       => __( 'Thumbnail', 'daron' ),
				'medium'          => __( 'Medium', 'daron' ),
				'full'    		  => __( 'Full', 'daron' ),
			)
		)
	);
	
} 
add_action( 'customize_register', 'bloglane_customize_register', 11 );
?>