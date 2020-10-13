<?php
/**
 * @package Daron
 */
?>
<?php get_header();	
$daron_header_show_title = get_theme_mod('daron_header_show_title', 1);
$daron_header_show_breadcrumb = get_theme_mod('daron_header_show_breadcrumb', 1);
// If static page is front-page, get it's template.
if ( get_option( 'show_on_front' ) == 'page' ) {

/***
* Load Daron Theme Option Setting
*/
$daron_slider_section = get_theme_mod('daron_slider_section', 'active');
$daron_service_section = get_theme_mod('daron_service_section', 'active');
$daron_woocommerce_section = get_theme_mod('daron_woocommerce_section', 'active');
$daron_blog_section = get_theme_mod('daron_blog_section', 'active'); 
$daron_testimonial_section = get_theme_mod('daron_testimonial_section', 'active'); 
$daron_portfolio_section = get_theme_mod('daron_portfolio_section', 'active'); 
$daron_callout_section = get_theme_mod('daron_callout_section', 'active'); 
//static page setting
//$daron_static_page_setting = get_theme_mod('daron_static_page_setting', 'active');

if ( $daron_slider_section == "active" ) { get_template_part('index-slider'); }
if ( $daron_service_section == "active" ) { get_template_part('index-services'); }
if ( $daron_blog_section == "active" ) { get_template_part('index-blog'); } 
if ( $daron_portfolio_section == "active" ) { get_template_part('index-portfolio'); }
if ( $daron_testimonial_section == "active" ) { get_template_part('index-testimonial'); }
if ( $daron_callout_section == "active" ) { get_template_part('index-callout'); }
?>

<?php
} else {
?>
<!-- Breadcrumbs -->
	<div class="js__parallax-window">
		<div class="daron-breadcrumb g-container--md g-text-center--xs">
			<?php if($daron_header_show_title == 1) { ?>
			<?php if ( is_home() && ! is_front_page() ) : ?>
			<h1 class="g-font-size-40--xs g-font-size-50--sm g-font-size-60--md g-color--white g-letter-spacing--1 g-margin-b-30--xs"><?php single_post_title(); ?></h1>
			<?php else : ?>
				<h1 class="g-font-size-40--xs g-font-size-50--sm g-font-size-60--md g-color--white g-letter-spacing--1 g-margin-b-30--xs"><?php esc_html_e( 'Posts', 'daron' ); ?></h1>
			<?php endif; ?>
			
			<?php } ?>
			<?php if($daron_header_show_breadcrumb == 1) { ?>
			<p class="g-font-size-14--xs g-color--white-opacity g-letter-spacing--2">
				<a class="breadcumb-color" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Home', 'daron'); ?></a> / <span>
				<?php if ( is_home() && ! is_front_page() ) : ?>
				<?php single_post_title(); ?>
				<?php else : ?>
					<?php esc_html_e( 'Posts', 'daron' ); ?>
				<?php endif; ?>
				</span>
			</p>
			<?php } ?>
		</div>
	</div>
	<!-- Breadcrumbs -->
<!-- Blog Large Section Start -->
	<section class="g-bg-color--sky-light site-content">
		<div class="container g-padding-y-100--xs g-padding-y-125--xsm">
			<div class="row">
				<?php
				// Page Layout Settings
				$daron_page_layout_style = get_theme_mod('daron_page_layout_style', 'rightsidebar');
				
				// Intialize Variable
				$layout_style = "col-md-12 col-sm-12 col-xs-12";
				
				// Check Sidebar Column Condition
				if( $daron_page_layout_style == "rightsidebar" || $daron_page_layout_style == "leftsidebar" && is_active_sidebar( 'sidebar-widget' )  ) {
					$layout_style = "col-md-8 col-sm-6 col-xs-12";
				}
				?>
				<?php if($daron_page_layout_style == "leftsidebar") { ?>
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
					<div id="js__standerd-sidebar-blog" class="blog_large">
						<?php
						if(have_posts()) :
							while (have_posts()) : the_post();
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
										<div class="g-margin-b-30--xs g-bg-color--white daron-blog-img">
											<a href="<?php the_permalink(); ?>">
												<?php if($url != NULL) { ?><?php echo the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']); ?><?php } ?>
											</a> 
											<div class="daron-blog g-bg-color--white g-text-left--xs g-padding-x-30--xs g-padding-y-30--xs">
												<?php the_excerpt(); ?>
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
								'type'		=> 'plain',						
								'mid_size'  => 2,
								'prev_text'          => ('&laquo;'),
								'next_text'          => ('&raquo;'),
							) ); 
						?>
					</div>
				</div>
				<?php if($daron_page_layout_style == "rightsidebar") { ?>
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
<?php

}
//}
?>	
<?php get_footer(); ?>