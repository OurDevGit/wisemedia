<?php /*
	Tag Archive
*/ ?>
<?php get_header();	?>
	 <!--========== Breadcrumb ==========-->
	<div class="js__parallax-window">
		<div class="daron-breadcrumb g-container--md g-text-center--xs g-padding-y-120--xs">
			<h1 class="g-font-size-40--xs g-font-size-50--sm g-font-size-60--md g-color--white g-letter-spacing--1 g-margin-b-30--xs"><?php esc_html_e('Tag Archive', 'daron') ?> : <?php single_tag_title(); ?></h1>
			<p class="g-font-size-14--xs g-color--white-opacity g-letter-spacing--2 g-margin-b-25--xs">
				<a class="breadcumb-color" href="<?php echo esc_url( home_url( '/' ) ); ?>"<?php esc_html_e('Home', 'daron'); ?>></a> / <span><?php single_tag_title(); ?></span>
			</p>
		</div>
	</div>
	<!--========== END Breadcrumb ==========-->
	<!-- Blog Large Section Start -->
	<section class="g-bg-color--sky-light site-content">
		<div class="container g-padding-y-100--xs g-padding-y-125--xsm">
			<div class="row">
				<div class="col-md-8 col-sm-6 col-xs-12">
					<div class="blog_large">
						<?php
						if( have_posts()) :
							while ( have_posts()) : the_post();
							$post_id = get_the_ID();
							//feature img url
							$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); 
						?>
							<!-- News -->
								<div class="blog-load-iteam daron-shadow">
									<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
										<div class="daron-blog g-bg-color--white g-box-shadow__dark-lightest-v2 g-padding-x-30--xs g-padding-y-30--xs">
											<h3 class="g-font-size-22--xs g-letter-spacing--1 formate-hading-color">
												<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
											</h3>
											<p class="g-margin-b-0--xs g-font-size-14--xs g-letter-spacing--2 blog-date-color"><?php echo get_the_date(); ?> |
												<?php if (has_category()) : ?>	
															<a class="categories-color-blog" href="#"><?php the_category( ', ' ); ?></a> 
													<?php endif; ?>
												
												| <span class=""><?php comments_number(); ?></span>
											</p>
										</div>
										<div class="g-margin-b-30--xs">
												<a href="<?php the_permalink(); ?>">
													<?php if($url != NULL) { ?><?php echo the_post_thumbnail(); ?><?php } ?>
												</a> 
											<div class="daron-blog g-bg-color--white g-text-left--xs g-padding-x-30--xs g-padding-y-30--xs">
												<p><?php the_content(); ?></p>
												<div class="g-padding-y-20--xs g-font-size-14--xs g-color--primary g-letter-spacing--2 read-more-wrap">
													<a class="read-more" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'daron'); ?></a>
												</div>
												<div class="g-padding-y-20--xs daron-blog-info g-font-size-14--xs">
													<div class="blog-auther_name col-md-6 col-sm-6 col-xs-6"><?php esc_html_e('By', 'daron'); ?> <a class="author-color" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo get_the_author(); ?></a></div>
												</div>
											</div>
										</div>
									</article>
								</div>
								<!-- End News -->
							<?php
							endwhile;
							// Reset Post Data
							wp_reset_postdata();
						endif;
						?>
					</div>
					<div class="g-margin-b-30--xs g-margin-t-30--xs daron-pagination">
						<?php	
							the_posts_pagination( array(
								'type'		         => 'plain',						
								'mid_size'  		 => 2,
								'prev_text'          => ('&laquo;'),
								'next_text'          => ('&raquo;'),
							) ); 
						?>
					</div>
				</div>
				<!--Sidebar Widget-->
				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="sidebar">
						<?php dynamic_sidebar('sidebar-widget') ?>
					</div>
				</div>
				<!--Sidebar Widget End-->
			</div><!--/.row-->
		</div> <!--/.container-->
	<!-- Blog Large Section End -->
	</section>
<?php get_footer(); ?>