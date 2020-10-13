<?php 
get_header(); 
$daron_header_show_title = get_theme_mod('daron_header_show_title', 1);
$daron_header_show_breadcrumb = get_theme_mod('daron_header_show_breadcrumb', 1);
?>
<!--========== Breadcrumb ==========-->
<div class="js__parallax-window">
	<div class="daron-breadcrumb g-container--md g-text-center--xs">
		<?php if($daron_header_show_title == 1) { ?>
		<h1 class="g-font-size-40--xs g-font-size-50--sm g-font-size-60--md g-color--white g-letter-spacing--1 g-margin-b-30--xs"><?php the_title(); ?></h1>
		<?php } ?>
		<?php if($daron_header_show_breadcrumb == 1) { ?>
		<p class="g-font-size-14--xs g-color--white-opacity g-letter-spacing--2">
			<a class="breadcumb-color" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Home', 'daron'); ?></a> / <span><?php the_title(); ?></span>
		</p>
		<?php } ?>
	</div>
</div>
<!--========== END Breadcrumb ==========-->