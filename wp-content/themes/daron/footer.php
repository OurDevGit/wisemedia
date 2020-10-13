 <?php 
	//Widegt Section
		$daron_widgets_section = get_theme_mod('daron_widgets_section', 'inactive');
		
		// Get Footer Layout Settings
		$daron_footer_column_layout = get_theme_mod('daron_footer_column_layout', 2);
		if($daron_footer_column_layout == 1) $daron_footer_class_name = "col-md-12 col-sm-12 col-xs-12";	// one column
		if($daron_footer_column_layout == 2) $daron_footer_class_name = "col-md-6 col-sm-6 col-xs-12";		// two column
		if($daron_footer_column_layout == 3) $daron_footer_class_name = "col-md-4 col-sm-6 col-xs-12";		// three column
		if($daron_footer_column_layout == 4) $daron_footer_class_name = "col-md-3 col-sm-6 col-xs-12";		// four column
						
?>
	<!--========== FOOTER ==========-->
        <footer class="g-bg-color--dark">
			<?php if($daron_widgets_section == 'active') { ?>
            <div class="g-hor-divider__dashed--white-opacity-lightest">
                <div class="container g-padding-y-80--xs">
                    <div class="row">
						<?php 
						// Fetch daron Theme Footer Widget
						if ( is_active_sidebar( 'daron-footer-widget' ) ){
							dynamic_sidebar( 'daron-footer-widget' );
						} else { // Show default data is no widget activated into Footer Widget area of theme
						?>
                        <div class="<?php echo esc_attr($daron_footer_class_name); ?>">
							<div class="widget footer-widget">
								<div class="footer-logo">
									<div class="g-letter-spacing--2 g-margin-b-10--xs g-font-size-32--xs">
										<a class="g-color--primary" href="<?php echo esc_url(home_url( '/' )); ?>">
											<?php echo esc_attr(get_bloginfo('name'));  ?>
										</a>
									</div>
									<p>
									<?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus felis dolor, rutrum non eros sit amet, elementum venenatis velit. Cras placerat, magna in consectetur eleifend, lacus arcu laoreet odio, a sodales dolor odio sed augue. Quisque quis convallis ipsum. Vivamus elementum sapien lacus, non malesuada erat cursus a. Sed a dui quis nisi rutrum convallis.', 'daron'); ?>
									</p>
								</div>
							</div>
                        </div>
                        <div class="<?php echo esc_attr($daron_footer_class_name); ?> g-margin-b-20--xs g-margin-b-0--md">
							<div class="widget footer-widget">
								<h4 class="g-color--white g-font-size-20--xs g-letter-spacing--2 g-margin-b-25--xs"><?php esc_html_e('Recent News', 'daron'); ?></h4>
								<ul class="">
									<?php 
									$footer_post_args = array( 'posts_per_page' => '3' );
									$footer_recent_posts = new WP_Query($footer_post_args);
									while( $footer_recent_posts->have_posts() ) { 
									   $footer_recent_posts->the_post() ; 
										if ( has_post_thumbnail() ) {
											?>
											<li class="g-pull-left--xs">
												<div class="g-padding-x-0--xs col-xs-2">
													<a class="image-wrapper" href="<?php the_permalink(); ?>"><?php echo the_post_thumbnail(); ?></a>
												</div>
												<div class="col-xs-10">
													<h3 class="g-font-size-18--xs g-letter-spacing--1 g-margin-b-0--xs"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
													<p class="g-font-size-12--xs g-font-weight--700 g-letter-spacing--2 blog-date-color"><?php echo get_the_date(); ?></p>
												</div>
											</li>
											<?php 
										}
									}
									// Reset Post Data
									wp_reset_postdata();
									?>
								</ul>
							</div>
                        </div>
						<?php } ?>
                    </div>
                </div>
            </div>
            <!-- End Links -->
			<?php } ?>
		<?php 
		// get footer bottom
		get_template_part('/include/widgets/footer-bottom');
		wp_footer();
		?>
	</body>
</html>