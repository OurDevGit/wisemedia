<?php
/**
 * Theme Customizer
 *
 * @package Daron
 */
function daron_customize_register( $wp_customize ) {
    //All our sections, settings, and controls will be added here
    wp_enqueue_style('customizr', DARON_THEME_URL .'/css/customizer.css');
	//Titles
    class Daron_info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
            <h3 class="daron-label"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    } 

	if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'More_Daron_Control' ) ) :
	class More_Daron_Control extends WP_Customize_Control {

		/**
		* Render the content on the theme customizer page
		*/
		public function render_content() {
			?>
			<label style="overflow: hidden; zoom: 1;">
				<a style="text-decoration:none" href="https://awplife.com/wordpress-themes/daron-premium/" target="blank">
					<div class="col-md-4 col-sm-6 daron-btn btn btn-success btn">
						<?php esc_html_e('Upgrade To Daron Premium','daron'); ?>
					</div>
				</a>
				<div class="col-md-3 col-sm-6">
					<h3 class="features-btn"><?php echo esc_html_e( 'Daron Premium - Features','daron'); ?></h3>
					<ul>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design','daron'); ?> </li>					
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Translation Ready','daron'); ?> </li>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multi Purpose','daron'); ?>  </li>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('High Performance','daron'); ?>  </li>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Font Awesome Icons','daron'); ?> </li>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Template','daron'); ?> </li>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multi Color Option','daron'); ?></li>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Advanced Typography','daron'); ?>   </li>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Flickr Photo Stream Widget','daron'); ?>   </li>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible','daron'); ?>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Theme Layout','daron'); ?>  </li>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Ultimate Portfolio layout with Isotope effect','daron'); ?> </li>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Home Page Active/Inactive Sections','daron'); ?> </li>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Support Access','daron'); ?> </li>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Homepage Section Draggable','daron'); ?> </li>
					</ul>
				</div>
				<a style="text-decoration:none" href="https://awplife.com/account/signup/daron-premium" target="blank">
					<div class="col-md-2 col-sm-6 daron-btn2 btn btn-success btn">
							<?php esc_html_e('Buy Now','daron'); ?> 
					</div>
				</a>
				<hr>
				<span class="customize-control-title"><?php esc_html_e( 'Found Useful Daron?', 'daron' ); ?></span>
				<p>
					<?php
						printf( esc_html_e( 'If you Like our Theme , Please do Rate us on WordPress.org  We\'d really appreciate it!', 'daron' ), '<a target="_new" href="https://wordpress.org/support/theme/daron/reviews/?filter=5">', '</a>' );
					?>
				</p>
				<a style="text-decoration:none" href="https://wordpress.org/support/theme/daron/reviews/?filter=5" target="blank">
					<div class="col-md-2 col-sm-6 daron-btn2 btn btn-success btn">
						<?php esc_html_e('Rate US','daron'); ?> 
					</div>
				</a>
				<hr>
				<span class="customize-control-title"><?php esc_html_e( 'Our Top Featured Recommended Plugins', 'daron' ); ?></span>
				<a style="text-decoration:none" href="https://wordpress.org/plugins/portfolio-filter-gallery/" target="blank">
					<div class="col-md-2 col-sm-6 daron-btn2 btn btn-success btn">
						<?php esc_html_e('Portfolio Filter Gallery','daron'); ?> 
					</div>
				</a>
				<a style="text-decoration:none" href="https://wordpress.org/plugins/blog-filter/" target="blank">
					<div class="col-md-2 col-sm-6 daron-btn2 btn btn-success btn">
						<?php esc_html_e('Blog Filter Gallery','daron'); ?> 
					</div>
				</a>
			</label>
			<?php
		}
	}
	endif;	
	
	//Daron Theme Options
	$wp_customize->add_panel('daron_theme_options', array(
				'title' 	=> __( 'Daron Theme Options', 'daron' ),
				'priority' 	=> 1,
            )
        );
		
		//1. Upgrade To daron Premium ======================================
		$wp_customize->add_section( 'upgrade_daron_premium' , array(
			'title'      	=> __( 'Upgrade to Premium', 'daron' ),
			'priority'   	=> 1,
			'panel'=>'daron_theme_options',
		));

			$wp_customize->add_setting('upgrade_daron_premium', array(
				'default'    		=> null,
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( new More_Daron_Control( $wp_customize, 'upgrade_daron_premium', array(
				'label'    => __( 'Daron Premium', 'daron' ),
				'section'  => 'upgrade_daron_premium',
				'settings' => 'upgrade_daron_premium',
				'priority' => 1,
			) ) ); 
		//1. Upgrade To daron Premium ======================================
			
		//General Settings
		$wp_customize->add_section( 'daron_general_settings' , array(
				'title'      	=> __( 'General Settings', 'daron' ),
				'priority'      => 1,
				'panel'			=> 'daron_theme_options',
			) 
		);
		
			//Theme Color
			$wp_customize->add_setting( 'daron_skin_theme_color' , array(
					'default'   		=> '#F71735',
					'sanitize_callback' => 'daron_sanitize_hex_colors',
				) 
			);
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'daron_skin_theme_color', array(
					'label'      => __( 'Theme Color', 'daron' ),
					'section'	 => 'daron_general_settings',
					'settings'   => 'daron_skin_theme_color',
					'priority'  => 1,
					) 
				) 
			);
			
			//Site Layout
			$wp_customize->add_setting( 'daron_theme_layout', array(
					'default'     		=> 'wide',
					'sanitize_callback' => 'daron_sanitize_radio',
				)
			);
			$wp_customize->add_control('daron_theme_layout', array(
					'type'      => 'radio',
					'label'     => __('Theme Layout', 'daron'),
					'section'   => 'daron_general_settings',
					'priority'  => 2,
					'choices'   => array(
						'wide'       => __( 'Wide Layout', 'daron' ),
						'boxed'      => __( 'Box Layout', 'daron' ),
					),
				)
			);
			
			//Boxed Layout Background Image
			$wp_customize->add_setting( 'daron_boxed_layout_bgimg', array(
					'default'      		=> esc_html__( 'wood', 'daron' ),
					'sanitize_callback' => 'daron_sanitize_select',
				)
			);
			$wp_customize->add_control('daron_boxed_layout_bgimg', array(
					'type'      => 'select',
					'label'     => __('Boxed Layout Background Image', 'daron'),
					'section'   => 'daron_general_settings',
					'priority'  => 3,
					'choices'   => array(
						'crossed_stripes'       => __( 'Crossed Stripes', 'daron' ),
						'classy_fabric'         => __( 'Classy Fabric', 'daron' ),
						'low_contrast_linen'    => __( 'Low Contrast Linen', 'daron' ),
						'wood'    				=> __( 'Wood', 'daron' ),
						'diamonds'    			=> __( 'Diamonds', 'daron' ),
						'triangles'    			=> __( 'Triangles', 'daron' ),
						'black_mamba'    		=> __( 'Black Mamba', 'daron' ),
						'vichy'   			 	=> __( 'Vichy', 'daron' ),
						'back_pattern'    		=> __( 'Back Pattern', 'daron' ),
						'checkered_pattern'    	=> __( 'Checkered Pattern', 'daron' ),
						'diamond_upholstery'    => __( 'Diamond Upholstery', 'daron' ),
						'lyonnette'    			=> __( 'Lyonnette', 'daron' ),
						'graphy'    			=> __( 'Graphy', 'daron' ),
						'black_thread'    		=> __( 'Black Thread', 'daron' ),
						'subtlenet2'    		=> __( 'Subtlenet', 'daron' ),
					),
				)
			);
			
			//General Page Layout
			//Page Layout
			$wp_customize->add_setting('daron_title', array(
					'type'              => 'info_control',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'esc_attr',     
				)
			);
			
			$wp_customize->add_control( new Daron_info( $wp_customize, 'page_layout', array(
						'label' 	=> __('Page Layout', 'daron'),
						'section' 	=> 'daron_general_settings',
						'settings' 	=> 'daron_title',
						'priority' 	=> 4,
					) 
				)
			);
			$wp_customize->add_setting( 'daron_general_page_layout', array (
					'default'      		=>  __('fullwidth', 'daron'),
					'sanitize_callback' => 'daron_sanitize_radio'
				)
			);
			$wp_customize->add_control('daron_general_page_layout', array(
					'type'      => 'radio',
					//'label'     => __('Page layout', 'daron'),
					'section'   => 'daron_general_settings',
					'priority'  => 4,
					'choices'   => array(
						'leftsidebar'       => __( 'Left Sidebar', 'daron' ),
						'fullwidth'         => __( 'Full width (no sidebar)', 'daron' ),
						'rightsidebar'    	=> __( 'Right Sidebar', 'daron' )
					),
				)
			);
			
			
			//Blog Page Layout
			//Blog Layout
			$wp_customize->add_setting('daron_title', array(
					'type'              => 'info_control',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'esc_attr',     
				)
			);
			
			$wp_customize->add_control( new Daron_info( $wp_customize, 'blog_layout', array(
						'label' 	=> __('Blog Layout', 'daron'),
						'section' 	=> 'daron_general_settings',
						'settings' 	=> 'daron_title',
						'priority' 	=> 5,
					) 
				)
			);
			$wp_customize->add_setting( 'daron_page_layout_style', array(
					'default'      		=>  __( 'rightsidebar', 'daron' ),
					'sanitize_callback' => 'daron_sanitize_radio'
				)
			);
			$wp_customize->add_control('daron_page_layout_style', array(
					'type'      => 'radio',
					//'label'     => __('Blog Page layout', 'daron'),
					'section'   => 'daron_general_settings',
					'priority'  => 5,
					'choices'   => array(
						'leftsidebar'       => __( 'Left Sidebar', 'daron' ),
						'fullwidth'         => __( 'Full width (no sidebar)', 'daron' ),
						'rightsidebar'    	=> __( 'Right Sidebar', 'daron' )
					),
				)
			);
			
			//Blog Single Page Layout
			//Blog Layout
			$wp_customize->add_setting('daron_title', array(
					'type'              => 'info_control',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'esc_attr',     
				)
			);
			
			$wp_customize->add_control( new Daron_info( $wp_customize, 'blog_single_layout', array(
						'label' 	=> __('Blog Single Page layout', 'daron'),
						'section' 	=> 'daron_general_settings',
						'settings' 	=> 'daron_title',
						'priority' 	=> 6,
					) 
				)
			);
			$wp_customize->add_setting( 'daron_blog_single_page_layout', array(
					'default'      		=> __( 'fullwidth', 'daron' ),
					'sanitize_callback' => 'daron_sanitize_radio'
				)
			);
			$wp_customize->add_control('daron_blog_single_page_layout', array(
					'type'      => 'radio',
					//'label'     => __('Blog Single Page layout', 'daron'),
					'section'   => 'daron_general_settings',
					'priority'  => 6,
					'choices'   => array(
						'leftsidebar'       => __( 'Left Sidebar', 'daron' ),
						'fullwidth'         => __( 'Full width (no sidebar)', 'daron' ),
						'rightsidebar'    	=> __( 'Right Sidebar', 'daron' )
					),
				)
			);	
			
			//Enable Static Page			
			/* $wp_customize->add_setting( 'daron_static_page_setting', array(
					'default'      		=> 'active',
					'sanitize_callback' => 'daron_sanitize_radio'
				)
			);
			$wp_customize->add_control('daron_static_page_setting', array(
					'type'     		 => 'radio',
					'label'   	 	 => __('Static Page Content', 'daron'),
					'description'    => __('Hide/Show Page or Post Content from Homepage', 'daron'),
					'section'  		 => 'daron_general_settings',
					'priority' 		 => 7,
					'choices'  		 => array(
						'active'       => __( 'Show', 'daron' ),
						'inactive'     => __( 'Hide', 'daron' ),
					),
				)
			); */
			
			//Enable Site Loader			
			$wp_customize->add_setting( 'daron_loader', array(
					'default'      		=> 'active',
					'sanitize_callback' => 'daron_sanitize_radio'
				)
			);
			$wp_customize->add_control('daron_loader', array(
					'type'      => 'radio',
					'label'     => __('Show Site Loader', 'daron'),
					'section'   => 'daron_general_settings',
					'priority'  => 7,
					'choices'   => array(
						'active'       => __( 'Show', 'daron' ),
						'inactive'     => __( 'Hide', 'daron' ),
					),
				)
			);
		
		//Header Settings
		$wp_customize->add_section( 'daron_header_option' , array(
				'title'      	=> __( 'Header Settings', 'daron' ),
				'priority'      => 3,
				'panel'      	=> 'daron_theme_options',
			) 
		);
			
			//Header Max Height
			$wp_customize->add_setting('daron_header_height', array(
					'default' 			=> esc_html__( '460', 'daron' ),
					'sanitize_callback' => 'absint'
				)
			);
			$wp_customize->add_control('daron_header_height', array(
					'label' 		=> __( 'Header Max Height (px)', 'daron' ),
					'section' 		=> 'daron_header_option',
					'type'		 	=> 'number',
					'description'   => __('Header height in pixels. [default: 10]', 'daron'),       
					'priority' 		=> 4
				)
			);
			
			// Setting custom header show_title.
			$wp_customize->add_setting( 'daron_header_show_title', array(
				'default'           => 1,
				'sanitize_callback' => 'daron_sanitize_checkbox',
			) );
			$wp_customize->add_control( 'daron_header_show_title', array(
				'label'   => esc_html__( 'Show Title', 'daron' ),
				'section' => 'daron_header_option',
				'type'    => 'checkbox',
			) );

			// Setting custom_header_show_breadcrumb.
			$wp_customize->add_setting( 'daron_header_show_breadcrumb', array(
				'default'           => 1,
				'sanitize_callback' => 'daron_sanitize_checkbox',
			) );
			$wp_customize->add_control( 'daron_header_show_breadcrumb', array(
				'label'   => esc_html__( 'Show Breadcrumb', 'daron' ),
				'section' => 'daron_header_option',
				'type'    => 'checkbox',
			) );
			
			
			//Header Color if no image selected
			$wp_customize->add_setting( 'daron_header_background_color' , array(
					'default'   		=> '#29B6F6',
					'sanitize_callback' => 'daron_sanitize_hex_colors',
				) 
			);
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'daron_header_background_color', array(
					'label'      => __( 'Gradient Color', 'daron' ),
					'section'	 => 'daron_header_option',
					//'settings'   => 'daron_skin_theme_color',
					'priority'  => 1,
					) 
				) 
			);
	
	$wp_customize->add_panel('daron_homepage_sections', array(
				'title' 	=> __( 'HomePage Sections', 'daron' ),
				'priority' 	=> 2,
            )
        );
	
		//4. Slider Settings Start ======================================
		$wp_customize->add_section( 'daron_slider_option' , array(
				'title'      	=> __( 'HomePage Slider Settings', 'daron' ),
				//'description'   => __('You can add up to 3 images in the slider. ', 'daron'),
				'priority'      => 1,
				'panel'      	=> 'daron_homepage_sections',
			) 
		);
		
			//Enable Slider			
			$wp_customize->add_setting( 'daron_slider_section', array(
					'default'      		=> 'active',
					'sanitize_callback' => 'daron_sanitize_radio'
				)
			);
			$wp_customize->add_control('daron_slider_section', array(
					'type'      => 'radio',
					'label'     => __('Slider Section', 'daron'),
					'section'   => 'daron_slider_option',
					'priority'  => 1,
					'choices'   => array(
						'active'       => __( 'Active', 'daron' ),
						'inactive'     => __( 'Inactive', 'daron' ),
					),
				)
			);
			
			
			//Slide One
			$wp_customize->add_setting('daron_title', array(
					'type'              => 'info_control',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'esc_attr',            
				)
			);
			
			$wp_customize->add_control( new Daron_info( $wp_customize, 's1', array(
						'label' 	=> __('Slide One', 'daron'),
						'section' 	=> 'daron_slider_option',
						'settings' 	=> 'daron_title',
						'priority' 	=> 3,
						'active_callback' => 'daron_slider_callback',
					) 
				)
			);    
			
			$wp_customize->add_setting('daron_slider_image_one', array(
					'default' 			=> get_template_directory_uri() . '/images/slider/slide1.jpg',
					'sanitize_callback' => 'esc_url_raw',
				)
			);
			$wp_customize->add_control(	new WP_Customize_Image_Control(	$wp_customize, 'daron_slider_image_one', array(
					   'label'          => __( 'Upload your image for the slide one', 'daron' ),
					   'type'           => 'image',
					   'section'        => 'daron_slider_option',
					   'settings'       => 'daron_slider_image_one',
					   'priority'       => 4,
						'active_callback' => 'daron_slider_callback',
					)
				)
			);
			
			//Title
			$wp_customize->add_setting('daron_slider_title_one', array(
					'default' 			=> esc_html('Welcome To Daron Theme','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
					
				)
			);
			$wp_customize->add_control('daron_slider_title_one', array(
					'label' 	=> __( 'Title for the slide one', 'daron' ),
					'section' 	=> 'daron_slider_option',
					'type' 		=> 'text',
					'priority' 	=> 5,
					'active_callback' => 'daron_slider_callback',
				)
			);
			
			//Description
			$wp_customize->add_setting('daron_slider_desc_one', array(
					'default' 			=> esc_html('Motivation is the catalyzing ingredient for every successful innovation.','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('daron_slider_desc_one', array(
					'label' 	=> __( 'Slider Description', 'daron' ),
					'section' 	=> 'daron_slider_option',
					'type'		=> 'textarea',
					'priority' 	=> 5,
					'active_callback' => 'daron_slider_callback',
				)
			);
			
			//Button Link
			$wp_customize->add_setting('daron_slider_btn_link_one', array(
					'default' 			=> esc_html('#','daron'),
					'sanitize_callback' => 'esc_url_raw'
				)
			);
			$wp_customize->add_control('daron_slider_btn_link_one', array(
					'label' 	=> __( 'Button Link', 'daron' ),
					'section' 	=> 'daron_slider_option',
					'type' 		=> 'url',
					'priority'	=> 6,
					'active_callback' => 'daron_slider_callback',
				)
			);
			
			//Button Text
			$wp_customize->add_setting('daron_slider_btn_text_one', array(
					'default' 			=> esc_html('Read More','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('daron_slider_btn_text_one', array(
					'label' 	=> __( 'Button Text', 'daron' ),
					'section' 	=> 'daron_slider_option',
					'type' 		=> 'text',
					'priority' 	=> 7,
					'active_callback' => 'daron_slider_callback',
				)
			);
			
			
			
			//Slider Radio Button Show And Hide Funcion			
			function daron_slider_callback( $daron_slider_control ) {
				$daron_slider_radio_setting = $daron_slider_control->manager->get_setting('daron_slider_section')->value();
				$daron_slider_control_id = $daron_slider_control->id;
				//slide one
				if ( $daron_slider_control_id == 'daron_slider_speed'  && $daron_slider_radio_setting == 'active' ) return true;
				if ( $daron_slider_control_id == 'daron_slider_autoplay'  && $daron_slider_radio_setting == 'active' ) return true;
				if ( $daron_slider_control_id == 's1'  && $daron_slider_radio_setting == 'active' ) return true;
				if ( $daron_slider_control_id == 'daron_slider_image_one'  && $daron_slider_radio_setting == 'active' ) return true;
				if ( $daron_slider_control_id == 'daron_slider_title_one'  && $daron_slider_radio_setting == 'active' ) return true;
				if ( $daron_slider_control_id == 'daron_slider_desc_one'  && $daron_slider_radio_setting == 'active' ) return true;
				if ( $daron_slider_control_id == 'daron_slider_btn_link_one'  && $daron_slider_radio_setting == 'active' ) return true;
				if ( $daron_slider_control_id == 'daron_slider_btn_text_one'  && $daron_slider_radio_setting == 'active' ) return true;
				
				return false;
			}	
		//4. Slider Settings End ======================================
		
		
		//5. Service Settings Start ======================================
		$wp_customize->add_section( 'daron_service_option' , array(
				'title'      	=> __( 'HomePage Service Settings', 'daron' ),
				'priority'      => 2,
				'panel'      	=> 'daron_homepage_sections',
			) 
		);
		
			//Enable Service
			$wp_customize->add_setting( 'daron_service_section', array(
					'default'     		=> 'active',
					'sanitize_callback' => 'daron_sanitize_radio'
				)
			);
			$wp_customize->add_control('daron_service_section', array(
					'type'      => 'radio',
					'label'     => __('Service Section', 'daron'),
					'section'   => 'daron_service_option',
					'priority'  => 1,
					'choices'   => array(
						'active'       => __( 'Active', 'daron' ),
						'inactive'     => __( 'Inactive', 'daron' ),
					),
				)
			);
			
			//Title
			$wp_customize->add_setting('daron_service_section_title', array(
					'default' 			=> esc_html('Services We Offer','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('daron_service_section_title', array(
					'label' 	=> __( 'Title', 'daron' ),
					'section' 	=> 'daron_service_option',
					'type' 		=> 'text',
					'priority' 	=> 1,
					'active_callback' => 'daron_service_callback',
				)
			);
			
			//Description
			$wp_customize->add_setting('daron_service_section_desc', array(
					'default' 			=> esc_html('We Create Beautiful Experiences That Drive Successful Businesses.','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('daron_service_section_desc', array(
					'label' 	=> __( 'Description', 'daron' ),
					'section' 	=> 'daron_service_option',
					'type' 		=> 'text',
					'priority' 	=> 1,
					'active_callback' => 'daron_service_callback',
				)
			);
			
			
			//Service Layout
			$wp_customize->add_setting( 'daron_service_layout', array(
					'default'      		=> 2,
					'sanitize_callback' => 'daron_sanitize_radio'
				)
			);
			$wp_customize->add_control('daron_service_layout', array(
					'type'      => 'radio',
					'label'     => __('Design Settings', 'daron'),
					'section'   => 'daron_service_option',
					'priority'  => 1,
					'choices'   => array(
						2      => __( 'Layout 1', 'daron' ),
						1      => __( 'Layout 2', 'daron' ),
					),
					'active_callback' => 'daron_service_callback',
				)
			);
			
			//Service Column Layout
			$wp_customize->add_setting( 'daron_service_column_layout', array(
					'default'     		=> 'col-md-3',
					'sanitize_callback' => 'daron_sanitize_radio'
				)
			);
			$wp_customize->add_control('daron_service_column_layout', array(
					'type'      => 'radio',
					'label'     => __('Column Settings (Only For Desktop)', 'daron'),
					'section'   => 'daron_service_option',
					'priority'  => 1,
					'choices'   => array(
						'col-md-3'     	=> __( '4 Column', 'daron' ),
						'col-md-4'      => __( '3 Column', 'daron' ),						
						'col-md-6'      => __( '2 Column', 'daron' ),						
					),
					'active_callback' => 'daron_service_callback',
				)
			);	
			
			//Service One
			$wp_customize->add_setting('daron_title', array(
					'type'              => 'info_control',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'esc_attr',            
				)
			);
			
			$wp_customize->add_control( new Daron_info( $wp_customize, 'service_one', array(
						'label' 	=> __('Service One', 'daron'),
						'section' 	=> 'daron_service_option',
						'settings' 	=> 'daron_title',
						'priority' 	=> 2,
						'active_callback' => 'daron_service_callback',
					) 
				)
			);
			
			
			//Icon
			$wp_customize->add_setting('daron_service_icon_1', array(
					'default' 			=> esc_html('fa-desktop','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('daron_service_icon_1', array(
					'label' 	=> __( 'Service Icon', 'daron' ),
					'section' 	=> 'daron_service_option',
					'type' 		=> 'text',
					'priority' 	=> 3,
					'active_callback' => 'daron_service_callback',
				)
			);
			
			
			
			//Title
			$wp_customize->add_setting('daron_service_title_1', array(
					'default' 			=> esc_html('Responsive Design','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('daron_service_title_1', array(
					'label' 	=> __( 'Title', 'daron' ),
					'section' 	=> 'daron_service_option',
					'type' 		=> 'text',
					'priority' 	=> 4,
					'active_callback' => 'daron_service_callback',
				)
			);
			
			
			//Description
			$wp_customize->add_setting('daron_service_desc_1', array(
					'default' 			=> esc_html('Lorem Ipsum is simply dummy text of the printing and typesetting industry.','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('daron_service_desc_1', array(
					'label' 	=> __( 'Description', 'daron' ),
					'section' 	=> 'daron_service_option',
					'type' 		=> 'text',
					'priority' 	=> 5,
					'active_callback' => 'daron_service_callback',
				)
			);
			
			//Service Two
			$wp_customize->add_setting('daron_title', array(
					'type'              => 'info_control',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'esc_attr',            
				)
			);
			
			$wp_customize->add_control( new Daron_info( $wp_customize, 'service_two', array(
						'label' 	=> __('Service Two', 'daron'),
						'section' 	=> 'daron_service_option',
						'settings' 	=> 'daron_title',
						'priority' 	=> 6,
						'active_callback' => 'daron_service_callback',
					) 
				)
			);
			
		
			//Icon
			$wp_customize->add_setting('daron_service_icon_2', array(
					'default' 			=> esc_html('fa-pencil','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('daron_service_icon_2', array(
					'label' 	=> __( 'Service Icon', 'daron' ),
					'section' 	=> 'daron_service_option',
					'type' 		=> 'text',
					'priority' 	=> 7,
					'active_callback' => 'daron_service_callback',
				)
			);
			
			
			//Title
			$wp_customize->add_setting('daron_service_title_2', array(
					'default' 			=> esc_html('Fully Customizable','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('daron_service_title_2', array(
					'label' 	=> __( 'Title', 'daron' ),
					'section' 	=> 'daron_service_option',
					'type' 		=> 'text',
					'priority' 	=> 8,
					'active_callback' => 'daron_service_callback',
				)
			);
			
			//Description
			$wp_customize->add_setting('daron_service_desc_2', array(
					'default' 			=> esc_html('Lorem Ipsum is simply dummy text of the printing and typesetting industry.','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('daron_service_desc_2', array(
					'label' 	=> __( 'Description', 'daron' ),
					'section' 	=> 'daron_service_option',
					'type' 		=> 'text',
					'priority' 	=> 9,
					'active_callback' => 'daron_service_callback',
				)
			);
			
			//Service Three
			$wp_customize->add_setting('daron_title', array(
					'type'              => 'info_control',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'esc_attr',            
				)
			);
			
			$wp_customize->add_control( new Daron_info( $wp_customize, 'service_three', array(
						'label' 	=> __('Service Three', 'daron'),
						'section' 	=> 'daron_service_option',
						'settings' 	=> 'daron_title',
						'priority' 	=> 10,
						'active_callback' => 'daron_service_callback',
					) 
				)
			);
			
			//Icon
			$wp_customize->add_setting('daron_service_icon_3', array(
					'default' 			=> esc_html('fa-balance-scale','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('daron_service_icon_3', array(
					'label' 	=> __( 'Service Icon', 'daron' ),
					'section' 	=> 'daron_service_option',
					'type' 		=> 'text',
					'priority' 	=> 11,
					'active_callback' => 'daron_service_callback',
				)
			);
			
			//Title
			$wp_customize->add_setting('daron_service_title_3', array(
					'default' 			=> esc_html('Pixel Perfect','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('daron_service_title_3', array(
					'label' 	=> __( 'Title', 'daron' ),
					'section' 	=> 'daron_service_option',
					'type' 		=> 'text',
					'priority' 	=> 12,
					'active_callback' => 'daron_service_callback',
				)
			);
			
			//Description
			$wp_customize->add_setting('daron_service_desc_3', array(
					'default' 			=> esc_html('Lorem Ipsum is simply dummy text of the printing and typesetting industry.','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('daron_service_desc_3', array(
					'label' 	=> __( 'Description', 'daron' ),
					'section' 	=> 'daron_service_option',
					'type' 		=> 'text',
					'priority' 	=> 13,
					'active_callback' => 'daron_service_callback',
				)
			);

			//Service Four
			$wp_customize->add_setting('daron_title', array(
					'type'              => 'info_control',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'esc_attr',            
				)
			);
			
			$wp_customize->add_control( new Daron_info( $wp_customize, 'service_four', array(
						'label' 	=> __('Service Four', 'daron'),
						'section' 	=> 'daron_service_option',
						'settings' 	=> 'daron_title',
						'priority' 	=> 14,
						'active_callback' => 'daron_service_callback',
					) 
				)
			);
			
			//Icon
			$wp_customize->add_setting('daron_service_icon_4', array(
					'default' 			=> esc_html('fa-star-o','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('daron_service_icon_4', array(
					'label' 	=> __( 'Service Icon', 'daron' ),
					'section' 	=> 'daron_service_option',
					'type' 		=> 'text',
					'priority' 	=> 15,
					'active_callback' => 'daron_service_callback',
				)
			);
			
			//Title
			$wp_customize->add_setting('daron_service_title_4', array(
					'default' 			=> esc_html('Clean & Clear Design','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('daron_service_title_4', array(
					'label' 	=> __( 'Title', 'daron' ),
					'section' 	=> 'daron_service_option',
					'type' 		=> 'text',
					'priority' 	=> 16,
					'active_callback' => 'daron_service_callback',
				)
			);
			
			//Description
			$wp_customize->add_setting('daron_service_desc_4', array(
					'default' 			=> esc_html('Lorem Ipsum is simply dummy text of the printing and typesetting industry.','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('daron_service_desc_4', array(
					'label' 	=> __( 'Description', 'daron' ),
					'section' 	=> 'daron_service_option',
					'type' 		=> 'text',
					'priority' 	=> 17,
					'active_callback' => 'daron_service_callback',
				)
			);
				
			//Service Radio Button Show And Hide Funcion			
			function daron_service_callback( $daron_service_control ) {
				$daron_service_radio_setting = $daron_service_control->manager->get_setting('daron_service_section')->value();
				$daron_service_control_id = $daron_service_control->id;
				//service one
				if ( $daron_service_control_id == 'daron_service_section_title'  && $daron_service_radio_setting == 'active' ) return true;
				if ( $daron_service_control_id == 'daron_service_section_desc'  && $daron_service_radio_setting == 'active' ) return true;
				if ( $daron_service_control_id == 'daron_service_layout'  && $daron_service_radio_setting == 'active' ) return true;
				if ( $daron_service_control_id == 'daron_service_column_layout'  && $daron_service_radio_setting == 'active' ) return true;
				if ( $daron_service_control_id == 'service_one'  && $daron_service_radio_setting == 'active' ) return true;
				if ( $daron_service_control_id == 'daron_service_icon_1'  && $daron_service_radio_setting == 'active' ) return true;
				if ( $daron_service_control_id == 'daron_service_title_1'  && $daron_service_radio_setting == 'active' ) return true;
				if ( $daron_service_control_id == 'daron_service_desc_1'  && $daron_service_radio_setting == 'active' ) return true;
				//service two			
				if ( $daron_service_control_id == 'service_two'  && $daron_service_radio_setting == 'active' ) return true;
				if ( $daron_service_control_id == 'daron_service_icon_2'  && $daron_service_radio_setting == 'active' ) return true;
				if ( $daron_service_control_id == 'daron_service_title_2'  && $daron_service_radio_setting == 'active' ) return true;
				if ( $daron_service_control_id == 'daron_service_desc_2'  && $daron_service_radio_setting == 'active' ) return true;
				//service three
				if ( $daron_service_control_id == 'service_three'  && $daron_service_radio_setting == 'active' ) return true;
				if ( $daron_service_control_id == 'daron_service_icon_3'  && $daron_service_radio_setting == 'active' ) return true;
				if ( $daron_service_control_id == 'daron_service_title_3'  && $daron_service_radio_setting == 'active' ) return true;
				if ( $daron_service_control_id == 'daron_service_desc_3'  && $daron_service_radio_setting == 'active' ) return true;
				
				//service four
				if ( $daron_service_control_id == 'service_four'  && $daron_service_radio_setting == 'active' ) return true;
				if ( $daron_service_control_id == 'daron_service_icon_4'  && $daron_service_radio_setting == 'active' ) return true;
				if ( $daron_service_control_id == 'daron_service_title_4'  && $daron_service_radio_setting == 'active' ) return true;
				if ( $daron_service_control_id == 'daron_service_desc_4'  && $daron_service_radio_setting == 'active' ) return true;
				 
				return false;
			}
		//5. Service Settings End ======================================
		
		//6. Blog Options Settings Start ======================================
		$wp_customize->add_section( 'daron_blog_option' , array(
				'title'      	=> __( 'HomePage Blog Settings', 'daron' ),
				'description'	=> __( 'You can change blog page layout and single blog page layout from here.', 'daron' ),
				'priority'      => 3,
				'panel'      	=> 'daron_homepage_sections',
			) 
		);
			
			//Enable Blog
			$wp_customize->add_setting( 'daron_blog_section', array(
					'default'     		=> 'active',
					'sanitize_callback' => 'daron_sanitize_radio'
				)
			);
			$wp_customize->add_control('daron_blog_section', array(
					'type'      => 'radio',
					'label'     => __('Blog Section', 'daron'),
					'section'   => 'daron_blog_option',
					//'settings'   => 'daron_blog_section',
					'priority'  => 1,
					'choices'   => array(
						'active'       => __( 'Active', 'daron' ),
						'inactive'     => __( 'Inactive', 'daron' ),
					),
				)
			);
			
			//Title
			$wp_customize->add_setting('daron_blog_section_title', array(
					'default' 			=> esc_html('Blog','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('daron_blog_section_title', array(
					'label' 	=> __( 'Title', 'daron' ),
					'section' 	=> 'daron_blog_option',
					'type' 		=> 'text',
					'priority' 	=> 2,
					'active_callback' => 'daron_blog_callback',
				)
			);
			
			//Description
			$wp_customize->add_setting('daron_blog_section_desc', array(
					'default' 			=> esc_html('Latest News','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('daron_blog_section_desc', array(
					'label' 	=> __( 'Description', 'daron' ),
					'section' 	=> 'daron_blog_option',
					'type' 		=> 'text',
					'priority' 	=> 3,
					'active_callback' => 'daron_blog_callback',
				)
			);
			
			//Blog Column Layout
			$wp_customize->add_setting( 'daron_blog_column_layout', array(
					'default'     		=> 'col-md-4',
					'sanitize_callback' => 'daron_sanitize_radio'
				)
			);
			$wp_customize->add_control('daron_blog_column_layout', array(
					'type'      => 'radio',
					'label'     => __('Column Settings (Only For Desktop)', 'daron'),
					'section'   => 'daron_blog_option',
					'priority'  => 4,
					'choices'   => array(
						'col-md-4'     	=> __( '3 Column', 'daron' ),
						'col-md-6'      => __( '2 Column', 'daron' ),						
					),
					'active_callback' => 'daron_blog_callback',
				)
			);
	
			
			//Blog Radio Button Show And Hide Funcion			
			function daron_blog_callback( $daron_blog_control ) {
				$daron_blog_setting = $daron_blog_control->manager->get_setting('daron_blog_section')->value();
				$daron_blog_control_id = $daron_blog_control->id;
				//service one
				if ( $daron_blog_control_id == 'daron_blog_section_title'  && $daron_blog_setting == 'active' ) return true;
				if ( $daron_blog_control_id == 'daron_blog_section_desc'  && $daron_blog_setting == 'active' ) return true;
				if ( $daron_blog_control_id == 'daron_blog_column_layout'  && $daron_blog_setting == 'active' ) return true;
				if ( $daron_blog_control_id == 'bloglane_cz_recent_post'  && $daron_blog_setting == 'active' ) return true;
				if ( $daron_blog_control_id == 'bloglane_home_recent_post'  && $daron_blog_setting == 'active' ) return true;
				if ( $daron_blog_control_id == 'bloglane_cz_blog_layout'  && $daron_blog_setting == 'active' ) return true;
				if ( $daron_blog_control_id == 'bloglane_blog_sidebar_layout'  && $daron_blog_setting == 'active' ) return true;
				return false;
			}
		//6. Blog Options Settings End ======================================
		
		//4. portfolio Settings Start ======================================
		$wp_customize->add_section( 'daron_portfolio_option' , array(
				'title'      	=> __( 'HomePage portfolio Settings', 'daron' ),
				'description'   => __('You can add up to 6 images in the portfolio. ', 'daron'),
				'priority'      => 1,
				'panel'      	=> 'daron_homepage_sections',
			) 
		);
		
			//Enable portfolio			
			$wp_customize->add_setting( 'daron_portfolio_section', array(
					'default'      		=> 'active',
					'sanitize_callback' => 'daron_sanitize_radio'
				)
			);
			$wp_customize->add_control('daron_portfolio_section', array(
					'type'      => 'radio',
					'label'     => __('Portfolio Section', 'daron'),
					'section'   => 'daron_portfolio_option',
					'priority'  => 1,
					'choices'   => array(
						'active'       => __( 'Active', 'daron' ),
						'inactive'     => __( 'Inactive', 'daron' ),
					),
				)
			);
			
			//Title
			$wp_customize->add_setting('daron_portfolio_section_title', array(
					'default' 			=> esc_html('Portfolio','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('daron_portfolio_section_title', array(
					'label' 	=> __( 'Title', 'daron' ),
					'section' 	=> 'daron_portfolio_option',
					'type' 		=> 'text',
					'priority' 	=> 2,
					'active_callback' => 'daron_portfolio_callback',
				)
			);
			
			//Description
			$wp_customize->add_setting('daron_portfolio_section_desc', array(
					'default' 			=> esc_html('Recent Work','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('daron_portfolio_section_desc', array(
					'label' 	=> __( 'Description', 'daron' ),
					'section' 	=> 'daron_portfolio_option',
					'type' 		=> 'text',
					'priority' 	=> 3,
					'active_callback' => 'daron_portfolio_callback',
				)
			);
			
			
			//Portfolio One
			$wp_customize->add_setting('daron_title', array(
					'type'              => 'info_control',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'esc_attr',            
				)
			);
			
			$wp_customize->add_control( new Daron_info( $wp_customize, 'portfolio_one', array(
						'label' 	=> __('Portfolio One', 'daron'),
						'section' 	=> 'daron_portfolio_option',
						'settings' 	=> 'daron_title',
						'priority' 	=> 4,
						'active_callback' => 'daron_portfolio_callback',
					) 
				)
			);    
			
			$wp_customize->add_setting('daron_portfolio_image_one', array(
					'default' 			=> get_template_directory_uri() . '/images/portfolio/portfolio-1.jpg',
					'sanitize_callback' => 'esc_url_raw',
				)
			);
			$wp_customize->add_control(	new WP_Customize_Image_Control(	$wp_customize, 'daron_portfolio_image_one', array(
					   'label'          => __( 'Upload your image for the slide one', 'daron' ),
					   'type'           => 'image',
					   'section'        => 'daron_portfolio_option',
					   'settings'       => 'daron_portfolio_image_one',
					   'priority'       => 5,
						'active_callback' => 'daron_portfolio_callback',
					)
				)
			);
			
			//Title
			$wp_customize->add_setting('daron_portfolio_title_one', array(
					'default' 			=> esc_html('Portfolio','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
					
				)
			);
			$wp_customize->add_control('daron_portfolio_title_one', array(
					'label' 	=> __( 'Title for the slide one', 'daron' ),
					'section' 	=> 'daron_portfolio_option',
					'type' 		=> 'text',
					'priority' 	=> 6,
					'active_callback' => 'daron_portfolio_callback',
				)
			);
			
			//Description
			$wp_customize->add_setting('daron_portfolio_desc_one', array(
					'default' 			=> esc_html('Motivation is the catalyzing ingredient for every successful innovation.','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('daron_portfolio_desc_one', array(
					'label' 	=> __( 'portfolio Description', 'daron' ),
					'section' 	=> 'daron_portfolio_option',
					'type'		=> 'textarea',
					'priority' 	=> 7,
					'active_callback' => 'daron_portfolio_callback',
				)
			);
			
			//Portfolio two
			$wp_customize->add_setting('daron_title', array(
					'type'              => 'info_control',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'esc_attr',            
				)
			);
			
			$wp_customize->add_control( new Daron_info( $wp_customize, 'portfolio_two', array(
						'label' 	=> __('Portfolio Two', 'daron'),
						'section' 	=> 'daron_portfolio_option',
						'settings' 	=> 'daron_title',
						'priority' 	=> 8,
						'active_callback' => 'daron_portfolio_callback',
					) 
				)
			);    
			
			$wp_customize->add_setting('daron_portfolio_image_two', array(
					'default' 			=> get_template_directory_uri() . '/images/portfolio/portfolio-2.jpg',
					'sanitize_callback' => 'esc_url_raw',
				)
			);
			$wp_customize->add_control(	new WP_Customize_Image_Control(	$wp_customize, 'daron_portfolio_image_two', array(
					   'label'          => __( 'Upload your image for the slide two', 'daron' ),
					   'type'           => 'image',
					   'section'        => 'daron_portfolio_option',
					   'settings'       => 'daron_portfolio_image_two',
					   'priority'       => 9,
						'active_callback' => 'daron_portfolio_callback',
					)
				)
			);
			
			//Title
			$wp_customize->add_setting('daron_portfolio_title_two', array(
					'default' 			=> esc_html('Portfolio','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
					
				)
			);
			$wp_customize->add_control('daron_portfolio_title_two', array(
					'label' 	=> __( 'Title for the slide two', 'daron' ),
					'section' 	=> 'daron_portfolio_option',
					'type' 		=> 'text',
					'priority' 	=> 10,
					'active_callback' => 'daron_portfolio_callback',
				)
			);
			
			//Description
			$wp_customize->add_setting('daron_portfolio_desc_two', array(
					'default' 			=> esc_html('Motivation is the catalyzing ingredient for every successful innovation.','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('daron_portfolio_desc_two', array(
					'label' 	=> __( 'portfolio Description', 'daron' ),
					'section' 	=> 'daron_portfolio_option',
					'type'		=> 'textarea',
					'priority' 	=> 11,
					'active_callback' => 'daron_portfolio_callback',
				)
			);
			
			//Portfolio Three
			$wp_customize->add_setting('daron_title', array(
					'type'              => 'info_control',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'esc_attr',            
				)
			);
			
			$wp_customize->add_control( new Daron_info( $wp_customize, 'portfolio_three', array(
						'label' 	=> __('Portfolio Three', 'daron'),
						'section' 	=> 'daron_portfolio_option',
						'settings' 	=> 'daron_title',
						'priority' 	=> 12,
						'active_callback' => 'daron_portfolio_callback',
					) 
				)
			);    
			
			$wp_customize->add_setting('daron_portfolio_image_three', array(
					'default' 			=> get_template_directory_uri() . '/images/portfolio/portfolio-3.jpg',
					'sanitize_callback' => 'esc_url_raw',
				)
			);
			$wp_customize->add_control(	new WP_Customize_Image_Control(	$wp_customize, 'daron_portfolio_image_three', array(
					   'label'          => __( 'Upload your image for the slide three', 'daron' ),
					   'type'           => 'image',
					   'section'        => 'daron_portfolio_option',
					   'settings'       => 'daron_portfolio_image_three',
					   'priority'       => 13,
						'active_callback' => 'daron_portfolio_callback',
					)
				)
			);
			
			//Title
			$wp_customize->add_setting('daron_portfolio_title_three', array(
					'default' 			=> esc_html('Portfolio','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
					
				)
			);
			$wp_customize->add_control('daron_portfolio_title_three', array(
					'label' 	=> __( 'Title for the slide three', 'daron' ),
					'section' 	=> 'daron_portfolio_option',
					'type' 		=> 'text',
					'priority' 	=> 14,
					'active_callback' => 'daron_portfolio_callback',
				)
			);
			
			//Description
			$wp_customize->add_setting('daron_portfolio_desc_three', array(
					'default' 			=> esc_html('Motivation is the catalyzing ingredient for every successful innovation.','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('daron_portfolio_desc_three', array(
					'label' 	=> __( 'portfolio Description', 'daron' ),
					'section' 	=> 'daron_portfolio_option',
					'type'		=> 'textarea',
					'priority' 	=> 15,
					'active_callback' => 'daron_portfolio_callback',
				)
			);
			
			//Portfolio Four
			$wp_customize->add_setting('daron_title', array(
					'type'              => 'info_control',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'esc_attr',            
				)
			);
			
			$wp_customize->add_control( new Daron_info( $wp_customize, 'portfolio_four', array(
						'label' 	=> __('Portfolio Four', 'daron'),
						'section' 	=> 'daron_portfolio_option',
						'settings' 	=> 'daron_title',
						'priority' 	=> 16,
						'active_callback' => 'daron_portfolio_callback',
					) 
				)
			);    
			
			$wp_customize->add_setting('daron_portfolio_image_four', array(
					'default' 			=> get_template_directory_uri() . '/images/portfolio/portfolio-4.jpg',
					'sanitize_callback' => 'esc_url_raw',
				)
			);
			$wp_customize->add_control(	new WP_Customize_Image_Control(	$wp_customize, 'daron_portfolio_image_four', array(
					   'label'          => __( 'Upload your image for the slide four', 'daron' ),
					   'type'           => 'image',
					   'section'        => 'daron_portfolio_option',
					   'settings'       => 'daron_portfolio_image_four',
					   'priority'       => 17,
						'active_callback' => 'daron_portfolio_callback',
					)
				)
			);
			
			//Title
			$wp_customize->add_setting('daron_portfolio_title_four', array(
					'default' 			=> esc_html('Portfolio','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
					
				)
			);
			$wp_customize->add_control('daron_portfolio_title_four', array(
					'label' 	=> __( 'Title for the slide four', 'daron' ),
					'section' 	=> 'daron_portfolio_option',
					'type' 		=> 'text',
					'priority' 	=> 18,
					'active_callback' => 'daron_portfolio_callback',
				)
			);
			
			//Description
			$wp_customize->add_setting('daron_portfolio_desc_four', array(
					'default' 			=> esc_html('Motivation is the catalyzing ingredient for every successful innovation.','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('daron_portfolio_desc_four', array(
					'label' 	=> __( 'portfolio Description', 'daron' ),
					'section' 	=> 'daron_portfolio_option',
					'type'		=> 'textarea',
					'priority' 	=> 19,
					'active_callback' => 'daron_portfolio_callback',
				)
			);
			//Portfolio five
			$wp_customize->add_setting('daron_title', array(
					'type'              => 'info_control',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'esc_attr',            
				)
			);
			
			$wp_customize->add_control( new Daron_info( $wp_customize, 'portfolio_five', array(
						'label' 	=> __('Portfolio five', 'daron'),
						'section' 	=> 'daron_portfolio_option',
						'settings' 	=> 'daron_title',
						'priority' 	=> 20,
						'active_callback' => 'daron_portfolio_callback',
					) 
				)
			);    
			
			$wp_customize->add_setting('daron_portfolio_image_five', array(
					'default' 			=> get_template_directory_uri() . '/images/portfolio/portfolio-5.jpg',
					'sanitize_callback' => 'esc_url_raw',
				)
			);
			$wp_customize->add_control(	new WP_Customize_Image_Control(	$wp_customize, 'daron_portfolio_image_five', array(
					   'label'          => __( 'Upload your image for the slide five', 'daron' ),
					   'type'           => 'image',
					   'section'        => 'daron_portfolio_option',
					   'settings'       => 'daron_portfolio_image_five',
					   'priority'       => 21,
						'active_callback' => 'daron_portfolio_callback',
					)
				)
			);
			
			//Title
			$wp_customize->add_setting('daron_portfolio_title_five', array(
					'default' 			=> esc_html('Portfolio','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
					
				)
			);
			$wp_customize->add_control('daron_portfolio_title_five', array(
					'label' 	=> __( 'Title for the slide five', 'daron' ),
					'section' 	=> 'daron_portfolio_option',
					'type' 		=> 'text',
					'priority' 	=> 22,
					'active_callback' => 'daron_portfolio_callback',
				)
			);
			
			//Description
			$wp_customize->add_setting('daron_portfolio_desc_five', array(
					'default' 			=> esc_html('Motivation is the catalyzing ingredient for every successful innovation.','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('daron_portfolio_desc_five', array(
					'label' 	=> __( 'portfolio Description', 'daron' ),
					'section' 	=> 'daron_portfolio_option',
					'type'		=> 'textarea',
					'priority' 	=> 23,
					'active_callback' => 'daron_portfolio_callback',
				)
			);
			//Portfolio Six
			$wp_customize->add_setting('daron_title', array(
					'type'              => 'info_control',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'esc_attr',            
				)
			);
			
			$wp_customize->add_control( new Daron_info( $wp_customize, 'portfolio_six', array(
						'label' 	=> __('Portfolio six', 'daron'),
						'section' 	=> 'daron_portfolio_option',
						'settings' 	=> 'daron_title',
						'priority' 	=> 24,
						'active_callback' => 'daron_portfolio_callback',
					) 
				)
			);    
			
			$wp_customize->add_setting('daron_portfolio_image_six', array(
					'default' 			=> get_template_directory_uri() . '/images/portfolio/portfolio-6.jpg',
					'sanitize_callback' => 'esc_url_raw',
				)
			);
			$wp_customize->add_control(	new WP_Customize_Image_Control(	$wp_customize, 'daron_portfolio_image_six', array(
					   'label'          => __( 'Upload your image for the slide six', 'daron' ),
					   'type'           => 'image',
					   'section'        => 'daron_portfolio_option',
					   'settings'       => 'daron_portfolio_image_six',
					   'priority'       => 25,
						'active_callback' => 'daron_portfolio_callback',
					)
				)
			);
			
			//Title
			$wp_customize->add_setting('daron_portfolio_title_six', array(
					'default' 			=> esc_html('Portfolio','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
					
				)
			);
			$wp_customize->add_control('daron_portfolio_title_six', array(
					'label' 	=> __( 'Title for the slide six', 'daron' ),
					'section' 	=> 'daron_portfolio_option',
					'type' 		=> 'text',
					'priority' 	=> 26,
					'active_callback' => 'daron_portfolio_callback',
				)
			);
			
			//Description
			$wp_customize->add_setting('daron_portfolio_desc_six', array(
					'default' 			=> esc_html('Motivation is the catalyzing ingredient for every successful innovation.','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('daron_portfolio_desc_six', array(
					'label' 	=> __( 'portfolio Description', 'daron' ),
					'section' 	=> 'daron_portfolio_option',
					'type'		=> 'textarea',
					'priority' 	=> 27,
					'active_callback' => 'daron_portfolio_callback',
				)
			);
			
			
			
			//portfolio Radio Button Show And Hide Funcion			
			function daron_portfolio_callback( $daron_portfolio_control ) {
				$daron_portfolio_radio_setting = $daron_portfolio_control->manager->get_setting('daron_portfolio_section')->value();
				$daron_portfolio_control_id = $daron_portfolio_control->id;
				if ( $daron_portfolio_control_id == 'daron_portfolio_section_title'  && $daron_portfolio_radio_setting == 'active' ) return true;
				if ( $daron_portfolio_control_id == 'daron_portfolio_section_desc'  && $daron_portfolio_radio_setting == 'active' ) return true;
				//Portfolio one
				if ( $daron_portfolio_control_id == 'portfolio_one'  && $daron_portfolio_radio_setting == 'active' ) return true;
				if ( $daron_portfolio_control_id == 'daron_portfolio_image_one'  && $daron_portfolio_radio_setting == 'active' ) return true;
				if ( $daron_portfolio_control_id == 'daron_portfolio_title_one'  && $daron_portfolio_radio_setting == 'active' ) return true;
				if ( $daron_portfolio_control_id == 'daron_portfolio_desc_one'  && $daron_portfolio_radio_setting == 'active' ) return true;
				
				//Portfolio Two
				if ( $daron_portfolio_control_id == 'portfolio_two'  && $daron_portfolio_radio_setting == 'active' ) return true;
				if ( $daron_portfolio_control_id == 'daron_portfolio_image_two'  && $daron_portfolio_radio_setting == 'active' ) return true;
				if ( $daron_portfolio_control_id == 'daron_portfolio_title_two'  && $daron_portfolio_radio_setting == 'active' ) return true;
				if ( $daron_portfolio_control_id == 'daron_portfolio_desc_two'  && $daron_portfolio_radio_setting == 'active' ) return true;
				
				//Portfolio Three
				if ( $daron_portfolio_control_id == 'portfolio_three'  && $daron_portfolio_radio_setting == 'active' ) return true;
				if ( $daron_portfolio_control_id == 'daron_portfolio_image_three'  && $daron_portfolio_radio_setting == 'active' ) return true;
				if ( $daron_portfolio_control_id == 'daron_portfolio_title_three'  && $daron_portfolio_radio_setting == 'active' ) return true;
				if ( $daron_portfolio_control_id == 'daron_portfolio_desc_three'  && $daron_portfolio_radio_setting == 'active' ) return true;
				
				//Portfolio four
				if ( $daron_portfolio_control_id == 'portfolio_four'  && $daron_portfolio_radio_setting == 'active' ) return true;
				if ( $daron_portfolio_control_id == 'daron_portfolio_image_four'  && $daron_portfolio_radio_setting == 'active' ) return true;
				if ( $daron_portfolio_control_id == 'daron_portfolio_title_four'  && $daron_portfolio_radio_setting == 'active' ) return true;
				if ( $daron_portfolio_control_id == 'daron_portfolio_desc_four'  && $daron_portfolio_radio_setting == 'active' ) return true;
				
				//Portfolio five
				if ( $daron_portfolio_control_id == 'portfolio_five'  && $daron_portfolio_radio_setting == 'active' ) return true;
				if ( $daron_portfolio_control_id == 'daron_portfolio_image_five'  && $daron_portfolio_radio_setting == 'active' ) return true;
				if ( $daron_portfolio_control_id == 'daron_portfolio_title_five'  && $daron_portfolio_radio_setting == 'active' ) return true;
				if ( $daron_portfolio_control_id == 'daron_portfolio_desc_five'  && $daron_portfolio_radio_setting == 'active' ) return true;
				
				//Portfolio six
				if ( $daron_portfolio_control_id == 'portfolio_six'  && $daron_portfolio_radio_setting == 'active' ) return true;
				if ( $daron_portfolio_control_id == 'daron_portfolio_image_six'  && $daron_portfolio_radio_setting == 'active' ) return true;
				if ( $daron_portfolio_control_id == 'daron_portfolio_title_six'  && $daron_portfolio_radio_setting == 'active' ) return true;
				if ( $daron_portfolio_control_id == 'daron_portfolio_desc_six'  && $daron_portfolio_radio_setting == 'active' ) return true;
			
				
				return false;
			}	
		//4. portfolio Settings End ======================================
		
		//8. Testimonial Settings Start ======================================
		$wp_customize->add_section( 'daron_testimonial_option' , array(
				'title'      	=> __( 'HomePage Testimonial Settings', 'daron' ),
				//'description'   => __('You can add up to 2 testimonials. ', 'daron'),
				'priority'      => 5,
				'panel'      	=> 'daron_homepage_sections',
			) 
		);
		
			//Enable Testimonial			
			$wp_customize->add_setting( 'daron_testimonial_section', array(
					'default'      		=> 'active',
					'sanitize_callback' => 'daron_sanitize_radio'
				)
			);
			$wp_customize->add_control('daron_testimonial_section', array(
					'type'      => 'radio',
					'label'     => __('Testimonial Section', 'daron'),
					'section'   => 'daron_testimonial_option',
					'priority'  => 1,
					'choices'   => array(
						'active'       => __( 'Active', 'daron' ),
						'inactive'     => __( 'Inactive', 'daron' ),
					),
				)
			);
			
			
			//Title
			$wp_customize->add_setting('daron_testimonial_title', array(
					'default' 			=> esc_html('Testimonials','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('daron_testimonial_title', array(
					'label' 	=> __( 'Title', 'daron' ),
					'section' 	=> 'daron_testimonial_option',
					'type' 		=> 'text',
					'priority' 	=> 1,
					'active_callback' => 'daron_testimonial_callback',
				)
			);
			
			//Description
			$wp_customize->add_setting('daron_testimonial_desc', array(
					'default' 			=> esc_html('What Clients Say?','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('daron_testimonial_desc', array(
					'label' 	=> __( 'Description', 'daron' ),
					'section' 	=> 'daron_testimonial_option',
					'type' 		=> 'text',
					'priority' 	=> 2,
					'active_callback' => 'daron_testimonial_callback',
				)
			);
			
			
			//Testimonial One
			$wp_customize->add_setting('daron_title', array(
					'type'              => 'info_control',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'esc_attr',            
				)
			);
			
			$wp_customize->add_control( new Daron_info( $wp_customize, 'testimonial_one', array(
						'label' 	=> __('Testimonial One', 'daron'),
						'section' 	=> 'daron_testimonial_option',
						'settings' 	=> 'daron_title',
						'priority' 	=> 3,
						'active_callback' => 'daron_testimonial_callback',
					) 
				)
			);    
			
			$wp_customize->add_setting('daron_testimonial_image_one', array(
					'default' 			=> get_template_directory_uri() . '/images/testimonial/client.jpg',
					'sanitize_callback' => 'esc_url_raw',
				)
			);
			$wp_customize->add_control(	new WP_Customize_Image_Control(	$wp_customize, 'daron_testimonial_image_one', array(
					   'label'          => __( 'Upload your image for the testimonial one', 'daron' ),
					   'type'           => 'image',
					   'section'        => 'daron_testimonial_option',
					   'settings'       => 'daron_testimonial_image_one',
					   'priority'       => 4,
						'active_callback' => 'daron_testimonial_callback',
					)
				)
			);
			
			//Title
			$wp_customize->add_setting('daron_testimonial_designation_one', array(
					'default' 			=> esc_html('Jake Richardson','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
					
				)
			);
			$wp_customize->add_control('daron_testimonial_designation_one', array(
					'label' 	=> __( 'Designation', 'daron' ),
					'section' 	=> 'daron_testimonial_option',
					'type' 		=> 'text',
					'priority' 	=> 5,
					'active_callback' => 'daron_testimonial_callback',
				)
			);
			
			//Description
			$wp_customize->add_setting('daron_testimonial_desc_one', array(
					'default' 			=> esc_html('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam orci sapien, tempor ut sapien scelerisque, vestibulum tincidunt risus. Lorem ipsum dolor sit amet.','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('daron_testimonial_desc_one', array(
					'label' 	=> __( 'Description', 'daron' ),
					'section' 	=> 'daron_testimonial_option',
					'type'		=> 'textarea',
					'priority' 	=> 5,
					'active_callback' => 'daron_testimonial_callback',
				)
			);
			
			
			//Testimonial Radio Button Show And Hide Funcion			
			function daron_testimonial_callback( $daron_testimonial_control ) {
				$daron_testimonial_radio_setting = $daron_testimonial_control->manager->get_setting('daron_testimonial_section')->value();
				$daron_testimonial_control_id = $daron_testimonial_control->id;
				
				if ( $daron_testimonial_control_id == 'daron_testimonial_title'  && $daron_testimonial_radio_setting == 'active' ) return true;
				if ( $daron_testimonial_control_id == 'daron_testimonial_desc'  && $daron_testimonial_radio_setting == 'active' ) return true;
				//slide one
				if ( $daron_testimonial_control_id == 'testimonial_one'  && $daron_testimonial_radio_setting == 'active' ) return true;
				if ( $daron_testimonial_control_id == 'daron_testimonial_image_one'  && $daron_testimonial_radio_setting == 'active' ) return true;
				if ( $daron_testimonial_control_id == 'daron_testimonial_designation_one'  && $daron_testimonial_radio_setting == 'active' ) return true;
				if ( $daron_testimonial_control_id == 'daron_testimonial_desc_one'  && $daron_testimonial_radio_setting == 'active' ) return true;
				
				return false;
			}	
		//8. Testimonial Settings End ======================================
		
		/* //8. Call out Settings Start ======================================
		$wp_customize->add_section( 'daron_callout_option' , array(
				'title'      	=> __( 'HomePage Callout Settings', 'daron' ),
				'description'   => __('You can add up to 2 callout. ', 'daron'),
				'priority'      => 5,
				'panel'      	=> 'daron_homepage_sections',
			) 
		);
		
			//Enable Testimonial			
			$wp_customize->add_setting( 'daron_callout_section', array(
					'default'      		=> 'inactive',
					'sanitize_callback' => 'daron_sanitize_radio'
				)
			);
			$wp_customize->add_control('daron_callout_section', array(
					'type'      => 'radio',
					'label'     => __('Callout Section', 'daron'),
					'section'   => 'daron_callout_option',
					'priority'  => 1,
					'choices'   => array(
						'active'       => __( 'Active', 'daron' ),
						'inactive'     => __( 'Inactive', 'daron' ),
					),
				)
			);
			
			
			//Title
			$wp_customize->add_setting('daron_callout_title', array(
					'default' 			=> esc_html('Daron Is Awesome Theme','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('daron_callout_title', array(
					'label' 	=> __( 'Title', 'daron' ),
					'section' 	=> 'daron_callout_option',
					'type' 		=> 'text',
					'priority' 	=> 1,
					'active_callback' => 'daron_callout_callback',
				)
			);
			
			//Desc Text
			$wp_customize->add_setting('daron_callout_desc', array(
					'default' 			=> esc_html('Lorem ipsum dolor sit amet, cons adipiscing elit. Aenean commodo ligula eget dolor.','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('daron_callout_desc', array(
					'label' 	=> __( 'Description', 'daron' ),
					'section' 	=> 'daron_callout_option',
					'type' 		=> 'text',
					'priority' 	=> 2,
					'active_callback' => 'daron_callout_callback',
				)
			);
			
			//Button Text
			$wp_customize->add_setting('daron_callout_btn_txt', array(
					'default' 			=> esc_html('Buy Now','daron'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('daron_callout_btn_txt', array(
					'label' 	=> __( 'Callout Button Text', 'daron' ),
					'section' 	=> 'daron_callout_option',
					'type' 		=> 'text',
					'priority' 	=> 3,
					'active_callback' => 'daron_callout_callback',
				)
			);
			
			//Button Link
			$wp_customize->add_setting('daron_callout_btn_url', array( 
					'default' 			=> '',
					'sanitize_callback' => 'esc_url_raw'
					) 
				);
			$wp_customize->add_control('daron_callout_btn_url', array(
					'description' 	=> __('Enter your Callout Button Link.', 'daron'),
					'section' 		=> 'daron_callout_option',
					'type' 			=> 'url',
					'priority' 		=> 4,
					'active_callback' => 'daron_callout_callback',
				)
			);
			
			
			//callout Radio Button Show And Hide Funcion			
			function daron_callout_callback( $daron_callout_control ) {
				$daron_callout_radio_setting = $daron_callout_control->manager->get_setting('daron_callout_section')->value();
				$daron_callout_control_id = $daron_callout_control->id;
				
				if ( $daron_callout_control_id == 'daron_callout_title'  && $daron_callout_radio_setting == 'active' ) return true;
				if ( $daron_callout_control_id == 'daron_callout_desc'  && $daron_callout_radio_setting == 'active' ) return true;
				if ( $daron_callout_control_id == 'daron_callout_btn_txt'  && $daron_callout_radio_setting == 'active' ) return true;
				if ( $daron_callout_control_id == 'daron_callout_btn_url'  && $daron_callout_radio_setting == 'active' ) return true;
				
				return false;
			}	
		//8. callout Settings End ====================================== */
		
		
		
		//Blog Options
		/* $wp_customize->add_section( 'daron_blog_option' , array(
				'title'      	=> __( 'Blog Settings', 'daron' ),
				'description'	=> __( 'You can change blog page layout and single blog page layout from here.', 'daron' ),
				'priority'      => 4,
				'panel'      	=> 'daron_theme_options',
			) 
		); */
		
			
			
		//Social Icon Settings
		$wp_customize->add_section( 'daron_topbar_settings' , array(
				'title'      	=> __( 'Social Icon Settings', 'daron' ),
				'priority'      => 5,
				'panel'			=> 'daron_theme_options',
				'description'	=> __('Social Media icons will disappear if you leave it blank.', 'daron')
			) 
		);
		
			//Enable Search Icon			
			$wp_customize->add_setting( 'daron_search_icon', array(
					'default'      		=> __('active', 'daron'),
					'sanitize_callback' => 'daron_sanitize_radio'
				)
			);
			$wp_customize->add_control('daron_search_icon', array(
					'type'      => 'radio',
					'label'     => __('Show Search Icon', 'daron'),
					'section'   => 'daron_topbar_settings',
					'priority'  => 1,
					'choices'   => array(
						'active'       => __( 'Show', 'daron' ),
						'inactive'     => __( 'Hide', 'daron' ),
					),
				)
			);
			
			//Social Media
			$wp_customize->add_setting('daron_title', array(
					'type'              => 'info_control',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'esc_attr',     
				)
			);
			
			$wp_customize->add_control( new Daron_info( $wp_customize, 'social_media', array(
						'label' 	=> __('Social Media', 'daron'),
						'section' 	=> 'daron_topbar_settings',
						'settings' 	=> 'daron_title',
						'priority' 	=> 4,
					) 
				)
			);
			
			//Facebook link
			$wp_customize->add_setting( 'daron_fb_link_disable', array(
					'default'           => 1,
					'sanitize_callback' => 'daron_sanitize_checkbox',
				)
			);
			$wp_customize->add_control( 'daron_fb_link_disable', array(
					'type'        => 'checkbox',
					'label'       => __('Disable Facebook Icon?', 'daron'),
					'section'     => 'daron_topbar_settings',
					'priority' 	  => 4,
				)
			);
			
			$wp_customize->add_setting('daron_facebook_url', array( 
					'default' 			=> '',
					'sanitize_callback' => 'esc_url_raw'
					) 
				);
			$wp_customize->add_control('daron_facebook_url', array(
					'description' 	=> __('Enter your Facebook url.', 'daron'),
					'section' 		=> 'daron_topbar_settings',
					'type' 			=> 'url',
					'priority' 		=> 4,
				)
			);
			//Twitter URL
			$wp_customize->add_setting( 'daron_tweet_link_disable', array(
					'default'           => 1,
					'sanitize_callback' => 'daron_sanitize_checkbox',
				)
			);
			$wp_customize->add_control( 'daron_tweet_link_disable', array(
					'type'        => 'checkbox',
					'label'       => __('Disable Twitter Icon?', 'daron'),
					'section'     => 'daron_topbar_settings',
					'priority' 	  => 4,
				)
			);
			
			$wp_customize->add_setting('daron_twitter_url', array( 
					'default' 			=> '',
					'sanitize_callback' => 'esc_url_raw'
					) 
				);
			$wp_customize->add_control('daron_twitter_url', array(
					'description' 	=> __('Enter your Twitter url.', 'daron'),
					'section' 		=> 'daron_topbar_settings',
					'type' 			=> 'url',
					'priority' 		=> 4,
				)
			);
			
			//Instagram URL
			$wp_customize->add_setting( 'daron_insta_link_disable', array(
					'default'           => 1,
					'sanitize_callback' => 'daron_sanitize_checkbox',
				)
			);
			$wp_customize->add_control( 'daron_insta_link_disable', array(
					'type'        => 'checkbox',
					'label'       => __('Disable Instagram Icon?', 'daron'),
					'section'     => 'daron_topbar_settings',
					'priority' 	  => 4,
				)
			);
			
			$wp_customize->add_setting('daron_instagram_url', array(
					'default' 			=> '',
					'sanitize_callback' => 'esc_url_raw'
					) 
				);
			$wp_customize->add_control('daron_instagram_url', array(
					'description'	=> __('Enter your Instagram url.', 'daron'),
					'section' 		=> 'daron_topbar_settings',
					'type' 			=> 'url',
					'priority' 		=> 4,
				)
			);
			//YouTube URL
			$wp_customize->add_setting( 'daron_youtube_link_disable', array(
					'default'           => 1,
					'sanitize_callback' => 'daron_sanitize_checkbox',
				)
			);
			$wp_customize->add_control( 'daron_youtube_link_disable', array(
					'type'        => 'checkbox',
					'label'       => __('Disable YouTube Icon?', 'daron'),
					'section'     => 'daron_topbar_settings',
					'priority' 	  => 4,
				)
			);
			
			$wp_customize->add_setting('daron_youtube_url', array(
					'default'			=> '',
					'sanitize_callback' => 'esc_url_raw'
					) 
				);
			$wp_customize->add_control('daron_youtube_url', array(
					'description' 	=> __('Enter your YouTube url.', 'daron'),
					'section' 		=> 'daron_topbar_settings',
					'type' 			=> 'url',
					'priority' 		=> 4,
				)
			);
			
			//LinkDin URL
			$wp_customize->add_setting( 'daron_linkdin_link_disable', array(
					'default'           => 1,
					'sanitize_callback' => 'daron_sanitize_checkbox',
				)
			);
			$wp_customize->add_control( 'daron_linkdin_link_disable', array(
					'type'        => 'checkbox',
					'label'       => __('Disable LinkeDin Icon?', 'daron'),
					'section'     => 'daron_topbar_settings',
					'priority' 	  => 4,
				)
			);
			
			$wp_customize->add_setting('daron_linkdin_url', array(
					'default'			=> '',
					'sanitize_callback' => 'esc_url_raw'
					) 
				);
			$wp_customize->add_control('daron_linkdin_url', array(
					'description' 	=> __('Enter your LinkeDin url.', 'daron'),
					'section' 		=> 'daron_topbar_settings',
					'type' 			=> 'url',
					'priority' 		=> 4,
				)
			);

			
			
		//Footer Settings
		$wp_customize->add_section( 'daron_footer_settings' , array(
				'title'      	=> __( 'Footer Settings', 'daron' ),
				'priority'      => 6,
				'panel'			=> 'daron_theme_options',
			) 
		);
			//Enable Widget			
			$wp_customize->add_setting( 'daron_widgets_section', array(
					'default'      		=> 'inactive',
					'sanitize_callback' => 'daron_sanitize_radio'
				)
			);
			$wp_customize->add_control('daron_widgets_section', array(
					'type'      => 'radio',
					'label'     => __('Widgets Section', 'daron'),
					'section'   => 'daron_footer_settings',
					'priority'  => 1,
					'choices'   => array(
						'active'       => __( 'Active', 'daron' ),
						'inactive'     => __( 'Inactive', 'daron' ),
					),
				)
			);
			

			//Footer Column Layout
			$wp_customize->add_setting( 'daron_footer_column_layout', array(
					'default'      		=> '3',
					'sanitize_callback' => 'daron_sanitize_radio',
				)
			);
			$wp_customize->add_control('daron_footer_column_layout', array(
					'type'      => 'radio',
					'label'     => __('Footer Column Layout', 'daron'),
					'section'   => 'daron_footer_settings',
					'priority'  => 3,
					'choices'   => array(
						'1'   	 => __( 'One Column', 'daron' ),
						'2'      => __( 'Two Column', 'daron' ),
						'3'      => __( 'Three Column', 'daron' ),
						'4'      => __( 'Four Column', 'daron' ),
					),
				)
			);
			
			//Footer Bottom
			$wp_customize->add_setting(
				'copyright_text',
				array(
					'default' => '',
					'sanitize_callback' => 'daron_sanitize_text',
				)
			);
			$wp_customize->add_control(
				'copyright_text',
				array(
					'label' => __( 'Copyright Text.', 'daron' ),
					'section' => 'daron_footer_settings',
					'type' => 'text',
					'priority' => 4
				)
			);
			
			$wp_customize->get_setting( 'blogname' )->transport        = 'refresh';
			$wp_customize->get_setting( 'blogdescription' )->transport = 'refresh';

			if ( isset( $wp_customize->selective_refresh ) ) {
				$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
				$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

				$wp_customize->selective_refresh->add_partial( 'blogname', array(
					'selector'        => '.s-header-v2__logo a',
					'render_callback' => 'daron_customize_partial_blogname',
				) );
				$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
					'selector'        => '.site-description',
					'render_callback' => 'daron_customize_partial_blogdescription',
				) );
			}
			
}
add_action( 'customize_register', 'daron_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function daron_customize_partial_blogname() {

	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function daron_customize_partial_blogdescription() {

	bloginfo( 'description' );
}


/**
	Sanitize
**/
//checkbox sanitization function
function daron_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return 0;
	}
}
     
//radio box sanitization function
function daron_sanitize_radio( $input, $setting ) {
 
	//input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
	$input = sanitize_key($input);

	//get the list of possible radio box options 
	$choices = $setting->manager->get_control( $setting->id )->choices;
					 
	//return input if valid or return default option
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
	 
}

//select sanitization function
function daron_sanitize_select( $input, $setting ) {
 
	//input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
	$input = sanitize_key($input);

	//get the list of possible select options 
	$choices = $setting->manager->get_control( $setting->id )->choices;
					 
	//return input if valid or return default option
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
	 
}

/**
 * Function to sanitize alpha color.
 *
 * @param string $input Hex or RGBA color.
 *
 * @return string
 */
function daron_sanitize_hex_colors( $input ) {
	// Is this an rgba color or a hex?
	$mode = ( false === strpos( $input, 'rgba' ) ) ? 'hex' : 'rgba';

	if ( 'rgba' === $mode ) {
		return hestia_sanitize_rgba( $input );
	} else {
		return sanitize_hex_color( $input );
	}
}

//Text
function daron_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
//Background size
function daron_sanitize_bg_size( $input ) {
    $valid = array(
        'cover'     => __('Cover', 'daron'),
        'contain'   => __('Contain', 'daron'),
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
?>