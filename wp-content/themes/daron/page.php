<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package daron
 */

get_header(); ?>
		<!-- Breadcrumbs-->
		<?php get_template_part('breadcrumb'); ?>
		<!-- Breadcrumbs-->
		<section class="content right_sidebar g-bg-color--white">
			<div class="container g-padding-y-100--xs g-padding-y-125--xsm">
				<div class="row">
					<?php
				// Intialize Variable
				$daron_layout_style = "col-md-12 col-sm-12 col-xs-12";
				$daron_general_page_layout = get_theme_mod('daron_general_page_layout', 'fullwidth');
				
				// Check Sidebar Column Condition
				if( $daron_general_page_layout == "rightsidebar" || $daron_general_page_layout == "leftsidebar" && is_active_sidebar( 'sidebar-widget' )  ) {
					$daron_layout_style = "col-md-8 col-sm-6 col-xs-12";
				}
				?>
					<?php if($daron_general_page_layout == "leftsidebar") { ?>
						<?php if ( is_active_sidebar( 'sidebar-widget' ) ) { ?>
							<!--Sidebar Widget-->
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="sidebar">
									<?php dynamic_sidebar('sidebar-widget') ?>
								</div>
							</div>
						<?php } ?>
					<?php } ?>
					<div class="<?php echo esc_attr($daron_layout_style); ?>">
						<div class="blog_large">
							<?php
							if(have_posts()) :
								while (have_posts()) : the_post();
									 ?>
									 <article>
									<?php the_content(); ?>
									</article>
								<?php				
								
								endwhile;
							endif;
							?>
						</div>
					</div>
					<?php if($daron_general_page_layout == "rightsidebar") { ?>
						<?php if ( is_active_sidebar( 'sidebar-widget' ) ) { ?>
							<!--Sidebar Widget-->
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="sidebar">
									<?php dynamic_sidebar('sidebar-widget') ?>
								</div>
							</div>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
		</section>
<?php get_footer(); ?>