<?php
	//Slide One
	$daron_slider_image_one = get_theme_mod('daron_slider_image_one', get_template_directory_uri() . '/images/slider/slide1.jpg');
	$daron_slider_title_one = get_theme_mod('daron_slider_title_one', 'Welcome To Daron Theme');
	$daron_slider_desc_one = get_theme_mod('daron_slider_desc_one', 'Motivation is the catalyzing ingredient for every successful innovation.');
	$daron_slider_btn_link_one = get_theme_mod('daron_slider_btn_link_one', '');
	$daron_slider_btn_text_one = get_theme_mod('daron_slider_btn_text_one',  'Read More');
	
?>
   <!--========== SWIPER SLIDER ==========-->
	<div class="daron-swiper s-swiper js__swiper-one-item">
		<!-- Swiper Wrapper -->
		<div class="swiper-wrapper">
			<?php if($daron_slider_image_one != "") { ?>
			<div class="swiper-slide">
				<div class="daron-swipe-img g-fullheight--xs g-bg-position--center" style="background: url('<?php echo esc_url($daron_slider_image_one); ?>');"></div>
				<div class="container g-text-center--xs g-ver-center--xs">
					<div class="g-margin-b-30--xs">
						<div class="g-margin-b-30--xs section-heading">
							<h2 class="g-font-size-32--xs g-font-size-45--sm g-font-size-55--md g-color--white"><?php echo esc_html($daron_slider_title_one); ?></h2>
							<p class="g-font-size-18--xs g-font-size-22--sm g-color--white-opacity"><?php echo esc_html($daron_slider_desc_one); ?></p>
						</div>
							<a href="<?php echo esc_url($daron_slider_btn_link_one); ?>" class="s-btn s-btn--md s-btn--white-brd g-radius--50 g-padding-x-50--xs" target=""><?php echo esc_html($daron_slider_btn_text_one); ?></a>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
		<!-- End Swiper Wrapper -->
	</div>
	<!--========== END SWIPER SLIDER ==========-->
	<style>
		.g-fullheight--xs {
		 height: 70vh;
		}
		.daron-swiper {
			background: #000000;
		}
		.daron-swipe-img {
			opacity: 0.4;
		}
	</style>