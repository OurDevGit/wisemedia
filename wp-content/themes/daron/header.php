<?php
/**
 * The header for our theme.
 *
 * @package daron
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta charset="<?php bloginfo('charset'); ?>"> 
	<?php wp_head(); ?>
	<?php  get_template_part('custom-color-css');
	$daron_theme_layout 		= get_theme_mod('daron_theme_layout', 'wide');
	$daron_boxed_layout_bg_img 	= get_theme_mod('daron_boxed_layout_bgimg', 'wood');
	$daron_icon_section         = get_theme_mod('daron_icon_section', '1');
	$daron_fb_link_disable      = get_theme_mod('daron_fb_link_disable', '1');
	$daron_facebook_url      	= get_theme_mod('daron_facebook_url', '');
	$daron_tweet_link_disable   = get_theme_mod('daron_tweet_link_disable', '1');
	$daron_twitter_url   		= get_theme_mod('daron_twitter_url', '');
	$daron_insta_link_disable   = get_theme_mod('daron_insta_link_disable', '1');
	$daron_instagram_url   		= get_theme_mod('daron_instagram_url', '');
	$daron_youtube_link_disable = get_theme_mod('daron_youtube_link_disable', '1');
	$daron_youtube_url 			= get_theme_mod('daron_youtube_url', '');
	$daron_linkdin_link_disable = get_theme_mod('daron_linkdin_link_disable', '1');
	$daron_linkdin_url 			= get_theme_mod('daron_linkdin_url', '');
	//$daron_search_icon 		  	= get_theme_mod('daron_search_icon', 'active');
	$daron_loader 		  		= get_theme_mod('daron_loader', 'active');
	?>
	
    <!-- Body -->
    <body <?php body_class($daron_theme_layout); if($daron_theme_layout=='boxed') { ?> style="background: rgba(0, 0, 0, 0) url(<?php echo esc_url(get_template_directory_uri()) . '/images/icons/' ?><?php echo esc_attr($daron_boxed_layout_bg_img); ?>.jpg) repeat scroll 0 0;"<?php } ?>>
		<?php wp_body_open(); ?>
		<?php if($daron_loader == 'active') { ?>
		<div class="loader-wrapper">
			<div class="loader">
				<div class="dot"></div>
				<div class="dot"></div>
				<div class="dot"></div>
				<div class="dot"></div>
				<div class="dot"></div>
			</div>
		</div>
		<?php } ?>
	    <!--========== HEADER V2 ==========-->
        <header class="cd-main-header animate-search s-header-v2">
            <!-- Navbar -->
            <nav class="cd-main-nav-wrapper s-header-v2__navbar">
				<div class="daron-container container g-display-table--lg">
					<!-- Navbar Row -->
                    <div class="s-header-v2__navbar-row text-center">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="s-header-v2__navbar-col">
                            <button type="button" class="collapsed s-header-v2__toggle" data-toggle="collapse" data-target="#nav-collapse" aria-expanded="false">
                                <span class="s-header-v2__toggle-icon-bar"></span>
                            </button>
                        </div>
                        <div class="s-header-v2__navbar-col <?php if ( has_custom_logo() ) { echo "s-header-v2__navbar-col-width--180"; } ?>">
                            <!-- Logo -->
                            <div class="s-header-v2__logo g-text-left--xs">
								<div class="site-branding">
									<div class="wrap">
										<?php  if ( has_custom_logo() ) {
										 the_custom_logo();
										} else {
										?>
										<div class="site-branding-text s-header-v2__logo-link">
											<?php if ( is_front_page() ) : ?>
												<h1 class="site-title"><a class="g-letter-spacing--2 g-margin-b-0--xs g-font-size-32--xs g-color--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
											<?php else : ?>
												<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
											<?php endif; ?>

											<?php
											$description = get_bloginfo( 'description', 'display' );

											if ( $description || is_customize_preview() ) :
											?>
											<p class="site-description"><?php echo esc_html($description); ?></p>
											<?php endif; ?>
										</div><!-- .site-branding-text -->
										<?php } ?>
									</div><!-- .wrap -->
								</div><!-- .site-branding -->
                            </div>
                            <!-- End Logo -->
                        </div>
                        
						<div class="s-header-v2__navbar-col header-icon s-header-v2__navbar-col--right">
							<ul class="s-header-v2__nav daron-header-icon">
								<?php if($daron_fb_link_disable != '1' && $daron_facebook_url != '') { ?><li><a href="<?php echo esc_url($daron_facebook_url); ?>" class="g-font-size-12--xs"><span class="fa fa-facebook"></span></a></li><?php } ?>
								<?php if($daron_tweet_link_disable != '1' && $daron_twitter_url != '') { ?><li><a href="<?php echo esc_url($daron_twitter_url); ?>" class="g-font-size-12--xs"><span class="fa fa-twitter"></span></a></li><?php } ?>
								<?php if($daron_insta_link_disable != '1' && $daron_instagram_url != '') { ?><li><a href="<?php echo esc_url($daron_instagram_url); ?>" class="g-font-size-12--xs"><span class="fa fa-instagram"></span></a></li><?php } ?>
								<?php if($daron_youtube_link_disable != '1' && $daron_youtube_url != '') { ?><li><a href="<?php echo esc_url($daron_youtube_url); ?>" class="g-font-size-12--xs"><span class="fa fa-youtube"></span></a></li><?php } ?>
								<?php if($daron_linkdin_link_disable != '1' && $daron_linkdin_url != '') { ?><li><a href="<?php echo esc_url($daron_linkdin_url); ?>" class="g-font-size-12--xs"><span class="fa fa-linkedin"></span></a></li><?php } ?>
								
							</ul>
						</div>
						<div class="s-header-v2__navbar-col s-header-v2__navbar-col--right">
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <?php
								//
									function add_search_to_nav( $items, $args )
									{
										$daron_search_icon = get_theme_mod('daron_search_icon', 'active');
										if($daron_search_icon == 'active') {
											$items .= '<li><a href="#search" class="g-font-size-12--xs fa fa-search cd-search-trigger"></a></li>';
											return $items;
										} else {
											return $items;
										}
									}
								//}
								 $shop_button = '<ul class="%2$s">%3$s';
								if ( class_exists( 'WooCommerce' ) ) {
									$shop_button .= '<li><div class="cart-header">';
									global $woocommerce; 
									$link = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : $woocommerce->cart->get_cart_url();
									$shop_button .= '<a class="cart-icon" href="'.$link.'" >';

									if ($woocommerce->cart->cart_contents_count == 0){
										$shop_button .= '<i class="fa fa-shopping-cart" aria-hidden="true"></i>';
									} else {
										$shop_button .= '<i class="fa fa-cart-plus" aria-hidden="true"></i>';
									}
									$shop_button .= '</a>';
									$shop_button .= '<a href="'.$link.'" ><span class="cart-total">
										'.sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'daron'), $woocommerce->cart->cart_contents_count).'</span></a>';
								}
								$shop_button .= '</ul>';
								?>
								<div class="collapse navbar-collapse s-header-v2__navbar-collapse" id="nav-collapse">
									<?php
									$args = array (
										'theme_location'  	 => 'primary-menu',
										//'container'		 => true,
										'depth'              => 5,
										'menu_class'	 	 => 's-header-v2__nav',
										'items_wrap'  		=> $shop_button,
										'walker'		 	 => new Daron_Walker_Nav_Primary()
										
									);

									if(has_nav_menu('primary-menu')) {
										wp_nav_menu( $args ); 
									} 
									?>
								</div>
								<!-- End Nav Menu -->
							</div>
						</div>
						
                    <!-- End Navbar Row -->
                    </div>
                    <!-- End Navbar Row -->
                </div>
            </nav>
			<a href="#0" class="cd-nav-trigger cd-text-replace"><span></span></a>
            <!-- End Navbar -->
        </header>
		<!--Search form-->
		<div id="search" class="cd-main-search">
			<form method="get" id="searchform" action="<?php echo esc_url( home_url() ); ?>/">
				<input value="<?php the_search_query(); ?>" name="s" type="search" placeholder="Search...">
			</form>
			<div class="cd-search-suggestions">
				<div class="news daron-search-form-news">
					<h2 class="g-font-size-30--xs"><?php esc_html_e('Recent News', 'daron'); ?></h2>
					<ul class="g-margin-t-50--xs">
						<?php 
						$args = array( 'posts_per_page' => '3' );
						$recent_posts = new WP_Query($args);
						while( $recent_posts->have_posts() ) { 
						   $recent_posts->the_post() ; 
							if ( has_post_thumbnail() ) {
							?>
							<li class="suggestions-post-thumb">
								<a class="image-wrapper" href="<?php the_permalink(); ?>"><?php echo the_post_thumbnail(); ?></a>
								<h3 class="g-font-size-18--xs g-letter-spacing--1 g-margin-b-0--xs"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
								<p class="g-font-size-12--xs g-font-weight--700 g-letter-spacing--2 blog-date-color"><?php echo get_the_date(); ?></p>
							</li>
							<?php 
							} else {
							?>
							<li class="suggestions-post-no-thumb">
								<h3 class="g-font-size-18--xs g-letter-spacing--1 g-margin-b-0--xs"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
								<p class="g-font-size-12--xs g-font-weight--700 g-letter-spacing--2 blog-date-color"><?php echo get_the_date(); ?></p>
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
			<a href="#0" class="close cd-text-replace"></a>
		</div> <!--Search form end-->
        <!--========== END HEADER V2 ==========-->