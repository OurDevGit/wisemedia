	<?php 
	// Get bloglane settings
	$bloglane_home_recent_post = get_theme_mod('bloglane_home_recent_post', 10); 
	$bloglane_blog_img_crop = get_theme_mod('bloglane_blog_img_crop', 'daron_thumb_custum_sizes'); 
	
	?>
	<section class="g-bg-color--sky-light site-content">
		<div class="container g-padding-y-100--xs g-padding-y-125--xsm">
			<div class="g-text-center--xs g-margin-b-70--xs section-heading">
				<p class="g-font-size-16--xs g-color--primary g-letter-spacing--2 g-margin-b-30--xs"><?php echo esc_html(get_theme_mod('daron_blog_section_title', 'Blog')); ?></p>
				<h2 class="g-font-size-32--xs g-font-size-36--md g-margin-b-30--xs"><?php echo esc_html(get_theme_mod('daron_blog_section_desc', 'Latest News')); ?></h2>
			</div>
			<div class="row">
				<?php
				// Page Layout Settings
				$bloglane_blog_sidebar_layout = get_theme_mod('bloglane_blog_sidebar_layout', 'fullwidth');
				
				// Intialize Variable
				$layout_style = "col-md-12 col-sm-12 col-xs-12";
				
				// Check Sidebar Column Condition
				if( $bloglane_blog_sidebar_layout == "rightsidebar" || $bloglane_blog_sidebar_layout == "leftsidebar" && is_active_sidebar( 'sidebar-widget' )  ) {
					$layout_style = "col-md-8 col-sm-7 col-xs-12";
				}
				?>
				<?php if($bloglane_blog_sidebar_layout == "leftsidebar") { ?>
					<?php if ( is_active_sidebar( 'sidebar-widget' ) ) { ?>
						<!--Sidebar Widget-->
						<div class="col-md-4 col-sm-5 col-xs-12">
							<div class="sidebar">
								<?php dynamic_sidebar('sidebar-widget') ?>
							</div>
						</div>
						<!--Sidebar Widget End-->
					<?php } ?>
				<?php } ?>
				<div class="<?php echo esc_attr($layout_style); ?>">
						<?php
						// Get current page and append to custom query parameters array
						$custom_query_args = array( 'post_type' => 'post', 'posts_per_page' => $bloglane_home_recent_post);
						// Instantiate custom query
						$custom_query = new WP_Query( $custom_query_args );
						// Fetch All Post 
						if( $custom_query->have_posts()):
							$case = 0;
							while ( $custom_query->have_posts()) : $custom_query->the_post();
							$post_id = get_the_ID();
							// get post contant
							$title = get_the_title();
							$content = get_the_content();
							?>
							<!-- News --> 
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class="blog-list-wrap">
										<?php 
										if ( wp_is_mobile() ) { ?>
											<!--Post Thumbnail-->
											<?php if ( has_post_thumbnail() ) { ?>
											<div class="col-md-4 col-sm-4 col-xs-12 blog-img-box blog-img-box-l" >
												<!--Post Thumbnail-->
												<a href="<?php the_permalink(); ?>">
													<?php echo the_post_thumbnail($bloglane_blog_img_crop); ?>
												</a>
											</div>
											<?php } ?>
											<div class="<?php if ( has_post_thumbnail() ) { echo "col-md-8 col-sm-8"; } else { echo "col-md-12 col-sm-12"; } ?> col-xs-12 blog-meta-box-wrap">
												<div class="blog-meta-box g-bg-color--white g-text-left--xs">
													<h3 class="g-font-size-32--xs g-letter-spacing--1 formate-hading-color">
														<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
													</h3>
													<p class="blog-list-meta g-margin-b-10--xs g-font-size-14--xs g-letter-spacing--2 blog-date-color"><?php echo get_the_date(); ?> |
														<a href="#"><?php $categories = get_the_category();
															$separator = ", ";
															$output = '';

															if($categories){
																foreach($categories as $category){
																	$output .= '<a class="categories-color-blog" href="' .get_category_link($category->term_id) .'">' . $category->cat_name . '</a>'  . $separator;
																}
																echo trim($output, $separator);
															} ?>
														</a> 
														| <span class=""><?php comments_number(); ?></span>
													</p>
													<span class="blog-list-desc"><?php echo the_excerpt(); ?></span>
													<div class="g-padding-y-20--xs g-font-size-14--xs g-color--primary g-letter-spacing--2">
														<a class="read-more" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'bloglane'); ?></a>
													</div>
												</div>
											</div>
											<?php
										} else {
											if($case % 2 == 0) { ?>
												<!--Post Thumbnail-->
												<?php if ( has_post_thumbnail() ) { ?>
												<div class="col-md-4 col-sm-4 col-xs-12 blog-img-box blog-img-box-l" >
													<!--Post Thumbnail-->
													<a href="<?php the_permalink(); ?>">
														<?php echo the_post_thumbnail($bloglane_blog_img_crop); ?>
													</a>
												</div>
												<?php } ?>
											<?php } ?>
											<div class="<?php if ( has_post_thumbnail() ) { echo "col-md-8 col-sm-8"; } else { echo "col-md-12 col-sm-12"; } ?> col-xs-12 blog-meta-box-wrap">
												<div class="g-bg-color--white g-text-left--xs blog-meta-box">
													<h3 class="g-font-size-32--xs g-letter-spacing--1 formate-hading-color">
														<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
													</h3>
													<p class="blog-list-meta g-margin-b-10--xs g-font-size-14--xs g-letter-spacing--2 blog-date-color"><?php echo get_the_date(); ?> |
														<a href="#"><?php $categories = get_the_category();
															$separator = ", ";
															$output = '';

															if($categories){
																foreach($categories as $category){
																	$output .= '<a class="categories-color-blog" href="' .get_category_link($category->term_id) .'">' . $category->cat_name . '</a>'  . $separator;
																}
																echo trim($output, $separator);
															} ?>
														</a> 
														| <span class=""><?php comments_number(); ?></span>
													</p>
													<span class="blog-list-desc"><?php echo the_excerpt(); ?></span>
													<div class="g-padding-y-20--xs g-font-size-14--xs g-color--primary g-letter-spacing--2">
														<a class="read-more" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'bloglane'); ?></a>
													</div>
												</div>
											</div>
											<?php if($case % 2 != 0) { ?>
												<!--Post Thumbnail-->
												<?php if ( has_post_thumbnail() ) { ?>
												<div class="col-md-4 col-sm-4 col-xs-12 blog-img-box blog-img-box-r">
													<!--Post Thumbnail-->
													<a href="<?php the_permalink(); ?>">
														<?php echo the_post_thumbnail($bloglane_blog_img_crop); ?>
													</a>
												</div>
												<?php } ?>
											<?php }
											}									
										?>
									</div>
								</article>
							<!-- End News -->	
						<?php
							$case ++;
							endwhile;
							// Reset Post Data
							wp_reset_postdata();
						endif;
						?>
				</div>
				<?php if($bloglane_blog_sidebar_layout == "rightsidebar") { ?>
					<?php if ( is_active_sidebar( 'sidebar-widget' ) ) { ?>
						<!--Sidebar Widget-->
						<div class="col-md-4 col-sm-5 col-xs-12">
							<div class="sidebar">
								<?php dynamic_sidebar('sidebar-widget') ?>
							</div>
						</div>
						<!--Sidebar Widget End-->
					<?php } ?>
				<?php } ?>
			</div><!--/.row-->
		</div> <!--/.container-->
	</section>