<?php
get_header();
global $woocommerce; ?>

 <!--========== Breadcrumb ==========-->
<div class="js__parallax-window">
	<div class="daron-breadcrumb g-container--md g-text-center--xs">
		<h1 class="g-font-size-40--xs g-font-size-50--sm g-font-size-60--md g-color--white g-letter-spacing--1 g-margin-b-30--xs">
		<?php 
		if( class_exists( 'WooCommerce' ) && is_shop() ) :
			$shop_text = get_theme_mod('shop_prefix',__('Shop','daron'));
			
			printf( __( '%1$s %2$s', 'daron' ), $shop_text, single_tag_title( '', false ));
		elseif( is_product() ): 
			the_title( '<h1 class="g-font-size-40--xs g-font-size-50--sm g-font-size-60--md g-color--white g-letter-spacing--1 g-margin-b-30--xs">', '</h1>' ); 
		endif; ?>
		</h1>
		<p class="g-font-size-14--xs g-color--white-opacity g-letter-spacing--2">
			<a class="breadcumb-color" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Home', 'daron'); ?></a> / <span>
			<?php 
			if( class_exists( 'WooCommerce' ) && is_shop() ) :
				$shop_text = get_theme_mod('shop_prefix',__('Shop','daron'));
				printf( __( '%1$s %2$s', 'daron' ), $shop_text, single_tag_title( '', false ));
			elseif( is_product() ): 
				the_title(); 
			endif; ?>
			</span>
		</p>
	</div>
</div>
<!--========== END Breadcrumb ==========-->

<!-- woocommerce Section with Sidebar -->
<section class="content right_sidebar g-bg-color--sky-light">
	<div class="container g-padding-y-100--xs g-padding-y-125--xsm">
		<div class="row">
			<div class="col-md-<?php echo ( !is_active_sidebar( 'woocommerce' ) ? '12' :'8' ); ?> col-xs-12">
				<div class="daron-shop g-bg-color--white g-box-shadow__dark-lightest-v2 g-padding-x-30--xs g-padding-y-30--xs">
					<?php woocommerce_content(); ?>
				</div>
			</div>
			<!--/woocommerce Section-->
			<?php  if ( is_active_sidebar( 'woocommerce' )  ) { ?>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="sidebar">
						<?php get_sidebar('woocommerce'); ?>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
<!-- /woocommerce Section with Sidebar -->
<?php get_footer(); ?>