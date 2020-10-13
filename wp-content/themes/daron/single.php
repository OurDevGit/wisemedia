<?php
	/**
	 * Single Blog Post File
	 */
	 get_header();	
?>

	<!-- Breadcrumbs -->
	<?php get_template_part('breadcrumb'); ?>
	<!-- Breadcrumbs -->
	<!-- Blog Large Section Start -->
	<section class="g-bg-color--sky-light site-content">
		<div class="container g-padding-y-100--xs g-padding-y-125--xsm">
			<div class="row">
				<?php
				// Page Layout Settings
				$daron_blog_single_page_layout = get_theme_mod('daron_blog_single_page_layout', 'fullwidth');
				
				// Intialize Variable
				$layout_style = "col-md-12 col-sm-12 col-xs-12";
				
				// Check Sidebar Column Condition
				if( $daron_blog_single_page_layout == "rightsidebar" || $daron_blog_single_page_layout == "leftsidebar" && is_active_sidebar( 'sidebar-widget' )  ) {
					$layout_style = "col-md-8 col-sm-6 col-xs-12";
				}
				?>
				<?php if($daron_blog_single_page_layout == "leftsidebar") { ?>
					<?php if ( is_active_sidebar( 'sidebar-widget' ) ) { ?>
						<!--Sidebar Widget-->
						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="sidebar">
								<?php dynamic_sidebar('sidebar-widget') ?>
							</div>
						</div>
						<!--Sidebar Widget End-->
					<?php } ?>
				<?php } ?>
				<div class="<?php echo esc_attr($layout_style); ?>">
					<div class="blog_single blog_large">
						<?php
						if(have_posts()) :
							while (have_posts()) : the_post();
							//feature img url
							$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); 
							?>
								<div class="daron-shadow">
									<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
										<div class="daron-blog g-bg-color--white g-box-shadow__dark-lightest-v2 g-padding-x-30--xs g-padding-y-30--xs">
											<h3 class="g-font-size-22--xs g-letter-spacing--1 formate-hading-color">
												<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
											</h3>
											<p class="g-margin-b-0--xs g-font-size-14--xs g-letter-spacing--2 blog-date-color"><?php echo get_the_date(); ?> |
												<?php if (has_category()) : ?>	
															<a class="categories-color-blog" href="#"><?php the_category(', '); ?></a> 
													<?php endif; ?>
												
												| <span class=""><?php comments_number(); ?></span>
											</p>
										</div>
										<div class="g-margin-b-5--xs g-bg-color--white daron-blog-img">
											<a href="<?php the_permalink(); ?>">
												<?php if($url != NULL) { ?><?php echo the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']); ?><?php } ?>
											</a> 
											<div class="daron-blog g-bg-color--white g-text-left--xs g-padding-x-30--xs g-padding-y-30--xs">
												<p>
													<?php 
														echo the_content(); 
														wp_link_pages(); 
													?>
												</p>
												<?php
												if( get_the_tags() ){
													echo '<span><a class="categories-color-blog" href="#">';
													ucwords( the_tags( '',', ','' ) );
													echo '</a> </span>';
												} ?>
												<div class="g-padding-y-20--xs g-text-left--xs g-font-size-12--xs g-color--primary g-letter-spacing--2 read-more-wrap">
													<div class="metaInfo"></div>
												</div>
												<div class="g-padding-y-20--xs daron-blog-info g-font-size-14--xs">
													<div class="blog-auther_name col-md-6 col-sm-6 col-xs-6"><?php esc_html_e('By', 'daron'); ?> <a class="author-color" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo get_the_author(); ?></a></div>
												</div>
											</div>
										</div>
									</article>
								</div>
								<!--about auther-->
								<div class="daron-shadow g-bg-color--white g-padding-x-30--xs g-padding-y-30--xs g-margin-b-5--xs g-margin-b-5--md">
									<div class="g-padding-x-20--xs g-padding-y-10--xs">
									<h3 class="g-font-size-27--xs g-letter-spacing--1"><?php esc_html_e('About Author', 'daron'); ?></h3>
									</div>
									<div class="g-hor-centered-row--md">
										<div class="col-sm-2 col-xs-4 g-hor-centered-row__col author_desc">
											<?php $user = wp_get_current_user(); ?>
											<img class="g-width-80--xs g-height-80--xs g-hor-border-4__solid--white g-box-shadow__primary-v1 g-radius--circle g-margin-b-30--xs" src="<?php echo get_avatar_url( get_the_author_meta( 'ID' ), 32 ); ?>" alt="about author">
										</div>
										<div class="col-sm-10 g-hor-centered-row__col author_bio">
											<h4 class="author_name"><a class="author-color" href="#"><?php the_author(); ?></a></h4>
											<p class="author_det">
												<?php 
												if( get_the_author_meta( 'description' ) ){
													echo wpautop( get_the_author_meta( 'description' ) ); 
												}									
												?>
											</p>
										</div>
									</div>
								</div>
								<!-- End News -->
								<div class="daron-shadow g-bg-color--white g-hor-centered-row--md">
									<nav class="g-padding-x-30--xs g-padding-y-30--xs">
										<ul class="pager">
											<li class="previous"><?php previous_post_link( '%link', '&laquo; Prev Post' ); ?></li>
											<li class="next"><?php next_post_link( '%link', 'Next Post &raquo;' ); ?></li>
										</ul>
									</nav>
									<?php
										if( $post->comment_status == 'open' ) {
											//get comments
											comments_template();
										}
										paginate_comments_links( array(
											'prev_text' => '&laquo;',
											'next_text' => '&raquo;'
										) );
									?>
								</div>
							<?php
							endwhile;
							// Reset Post Data
							wp_reset_postdata();
						endif;
						?>
					</div>
				</div>
				<?php if($daron_blog_single_page_layout == "rightsidebar") { ?>
					<?php if ( is_active_sidebar( 'sidebar-widget' ) ) { ?>
						<!--Sidebar Widget-->
						<div class="col-md-4 col-sm-6 col-xs-12">
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
	<!-- Blog Large Section End -->
<?php get_footer(); ?>